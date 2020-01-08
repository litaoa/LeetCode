<?php
class Solution {

    /**
     * @param Integer $num
     * @return String
     */

    function intToRoman($num) {
        $ans = "";
        $roman = ["M", "CM", "D", "CD", "C", "XC", "L", "XL", "X", "IX", "V", "IV", "I"];  // 罗马数字
        $arab = [1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1];  // 阿拉伯数字
 		$index = 0;
        while ($num > 0) {
            $count = floor($num / $arab[$index]);
            while ($count-- > 0) {
                $ans.=$roman[$index];
            }
            $num %= $arab[$index];
            $index++;
        }
        return $ans;
    }
}


$solution = new Solution();
$nums = 3;
$arr = $solution->intToRoman($nums);
var_dump($arr);exit;
