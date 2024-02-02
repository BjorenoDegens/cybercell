<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

?>
<div class="site-index mt-5">
<div class="bg-dark text-white py-5 d-flex background-img">
      <div class="container text-center ">
        <h1 class="display-1">CYBERCELL</h1>
      </div>
</div>
    <div class="container mt-5">
        <div class="row">
          <div class="col-md-8">
            <p class="lead">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Vestibulum in diam velit. Fusce consequat vestibulum nisi, eu
              vestibulum lectus non cursus est. Mauris imperdiet laoreet massa,
              a imperdiet lectus finibus eu.
            </p>
          </div>
          <div class="col-md-4">
            <?= Html::a('Download', ['../web/download/installer.exe'], ['class' => 'btn btn-secondary btn-lg d-block w-100 mb-3', 'style' => 'background-color: #8B008B; color:white; border-color:#660066; ']) ?>
            <?= Html::a('Forum', ['../web/forum/index'], ['class' => 'btn btn-secondary btn-lg d-block w-100 mb-3', 'style' => 'background-color: #8B008B; color:white; border-color:#660066; ']) ?>
            <?= Html::a('Shop', ['../web/merchandise/index'], ['class' => 'btn btn-secondary btn-lg d-block w-100 mb-3', 'style' => 'background-color: #8B008B; color:white; border-color:#660066; ']) ?>
          </div>
        </div>
      </div>
    </section>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-..."
      crossorigin="anonymous"
    ></script>
  </body>
</div>
