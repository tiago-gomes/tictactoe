<?php

namespace TicTacToe;

use TicTacToe\TicTacToeInterface;

class TicTacToe implements TicTacToeInterface
{
    private ?string $playerOne;
    private ?string $playerTwo;
    
    private array $ticTacToeBoard = [
      [null,null,null],
      [null,null,null],
      [null,null,null],
    ];
    
    /**
     * @param string $playerOne
     * @param string $playerTwo
     *
     * @return array
     */
    public function createGame(string $playerOne, string $playerTwo): array
    {
        $this->createPlayerOne($playerOne);
        $this->createPlayerTwo($playerTwo);
        
        return [
          'id' => 1,
          'player1' => $this->playerOne,
          'player2' => $this->playerTwo
        ];
    }
    
    /**
     * @param string $playerOne
     */
    public function createPlayerOne(string $playerOne): void
    {
        $this->playerOne = $playerOne;
    }
    
    /**
     * @param string $playerTwo
     */
    public function createPlayerTwo(string $playerTwo): void
    {
        $this->playerTwo = $playerTwo;
    }
    
    public function deletePlayerOne(): bool
    {
        $this->playerOne = null;
        return true;
    }
    
    public function deletePlayerTwo(): bool
    {
        $this->playerTwo = null;
        return true;
    }
    
    /**
     * @return string|null
     */
    public function getPlayerOne(): string|null
    {
        return $this->playerOne;
    }
    
    /**
     * @return string|null
     */
    public function getPlayerTwo(): string|null
    {
        return $this->playerTwo;
    }
    
    /**
     * @return  array
     */
    public function getBoard(): array
    {
        return $this->ticTacToeBoard;
    }
    
    /**
     * @param string $playerName
     * @param int    $x
     * @param int    $y
     *
     * @throws Exception
     */
    public function createPlayerMove(string $playerName, int $x, int $y): void
    {
        if (empty($this->ticTacToeBoard[$x][$y])) {
            $this->ticTacToeBoard[$x][$y] = $playerName;
            return;
        }
        throw new \Exception('Tic Tac Toe Position has already been taken', 0);
    }
    
    /**
     * @param string $playerName
     *
     * @return bool
     */
    public function isPlayerWinner(string $playerName): bool
    {
        if ($this->checkVerticalMoves($playerName)) {
            return true;
        }
        
        if ($this->checkHorizontalMoves($playerName)) {
            return true;
        }
        
        if ($this->checkDiagonalMoves($playerName)) {
            return true;
        }
        
        return false;
    }
    
    /**
     * @param string $playerName
     *
     * @return bool
     */
    public function checkHorizontalMoves(
      string $playerName
    ): bool {
        if ($this->checkMoveCombination($playerName, 0, 0, 0, 1, 0, 2)) {
            return true;
        }
        if ($this->checkMoveCombination($playerName, 1, 0, 1, 1, 1, 2)) {
            return true;
        }
        if ($this->checkMoveCombination($playerName, 2, 0, 2, 1, 2, 2)) {
            return true;
        }
        return false;
    }
    
    /**
     * @param string $playerName
     *
     * @return bool
     */
    public function checkVerticalMoves(
      string $playerName
    ): bool {
        if ($this->checkMoveCombination($playerName, 0, 0, 1, 0, 2, 0)) {
            return true;
        }
        if ($this->checkMoveCombination($playerName, 1, 0, 1, 1, 1, 2)) {
            return true;
        }
        if ($this->checkMoveCombination($playerName, 2, 0, 2, 1, 2, 2)) {
            return true;
        }
        return false;
    }
    
    /**
     * @param string $playerName
     *
     * @return bool
     */
    public function checkDiagonalMoves(
      string $playerName
    ): bool {
        if ($this->checkMoveCombination($playerName, 0, 0, 1, 1, 2, 2)) {
            return true;
        }
        if ($this->checkMoveCombination($playerName, 2, 0, 1, 1, 0, 2)) {
            return true;
        }
        return false;
    }
    
    /**
     * @param string $playerName
     * @param int    $x1
     * @param int    $y1
     * @param int    $x2
     * @param int    $y2
     * @param int    $x3
     * @param int    $y3
     *
     * @return bool
     */
    public function checkMoveCombination(
      string $playerName,
      int $x1,
      int $y1,
      int $x2,
      int $y2,
      int $x3,
      int $y3
    ): bool {
        if (
          $this->ticTacToeBoard[$x1][$y1] == $playerName &&
          $this->ticTacToeBoard[$x2][$y2] == $playerName &&
          $this->ticTacToeBoard[$x3][$y3] == $playerName
        ) {
            return true;
        }
        return false;
    }
}