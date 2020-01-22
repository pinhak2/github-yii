<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Address';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="address-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Address', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);
    
    $dataProvider = isset($dataProvider) ? $dataProvider : null;
    $searchModel = new app\models\AddressSearch;
    
    ?>

    <?= 
    
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'street',
            'number',
            'neighborhood',
            'active',
            'client_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
