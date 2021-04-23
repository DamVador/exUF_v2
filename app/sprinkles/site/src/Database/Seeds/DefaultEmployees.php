<?php

namespace UserFrosting\Sprinkle\Site\Database\Seeds;

use UserFrosting\Sprinkle\Core\Database\Seeder\BaseSeed;
use UserFrosting\Sprinkle\Site\Database\Models\Employee;
use UserFrosting\Sprinkle\Site\Database\Models\Company;
use UserFrosting\Sprinkle\Core\Facades\Debug;
use League\FactoryMuffin\Faker\Facade as Faker;

class DefaultEmployees extends BaseSeed
{
    /**
     * {@inheritDoc}
     */
    public function run()
    {
        $count = Company::count();
        $faker = Faker::getGenerator();

        Employee::truncate();
        foreach ($this->employees() as $employee) {
            $employee = new Employee($employee);
            $employee->save();
        }
		
        foreach(range(1, 20) as $index) {
            $employee = new Employee([
				'first_name' 	=> $faker->firstNameMale(),
				'last_name' 		=> $faker->firstNameMale(),
                'email'   =>   $faker->unique()->email(),
                'phone_number' => $faker->phoneNumber(),
                'company_id' => rand(1, $count)
			]);
            $employee->save();
        }
    }

    protected function employees()
    {
        Debug::debug($count);
        return [
            [
                'first_name' => 'Homer',
                'last_name' => 'Simpson',
                'email' => 'homers@smps.com',
                'phone_number' => '098765432',
                'company_id' => '1'
            ],
            [
                'first_name' => 'Lisa',
                'last_name' => 'Simpson',
                'email' => 'lisas@smps.com',
                'phone_number' => '12345665',
                'company_id' => '1'
            ],
            [
                'first_name' => 'Maggy',
                'last_name' => 'Simpson',
                'email' => 'maggys@smps.com',
                'phone_number' => '0000000',
                'company_id' => '1'
            ],
            [
                'first_name' => 'Bart',
                'last_name' => 'Simpson',
                'email' => 'barts@smps.com',
                'phone_number' => '765765667',
                'company_id' => '2'
            ],
            [
                'first_name' => 'Ned',
                'last_name' => 'Flanders',
                'email' => 'nedf@smps.com',
                'phone_number' => '726353',
                'company_id' => '3'
            ],
            [
                'first_name' => 'Maude',
                'last_name' => 'Flanders',
                'email' => 'maudef@smps.com',
                'phone_number' => '098998766',
                'company_id' => '2'
            ]
        ];
    }
}