<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
  protected $table = 'courses';
  protected $allowedFields = [
    'name',
    'user_id'
  ];
}
