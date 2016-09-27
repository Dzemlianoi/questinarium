<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "questions".
 *
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property integer $form_id
 * @property integer $is_required
 * @property integer $has_custom_order
 * @property integer $order
 *
 * @property Answers[] $answers
 * @property Forms $form
 */
class Questions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'questions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type', 'form_id'], 'required'],
            [['form_id', 'is_required', 'has_custom_order', 'order'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 40],
            [['form_id'], 'exist', 'skipOnError' => true, 'targetClass' => Forms::className(), 'targetAttribute' => ['form_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
            'form_id' => 'Form ID',
            'is_required' => 'Is Required',
            'has_custom_order' => 'Has Custom Order',
            'order' => 'Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answers::className(), ['question_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForm()
    {
        return $this->hasOne(Forms::className(), ['id' => 'form_id']);
    }

    public static function getAllQuestions($reindex=null){
        $questions = Questions::find()->joinWith('answers')->joinWith('form')->asArray()->orderBy('forms.order')->all();
        if ($reindex){
            $questions=ArrayHelper::index($questions,null,'form.name');
        }

        return $questions;
    }
}
