<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Client */

$this->title = 'Novo Cliente';
$this->params['breadcrumbs'][] = ['label' => 'Client', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-create">
    <div class="col-md-10">
        <h2> <span class="label label-default"> <?= Html::encode("Cliente") ?> </span> </h2>
    </div> 

    <?= $this->render('_form', [
                'model' => $model,
                'model2' => $model2
            ]) 
    ?>
</div>
