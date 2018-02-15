<?php

namespace App\Controller;

use App\Data\PasswordCreator;
use App\Entity\Task;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;

class PasswordGenController extends AbstractController
{
    public $PasswordCreator;

    public function __construct(PasswordCreator $creator)
    {
        $this->PasswordCreator = $creator;
    }

    /**
     * @Route("/", name="passwordGen")
     */
    public function newPassword(Request $request)
    {
        $task = new Task();

        $form = $this->createFormBuilder()
            ->add("Symbols", CheckboxType::class, array('required' => false, "label" => "Symbols?"))
            ->add("LettersUpper", CheckboxType::class, array('required' => false, 'label' => "Uppercase Letters?"))
            ->add("LettersLower", CheckboxType::class, array('required' => false, 'label' => "Lowercase Letters?"))
            ->add("Numbers", CheckboxType::class, array('required' => false, "label" => "Numbers?"))
            ->add("Length", RangeType::class, array("label" => "Length of Password?", "attr" => array("min" => 10, "max" => 200)))
            ->add("Submit", SubmitType::class, array("label" => "Submit"))
            ->getForm();

        $form->handleRequest($request);
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
        if($form->isSubmitted() && $form->isValid())
        {
            $task->setLength($form->get("Length")->getData());

            if($form->get("Symbols")->getData() == true)
            {
                $task->setSymbol(true);
            }
            else {
                $task->setSymbol(false);
            }

            if($form->get("LettersUpper")->getData() == true)
            {
                $task->setLettersUpper(true);
            }
            else{
                $task->setLettersUpper(false);
            }

            if($form->get("LettersLower")->getData() == true)
            {
                $task->setLettersLower(true);
            }
            else{
                $task->setLettersLower(false);
            }

            if($form->get("Numbers")->getData() == true)
            {
                $task->setNumbers(true);
            }
            else {
                $task->setNumbers(false);
            }
            $this->PasswordCreator->password($task);
        }
        return $this->render('form/passwordgen.html.twig', array(
            'password_form' => $form->createView(),
            'final_password' => $task->getPassword(),
        ));
    }
}
