<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/7/27
 * Time: 下午2:53
 */


//假设按照升序排序的数组在预先未知的某个点上进行了旋转。
//
//( 例如，数组 [0,1,2,4,5,6,7] 可能变为 [4,5,6,7,0,1,2] )。
//
//请找出其中最小的元素。
//
//你可以假设数组中不存在重复元素。
//
//示例 1:
//
//输入: [3,4,5,1,2]
//输出: 1
//示例 2:
//
//输入: [4,5,6,7,0,1,2]
//输出: 0
//
//https://leetcode-cn.com/problems/find-minimum-in-rotated-sorted-array/description/

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMin($nums) {
        $cnt = count($nums);
        if($cnt==0)  return 0;
        if($cnt==1)  return $nums[0];
        $left = 0;
        $right = $cnt-1;
        while ($left<$right){
            $middle = floor(($left+$right)/2);
            if($nums[$middle] > $nums[$right]){
                $left = $middle +1;
            }else{
                $right = $middle;
            }
        }
        return $nums[$left];
    }
}

$nums = [2,3,4,5,1];
$s = new Solution();
$data = $s->findMin($nums);
var_dump($data);