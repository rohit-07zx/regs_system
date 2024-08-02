<?php
namespace app\models;

use yii\base\Model;

class UserForm extends Model 
{
  public $username;
  public $email;
  public $countryCode;
  public $phone;
  public $gender;

   

  public function rules()
  {
    
    return [
            [['username', 'countryCode', 'phone', 'email', 'gender'], 'required'],
            [['username', 'countryCode', 'phone'], 'string', 'max' => 255],
            ['countryCode', 'match', 'pattern' => '/^\+?[0-9]{1,3}$/', 'message' => 'Country code must be between 1 and 3 digits and can start with a +.'],
            ['phone', 'match', 'pattern' => '/^[0-9]{10,15}$/', 'message' => 'Phone number must be between 10 to 15 digits.'],
            ['email', 'email'],
            ['gender', 'in', 'range' => ['M', 'F','T']],
        ];
  }
};
?>
