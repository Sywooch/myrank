<?php

use yii\db\Migration;

class m170620_151732_add_field_image_at_company extends Migration {

    public function safeUp() {
        $this->addColumn("{{company}}", "image", $this->string(255)->notNull()->defaultValue(""));
    }

    public function safeDown() {
        $this->dropColumn("{{company}}", "image");
    }

}
