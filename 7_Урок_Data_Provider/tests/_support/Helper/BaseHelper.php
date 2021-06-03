<?php
namespace Helper;

use Faker\Factory;

class BaseHelper extends \Codeception\Module
{
    public function getFaker($locale = 'kk_KZ')
    {
        $faker = Factory::create($locale);
        $faker->addprovider(new CustomFakerProvider($faker));

        return $faker;
    }
}
