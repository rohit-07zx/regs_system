<?php

namespace app\models;

use yii\db\ActiveRecord;

class Users extends ActiveRecord
{
    
    
    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return '{{users}}';
    }
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
    public function saveUser()
    {
        try {
            if (!$this->validate()) {
                throw new \Exception('Validation failed');
            }
            if (!$this->save()) {
                throw new \Exception('Failed to save user');
            }
        } catch (Exception $e) {
            Yii::error($e->getMessage(), __METHOD__);
             
            throw $e; 
        }
    }
}
?>