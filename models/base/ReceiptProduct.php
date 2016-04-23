<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\models\base;

use yii\db\ActiveRecord;

/**
 * This is the base-model class for table "receipt_product".
 *
 * @property integer $id
 * @property integer $receipt_id
 * @property integer $product_id
 * @property double $count
 * @property string $total_price
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Product $product
 * @property \app\models\Receipt $receipt
 * @property string $aliasModel
 */
abstract class ReceiptProduct extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%receipt_product}}';
    }

    /**
     * Alias name of table for crud viewsLists all Area models.
     * Change the alias name manual if needed later
     * @param bool $plural
     * @return string
     */
    public function getAliasModel($plural = false)
    {
        if ($plural) {
            return \Yii::t('app', 'ReceiptProducts');
        } else {
            return \Yii::t('app', 'ReceiptProduct');
        }
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
            [
                ['product_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Product::className(),
                'targetAttribute' => ['product_id' => 'id']
            ],
            [
                ['receipt_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Receipt::className(),
                'targetAttribute' => ['receipt_id' => 'id']
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('app', 'ID'),
            'receipt_id' => \Yii::t('app', 'Receipt ID'),
            'product_id' => \Yii::t('app', 'Product ID'),
            'count' => \Yii::t('app', 'Count'),
            'total_price' => \Yii::t('app', 'Total Price'),
            'created_at' => \Yii::t('app', 'Created At'),
            'updated_at' => \Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(),
            [
                'id' => \Yii::t('app', 'ID'),
                'receipt_id' => \Yii::t('app', 'Receipt Id'),
                'product_id' => \Yii::t('app', 'Product Id'),
                'count' => \Yii::t('app', 'Count'),
                'total_price' => \Yii::t('app', 'Total Price'),
                'created_at' => \Yii::t('app', 'Created At'),
                'updated_at' => \Yii::t('app', 'Updated At'),
            ]
        );
    }

    /**
     * @return \\Yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(\app\models\Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \\Yii\db\ActiveQuery
     */
    public function getReceipt()
    {
        return $this->hasOne(\app\models\Receipt::className(), ['id' => 'receipt_id']);
    }
}
