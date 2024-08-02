<?php
use yii\helpers\Url;
/** @var yii\web\View $this */

$this->title = 'Registration Portal';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Welcome to User Registration Portal!</h1>

        <p class="lead">Please Register Here ⬇️</p>

        <p><a class="btn btn-lg btn-success" href=<?= Url::to(['/users/user']) ?>>User Registration From</a></p>
    </div>

    
</div>
