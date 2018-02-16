<?php
/**
 * Created by PhpStorm.
 * User: Guest
 * Date: 16/02/2018
 * Time: 10:04
 */

namespace App\Form;

use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;

class FormValidation
{
    public function Validation(FormInterface $form)
    {
        if($form->isSubmitted())
        {
            if($form->get("Symbols")->getData() == false && $form->get("Numbers")->getData() == false && $form->get("LettersUpper")->getData() == false && $form->get("LettersLower")->getData() == false)
            {
                $form->addError(new FormError('Select at least one checkbox minimum.'));
            }

            if($form->get("Length")->getData() < 10 || $form->get("Length")->getData() > 200)
            {
                $form->addError(new FormError('Password must be between 10 - 200 characters long.'));
            }
        }
    }
}