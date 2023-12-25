<?php

namespace App\Handlers;

use App\Contracts\HandlerInterface;

abstract class CountryCodeHandler implements HandlerInterface
{
    protected $nextHandler;
    public function setNext(CountryCodeHandler $handler): void
    {
        $this->nextHandler = $handler;
    }

    public function handle($num)
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($num);
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
