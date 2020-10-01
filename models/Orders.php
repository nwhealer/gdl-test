<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $order_id
 * @property int|null $user_id
 * @property string|null $description
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $status_change
 *
 * @property OrderGoods[] $orderGoods
 */
class Orders extends \yii\db\ActiveRecord
{
    public $statusList = [
        '1' => 'Сборка',
        '2' => 'В пути',
        '3' => 'Доставлен',
    ];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'status'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'status_change'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'user_id' => 'User ID',
            'description' => 'Комментарий',
            'status' => 'Статус',
            'created_at' => 'Создан',
            'status_change' => 'Status Change',
        ];
    }

    /**
     * Gets query for [[OrderGoods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderGoods()
    {
        return $this->hasMany(OrderGoods::className(), ['order_id' => 'order_id']);
    }
}
