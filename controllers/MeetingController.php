<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\MeetingList;
use app\models\MeetingRegis;
use app\models\MeetingRegister;
use yii\data\ActiveDataProvider;
use app\components\ClineBot;

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

            if ($model->save()) {
                //แจ้ง Line
                $message = 'คุณ' . $model2->meeting_register_name . ' ลงทะเบียน' . $data['meeting_list_name'];
                ClineBot::send($message);
                return $this->redirect(['index']);
            }
        }
        return $this->render('regis_form', ['model2' => $model2, 'model' => $model, 'data' => $data]);
    }

    public function actionRegislist($id) {
        $model = MeetingRegis::find()
                ->where(['meeting_regis.meeting_list_id' => $id])
                ->joinWith(['register', 'list']);

        $dataProvider = new ActiveDataProvider([
            'pagination' => [
                'pageSize' => 1,
            ],
            'query' => $model,
        ]);

        return $this->render('regislist', [
                    'dataProvider' => $dataProvider
        ]);
    }

}
