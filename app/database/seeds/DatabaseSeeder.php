<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('SentrySeeder');
        $this->command->info('Sentry tables seeded!');
		$this->call('DepartamentsSeeder');
        $this->command->info('Departaments table seeded!');
		$this->call('MenusSeeder');
        $this->command->info('Menus table seeded!');
		$this->call('SubmenusSeeder');
        $this->command->info('Submenus table seeded!');
	}

}