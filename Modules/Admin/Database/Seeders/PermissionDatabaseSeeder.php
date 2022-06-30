<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class PermissionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $basepermission=config('basepermissions');
        foreach($basepermission as $key=> $permissions)
        {
            foreach ($permissions as $permission)
            Permission::create([
                'name'=> $key.'_'.$permission,
                'guard_name'=>'admin',
            ]);
        }

        Model::unguard();



        // $this->call("OthersTableSeeder");
    }
}
