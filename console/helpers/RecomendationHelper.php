<?php
namespace console\helpers;

class RecomendationHelper
{
    /**
     * @param array $setA
     * @param array $setB
     * @return float|int
     */
    public static function getSimilarityIndex(array $setA, array $setB)
    {
        $arr_intersection = array_intersect( $setA, $setB );
        $arr_union = array_unique(array_merge( $setA, $setB ));
        $coefficient = count( $arr_intersection ) / count( $arr_union );

        return $coefficient;
    }

    /**
     * @param $arr
     * @return array
     */
    public static function prepareUserFriendsArray($arr)
    {
        $result = [];
        foreach ($arr as $item) {
            foreach ($item['usersFriends'] as $sub_item) {
                $result[$sub_item['user_id']][] = $sub_item['friend_id'];
            }
        }

        return $result;
    }
}