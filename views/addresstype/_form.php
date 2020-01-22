<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AddressType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="addresstype-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'address_id')->textInput() ?>
    <?= $form->field($model, 'type_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
