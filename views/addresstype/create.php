<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AddressType */

$this->title = 'Create AddressType';
$this->params['breadcrumbs'][] = ['label' => 'AddressType', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="addresstype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
