<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "suda_country".
 *
 * @property int $country_id
 * @property string $country
 *
 * @property StateSudaCountry[] $stateSudaCountries
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'suda_country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country'], 'required'],
            [['country'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'country_id' => 'Country ID',
            'country' => 'Country',
        ];
    }

    /**
     * Gets query for [[StateSudaCountries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStateSudaCountries()
    {
        return $this->hasMany(State::class, ['fk_country' => 'country_id']);
    }
}