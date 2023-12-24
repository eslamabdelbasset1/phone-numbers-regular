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
}
