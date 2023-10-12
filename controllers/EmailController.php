<?php


namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

use app\models\Email;


class EmailController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                //controlamos los accesos al controlador
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        //permitimos el ingreso solo a logeados
                        'roles' => ['@'],
                    ]
                ],
            ]
        ];
    }
    public function actionIndex()
    {
        $model = new Email;
        if ($model->load($this->request->post())) {
            if ($model->archivo != null) {

                $this->uploadFile($model);

                $email = Yii::$app->mailer->compose()
                    ->setFrom($model->sendFrom)
                    ->setTo($model->sendTo)
                    ->setSubject($model->subjectEmail)
                    ->setTextBody($model->content)
                    ->attach($model->attachement)
                    ->send();

                $model->save();
                return $this->render(['views']);
            } else {
                $email = Yii::$app->mailer->compose()
                    ->setFrom($model->sendFrom)
                    ->setTo($model->sendTo)
                    ->setSubject($model->subjectEmail)
                    ->setTextBody($model->content)
                    ->send();

                $model->save();
                return $this->redirect('views');
            }
        }
        return $this->render('index', ['model' => $model]);
    }

    protected function uploadFile(Email $model)
    {
        $model->archivo = UploadedFile::getInstance($model, 'archivo');
        if ($model->archivo) {
            $ruteAttach = 'attachements/' . time() . '_' . $model->archivo->baseName . '.' . $model->archivo->extension;
            if ($model->archivo->saveAs($ruteAttach)) {
                $model->attachement = $ruteAttach;
            }
        }
    }
}
