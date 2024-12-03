<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClients extends Migration
{
    public function up()
    {
        $this->db->simpleQuery("
        CREATE TABLE `v_clients` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(100) NULL DEFAULT NULL AFTER `id`,
         `birth_date` DATE NULL DEFAULT NULL AFTER `name`,
         `age` INT(11) NULL DEFAULT NULL AFTER `birth_date`,
         `gender` VARCHAR(10) NULL DEFAULT NULL AFTER `age`,
         `mobile_no` VARCHAR(15) NULL DEFAULT NULL AFTER `gender`,
         `alternative_no` VARCHAR(15) NULL DEFAULT NULL AFTER `mobile_no`,
         `address` VARCHAR(255) NULL DEFAULT NULL AFTER `alternative_no`,
         `state` VARCHAR(50) NULL DEFAULT NULL AFTER `address`,
         `pincode` VARCHAR(10) NULL DEFAULT NULL AFTER `state`,
         `email` VARCHAR(100) NULL DEFAULT NULL AFTER `pincode`,
         `referred_by` VARCHAR(255) NULL DEFAULT NULL AFTER `email`;
        )");

        // Fill the table

        $this->db->table('v_clients')->insertBatch([
            [
                'id' => 1,
                'title' => 'About Us',
                'content' => '<p>This is a template</p>',
                'category' => 'page',
                                'user_id' => 1,

            ],  [
                'id' => 2,
                'title' => 'FAQ',
                'content' => '<p>This is a template</p>',
                'category' => 'page',
                                'user_id' => 1,

            ],  [
                'id' => 3,
                'title' => 'Contact',
                'content' => '<p>This is a template</p>',
                'category' => 'page',
                                'user_id' => 1,

            ],  [
                'id' => 4,
                'title' => 'Privacy',
                'content' => '<p>This is a template</p>',
                'category' => 'page',
                                'user_id' => 1,

            ],  [
                'id' => 5,
                'title' => 'Service',
                'content' => '<p>This is a template</p>',
                'category' => 'page',
                                'user_id' => 1,

            ],  [
                'id' => 6,
                'title' => 'Info 1',
                'content' => '<p>This is a template</p>',
                'category' => 'info',
                                'user_id' => 1,

            ],  [
                'id' => 7,
                'title' => 'Info 2',
                'content' => '<p>This is a template</p>',
                'category' => 'info',
                                'user_id' => 1,

            ],  [
                'id' => 8,
                'title' => 'News 1',
                'content' => '<p>This is a template</p>',
                'category' => 'news',
                                'user_id' => 1,

            ],  [
                'id' => 9,
                'title' => 'News 2',
                'content' => '<p>This is a template</p>',
                'category' => 'news',
                                'user_id' => 1,

            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('v_clients');
    }
}
