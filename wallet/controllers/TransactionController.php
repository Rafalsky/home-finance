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
use yii\web\NotFoundHttpException;

class TransactionController extends DefaultModuleController
{
    public function actionList()
    {
        $this->view->title = \Yii::t('wallet', 'List of transactions');
        $receipts = Receipt::getMineReceipts();
        return $this->render('list', [
            'receipts' => $receipts
        ]);
    }

    public function actionAddReceipt()
    {
        $this->view->title = \Yii::t('wallet', 'Add new receipt');
        $model = new Receipt();
        $model = $this->updateWithPostRequest($model);
        return $this->render('form', [
            'receipt' => $model
        ]);
    }

    public function actionReceipt($id)
    {
        $model = $this->findReceipt($id);
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
        if ($products = $this->getModelAttributesFromPost((new Product()))) {
            $model->saveProducts($products);
        }
    }

    private function findReceipt($id)
    {
        $model = Receipt::findById($id);
        if (!$model) {
            die('jestm');
            throw new NotFoundHttpException();
        }
        return $model;
    }
}
