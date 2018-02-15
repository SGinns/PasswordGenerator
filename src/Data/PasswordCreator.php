<?php
/**
 * Created by PhpStorm.
 * User: Guest
 * Date: 14/02/2018
 * Time: 16:26
 */

namespace App\Data;

use App\Data\Dictionary;
use App\Entity\Task;

class PasswordCreator
{

    public function getTrueParameters()
    {
        $task = new Task();

        $falseParams = [];
        $trueParams = [];
        $totalTrue = 0;

        if($task->letters == true)
        {
            array_push($trueParams, "Letters");
            $totalTrue += 1;
        }
        else{
            array_push($falseParams, "Letters");
        }

        if($task->numbers == true)
        {
            array_push($trueParams, "Numbers");
            $totalTrue += 1;
        }
        else{
            array_push($falseParams, "Numbers");
        }

        if($task->symbols == true)
        {
            array_push($trueParams, "symbols");
            $totalTrue += 1;
        }
        else{
            array_push($falseParams, "symbols");
        }
    }

    public function writingPassword()
    {

    }
}