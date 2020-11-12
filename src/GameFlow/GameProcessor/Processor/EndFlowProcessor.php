<?php

namespace App\GameFlow\GameProcessor\Processor;

use App\GameFlow\Annotation\GameFlowAnnotation;
use App\GameFlow\GameProcessor\IEndFlowProcessor;

/**
 * @GameFlowAnnotation()
 */
class EndFlowProcessor implements IEndFlowProcessor
{
    function process()
    {
        dump('EndFlowProcessor');
    }
}
