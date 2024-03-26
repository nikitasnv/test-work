<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book_authors}}`.
 */
class m240325_151150_create_book_authors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book_authors}}', [
            'id_author' => $this->integer()->notNull(),
            'id_book' => $this->integer()->notNull(),
            'PRIMARY KEY (id_author,id_book)'
        ]);

        $this->addForeignKey(
            'author_fk_id',
            '{{%book_authors}}',
            'id_author',
            '{{%author}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'book_fk_id',
            '{{%book_authors}}',
            'id_book',
            '{{%book}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book_authors}}');
    }
}
