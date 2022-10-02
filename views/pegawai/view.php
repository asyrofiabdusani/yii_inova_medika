<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pegawai $model */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pegawai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update Data Pegawai', ['update', 'id_pegawai' => $model->id_pegawai], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus Data Pegawai', ['delete', 'id_pegawai' => $model->id_pegawai], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah Anda yakin akan menghapus '.$this->title.' dari data pegawai?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_pegawai',
            'nip',
            'nama',
            'tgl_lahir',
            'jabatan',
            'alamat:ntext',
            'photo',
        ],
    ]) ?>

</div>
