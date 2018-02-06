<?php

namespace frontend\controllers;

use frontend\models\Empresa;
use frontend\models\FaturaCliente;
use frontend\models\LinhaFatura;
use frontend\models\FaturaEmpresa;
use Yii;
use yii\data\ActiveDataProvider;
use frontend\models\Fatura;
use frontend\models\FaturaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FaturaController implements the CRUD actions for Fatura model.
 */
class FaturaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Fatura models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goBack();
        }
        else {
            $searchModel = new FaturaSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single Fatura model.
     * @param integer $id
     * @return mixed
     */

    public function actionView($id)
    {

        /**
        $queryEmpresa = "SELECT empresa.*
        FROM empresa
        LEFT JOIN fatura_empresa ON empresa.id = fatura_empresa.id_empresa
        LEFT JOIN fatura ON fatura_empresa.id_fatura = fatura.id
        WHERE fatura.id = 3"; */

       $queryEmpresa = Empresa::find()->leftJoin('fatura_empresa','empresa.id = fatura_empresa.id_empresa')->where(['fatura_empresa.id_fatura'=>$id]);

        $dataProviderEmpresa = new ActiveDataProvider([
            'query' => $queryEmpresa,
        ]);


        /**query para mostrar as linhas da fatura*/
        $queryLinha = LinhaFatura::find()->where(['id_fatura'=>$id]);

        $dataProviderLinha = new ActiveDataProvider([
            'query' => $queryLinha,
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProviderEmpresa' => $dataProviderEmpresa,
            'dataProviderLinha' => $dataProviderLinha,
        ]);
    }

    /**
     * Creates a new Fatura model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Fatura();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Fatura model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Fatura model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $delCustom_cliente = \frontend\models\FaturaCliente::findAll(['id_fatura'=>$id]);
        $delLinha = \frontend\models\LinhaFatura::findAll(['id_fatura'=>$id]);
        $delEmpresa = FaturaEmpresa::findAll(['id_fatura'=>$id]);


        foreach ($delCustom_cliente as $del){
            $del->delete();
        }

        foreach ($delLinha as $del){
            $del->delete();
        }

        foreach ($delEmpresa as $del){
            $del->delete();
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Fatura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fatura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fatura::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelEmpresa($id)
    {
        if (($model = Empresa::find()->join('INNER JOIN','fatura_empresa','fatura_empresa.id_empresa = empresa.id')->where(['fatura_empresa.id_fatura'=>$id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
