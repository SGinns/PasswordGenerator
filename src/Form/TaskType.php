<?php
/**
 * Created by PhpStorm.
 * User: Guest
 * Date: 16/02/2018
 * Time: 09:43
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("Symbols", CheckboxType::class, array('required' => false, "label" => "Symbols?"))
            ->add("LettersUpper", CheckboxType::class, array('required' => false, 'label' => "Uppercase Letters?"))
            ->add("LettersLower", CheckboxType::class, array('required' => false, 'label' => "Lowercase Letters?"))
            ->add("Numbers", CheckboxType::class, array('required' => false, "label" => "Numbers?"))
            ->add("Length", RangeType::class, array("label" => "Length of Password?", "attr" => array("min" => 10, "max" => 200)))
            ->add("Submit", SubmitType::class, array("label" => "Submit"));
    }
}