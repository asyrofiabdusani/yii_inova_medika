<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;
use kartik\widgets\FileInput;

/** @var yii\web\View $this */
/** @var app\models\Pegawai $model */
/** @var yii\widgets\ActiveForm $form */

$jabList = [
    'Dokter' => 'Dokter',
    'Perawat' => 'Perawat',
    'Admin' => 'Admin',
    'Tenaga Umum' => 'Tenaga Umum',
    'Lainnya' => 'Lainnya',
];
?>

<div class="pegawai-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nip')->textInput() ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'tgl_lahir')->textInput() ?>

    <?= $form->field($model, 'tgl_lahir')->widget(DatePicker::classname(), [
            'type' => DatePicker::TYPE_INPUT,
            'pluginOptions' => [
                'todayHighlight' => true,
                'todayBtn' => true,
                'format' => 'yyyy-mm-dd',
                'autoclose' => true,
            ]
        ]);
    ?>

    <?php //$form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jabatan')->dropDownList($jabList, ['id'=>'cat-id']); ?>


    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?php //$form->field($model, 'photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->fileInput(['class' => 'my-3 ms-3 border']) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan Data', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
