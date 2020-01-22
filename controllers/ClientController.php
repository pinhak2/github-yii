<?php

namespace app\controllers;

use Yii;

use app\models\Client;
use app\models\ClientSearch;
use app\models\Address;
use app\models\AddressSearch;

use yii\base\Model;

use yii\web\Controller;
use yii\web\NotFoundHttpException;

use yii\filters\VerbFilter;

use yii\db\ActiveRecord;

class ClientController extends Controller
{
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

    public function actionIndex()
    {
        $searchModel = new ClientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Client();
        $count = count(Yii::$app->request->post('Address', []));
        $model2 = [new Address(['scenario' => Address::SCENARIO_BATCH_UPDATE])];

        for($i = 1; $i < $count; $i++) {
            $model2[] = new Address(['scenario' => Address::SCENARIO_BATCH_UPDATE]);    
            }
        if(isset($_POST['submit']) && $_POST['submit']=='true') {
            $model->load(Yii::$app->request->post());
            $model2[] = new Address(['scenario' => Address::SCENARIO_BATCH_UPDATE]);

            return $this->render('create', [
                'model' => $model,
                'model2' => $model2
            ]);
        }

        if (($model->load(Yii::$app->request->post()) && $model->validate()) && (Model::loadMultiple($model2, Yii::$app->request->post()) &&
            Model::validateMultiple($model2))) {
                $model->save(false);

                foreach ($model2 as $modelAddress) {
                    $modelAddress->client_id = $model->id;
                    $modelAddress->save(false);
                }
                
                return $this->redirect(['index', 'id' => $model->id]);;                   
            }
            return $this->render('create', [
                'model' => $model, 'model2' => $model2 
            ]);
    }

    public function actionUpdate($id)
    {
        $model = Client::findOne($id);
        $model2= Address::findAll(['client_id' => $id]);
        $count = count(Yii::$app->request->post('Address',[]));

        for($i = 0; $i < $count; $i++) {
            if(!isset($model2[$i])){
                $model2[] = new Address(['scenario' => Address::SCENARIO_BATCH_UPDATE]);
            } else {
                $model2[$i]->setScenario(Address::SCENARIO_BATCH_UPDATE);
            }
        }

        if(isset($_POST['submit']) && $_POST['submit']=='true') {
                $model->load(Yii::$app->request->post());
                $model2[] = new Address(['scenario' => Address::SCENARIO_BATCH_UPDATE]);
                
                return $this->render('update', [
                    'model' => $model,
                    'model2' => $model2
                ]);
            }

        if(($model->load(Yii::$app->request->post()) && $model->validate())){
            $model->save();
            if(Model::loadMultiple($model2, Yii::$app->request->post()) && Model::validateMultiple($model2)){
                foreach ($model2 as $modelAddress) { 
                    if ($modelAddress->updateType == Address::UPDATE_TYPE_DELETE) {
                        $modelAddress->delete();
                    } else {
                            $modelAddress->client_id = $model->id;
                            $modelAddress->save(false);   
                        }
                } 
                return $this->redirect(['index', 'id' => $model->id]);;                   
            }
        }
        return $this->render('update', ['model' => $model, 'model2' => $model2 
            ]);
    }

    public function actionDelete($id)
    {
        $model = Client::findOne($id);
        $model2 = Address::findAll(['client_id' => $id]);

        foreach ($model2 as $modelAddress) {
            $modelAddress->delete();
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Client::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
