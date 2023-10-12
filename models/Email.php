<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "email".
 *
 * @property int $id
 * @property string $sendTo
 * @property string $sendFrom
 * @property string $content
 * @property string|null $attachement
 * @property string|null $subjectEmail
 */
class Email extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $archivo;
    public static function tableName()
    {
        return 'email';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sendTo', 'sendFrom', 'content'], 'required', 'message' => 'it is necessary to fill out this field'],
            [['content'], 'string'],
            [['sendTo', 'sendFrom'], 'email', 'message' => 'invalid email'],
            // [['attachement'], 'string', 'max' => 255],
            [['subjectEmail'], 'string', 'max' => 250],
            [['archivo'], 'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sendTo' => 'Send To',
            'sendFrom' => 'Send From',
            'content' => 'Content',
            // 'attachement' => 'Attachement',
            'subjectEmail' => 'Subject',
        ];
    }
}
