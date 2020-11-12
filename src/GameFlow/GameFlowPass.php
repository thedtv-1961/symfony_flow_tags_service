<?php

namespace App\GameFlow;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class GameFlowPass implements CompilerPassInterface
{
    const GAMEFLOW_INIT_TAG = 'gameflow.init.processor';
    const GAMEFLOW_UPDATE_TAG = 'gameflow.update.processor';
    const GAMEFLOW_END_TAG = 'gameflow.end.processor';

    public function process(ContainerBuilder $container)
    {
        $processorTags = [
            self::GAMEFLOW_INIT_TAG => 'addInitFlowProcessor',
            self::GAMEFLOW_UPDATE_TAG => 'addUpdateFlowProcessor',
            self::GAMEFLOW_END_TAG => 'addEndFlowProcessor',
        ];

        foreach ($processorTags as $tagId => $methodName) {
            $ids = $container->findTaggedServiceIds($tagId);
            dump($ids);
        }

        die();
    }
}
