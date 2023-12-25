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
        $cameroonHandler->setSuccessor($ethiopiaHandler);
        $ethiopiaHandler->setSuccessor($moroccoHandlers);
        $moroccoHandlers->setSuccessor($mozambiqueHandlers);
        $mozambiqueHandlers->setSuccessor($ugandaHandlers);
        // Set successors for other country handlers similarly...
        $this->handler = $cameroonHandler;
    }

    public function validateNumbers($numbers)
    {
        foreach ($numbers as $num) {
            $this->handler->handle($num);
        }
        return $numbers;
    }
}
