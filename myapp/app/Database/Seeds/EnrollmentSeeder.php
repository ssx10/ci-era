<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
  public function run()
  {
    $this->db->query('TRUNCATE TABLE enrollments');
    $data = [
      [
        'course_id' => '1',
        'user_id' => '1',
      ],
      [
        'course_id' => '2',
        'user_id' => '1',
      ],
      [
        'course_id' => '2',
        'user_id' => '2',
      ],
      [
        'course_id' => '1',
        'user_id' => '3',
      ],
    ];
    foreach ($data as $row){
      $this->db->table('enrollments')->insert($row);
    }
  }
}
