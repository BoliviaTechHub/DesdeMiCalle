<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
//		Eloquent::unguard();

    $this->call('ClaimTableSeeder');
    $this->command->info('Claim table seeded!');
    $this->call('PublicWorkTableSeeder');
    $this->command->info('PublicWork table seeded!');
    $this->call('ClaimWorkCategoryTableSeeder');
    $this->command->info('ClaimWorkCategory table seeded!');
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
    DB::table('claimWorkCategory')->insert(array(array(
      'name' => 'testlol'
    )));
  }
}