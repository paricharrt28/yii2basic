<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "meeting_regis".
 *
 * @property int $meeting_register_id
 * @property int $meeting_list_id
 * @property string $meeting_regis_date
 */
class MeetingRegis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meeting_regis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meeting_register_id', 'meeting_list_id', 'meeting_regis_date'], 'required'],
            [['meeting_register_id', 'meeting_list_id'], 'integer'],
            [['meeting_regis_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'meeting_register_id' => 'Meeting Register ID',
            'meeting_list_id' => 'Meeting List ID',
            'meeting_regis_date' => 'Meeting Regis Date',
        ];
    }
}
