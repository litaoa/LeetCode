<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function myAtoi($param) {

         if($param==null || strlen($param)==0){
            return 0;
         }
            
        //1.跳过空字符
        $i = 0;
        while($i<strlen($param) && $param[$i]==' '){
            $i++;
        }

         //此时,i指向第一个不为空的字符 或者 i越界
        if($i==strlen($param)){
            return 0;
        }
        //2.判断数字的符号
        $flag=1;


        if(!is_numeric($param[$i]) && !is_numeric($param[$i+1])){
            return 0;
        } 



        if($param[$i]=='+'){
            $flag = 1;
            $i++;
        } 

        if($param[$i]=='+'){
            $flag = 1;
            $i++;
        }          

        if($param[$i]>='0' && $param[$i]<='9'){
            $flag = 1;
        }
        if($param[$i]=='-'){
            $flag = -1;
            $i++;
        }


        

         //3.找出数字部分
         $res = 0;
        for($i; $i<strlen($param); $i++){

            if($param[$i]<'0' || $param[$i]>'9'){
                break;
            }
            $res = $res*10 + $param[$i]-'0';

            //溢出判断
            if($flag>0 &&  $res > 2147483647){
                return 2147483647;
            }

            if($flag<0  && -$res < -2147483648){
                return -2147483648;
            }
        }

        return $res * $flag;    
    }


}
?>



