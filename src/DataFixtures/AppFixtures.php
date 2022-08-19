<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    protected $sluggers;
    public function __construct(SluggerInterface $slugger)
    {
        $this->sluggers = $slugger;
    }

    public function load(ObjectManager $manager): void
    {

        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('fr_FR');
        $faker->addProvider(new \Liior\Faker\Prices($faker));
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        $faker->addProvider(new \Bluemmb\Faker\PicsumPhotosProvider($faker));




        // CREATION DE FAUX PRODUIT DANS LA BASE DE DONNEES

    /*for( $p = 0 ; $p < 100; $p++){
        $product = new Product();
        $product->setName($faker->sentence())
            ->setPrice(mt_rand(100,200))
            ->setSlug($faker->slug);
        $manager->persist($product);
    }*/

            for($c = 0;$c < 3; $c++){
                $category = new Category;
                $category->setName($faker->department)
                    ->setSlug(strtolower($this->sluggers->slug($category->getName())));

                $manager->persist($category);
                for( $p = 0 ; $p < mt_rand(15,20); $p++){
                    $product = new Product();
                    $product->setName($faker->productName)
                        ->setPrice($faker->price(4000,20000))
                        ->setSlug(strtolower($this->sluggers->slug($product->getName())))
                        ->setCategory($category)
                        ->setShortDescription($faker->paragraph())
                        ->setMainPircture($faker->imageUrl(400,400, true));


                    $manager->persist($product);
            }
        }



        $manager->flush();
    }
}
