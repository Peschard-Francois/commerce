<?php

namespace App\Controller;

use App\Taxes\Calculator;
use App\Taxes\Detector;
use Cocur\Slugify\Slugify;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class TestController extends AbstractController
{
    protected $logger;
    protected $calculator;
    protected $detector;

   /*  B note public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }*/
    public function __construct(Calculator $calculator,Detector $detector)
    {
        $this->calculator = $calculator;
        $this->detector = $detector;
    }

    /**
     * @Route("", name="index")
     */
    public function index()
    {
        return new Response("Page d'accueil");
    }

    /**
     * @Route("test/{age}", name="test")
     */
    public function test(Request $request, $age)
    {
        return new Response("Vous avez $age ans");
    }

    /**
     * @Route("hello/{nom?World}", name="helloName")
     */
    public function helloName($nom = "Franco",Environment $twig)
    {
        /*  B note $this->logger->error('Mon message log !)');*/

        /* Twig 1 dump($detector->detect(101));
        dump($detector->detect(10));

        dump($twig);
       $tva= $calculator->calcul(100);
        dump($tva);
        $slugify = new Slugify();
        dump($slugify->slugify("Heelo World"));*/

        $html = '<html><body><h1>Test</h1></body></html>';
        $html2 = $twig->render('hello.html.twig', [
            'nom' => $nom,
            'formateur' =>['nom' => 'Peschard','prenom' => 'Franco'],
            'formateur2' =>['nom' => 'Liop', 'prenom' => 'Chamla']





            /*'ages' => [
                12,
                18,
                29,
                15
            ]*/
            /*'i' => 10,
            'prenoms' => [
                'Lior',
                'MAgali',
                'Elise'

            ]*/


    ]);
        return new Response($html2);

        /*        return new Response("Hello $nom");*/

    }
}
  /*  public function helloName($nom , LoggerInterface $logger){
        logger->error('Mon message log !)');
        return new Response("Hello $nom");
  uniquement pour les controleur lie a une routes

    }
}*/