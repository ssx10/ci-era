<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class addingSlots extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id' => [
        'type' => 'INT',
        'auto_increment' => true,
      ],
      'exam_date_time' => [
        'type' => 'VARCHAR',
        'constraint' => '150',
        'null' => false,
      ],
      'course_id' => [
        'type' => 'INT',
        'null' => false,
      ],
      'created_at datetime default current_timestamp',
    ]);
    $this->forge->addPrimaryKey('id');
    $this->forge->createTable('slots');
  }

  public function down()
  {
    $this->forge->dropTable('slots');
  }
}
