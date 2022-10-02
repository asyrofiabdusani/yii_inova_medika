<?php

namespace app\controllers;

use app\models\TransaksiBerobat;
use app\models\TransaksiBerobatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransaksiBerobatController implements the CRUD actions for TransaksiBerobat model.
 */
class TransaksiBerobatController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all TransaksiBerobat models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TransaksiBerobatSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TransaksiBerobat model.
     * @param int $id_berobat Id Berobat
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_berobat)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_berobat),
        ]);
    }

    /**
     * Creates a new TransaksiBerobat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TransaksiBerobat();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect('/detail-berobat/index?id='.$model->id_berobat);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TransaksiBerobat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_berobat Id Berobat
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_berobat)
    {
        $model = $this->findModel($id_berobat);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_berobat' => $model->id_berobat]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TransaksiBerobat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_berobat Id Berobat
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_berobat)
    {
        $this->findModel($id_berobat)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TransaksiBerobat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_berobat Id Berobat
     * @return TransaksiBerobat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_berobat)
    {
        if (($model = TransaksiBerobat::findOne(['id_berobat' => $id_berobat])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
