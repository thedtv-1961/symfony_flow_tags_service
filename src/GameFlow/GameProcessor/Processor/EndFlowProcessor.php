<?php

namespace App\GameFlow\GameProcessor\Processor;

use App\GameFlow\GameProcessor\IEndFlowProcessor;

class EndFlowProcessor implements IEndFlowProcessor
{
    function process()
    {
        dump('EndFlowProcessor');
    }
}
