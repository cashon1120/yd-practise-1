<?php

namespace app\models;

use yii\db\ActiveRecord;

use Yii;

class Book extends ActiveRecord
{
  // public $name;
  // public $author;
  // public $isbn;
  // public $price;
  // public $remarks;

  public function rules()
  {
    return [
      // name, email, subject and body are required
      ['name', 'required', 'message' => '名称不能为空'],
      ['author', 'required', 'message' => '作者不能为空'],
      ['isbn', 'required', 'message' => 'ISBN不能为空'],
      ['price', 'required', 'message' => '价格不能为空'],
      ['remarks', 'required', 'message' => '备注不能为空']
    ];
  }

  public function create($updateId)
  {
    $model = new Book();
    if ($model->load(Yii::$app->request->post(), '') && $model->validate()) {
      date_default_timezone_set('PRC');
      $model->create_time = date('Y-m-d H:i:s',time());
      if ($updateId) {
        $results = Book::find()->where(['id' => $updateId])->one();
        $results->name = $model->name;
        $results->author = $model->author;
        $results->isbn = $model->isbn;
        $results->price = $model->price;
        $results->remarks = $model->remarks;
        $results->update();
        return true;
      }
      $model->save();
      return true;
    }
    return false;
  }
}
