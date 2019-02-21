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

}