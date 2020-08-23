<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/7/27
 * Time: 下午4:42
 */

//给定一个按照升序排列的整数数组 nums，和一个目标值 target。找出给定目标值在数组中的开始位置和结束位置。
//
//你的算法时间复杂度必须是 O(log n) 级别。
//
//如果数组中不存在目标值，返回 [-1, -1]。
//
//示例 1:
//
//输入: nums = [5,7,7,8,8,10], target = 8
//输出: [3,4]
//示例 2:
//
//输入: nums = [5,7,7,8,8,10], target = 6
//输出: [-1,-1]
//
//https://leetcode-cn.com/problems/find-first-and-last-position-of-element-in-sorted-array/

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target) {
        $cnt = count($nums);
        if($cnt==0)  return [-1,-1];
        if($cnt==1)  return $target==$nums[0]?[0,0]:[-1,-1];
        //up_bound
        $left = 0;
        $right = $cnt-1;
        while ($left<$right){
            $middle = floor(($left+$right)/2);
            if($nums[$middle] <= $target){
                $left = $middle +1;
            }else{
                $right = $middle;
            }
        }
        if($nums[$left]==$target){
            $up_bound  = $left;
        }else{
            $up_bound  = $left-1;
        }
        //low_bound
        $left = 0;
        $right = $up_bound; //修改边界，减少计算
        while ($left<$right){
            $middle = floor(($left+$right)/2);
            if($nums[$middle] < $target){
                $left = $middle +1;
            }else{
                $right = $middle;
            }
        }
        $low_bound = $left;
        if($nums[$left]!=$target){
            return [-1,-1];
        }
        return  [$low_bound,$up_bound];
    }
}


$nums =[5,7,7,8,8,10];
$s = new Solution();
$data = $s->searchRange($nums,8);
var_dump($data);