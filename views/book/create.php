<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = $id ? '修改图书' : '添加图书';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-contact">
  <h1><?= Html::encode($this->title) ?></h1>

  <div class="row" style="padding-top: 40px;">
    <div class="col-lg-12">
      <?php $form = ActiveForm::begin([
        'id' => 'create-form', 'layout' => 'horizontal',
        'fieldConfig' => [
          'template' => "{label}\n<div class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-4\">{error}</div>",
          'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
      ]);  ?>

      <?= $form->field($model, 'name')->label('名称')->textInput(['autofocus' => true]) ?>

      <?= $form->field($model, 'author')->label('作者') ?>

      <?= $form->field($model, 'isbn')->label('ISBN') ?>

      <?= $form->field($model, 'price')->label('价格') ?>

      <?= $form->field($model, 'remarks')->label('备注')->textarea(['rows' => 4]) ?>


      <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
          <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
          <input style="margin-left: 30px;" type="button" class="btn btn-default" value="返回" onclick="javascript:history.go(-1)" id="back" />
        </div>
      </div>


      <?php ActiveForm::end(); ?>

    </div>
  </div>
</div>