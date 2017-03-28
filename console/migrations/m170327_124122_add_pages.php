<?php

use yii\db\Migration;

class m170327_124122_add_pages extends Migration
{
    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->alterColumn('{{%article}}','update_time','timestamp on update current_timestamp');

        $this->createTable('{{%static_pages}}',[
            'id'   => $this->bigPrimaryKey(20),
            'title' => $this->string(128)->notNull()->comment(""),
            'alias' => $this->string(128)->notNull()->comment(""),
            'published' => $this->boolean()->defaultValue(1)->comment(""),
            'content' => $this->text()->comment("Текст страницы"),
            'title_browser' => $this->string(128)->comment(""),
            'meta_keywords' => $this->string(200)->comment(""),
            'meta_description'  => $this->string(160)->comment(""),
            'create_time' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment("Отметка времени создания"),
            'update_time' => $this->timestamp()->append('ON UPDATE CURRENT_TIMESTAMP'),//created_at, updated_at
        ], $tableOptions
        );

        $this->createIndex(
            'idx-static_pages-alias',
            'static_pages',
            ['alias'],
            true
        );

        $this->createIndex(
            'idx-static_pages-alias_and_published',
            'static_pages',
            ['alias','published']
        );

        $this->insert('static_pages', [
            'title' => 'КОНТАКТЫ',
            'alias' => 'contacts',
            'published' => 1,
            'content' => 'КОНТАКТЫ\r\n\r\n<div class=\"b-footer__contact__item b-footer__contact__item_adress\">\r\n			    <span>Address</span>\r\n			    6A Tanjong Rhu Road 12-01,\r\n			    Singapore, 436884\r\n			</div>\r\n<div class=\"b-footer__contact__item b-footer__contact__item_phone\">\r\n			    <span>Phone Number</span>\r\n			    <a href=\"tel:+6511112222\">+65 1111 2222</a>\r\n			</div>\r\n<div class=\"b-footer__contact__item b-footer__contact__item_email\">\r\n			    <span>Email</span>\r\n			    <a href=\"mailto:info@myrank.com\">info@myrank.com</a>\r\n			</div>',
            'title_browser' => 'КОНТАКТЫ',
            'meta_keywords' => 'контакты, адрес, телефон, почта',
            'meta_description' => 'Контактные данные'
        ]);

        $this->insert('static_pages', [
            'title' => 'О НАС',
            'alias' => 'aboutus',
            'published' => 1,
            'content' => '<h2>Немного о нашем проекте</h2>\r\n<div class=\"b-info__about__content\">\r\n			<p>Сервис MyRank позволяет оценивать разнообразные\r\n			    качества пользователей по 10-балльной шкале и выводить\r\n			    общую среднюю оценку их рейтинга.</p>\r\n			<p>При оценивании пользователя по какому либо критерию,\r\n			    оценивающий имеет возможность ввести свой отзыв,\r\n			    пояснив текстом, почему он поставил ту или иную оценку.</p>\r\n			<p>По общей и средним оценкам строятся полярные\r\n			    диаграммы по категориям и критериям оценки. В\r\n			    идеальном случае, диаграмма должна представлять собой\r\n			    круг – колесо, которое свободно и ровно катится по жизни.</p>\r\n			<p>Отсюда вытекает миссия сервиса MyRank: помогать людям\r\n			    контролировать свои приоритеты и «выравнивать колесо»\r\n			    своей жизни.</p>\r\n		    </div>',
            'title_browser' => 'О НАС',
            'meta_keywords' => 'о нас, проект, сервис, оценивать, рейтинг',
            'meta_description' => 'о нас, о нашем проекте'
        ]);

        $this->insert('static_pages', [
            'title' => 'ПОМОЩЬ',
            'alias' => 'help',
            'published' => 1,
            'content' => '<h2>Как работает сервис</h2>\r\n		    <div class=\"b-info__how-work__content\">\r\n			<ul>\r\n			    <li><span class=\"b-info__how-work__icon b-info__how-work__icon_1\"></span>\r\n				<span class=\"b-info__how-work__text\">Регистрация Пользователя/Компании</span>\r\n			    </li>\r\n			    <li>\r\n				<span class=\"b-info__how-work__icon b-info__how-work__icon_2\"></span>\r\n				<span class=\"b-info__how-work__text\">Заполните информацию о профиле, чтобы получить максимально высокий бал.</span>\r\n			    </li>\r\n			    <li>\r\n				<span class=\"b-info__how-work__icon b-info__how-work__icon_3\"></span>\r\n				<span class=\"b-info__how-work__text\">Оценивайте партнеров, коллег и знакомых, оставляйте о них отзывы.</span>\r\n			    </li>\r\n			    <li>\r\n				<span class=\"b-info__how-work__icon b-info__how-work__icon_4\"></span>\r\n				<span class=\"b-info__how-work__text\">Повышайте рейтинг профиля, получайте отзывы.</span>\r\n			    </li>\r\n			    <li>\r\n				<span class=\"b-info__how-work__icon b-info__how-work__icon_5\"></span>\r\n				<span class=\"b-info__how-work__text\">Высокий рейтинг - карьерный рост.</span>\r\n			    </li>\r\n			    <li>\r\n				<span class=\"b-info__how-work__icon b-info__how-work__icon_6\"></span>\r\n				<span class=\"b-info__how-work__text\">Ищите партнеров для своего бизнеса.</span>\r\n			    </li>\r\n			</ul>\r\n		    </div>\r\n		</div>',
            'title_browser' => 'ПОМОЩЬ',
            'meta_keywords' => 'сервис, регистрация, профиль, отзыв, рейтинг, партнеры',
            'meta_description' => 'работа сервиса'
        ]);

        $this->insert('static_pages', [
            'title' => 'УСЛОВИЯ & ЗАЩИТА',
            'alias' => 'legalinfo',
            'published' => 1,
            'content' => '<div class=\"col s12 m12 l8 l2--push category-header\"><h1 class=\"category-header__title\">Условия использования</h1><p class=\"category-header__subtitle\">Это соглашение призвано урегулировать отношения между\r\n                пользователями сервиса MyRank и ЧП «», как\r\n                титульным владельцем сервиса MyRank, торговой марки , доменного имени и прав на\r\n                использование объектов интеллектуальной собственности.</p></div>',
            'title_browser' => 'УСЛОВИЯ & ЗАЩИТА',
            'meta_keywords' => 'права, владелец, соглашение, собственности',
            'meta_description' => 'условия использования'
        ]);
    }

    public function down() {
        $this->dropIndex('idx-static_pages-alias_and_published','static_pages');
        $this->dropIndex('idx-static_pages-alias','static_pages');
        $this->dropTable('{{%static_pages}}');
        $this->alterColumn('{{%article}}','update_time',//'timestamp on update current_timestamp');
            $this->timestamp()->null()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP')->comment("Отметка времени обновления"));
    }
}