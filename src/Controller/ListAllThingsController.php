<?php

namespace App\Controller;

use App\Form\ListAllThingsForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListAllThingsController extends AbstractController
{
    /**
     * @Route("/listAllPage", name="listAllPage")
     */
    public function listAllPage()
    {
        $form = $this->createForm(ListAllThingsForm::class);

        return $this->render('listAll.html.twig', [
            'ListAllThingsForm' => $form->createView(),
        ]);
    }
}