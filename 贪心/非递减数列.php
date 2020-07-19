<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/7/19
 * Time: 下午2:34
 */
//665. 非递减数列
//给你一个长度为 n 的整数数组，请你判断在 最多 改变 1 个元素的情况下，该数组能否变成一个非递减数列。
//
//我们是这样定义一个非递减数列的： 对于数组中所有的 i (0 <= i <= n-2)，总满足 nums[i] <= nums[i + 1]。
//
//
//
//示例 1:
//
//输入: nums = [4,2,3]
//输出: true
//解释: 你可以通过把第一个4变成1来使得它成为一个非递减数列。
//示例 2:
//
//输入: nums = [4,2,1]
//输出: false
//解释: 你不能在只改变一个元素的情况下将其变为非递减数列。
//
//https://leetcode-cn.com/problems/non-decreasing-array/description/


//在出现 nums[i] < nums[i - 1] 时，需要考虑的是应该修改数组的哪个数，使得本次修改能使 i 之前的数组成为非递减数组，并且 不影响后续的操作 。优先考虑令 nums[i - 1] = nums[i]，因为如果修改 nums[i] = nums[i - 1] 的话，那么 nums[i] 这个数会变大，就有可能比 nums[i + 1] 大，从而影响了后续操作。还有一个比较特别的情况就是 nums[i] < nums[i - 2]，修改 nums[i - 1] = nums[i] 不能使数组成为非递减数组，只能修改 nums[i] = nums[i - 1]。

class Solution {
    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function checkPossibility($nums) {
        $cnt = count($nums);
        if($cnt==0) return 1;
        if($cnt==1) return 1;
        $pre = $nums[0];
        $del = 0;
        for ($i=1;$i<$cnt;$i++){
            if($nums[$i]<$pre) {
                var_dump('----');
                $del++;
                if( ($i-2)>=0 && $nums[$i-2] > $nums[$i]){
                    $nums[$i]= $nums[$i-1];
                }else{
                    $nums[$i-1] = $nums[$i];
                }
                if($nums[$i-2]>$nums[$i-1]) return false;
            }
            $pre = $nums[$i];
            if($del==2) return false;
        }
        return true;

    }
}

$arg1 = [3,4,2,3];
$arg1 = [2,3,3,2,4];
$arg2 = 'ahbgdc';

$s = new Solution();
$data = $s->checkPossibility($arg1,$arg2);
var_dump($data);