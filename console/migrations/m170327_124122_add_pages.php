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
            'content' => 'КОНТАКТЫ  <div class=  "b-footer__contact__item b-footer__contact__item_adress  "> 			    <span>Address</span> 			    6A Tanjong Rhu Road 12-01, 			    Singapore, 436884 			</div> <div class=  "b-footer__contact__item b-footer__contact__item_phone  "> 			    <span>Phone Number</span> 			    <a href=  "tel:+6511112222  ">+65 1111 2222</a> 			</div> <div class=  "b-footer__contact__item b-footer__contact__item_email  "> 			    <span>Email</span> 			    <a href=  "mailto:info@myrank.com  ">info@myrank.com</a> 			</div>',
            'title_browser' => 'КОНТАКТЫ',
            'meta_keywords' => 'контакты, адрес, телефон, почта',
            'meta_description' => 'Контактные данные'
        ]);

        $this->insert('static_pages', [
            'title' => 'О НАС',
            'alias' => 'aboutus',
            'published' => 1,
            'content' => '<h2>Немного о нашем проекте</h2> <div class=  "b-info__about__content  "> 			<p>Сервис MyRank позволяет оценивать разнообразные 			    качества пользователей по 10-балльной шкале и выводить 			    общую среднюю оценку их рейтинга.</p> 			<p>При оценивании пользователя по какому либо критерию, 			    оценивающий имеет возможность ввести свой отзыв, 			    пояснив текстом, почему он поставил ту или иную оценку.</p> 			<p>По общей и средним оценкам строятся полярные 			    диаграммы по категориям и критериям оценки. В 			    идеальном случае, диаграмма должна представлять собой 			    круг – колесо, которое свободно и ровно катится по жизни.</p> 			<p>Отсюда вытекает миссия сервиса MyRank: помогать людям 			    контролировать свои приоритеты и «выравнивать колесо» 			    своей жизни.</p> 		    </div>',
            'title_browser' => 'О НАС',
            'meta_keywords' => 'о нас, проект, сервис, оценивать, рейтинг',
            'meta_description' => 'о нас, о нашем проекте'
        ]);

        $this->insert('static_pages', [
            'title' => 'ПОМОЩЬ',
            'alias' => 'help',
            'published' => 1,
            'content' => '<h2>Как работает сервис</h2> 		    <div class=  "b-info__how-work__content  "> 			<ul> 			    <li><span class=  "b-info__how-work__icon b-info__how-work__icon_1  "></span> 				<span class=  "b-info__how-work__text  ">Регистрация Пользователя/Компании</span> 			    </li> 			    <li> 				<span class=  "b-info__how-work__icon b-info__how-work__icon_2  "></span> 				<span class=  "b-info__how-work__text  ">Заполните информацию о профиле, чтобы получить максимально высокий бал.</span> 			    </li> 			    <li> 				<span class=  "b-info__how-work__icon b-info__how-work__icon_3  "></span> 				<span class=  "b-info__how-work__text  ">Оценивайте партнеров, коллег и знакомых, оставляйте о них отзывы.</span> 			    </li> 			    <li> 				<span class=  "b-info__how-work__icon b-info__how-work__icon_4  "></span> 				<span class=  "b-info__how-work__text  ">Повышайте рейтинг профиля, получайте отзывы.</span> 			    </li> 			    <li> 				<span class=  "b-info__how-work__icon b-info__how-work__icon_5  "></span> 				<span class=  "b-info__how-work__text  ">Высокий рейтинг - карьерный рост.</span> 			    </li> 			    <li> 				<span class=  "b-info__how-work__icon b-info__how-work__icon_6  "></span> 				<span class=  "b-info__how-work__text  ">Ищите партнеров для своего бизнеса.</span> 			    </li> 			</ul> 		    </div> 		</div>',
            'title_browser' => 'ПОМОЩЬ',
            'meta_keywords' => 'сервис, регистрация, профиль, отзыв, рейтинг, партнеры',
            'meta_description' => 'работа сервиса'
        ]);

        $this->insert('static_pages', [
            'title' => 'УСЛОВИЯ & ЗАЩИТА',
            'alias' => 'legalinfo',
            'published' => 1,
            'content' => '<div class=  "col s12 m12 l8 l2--push category-header  "><h1 class=  "category-header__title  ">Условия использования</h1><p class=  "category-header__subtitle  ">Это соглашение призвано урегулировать отношения между                 пользователями сервиса MyRank и ЧП «», как                 титульным владельцем сервиса MyRank, торговой марки , доменного имени и прав на                 использование объектов интеллектуальной собственности.</p></div>',
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