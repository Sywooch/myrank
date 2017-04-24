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
            'text' => Yii::t('app', 'TESTIMONIALS_TEXT'),
            'user_from' => Yii::t('app', 'USER_FROM'),
            'user_to' => Yii::t('app', 'USER_TO'),
            'smile' => Yii::t('app', 'SMILE'),
            'parent_id' => Yii::t('app', 'PARENT_ID'),
            'created' => Yii::t('app', 'CREATED'),
            'parentText' => Yii::t('app', 'PARENT_TEXT'),
            'fullNameFrom'=> Yii::t('app', 'USER_FROM_FULLNAME'),
            'fullNameTo'=> Yii::t('app', 'USER_TO_FULLNAME'),
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
        return $parent ? $parent->text : ( (string) \Yii::t('app','WITHOUT_PARENT') );
    }

    public function getUserFrom() {
        return $this->hasOne(User::className(), ['id' => 'user_from'])->from(User::tableName() . ' AS userFrom');
    }

    public function getUserTo() {
        return $this->hasOne(User::className(), ['id' => 'user_to'])->from(User::tableName() . ' AS userTo');
    }

    public function getFullNameFrom() {
        return $this->userFrom ? ($this->userFrom->first_name.' '.$this->userFrom->last_name) : ( (string) \Yii::t('app','NO_USER') );
    }

    public function getFullNameTo() {
        return $this->userTo ? ($this->userTo->first_name.' '.$this->userTo->last_name) : ( (string) \Yii::t('app','NO_USER') );
    }

}
