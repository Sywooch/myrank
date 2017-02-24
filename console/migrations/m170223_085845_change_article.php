<?php

use yii\db\Migration;

class m170223_085845_change_article extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->addColumn("{{article}}", "header_image_small_square", $this->string(255)
            ->comment("Уменьшенная фото (квадратная) для списка статей ")->after('header_image_small'));

        $this->update("{{article}}",array('header_image_small_square'=>'http://project-1.topsu.ru/images/b-articles/b-articles_small/1.jpg'),'id_article=1');
        $this->update("{{article}}",array('header_image_small_square'=>'http://project-1.topsu.ru/images/b-articles/b-articles_small/2.jpg'),'id_article=2');
        $this->update("{{article}}",array('header_image_small_square'=>'http://project-1.topsu.ru/images/b-articles/b-articles_small/3.jpg'),'id_article=3');
        $this->update("{{article}}",array('header_image_small_square'=>'http://project-1.topsu.ru/images/b-articles/b-articles_small/1.jpg'),'id_article=4');
        $this->update("{{article}}",array('header_image_small_square'=>'http://project-1.topsu.ru/images/b-articles/b-articles_small/2.jpg'),'id_article=5');
        $this->update("{{article}}",array('header_image_small_square'=>'http://project-1.topsu.ru/images/b-articles/b-articles_small/3.jpg'),'id_article=6');
        $this->update("{{article}}",array('header_image_small_square'=>'http://project-1.topsu.ru/images/b-articles/b-articles_small/1.jpg'),'id_article=7');
        $this->update("{{article}}",array('header_image_small_square'=>'http://project-1.topsu.ru/images/b-articles/b-articles_small/2.jpg'),'id_article=8');
        $this->update("{{article}}",array('header_image_small_square'=>'http://project-1.topsu.ru/images/b-articles/b-articles_small/3.jpg'),'id_article=9');
        $this->update("{{article}}",array('header_image_small_square'=>'http://project-1.topsu.ru/images/b-articles/b-articles_small/1.jpg'),'id_article=10');
        $this->update("{{article}}",array('header_image_small_square'=>'http://project-1.topsu.ru/images/b-articles/b-articles_small/2.jpg'),'id_article=11');
        $this->update("{{article}}",array('header_image_small_square'=>'http://project-1.topsu.ru/images/b-articles/b-articles_small/3.jpg'),'id_article=12');
        $this->update("{{article}}",array('header_image_small_square'=>'http://project-1.topsu.ru/images/b-articles/b-articles_small/1.jpg'),'id_article=13');
        $this->update("{{article}}",array('header_image_small_square'=>'http://project-1.topsu.ru/images/b-articles/b-articles_small/2.jpg'),'id_article=14');
        $this->update("{{article}}",array('header_image_small_square'=>'http://project-1.topsu.ru/images/b-articles/b-articles_small/3.jpg'),'id_article=15');
        $this->update("{{article}}",array('header_image_small_square'=>'http://project-1.topsu.ru/images/b-articles/b-articles_small/1.jpg'),'id_article=16');
        $this->update("{{article}}",array('header_image_small_square'=>'http://project-1.topsu.ru/images/b-articles/b-articles_small/2.jpg'),'id_article=17');

    }

    public function down()
    {
        $this->dropColumn("{{article}}", "header_image_small_square");
    }

}
