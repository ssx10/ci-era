<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddExams extends Migration
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
        'null' => false,
      ],
      'slot_id' => [
        'type' => 'INT',
        'null' => false,
      ],
      'user_id' => [
        'type' => 'INT',
        'null' => false,
      ],
      'comment' => [
        'type' => 'VARCHAR',
        'constraint' => '150',
        'null' => false,
      ],
      'status' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
      ],
      'created_at datetime default current_timestamp',
      'update_at datetime on update current_timestamp null default null',
    ]);
    $this->forge->addPrimaryKey('id');
    $this->forge->createTable('exams');
  }

  public function down()
  {
    $this->forge->dropTable('exams');
  }
}
