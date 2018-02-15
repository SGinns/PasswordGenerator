<?php
/**
 * Created by PhpStorm.
 * User: Guest
 * Date: 14/02/2018
 * Time: 15:58
 */

namespace App\Data;


class Dictionary
{
    public function letters(){
        $lettersDict = [];

        for($i = "A"; $i >= "Z"; $i++)
        {
            array_push($lettersDict, $i);
        }

        for($i = "a"; $i >= "z"; $i++)
        {
            array_push($lettersDict, $i);
        }
    }

    public function numbers(){
        $numbersDict = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
    }

    public function symbols(){
        $symbolsDict = ["!", "@", "£", "$", "%", "^", "&", "*", "(", ")"];
    }
}