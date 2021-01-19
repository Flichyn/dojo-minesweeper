<?php

namespace App;
use \OutOfBoundsException;
use \Exception;

class MineSweeper
{
  public const BOMB = "x";

  public array $tiles;

  public function __construct($tiles)
  {
    $this->tiles = $tiles;
  }

  public function play(int $x, int $y)
  {
    if (!isset($this->tiles[$y][$x])) {
      throw new OutOfBoundsException;
    }

    if ($this->tiles[$y][$x] !== self::BOMB) {
      $bomb = $this->checkBomb($x, $y);
      $this->tiles[$y][$x] = $bomb;
    } else {
        throw new Exception('Boom');
    }
    return $bomb;
  }

  public function checkBomb(int $x, int $y)
  {
    $bombs = 0;
    if (isset($this->tiles[$y + 1][$x]) && $this->tiles[$y + 1][$x] === self::BOMB) {
      $bombs++;
    }
    if (isset($this->tiles[$y - 1][$x]) && $this->tiles[$y - 1][$x]=== self::BOMB) {
      $bombs++;
    }
    if (isset($this->tiles[$y][$x + 1]) && $this->tiles[$y][$x + 1] === self::BOMB) {
      $bombs++;
    }
    if (isset($this->tiles[$y][$x - 1]) && $this->tiles[$y][$x - 1] === self::BOMB) {
      $bombs++;
    }
    if (isset($this->tiles[$y + 1][$x + 1]) && $this->tiles[$y + 1][$x + 1] === self::BOMB) {
      $bombs++;
    }
    if (isset($this->tiles[$y - 1][$x - 1]) && $this->tiles[$y - 1][$x - 1] === self::BOMB) {
      $bombs++;
    }
    if (isset($this->tiles[$y - 1][$x + 1]) && $this->tiles[$y - 1][$x + 1] === self::BOMB) {
      $bombs++;
    }
    if (isset($this->tiles[$y + 1][$x - 1]) && $this->tiles[$y + 1][$x - 1] === self::BOMB) {
      $bombs++;
    }
    return $bombs;
  }
}