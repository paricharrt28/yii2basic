<?php

namespace app\controllers;

use yii\web\Controller;

class BasicController extends Controller {

    public function actionIndex() {
        $str = '100X100= ' . (100 * 100);
        return $this->render('index', ['str' => $str]);
    }

}
