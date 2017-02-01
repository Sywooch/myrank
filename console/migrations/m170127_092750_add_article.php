<?php
use yii\db\Migration;

class m170127_092750_add_article extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%article_category}}',[
            'id_article_category'   => $this->bigPrimaryKey(20),                                                        // bigint(20) NOT NULL AUTO_INCREMENT,
            'name'                  => $this->string(128)->notNull()->comment("Наименование категории")                 // varchar(128) COLLATE utf8_unicode_ci NOT NULL,
            ], $tableOptions
        );

        $this->createTable('{{%article}}', [
            'id_article'            => $this->bigPrimaryKey(20),                                                        // bigint(20) NOT NULL AUTO_INCREMENT,
            'title'                 => $this->string(255)->notNull()->comment("Наименование статьи"),                   // varchar(255) COLLATE utf8_unicode_ci NOT NULL,
            'content'               => $this->text()->comment("Текст статьи"),                                          // text COLLATE utf8_unicode_ci,
            'header_title'          => $this->string(128)->notNull()->comment("Заголовок статьи / Дата"),               // varchar(255) COLLATE utf8_unicode_ci NOT NULL,
            'header_image'          => $this->string(255)->comment("Изображение статьи"),                               // varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
            'header_image_small'    => $this->string(255)->comment("Уменьшенная фото для списка статей"),               // varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
            'article_category_id'   => $this->bigInteger(20)->defaultValue(1)->comment("Наименование категории/Новости(по умолч 1)"), // bigint(20) NOT NULL DEFAULT 1, //'header_info_item_tags'
            'status'                => $this->smallInteger()->notNull()->defaultValue(10)->comment("Статус статьи"),    // smallint(6) NOT NULL DEFAULT '10',
            'views'                 => $this->bigInteger(20)->defaultValue(0)->comment("Количество просмотров"),        // bigint(20) DEFAULT '0',
            'create_time'           => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment("Отметка времени создания"),
            'update_time'           => $this->timestamp()->null()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP')->comment("Отметка времени обновления"),
            //'create_time' => $this->dateTime()->notNull(), // datetime NOT NULL, //'create_time' => $this->integer(11),
            //'update_time' => $this->dateTime()->notNull(), // datetime NOT NULL,//'update_time' => $this->integer(11),
            // 'header_info_item_social'=> $this->string(200),  // like 1, tweet 18
        ], $tableOptions);

        // creates index for column `article_category_id` // KEY `idx-article-article_category_id` (`article_category_id`),
        $this->createIndex(
            'idx-article-article_category_id',
            'article',
            'article_category_id'
        );

        // creates foreign key for column `article_category_id` // CONSTRAINT `article_articlecategory` FOREIGN KEY (`article_category_id`) REFERENCES `article_category` (`id_article_category`)
        $this->addForeignKey(
            'article_articlecategory',
            'article', 'article_category_id',
            'article_category', 'id_article_category'
        );

        $this->insert('article_category', [
            'name'=>'Новости',
        ]);

        $this->insert('article_category', [
            'name'=>'Продуктивность',
        ]);

        $this->insert('article', [
            'title' => 'Самая большая ошибка на собеседовании',
            'content' => 'Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая страна, в которой жаренные члены предложения залетают прямо в рот.',
            'header_title'=>'27.01.2017',
            'header_image'=> 'http://project-1.topsu.ru/images/b-article__header__image/1.jpg',
            'header_image_small'=> '',
            //'article_category_id'=> 0,
            //'status' = 10,
            //'views' = 0,
            //'create_time' = '2016-08-08 14:55:12',
            //'update_time' = '2016-08-08 14:55:12'
        ]);
        $this->insert('article', [
            'title' => 'Формула успешного собеседования',
            'content' => 'Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая страна, в которой жаренные члены предложения залетают прямо в рот.',
            'header_title'=>'29.01.2017',
            'header_image'=> '',
            'header_image_small'=> 'http://project-1.topsu.ru/images/b-articles/b-articles_large/1.jpg',
            'article_category_id'=> 2,
            //'status' = 10,
            //'views' = 0,
            //'create_time' = '2016-08-08 14:55:12',
            //'update_time' = '2016-08-08 14:55:12'
        ]);
    }

    public function down()
    {
        //echo "m170127_092750_add_article cannot be reverted.\n"; //return false;
        $this->dropForeignKey('article_articlecategory','article');
        $this->dropIndex(
            'idx-article-article_category_id',
            'article'
        );
        $this->dropTable('{{%article}}');
        $this->dropTable('{{%article_category}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
