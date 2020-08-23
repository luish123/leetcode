<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/7/23
 * Time: 下午8:36
 */


//实现 int sqrt(int x) 函数。
////
////计算并返回 x 的平方根，其中 x 是非负整数。
////
////由于返回类型是整数，结果只保留整数的部分，小数部分将被舍去。
////
////示例 1:
////
////输入: 4
////输出: 2
////示例 2:
////
////输入: 8
////输出: 2
////说明: 8 的平方根是 2.82842...,
////     由于返回类型是整数，小数部分将被舍去。
////
////
////https://leetcode-cn.com/problems/sqrtx/description/
///
class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function mySqrt($x) {
        if($x<=3) return 1;
        if($x==4) return 2;
        $num = ceil($x/2); //x2>2x x>2

        $left = 0;
        $right = $num;
        while ($left<$right){
            $middle = floor(($left+$right)/2);
            $test = $middle*$middle;
            if($test==$x) return $middle;
            if($test<$x){
                $left = $middle+1;
            }else{
                $right = $middle;
            }
        }
        return $left -1;
    }
}

$s = new Solution();
$res = $s->mySqrt(9);
var_dump($res);