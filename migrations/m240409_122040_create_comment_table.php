<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m240409_122040_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'id_city' => $this->integer(),
            'title' => $this->string(100),
            'text' => $this->text(255),
            'rating' => $this->integer(),
            'img' => $this->text(),
            'id_author' => $this->integer(),
            'date_create' => $this->date(),
        ]);

        $this->createIndex(
            'idx-comment-id_author',
            'comment',
            'id_author'
        );

        $this->addForeignKey(
            'fk-comment-id_author',
            'comment',
            'id_author',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-comment-id_city',
            'comment',
            'id_city'
        );

        $this->addForeignKey(
            'fk-comment-id_city',
            'comment',
            'id_city',
            'city',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment}}');

        $this->dropForeignKey(
            'fk-comment-id_author',
            'comment'
        );

        $this->dropIndex(
            'idx-comment-id_author',
            'comment'
        );

        $this->dropForeignKey(
            'fk-comment-id_city',
            'comment'
        );

        $this->dropIndex(
            'idx-comment-id_city',
            'comment'
        );
    }
}
