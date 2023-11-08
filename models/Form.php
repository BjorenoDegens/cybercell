<?php

namespace app\models;

use app\models\Replys\Replys;
use Yii;

/**
 * This is the model class for table "form".
 *
 * @property int $id
 * @property int $user_id
 * @property string $message
 * @property int $visible
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $title
 *
 * @property Replys[] $replys
 * @property User $user
 */
class Form extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'form';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'message', 'visible', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'visible'], 'integer'],
            [['message'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 64],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'message' => 'Message',
            'visible' => 'Visible',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[Replys]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReplys()
    {
        return $this->hasMany(Replys::class, ['form_id' => 'id']);
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
