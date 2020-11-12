<?php

namespace App\GameFlow\GameProcessor\Processor;

use App\GameFlow\Annotation\GameFlowAnnotation;
use App\GameFlow\GameProcessor\IInitFlowProcessor;

/**
 * @GameFlowAnnotation()
 */
class ConfigCharacterProcessor implements IInitFlowProcessor
{
    function process()
    {
        dump('ConfigCharacterProcessor');
    }
}
