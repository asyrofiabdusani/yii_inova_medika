<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DetailBerobatSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detail-berobat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_berobat') ?>

    <?= $form->field($model, 'id_obat') ?>

    <?= $form->field($model, 'id_tindakan') ?>

    <?= $form->field($model, 'harga') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
