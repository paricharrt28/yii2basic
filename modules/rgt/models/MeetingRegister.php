<?php

namespace app\modules\rgt\models;

use Yii;

/**
 * This is the model class for table "meeting_register".
 *
 * @property int $meeting_register_id
 * @property int $meeting_register_name
 * @property string $meeting_register_cid
 * @property string $meeting_register_date
 * @property int $meeting_register_active
 * @property string $meeting_register_hospcode
 */
class MeetingRegister extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'meeting_register';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['meeting_register_name', 'meeting_register_cid', 'meeting_register_date', 'meeting_register_hospcode'], 'required'],
            [['meeting_register_active'], 'integer'],
            [['meeting_register_name'], 'string', 'max' => 100],
            [['meeting_register_date'], 'safe'],
            [['meeting_register_cid'], 'string', 'length' => 13, 'skipOnEmpty' => false],
            [['meeting_register_hospcode'], 'string', 'max' => 5],
            [['meeting_register_cid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'meeting_register_id' => 'รหัส',
            'meeting_register_name' => 'ชื่อ-นามสกุล',
            'meeting_register_cid' => 'เลขบัตรประชาชน',
            'meeting_register_date' => 'วันที่ลงทะเบียน',
            'meeting_register_active' => 'สถานะ',
            'meeting_register_hospcode' => 'หน่วยบริการ',
        ];
    }

}
