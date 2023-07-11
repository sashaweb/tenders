<?php

/** @var yii\web\View $this */

use yii\grid\GridView;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Tenders</h1>
    </div>

    <?php
        echo GridView::widget([
            'dataProvider' => $dataProvider,
        ]);    
    ?>

    </div>
</div>
