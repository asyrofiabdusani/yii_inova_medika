<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\Obat;
use app\models\Tindakan;

/** @var yii\web\View $this */
/** @var app\models\DetailBerobat $model */
/** @var yii\widgets\ActiveForm $form */

$obat = Obat::find()->asArray()->all();
$value = ArrayHelper::getValue($obat, 'nama');
$tindakan = ArrayHelper::map(Tindakan::find()->asArray()->all(),'id_tindakan', 'nama');

var_dump($obat);
?>

<div class="detail-berobat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if ($_GET['input']=='obat') : ?>

        <?= $form->field($model, 'id_berobat')->textInput()->input('id_berobat',['value'=> $_GET['id'], 'style' => 'display:none;'])->label(false); ?>

        <?php //$form->field($model, 'id_tindakan')->textInput() ?>

        <?php //$form->field($model, 'id_obat')->textInput() ?>

        <?= $form->field($model, 'id_obat')->dropDownList(['1' => 'aaa', '2' => 'bbb'], ['prompt'=>'-- Pilih Obat --', 'class' => 'drop form-control'])?>

        <?=$form->field($model, 'harga')->textInput()->input('harga', ['class' => 'price form-control']) ?>

    <?php else : ?>

        <?= $form->field($model, 'id_berobat')->textInput()->input('id_berobat',['value'=> $_GET['id'], 'style' => 'display:none;'])->label(false); ?>

        <?php //$form->field($model, 'id_obat')->textInput() ?>

        <?php //$form->field($model, 'id_tindakan')->textInput() ?>

        <?= $form->field($model, 'id_tindakan')->dropDownList($tindakan, ['prompt'=>'-- Pilih Tindakan --', 'class' => 'drop form-control']); ?>

        <?= $form->field($model, 'harga')->textInput()->input('harga', ['class' => 'price form-control']) ?>

    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan Data', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    const drop = document.querySelector('.drop');
    const harga = document.querySelector('.price');

    drop.addEventListener('change', ()=> {
        harga.setAttribute('value',drop.classList[0]);
    });
</script>
