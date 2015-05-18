<?php

namespace backend\controllers;

use Yii;

use common\models\Paper;
use common\models\PaperSearch;
use common\models\CommentPaper;
use common\models\CommentPaperSearch;



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
                'only' => ['create', 'update'],
                'rules' => [
                    [
                    'allow' => 'true',
                    'roles' => ['@'],
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
    public function actionIndex()
    {
        
        $searchModel = new PaperSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Paper();

        if ($model->load(Yii::$app->request->post())) {
//            $model->user_id;
            $model->modified_time = date('Y-m-d h:m:s');
            $model->user_id = \Yii::$app->user->id;
            $model->status = Paper::STATUS_BAYAR_BELUM;
            //$model->save();
            //get the instance of the uploaded file
            
            $imageName = Yii::$app->security->generateRandomString();
            $image = \yii\web\UploadedFile::getInstance($model, 'pre_paper');
            
            if ($image !== null) {
                $model->pre_paper = $image->getBaseName() .".pdf";
                $path = Yii::getAlias('../web/upload/') . $model->pre_paper;
            }
            if ($model->save()) {
                ($image !== null) ? $image->saveAs($path) : '';
                return $this->redirect(['index']);
            } else {
            print_r($model->getErrors());
            die();
            }
        }  
        $query = Paper::find();
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query -> count(),
            ]);
        
        $paper = $query -> orderBy('pre_paper')
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        
            return $this->render('index',[
            'paper' => $paper,
            'pagination' => $pagination,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=> $model,
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
