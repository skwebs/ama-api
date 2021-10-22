<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXX USERS XXXXXXXXXXXXXXXXXXXXXXXX USERS XXXXXXXXXXXXXXXXXXXXX USERS XXXXXXXXXXXXXXXXXXXX USERS XXXXXXXXXXXXX
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'first_name'    => ['type' => 'varchar', 'constraint' => 20],
            'middle_name'   => ['type' => 'varchar', 'constraint' => 20, 'null' => true],
            'last_name'     => ['type' => 'varchar', 'constraint' => 20],
            'gender'        => ['type' => 'enum("Male","Female")', 'null' => true],
            'dob'           => ['type' => 'date', 'null' => true],
            'mobile'        => ['type' => 'varchar', 'constraint' => 10],
            'alt_mobile'    => ['type' => 'varchar', 'constraint' => 10, 'null' => true],
            'email'         => ['type' => 'varchar', 'constraint' => 30],
            'address'       => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'image'         => ['type' => 'varchar', 'constraint' => 120],
            // 'role_id'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            // 'completed_step' => ['type' => 'tinyint', 'constraint' => 1],
            // 'password_hash' => ['type' => 'varchar', 'constraint' => 255],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at'    => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        // $this->forge->addUniqueKey('email');
        // $this->forge->addForeignKey('role_id', 'roles', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        // Rollback users table from database
        $this->forge->dropTable('users');
    }
}
