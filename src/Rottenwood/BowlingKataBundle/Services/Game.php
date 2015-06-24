<?php

namespace Rottenwood\BowlingKataBundle\Services;

class Game
{
    private $score = 0;

    /**
     * @param int $pins
     */
    public function roll($pins)
    {
        $this->score += $pins;
    }

    /**
     * @return int
     */
    public function score()
    {
        return $this->score;
    }
}
