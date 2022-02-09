<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEnrollments extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id' => [
        'type' => 'INT',
        'auto_increment' => true,
      ],
      'course_id' => [
        'type' => 'INT',
        'null' => false
      ],
      'user_id' => [
        'type' => 'INT',
        'null' => false
      ],
      'created_at datetime default current_timestamp',
    ]);
    $this->forge->addPrimaryKey('id');
    $this->forge->createTable('enrollments');
  }

  public function down()
  {
    $this->forge->dropTable('enrollments');
  }
}
