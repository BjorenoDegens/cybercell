<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "merchandise".
 *
 * @property int $id
 * @property string $name
 * @property string|null $category
 * @property float $price
 * @property string $payment_option
 * @property string $created_at
 * @property string $updated_at
 */
class Merchandise extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'merchandise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'category', 'payment_option'], 'string', 'max' => 60],
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
            'name' => 'Name',
            'category' => 'Category',
            'price' => 'Price',
            'payment_option' => 'Payment Option',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
