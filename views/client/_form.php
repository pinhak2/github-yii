<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Type;
use app\models\Address;
use yii\helpers\ArrayHelper;


/*foreach ($model2 as $i=> $model2) {
            echo $form->field($model2, "[$i]street")->label('Rua');
            echo $form->field($model2, "[$i]number")->label('Numero');
            echo $form->field($model2, "[$i]neighborhood")->label('Bairro');
            echo $form->field($model2, "[$i]type_id")->dropDownList(
                $listData,
                ['prompt'=>'Tipo do endereço']
            )->label('Tipo');
            echo $form->field($model2, "[$i]active")->checkBox();
            
        } ?>*/

$types = Type::find()->all();

$listData = ArrayHelper::map($types,'id','description');


$this->registerJs("
$('.delete-button').click(function() {
    var detail = $(this).closest('.address');
    var updateType = detail.find('.update-type');
    if (updateType.val() === " . json_encode(Address::UPDATE_TYPE_UPDATE) . ") {
        //marking the row for deletion
        updateType.val(" . json_encode(Address::UPDATE_TYPE_DELETE) . ");
        detail.hide();
    } else {
        //if the row is a new row, delete the row
        detail.remove();
    }
});
");

/* @var $this yii\web\View */
/* @var $model app\models\Client */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="client-form">
    <div class="row">
        <?php $form = ActiveForm::begin(['enableClientValidation' => false]);?> 
        <div class="col-md-6">
            <?= $form->field($model,'nome')->textInput()->label('Nome', ['class' => 'label label label-info']) ?>
        </div>
        
        <div class="col-md-4">
            <?= $form->field($model,'e_mail')->input('email')->label('Email', ['class' => 'label label label-warning']) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model,'rg')->textInput(['type' => 'text','minlength'=>8,'maxlength' => 8])->label('RG', ['class' => 'label label label-danger']) ?>
        </div>
        
        <div class="col-sm-12">
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="sr-only">100% Complete</span></div>
                    <span class="sr-only">100% Complete</span>
                </div>
            </div>
        </div>

<div class="address-form"> 
    <?php foreach ($model2 as $i => $model2) : $aux = $i+1;?> 
    <div class="row address address-<?= $i ?>">    
        <div class="col-md-10">
            <h3> <span class="label label-info"> <?= Html::encode("$aux º Endereço") ?> </span> </h3>
        </div>

        <div class="col-sm-2">
            <?= Html::button("Deletar Endereço $aux", ['name' => 'x','value'=>'true','class' => 'delete-button btn btn-danger', 'data-target' => "address-$i"]) ?>
        </div>

        <?= Html::activeHiddenInput($model2, "[$i]id") ?>
        <?= Html::activeHiddenInput($model2, "[$i]updateType", ['class' => 'update-type']) ?>

        <div class="col-md-9">
            <?= $form->field($model2, "[$i]street")->label("Rua do $aux º endereço", ['class' => 'label label label-default']) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model2, "[$i]number")->label("Numero do $aux º endereço", ['class' => 'label label label-success']) ?>
        </div>
                
        <div class="col-md-9">
            <?= $form->field($model2, "[$i]neighborhood")->label("Bairro do $aux º endereço", ['class' => 'label label label-danger']) ?>
        </div>
            
        <div class="col-md-3">
            <?= $form->field($model2, "[$i]type_id")->dropDownList(
            $listData,
            )->label("Tipo do $aux º endereço", ['class' => 'label label label-primary']) ?>
        </div>

        <div class="col-md-12">
            <?= $form->field($model2, "[$i]active")->checkBox() ?>
        </div>

        <div class="col-sm-12">
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="sr-only">100% Complete</span></div>
                    <span class="sr-only">100% Complete</span>
                </div>
            </div>
        </div>
    </div>    

    <?php endforeach; ?>    
</div>

<div class="form-group"> 
    <div class="col-md-4">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::submitButton('Novo Endereço', ['name' => 'submit', 'value' => 'true', 'class' => 'btn btn-info']) ?>
    </div>
</div>
        <?php ActiveForm::end(); ?>
</div>
