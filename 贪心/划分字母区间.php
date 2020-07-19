<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/7/19
 * Time: 下午9:39
 */

//字符串 S 由小写字母组成。我们要把这个字符串划分为尽可能多的片段，同一个字母只会出现在其中的一个片段。返回一个表示每个字符串片段的长度的列表。
//
// 
//
//示例 1：
//
//输入：S = "ababcbacadefegdehijhklij"
//输出：[9,7,8]
//解释：
//划分结果为 "ababcbaca", "defegde", "hijhklij"。
//每个字母最多出现在一个片段中。
//像 "ababcbacadefegde", "hijhklij" 的划分是错误的，因为划分的片段数较少。
//
//来源：力扣（LeetCode）
//链接：https://leetcode-cn.com/problems/partition-labels
//著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
//https://leetcode-cn.com/problems/partition-labels/description/

class Solution {

    /**
     * @param String $S
     * @return Integer[]
     */
    function partitionLabels($s) {

        $right = -1;
        $cnt = strlen($s);
        $res = [];
        for ($i=0;$i<$cnt;$i++){
            $index = strripos($s,$s[$i]);
            if($i<=$right) continue;
            if($index!==false && $index!=$i){
                $str_new = substr($s,$i,$index+1-$i);
                $right = $index;
                $left = $i;
                for ($j=0;$j<strlen($str_new);$j++){
                    $index = strripos($s,$str_new[$j]);
                    if($index>$right){
                        //需要扩充
                        $str_new = substr($s,$left,$index+1-$i);
                    }
                    $right = max($right,$index);
                }
                $s_len =strlen($str_new);
                $res[]=$s_len;
            }else{
                $res[] = 1;
            }
        }
        return $res;
    }
}


$nums='ababcbacadefegdehijhklij';
$s = new Solution();
$data = $s->partitionLabels($nums);
var_dump($data);
