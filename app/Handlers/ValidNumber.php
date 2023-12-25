<?php

namespace App\Handlers;

use App\Handlers\Countries\CameroonHandler;
use App\Handlers\Countries\EthiopiaHandler;
use App\Handlers\Countries\MoroccoHandler;
use App\Handlers\Countries\MozambiqueHandler;
use App\Handlers\Countries\UgandaHandler;

class ValidNumber
{
    public function __construct()
    {
        // Initialize handlers for each country
        $cameroonHandler = new CameroonHandler();
        $ethiopiaHandler = new EthiopiaHandler();
        $moroccoHandlers = new MoroccoHandler();
        $mozambiqueHandlers = new MozambiqueHandler();
        $ugandaHandlers = new UgandaHandler();

        // Add handlers for other countries similarly...
        $cameroonHandler->setNext($ethiopiaHandler);
        $ethiopiaHandler->setNext($moroccoHandlers);
        $moroccoHandlers->setNext($mozambiqueHandlers);
        $mozambiqueHandlers->setNext($ugandaHandlers);
        // Set successors for other country handlers similarly...
        $this->nextHandler = $cameroonHandler;
    }

    public function validateNumbers($numbers)
    {
        foreach ($numbers as $num) {
            $this->nextHandler->handle($num);
        }
        return $numbers;
    }
}
