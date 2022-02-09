<?php

namespace App\Models;

use CodeIgniter\Model;

class ExamModel extends Model
{
  protected $table = 'exams';
  protected $allowedFields = [
    'course_id',
    'slot_id',
    'user_id',
    'comment',
    'status',
  ];
}
