<?php
/**
 * Created by PhpStorm.
 * User: Guest
 * Date: 14/02/2018
 * Time: 11:54
 */

namespace App\Entity;

use App\Data\Dictionary;

class Task
{
    public $numbers;
    public $symbols;
    public $lettersUpper;
    public $lettersLower;
    public $length;
    public $dictArrLen;
    public $password;
    public $passwordArray = array();
    public $dictionary;

    public function setSymbols($symbols)
    {
        $this->symbols = $symbols;
    }

    public function getSymbols()
    {
        return $this->symbols;
    }

    public function setNumbers($numbers)
    {
        $this->numbers = $numbers;
    }

    public function getNumbers()
    {
        return $this->numbers;
    }

    public function setLettersUpper($lettersUpper)
    {
        $this->lettersUpper = $lettersUpper;
    }

    public function getLettersUpper()
    {
        return $this->lettersUpper;
    }

    public function setLettersLower($lettersLower)
    {
        $this->lettersLower = $lettersLower;
    }

    public function getLettersLower()
    {
        return $this->lettersLower;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setPasswordArray($password)
    {
        $this->passwordArray = $password;
    }

    public function getPasswordArray()
    {
        return $this->passwordArray;
    }

    public function setDictionaryArrayLength($dictArrLen)
    {
        $this->dictArrLen = $dictArrLen;
    }

    public function getDictionaryArrayLength()
    {
        return $this->dictArrLen;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function createDictionary()
    {
        $this->dictionary = new Dictionary();
        $this->dictionary->addToDictionary($this);
    }
}