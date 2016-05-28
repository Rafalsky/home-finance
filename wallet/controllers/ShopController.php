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

use common\models\base\BaseModel;
use common\models\Shop;
use yii\web\NotFoundHttpException;

class ShopController extends DefaultModuleController
{
    public function actionList()
    {
        $this->view->title = \Yii::t('wallet', 'Shops');
        $shops = Shop::find()->all();
        return $this->render('list', [
            'shops' => $shops
        ]);
    }

    public function actionEdit($id)
    {
        $model = Shop::findOne($id);
        if ($model) {
            throw new NotFoundHttpException;
        }
        return $this->showForm($this->updateWithPostRequest($model));
    }

    public function actionNew()
    {
        $model = new Shop();
        return $this->showForm($this->updateWithPostRequest($model));
    }

    // protected

    /**
     * @param BaseModel $model
     * @return \common\models\Shop
     */
    protected function updateWithPostRequest(BaseModel $model)
    {
        return parent::updateWithPostRequest($model);
    }

    protected function afterSave()
    {
        parent::afterSave();
        return $this->redirect('list');
    }

    // -- private

    private function showForm(Shop $model)
    {
        return $this->render('form', [
            'model' => $model
        ]);
    }
}
