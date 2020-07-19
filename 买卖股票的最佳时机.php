<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/7/17
 * Time: 下午4:15
 */


//给定一个数组，它的第 i 个元素是一支给定股票第 i 天的价格。
//
//如果你最多只允许完成一笔交易（即买入和卖出一支股票一次），设计一个算法来计算你所能获取的最大利润。
//
//注意：你不能在买入股票前卖出股票。


//https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock/


class Solution
{

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices)
    {
        $cnt = count($prices);
        if ($cnt == 1) return 0;
        if ($cnt == 0) return 0;
        $max = 0;
        $min  =$prices[0];
        for ($i = 1; $i < $cnt; $i++) {
            $min = min($min, $prices[$i]);
            $max = max($max,$prices[$i]-$min);
        }
        return $max;
    }
}


$e = new Solution();
$arg = [7, 1, 5, 3, 6, 0,1];
$data = $e->maxProfit($arg);
