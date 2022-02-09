<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MySeeder extends Seeder
{
  public function run()
  {
    $this->call('UserSeeder');
    $this->call('CourseSeeder');
    $this->call('EnrollmentSeeder');
    $this->call('SlotSeeder');
  }
}
