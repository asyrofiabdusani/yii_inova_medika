<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TransaksiBerobat $model */

$this->title = 'Pendaftaran Berobat Baru';
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Berobat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-berobat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
