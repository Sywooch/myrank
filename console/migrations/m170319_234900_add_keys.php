<?php

use yii\db\Migration;

class m170319_234900_add_keys extends Migration {

    public function up() {
	$this->addForeignKey(
            'fk-testimonials-user_from',
            'testimonials',
            'user_from',
            'user',
            'id',
            'CASCADE'
        );
	
	$this->addForeignKey(
            'fk-testimonials-user_to',
            'testimonials',
            'user_to',
            'user',
            'id',
            'CASCADE'
        );
     
	/*$this->addForeignKey(
            'fk-user_trustees-user_to',
            'user_trustees',
            'user_to',
            'user',
            'id',
            'CASCADE'
        );
	
	$this->addForeignKey(
            'fk-user_trustees-user_from',
            'user_trustees',
            'user_from',
            'user',
            'id',
            'CASCADE'
        );*/
	
	$this->addForeignKey(
            'fk-images-user_id',
            'images',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
	
	$this->addForeignKey(
            'fk-user_mark_rating-mark_id',
            'user_mark_rating',
            'mark_id',
            'marks',
            'id',
            'CASCADE'
        );
	
	$this->addForeignKey(
            'fk-user_event-user_id',
            'user_event',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
	
    }

    public function down() {
	$this->dropForeignKey('fk-testimonials-user_from', 'testimonials');
	$this->dropForeignKey('fk-testimonials-user_to', 'testimonials');
	//$this->dropForeignKey('fk-user_trustees-user_to', 'user_trustees');
	//$this->dropForeignKey('fk-user_trustees-user_from', 'user_trustees');
	$this->dropForeignKey('fk-images-user_id', 'images');
	$this->dropForeignKey('fk-user_mark_rating-mark_id', 'user_mark_rating');
	$this->dropForeignKey('fk-user_event-user_id', 'user_event');
    }

}
