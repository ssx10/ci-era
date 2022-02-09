<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersTable extends Migration
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
      'email' => [
        'type' => 'VARCHAR',
        'constraint' => '150',
        'null' => false
      ],
      'password' => [
        'type' => 'VARCHAR',
        'constraint' => '250',
        'null' => false
      ],
      'role' => [
        'type' => 'VARCHAR',
        'constraint' => '50',
        'null' => false
      ],
      'created_at datetime default current_timestamp',
      ]);
      $this->forge->addPrimaryKey('id');
      $this->forge->createTable('users');
  }
  public function down()
  {
    $this->forge->dropTable('users');
  }
}
