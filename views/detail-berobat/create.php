<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use app\models\Pasien;
use app\models\Pegawai;
use app\models\Penyakit;
use app\models\Wilayah;
use app\models\TransaksiBerobat;

/** @var yii\web\View $this */
/** @var app\models\DetailBerobat $model */

$this->title = 'Input '.$_GET['input'];

?>
<div class="detail-berobat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
