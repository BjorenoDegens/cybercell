<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Form $model */

$this->title = $form_title->title;
$this->params['breadcrumbs'][] = ['label' => 'Forums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="form-view">


    <p>
        <?php if($userId === $forum_user_id )

        {?>

            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
            <?php
        }
        ?>
        </php>

    </p>

    <div class="container">
        <!-- Forum Post List -->
        <div class="row">
            <div class="col-md-12">
                <?php foreach ( $forum as $part): ?>
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
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <h3>Replys</h3>
    <div class="container">
        <!-- Forum Post List -->
        <div class="row">
            <div class="col-md-12">
                <?php foreach ( $replys as $part): ?>
                    <div class="card mb-4 w-50  ">
                        <div class="card-header" style="background-color: DarkMagenta; color:white;">
                            <bre style="font-weight: bold;">Replied by:</bre>
                            <bre style="font-style: italic;"><?= $part->user->username; ?></bre>
                        </div>
                        <div class="card-body">
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
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
