<?php
//
//假设你是一位很棒的家长，想要给你的孩子们一些小饼干。但是，每个孩子最多只能给一块饼干。对每个孩子 i ，都有一个胃口值 gi ，这是能让孩子们满足胃口的饼干的最小尺寸；并且每块饼干 j ，都有一个尺寸 sj 。如果 sj >= gi ，我们可以将这个饼干 j 分配给孩子 i ，这个孩子会得到满足。你的目标是尽可能满足越多数量的孩子，并输出这个最大数值。
//
//注意：
//
//你可以假设胃口值为正。
//一个小朋友最多只能拥有一块饼干。
//
//示例 1:
//
//输入: [1,2,3], [1,1]
//
//输出: 1
//
//解释:
//你有三个孩子和两块小饼干，3个孩子的胃口值分别是：1,2,3。
//虽然你有两块小饼干，由于他们的尺寸都是1，你只能让胃口值是1的孩子满足。
//所以你应该输出1。
//
//https://leetcode-cn.com/problems/assign-cookies/description/

class Solution1 {

    /**
     * @param Integer[] $g 孩子的胃口值
     * @param Integer[] $s  饼干大小
     * @return Integer
     */
    function findContentChildren($g, $s) {
        sort($g);
        sort($s);
        $gs = count($g);
        $ss = count($s);

        $i = $j = 0;
        $fill = 0;
        while ($i<$gs && $j<$ss){
            if($s[$j]>$g[$i]){
                //饼干大小>孩子胃口值
                $fill++;
                $i++;
                $j++;
            }else{
                //不满足
                $j++;

            }
        }
        return $fill;
    }
}

class Solution {

    /**
     * @param Integer[] $g 孩子的胃口值
     * @param Integer[] $s  饼干大小
     * @return Integer
     */
    function findContentChildren($g, $s) {
        $fill = 0;
        sort($g);
        sort($s);
        $gs = count($g);
        $g_curr = 0;
        foreach ($s as $si){
            for ($i=$g_curr;$i<$gs;$i++){
                if($si>=$g[$i]){
                    $fill++;
                    $g_curr = $i+1;
                    break;
                }
            }
        }
        return $fill;
    }
}
$e = new Solution1();
$g = [1,2,3];
$s = [1,1];
$data = $e->findContentChildren($g,$s);
var_dump($data);
