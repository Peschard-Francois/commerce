<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController {

    /**
     * @Route("/", name="homepage")
     */

    public function homepage(ProductRepository $productRepository,EntityManagerInterface $em){
/*       dump($productRepository->count(['price' => 1500])) ;*/
/*        $product = $productRepository->find(2);*/
        /*$product = $productRepository->findAll();*/
        /*$product = $productRepository->findBy([
            'slug' => 'chaise-en-bois',
            'price'=> 2000
        ],['name' => 'DESC']
        );*/
   /*     $product = $productRepository->findOneBy([],['name' => 'DESC'];*/
       /* dump($product->getUppercaseName());*/

  /*      $productRepository = $em->getRepository(Product::class);
        $product =$productRepository->find(3);
       /* $product->setPrice(2500);*/ //modifier

        /*$em->remove($product);*/

        /*$product = new Product;
        $product
                ->setName('Table en metal')
                ->setPrice(3000)
                ->setSlug('table-en-metal');
        $em->persist($product); // stock les données*/
       /* $em->flush(); // Afficher les données

        dd($product);*/
        $products = $productRepository->findBy([],[],3);

        return $this->render('home.html.twig',[
            'products' => $products
            ]);
    }

}

// name et un slug
//string 255 not null