<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book_authors".
 *
 * @property int $id_author
 * @property int $id_book
 *
 * @property Author $author
 * @property Book $book
 */
class BookAuthors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_author', 'id_book'], 'required'],
            [['id_author', 'id_book'], 'integer'],
            [['id_author', 'id_book'], 'unique', 'targetAttribute' => ['id_author', 'id_book']],
            [['id_author'], 'exist', 'skipOnError' => true, 'targetClass' => Author::class, 'targetAttribute' => ['id_author' => 'id']],
            [['id_book'], 'exist', 'skipOnError' => true, 'targetClass' => Book::class, 'targetAttribute' => ['id_book' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_author' => 'Id Author',
            'id_book' => 'Id Book',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::class, ['id' => 'id_author']);
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::class, ['id' => 'id_book']);
    }

}
