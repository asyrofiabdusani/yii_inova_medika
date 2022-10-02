<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;

/** @var yii\web\View $this */
/** @var app\models\Pasien $model */
/** @var yii\widgets\ActiveForm $form */

$kelList = [
    'Laki-laki' => 'Laki-laki',
    'Perempuan' => 'Perempuan',
];
?>


<div class="pasien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_ktp')->textInput() ?>

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

    <?php //$form->field($model, 'kelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelamin')->dropDownList($kelList, ['id'=>'cat-id']); ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan Data', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
