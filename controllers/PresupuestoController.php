<?php

namespace app\controllers;

use Yii;
use app\models\Presupuesto;
use app\models\PresupuestoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PresupuestoController implements the CRUD actions for Presupuesto model.
 */
class PresupuestoController extends Controller
{
    /**
     * {@inheritdoc}
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

    
//    function beforeAction($action): boolean {
////        session_start();
//        parent::beforeAction($action);
//    }
    
    
    /**
     * Lists all Presupuesto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PresupuestoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionNuevo()
    {
        if(!isset($_SESSION['presupuesto'])){
            $presupuesto = new Presupuesto();
            $presupuesto->save();
            $_SESSION['presupuesto']=$presupuesto->id_presupuesto;
        }else{
            $presupuesto = Presupuesto::findOne($_SESSION['presupuesto']);
            if($presupuesto==null){
                unset($_SESSION['presupuesto']);
            }
        }
        
        $itemPresupuesto = new \app\models\ItemPresupuesto(['presupuesto_id'=>$presupuesto->id_presupuesto]);
        
        if ($itemPresupuesto->load(Yii::$app->request->post()) && $itemPresupuesto->save()) {
            return $this->redirect(['nuevo']);
        }
       
        $productos = \app\models\Producto::find()->all();
                
        $cliente = new \app\models\Cliente();
//        $itemProductos = \app\models\ItemPresupuesto::find()->where([])
        
        return $this->render('nuevo',[
            'productos'=>$productos,
            'itemPresupuesto'=>$itemPresupuesto,
            'presupuesto'=>$presupuesto,
            'cliente' => $cliente,
            ]);
    }

    
    public function actionConfirmar()
    {
        
        $cliente = new \app\models\Cliente();
        
        if ($cliente->load(Yii::$app->request->post()) && $cliente->save()) {
            $presupuesto = Presupuesto::findOne($_SESSION['presupuesto']);
            $presupuesto->cliente_id = $cliente->id_cliente;
            $presupuesto->status_presupuesto = Presupuesto::CONFIRMADO;
            $presupuesto->save();
            unset($_SESSION['presupuesto']);
            
            return $this->redirect(['/cliente/index']);
        }
    }
            
            
    /**
     * Displays a single Presupuesto model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Presupuesto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Presupuesto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_presupuesto]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Presupuesto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_presupuesto]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Presupuesto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Presupuesto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Presupuesto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Presupuesto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
