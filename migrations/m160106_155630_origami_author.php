<?php

use yii\db\Migration;

class m160106_155630_origami_author extends Migration
{
    public $tableName = "{{%origami__author}}";

    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'status' => 'tinyint(1) NOT NULL DEFAULT 0',
            'author_id' => $this->integer()->notNull(),
            'updater_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),

            'name' => $this->string()->notNull(),
            'name_ru' => $this->string(),
            'slug' => $this->string()->unique(),
            'text' => $this->text(),
            'img' => $this->string(),
            'link' => $this->string(),

            'ctr_id' => $this->integer(),
            'flickr' => $this->string(),
            'facebook' => $this->string(),
            'youtube' => $this->string(),
            'email' => $this->string(),

            'total_hits' => $this->integer(),

            'in_ori' => 'tinyint(1) NOT NULL DEFAULT 0',
            'in_wiki' => 'tinyint(1) NOT NULL DEFAULT 0',
            'in_news' => 'tinyint(1) NOT NULL DEFAULT 0',

            'title' => $this->string(),
            'keywords' => $this->string(),
            'description' => $this->string(),
        ]);

        $this->createIndex('idx_author_status', $this->tableName, 'status');
        $this->createIndex('idx_author_ori', $this->tableName, 'in_ori');
        $this->createIndex('idx_author_wiki', $this->tableName, 'in_wiki');
        $this->createIndex('idx_author_news', $this->tableName, 'in_news');

    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
