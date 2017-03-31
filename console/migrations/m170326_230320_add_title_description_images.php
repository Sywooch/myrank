<?php

use yii\db\Migration;

class m170326_230320_add_title_description_images extends Migration {

    public function up() {
	$this->addColumn("{{%images}}", "title", $this->string(255)->defaultValue("")->notNull()->comment("Название проекта"));
	$this->addColumn("{{%images}}", "description", $this->text()->notNull()->comment("Описание проекта"));
    }

    public function down() {
	$this->dropColumn("{{%images}}", "title");
	$this->dropColumn("{{%images}}", "description");
    }
}
