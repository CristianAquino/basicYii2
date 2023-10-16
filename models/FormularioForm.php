<?php

namespace app\models;

use yii\base\Model;

class FormularioForm extends Model
{
    public $valorA;
    public $valorB;
    // variables para formulario
    public $country;
    public $state;

    public function rules()
    {
        return [
            [['valorA', 'valorB'], 'required'],
            [['valorA', 'valorB'], 'number'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'valorA' => 'Ingreser el primer numero',
            'valorB' => 'Ingreser el segundo numero',
            'country' => 'Seleccione un pais',
        ];
    }
}