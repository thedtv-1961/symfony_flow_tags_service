<?php

namespace App\GameFlow;

use App\GameFlow\GameProcessor\IEndFlowProcessor;
use App\GameFlow\GameProcessor\IInitFlowProcessor;
use App\GameFlow\GameProcessor\IUpdateFlowProcessor;
use Doctrine\Common\Collections\ArrayCollection;

class GameFlow
{
    /**
     * @var ArrayCollection
     */
    private $initFlowProcessors;

    /**
     * @var ArrayCollection
     */
    private $updateFlowProcessor;

    /**
     * @var ArrayCollection
     */
    private $endFlowProcessor;

    /**
     * GameFlow constructor.
     */
    public function __construct()
    {
        $this->initFlowProcessors = new ArrayCollection();
        $this->updateFlowProcessor = new ArrayCollection();
        $this->endFlowProcessor = new ArrayCollection();
    }

    /**
     * @param  ArrayCollection  $initFlowProcessors
     */
    public function setInitFlowProcessors(ArrayCollection $initFlowProcessors): void
    {
        $this->initFlowProcessors = $initFlowProcessors;
    }

    /**
     * @param  ArrayCollection  $updateFlowProcessor
     */
    public function setUpdateFlowProcessor(ArrayCollection $updateFlowProcessor): void
    {
        $this->updateFlowProcessor = $updateFlowProcessor;
    }

    /**
     * @param  ArrayCollection  $endFlowProcessor
     */
    public function setEndFlowProcessor(ArrayCollection $endFlowProcessor): void
    {
        $this->endFlowProcessor = $endFlowProcessor;
    }

    /**
     * Add item to InitFlowProcessors.
     *
     * @param  IInitFlowProcessor  $initFlowProcessor
     */
    public function addInitFlowProcessor(IInitFlowProcessor $initFlowProcessor)
    {
        $this->initFlowProcessors->add($initFlowProcessor);
    }

    /**
     * Add item to UpdateFlowProcessor.
     *
     * @param  IUpdateFlowProcessor  $updateFlowProcessor
     */
    public function addUpdateFlowProcessor(IUpdateFlowProcessor $updateFlowProcessor)
    {
        $this->initFlowProcessors->add($updateFlowProcessor);
    }

    /**
     * Add item to EndFlowProcessor.
     *
     * @param  IEndFlowProcessor  $endFlowProcessor
     */
    public function addEndFlowProcessor(IEndFlowProcessor $endFlowProcessor)
    {
        $this->initFlowProcessors->add($endFlowProcessor);
    }
}
