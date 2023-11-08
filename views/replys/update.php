<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Replys $model */

$this->title = 'Update Replys: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Replys', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="replys-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
