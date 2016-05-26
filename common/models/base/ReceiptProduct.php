<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\models\base;

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
 * @property \common\models\Product $product
 * @property \common\models\Receipt $receipt
 * @property string $aliasModel
 */
abstract class ReceiptProduct extends BaseModel
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
            return \Yii::t('common', 'ReceiptProducts');
        } else {
            return \Yii::t('common', 'ReceiptProduct');
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
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(),
            [
                'id' => \Yii::t('common', 'ID'),
                'receipt_id' => \Yii::t('common', 'Receipt Id'),
                'product_id' => \Yii::t('common', 'Product Id'),
                'count' => \Yii::t('common', 'Count'),
                'total_price' => \Yii::t('common', 'Total Price'),
                'created_at' => \Yii::t('common', 'Created At'),
                'updated_at' => \Yii::t('common', 'Updated At'),
            ]
        );
    }

    /**
     * @return \\Yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(\common\models\Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \\Yii\db\ActiveQuery
     */
    public function getReceipt()
    {
        return $this->hasOne(\common\models\Receipt::className(), ['id' => 'receipt_id']);
    }
}
