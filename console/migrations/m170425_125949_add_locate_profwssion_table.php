<?php

use yii\db\Migration;

class m170425_125949_add_locate_profwssion_table extends Migration {

    public function up() {
	$this->addColumn("{{profession}}", "title_ua", $this->string(255)->notNull()->defaultValue(""));
	$this->addColumn("{{profession}}", "title_en", $this->string(255)->notNull()->defaultValue(""));
    }

    public function down() {
	$this->dropColumn("{{profession}}", "title_ua");
	$this->dropColumn("{{profession}}", "title_en");
    }

}
