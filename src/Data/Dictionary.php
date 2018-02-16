<?php
/**
 * Created by PhpStorm.
 * User: Guest
 * Date: 14/02/2018
 * Time: 15:58
 */

namespace App\Data;

use App\Entity\Task;

class Dictionary
{

    public $dictionary = array();

    public function addToDictionary(Task $task)
    {
        if($task->numbers == true)
        {
            array_push($this->dictionary, "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        }

        if($task->lettersUpper == true)
        {
            array_push($this->dictionary, "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        }

        if($task->lettersLower == true)
        {
            array_push($this->dictionary, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
        }

        if($task->symbols == true)
        {
            array_push($this->dictionary, "!", "@", "£", "$", "%", "^", "&", "*", "(", ")", "{", "}", "[", "]");
        }
    }
}