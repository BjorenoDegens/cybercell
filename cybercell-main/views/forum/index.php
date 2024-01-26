<?php

use app\models\Forum;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Forums';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="form-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Forum', ['create'], ['class' => 'btn', 'style' => 'background-color: #8B008B; color:white; border-color:#660066;
']) ?>


    </p>

    <div class="container">
        <!-- Forum Post List -->
        <div class="row">
            <div class="col-md-12">
                <?php foreach ($forum as $part): ?>
                    <div class="card mb-4">
                        <div class="card-header" style="background-color: DarkMagenta; color:white;">
                            <bre style="font-weight: bold;">Posted by:</bre>
                            <bre style="font-style: italic;"><?= $part->user->username; ?></bre>
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <bre style="font-weight: bold;"><?= $part->title; ?></bre>
                            </div>
                            <p class="card-text">
                                <?= $part->message; ?>
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between" >
                            <div class="d-flex flex-column">
                                <small><b>Created at:</b> <?= date(' H:i j F Y ', strtotime($part->created_at)) ?></small>
                                <small><b>Updated at:</b> <?= date(' H:i j F Y ', strtotime($part->updated_at)) ?></small>
                            </div>
                            <div>
                                <?= Html::a('See more', ['forum/view?id='.$part->id,], ['class' => 'btn', 'style' => 'background-color: #8B008B; color:white; border-color:#660066;']);?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


</div>
