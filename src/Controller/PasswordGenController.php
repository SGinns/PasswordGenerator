<?php

namespace App\Controller;

use App\Data\Dictionary;
use App\Data\PasswordCreator;
use App\Entity\Task;
use App\Form\FormValidation;
use App\Form\TaskType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class PasswordGenController extends AbstractController
{
    public $PasswordCreator;
    public $FormValidation;
    public $Dictionary;

    public function __construct(PasswordCreator $creator, FormValidation $validation)
    {
        $this->PasswordCreator = $creator;
        $this->FormValidation = $validation;
    }

    /**
     * @Route("/", name="passwordGen")
     */
    public function newPassword(Request $request)
    {
        $task = new Task();

        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        $this->FormValidation->Validation($form);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->PasswordCreator->password($task);
        }
        return $this->render('form/passwordgen.html.twig', array(
            'password_form' => $form->createView(),
            'final_password' => $task->getPassword(),
        ));
    }
}
