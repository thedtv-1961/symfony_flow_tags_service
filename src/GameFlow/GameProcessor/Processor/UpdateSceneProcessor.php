<?php

namespace App\GameFlow\GameProcessor\Processor;

use App\GameFlow\Annotation\GameFlowAnnotation;
use App\GameFlow\GameProcessor\IUpdateFlowProcessor;

/**
 * @GameFlowAnnotation()
 */
class UpdateSceneProcessor implements IUpdateFlowProcessor
{
    function process()
    {
        dump('UpdateSceneProcessor');
    }
}
