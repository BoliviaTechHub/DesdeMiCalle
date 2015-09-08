<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $this->call('UsersTableSeeder');
        $this->command->info('Users table seeded!');

        $this->call('ClaimTableSeeder');
        $this->command->info('Claim table seeded!');

        $this->call('PublicWorkTableSeeder');
        $this->command->info('PublicWork table seeded!');

        $this->call('ClaimWorkCategoryTableSeeder');
        $this->command->info('ClaimWorkCategory table seeded!');

        $this->call('RolesSeeder');
        $this->command->info('Roles Seeded!');

        $this->call('PermissionsSeeder');
        $this->command->info('Permissions Seeded!');
	}
}

class UsersTableSeeder extends Seeder {
    public function run() {
        DB::table('informationRequest')->delete();
        DB::table('claim')->delete();
        DB::table('users')->delete();

        DB::table('users')->insert([['username' => 'admin', 'email' => 'admin@jhtan.com','password' => Hash::make('123456')]]);
        DB::table('users')->insert([['username' => 'jhtan', 'email' => 'foo@bar.com','password' => Hash::make('123456'), 'name' => 'Jhonatan', 'lastName' => 'Castro']]);
    }
}

class ClaimTableSeeder extends Seeder {
    public function run() {
        DB::table('claim')->delete();
    }
}

class PublicWorkTableSeeder extends Seeder {
  public function run() {
    DB::table('publicWork')->delete();
  }
}

class ClaimWorkCategoryTableSeeder extends Seeder {
    public function run() {
        DB::table('claimWorkCategory')->delete();
        $basura = ClaimWorkCategory::create(['name' => 'Basura', 'parentId' => '0', 'status' => 1, 'class' => 'basura']);
        $agua = ClaimWorkCategory::create(['name' => 'Agua', 'parentId' => '0', 'status' => 1, 'class' => 'agua']);
        $callesYPlazas = ClaimWorkCategory::create(['name' => 'Calles y Plazas', 'parentId' => '0', 'status' => 1, 'class' => 'calle']);
        $luzYElectricidad = ClaimWorkCategory::create(['name' => 'Luz y Electricidad', 'parentId' => '0', 'status' => 1, 'class' => 'luz']);
        $saludYAmbulancias = ClaimWorkCategory::create(['name' => 'Salud y Ambulancias', 'parentId' => '0', 'status' => 1, 'class' => 'salud']);
        $edificiosYOInfraestructuras = ClaimWorkCategory::create(['name' => 'Edificios y/o Infraestructuras', 'parentId' => '0', 'status' => 1, 'class' => 'obra']);
        $cloacasYOPluviales = ClaimWorkCategory::create(['name' => 'Cloacas y/o Pluviales', 'parentId' => '0', 'status' => 1, 'class' => 'pluvial']);

        ClaimWorkCategory::create(['name' => 'No pasó el camión recolector', 'parentId' => $basura->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'El camión no pasa a horario', 'parentId' => $basura->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'El contenedor que rebalsó', 'parentId' => $basura->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'El contenedor está roto', 'parentId' => $basura->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'El contenedor no tiene tapa', 'parentId' => $basura->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'Problema de plagas', 'parentId' => $basura->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'Hay un basural en el barrio', 'parentId' => $basura->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'El servicio de barrido es deficiente', 'parentId' => $basura->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'No hay cestos', 'parentId' => $basura->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'No se hizo la recolección puerta a puerta', 'parentId' => $basura->id, 'status' => 1]);

        ClaimWorkCategory::create(['name' => 'No hay presión de agua', 'parentId' => $agua->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'Hay un caño roto', 'parentId' => $agua->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'Deberían hacer una obra', 'parentId' => $agua->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'Problemas con el agua (olor, color, sabor, etc.)', 'parentId' => $agua->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'No vino el camión cisterna', 'parentId' => $agua->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'Se cortó el agua', 'parentId' => $agua->id, 'status' => 1]);

        ClaimWorkCategory::create(['name' => 'Falta pavimentar', 'parentId' => $callesYPlazas->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'El pavimento está roto', 'parentId' => $callesYPlazas->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'Ocupan la apertura de calles', 'parentId' => $callesYPlazas->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'Plaza/Cancha en mal estado', 'parentId' => $callesYPlazas->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'No hay nombre de calle', 'parentId' => $callesYPlazas->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'Faltan señales de señalización', 'parentId' => $callesYPlazas->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'No hay semáforo', 'parentId' => $callesYPlazas->id, 'status' => 1]);

        ClaimWorkCategory::create(['name' => 'No vino la cuadrilla', 'parentId' => $luzYElectricidad->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'Deberían hacer una obra', 'parentId' => $luzYElectricidad->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'Hay peligro de riesgo eléctrico', 'parentId' => $luzYElectricidad->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'Hubo un incendio', 'parentId' => $luzYElectricidad->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'No hay luminaria en las calles', 'parentId' => $luzYElectricidad->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'Se cortó la luz', 'parentId' => $luzYElectricidad->id, 'status' => 1]);

        ClaimWorkCategory::create(['name' => 'Tuve problemas con la atención de salud', 'parentId' => $saludYAmbulancias->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'Llamé a la ambulancia pero no vino', 'parentId' => $saludYAmbulancias->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'La ambulancia tardó mucho tiempo en llegar', 'parentId' => $saludYAmbulancias->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'La ambulancia no entró al barrio', 'parentId' => $saludYAmbulancias->id, 'status' => 1]);

        ClaimWorkCategory::create(['name' => 'Una obra comprometida no se hizo', 'parentId' => $edificiosYOInfraestructuras->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'La obra está detenida', 'parentId' => $edificiosYOInfraestructuras->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'La obra está mal hecha', 'parentId' => $edificiosYOInfraestructuras->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'Deberían hacer una obra', 'parentId' => $edificiosYOInfraestructuras->id, 'status' => 1]);

        ClaimWorkCategory::create(['name' => 'Hay un caño roto', 'parentId' => $cloacasYOPluviales->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'No se hizo el mantenimiento pluvial', 'parentId' => $cloacasYOPluviales->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'Deberían hacer una obra', 'parentId' => $cloacasYOPluviales->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'Hay una inundación en el barrio', 'parentId' => $cloacasYOPluviales->id, 'status' => 1]);
        ClaimWorkCategory::create(['name' => 'No vino el camión vactor/atmosférico', 'parentId' => $cloacasYOPluviales->id, 'status' => 1]);
    }
}

class RolesSeeder extends Seeder
{
    public function run()
    {
        // Admin Role.
        $adminRole = new Role;
        $adminRole->name = 'admin';
        $adminRole->save();

        // Checker Role.
        $checkerRole = new Role;
        $checkerRole->name = 'checker';
        $checkerRole->save();

        $adminUser = User::where('username', '=', 'admin')->first();
        $adminUser->attachRole(Role::where('name', '=', 'admin')->first());
        $jhtanUser = User::where('username', '=', 'jhtan')->first();
        $jhtanUser->attachRole(Role::where('name', '=', 'admin')->first());


        //// :S TODO: There are problems with the PermissionsSeeder Class. :S
        // Edit Users Permission.
        $editUsers = new Permission;
        $editUsers->name = 'edit_users';
        $editUsers->display_name = 'Edit Users';
        $editUsers->save();

        // Edit Claims Permission.
        $editClaims = new Permission;
        $editClaims->name = 'edit_claims';
        $editClaims->display_name = 'Edit Claims';
        $editClaims->save();

        $editUsersPermission = Permission::where('name', '=', 'edit_users')->first();
        $editClaimsPermission = Permission::where('name', '=', 'edit_claims')->first();

        // Grant privileges to admin role.
        $adminRole = Role::where('name', '=', 'admin')->first();
        $adminRole->perms()->sync(array($editUsersPermission->id, $editClaimsPermission->id));

        //Grant privileges to checker role.
        $checkerRole = Role::where('name', '=', 'checker')->first();
        $checkerRole->perms()->sync(array($editClaimsPermission->id));
    }
}

class PermissionsSeeder extends Seeder
{
    public function run()
    {
//        // Edit Users Permission.
//        $editUsers = new Permission;
//        $editUsers->name = 'edit_users';
//        $editUsers->display_name = 'Edit Users';
//        $editUsers->save();
//
//        // Edit Claims Permission.
//        $editClaims = new Permission;
//        $editClaims->name = 'edit_claims';
//        $editClaims->display_name = 'Edit Claims';
//        $editClaims->save();
//
//        $editUsersPermission = Permission::where('name', '=', 'edit_users')->first();
//        $editClaimsPermission = Permission::where('name', '=', 'edit_claims')->first();
//
//        // Grant privileges to admin role.
//        $adminRole = Role::where('name', '=', 'admin')->first();
//        $adminRole->perms()->sync(array($editUsersPermission->id, $editClaimsPermission->id));
//
//        //Grant privileges to checker role.
//        $checkerRole = Role::where('name', '=', 'checker')->first();
//        $checkerRole->perms()->sync(array($editClaimsPermission->id));
    }
}