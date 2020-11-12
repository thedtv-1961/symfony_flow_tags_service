<?php

namespace App\Controller;

use App\GameFlow\GameFlow;

class HomeController
{
    /**
     * @var GameFlow
     */
    protected $gameFlow;

    /**
     * HomeController constructor.
     *
     * @param  GameFlow  $gameFlow
     */
    public function __construct(GameFlow $gameFlow)
    {
        $this->gameFlow = $gameFlow;
    }

    /**
     * Index page.
     */
    public function index()
    {
        $this->gameFlow->run();

        die();
    }
}
