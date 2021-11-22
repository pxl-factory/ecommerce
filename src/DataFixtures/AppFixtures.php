<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Faker\Factory;
use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    protected $slugger;

    public function __construct(SluggerInterface $slugger){
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $faker->addProvider(new \Liior\Faker\Prices($faker));

        for ($c=0; $c < 3; $c++) { 
            $category = new Category;
            $category->setName($faker->word())
            ->setSlug(strtolower($this->slugger->slug($category->getName())));

            $manager->persist($category);

            for ($i=0; $i < mt_rand(15, 30); $i++) { 
                $product = new Product;
                $product->setName($faker->sentence(3))
                ->setPrice($faker->price(4000, 20000))
                ->setSlug(strtolower($this->slugger->slug($product->getName())))
                ->setCategory($category)
                ->setShortDescription($faker->paragraph())
                ->setMainPicture("https://picsum.photos/200/200");
                $manager->persist($product);
            }
        }
        $manager->flush($product);
    }
}
