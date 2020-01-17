<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Book;
Yii::$app->response->format=Response::FORMAT_JSON;

class BookController extends Controller
{
    public $enableCsrfValidation=false;
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

        // return $this->render('index', [
        //     'books' => $books,
        //     'pagination' => $pagination,
        // ]);

        return ['code' => 1, 'msg' => 'sucess', 'list' => $books, 'pageInfo' => $pagination];
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
            return ['code' => 1, 'msg' => 'success', 'data' => $model];
        }

        $updateId = Yii::$app->request->post('id');
        if ($model->load(Yii::$app->request->post(), '') && $model->create($updateId)) {
            return ['code' => 1, 'msg' => 'success'];
        }
        
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
        return ['code' => 1, 'msg' => 'success'];
    }
}
