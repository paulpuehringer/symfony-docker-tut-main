<?php

namespace App\Controller;

use App\Entity\FindingsCategory;
use App\Form\ListAllThingsForm;
use App\Repository\FindingsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;
use Linkin\Bundle\SwaggerResolverBundle\Factory\SwaggerResolverFactory;

class ListAllThingsController extends AbstractController
{

    /**
     *  @Route("/api/listAll", name="get_listAll", methods={"GET"})
     *
     * @SWG\Get(
     *     summary="Returns a list of findings.",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="FindingsRepository",
     *         in="path",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Returns status 200 and the contact.",
     *         @SWG\Schema(
     *             type="object",
     *             properties={
     *                 @SWG\Property(property="id", type="integer")
     *             }
     *         )
     *     ),
     *     @SWG\Response(
     *         response=404,
     *         description="Returns status 404 if there are no findings."
     *     )
     * )
     */
    public function listAllPage(FindingsRepository $findingsRepository)
    {
        $findings = $findingsRepository->findAll();

//        return $this->render('listAll.html.twig', [
//            'findings' => $findings
//        ]);

        if (!$findings) {
            throw new NotFoundHttpException();
        }

        return $this->createJsonResponse($findings);
    }
}