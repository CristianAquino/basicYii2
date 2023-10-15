<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "state_suda_country".
 *
 * @property int $state_id
 * @property string $state
 * @property int $fk_country
 *
 * @property SudaCountry $fkCountry
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'state_suda_country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['state', 'fk_country'], 'required'],
            [['fk_country'], 'integer'],
            [['state'], 'string', 'max' => 100],
            [['fk_country'], 'exist', 'skipOnError' => true, 'targetClass' => SudaCountry::class, 'targetAttribute' => ['fk_country' => 'country_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'state_id' => 'State ID',
            'state' => 'State',
            'fk_country' => 'Fk Country',
        ];
    }

    /**
     * Gets query for [[FkCountry]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkCountry()
    {
        return $this->hasOne(Country::class, ['country_id' => 'fk_country']);
    }
}
