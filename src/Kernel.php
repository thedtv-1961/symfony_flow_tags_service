<?php

namespace App;

use App\GameFlow\GameFlowPass;
use App\GameFlow\GameProcessor\IEndFlowProcessor;
use App\GameFlow\GameProcessor\IInitFlowProcessor;
use App\GameFlow\GameProcessor\IUpdateFlowProcessor;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    protected function configureContainer(ContainerConfigurator $container): void
    {
        $container->import('../config/{packages}/*.yaml');
        $container->import('../config/{packages}/'.$this->environment.'/*.yaml');

        if (is_file(\dirname(__DIR__).'/config/services.yaml')) {
            $container->import('../config/services.yaml');
            $container->import('../config/{services}_'.$this->environment.'.yaml');
        } elseif (is_file($path = \dirname(__DIR__).'/config/services.php')) {
            (require $path)($container->withPath($path), $this);
        }
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import('../config/{routes}/'.$this->environment.'/*.yaml');
        $routes->import('../config/{routes}/*.yaml');

        if (is_file(\dirname(__DIR__).'/config/routes.yaml')) {
            $routes->import('../config/routes.yaml');
        } elseif (is_file($path = \dirname(__DIR__).'/config/routes.php')) {
            (require $path)($routes->withPath($path), $this);
        }
    }

    protected function build(ContainerBuilder $container)
    {
        // Game Flow:
        $container->registerForAutoconfiguration(IInitFlowProcessor::class)
            ->addTag(GameFlowPass::GAMEFLOW_INIT_TAG);
        $container->registerForAutoconfiguration(IUpdateFlowProcessor::class)
            ->addTag(GameFlowPass::GAMEFLOW_UPDATE_TAG);
        $container->registerForAutoconfiguration(IEndFlowProcessor::class)
            ->addTag(GameFlowPass::GAMEFLOW_END_TAG);
        $container->addCompilerPass(new GameFlowPass());
    }
}
