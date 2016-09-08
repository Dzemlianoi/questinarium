<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forms".
 *
 * @property integer $id
 * @property string $name
 * @property integer $order
 */
class Forms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'forms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'order'], 'required'],
            [['order'], 'integer'],
            [['name'], 'string', 'max' => 40],
            [['name'], 'unique'],
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
            'order' => 'Order',
        ];
    }

    public static function getAllForms(){

        $query='SELECT forms.id,forms.name,forms.order,COUNT(questions.form_id) as quantity From forms left join questions on forms.id=questions.form_id GROUP BY forms.order';
        return self::findBySql($query)->asArray()->all();
    }
}
