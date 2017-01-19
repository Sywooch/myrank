<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profile_views".
 *
 * @property integer $id
 * @property integer $lastweek
 * @property integer $lastmonth
 */
class ProfileViews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile_views';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lastweek', 'lastmonth'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'lastweek' => Yii::t('app', 'Lastweek'),
            'lastmonth' => Yii::t('app', 'Lastmonth'),
        ];
    }
}
