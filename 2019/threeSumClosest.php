<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosest($nums, $target) {
        sort($nums);
        $res = $nums[0] + $nums[1] + $nums[2];
        $count = count($nums);

        for ($i=0; $i < $count-2; $i++) { 
            $left = $i + 1 ;
            $right = $count - 1;

            while($left != $right) {

                $min = $nums[$i] + $nums[$left] + $nums[$left + 1];
                
                if($target < $min){
                    $one = self::negativeToPositive($res - $target);
                    $two = self::negativeToPositive($min - $target);
                    if($one > $two)
                        $res = $min;
                    break;
                }

                $max = $nums[$i] + $nums[$right] + $nums[$right - 1];
                if($target > $max){
                    $one = self::negativeToPositive($res - $target);
                    $two = self::negativeToPositive($max - $target);
                    if($one > $two)
                        $res = $max;
                    break;  
                }



                $sum = $nums[$i] + $nums[$left] + $nums[$right];

                $one = self::negativeToPositive($sum - $target);
                $two = self::negativeToPositive($res - $target);


                // 判断三数之和是否等于target
                if($sum == $target){
                    return $sum;
                }

                if($one < $two){
                    $res = $sum;
                }


                if($sum > $target){
                    $right--;
                    while($left != $right && $nums[$right] == $nums[$right+1]){
                        $right--;
                    }
                }

                else{
                    $left++;
                    while($left != $right && $nums[$left] == $nums[$left-1]){
                        $left++;
                    }
                }
            }    

            while($i<$count-2 && $nums[$i] == $nums[$i+1]){
                $i++;
            }
        }
        return $res;
    }


    function negativeToPositive($number)
    {
        if ($number< 0) {
            return $number * -1;
        }else{
            return $number;
        }
    }

}

?>



