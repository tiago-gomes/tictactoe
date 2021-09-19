<?php

namespace TicTacToe;

interface TicTacToeInterface
{
    /**
     * @param string $playerOne
     * @param string $playerTwo
     *
     * @return array
     */
    public function createGame(string $playerOne, string $playerTwo): array;
    
    /**
     * @param string $playerOne
     */
    public function createPlayerOne(string $playerOne): void;
    
    /**
     * @param string $playerTwo
     */
    public function createPlayerTwo(string $playerTwo): void;
    
    /**
     * @return bool
     */
    public function deletePlayerOne(): bool;
    
    /**
     * @return bool
     */
    public function deletePlayerTwo(): bool;
    
    /**
     * @param string $playerName
     * @param int    $x
     * @param int    $y
     */
    public function createPlayerMove(string $playerName, int $x, int $y): void;
    
    /**
     * @param string $playerName
     *
     * @return bool
     */
    public function isPlayerWinner(string $playerName): bool;
}