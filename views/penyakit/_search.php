<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PenyakitSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="penyakit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_penyakit') ?>

    <?= $form->field($model, 'kode_penyakit') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'jenis') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
