<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/6/26
 * Time: 下午9:22
 */


//编写一个高效的算法来搜索 m x n 矩阵 matrix 中的一个目标值 target。该矩阵具有以下特性：
//
//每行的元素从左到右升序排列。
//每列的元素从上到下升序排列。
//示例:
//
//现有矩阵 matrix 如下：
//
//[
//  [1,   4,  7, 11, 15],
//  [2,   5,  8, 12, 19],
//  [3,   6,  9, 16, 22],
//  [10, 13, 14, 17, 24],
//  [18, 21, 23, 26, 30]
//]
//给定 target = 5，返回 true。
//
//给定 target = 20，返回 false。


//https://leetcode-cn.com/problems/search-a-2d-matrix-ii/



//右上角或者左下角
function searchMatrix($matrix, $target) {

//      i=0;j=count($matrix[0]);
//      15 >5 -> j--;
//      11>5  -> j--;
//      7>5   -> j--;
//      4<5   -> i++;
//      15<20 -> i++;
    $i=0;
    $j = count($matrix[0])-1;
    while ($i==count($matrix[0])-1 || $j>=0 ){
        if($matrix[$i][$j]==$target) return true;
        if($matrix[$i][$j]>$target){
            $i--;
        }elseif($matrix[$i][$j]<$target){
            $j++;
        }
    }
};