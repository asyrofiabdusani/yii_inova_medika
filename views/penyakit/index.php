<?php

use app\models\Penyakit;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PenyakitSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Penyakit';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penyakit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Penyakit Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_penyakit',
            'kode_penyakit',
            'nama',
            'jenis',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Penyakit $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_penyakit' => $model->id_penyakit]);
                 }
            ],
        ],
    ]); ?>


</div>
