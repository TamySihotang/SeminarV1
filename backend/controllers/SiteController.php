<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use common\models\News;
use common\models\NewsSearch;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;
use backend\models\SignupForm;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $query = News::find();
        $pagination = new Pagination(
                [
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

//              
//        $searchModel = new NewsSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $News= News::find()->limit(5)->orderBy('date ASC')
                ->all();
//        
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//  
        return $this->render('index', [
                    'News' => $News,
                    'pagination' => $pagination,
                    
        ]);
//        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

public function actionSignup() {
        $model = new SignupForm();
        print_r($model);
                die();
        if ($model->load(Yii::$app->request->post())) {

            $imageName = Yii::$app->security->generateRandomString();
            $image = \yii\web\UploadedFile::getInstance($model, 'image');
            
            if ($image !== null) {
                $model->image = $imageName;
                $path = Yii::getAlias('../web/picture/') . $model->image;
            
                
            }
            if ($model->save()) {
                ($image !== null) ? $image->saveAs($path) : '';
                
                return $this->redirect('signup');
            }
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        } else {
            return $this->render('signup', [
                        'model' => $model,
            ]);
        }
}

//        $model = new SignupForm();
//        if ($model->load(Yii::$app->request->post())) {
//            
//            $imageName = $model->username;
//            
//            //$model->file = \yii\web\UploadedFile::getInstance($model, 'image');
//            $image= UploadedFile::getInstance($model, 'image');
//            var_dump($image);
//            die();
//          if($image !== null){
//            $model->pre_paper = $image->getBaseName();
//            $path = Yii::getAlias('../web/picture/') . $model->image;
//          }
//          if($image->save()){
//              ($image !== null) ? $image->saveAs($path):'';
//              return $this->redirect(['signup']);
//          }
////            $model->file->saveAs( '../web/picture/'.$imageName. '.'.$model->file->extension);
////            print_r($model->getErrors());
////            die();
//            //save the path in the db coloumn
//            
////            $model->image = $imageName. '.'.$model->file->extension;
//            
//            if ($user = $model->signup()) {
//                if (Yii::$app->getUser()->login($user)) {
//                    return $this->goHome();
//                }
//            }
//        } 
//        return $this->render('signup', [
//                        'model' => $model,
//            ]);
//    }
}

