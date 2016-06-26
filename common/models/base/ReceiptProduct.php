<?php

/*
*  This file is part of the HomeFinanceV2 project.
*
*  (c) Rafalsky.com <http://github.com/Rafalsky/>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace common\models\base;

/**
 * This is the base-model class for table "{{%receipt_product}}".
 *
 * @property integer $id
 * @property integer $receipt_id
 * @property integer $product_id
 * @property double $count
 * @property float $total_price
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Product $product
 * @property Receipt $receipt
 */
abstract class ReceiptProduct extends \common\models\base\TimestampedModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%receipt_product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['receipt_id', 'product_id', 'created_at'], 'required'],
            [['receipt_id', 'product_id'], 'integer'],
            [['count', 'total_price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['receipt_id'], 'exist', 'skipOnError' => true, 'targetClass' => Receipt::className(), 'targetAttribute' => ['receipt_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('common', 'ID'),
            'receipt_id' => \Yii::t('common', 'Receipt ID'),
            'product_id' => \Yii::t('common', 'Product ID'),
            'count' => \Yii::t('common', 'Count'),
            'total_price' => \Yii::t('common', 'Total Price'),
            'created_at' => \Yii::t('common', 'Created At'),
            'updated_at' => \Yii::t('common', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(\common\models\Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceipt()
    {
        return $this->hasOne(\common\models\Receipt::className(), ['id' => 'receipt_id']);
    }
}
