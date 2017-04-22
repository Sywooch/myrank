<?php

use yii\db\Migration;

class m170421_090641_add_column_city_id_table_company extends Migration {

    public function up() {
	$this->addColumn("{{company}}", "city_id", $this->integer(11)->notNull()->defaultValue(0));
    }

    public function down() {
	$this->dropColumn("{{company}}", "city_id");
    }

}
