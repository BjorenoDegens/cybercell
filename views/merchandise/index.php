<?php

use app\models\Merchandise;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Merchandises';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="merchandise-index">

    <div class="container mt-5">
        <h2>Webshop</h2>

        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="../../web/img/<?= $product['imgname']?>.png" class="card-img-top img-fluid" alt="<?= Html::encode($product['name']); ?>" style="max-height: 400px">
                        <div class="card-body">
                            <h5 class="card-title"><?= Html::encode($product['name']); ?></h5>
                            <p class="card-text">Price: $<?= number_format($product['price'], 2); ?></p>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>
