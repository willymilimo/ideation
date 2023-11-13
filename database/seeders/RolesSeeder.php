<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['id' => 1, 'roleName' => 'Administrator'],
            ['id' => 2, 'roleName' => 'QA Coordinator'],
            ['id' => 3, 'roleName' => 'Staff'],
            ['id' => 4, 'roleName' => 'Quality Assurance Manager'],
        ]);
    }
}
