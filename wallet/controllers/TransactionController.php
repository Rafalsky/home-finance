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
        return $this->render('addReceipt', [
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

    protected function afterSave()
    {
        $this->redirect('list');
        \Yii::$app->end();
    }
}
