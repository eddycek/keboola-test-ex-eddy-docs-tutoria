<?php

declare(strict_types=1);

namespace MyComponent;

use Faker;

final class Users
{
    /**
     * @param int $count
     * @return array
     */
    public static function make(int $count): array
    {
        $users = [];
        $faker = Faker\Factory::create();

        for ($i = 0; $i < $count; $i++) {
            $users[] = [
                $faker->firstName,
                $faker->lastName,
                $faker->email,
                $faker->city
            ];
        }

        return $users;
    }
}