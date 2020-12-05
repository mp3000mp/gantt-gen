<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::factory()->create([
            'parent_id' => null,
            'code' => 'PROJECT_READ',
            'position' => 10,
        ]);
        DB::table('roles')->insert([
            'parent_id' => $role->id,
            'code' => 'PROJECT_WRITE',
            'position' => 20,
        ]);
    }
}
