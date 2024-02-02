<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('Download', ['../web/download/installer.exe'], ['class' => 'btn btn-secondary btn-lg d-block w-100 mb-3', 'style' => 'background-color: #8B008B; color:white; border-color:#660066; ']) ?>
</div>
