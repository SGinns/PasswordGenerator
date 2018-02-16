<?php
/**
 * Created by PhpStorm.
 * User: Guest
 * Date: 14/02/2018
 * Time: 16:26
 */

namespace App\Data;

use App\Entity\Task;

class PasswordCreator
{
    public function password(Task $task)
    {
        $task->createDictionary();

        while(sizeof($task->passwordArray) < $task->length){
            $randChar = mt_rand(0, sizeof($task->dictionary->dictionary)-1);
            array_push($task->passwordArray, $task->dictionary->dictionary[$randChar]);
        }
        $task->setPassword(implode("", $task->passwordArray));
    }
}