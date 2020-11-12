<?php

namespace App\GameFlow;

use App\GameFlow\Annotation\GameFlowAnnotation;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class GameFlowPass implements CompilerPassInterface
{
    const GAMEFLOW_INIT_TAG = 'gameflow.init.processor';
    const GAMEFLOW_UPDATE_TAG = 'gameflow.update.processor';
    const GAMEFLOW_END_TAG = 'gameflow.end.processor';

    public function process(ContainerBuilder $container)
    {
        $reader = new AnnotationReader();

        $processorTags = [
            self::GAMEFLOW_INIT_TAG => 'addInitFlowProcessor',
            self::GAMEFLOW_UPDATE_TAG => 'addUpdateFlowProcessor',
            self::GAMEFLOW_END_TAG => 'addEndFlowProcessor',
        ];
        $flowDefs = [
            GameFlowAnnotation::class => $container->getDefinition('gameflow.game.flow'),
        ];

//         AnnotationRegistry::registerAutoloadNamespace('App\GameFlow\Annotation', __DIR__);

        foreach ($processorTags as $tagId => $methodName) {
            $ids = $container->findTaggedServiceIds($tagId);

            foreach ($ids as $id => $tags) {
                $def = $container->getDefinition($id);

                foreach ($flowDefs as $annotationName => $serviceGameFlow) {
                    $annotation = $reader->getClassAnnotation(new \ReflectionClass($def->getClass()), $annotationName);

                    if ($annotation) {
                        $serviceGameFlow->addMethodCall($methodName, [new Reference($id)]);
                    }
                }
            }
        }
    }
}
