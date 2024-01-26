<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Replys $model */

$this->title = 'Create Replys';
$this->params['breadcrumbs'][] = ['label' => 'Replys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="replys-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
