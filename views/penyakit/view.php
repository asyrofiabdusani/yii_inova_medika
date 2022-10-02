<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Penyakit $model */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Penyakit', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="penyakit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah Data', ['update', 'id_penyakit' => $model->id_penyakit], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus Data', ['delete', 'id_penyakit' => $model->id_penyakit], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah Anda yakin akan menghapus '.$this->title.' dari data penyakit?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_penyakit',
            'kode_penyakit',
            'nama',
            'jenis',
        ],
    ]) ?>

</div>
