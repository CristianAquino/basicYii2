<?php

namespace app\models;

use Yii;
use yii\base\Model;



class EntryForm extends Model
{
    public $username;
    public $password;
    public $email;
    public $inputFiles;
    public $items;
    public $gender;
    public $country;

    public function rules()
    {
        return [
            // username
            [['username'], 'required', 'message' => 'el username es requerido.'],
            ['username', 'trim'],
            ['username', 'string', 'min' => 3, 'max' => 200, 'message' => 'el username debe contener almenos 3 caracteres de longitud.'],
            // password
            [['password'], 'required', 'message' => 'el password es requerido.'],
            ['password', 'string', 'min' => 8, 'max' => 24, 'message' => 'el password debe contener almenos 8 caracteres de longitud.'],
            // email
            [['email'], 'required', 'message' => 'el email es requerido.'],
            ['email', 'email', 'message' => 'Debe ingresar un email valido.'],
            // files
            [['inputFiles'], 'file', 'extensions' => 'jpg,png,gif', 'message' => 'Solo puede ingresar archivos con extension jpg,png,gif'],
            // validate in line
            [['country'], 'validateCountry'],
            // validate client 
            [['country'], 'in', 'range' => ['USA', 'Web'], 'message' => 'El país debe ser "USA" o "Web".'],

        ];
    }
    public function validateCountry($attribute, $params)
    {
        if (!in_array($this->$attribute, ['USA', 'Web'])) {
            $this->addError($attribute, 'El país debe ser "USA" o "Web".');
        }
    }
}
