<?php

namespace app\models;


use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%events}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $description
 * @property integer $status
 * @property integer $occur_at
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $user
 */
class Event extends \yii\db\ActiveRecord
{

    const STATUS_ACTIVE = 10;    

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%events}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'occur_at', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['occur_at',], 'required'],
            [['title'], 'string', 'max' => 255],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'status' => Yii::t('app', 'Status'),
            'occur_at' => Yii::t('app', 'Occur At'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
