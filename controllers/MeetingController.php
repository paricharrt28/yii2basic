<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\MeetingList;
use app\models\MeetingRegis;
use app\models\MeetingRegister;

class MeetingController extends Controller {

    public function actionIndex() {
        $model = MeetingList::find()
                ->asArray()
                ->all();
        return $this->render('index', ['model' => $model]);
    }

    public function actionRegis($id) {
        //ดึงข้อมูลหัวข้อประชุม
        $data = MeetingList::find()
                ->where(['meeting_list_id' => $id])
                ->asArray()
                ->one();

        $model = new MeetingRegis;
        $model2 = new MeetingRegister;
        $model2->meeting_register_date = date('Y-m-d H:i:s');
        $model2->meeting_register_active = 1;
        if ($model2->load(Yii::$app->request->post()) && $model2->save()) {
            //------------------------------------------
            $model->meeting_register_id = $model2->meeting_register_id;
            $model->meeting_list_id = $id;
            $model->meeting_regis_date = date('Y-m-d H:i:s');

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        }
        return $this->render('regis_form', ['model2' => $model2, 'model' => $model, 'data' => $data]);
    }

}
