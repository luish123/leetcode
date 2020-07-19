<?php
/**
 * Created by PhpStorm.
 * User: luishuang
 * Date: 2020/6/26
 * Time: 下午9:22
 */


//给定一个字符串和一个字符串字典，找到字典里面最长的字符串，该字符串可以通过删除给定字符串的某些字符来得到。如果答案不止一个，返回长度最长且字典顺序最小的字符串。如果答案不存在，则返回空字符串。
//
//示例 1:
//
//输入:
//s = "abpcplea", d = ["ale","apple","monkey","plea"]
//
//输出:
//"apple"
//示例 2:
//
//输入:
//s = "abpcplea", d = ["a","b","c"]
//
//输出:
//"a"



//https://leetcode-cn.com/problems/longest-word-in-dictionary-through-deleting/description/


class Solution {

    function findLongestWord($s, $d) {
        if(!$s) return false;
        $max_str = '';
        foreach($d as $item){
            $match = $this->hasWord($s,$item);
            if($match){
                $current_match_len = strlen($item);
                $max_len = strlen($max_str);
                if($max_len<$current_match_len || ($current_match_len==$max_len) && strcmp($item,$max_str) < 0 ){
                    $max_str = $item;
                }
            }
        }
        return $max_str;
    }

    public function hasWord($s,$d){
        $d_len = strlen($d);
        $s_len = strlen($s);
        $x = 0;
//        $cnt = 0;
        for ($i=0;$i<$d_len;$i++){
            //d i
            //s j
            if($x==$s_len) return false; //防止cnt对不上。
            for ($j=$x;$j<$s_len;$j++){
                if($d[$i]===$s[$j]) {
                    //d字符串中  第i个字符满足
                    //从s第j+1算i+1个字符
//                    $cnt ++;
                    $x = $j+1;
                    break;
                }
                if($j==($s_len-1)){
                    //d 字符串 第i个字符满足
                    return false;
                }
            }
        }
//        return $cnt==$d_len;
        return true;
    }
}


$soul = new Solution();
$s = "aewfafwafjlwajflwajflwafj"; $d = ["apple","ewaf","awefawfwaf","awef","awefe","ewafeffewafewf"];
//$s = "okbmfyugqqongobwofraotanviqjraaktmmwyxzdnnwwaqsnvfxwngglybtiqwblprgvbgmolotnppzbovnstxmcmocixresdpojmntcdkyjzgbhhigkiyatrgzayivjyqiopvvdftkbsgwgnidsecvydvltaxxywydawrsseyolixznuyhjolngdsmjhepregixtklanjjggzssrbtmhhpamcfeghgssmrjrpelabojfhkdfvscjwhqxubwrhryqmtkiksljezeembngdjyhgmdzahxvvpkqwvhkqlensuxbrcdctqojqnlogjbpovdsbvurwcoehtmtkwxswrwhszuyesdqspnwqxlmjxrbdqbnbbyxhhlabxrdjxtjgpugojsexmrhrfzryapdzglalqzuzfpxeaemjkyfhpbnmdxjtxnxyjecfsapcjyglmtivnsfalpxzdkylgcixjljaqjwminyaodeekpzzpchhceguzayeul"; $d = ["xcjigjydkponyjablqgulfhcyzbtbdocvsxzwzdabvbnzxzxcawydbbsuexdxpvmtjcxdgdcdxgccjfciphjmubucghqfqoqqugnvbblziedkifhyrkzugorbalkggrhingdsnfnvbofjunyuzjfmnpqloxtshyxyaavbskikosutlqeljnycostvxqviixgspazzitxhiujcqnatfwechwzuoxxwibszywniscleusciwjvcfcocneuaizzgluudughrvgozsgvrpcwsjzivzpbzfjqshrdckfcxjsgwcrhcmntpkezibuegxduskenhrhuayysefshuwokduoaibwpcrssypqflhqeipzsyiycrbtblfnwozngtcddepfxyhvfjcoxytxqkfgzduzzjjqdauxxgjhxqaewlihotqibnskdluickwaakwvopgatumfndzcjieoncdwmhfgpvtegeawueivtnyumvwxuzfcaxeuremvv"];
//$s = "aewfafwafjlwajflwajflwafj"; $d = ["aewfafwam"];
$data = $soul->findLongestWord($s, $d) ;
var_dump($data);