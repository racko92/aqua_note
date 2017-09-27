<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;

class GenusController extends Controller
{

    public function showAction($genusName)
    {
        $notes = [
            'Octopus asked me a riddle, outsmarted me',
            'I counted 8 legs... as they wrapped around me',
            'Inked!'
            ];

        return $this->render('genus/show.html.twig', [
            'name' => $genusName,
            'notes' => $notes
        ]);

    }

    public function getNotesAction()
    {

        $notes = [
            ['id' => 1, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Octopus asked me a riddle, outsmarted me', 'date' => 'Jan. 1, 2017'],
            ['id' => 2, 'username' => 'AquaWeaver', 'avatarUri' => '/images/ryan.jpeg', 'note' => 'I counted 8 legs... as they wrapped around me', 'date' => 'Jan. 1, 2017'],
            ['id' => 3, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Inked!', 'date' => 'Jan. 1, 2017'],
        ];

        $data = [
            'notes' => $notes
        ];

        return new JsonResponse($data);
    }


    public function newAction(Request $request)
    {
        $task = new Task();

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, [
                'label' => 'Create Post'
            ])->getForm();


        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $task = $form->getData();


            return $this->redirectToRoute('task_success');

        }

        return $this->render('genus/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
