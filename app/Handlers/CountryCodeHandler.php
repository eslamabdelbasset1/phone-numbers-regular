<?php

namespace App\Handlers;

class CountryCodeHandler
{
    protected $successor;
    public function setSuccessor(CountryCodeHandler $handler): void
    {
        $this->successor = $handler;
    }

    public function handle($num)
    {
        if ($this->successor) {
            return $this->successor->handle($num);
        }
        return null;
    }
    public function getCountryCode($num)
    {
//        First Solution
        preg_match('/\((.*?)\) /', $num->phone, $match);
        return (isset($match[1])) ? $match[1] : null;
//        Second Solution
//        $regexPattern = '/\((\d+)\)/';
//        if (preg_match($regexPattern, $num->phone, $matches)) {
//            return $matches[1];
//        }
//        return false;
    }
    public function getPhoneNumber($num)
    {
        return preg_replace('/\((.*?)\) /', '', $num->phone);
    }
}
