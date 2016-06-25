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
use common\models\Company;
use yii\web\NotFoundHttpException;

class CompanyController extends DefaultModuleController
{
    public function actionList()
    {
        return $this->render('list');
    }

    public function actionEdit($id)
    {
        $model = Company::findOne($id);
        if ($model) {
            throw new NotFoundHttpException;
        }
        return $this->showForm($this->updateWithPostRequest($model));
    }

    public function actionNew()
    {
        $model = new Company();
        return $this->showForm($this->updateWithPostRequest($model));
    }

    // protected

    /**
     * @param BaseModel $model
     * @return \common\models\Company
     */
    protected function updateWithPostRequest(BaseModel $model)
    {
        return parent::updateWithPostRequest($model);
    }

    protected function afterSave($model)
    {
        parent::afterSave($model);
        return $this->redirect('list');
    }

    // -- private

    private function showForm(Company $model)
    {
        return $this->render('form', [
            'model' => $model
        ]);
    }
}
