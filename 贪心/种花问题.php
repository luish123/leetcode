<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/7/18
 * Time: 下午8:31
 */

//605. 种花问题
//假设你有一个很长的花坛，一部分地块种植了花，另一部分却没有。可是，花卉不能种植在相邻的地块上，它们会争夺水源，两者都会死去。
//
//给定一个花坛（表示为一个数组包含0和1，其中0表示没种植花，1表示种植了花），和一个数 n 。能否在不打破种植规则的情况下种入 n 朵花？能则返回True，不能则返回False。
//
//示例 1:
//
//输入: flowerbed = [1,0,0,0,1], n = 1
//输出: True
//示例 2:
//
//输入: flowerbed = [1,0,0,0,1], n = 2
//输出: False
//注意:
//
//数组内已种好的花不会违反种植规则。
//输入的数组长度范围为 [1, 20000]。
//n 是非负整数，且不会超过输入数组的大小。
//https://leetcode-cn.com/problems/can-place-flowers/description/


class Solution {

    /**
     * @param Integer[] $flowerbed
     * @param Integer $n
     * @return Boolean
     */
    function canPlaceFlowers($flowerbed, $n) {
        array_push($flowerbed,0);
        array_unshift($flowerbed,0);
        $cnt = count($flowerbed);
        $gap = 0;
        $can = 0;
        for ($i=0;$i<$cnt;$i++){
            $curr = $flowerbed[$i];
            if($curr==0) $gap++;
            if($curr==1) $gap=0;
            if($gap==3) {
                $can ++;
                $i--;
                $gap = 0;
            }
            if($can==$n) return true;
        }
        return false;
    }
}
$arg1 = [1,0,0,0,0,0,1];
$arg2 = 2;

$s = new Solution();
$data = $s->canPlaceFlowers($arg1,$arg2);
var_dump($data);