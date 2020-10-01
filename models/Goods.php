<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property int $good_id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $images
 * @property int|null $balance
 * @property float|null $price
 *
 * @property OrderGoods[] $orderGoods
 */
class Goods extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['images'], 'string'],
            [['imageFile'], 'file', 'extensions' => 'png, jpg, gif'],
            [['balance'], 'integer'],
            [['price'], 'number'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }


    public function uploadImage()
    {
        if ($this->validate() && $this->imageFile) {
            // save images
            $fileName = $this->imageFile->baseName . '.' .
                $this->imageFile->extension;
            $flag = $this->imageFile->saveAs( 'images/' . $fileName );

            $this->images = $fileName;

            return $flag;
        } else {
            return false;
        }
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'good_id' => 'Good ID',
            'name' => 'Название',
            'description' => 'Описание',
            'images' => 'Изображение',
            'balance' => 'Остаток',
            'price' => 'Цена',
        ];
    }

    /**
     * Gets query for [[OrderGoods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderGoods()
    {
        return $this->hasMany(OrderGoods::className(), ['good_id' => 'good_id']);
    }
}
