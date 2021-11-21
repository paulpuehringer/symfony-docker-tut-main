<?php
namespace App\Controller;

use App\Form\LostPageForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

//    /**
//     * @Route("/custom/{name?}", name="custom")
//     */
//    public function homeName(Request $request)
//    {
//        $name = $request->get(key:'name');
////        return new Response(content:'<h1>Welcome ' .$name .'!</h1>');
//        return $this->render(view:'home.html.twig', parameters: [
//            'name' => $name
//        ]);
//    }

    /**
     * @Route("/", name="homePage")
     */
    public function homePage()
    {
        return $this->render(view:'home.html.twig');
    }

    /**
     * @Route("/infoPage", name="infoPage")
     */
    public function infoPage()
    {
        return $this->render(view:'employeeInfo.html.twig');
    }
}