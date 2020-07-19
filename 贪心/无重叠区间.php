<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/7/8
 * Time: 下午9:21
 */

//435. 无重叠区间
//给定一个区间的集合，找到需要移除区间的最小数量，使剩余区间互不重叠。
//
//注意:
//
//可以认为区间的终点总是大于它的起点。
//区间 [1,2] 和 [2,3] 的边界相互“接触”，但没有相互重叠。
//示例 1:
//
//输入: [ [1,2], [2,3], [3,4], [1,3] ]
//
//输出: 1
//
//解释: 移除 [1,3] 后，剩下的区间没有重叠。
//示例 2:
//
//输入: [ [1,2], [1,2], [1,2] ]
//
//输出: 2
//
//解释: 你需要移除两个 [1,2] 来使剩下的区间没有重叠。
//示例 3:
//
//输入: [ [1,2], [2,3] ]
//
//输出: 0
//https://leetcode-cn.com/problems/non-overlapping-intervals/description/


// 贪心算法，按照起点排序：选择结尾最短的，后面才可能连接更多的区间（如果两个区间有重叠，应该保留结尾小的） 把问题转化为最多能保留多少个区间，使他们互不重复，则按照终点排序，每个区间的结尾很重要，结尾越小，则后面越有可能容纳更多的区间。




class Solution{

    /**
     * @param Integer[][] $intervals
     * @return Integer
     */
    function eraseOverlapIntervals($intervals) {
        $intervals = $this->sort($intervals);
        if(count($intervals)<=1) return 0;
        $pre = $intervals[0];
        $ac = 1;//不重合的个数
        for ($i=1;$i<count($intervals);$i++){
            if($this->check($pre,$intervals[$i])){
                $ac ++;
                $pre = $intervals[$i];
            }else{
                $p_right = $pre[1];
                $i_right = $intervals[$i][1];
                if($i_right<$p_right) $pre = $intervals[$i];//如果两个区间有重叠，应该保留终点小的
            }
        }
        return count($intervals)-$ac;

    }

    public function check($left,$right)
    {
        return ($left[1]>$right[0])? false:true;
    }

    function sort($intervals){
//        [ [1,2], [2,3], [3,4], [1,3] ]
        $tmp = $res = [];
        foreach ($intervals as $v){
            $end = $v[1];
            $tmp[$end][]=$v;
        }

        ksort($tmp);
        foreach ($tmp as $v){
            foreach ($v as $item){
                $res[]=$item;
            }
        }
        return $res;
    }
}



//方法二：从起始点的动态规划 【通过】
//算法
//如果我们按照起始点对区间进行排序，可以很大程度上简化问题。一旦完成之后，我们就可以使用一个 dpdp 数组，其中 dp[i]dp[i] 存储着只考虑到 第i个第i个 区间范围内（包括其本身），最大可能的区间数。现在，当计算 dp[i+1]dp[i+1] 时，我们不能只考虑 dp[i]dp[i] 的值，因为前面的 ii 个区间都可能与 第 i+1i+1 个区间发生重叠。因此，我们需要考虑能够使得 j \leq ij≤i 且与第 i+1i+1 个区间不发生重叠的所有 dp[j]dp[j] 中的最大值。状态转移方程如下：
//
//dp[i+1]= max(dp[j]) + 1,
//
//其中对于所有 j \leq ij≤i ，第 i 个和第 j 个区间不发生重叠。
//
//最后，为了计算最终列表中区间的最大区间数量，我们需要找到 dpdp 数组中的最大值。最终的结果为区间的总数减去刚刚的结果 (intervals.length-ansintervals.length−ans)。
//






class Solution2{

    /**
     * @param Integer[][] $intervals
     * @return Integer
     */
    function eraseOverlapIntervals($intervals) {
        $intervals = $this->sort($intervals);
        if(count($intervals)<=1) return 0;
        $dp[0] = 1; //第i个元素的连续范围
        $ans  =  0;
        for ($i=1;$i<count($intervals);$i++){
            $max = 0;
            for ($j=0;$j<$i;$j++){
                if(!$this->isOverlapping($intervals[$j],$intervals[$i])){
                    //i和j不越界的时候
                    $max = max($dp[$j],$max);
                }
            }
            $dp[$i] = $max +1;
            $ans = max($ans,$max +1);
        }
        return count($intervals)-$ans;

    }

    /**
     * User: luishuang
     * @param $left
     * @param $right
     * @return bool 1 越界
     */
    public function isOverlapping($left,$right)
    {
        return ($left[1]>$right[0]);
    }

    function sort($intervals){
//        [ [1,2], [2,3], [3,4], [1,3] ]
        $tmp = $res = [];
        foreach ($intervals as $v){
            $start = $v[0];
            $tmp[$start][]=$v;
        }
        ksort($tmp);
        foreach ($tmp as $v){
            foreach ($v as $item){
                $res[]=$item;
            }
        }
        return $res;
    }
}
$e = new Solution2();
$intervals =  [[1,2],[2,3]];
$data = $e->eraseOverlapIntervals($intervals);
var_dump($data);