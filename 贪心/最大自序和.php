<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/7/19
 * Time: 下午8:03
 */
//53. 最大子序和
//给定一个整数数组 nums ，找到一个具有最大和的连续子数组（子数组最少包含一个元素），返回其最大和。
//
//示例:
//
//输入: [-2,1,-3,4,-1,2,1,-5,4],
//输出: 6
//解释: 连续子数组 [4,-1,2,1] 的和最大，为 6。
//https://leetcode-cn.com/problems/maximum-subarray/description/



//dp[$i] = x;
//dp[i+1]=


class Solution {

    /**贪心算法：若当前之和小于0，则丢弃之前的子序列
     * @param Integer[] $nums
     * @return Integer
     */

    function maxSubArray($nums) {

        // -2 ：之前和 0：保留
        // 1 ：之前和 -2：丢弃之前序列 之后和：1
        // -3 ：之前和 1：保留  之后：-2
        // 4 ：之前和 -2：丢弃  之后：4
        
        $cnt = count($nums);
        if($cnt==0) return 0;
        if($cnt==1) return $nums[0];
        $pre = $nums[0];
        $max = $pre;
        for ($i=1;$i<$cnt;$i++){
            if($pre<0){
                //之前和小于0 丢弃
                $pre = $nums[$i];
            }else{
                $pre +=$nums[$i];
            }
            $max = max($pre,$max);
        }
        return $max;
    }

    /**
     * 动态规划
     *若之前元素大于0，则当前元素+=之前元素
     * dp[i] = max(  (dp[i-1]+a[i]), a[i])
     * User: luishuang
     * @param $nums
     */
    public function  maxSubArray2($nums)
    {
        //dp[0] = -2
        //dp[1] = max(-2,-2+1) 1
        //dp[2] = max(1,1-3) 1
        //dp[3] = max(1,1-3) 1

        $cnt = count($nums);
        if($cnt==0) return 0;
        if($cnt==1) return $nums[0];
        $dp[0] = $nums[0];
        $max =   $dp[0];
        for ($i=1;$i<$cnt;$i++){
            $dp[$i] = max( $dp[$i-1]+$nums[$i],$nums[$i]);
            $max = max($max,$dp[$i]);
        }
        return $max;

    }
}

$nums=[-2,1,-3,4,-1,2,1,-5,4];
$s = new Solution();
$data = $s->maxSubArray($nums);
var_dump($data);
