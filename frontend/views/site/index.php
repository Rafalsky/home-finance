<?php
/* @var $this yii\web\View */
$this->title = Yii::$app->name;
?>
<div class="site-index">

    <?= \common\widgets\DbCarousel::widget([
        'key' => 'index',
        'options' => [
            'class' => 'slide', // enables slide effect
        ],
    ]) ?>

    <div class="jumbotron">
        <h1>Home Finance</h1>

        <p class="lead">Your new way to finance revolution in your home finance.</p>

        <?= common\widgets\DbMenu::widget([
            'key' => 'frontend-index',
            'options'=>[
                'tag' => 'p'
            ]
        ]) ?>

    </div>
</div>
