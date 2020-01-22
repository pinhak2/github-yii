<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AddressTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'AddressType';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="addresstype-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create AddressType', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);
    
    $dataProvider = isset($dataProvider) ? $dataProvider : null;
    $searchModel = new app\models\AddressTypeSearch;
    
    ?>

    <?= 
    
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'address_id',
            'type_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
