<?php

namespace app\modules\rgt\controllers;

use Yii;
use yii\web\Controller;
use app\modules\rgt\models\MeetingList;
use app\modules\rgt\models\MeetingRegis;
use app\modules\rgt\models\MeetingRegister;
use yii\data\ActiveDataProvider;
use app\components\ClineBot;

class MeetingController extends Controller {

    public function actionIndex() {
        $model = MeetingList::find();
        $dataProvider = new ActiveDataProvider([
            'pagination' => [
                'pageSize' => 20,
            ],
            'query' => $model,
        ]);
        return $this->render('index', [
                    'dataProvider' => $dataProvider
        ]);
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
                //แจ้งเตือนการบันทึก
                Yii::$app->getSession()->setFlash('alert', [
                    'body' => 'บันทึกข้อมูลสำเร็จ..',
                    'options' => ['class' => 'alert-success']
                ]);
                //แจ้ง Line
                $message = 'คุณ' . $model2->meeting_register_name . ' ลงทะเบียน' . $data['meeting_list_name'];
                ClineBot::send($message);
                return $this->redirect(['index']);
            } else {
                //แจ้งเตือนการบันทึก
                Yii::$app->getSession()->setFlash('alert', [
                    'body' => 'บันทึกข้อมูลไม่สำเร็จ..',
                    'options' => ['class' => 'alert-danger']
                ]);
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
                'pageSize' => 20,
            ],
            'query' => $model,
        ]);

        return $this->render('regislist', [
                    'dataProvider' => $dataProvider
        ]);
    }

    public function actionHosList($q = null, $id = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new yii\db\Query;
            $query->select([
                        'id' => 'hoscode',
                        'text' => 'concat(hoscode," ",hosname)',
                    ])
                    ->from('chospital')
                    ->where(['like', 'concat(hoscode," ",hosname)', $q])
                    ->limit(5);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        return $out;
    }

    public function actionDelete($meeting_register_id, $meeting_list_id) {
        MeetingRegis::findOne($meeting_register_id, $meeting_list_id)->delete();
        Yii::$app->getSession()->setFlash('alert', [
            'body' => 'ลบข้อมูลสำเร็จ..',
            'options' => ['class' => 'alert-success']
        ]);
        return $this->redirect(['index']);
    }

}
