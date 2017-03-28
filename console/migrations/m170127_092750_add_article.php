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
            'id_article_category'   => $this->bigPrimaryKey(20),
            'name'                  => $this->string(128)->notNull()->comment("Наименование категории")
            ], $tableOptions
        );

        $this->createTable('{{%article}}', [
            'id_article'            => $this->bigPrimaryKey(20),
            'title'                 => $this->string(255)->notNull()->comment("Наименование статьи"),
            'abridgment'            => $this->string(255)->notNull()->comment("Сокращенная часть статьи (для списка статей)"),
            'content'               => $this->text()->comment("Текст статьи"),
            'header_title'          => $this->string(128)->notNull()->comment("Заголовок статьи / Дата"),
            'header_image'          => $this->string(255)->comment("Изображение статьи"),
            'header_image_small'    => $this->string(255)->comment("Уменьшенная фото для списка статей"),
            'article_category_id'   => $this->bigInteger(20)->defaultValue(1)->comment("Наименование категории/Новости(по умолч 1)"),
            'status'                => $this->smallInteger()->notNull()->defaultValue(10)->comment("Статус статьи"),
            'views'                 => $this->bigInteger(20)->defaultValue(0)->comment("Количество просмотров"),
            'create_time'           => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment("Отметка времени создания"),
            'update_time'           => $this->timestamp()->null()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP')->comment("Отметка времени обновления"),
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
            'abridgment'=> 'Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты.',
            'content' => 'Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая страна, в которой жаренные члены предложения залетают прямо в рот.',
            'header_title'=>'27.01.2017',
            'header_image'=> 'http://project-1.topsu.ru/images/b-article__header__image/1.jpg',
            'header_image_small'=> 'http://project-1.topsu.ru/images/b-articles/b-articles_large/1.jpg',
        ]);

        $this->insert('article', [
            'title' => 'Формула успешного собеседования',
            'abridgment'=> 'Близко-близко в стране глупых согласных живут рыбные тексты.',
            'content' => 'Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая страна, в которой жаренные члены предложения залетают прямо в рот.',
            'header_title'=>'29.01.2017',
            'header_image'=> 'http://project-1.topsu.ru/images/b-article__header__image/1.jpg',
            'header_image_small'=> 'https://thumbs.dreamstime.com/t/set-children-colorful-dialog-speech-bubbles-vector-illustration-thinking-concept-53578743.jpg',
            'article_category_id'=> 2,
        ]);
    }

    public function down()
    {
        $this->dropForeignKey('article_articlecategory','article');
        $this->dropIndex(
            'idx-article-article_category_id',
            'article'
        );
        $this->dropTable('{{%article}}');
        $this->dropTable('{{%article_category}}');
    }
}