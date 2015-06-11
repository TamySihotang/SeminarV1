<?php

namespace frontend\controllers;

use Yii;

use common\models\Paper;
use common\models\PaperSearch;
use common\models\CommentPaper;
use common\models\CommentPaperSearch;
use common\models\CostAccumulation;
use common\models\CostAccumulationSearch;
use common\models\Cost;
use common\models\CostSearch;
use common\components\AccessRule;
use common\models\User;


use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\data\Pagination;
use yii\web\ForbiddenHttpException;
/**
 * PaperController implements the CRUD actions for Paper model.
 */
class PaperController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig'=>[
                    'class'=>  AccessRule::className(),
                ],
                'only' => ['create', 'update','delete'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow'=>true,
//                        'roles'=>[
//                        User::ROLE_USER,
//                            User::ROLE_REVIEWER,
//                            User::ROLE_ADMIN
//                        ],
//                    'allow' => 'true',
//                    'roles' => ['@'],
                    ],
                    [
                      'actions'=>['update'],
                        'allow'=>true,
//                        'roles'=>[
//                          User::ROLE_REVIEWER,
//                            User::ROLE_ADMIN
//                        ],
                    ],
                    [
                        'actions'=>['delete'],
                        'allow'=>true,
//                        'roles'=>[
//                          User::ROLE_ADMIN  
//                        ],
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Creates a new Paper model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * Lists all Paper models.
     * @param integer $id
     * @return mixed
     */
    public function actionIndex() {

        $searchModel = new PaperSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Paper();
        $model2 = new CostAccumulation();
        $model3 = new Cost();

        if ($model->load(Yii::$app->request->post())) {
//            $model->user_id;
            $model->modified_time = date('Y-m-d h:m:s');
            $model->user_id = \Yii::$app->user->id;
            $model->status = Paper::STATUS_BAYAR_BELUM;
            $cost_id = $model3->id;
//            print_r($cost_id);
//            die();
            //$model->save();
            //get the instance of the uploaded file

            $imageName = Yii::$app->security->generateRandomString();
            $image = \yii\web\UploadedFile::getInstance($model, 'pre_paper');

            if ($image !== null && $image->extension == 'pdf') {

                $model->pre_paper = $image->getBaseName() . ".pdf";
                $path = Yii::getAlias('../web/upload/') . $model->pre_paper;



                if ($model->save()) { //selesei save
                    ($image !== null) ? $image->saveAs($path) : '';

                    $model2->user_id = $model->user_id;
                    $model2->paper_id = $model->id;
                    $model2->cost_id = $model3->id;
                    
                    //$model2->item=3;

                    $countUser = CostAccumulation::find()->where(['user_id' => \Yii::$app->user->id])->count();

                    if ($countUser == 0) {
                        $total = "100000" + Cost::findOne($cost_id)->accomodation;
                    } else {
                        $total = "50000" + Cost::findOne($cost_id)->accomodation;
                    }
                    $model2->total = (string) $total;
                    //cari uda berapa jumlah user_id di tabel paper
                    // kalo masi o harga = kali 100 misal
                    //kalo lebih dari 1 kali 500
//                if (count($model2->user_id != null)) {
//                    $model2->total = count($model2->lotal + $model3->register)
//             
//                    
//                } else {
//                    $model2->total="100000";
//                    
//                }
//                  
//                $model2->total = "50000";

                    $model2->save();


                    return $this->redirect(['index']);
                } else {
                              
               }
             

            } echo"hay";
            Yii::$app->getSession()->setFlash('gagal', [
     'type' => 'gagal',
     'duration' => 5000,
     'icon' => 'fa fa-users',
     'message' => 'My Message',
     'title' => 'My Title',
     'positonY' => 'top',
     'positonX' => 'left'
 ]);
                   
        }
        $query = Paper::find();
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $paper = $query->orderBy('pre_paper')
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

        return $this->render('index', [
                    'paper' => $paper,
                    'pagination' => $pagination,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model' => $model,
        ]);
    }


    /**
     * Displays a single Paper model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
        $model = new CommentPaper();
        $paper = new Paper();
        $comments = CommentPaper::find()
                ->where(['paper_id'=>$id])
                ->orderBy('id DESC')
                ->all();
        
        if ($model->load(Yii::$app->request->post()) ) {
            $model->user_id = \Yii::$app->user->id;
            $model->paper_id = $id;
            $model->save();
            return $this->redirect(['view', 'id' => $id]);
        } else {
            
            return $this->render('view', [
                'model' => $this->findModel($id),
                'comments' => $comments,
            ]);
        }
        
      
        
    }
    
    /**
     * Lists all CostAccumulation models.
     * @return mixed
     */
    public function actionCost()
    {
        $searchModel = new CostAccumulationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = new CostAccumulation();

//        if ($model->load(Yii::$app->request->post())) {
////            $model->user_id;
//            $model->modified_time = date('Y-m-d h:m:s');
//            $model->user_id = \Yii::$app->user->id;
//            $model->status = Paper::STATUS_BAYAR_BELUM;
//            //$model->save();
//            //get the instance of the uploaded file
//            
//            $imageName = Yii::$app->security->generateRandomString();
//            $image = \yii\web\UploadedFile::getInstance($model, 'pre_paper');
//            
//            if ($image !== null) {
//                $model->pre_paper = $image->getBaseName() .".pdf";
//                $path = Yii::getAlias('../web/upload/') . $model->pre_paper;
//            }
//            if ($model->save()) {
//                ($image !== null) ? $image->saveAs($path) : '';
//                return $this->redirect(['index']);
//            } else {
//            print_r($model->getErrors());
//            die();
//            }
//        }  
        $query = CostAccumulation::find();
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query -> count(),
            ]);
        
        $cost = $query -> orderBy('total')
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        
            return $this->render('cost',[
            'cost' => $cost,
            'pagination' => $pagination,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
//            'model'=> $model,
        ]);
    }

    /**
     * Creates a new Paper model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('create-paper')){
            $model = new Paper();

        if ($model->load(Yii::$app->request->post())) {
//            $model->user_id;
            $model->modified_time = date('Y-m-d h:m:s');
            $model->save();
            //get the instance of the uploaded file
            
             $imageName = Yii::$app->security->generateRandomString();
            $image = \yii\web\UploadedFile::getInstance($model, 'pre_paper');
            if ($image !== null) {
                $model->pre_paper = $imageName .".pdf";
                $path = Yii::getAlias('../web/upload/') . $model->pre_paper;
            }
            if ($model->save()) {
                ($image !== null) ? $image->saveAs($path) : '';
                return $this->redirect(['view', 'id' => $model->id]);
            } else {}
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        }
        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing Paper model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $imageName = Yii::$app->security->generateRandomString();
            $image = \yii\web\UploadedFile::getInstance($model, 'pre_paper');
            if ($image !== null) {
                $model->pre_paper = $imageName .".pdf";
                $path = Yii::getAlias('../web/upload/') . $model->pre_paper;
            }
            if ($model->save()) {
                ($image !== null) ? $image->saveAs($path) : '';
                return $this->redirect(['view', 'id' => $model->id]);
            } else {}

//            return $this->redirect(['view', 'id' => $model->id]);
//
//            return $this->redirect(['view', 'id' => $model->id]);

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Paper model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Paper model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Paper the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Paper::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionGet($id){
        $model = Paper::findOne($id);
        header('Content-type: '.$model->pre_paper);
        echo $model->file->getBytes();
    }
    public function actionDownload($id){
        $download=  Paper::findOne($id);
        $path = Yii::$app->basePath.'/web/upload/'.$download->pre_paper;
        
        if(file_exists($path)){
            //return \Yii::$app->response->sendFile($download->pre_paper,@file_get_contents($path));
            return \Yii::$app->response->sendFile($path);
        }
        
    }
}
