<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

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
            'userFromFullName'=> Yii::t('app', 'UserFrom Full Name'),
            'userToFullName'=> Yii::t('app', 'UserTo Full Name'),
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

    public function getUser() {
        return $this->hasOne(User::className(),['id' => 'user_from']);
    }

    public function getUser1() {
        return $this->hasOne(User::className(),['id' => 'user_to']);
    }

    public function getUserFromFullName() {
        return $this->user ? ($this->user->first_name.' '.$this->user->last_name) : 'Нет пользователя';
    }

    public function getUserToFullName() {
        return $this->user1 ? ($this->user1->first_name.' '.$this->user1->last_name) : 'Нет пользователя';
    }

}
