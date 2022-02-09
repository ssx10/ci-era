<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCourses extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id' => [
        'type' => 'INT',
        'auto_increment' => true,
      ],
      'name' => [
          'type' => 'VARCHAR',
          'constraint' => '150',
          'null' => false
      ],
      
      'user_id' => [
        'type' => 'int',
        'null' => false
      ],
      'created_at datetime default current_timestamp',
    ]);
    $this->forge->addPrimaryKey('id');
    $this->forge->createTable('courses');
  }

  public function down()
  {
    $this->forge->dropTable('courses');
  }
}
