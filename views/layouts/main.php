<?php
/* @var $this \yii\web\View */
/* @var $content string */

use kartik\nav\NavX;
use yii\bootstrap4\Alert;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\ArrayHelper;

$theme = AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <style>
            *{font-family: '<?= $theme->fontStyle ?>' }//!important;
        </style>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Html::img('https://www.aucegypt.edu/sites/default/files/inline-images/Register.png', ['height' => 32]) . ' ' . Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-expand-lg navbar-dark bg-primary',
                ],
                'innerContainerOptions' => ['class' => 'container-fluid'],
            ]);
            echo NavX::widget([
                'options' => ['class' => 'navbar-nav navbar-right ml-auto'],
                'activateParents' => true,
                'encodeLabels' => false,
                'items' => [
                    ['label' => 'หน้าแรก', 'active' => true, 'url' => ['/site/index'],],
                    ['label' => 'ลงทะเบียน', 'url' => ['/rgt/meeting']],
                    ['label' => 'รายงาน', 'items' => [
                            ['label' => 'สรุปตามหัวข้อประชุม', 'url' => ['/rgt/report']],
                            ['label' => 'สรุปตามหัวข้อประชุมและหน่วยงาน', 'url' => ['/rgt/report/summary']],
                        ]],
                    ['label' => 'จัดการ', 'visible' => Yii::$app->user->can('Administrator'), 'items' => [
                            ['label' => 'จัดการหัวข้อประชุม', 'url' => ['/rgt/meetinglist']],
                            ['label' => 'จัดการผู้เข้าประชุม', 'url' => ['/rgt/meetingregister']],
                        ]],
                    Yii::$app->user->isGuest ? (
                            ['label' => 'Login', 'url' => ['/user/security/login']]
                            ) : (
                            ['label' => 'Logout (' . Yii::$app->user->identity->username . ')', 'items' => [
                                    ['label' => 'แก้ไขข้อมูลส่วนตัว', 'url' => ['/user/settings/profile'],],
                                    ['label' => 'เปลี่ยนรหัสผ่าน', 'url' => ['/user/settings/account'], 'visible' => Yii::$app->user->can('Administrator')],
                                    '<div class="dropdown-divider"></div>',
                                    '<div class="dropdown-item">'
                                    . Html::beginForm(['/user/security/logout'], 'post')
                                    . Html::submitButton(
                                            'ออกจากระบบ', ['class' => 'btn btn-success logout']
                                    )
                                    . Html::endForm()
                                    . '</div>']]
                            )
                ],
            ]);
            NavBar::end();
            ?>

            <div class="container-fluid">
                <div class="divider p-2"></div>
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?php if (Yii::$app->session->hasFlash('alert')): ?>
                    <?=
                    Alert::widget([
                        'body' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
                        'options' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
                    ])
                    ?>
                <?php endif; ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
