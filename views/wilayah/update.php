<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Wilayah $model */

$this->title = 'Update Wilayah : ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Wilayahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wilayah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
