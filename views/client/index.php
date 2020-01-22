<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cliente';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="client-index">

    <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Novo Cliente', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);
    
        $dataProvider = isset($dataProvider) ? $dataProvider : null;
        $searchModel = new app\models\ClientSearch;
    
    ?>

    <?= 
    
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'e_mail',
            'rg',
            

            ['class' => 'yii\grid\ActionColumn'],
            
        ],
    ]); ?>
    
</div>
