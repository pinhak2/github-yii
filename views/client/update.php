<?php

use yii\helpers\Html;



/* @var $this yii\web\View */
/* @var $model app\models\Client */

$this->title = 'Update Client: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Client', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="client-update">

<h2> <span class="label label-default"> <?= Html::encode("Cliente") ?> </span> </h2>
    <?= $this->render('_form', [
        'model' => $model, 'model2' => $model2
    ]) 
    ?>
</div>