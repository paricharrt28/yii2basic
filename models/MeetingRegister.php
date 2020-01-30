<?php

namespace app\models;

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
class MeetingRegister extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meeting_register';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meeting_register_name', 'meeting_register_cid', 'meeting_register_date', 'meeting_register_hospcode'], 'required'],
            [['meeting_register_name', 'meeting_register_active'], 'integer'],
            [['meeting_register_date'], 'safe'],
            [['meeting_register_cid'], 'string', 'max' => 13],
            [['meeting_register_hospcode'], 'string', 'max' => 5],
            [['meeting_register_cid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'meeting_register_id' => 'Meeting Register ID',
            'meeting_register_name' => 'Meeting Register Name',
            'meeting_register_cid' => 'Meeting Register Cid',
            'meeting_register_date' => 'Meeting Register Date',
            'meeting_register_active' => 'Meeting Register Active',
            'meeting_register_hospcode' => 'Meeting Register Hospcode',
        ];
    }
}
