<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
  public function run()
  {
    $this->db->query('TRUNCATE TABLE users');
    $data = [
      [
      'name' => 'Student A',
      'email' => 'a.student@concordia.ab.ca',
      'password' => password_hash('QwErTy!2#4', PASSWORD_DEFAULT),
      'role' => 'student'
      ],
      [
        'name' => 'Student B',
        'email' => 'b.student@concordia.ab.ca',
        'password' => password_hash('1234Pwrd!', PASSWORD_DEFAULT),
        'role' => 'student'
      ],
      [
        'name' => 'Student C',
        'email' => 'c.student@concordia.ab.ca',
        'password' => password_hash('sF#r9sdfj', PASSWORD_DEFAULT),
        'role' => 'student'
      ],
      [
        'name' => 'Professor A',
        'email' => 'a.professor@concordia.ab.ca',
        'password' => password_hash('%T^Y123A', PASSWORD_DEFAULT),
        'role' => 'professor'
      ],
    ];

    foreach ($data as $row){
      $this->db->table('users')->insert($row);
    }
  }
}
