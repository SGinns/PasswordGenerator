<?php
/**
 * Created by PhpStorm.
 * User: Guest
 * Date: 14/02/2018
 * Time: 11:54
 */

namespace App\Entity;

class Task
{
    public $numbers;
    public $symbols;
    public $letters;
    public $length;

    public function setSymbol($symbols)
    {
        $this->symbols = $symbols;
    }

    public function getSymbol()
    {
        return $this->symbols;
    }

    public function setNumbers($numbers)
    {
        $this->getNumbers = $numbers;
    }

    public function getNumbers()
    {
        return $this->symbols;
    }

    public function setLetters($letters)
    {
        $this->letters = $letters;
    }

    public function getLetters()
    {
        return $this->symbols;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }

    public function getLength()
    {
        return $this->length;
    }
}