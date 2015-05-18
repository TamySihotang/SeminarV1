<?php

namespace backend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model {

    public $username;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $gender;
    public $birth;
    public $phone;
    public $image;
    public $file;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
        ['username', 'filter', 'filter' => 'trim'],
        ['username', 'required'],
        ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
        ['username', 'string', 'min' => 2, 'max' => 255],
        ['password', 'required'],
        ['password', 'string', 'min' => 6],
        ['email', 'filter', 'filter' => 'trim'],
        ['email', 'required'],
        ['email', 'email'],
        //['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

        ['first_name', 'filter', 'filter' => 'trim'],
        ['first_name', 'required'],
        //['first_name', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This firstname has already been taken.'],
        ['first_name', 'string', 'min' => 2, 'max' => 64],
        ['last_name', 'filter', 'filter' => 'trim'],
        ['last_name', 'required'],
        ['last_name', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This lastname has already been taken.'],
        ['last_name', 'string', 'min' => 2, 'max' => 64],
        ['gender', 'filter', 'filter' => 'trim'],
        ['gender', 'required'],
        //['gender', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This gender has already been taken.'],
        ['gender', 'string', 'min' => 2, 'max' => 64],
//            ['birth', 'filter', 'filter' => 'trim'],
//            ['birth', 'required'],
//            //['birth', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This birth has already been taken.'],
//            ['birth', 'date'],

        
            [['birth'], 'required'],
            [['birth'], 'safe'],
            ['birth', 'date', 'format' => 'yyyy-M-d'],
        

        ['phone', 'filter', 'filter' => 'trim'],
        ['phone', 'required'],
        //['phone', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This phone has already been taken.'],
        //  ['phone', 'int', 'min' => 5, 'max' => 64],

        [['file'], 'file'],
        ['image', 'string', 'max' => 64],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup() {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->email = $this->email;
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->gender = $this->gender;
            $user->birth = $this->birth;
            $user->phone = $this->phone;
            $user->image = $this->image;
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }

}
