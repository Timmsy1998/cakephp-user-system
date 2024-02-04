<?php
declare(strict_types=1);

use Migrations\AbstractSeed;
use Faker\Factory;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Factory::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $timestamp = $faker->dateTimeThisDecade->format('Y-m-d H:i:s');
            $data[] = [
                'email' => $faker->email,
                'password' => password_hash($faker->password, PASSWORD_DEFAULT),
                'created' => $timestamp,
                'modified' => $timestamp,
                'last_login' => $faker->dateTimeThisDecade->format('Y-m-d H:i:s'),
            ];
        }

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
