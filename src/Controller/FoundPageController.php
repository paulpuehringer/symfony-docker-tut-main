<?php

namespace App\Controller;
use App\Entity\Findings;
use App\Form\FoundPageForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/foundPage", name="foundPage.")
 */

class FoundPageController extends  AbstractController
{
    /**
     * @Route("/", name="foundPage")
     */
    public function foundPage()
    {
        $form = $this->createForm(FoundPageForm::class);

        return $this->render('found.html.twig', [
            'FoundPageForm' => $form->createView(),
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

        $finding->setCategory("test");

        // entity manager
        $em = $this->getDoctrine()->getManager();

        $em->persist($finding);

        return new Response(content:'Fundgegenstand erstellt');
    }

}