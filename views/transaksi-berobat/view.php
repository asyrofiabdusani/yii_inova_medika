<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TransaksiBerobat $model */

$this->title = $model->id_berobat;
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Berobats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="transaksi-berobat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_berobat' => $model->id_berobat], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_berobat' => $model->id_berobat], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_berobat',
            'tgl_masuk',
            'tgl_keluar',
            'jenis_berobat',
            // 'id_pasien',
            'pasien.nama',
            // 'id_pegawai',
            'pegawai.nama',
            // 'id_penyakit',
            'penyakit.nama',
            // 'id_wilayah',
            'wilayah.nama'
        ],
    ]) ?>

</div>
