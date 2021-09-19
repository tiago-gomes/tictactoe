<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use TicTacToe\TicTacToe;

class TicTacToeTests extends TestCase
{
    public function testCreatePlayers(): void
    {
        /** @var TicTacTow $ticTacToe */
        $ticTacToe = new TicTacToe();
        $ticTacToe->createPlayerOne('tiago');
        $ticTacToe->createPlayerTwo('gomes');
        $this->assertEquals($ticTacToe->getPlayerOne(), 'tiago');
        $this->assertEquals($ticTacToe->getPlayerTwo(), 'gomes');
    }
    
    public function testDeletePlayer(): void
    {
        /** @var TicTacTow $ticTacToe */
        $ticTacToe = new TicTacToe();
        $ticTacToe->createGame('tiago', 'gomes');
        $ticTacToe->deletePlayerOne();
        $this->assertEquals($ticTacToe->getPlayerOne(), null);
    }
    
    public function testCreateGame(): void
    {
        /** @var TicTacTow $ticTacToe */
        $ticTacToe = new TicTacToe();
        $ticTacToe->createGame('tiago','gomes');
        $this->assertEquals($ticTacToe->getPlayerOne(), 'tiago');
        $this->assertEquals($ticTacToe->getPlayerTwo(), 'gomes');
    }
    
    public function testPlayerMove(): void
    {
        /** @var TicTacTow $ticTacToe */
        $ticTacToe = new TicTacToe();
        $ticTacToe->createGame('tiago','gomes');
        $ticTacToe->createPlayerMove('tiago',0,0);
        $this->assertEquals($ticTacToe->getBoard()[0][0], 'tiago');
    }
    
    public function testPlayerIsWinner(): void
    {
        /** @var TicTacTow $ticTacToe */
        $ticTacToe = new TicTacToe();
        $ticTacToe->createGame('tiago','gomes');
        $ticTacToe->createPlayerMove('tiago',0,0);
        $ticTacToe->createPlayerMove('tiago',0,1);
        $ticTacToe->createPlayerMove('tiago',0,2);
        $this->assertTrue($ticTacToe->isPlayerWinner('tiago'));
    }
}