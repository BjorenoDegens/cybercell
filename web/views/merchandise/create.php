<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Merchandise $model */

$this->title = 'Create Merchandise';
$this->params['breadcrumbs'][] = ['label' => 'Merchandises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="merchandise-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
