<?php

namespace app\modules\rgt\controllers;

use yii\web\Controller;
use yii\data\ArrayDataProvider;

class ReportController extends Controller {

    public function actionIndex() {
        $conn = \Yii::$app->db;
        $queryStr = "SELECT
COUNT(*) AS cc
,b.meeting_list_name AS listname
FROM meeting_regis a
LEFT JOIN meeting_list b ON a.meeting_list_id = b.meeting_list_id
GROUP BY a.meeting_list_id
";
        $data = $conn->createCommand($queryStr)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'pagination' => [
                'pageSize' => 20,
            ],
            'allModels' => $data,
        ]);
        return $this->render('index', [
                    'dataProvider' => $dataProvider
        ]);
    }

    public function actionSummary() {
        $conn = \Yii::$app->db;
        $queryStr = "SELECT
COUNT(*) AS cc
,b.meeting_list_name AS listname
,CONCAT(h.hoscode,' ',h.hosname) AS hosname
FROM meeting_regis a
LEFT JOIN meeting_list b ON a.meeting_list_id = b.meeting_list_id
LEFT JOIN meeting_register c ON a.meeting_register_id = c.meeting_register_id
LEFT JOIN chospital h ON h.hoscode = c.meeting_register_hospcode
GROUP BY a.meeting_list_id,c.meeting_register_hospcode
ORDER BY a.meeting_list_id ASC
";
        $data = $conn->createCommand($queryStr)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'pagination' => [
                'pageSize' => 20,
            ],
            'allModels' => $data,
        ]);
        return $this->render('summary', [
                    'dataProvider' => $dataProvider
        ]);
    }

}
