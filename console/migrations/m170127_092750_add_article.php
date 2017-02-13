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
            'abridgment'            => $this->string(255)->notNull()->comment("Сокращенная часть статьи (для списка статей)"),
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
            'abridgment'=> 'Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты.',
            'content' => 'Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая страна, в которой жаренные члены предложения залетают прямо в рот.',
            'header_title'=>'27.01.2017',
            'header_image'=> 'http://project-1.topsu.ru/images/b-article__header__image/1.jpg',
            'header_image_small'=> 'http://project-1.topsu.ru/images/b-articles/b-articles_large/1.jpg',
            //'article_category_id'=> 0,
            //'status' = 10,
            //'views' = 0,
            //'create_time' = '2016-08-08 14:55:12',
            //'update_time' = '2016-08-08 14:55:12'
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
        $this->insert('article', [
            'title' => 'Что раздражает HR-менеджеров в соискателях',
            'abridgment'=> 'Какие поступки и качества претендентов на вакансию выводят рекрутеров из себя, и как нужно себя вести, чтобы не стать объектом раздражения.',
            'content' => 'Человек, который ищет работу, приходит на собеседование с твердым намерением произвести на рекрутера позитивное впечатление. Но часто получается с точностью до наоборот. Соискатели из раза в раз допускают ошибки, раздражающие настолько, что они рискуют услышать: «Нет, Вы нам не подходите».',
            'header_title'=>'26.01.2017',
            'header_image'=> 'https://talentoenexpansion.files.wordpress.com/2013/04/tecno3.png?w=584&h=237',
            'header_image_small'=> 'https://thumbs.dreamstime.com/t/modern-classic-social-network-flat-concept-icon-set-illustration-46370615.jpg',
        ]);

        $this->insert('article', [
            'title' => 'Как сэкономить 21 день в году',
            'abridgment'=> 'Каждый день мы тратим уйму времени на действия, которые можно выполнять гораздо быстрее, чтобы сохранить ',
            'content' => 'Наверняка вы хотя бы однажды задумывались о том, как много времени уходит в никуда. Утренние сборы на работу, поездка в общественном транспорте, ожидание в очереди на кассе супермаркета, даже каждый светофор ворует у нас время.',
            'header_title'=>'25.01.2017',
            'header_image'=> 'https://lbfn.files.wordpress.com/2015/01/holi.jpg?w=584&h=237',
            'header_image_small'=> 'https://thumbs.dreamstime.com/t/modern-classic-social-network-flat-concept-icon-set-vector-46370929.jpg',
        ]);

        $this->insert('article', [
            'title' => 'Корпоративное похмелье — почему вчера было хорошо, а теперь не очень',
            'abridgment'=> 'В этой статье речь пойдет не о восстановлении после корпоративной вечеринки. А о том, почему мы теряем мотивацию',
            'content' => 'Новая работа — это источник ожиданий, надежд, возможностей и планов. Но иногда после нескольких лет, месяцев или даже дней энтузиазм начинает стихать, желание работать на полную мощность угасает и наступает разочарование. ',
            'header_title'=>'24.01.2017',
            'header_image'=> 'https://dnaexplained.files.wordpress.com/2014/06/river-cruise-10.jpg?w=584&h=237',
            'header_image_small'=> 'https://thumbs.dreamstime.com/t/modern-classic-online-markeing-flat-concept-icon-set-vector-46370980.jpg',
        ]);

        $this->insert('article', [
            'title' => 'В Украине стало больше работы. Итоги рынка труда-2016',
            'abridgment'=> 'После двух сложных для украинского рынка труда лет в 2016-м практически восстановилась активность работодателей. ',
            'content' => 'Весь год работодатели нанимали персонал, и были месяцы, когда количество вакансий превышало показатели аналогичных периодов 2015 года вдвое. В абсолютных величинах это наибольший рост количества предложений работодателей за всю 10-ти летнюю историю нашего сайта!',
            'header_title'=>'22.01.2017',
            'header_image'=> 'http://www.urbancusp.com/wp-content/uploads/2011/07/360-leadership.jpg',
            'header_image_small'=> 'https://thumbs.dreamstime.com/t/international-business-team-man-front-17759252.jpg',
        ]);

        $this->insert('article', [
            'title' => 'Лучшие отели мира по версии журнала Conde Nast Traveller',
            'abridgment'=> 'Журнал Conde Nast Traveller составил рейтинг сотни лучших отелей мира, и роскошный отель на острове Сен-Бартелеми,',
            'content' => 'Журнал Conde Nast Traveller составил рейтинг сотни лучших отелей мира, и роскошный отель на острове Сен-Бартелеми, принадлежащий потенциальным свекру и свекрови сестры герцогини Кейт, Пиппы Миддлтон, занял первое место. Отель Eden Rock гостиничной группы Oetker Collection, в которую также входят пятизвездочные Lanesborough в Лондоне и Le Bristol в Париже, занял первое место по количеству голосов читателей журнала. Родители Джеймса Мэттьюса также владеют еще одним участником рейтинга — Hotel du Cap-Eden-Roc на Антибах.',
            'header_title'=>'20.01.2017',
            'header_image'=> 'https://talentoenexpansion.files.wordpress.com/2013/04/tecno3.png?w=584&h=237',
            'header_image_small'=> 'https://thumbs.dreamstime.com/t/hong-kong-business-people-commuting-concept-60799124.jpg',
        ]);

        $this->insert('article', [
            'title' => 'Пластический хирург сделал идеальное лицо из самых часто запрашиваемых черт звезд',
            'abridgment'=> 'Всеобщее восприятие красоты довольно неопределенно и размыто, однако пластический хирург Джулиан де Сильва',
            'content' => 'Составленный фоторобот представляет собой сочетание черт лиц знаменитостей, скопировать которые чаще всего хотели клиентки доктора де Сильвы. Кейт Миддлтон, герцогиня Кембриджская, оказывается, обладает «идеальным с математической точки зрения носом», который возглавил топ запрашиваемых черт звезд. ',
            'header_title'=>'18.01.2017',
            'header_image'=> 'https://lbfn.files.wordpress.com/2015/01/holi.jpg?w=584&h=237',
            'header_image_small'=> 'https://thumbs.dreamstime.com/t/set-children-colorful-dialog-speech-bubbles-vector-illustration-thinking-concept-53578743.jpg',
        ]);

        $this->insert('article', [
            'title' => 'Когда почтальон — не Печкин: эпические промахи службы доставки',
            'abridgment'=> 'Теперь, когда интернет стал доступен простым людям, делать покупки гораздо проще.',
            'content' => 'Теперь, когда интернет стал доступен простым людям, делать покупки гораздо проще. Достаточно пошевелить мышкой, пару раз кликнуть, и вот вы уже что-то купили. Получить свою покупку еще проще: вы просто сидите дома и ждете доставку. Что тут может пойти не так? ',
            'header_title'=>'15.01.2017',
            'header_image'=> 'https://dnaexplained.files.wordpress.com/2014/06/river-cruise-10.jpg?w=584&h=237',
            'header_image_small'=> 'https://thumbs.dreamstime.com/t/modern-classic-social-network-flat-concept-icon-set-illustration-46370615.jpg',
        ]);

        $this->insert('article', [
            'title' => 'Тайная жизнь злодеев из «Звездных войн»',
            'abridgment'=> '10 декабря в кинотеатрах начался показ очередной истории из мира «Звездных войн» — «Изгой-один: Звездные войны. Истории»',
            'content' => '10 декабря в кинотеатрах начался показ очередной истории из мира «Звездных войн» — «Изгой-один: Звездные войны. Истории», и это снова подогрело интерес к знаменитой франшизе. Наверное, любопытно, чем занимаются персонажи любимой саги на досуге? Маленьких штурмовиков и миниатюрного Дарта Вейдера застали за повседневными делами — принимающими ванну, заворачивающими подарки, выгуливающими питомцев. ',
            'header_title'=>'13.01.2017',
            'header_image'=> 'http://www.urbancusp.com/wp-content/uploads/2011/07/360-leadership.jpg',
            'header_image_small'=> 'https://thumbs.dreamstime.com/t/modern-classic-social-network-flat-concept-icon-set-vector-46370929.jpg',
        ]);

        $this->insert('article', [
            'title' => 'Мама превратила фотографию пьяной дочери в торт в качестве назидания',
            'abridgment'=> 'На прошлой неделе Эбби Прайс из британского города Ковентри исполнилось 18 лет.',
            'content' => 'На прошлой неделе Эбби Прайс из британского города Ковентри исполнилось 18 лет. И как водится, ее мама, Шэрон, поздравила дочку с днем рождения и преподнесла ей вот такой необычный торт. Снимок с праздничным тортом и с фотографией, которая и послужила вдохновением, уже успел разойтись по интернету. ',
            'header_title'=>'12.01.2017',
            'header_image'=> 'https://californiaendlesssummer.files.wordpress.com/2016/06/img_7838.jpg?w=584&h=237',
            'header_image_small'=> 'https://thumbs.dreamstime.com/t/modern-classic-online-markeing-flat-concept-icon-set-vector-46370980.jpg',
        ]);

        $this->insert('article', [
            'title' => 'Американка победила рак и похудела на 50 килограммов, чтобы пережить смерть дочери',
            'abridgment'=> '45-летняя жительница штата Аризона Анджела Дунэн потеряла дочь: девушка умерла от почечной недостаточности.',
            'content' => '45-летняя жительница штата Аризона Анджела Дунэн потеряла дочь: девушка умерла от почечной недостаточности. Анджеле было очень сложно справиться с печалью и тоской, которые в итоге вылились в проблемы со здоровьем: женщина стала набирать вес и увязла в депрессии. Чтобы помочь себе, Анджела села на диету и начала заниматься спортом. Что ж, теперь она вовсю готовится к своему первому чемпионату по бодибилдингу.',
            'header_title'=>'11.01.2017',
            'header_image'=> 'http://gadgetan.com/wp-content/uploads/2013/09/37.jpg',
            'header_image_small'=> 'https://thumbs.dreamstime.com/t/business-presentation-corporate-meeting-men-making-office-executive-delivering-to-his-colleagues-house-81460471.jpg',
        ]);

        $this->insert('article', [
            'title' => 'Як потрапити у міжнародну компанію і залишитися там працювати',
            'abridgment'=> 'Компанія Bosch розвіює стереотип про тупикові ситуації у житті студентів-стажистів і «замкнені кола», аби допомогти їм стати на професійний шлях.',
            'content' => 'Проблема працевлаштування молодих спеціалістів без досвіду роботи стоїть гостро. Навчаєшся мінімум чотири роки, ходиш на пари, намагаєшся засвоїти теорію і випускаєшся ніби-то справжнім спеціалістом. А працедавці кажуть, що цього недостатньо. Або, взагалі, це не те, що потрібно для практики.',
            'header_title'=>'09.01.2017',
            'header_image'=> 'https://talentoenexpansion.files.wordpress.com/2013/04/tecno3.png?w=584&h=237',
            'header_image_small'=> 'https://thumbs.dreamstime.com/t/hong-kong-business-people-commuting-concept-60799124.jpg',
        ]);

        $this->insert('article', [
            'title' => 'Как превратить недовольство в продуктивность',
            'abridgment'=> 'Если вам не хватает вдохновения для новых свершений или вы ждете знака судьбы, чтобы начать новую жизнь, это он — ваш сигнал к действию.',
            'content' => 'Недовольные люди окружают нас повсюду. Они жалуются на погоду, пробки, соседей, родственников. Если у них нет работы — все плохо, если она есть, то обязательно худшая в мире. Зарплата маленькая, шеф несправедливый, добираться долго, офис холодный. При этом они совершенно ничего не делают, чтобы изменить собственное положение.',
            'header_title'=>'08.01.2017',
            'header_image'=> 'https://lbfn.files.wordpress.com/2015/01/holi.jpg?w=584&h=237',
            'header_image_small'=> 'https://thumbs.dreamstime.com/t/set-children-colorful-dialog-speech-bubbles-vector-illustration-thinking-concept-53578743.jpg',
        ]);

        $this->insert('article', [
            'title' => 'Качества, которые помогут успешно пройти собеседование',
            'abridgment'=> 'Целеустремленность, стрессоустойчивость, коммуникабельность и ответственность на деле оказываются просто словами. ',
            'content' => 'Поиски работы только кажутся простой задачей: составляете резюме, рассылаете его на понравившиеся вакансии, дожидаетесь собеседования, и дело в шляпе. Как бы ни так!',
            'header_title'=>'05.01.2017',
            'header_image'=> 'https://dnaexplained.files.wordpress.com/2014/06/river-cruise-10.jpg?w=584&h=237',
            'header_image_small'=> 'https://thumbs.dreamstime.com/t/modern-classic-social-network-flat-concept-icon-set-illustration-46370615.jpg',
        ]);

        $this->insert('article', [
            'title' => 'Кто такой лидер и почему важно им быть',
            'abridgment'=> 'Чем отличается лидер от босса? Петр Синегуб, имеющий 12-летний опыт управления производственными и розничными компаниями',
            'content' => 'Босс и лидер — схожие между собой понятия. Оба связаны с руководством, оба предполагают управление коллективом. Но если задуматься, то отличия все-таки есть, и они существенные. Уверен в этом и Петр Синегуб — собственник 11 компаний в Украине и странах СНГ, основатель бизнес-академии «4SMART».',
            'header_title'=>'03.01.2017',
            'header_image'=> 'http://www.urbancusp.com/wp-content/uploads/2011/07/360-leadership.jpg',
            'header_image_small'=> 'https://thumbs.dreamstime.com/t/modern-classic-social-network-flat-concept-icon-set-vector-46370929.jpg',
        ]);

        $this->insert('article', [
            'title' => '4 вопроса от рекрутера, на которые нельзя ответить правильно',
            'abridgment'=> 'Чтобы успешно пройти собеседование, нужно выдержать ряд вопросов. При этом важно показать себя с лучшей стороны. ',
            'content' => 'Большинство из нас, собираясь на собеседование, испытывает волнение и страх оказаться хуже конкурентов, неправильно ответить на вопросы рекрутера, не так преподнести информацию о себе. Но чаще всего наши страхи надуманы и ничем не подкреплены. А на множество вопросов рекрутеров и вовсе не существует правильных ответов. Почему вы хотите у нас работать? Кем вы видите себя через 5 лет? Что вас мотивирует? Почему вы считаете себя лучшим кандидатом?',
            'header_title'=>'30.12.2016',
            'header_image'=> 'https://talentoenexpansion.files.wordpress.com/2013/04/tecno3.png?w=584&h=237',
            'header_image_small'=> 'https://thumbs.dreamstime.com/t/modern-classic-online-markeing-flat-concept-icon-set-vector-46370980.jpg',
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
