<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TransaksiBerobat $model */

$this->title = 'Update Transaksi Berobat: ' . $model->id_berobat;
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Berobats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_berobat, 'url' => ['view', 'id_berobat' => $model->id_berobat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transaksi-berobat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
