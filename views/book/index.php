<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
$this->title = '图书列表';
?>
<div class="row">
  <div class="col-md-8">
    <h1>Books</h1>
  </div>
  <div class="col-md-4 create-wrapper"><a class="btn btn-primary" href="<?php echo Url::to(['/book/create']) ?>">新增图书</a></div>
</div>

<table class="table-bordered table-striped" style="width: 100%" cellspacing="5px">
  <tr>
    <th width="15">ID</th>
    <th>名称</th>
    <th>作者</th>
    <th>ISBN</th>
    <th>售价</th>
    <th>备注</th>
    <th>时间</th>
    <th width="150">操作</th>
  </tr>
  <?php foreach ($books as $book) : ?>
    <tr>
      <td><?= $book->id ?></td>
      <td><?= Html::encode("{$book->name}") ?></td>
      <td><?= Html::encode("{$book->author}") ?></td>
      <td><?= Html::encode("{$book->isbn}") ?></td>
      <td><?= $book->price ?></td>
      <td><?= Html::encode("{$book->remarks}") ?></td>
      <td><?= Html::encode("{$book->create_time}") ?></td>
      <td>
        <a title="编辑" class="edit" data-id="<?= $book->id ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        <a title="删除" class="delete" data-id="<?= $book->id ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="exampleModalLabel">系统提示</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="message-text" class="control-label">确定要删除该数据吗？</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
        <button type="button" class="btn btn-primary" id="deleteBtn">确认</button>
      </div>
    </div>
  </div>
</div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>

<script>
  window.onload = function() {
    $('.edit').on('click', function(e) {
      const id = e.currentTarget.dataset.id
      window.location.href = "/basic/web/index.php?r=book/create&id=" + id
    })

    $('.delete').on('click', function(e) {
      const id = e.currentTarget.dataset.id
      $('#deleteModal').modal();
      $('#deleteBtn').one('click', function() {
        window.location.href = "/basic/web/index.php?r=book/delete&id=" + id
      });
    })
  }
</script>