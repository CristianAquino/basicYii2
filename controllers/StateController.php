<?php

namespace app\controllers;

use app\models\Country;
use app\models\State;
use app\models\StateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StateController implements the CRUD actions for State model.
 */
class StateController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all State models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StateSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single State model.
     * @param int $state_id State ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($state_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($state_id),
        ]);
    }

    /**
     * Creates a new State model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new State();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $country = Country::find()->where(['country' => $model->fk_country])->one();
                if ($country) {
                    $model->fk_country = $country->country_id;
                }
                $model->save();
                return $this->redirect(['view', 'state_id' => $model->state_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing State model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $state_id State ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($state_id)
    {
        $model = $this->findModel($state_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'state_id' => $model->state_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing State model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $state_id State ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($state_id)
    {
        $this->findModel($state_id)->delete();

        return $this->redirect(['index']);
    }

    // action necesario para listar los estados de un pais
    // que seran visualizado en el formulario
    public function actionLists($id)
    {
        $countState = State::find()->where(['fk_country' => $id])->count();
        $state = State::find()->where(['fk_country' => $id])->all();

        if ($countState > 0) {
            foreach ($state as $s) {
                echo "<option value='$s->state_id'>$s->state</option>";
            }
        } else {
            echo "<option value=''>No State</option>";
        }
    }

    /**
     * Finds the State model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $state_id State ID
     * @return State the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($state_id)
    {
        if (($model = State::findOne(['state_id' => $state_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}