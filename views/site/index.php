<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
$this->title = '图书管理系统';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>图书管理理系统!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="<?php echo Url::to(['/book']) ?>">查看图书</a></p>
    </div>
</div>
