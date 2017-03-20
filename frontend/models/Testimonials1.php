<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;
use frontend\models\User;

/**
 * This is the model class for table "testimonials".
 *
 * @property integer $id
 * @property string $text
 * @property integer $user_from
 * @property integer $user_to
 * @property integer $smile
 * @property integer $parent_id
 * @property string $created
 */
class Testimonials1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'testimonials';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['user_from', 'user_to', 'smile', 'parent_id'], 'integer'],
            [['created'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'text' => Yii::t('app', 'Text'),
            'user_from' => Yii::t('app', 'User From'),
            'user_to' => Yii::t('app', 'User To'),
            'smile' => Yii::t('app', 'Smile'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'created' => Yii::t('app', 'Created'),
            'parentText' => Yii::t('app', 'Parent Text'),
            'fullNameFrom'=> Yii::t('app', 'UserFrom Full Name'),
            'fullNameTo'=> Yii::t('app', 'UserTo Full Name'),
        ];
    }

    public function getParent()
    {
        return $this->hasOne( self::className(),['id' => 'parent_id'])
            ->from(self::tableName() . ' AS parent');
    }

    public function getChildren() {
        return $this->hasOne(self::className(), ['parent_id' => 'id'])
            ->from(self::tableName().' AS parent');
    }

    public function getParentText() {
        //return $this->parent->name;
        //return @$this->parent->name;
        //return $this->parent['name'];
        $parent = $this->parent;
        return $parent ? $parent->text : 'Без родителя';
    }

    public function getUserFrom() {
        return $this->hasOne(User::className(), ['id' => 'user_from'])->from(User::tableName() . ' AS userFrom');
    }

    public function getUserTo() {
        return $this->hasOne(User::className(), ['id' => 'user_to'])->from(User::tableName() . ' AS userTo');
    }

    public function getFullNameFrom() {
        return $this->userFrom ? ($this->userFrom->first_name.' '.$this->userFrom->last_name) : 'Нет пользователя';
    }

    public function getFullNameTo() {
        return $this->userTo ? ($this->userTo->first_name.' '.$this->userTo->last_name) : 'Нет пользователя';
    }

}
