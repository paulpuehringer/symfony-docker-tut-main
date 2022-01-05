<?php

namespace App\Controller;
use App\Entity\Findings;
use App\Form\FoundPageForm;
use App\Form\LostPageForm;
use Doctrine\ORM\EntityManagerInterface;
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
    public function foundPage(EntityManagerInterface $em, Request $request)
    {
        $form = $this->createForm(FoundPageForm::class);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $findings = new Findings();
            $findings->setCategory($data['Kategorien']);
            $findings->setDescription($data['Beschreibung']);
            $findings->setLocation($data['Ort']);
            $findings->setTime($data['Zeit']);
            $findings->setName($data['Name']);
            $findings->setAdress($data['Adresse']);
            $findings->setPhoneNumber($data['Telefonnummer']);
            $findings->setMailAdress($data['EmailAdresse']);
            $findings->setCreatedAt(new \DateTimeImmutable('now', (new \DateTimeZone('Africa/Tunis'))));
            $findings->setAdditionalInformation($data['sonstigeInformationen']);

            $em->persist($findings);
            $em->flush();

            return $this->redirectToRoute('homePage');
        }

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