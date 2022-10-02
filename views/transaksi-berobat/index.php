<?php

use app\models\TransaksiBerobat;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

use app\models\Pasien;
use app\models\Pegawai;
use app\models\Penyakit;
use app\models\Wilayah;

/** @var yii\web\View $this */
/** @var app\models\TransaksiBerobatSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Transaksi Berobat';
$this->params['breadcrumbs'][] = $this->title;

$pasiens = ArrayHelper::map(Pasien::find()->asArray()->all(),'id_pasien', 'nama','no_ktp');
$pegawais = ArrayHelper::map(Pegawai::find()->asArray()->all(),'id_pegawai', 'nama', 'jabatan');
$penyakits = ArrayHelper::map(Penyakit::find()->asArray()->all(),'id_penyakit', 'nama');
$wilayahs = ArrayHelper::map(Wilayah::find()->asArray()->all(),'id', 'nama');
?>
<div class="transaksi-berobat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Daftar Berobat baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_berobat',
            'tgl_masuk',
            'tgl_keluar',
            'jenis_berobat',
            // 'id_pasien',
            [
                'attribute'=>'id_pasien',
                'value'=>'pasien.nama',
                'filter'=>ArrayHelper::map(Pasien::find()->asArray()->all(),'id_pasien', 'nama')
            ],
            // 'id_pegawai',
            [
                'attribute'=>'id_pegawai',
                'value'=>'pegawai.nama',
                'filter'=>ArrayHelper::map(Pegawai::find()->asArray()->all(),'id_pegawai', 'nama')
            ],
            // 'id_penyakit',
            [
                'attribute'=>'id_penyakit',
                'value'=>'penyakit.nama',
                'filter'=>ArrayHelper::map(Penyakit::find()->asArray()->all(),'id_penyakit', 'nama')
            ],
            // 'id_wilayah',
            [
                'attribute'=>'id_wilayah',
                'value'=>'wilayah.nama',
                'filter'=>ArrayHelper::map(Wilayah::find()->asArray()->all(),'id', 'nama')
            ],
            
            [
                'label'=>'Aksi',
                'format'=>'raw',
                'value' =>
                    function($data){
                        $url = '/detail-berobat/index?id='.$data['id_berobat'];
                        return Html::a('Detail', $url, ['title' => 'Go']); 
                    },
            ],
        ],
    ]); ?>


</div>
