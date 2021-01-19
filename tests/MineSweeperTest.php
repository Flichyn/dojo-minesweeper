<?php

use PHPUnit\Framework\TestCase;
use App\MineSweeper;

class MineSweeperTest extends TestCase
{  
    public function testNoBomb()
    {
        $tiles = [
            [0,0,0],
            [0,0,0],
            [0,0,0],
        ];
        $mineSweeper = new MineSweeper($tiles);
        $this->assertEquals(0, $mineSweeper->play(1,1));
    } 

    public function testOneBomb()
    {
        $tiles = [
            [0, MineSweeper::BOMB,0],
            [0,0,0],
            [0,0,0],
        ];
        $mineSweeper = new MineSweeper($tiles);
        $this->assertEquals(1, $mineSweeper->play(1,1));
    } 

    public function testNoSquare()
    {
        $tiles = [
            [0, MineSweeper::BOMB,0, 0],
            [0, MineSweeper::BOMB,0, 0],
        ];
        $mineSweeper = new MineSweeper($tiles);
        $this->assertEquals(2, $mineSweeper->play(2,1));
    } 

    public function testSeveralBombs()
    {
        $tiles = [
            [0,MineSweeper::BOMB,0],
            [MineSweeper::BOMB,0,0],
            [MineSweeper::BOMB,MineSweeper::BOMB,0],
        ];
        $mineSweeper = new MineSweeper($tiles);
        $this->assertEquals(4, $mineSweeper->play(1,1));
    }   
    
    public function testBorder()
    {
        $tiles = [
            [0,MineSweeper::BOMB,0],
            [MineSweeper::BOMB,0,0],
            [MineSweeper::BOMB,MineSweeper::BOMB,0],
        ];
        $mineSweeper = new MineSweeper($tiles);
        $this->assertEquals(2, $mineSweeper->play(0,0));
    }

    public function testOutOfField() {
        $this->expectException(OutOfBoundsException::class);
        $tiles = [
            [0,MineSweeper::BOMB,0],
            [MineSweeper::BOMB,0,0],
            [MineSweeper::BOMB,MineSweeper::BOMB,0],
        ];
        $mineSweeper = new MineSweeper($tiles);
        $this->assertEquals(2, $mineSweeper->play(3,0));
    }

    public function testBomb() {
        $this->expectExceptionMessage('Boom');
        $tiles = [
            [0,MineSweeper::BOMB,0],
            [MineSweeper::BOMB,0,0],
            [MineSweeper::BOMB,MineSweeper::BOMB,0],
        ];
        $mineSweeper = new MineSweeper($tiles);
        $this->assertEquals(2, $mineSweeper->play(1,0));
    }
}