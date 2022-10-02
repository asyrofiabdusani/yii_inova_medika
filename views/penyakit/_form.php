<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Penyakit $model */
/** @var yii\widgets\ActiveForm $form */

$pyList = [
    'Penyakit luar' => 'Penyakit luar',
    'Penyakit dalam' => 'Penyakit dalam',
    'Flu' => 'Flu',
];
?>

<div class="penyakit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'id_penyakit')->textInput() ?>

    <?= $form->field($model, 'kode_penyakit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'jenis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis')->dropDownList($pyList, ['id'=>'cat-id']); ?>


    <div class="form-group">
        <?= Html::submitButton('Simpan Data', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
