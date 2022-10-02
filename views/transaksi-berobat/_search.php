<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TransaksiBerobatSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="transaksi-berobat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_berobat') ?>

    <?= $form->field($model, 'tgl_masuk') ?>

    <?= $form->field($model, 'tgl_keluar') ?>

    <?= $form->field($model, 'jenis_berobat') ?>

    <?= $form->field($model, 'id_pasien') ?>

    <?php // echo $form->field($model, 'id_pegawai') ?>

    <?php // echo $form->field($model, 'id_penyakit') ?>

    <?php // echo $form->field($model, 'id_wilayah') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
