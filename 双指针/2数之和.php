<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/6/25
 * Time: 上午12:24
 */


//167. Two Sum II - Input array is sorted (Easy)
//
//Leetcode / 力扣
//
//Input: numbers={2, 7, 11, 15}, target=9
//Output: index1=1, index2=2
//题目描述：在有序数组中找出两个数，使它们的和为 target。


//https://leetcode-cn.com/problems/two-sum-ii-input-array-is-sorted/description/?utm_source=LCUS&utm_medium=ip_redirect_q_uns&utm_campaign=transfer2china

//O(n)
function twoSum($numbers, $target) {
    $cnt = count($numbers);
    $right =$cnt-1;
    $i = 0;
    if($cnt==1) return false;
    while ($i<$right){
        if($numbers[$i]+$numbers[$right]==$target) return[$i+1,$right+1];
        if($numbers[$i]+$numbers[$right]>$target){
            $right--;
        }
        if($numbers[$i]+$numbers[$right]<$target){
            $i++;
        }
    }
    return false;
}

//[1,8,9,10,15];

//假设此时 A[0] + A[7] 小于 target。这时候，我们应该去找和更大的两个数。由于 A[7] 已经是最大的数了，其他的数跟 A[0] 相加，和只会更小。也就是说 A[0] + A[6] 、A[0] + A[5]、……、A[0] + A[1] 也都小于 target，这些都是不合要求的解，可以一次排除。这相当于 i=0i=0 的情况全部被排除。对应用双指针解法的代码，就是 i++，

//19
//16 <
//8+15 >
//8+10<
//9+10
$data = twoSum([2,5, 7, 11, 15],10);
var_dump($data);