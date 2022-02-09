<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SlotSeeder extends Seeder
{
  public function run()
  {
    $this->db->query('TRUNCATE TABLE slots');
    $data = [
      [
        'exam_date_time' => 'Mar 12, 2022 | 1PM - 2PM',
        'course_id' => '1',
      ],
      [
        'exam_date_time' => 'Mar 13, 2022 | 12.30PM - 1.30PM',
        'course_id' => '1',
      ],
      [
        'exam_date_time' => 'Mar 14, 2022 | 1PM - 2PM',
        'course_id' => '1',
      ],
      [
        'exam_date_time' => 'Mar 12, 2022 | 10.30PM - 11.30PM',
        'course_id' => '2',
      ],
      [
        'exam_date_time' => 'Mar 13, 2022 | 9.30PM - 10.30PM',
        'course_id' => '2',
      ],
      [
        'exam_date_time' => 'Mar 14, 2022 | 10PM - 11PM',
        'course_id' => '2',
      ],
    ];

    foreach ($data as $row){
      $this->db->table('slots')->insert($row);
    }
  }
}
