<?php

namespace App\GameFlow\GameProcessor\Processor;

use App\GameFlow\GameProcessor\IUpdateFlowProcessor;

class UpdateEventHandleProcessor implements IUpdateFlowProcessor
{
    function process()
    {
        dump('UpdateEventHandleProcessor');
    }
}
