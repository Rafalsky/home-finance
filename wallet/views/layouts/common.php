<?php

/*
 *  This file is part of the HomeFinanceV2 project.
 *
 *  (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

/**
 * @var $this yii\web\View
 */
use wallet\assets\WalletAsset;
use wallet\widgets\Menu;
use common\models\TimelineEvent;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$bundle = WalletAsset::register($this);
?>
<?php $this->beginContent('@wallet/views/layouts/base.php'); ?>
    <div class="wrapper">
        <!-- header logo: style can be found in header.less -->
        <header class="main-header">
            <a href="<?= Yii::getAlias('@frontendUrl'); ?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <?= Yii::$app->name; ?>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only"><?= Yii::t('wallet', 'Toggle navigation'); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li id="timeline-notifications" class="notifications-menu">
                            <a href="<?= Url::to(['/timeline-event/index']); ?>">
                                <i class="fa fa-bell"></i>
                                <span class="label label-success">
                                    <?= TimelineEvent::find()->today()->count(); ?>
                                </span>
                            </a>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= Yii::$app->user->identity->userProfile->getAvatar($this->assetManager->getAssetUrl($bundle, 'img/anonymous.jpg')) ?>" class="user-image">
                                <span><?= Yii::$app->user->identity->username; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header light-blue">
                                    <img src="<?= Yii::$app->user->identity->userProfile->getAvatar($this->assetManager->getAssetUrl($bundle, 'img/anonymous.jpg')) ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?= Yii::$app->user->identity->username; ?>
                                        <small>
                                            <?= Yii::t('wallet', 'Member since {0, date, short}', Yii::$app->user->identity->created_at); ?>
                                        </small>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <?= Html::a(Yii::t('wallet', 'Profile'), ['/sign-in/profile'], ['class'=>'btn btn-default btn-flat']); ?>
                                    </div>
                                    <div class="pull-left">
                                        <?= Html::a(Yii::t('wallet', 'Account'), ['/sign-in/account'], ['class'=>'btn btn-default btn-flat']); ?>
                                    </div>
                                    <div class="pull-right">
                                        <?= Html::a(Yii::t('wallet', 'Logout'), ['/sign-in/logout'], ['class'=>'btn btn-default btn-flat', 'data-method' => 'post']); ?>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <?= Html::a('<i class="fa fa-cogs"></i>', ['/site/settings'])?>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= Yii::$app->user->identity->userProfile->getAvatar($this->assetManager->getAssetUrl($bundle, 'img/anonymous.jpg')) ?>" class="img-circle" />
                    </div>
                    <div class="pull-left info">
                        <p>
                            <?= Yii::t('wallet', 'Hello, {username}', [
                                'username' => Yii::$app->user->identity->getPublicIdentity()
                            ]); ?>
                        </p>
                        <a href="<?= Url::to(['/sign-in/profile']) ?>">
                            <i class="fa fa-circle text-success"></i>
                            <?= Yii::$app->formatter->asDatetime(time()); ?>
                        </a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <?= Menu::widget([
                    'options'=>['class'=>'sidebar-menu'],
                    'linkTemplate' => '<a href="{url}">{icon}<span>{label}</span>{right-icon}{badge}</a>',
                    'submenuTemplate'=>"\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n",
                    'activateParents'=>true,
                    'items'=>[
                        [
                            'label'=>Yii::t('wallet', 'Main'),
                            'options' => ['class' => 'header']
                        ],
                        [
                            'label'=>Yii::t('wallet', 'Reports'),
                            'url' => '#',
                            'icon'=>'<i class="fa fa-edit"></i>',
                            'options'=>['class'=>'treeview'],
                            'items'=>[
                                [
                                    'label'=>Yii::t('wallet', 'Main Report'),
                                    'url'=>['/page/index'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'
                                ],
                                [
                                    'label'=>Yii::t('wallet', 'My netto value'),
                                    'url'=>['/report/my-netto-value'],
                                    'icon'=>'<i class="fa fa-angle-double-right"></i>'
                                ],
                            ]
                        ],
                        [
                            'label'=>Yii::t('wallet', 'Shops'),
                            'url' => '#',
                            'icon'=>'<i class="fa fa-edit"></i>',
                            'options'=>['class'=>'treeview'],
                            'items'=>[
                                [
                                    'label'=>Yii::t('wallet', 'List'),
                                    'url'=>['/shop/list'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'
                                ],
                                [
                                    'label'=>Yii::t('wallet', 'Add'),
                                    'url'=>['/shop/add'],
                                    'icon'=>'<i class="fa fa-angle-double-right"></i>'
                                ],
                            ]
                        ],
                        [
                            'label'=>Yii::t('wallet', 'Transactions'),
                            'url' => '#',
                            'icon'=>'<i class="fa fa-edit"></i>',
                            'options'=>['class'=>'treeview'],
                            'items'=>[
                                [
                                    'label' => Yii::t('wallet', 'Receipts List'),
                                    'url'=>['/transaction/list'],
                                    'icon'=>'<i class="fa fa-angle-double-right"></i>'
                                ],
                                [
                                    'label' => Yii::t('wallet', 'Add Receipt'),
                                    'url' => ['/transaction/add-receipt'],
                                    'icon' => '<i class="fa fa-angle-double-right"></i>'
                                ],
                                [
                                    'label' => Yii::t('wallet', 'Import'),
                                    'url' => ['/transaction/import'],
                                    'icon' => '<i class="fa fa-angle-double-right"></i>'
                                ],
                                [
                                    'label' => Yii::t('wallet', 'Export'),
                                    'url' => ['/transaction/export'],
                                    'icon' => '<i class="fa fa-angle-double-right"></i>'
                                ],
                            ]
                        ],
                        [
                            'label'=>Yii::t('wallet', 'Products'),
                            'url' => '#',
                            'icon'=>'<i class="fa fa-edit"></i>',
                            'options'=>['class'=>'treeview'],
                            'items'=>[
                                [
                                    'label'=>Yii::t('wallet', 'Main Report'),
                                    'url'=>['/page/index'],
                                    'icon'=>'<i class="fa fa-angle-double-right"></i>'
                                ],
                                [
                                    'label'=>Yii::t('wallet', 'My netto value'),
                                    'url'=>['/report/my-netto-value'],
                                    'icon'=>'<i class="fa fa-angle-double-right"></i>'
                                ],
                            ]
                        ],
                        [
                            'label'=>Yii::t('wallet', 'Fixed cost'),
                            'url' => '#',
                            'icon'=>'<i class="fa fa-edit"></i>',
                            'options'=>['class'=>'treeview'],
                            'items'=>[
                                [
                                    'label'=>Yii::t('wallet', 'Main Report'),
                                    'url'=>['/page/index'],
                                    'icon'=>'<i class="fa fa-angle-double-right"></i>'
                                ],
                                [
                                    'label'=>Yii::t('wallet', 'My netto value'),
                                    'url'=>['/report/my-netto-value'],
                                    'icon'=>'<i class="fa fa-angle-double-right"></i>'
                                ],
                            ]
                        ],
                        [
                            'label'=>Yii::t('wallet', 'Assets'),
                            'url' => '#',
                            'icon'=>'<i class="fa fa-edit"></i>',
                            'options'=>['class'=>'treeview'],
                            'items'=>[
                                [
                                    'label'=>Yii::t('wallet', 'Main Report'),
                                    'url'=>['/page/index'],
                                    'icon'=>'<i class="fa fa-angle-double-right"></i>'
                                ],
                                [
                                    'label'=>Yii::t('wallet', 'My netto value'),
                                    'url'=>['/report/my-netto-value'],
                                    'icon'=>'<i class="fa fa-angle-double-right"></i>'
                                ],
                            ]
                        ],
                        [
                            'label'=>Yii::t('wallet', 'Liabilities'),
                            'url' => '#',
                            'icon'=>'<i class="fa fa-edit"></i>',
                            'options'=>['class'=>'treeview'],
                            'items'=>[
                                [
                                    'label'=>Yii::t('wallet', 'Main Report'),
                                    'url'=>['/page/index'],
                                    'icon'=>'<i class="fa fa-angle-double-right"></i>'
                                ],
                                [
                                    'label'=>Yii::t('wallet', 'My netto value'),
                                    'url'=>['/report/my-netto-value'],
                                    'icon'=>'<i class="fa fa-angle-double-right"></i>'
                                ],
                            ]
                        ],
                    ]
                ]) ?>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?= $this->title ?>
                    <?php if (isset($this->params['subtitle'])) : ?>
                        <small><?= $this->params['subtitle'] ?></small>
                    <?php endif; ?>
                </h1>

                <?= Breadcrumbs::widget([
                    'tag'=>'ol',
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php if (Yii::$app->session->hasFlash('alert')) :?>
                    <?= \yii\bootstrap\Alert::widget([
                        'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
                        'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
                    ])?>
                <?php endif; ?>
                <?= $content ?>
            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->

<?php $this->endContent(); ?>