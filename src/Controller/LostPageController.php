<?php

namespace App\Controller;

use App\Entity\Findings;
use App\Form\LostPageForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lostPage", name="lostPage.")
 */

class LostPageController extends AbstractController
{
    /**
     * @Route("/", name="lostPage")
     */
    public function lostPage()
    {
        $form = $this->createForm(LostPageForm::class);

        return $this->render('lost.html.twig', [
            'LostPageForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/create", name="create")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        // create
        $finding = new Findings();

        $finding->setCategory("Verloren");

        // entity manager
        $em = $this->getDoctrine()->getManager();

        $em->persist($finding);

        return new Response(content:'Verlorenen Gegenstand gemeldet');
    }

}