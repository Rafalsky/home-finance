<?php

/*
 *  This file is part of the HomeFinanceV2 project.
 *
 *  (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace backend\controllers;

use Yii;
use backend\models\search\TimelineEventSearch;
use yii\web\Controller;

/**
 * Application timeline controller
 */
class TimelineEventController extends Controller
{
    public $layout = 'common';
    /**
     * Lists all TimelineEvent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TimelineEventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder'=>['created_at'=>SORT_DESC]
        ];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
