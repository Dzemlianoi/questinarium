<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\LoginForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoginForm */
/* @var $form ActiveForm */
?>


<div class="form-box">
    <?php
        $form = ActiveForm::begin(
            [
                'action' => ['/auth/signin'],
                'method' => 'post',
                'validateOnChange'=>'true',
            ]
        );
    ?>

    <?= $form->field($model, 'login') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Enter', ['class' => 'admin-submit btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
