<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pasien $model */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Pasien', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pasien-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah Data Pasien', ['update', 'id_pasien' => $model->id_pasien], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus Data Pasien', ['delete', 'id_pasien' => $model->id_pasien], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah Anda yakin ingin menghapus data ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_pasien',
            'no_ktp',
            'nama',
            'tgl_lahir',
            'kelamin',
            'alamat:ntext',
        ],
    ]) ?>

</div>
