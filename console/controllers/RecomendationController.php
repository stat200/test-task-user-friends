<?php
namespace console\controllers;

use console\services\RecomendationService;
use yii\console\Controller;
use yii\base\Module;
use console\models\User;


class RecomendationController extends Controller
{
    private $service;

    public function __construct(string $id, Module $module, RecomendationService $service, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }

    public function actionIndex()
    {
        $usersFriendsList = User::find()
            ->joinWith([
                'usersFriends' => function ($query) {
                    $query->andWhere(['<>', 'user_id', 'friend_id']);
                },
            ])
            ->all();

        $recomendations = $this->service->getRecomendationFriendList($usersFriendsList);

        foreach ($recomendations as $key => $item) {
            foreach ($item as $sub_key => $sub_item) {
                $this->stdout('user_id '.$key.' recomend_id '.$sub_key.' weight '.$sub_item."\n");
            }
        }
    }
}