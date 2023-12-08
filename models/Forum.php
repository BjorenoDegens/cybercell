<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "forum".
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $message
 * @property int $visible
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Replys[] $replys
 * @property User $user
 */
class Forum extends \yii\db\ActiveRecord
{

    const VISIBLE = 1;
    const INVISIBLE = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forum';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'message', 'visible',], 'required'],
            [['user_id'], 'integer'],
            [['message'], 'string'],
            [['visible'], 'in', 'range' => [self::VISIBLE, self::INVISIBLE]],
            [['title'], 'string', 'max' => 60],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'message' => 'Message',
            'visible' => 'Visible',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Replys]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReplys()
    {
        return $this->hasMany(Replys::class, ['forum_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
