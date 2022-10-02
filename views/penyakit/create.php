<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Penyakit $model */

$this->title = 'Data Penyakit Baru';
$this->params['breadcrumbs'][] = ['label' => 'Penyakit', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penyakit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
