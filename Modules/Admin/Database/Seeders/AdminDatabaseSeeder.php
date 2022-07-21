<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Admin\Admin;
use Modules\Admin\Entities\Authorization\Role;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

          Admin::factory(10)->create();
          Role::factory(10)->create();
          $this->call(PermissionDatabaseSeeder::class);
    }
}
