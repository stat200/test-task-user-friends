<?php
namespace console\services;

use console\helpers\RecomendationHelper;

class RecomendationService
{
    /**
     * @param array $usersFriendsList
     * @return array
     */
    public function getRecomendationFriendList(array $usersFriendsList): array
    {
        $usersFriendsList = RecomendationHelper::prepareUserFriendsArray($usersFriendsList);
        $recomendations = [];
        foreach ($usersFriendsList as $key => $item) {
            foreach ($usersFriendsList as $sub_key => $sub_item) {
                if (!isset($recomendations[$key][$sub_key]) && $key != $sub_key && ($weight = RecomendationHelper::getSimilarityIndex($item, $sub_item))) {
                    $recomendations[$key][$sub_key] = $weight;
                    $recomendations[$sub_key][$key] = $weight;
                }
            }
        }
        return $recomendations;
    }
}