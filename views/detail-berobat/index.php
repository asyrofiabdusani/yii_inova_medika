<?php

use app\models\DetailBerobat;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

use app\models\Pasien;
use app\models\Pegawai;
use app\models\Penyakit;
use app\models\Wilayah;
use app\models\TransaksiBerobat;
use app\models\Tindakan;
use app\models\Obat;

/** @var yii\web\View $this */
/** @var app\models\DetailBerobatSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Detail Berobat';
// $this->params['breadcrumbs'][] = $this->title;

$berobat= TransaksiBerobat::findOne(['id_berobat'=>$_GET['id']]);
$pasien= Pasien::findOne(['id_pasien'=>$berobat->id_pasien]);
$pegawai= Pegawai::findOne(['id_pegawai'=>$berobat->id_pegawai]);
$ruangan= Wilayah::findOne(['id'=>$berobat->id_wilayah]);
$penyakit= Penyakit::findOne(['id_penyakit'=>$berobat->id_penyakit]);
// $p = ArrayHelper::map(Detailberobat::findAll(['id_berobat'=>$_GET['id']]));

$trx = Detailberobat::find()
    ->where(['id_berobat'=>$_GET['id']])
    ->all();
if ($trx!=NULL) {
    $obat= Tindakan::findOne(['id_tindakan'=>$trx[0]->id_tindakan]);
}

// var_dump($obat);

?>
<div class="detail-berobat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-7">
            <p>
                <?= Html::a('Input Obat', ['create?input=obat&id='.$_GET['id']], ['class' => 'btn btn-success']) ?>

                <?= Html::a('Input Tindakan', ['create?input=tindakan&id='.$_GET['id']], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div class="col-md-5">
            <div class="d-flex flex-row-reverse">
                <p>
                    <?= Html::a('Print Laporan', ['create?input=obat&id='.$_GET['id']], ['class' => 'btn btn-info']) ?>
                </p>
            </div>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <table class="table my-3">
        <thead>
            <tr>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Masuk</th>
            <th scope="col">Keluar</th>
            <th scope="col">Jenis Berobat</th>
            <th scope="col">Dokter</th>
            <th scope="col">Ruangan</th>
            <th scope="col">Penyakit</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><?=$pasien->nama; ?></td>
            <td><?=$berobat->tgl_masuk; ?></td>
            <td><?=$berobat->tgl_keluar; ?></td>
            <td><?=$berobat->jenis_berobat; ?></td>
            <td><?=$pegawai->nama; ?></td>
            <td><?=$ruangan->nama; ?></td>
            <td><?=$penyakit->nama; ?></td>
            </tr>
        </tbody>
    </table>

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Daftar Obat Diberikan</th>
                <th scope="col">Daftar Tindakan Dilakukan</th>
                <th scope="col">Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $totalharga = 0 ?>
            <?php for ($i=0; $i < count($trx); $i++) : ?>
                <tr>
                    <?php $ob = Obat::findOne(['id_obat'=>$trx[$i]->id_obat]); ?>
                    <?php $td = Tindakan::findOne(['id_tindakan'=>$trx[$i]->id_tindakan]); ?>
                    <th scope="row"><?=$i+1; ?></th>
                    <td><?php if($ob != NULL) : ?>
                        <?= $ob->nama; ?>
                        <?php endif;?>
                    </td>
                    <td><?php if($td != NULL) : ?>
                        <?= $td->nama; ?>
                        <?php endif;?>
                    </td>
                    <td><?= number_format($trx[$i]->harga,0,',','.'); ?></td>
                </tr>
                <?php $totalharga += $trx[$i]->harga; ?>
            <?php endfor; ?>
            <tr>
                <th scope="col" colspan = 3>Total</th>
                <th scope="col"><?= number_format($totalharga,0,',','.'); ?></th>
            </tr>
        </tbody>                                        
    </table>

</div>
