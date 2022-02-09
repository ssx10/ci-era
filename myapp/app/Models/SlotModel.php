<?php

namespace App\Models;

use CodeIgniter\Model;

class SlotModel extends Model
{
    protected $table = 'slots';
    protected $allowedFields = [
      'exam_date_time',
      'course_id',
      'created_at',
    ];
}
