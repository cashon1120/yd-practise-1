<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Book;

class BookController extends Controller
{
    public function actionIndex()
    {
        $query = Book::find();
        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $books = $query->orderBy(['id' => SORT_DESC])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'books' => $books,
            'pagination' => $pagination,
        ]);
    }

    public function actionCreate()
    {
        $request = YII::$app->request;
        $id = $request->get('id');
        $results = Book::find()->where(['id' => $id])->one();
        $model = new Book();
        if ($id) {
            $model->id = $id;
            $model->name = $results->name;
            $model->author = $results->author;
            $model->isbn = $results->isbn;
            $model->price = $results->price;
            $model->remarks = $results->remarks;
        }

        if ($model->load(Yii::$app->request->post()) && $model->create($id)) {
            $this->redirect('/basic/web/index.php?r=book/success');
        }
        return $this->render('create', [
            'model' => $model,
            'id' => $id
        ]);
    }

    public function actionSuccess()
    {
        return $this->render('success');
    }

    public function actionDelete()
    {
        $request = YII::$app->request;
        $id = $request->get('id');
        $results = Book::find()->where(['id' => $id])->one();
        $results->delete();
        $this->redirect('/basic/web/index.php?r=book/success');
    }
}
