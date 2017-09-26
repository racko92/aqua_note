<?php
/**
 * Created by PhpStorm.
 * User: racko92
 * Date: 26.9.17.
 * Time: 19.05
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GenusController extends Controller
{
    /**
     * @Route("/genus/{genusName}")
     */
    public function showAction($genusName)
    {
        $notes = [
            'qwer',
            'asdf',
            'qwer'
        ];
        return $this->render('genus/show.html.twig', [
            'name' => $genusName,
            'notes' => $notes
        ]);

    }
}
