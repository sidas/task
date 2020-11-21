<?php

namespace Database\Seeders;

use App\Repository\DefaultRepository;
use App\Repository\UserRepository;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * @var UserRepository|DefaultRepository
     */
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('test'),
        ];
        $this->userRepository->create($data);
    }
}
