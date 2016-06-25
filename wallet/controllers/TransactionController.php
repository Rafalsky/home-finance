<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wallet\controllers;

use common\models\Product;
use common\models\Receipt;
use common\models\ReceiptProduct;
use yii\web\NotFoundHttpException;

class TransactionController extends DefaultModuleController
{
    public function actions()
    {
        return [
            'upload' => [
                'class' => \trntv\filekit\actions\UploadAction::class,
                'deleteRoute' => 'upload-delete'
            ],
            'upload-delete' => [
                'class' => \trntv\filekit\actions\DeleteAction::class
            ]
        ];
    }

    public function actionList()
    {
        $this->view->title = \Yii::t('wallet', 'List of transactions');
        $receipts = Receipt::getMineReceipts();
        return $this->render('list', [
            'receipts' => $receipts
        ]);
    }

    public function actionNewReceipt()
    {
        $this->view->title = \Yii::t('wallet', 'New receipt');
        $model = new Receipt();
        $model = $this->updateWithPostRequest($model);
        return $this->render('form', [
            'receipt' => $model
        ]);
    }

    public function actionReceipt($hash)
    {
        $model = $this->findReceipt($hash);
        $model = $this->updateWithPostRequest($model);
        return $this->render('form', [
            'receipt' => $model
        ]);
    }

    public function actionNewRow()
    {
        if (\Yii::$app->request->isPost && $number = \Yii::$app->request->post('rowNumber')) {
            return $this->renderPartial('_productTableRow', ['number' => $number]);
        }
        throw new NotFoundHttpException;
    }

    /**
     * @param Receipt $model
     * @throws \yii\base\ExitException
     */
    protected function afterSave($model)
    {
        $this->saveProducts($model);
        $this->redirect('list');
        \Yii::$app->end();
    }

    private function saveProducts(Receipt $model)
    {
        ReceiptProduct::deleteAll(['receipt_id' => $model->id]);
        if ($products = $this->getModelAttributesFromPost((new Product()))) {
            $model->saveProducts($products);
        }
    }

    private function findReceipt($hash)
    {
        $model = Receipt::findByHash($hash);
        if (!$model) {
            throw new NotFoundHttpException();
        }
        return $model;
    }
}
