<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Penyakit $model */

$this->title = 'Update Penyakit : ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Penyakit', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['view', 'id_penyakit' => $model->id_penyakit]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penyakit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
