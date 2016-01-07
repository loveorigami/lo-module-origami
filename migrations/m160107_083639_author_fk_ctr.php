<?php

use yii\db\Migration;

class m160107_083639_author_fk_ctr extends Migration
{
    public function up()
    {

        $this->createIndex('idx_author_ctr', '{{%origami__author}}', 'ctr_id');

/*        $this->addForeignKey('fk_love_aut_cat_love_aut', '{{%origami__author}}', 'ctr_id', '{{%geo__country}}', 'id',  'CASCADE', 'CASCADE');*/
    }


    public function down()
    {
        echo "m160107_083639_author_fk_ctr cannot be reverted.\n";

        return false;
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
