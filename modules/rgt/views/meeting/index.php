<?php

use yii\helpers\Html;

#print_r($model);

foreach ($model as $row) {
    echo '<h3>';
    echo $row['meeting_list_name'];
    echo Html::a(' ลงทะเบียน', ['regis', 'id' => $row['meeting_list_id']]);
    echo ' | ';
    echo Html::a('ตรวจสอบรายชื่อ', ['regislist', 'id' => $row['meeting_list_id']]);

    echo '</h3>';
}
?>