<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WidgetText */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="text-block-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => 1024]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 512]) ?>

    <?= $form->field($model, 'body')->widget(
        trntv\aceeditor\AceEditor::className(),
        [
            'mode' => 'html'
        ]
    ) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
