<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/* @var $this yii\web\View */
/* @var $model backend\modules\i18n\models\I18nMessage */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'I18n Message',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'I18n Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="i18n-message-create">

    <?= $this->render('_form', [
        'model' => $model
    ]); ?>

</div>
