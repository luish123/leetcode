<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/7/25
 * Time: 上午9:20
 */

//540. 有序数组中的单一元素
//给定一个只包含整数的有序数组，每个元素都会出现两次，唯有一个数只会出现一次，找出这个数。
//
//示例 1:
//
//输入: [1,1,2,3,3,4,4,8,8]
//输出: 2
//示例 2:
//
//输入: [3,3,7,7,10,11,11]
//输出: 10
//
//https://leetcode-cn.com/problems/single-element-in-a-sorted-array/description/



class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNonDuplicate($nums) {
        $cnt = count($nums);
        if($cnt==1) return $nums[0];
        $left = 0;
        $right = $cnt -1;
        while ($left<$right){
            $middle = floor(($left+$right)/2);
            if(($middle)%2 ==0) $middle --;
            if($nums[$middle]==$nums[$middle+1]){
                $right = $middle-1;
            }else if($nums[$middle]==$nums[$middle-1]){
                $left = $middle+1;
            }else{
                return $middle;
            }
        }
        return $nums[$left];
    }
}



$s = new Solution();
$nums = [3,3,7,7,10,11,11];
$res = $s->singleNonDuplicate($nums);
var_dump($res);