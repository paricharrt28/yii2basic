<?php

namespace app\modules\rgt\controllers;

use yii\web\Controller;

class ReportController extends Controller {

    public function actionIndex() {
        $conn = \Yii::$app->db;
        $queryStr = "select * from chospital #limit 100";
        $data = $conn->createCommand($queryStr)->queryAll();
        //print_r($data);
        return $this->render('index');
    }

}
