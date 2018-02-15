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
    public function __construct(Dictionary $dictionary)
    {
        $this->Dictionary = $dictionary;
    }

    public function password(Task $task)
    {
        $this->Dictionary->addToDictionary($task);

        while(sizeof($task->passwordArray) < $task->length){
            $randChar = mt_rand(0, sizeof($task->dictionary)-1);
            array_push($task->passwordArray, $task->dictionary[$randChar]);
        }
        $task->setPassword(implode("", $task->passwordArray));
    }
}