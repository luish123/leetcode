<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/6/25
 * Time: 上午12:24
 */


//给定一个非负整数 c ，你要判断是否存在两个整数 a 和 b，使得 a2 + b2 = c。
//
//示例1:
//
//输入: 5
//输出: True
//解释: 1 * 1 + 2 * 2 = 5


//https://leetcode-cn.com/problems/sum-of-square-numbers/description/

//O(sqrt(target))
function judgeSquareSum($c) {

    $left = 0;
    $right = floor(sqrt($c));  //缩小范围
    while ($left<=$right){
        $powSum = $left*$left + $right*$right;
        if($powSum==$c) return true;
        if($powSum>$c){
            $right--;
        }
        if($powSum<$c){
           $left++;
        }
    }
    return false;
}
$data = judgeSquareSum(21);
var_dump($data);