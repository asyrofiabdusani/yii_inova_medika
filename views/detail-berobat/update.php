<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DetailBerobat $model */

$this->title = 'Update Detail Berobat: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Detail Berobats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detail-berobat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
