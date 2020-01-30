<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "meeting_list".
 *
 * @property int $meeting_list_id
 * @property string $meeting_list_name
 * @property string $meeting_list_detail
 * @property int $meeting_list_active
 */
class MeetingList extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'meeting_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['meeting_list_name', 'meeting_list_detail'], 'required'],
            [['meeting_list_detail'], 'string'],
            [['meeting_list_active'], 'integer'],
            [['meeting_list_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'meeting_list_id' => 'รหัส',
            'meeting_list_name' => 'หัวข้อการประชุม',
            'meeting_list_detail' => 'รายละเอียด',
            'meeting_list_active' => 'สถานะ',
        ];
    }

}
