<?php

/**
 *  This file is part of the HomeFinanceV2 project.
 *
 *  (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\models;

use \common\models\base\Receipt as BaseReceipt;
use yii\db\Exception;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use trntv\filekit\behaviors\UploadBehavior;

/**
 * This is the model class for table "receipt".
 */
class Receipt extends BaseReceipt
{
    public $image;

    public static function getMineReceipts()
    {
        return self::find()->where(['user_id' => User::current()->id])->all();
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'image',
                'pathAttribute' => 'image_path',
                'baseUrlAttribute' => 'image_base_url'
            ]
        ];
    }

    public function getTotalPrice()
    {
        $price = 0;
        foreach ($this->receiptProducts as $product) {
            $price += $product->total_price;
        }
        return (float)$price;
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['shop_id', 'date'], 'required'],
            [['shop_id', 'is_live'], 'integer'],
            [['notes'], 'string'],
            [['image'], 'safe'],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shop::className(), 'targetAttribute' => ['shop_id' => 'id']],
            [['date'], 'date', 'format' => 'php:Y-m-d']
        ]);
    }

    public function beforeValidate()
    {
        $this->updateTimestamps();
        $this->setUser();
        $this->setWallet();
        return parent::beforeValidate();
    }

    public function saveProducts($products)
    {
        foreach ($products as $product) {
            if (!$product['name']) {
                continue;
            }
            $productModel = Product::findOrCreate(['shop_id' => $this->shop_id, 'name' => $product['name']]);
            if (!$productModel->save()) {
                throw new Exception(\Yii::t('backend', 'Cannot save product model'));
            }
            ProductPrice::updateIfRequired($productModel->id, $product['price']);
            $receiptProduct = new ReceiptProduct();
            $receiptProduct->receipt_id = $this->id;
            $receiptProduct->product_id = $productModel->id;
            $receiptProduct->count = (float) str_replace(',', '.', $product['count']);
            $receiptProduct->total_price = (float) str_replace(',', '.', $product['totalPrice']);
            if (!$receiptProduct->save()) {
                throw new Exception(\Yii::t('backend', 'Cannot save {modelName} model', ['{modelName}' => get_class($receiptProduct)]));
            }
        }
        return true;
    }

    // -- private

    private function setUser()
    {
        $this->user_id = User::current()->id;
    }

    private function setWallet()
    {
        $this->wallet_id = Wallet::current()->id;
    }

    private function updateTimestamps()
    {
        if ($this->isNewRecord) {
            $this->created_at = new Expression('NOW()');
        } else {
            $this->updated_at = new Expression('NOW()');
        }
    }
}
