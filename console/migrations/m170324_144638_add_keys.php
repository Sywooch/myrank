<?php

use yii\db\Migration;

class m170324_144638_add_keys extends Migration {

    public function up() {
	$this->addForeignKey(
		'fk-user_trustees-user_to', 'user_trustees', 'user_to', 'user', 'id', 'CASCADE'
	);

	$this->addForeignKey(
		'fk-user_trustees-user_from', 'user_trustees', 'user_from', 'user', 'id', 'CASCADE'
	);
    }

    public function down() {
	$this->dropForeignKey('fk-user_trustees-user_to', 'user_trustees');
	$this->dropForeignKey('fk-user_trustees-user_from', 'user_trustees');
    }

}
