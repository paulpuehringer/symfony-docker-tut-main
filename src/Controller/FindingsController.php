<?php

namespace App\Controller;

use App\Entity\Findings;
use Doctrine\ORM\EntityManagerInterface;
use http\Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="finding.")
 */
class FindingsController extends AbstractController
{
    private $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(Findings $finding){
        $this->em->remove($finding);
        $this->em->flush();

        $this->addFlash('success', message:'Eintrag wurde entfernt!');
        return $this->redirectToRoute('listAllPage');
    }

    /**
     * @Route("/update/{id}", name="update")
     */
    public function update(Findings $finding){

        $this->em->update($finding);
        $this->em->flush();

        $this->addFlash('success', message:'Eintrag wurde entfernt!');
        return $this->redirectToRoute('listAllPage');
    }

}