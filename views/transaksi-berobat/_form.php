<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\Pasien;
use app\models\Pegawai;
use app\models\Penyakit;
use app\models\Wilayah;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\TransaksiBerobat $model */
/** @var yii\widgets\ActiveForm $form */

$jenList = [
    'Rawat jalan' => 'Rawat jalan',
    'Rawat inap' => 'Rawat inap',
];

$pasiens = ArrayHelper::map(Pasien::find()->asArray()->all(),'id_pasien', 'nama','no_ktp');
$pegawais = ArrayHelper::map(Pegawai::find()->asArray()->all(),'id_pegawai', 'nama', 'jabatan');
$penyakits = ArrayHelper::map(Penyakit::find()->asArray()->all(),'id_penyakit', 'nama');
$wilayahs = ArrayHelper::map(Wilayah::find()->asArray()->all(),'id', 'nama');
?>

<div class="transaksi-berobat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'tgl_masuk')->textInput() ?>

    <?= $form->field($model, 'tgl_masuk')->widget(DatePicker::classname(), [
            'type' => DatePicker::TYPE_INPUT,
            'pluginOptions' => [
                'todayHighlight' => true,
                'todayBtn' => true,
                'format' => 'yyyy-mm-dd',
                'autoclose' => true,
            ]
        ]);
    ?>

    <?php //$form->field($model, 'tgl_keluar')->textInput() ?>

    <?= $form->field($model, 'tgl_keluar')->widget(DatePicker::classname(), [
            'type' => DatePicker::TYPE_INPUT,
            'pluginOptions' => [
                'todayHighlight' => true,
                'todayBtn' => true,
                'format' => 'yyyy-mm-dd',
                'autoclose' => true,
            ]
        ]);
    ?>

    <?php //$form->field($model, 'jenis_berobat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_berobat')->dropDownList($jenList, ['prompt'=>'-- Pilih jenis berobat--']); ?>

    <?php //$form->field($model, 'id_pasien')->textInput() ?>

    <?= $form->field($model, 'id_pasien')->dropDownList($pasiens, ['prompt'=>'-- Pilih pasien --']); ?>

    <?php //$form->field($model, 'id_pegawai')->textInput() ?>
    <?= $form->field($model, 'id_pegawai')->dropDownList($pegawais, ['prompt'=>'-- Pilih Pegawai --']); ?>

    <?php //$form->field($model, 'id_penyakit')->textInput() ?>

    <?= $form->field($model, 'id_penyakit')->dropDownList($penyakits, ['prompt'=>'-- Pilih Penyakit --']); ?>

    <?php //$form->field($model, 'id_wilayah')->textInput() ?>

    <?= $form->field($model, 'id_wilayah')->dropDownList($wilayahs, ['prompt'=>'-- Pilih Wilayah --']); ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan Data', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
