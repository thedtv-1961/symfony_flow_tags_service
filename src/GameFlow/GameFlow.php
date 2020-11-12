<?php

namespace App\GameFlow;

use Doctrine\Common\Collections\ArrayCollection;
use App\GameFlow\GameProcessor\IEndFlowProcessor;
use App\GameFlow\GameProcessor\IInitFlowProcessor;
use App\GameFlow\GameProcessor\IUpdateFlowProcessor;

class GameFlow
{
    /**
     * @var ArrayCollection|IInitFlowProcessor[]
     */
    protected $initFlowProcessors;

    /**
     * @var ArrayCollection|IUpdateFlowProcessor[]
     */
    protected $updateFlowProcessor;

    /**
     * @var ArrayCollection|IEndFlowProcessor[]
     */
    protected $endFlowProcessor;

    /**
     * GameFlow constructor.
     */
    public function __construct()
    {
        $this->initFlowProcessors = new ArrayCollection();
        $this->updateFlowProcessor = new ArrayCollection();
        $this->endFlowProcessor = new ArrayCollection();
    }

    public function run()
    {
        // Step: Init
        foreach ($this->initFlowProcessors as $initFlowProcessor) {
            $initFlowProcessor->process();
        }

        // Step: Update
        foreach ($this->updateFlowProcessor as $updateFlowProcessor) {
            $updateFlowProcessor->process();
        }

        // Step: End
        foreach ($this->endFlowProcessor as $endFlowProcessor) {
            $endFlowProcessor->process();
        }
    }

    /**
     * @param  ArrayCollection  $initFlowProcessors
     */
    public function setInitFlowProcessor(ArrayCollection $initFlowProcessors): void
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
        $this->initFlowProcessors[] = $initFlowProcessor;
    }

    /**
     * Add item to UpdateFlowProcessor.
     *
     * @param  IUpdateFlowProcessor  $updateFlowProcessor
     */
    public function addUpdateFlowProcessor(IUpdateFlowProcessor $updateFlowProcessor)
    {
        $this->updateFlowProcessor[] = $updateFlowProcessor;
    }

    /**
     * Add item to EndFlowProcessor.
     *
     * @param  IEndFlowProcessor  $endFlowProcessor
     */
    public function addEndFlowProcessor(IEndFlowProcessor $endFlowProcessor)
    {
        $this->endFlowProcessor[] = $endFlowProcessor;
    }
}
