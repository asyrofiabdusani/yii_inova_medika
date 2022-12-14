<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '@web/favicon.ico']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header id="header">
        <div class="row">
            <div class="col-md-4">
                <?php
                NavBar::begin([
                    'brandLabel' => Html::img('img/inova.png', ['style' => 'width:75px']),
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
                ]);
                ?>
            </div>

            <div class="col-md-8">
                <div class="d-flex flex-row-reverse">
                    <?php
                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav'],
                        'items' => [
                            ['label' => 'Berobat', 'url' => ['/transaksi-berobat']],
                            [
                                'label' => 'Manajemen Orang',
                                'items' => [
                                    ['label' => 'Daftar Pegawai', 'url' => ['/pegawai']],
                                    ['label' => 'Daftar Pasien', 'url' => ['/pasien']]
                                ]
                            ],
                            [
                                'label' => 'Manajemen Pengobatan',
                                'items' => [
                                    ['label' => 'Kelola Tindakan', 'url' => ['/tindakan']],
                                    ['label' => 'Kelola Obat', 'url' => ['/obat']],
                                    ['label' => 'Kelola Penyakit', 'url' => ['/penyakit']],
                                    ['label' => 'Kelola Wilayah', 'url' => ['/wilayah']]
                                ]
                            ],
                            Yii::$app->user->isGuest ?
                                ['label' => 'Login', 'url' => ['/user/security/login']]
                                : '<li class="nav-item">'
                                . Html::beginForm(['/user/security/logout'])
                                . Html::submitButton(
                                    'Logout (' . Yii::$app->user->identity->username . ')',
                                    ['class' => 'nav-link btn btn-link logout']
                                )
                                . Html::endForm()
                                . '</li>'
                        ]
                    ]);
                    NavBar::end();
                    ?>
                </div>
            </div>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <?php if (!empty($this->params['breadcrumbs'])) : ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 bg-light">
        <div class="container">
            <div class="row text-muted">
                <div class="col-md-6 text-center text-md-start">&copy; Asyrofi Abdusani <?= date('Y') ?></div>
                <!-- <div class="col-md-6 text-center text-md-end"><?php // Yii::powered() 
                                                                    ?></div> -->
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>