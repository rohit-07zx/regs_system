<?php 

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Users ;
use app\models\UserForm;
use yii\filters\AccessControl;



class UsersController extends Controller{
  
  public function actionIndex()
  {
    $users = Users::find()->all();
    return $this->render('index',['users'=>$users]);
  }

  public function actionUser()
  {    
    $model = new UserForm();
    if( Yii::$app->request->isAjax )
    { 
        if($model->load(Yii::$app->request->post()) && $model->validate())
        {
            $data = new Users(); 
            Yii::$app->response->format = Response::FORMAT_JSON;
            $data->setAttributes($model->attributes, false);
            
            if ($data->save()) 
            {
                Yii::$app->session->setFlash('success','User Registered!');
                return ['success' => true];
            }else{
                return ['success' => false, 'errors' => $model->errors];
            }
        }
    }  
        return $this->render('user',['model'=>$model]);
    }
}

?>