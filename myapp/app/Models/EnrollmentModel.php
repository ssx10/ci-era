<?php

namespace App\Models;

use CodeIgniter\Model;

class EnrollmentModel extends Model
{
  protected $table = 'enrollments';
  protected $allowedFields = [
    'course_id',
    'user_id'
  ];
}
