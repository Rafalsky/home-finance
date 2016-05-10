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
        return $this->render('list');
    }

    public function actionAddReceipt()
    {
        $this->view->title =  \Yii::t('wallet', 'Add new receipt');
        return $this->render('addReceipt', [
            'receipt' => new Receipt
        ]);
    }

    public function actionAddNewRow()
    {
        if (\Yii::$app->request->isPost && $number = \Yii::$app->request->post('rowNumber')) {
            return $this->renderPartial('_productTableRow', ['number' => $number]);
        }
        throw new NotFoundHttpException;
    }
}
