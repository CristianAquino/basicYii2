<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;

class CountryController extends Controller
{
    public function actionIndex()
    {
        $query = Country::find();
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('index', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);
    }

    // public function actionView($code){
    // 	$country = Country::findOne($code);
    // 	return $this->render('view', [
    // 		'country' => $country,
    // 	]);
    // }

    // public function actionCreate(){
    // 	$model = new Country();
    // 	if ($model->load(\Yii::$app->request->post()) && $model->save()) {
    // 		return $this->redirect(['view', 'code' => $model->code]);
    // 	} else {
    // 		return $this
    //     }
    // }
}