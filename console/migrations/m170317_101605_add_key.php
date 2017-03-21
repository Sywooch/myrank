<?php

use yii\db\Migration;

class m170317_101605_add_key extends Migration {

    public function up() {
	
	$this->addForeignKey(
            'fk-user_profession-user_id',
            'user_profession',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
	
	$this->addForeignKey(
            'fk-user_profession-profession_id',
            'user_profession',
            'profession_id',
            'profession',
            'id',
            'CASCADE'
        );
	
	$this->addForeignKey(
            'fk-user_marks-user_from',
            'user_marks',
            'user_from',
            'user',
            'id',
            'CASCADE'
        );
	
	$this->addForeignKey(
            'fk-user_marks-user_to',
            'user_marks',
            'user_to',
            'user',
            'id',
            'CASCADE'
        );
	
	$this->addForeignKey(
            'fk-user_mark_rating-user_from',
            'user_mark_rating',
            'user_from',
            'user',
            'id',
            'CASCADE'
        );
	
	$this->addForeignKey(
            'fk-user_mark_rating-user_to',
            'user_mark_rating',
            'user_to',
            'user',
            'id',
            'CASCADE'
        );
	
	$this->delete("{{migration}}", ["version" => ['m170227_093103_add_user_claim_table', 'm170223_181117_add_user_trustees_table']]);
	$this->dropTable("{{user_claim}}");
	$this->dropTable("{{user_trustees}}");
    }

    public function down() {
	$this->dropForeignKey('fk-user_profession-user_id', 'user_profession');
	$this->dropForeignKey('fk-user_profession-profession_id', 'user_profession');
	$this->dropForeignKey('fk-user_marks-user_from', 'user_marks');
	$this->dropForeignKey('fk-user_marks-user_to', 'user_marks');
	$this->dropForeignKey('fk-user_mark_rating-user_from', 'user_mark_rating');
	$this->dropForeignKey('fk-user_mark_rating-user_to', 'user_mark_rating');
    }

}
