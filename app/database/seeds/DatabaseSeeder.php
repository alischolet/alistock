<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('DonateursTableSeeder');
		$this->call('DonateursTableSeeder');
		$this->call('FabricantsTableSeeder');
		$this->call('ModelesTableSeeder');
		$this->call('MaterielsTableSeeder');
		$this->call('MaterielsTableSeeder');
		$this->call('TypematerielsTableSeeder');
		$this->call('UnitesTableSeeder');
		$this->call('TypematerielsTableSeeder');
	}

}