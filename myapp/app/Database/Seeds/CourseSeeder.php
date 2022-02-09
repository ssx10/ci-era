<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CourseSeeder extends Seeder
{
  public function run()
  {
    $this->db->query('TRUNCATE TABLE courses');
    $data = [
      [
        'name' => 'MAT 101',
        'user_id' => '4',
      ],
      [
        'name' => 'BIO 120',
        'user_id' => '4',
      ],
    ];
    foreach ($data as $row){
      $this->db->table('courses')->insert($row);
    }
  }
}
