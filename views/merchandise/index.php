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

        <?php
        // Loop through products
        foreach ($products as $product) {
            ?>
            <div class="card" style="width: 18rem; display: inline-block; margin: 10px;">
                <img src="../../web/img/Cronch_Pistol.png" class="card-img-top" alt="<?php echo $product['name']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product['name']; ?></h5>
                    <p class="card-text">Price: $<?php echo number_format($product['price'], 2); ?></p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
            </div>
            <?php
        }
        ?>

    </div>

</div>
