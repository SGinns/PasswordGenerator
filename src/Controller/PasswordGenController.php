<?php

namespace App\Controller;

use App\Entity\Task;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class PasswordGenController extends AbstractController
{
    /**
     * @Route("/", name="passwordGen")
     */
    public function newPassword(Request $request)
    {
        $task = new Task();

        $form = $this->createFormBuilder()
            ->add("Symbols", CheckboxType::class, array('required' => false))
            ->add("Letters", CheckboxType::class, array('required' => false))
            ->add("Numbers", CheckboxType::class, array('required' => false))
            ->add("Length", TextType::class, array("label" => "Length of Password:"))
            ->add("Submit", SubmitType::class, array("label" => "Submit"))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            if($form->get("Symbols")->getData() == true)
            {
                $task->setSymbol(true);
            }
            else {
                $task->setSymbol(false);
            }

            if($form->get("Letters")->getData() == true)
            {
                $task->setLetters(true);
            }
            else{
                $task->setLetters(false);
            }

            if($form->get("Numbers")->getData() == true)
            {
                $task->setNumbers(true);
            }
            else {
                $task->setNumbers(false);
            }
        }

        return $this->render('form/passwordgen.html.twig', array(
            'password_form' => $form->createView(),
        ));
    }


}
