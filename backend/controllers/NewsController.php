<?php

namespace backend\controllers;

use Yii;
use common\models\News;
use common\models\NewsSearch;
use common\models\User;
use common\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\web\UploadedFile;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex() {
        $query = News::find();
        $user = User::find();
        $pagination = new Pagination(
                [
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
        $News = News::find()->limit(5)->orderBy('date ASC')
                ->all();

        return $this->render('index', [
                    'News' => $News,
                    'pagination' => $pagination,
        ]);
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new News();

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = \Yii::$app->user->id;
            $model->date = date('y-m-d h:m:s');
            $model->save();
//            print_r($model->getErrors());
//            die();
//            return $this->redirect(['view', 'id' => $model->id]);
            //  return $this->redirect(['view', 'id' => $model->id]);
            $imageName = Yii::$app->security->generateRandomString();
            $image = \yii\web\UploadedFile::getInstance($model, 'picture');

            if ($image !== null) {
                $model->picture = $image->getBaseName();
                $path = Yii::getAlias('../web/picture/') . $model->picture;

//                print_r($model->getErrors());
//            die();
            }
            if ($model->save()) {
                ($image !== null) ? $image->saveAs($path) : '';
//                print_r($model->getErrors());
//            die();
                return $this->redirect(['view', 'id' => $id]);
            } else {
                
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
//        } else {
//            return $this->render('create', [
//                        'model' => $model,
//            ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->date = date('yyyy-M-d');
            return $this->redirect(['view', 'id' => $model->id]);

            //  return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUser() {
        if (($model = News::findOne($id)) !== null) {
            return $this->render('index', [
                        'User' => $User,
                        'pagination' => $pagination,
            ]);
        }
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     */
    public function actionImage($id) {
        return $this->render('image', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function getImageurl() {
        return \Yii::getAlias('@imageurl') . '/' . $this->picture;
    }

}
