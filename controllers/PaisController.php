<?php
namespace app\controllers;
use Yii;
use app\models\Pais;
use yii\data\Pagination;


class PaisController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = Pais::find();

        $paginacao = new Pagination([
            "defaultPageSize" => 5,
            "totalCount" => $query->count()
        ]);

        $paises = $query->orderBy("nome")
            ->offset($paginacao->offset)
            ->limit($paginacao->limit)
            ->all();

        return $this->render('index', [
            "paises" => $paises,
            "paginacao" => $paginacao
        ]);
    }
}
