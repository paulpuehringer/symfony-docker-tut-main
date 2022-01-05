<?php

namespace App\Controller;

use App\Entity\Findings;
use App\Form\LostPageForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * @Route("/lostPage", name="lostPage.")
 */

class LostPageController extends AbstractController
{
    /**
     * @Route("/", name="lostPage")
     * @throws \Exception
     */
    public function lostPage(EntityManagerInterface $em, Request $request)
    {
        $form = $this->createForm(LostPageForm::class);

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


            //Image Upload
            /**@var UploadedFile $uploaded */
            $uploaded = $form['FotoHochladen']->getData();

            $destination = $this->getParameter('kernel.project_dir').'/public/uploads';

            $orgfile=pathinfo($uploaded->getClientOriginalName().PATHINFO_FILENAME);
            $newfileName = uniqid().'.'.$uploaded->guessExtension();

            $uploaded->move(
                $destination,
                $newfileName
            );

            $findings->setImage($newfileName);
            $em->persist($findings);
            $em->flush();

            $this->addFlash(':success', message:'Verlust erfolgreich gemeldet!');

            return $this->redirectToRoute('homePage');


            $this->addFlash(':success', message:'Verlust erfolgreich gemeldet!');

            return $this->redirectToRoute('homePage');
        }


        return $this->render('lost.html.twig', [
            'LostPageForm' => $form->createView(),
        ]);
    }
}