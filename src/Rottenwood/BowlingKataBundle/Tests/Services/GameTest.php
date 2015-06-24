<?php

namespace Rottenwood\BowlingKataBundle\Tests\Services;

use Rottenwood\BowlingKataBundle\Services\Game;

class GameTest extends \PHPUnit_Framework_TestCase
{
    const NUMBER_OF_FRAMES = 10;
    const TOTAL_SCORE = 100;

    /** @var Game */
    private $game;

    public function setUp()
    {
        $this->game = $this->createGame();
    }

    /**
     * @test
     */
    public function score_GameNotStarted_ReturnsNoScore()
    {
        $score = $this->game->score();

        $this->assertEquals(0, $score);
    }

    /**
     * @test
     */
    public function score_GivenFinishedGame_ReturnsScoreSum()
    {
        $this->givenGameIsFinishedAndOnePinKnockedEachRound();

        $score = $this->game->score();

        $this->assertEquals(20, $score);
    }

    private function createGame()
    {
        return new Game();
    }

    private function givenGameIsFinishedAndOnePinKnockedEachRound()
    {
        for ($i = 0; $i < self::NUMBER_OF_FRAMES * 2; $i++) {
            $this->game->roll(1);
        }
    }
}
