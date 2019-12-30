<?php

use yii\helpers\Url;
?>
<div class="success">
  <span class="glyphicon glyphicon-ok"></span>
  <h1>恭喜,操作成功!</h1>
  <div>
    <a class="btn btn-primary" href="<?php echo Url::to(['/book/create']) ?>">添加图书</a>
    <a class="btn btn-primary" href="<?php echo Url::to(['/book']) ?>">返回列表</a>
  </div>
</div>