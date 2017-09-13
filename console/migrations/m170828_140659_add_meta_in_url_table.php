<?php

use yii\db\Migration;

class m170828_140659_add_meta_in_url_table extends Migration {

    public function safeUp() {
        $this->addColumn("{{url_rules}}", "meta_tag_rules", $this->string(255)->notNull()->after("rules"));
        $this->addColumn("{{url_rules}}", "meta_descr_rules", $this->string(255)->notNull()->after("rules"));
        $this->addColumn("{{seo_url}}", "meta_tags", $this->string(255)->notNull());
        $this->addColumn("{{seo_url}}", "meta_descr", $this->string(255)->notNull());
    }

    public function safeDown() {
        $this->dropColumn("{{url_rules}}", "meta_tag_rules");
        $this->dropColumn("{{url_rules}}", "meta_descr_rules");
        $this->dropColumn("{{seo_url}}", "meta_tags");
        $this->dropColumn("{{seo_url}}", "meta_descr");
    }

}
