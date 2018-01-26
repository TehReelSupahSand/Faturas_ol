<?php

namespace frontend\controllers;

use frontend\models\CustomFaturaCliente;
use frontend\models\LinhaFatura;
use Yii;
use yii\data\ActiveDataProvider;
use frontend\models\Customfatura;
use frontend\models\CustomfaturaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CustomfaturaController implements the CRUD actions for Customfatura model.
 */
class CustomfaturaController extends Controller
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
     * Lists all Customfatura models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomfaturaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customfatura model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $query = LinhaFatura::find()->where(['id_custom_fatura'=>$id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Customfatura model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Customfatura();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $faturaCliete = new CustomFaturaCliente();

            $faturaCliete->id_custom_faturas=$model->id;
            $faturaCliete->numero_cartao_cliente=Yii::$app->user->identity->numero_cartao;

            $faturaCliete->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Customfatura model.
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
     * Deletes an existing Customfatura model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $delCustom_cliente = \frontend\models\CustomfaturaCliente::findAll(['id_custom_faturas'=>$id]);
        $delLinha = \frontend\models\LinhaFatura::findAll(['id_custom_fatura'=>$id]);


        foreach ($delCustom_cliente as $del){
            $del->delete();
        }


        //funciona
        foreach ($delLinha as $del){
            $del->delete();
        }


        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Customfatura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customfatura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customfatura::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
