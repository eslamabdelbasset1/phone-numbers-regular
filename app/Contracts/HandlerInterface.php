<?php

namespace App\Contracts;

use App\Handlers\CountryCodeHandler;

interface HandlerInterface
{
    public function setNext(CountryCodeHandler $handler);
    public function handle($num);

}
