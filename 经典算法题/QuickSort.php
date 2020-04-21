<?php
/**
 * 快速排序
通过设置一个初始中间值，来将需要排序的数组分成3部分，小于中间值的左边，中间值，大于中间值的右边，继续递归用相同的方式来排序左边和右边，最后合并数组

 */

$arr = [2,13,42,34,56,23,67,365,87665,54,68,3];
class Solution
{
    function QuickSort($arr){
        //判断是否需要运行
        if(count($arr)<=1){
            return $arr;
        }
        //基准元素
        $middle=$arr[0];
        $left=$right=array();
        for($i=1;$i<count($arr);$i++){
            if($middle>$arr[$i]){
                $left[]=$arr[$i];
            }else{
                $right[]=$arr[$i];
            }
        }
        //对数组进行递归处理
        $left=QuickSort($left);
        $right=QuickSort($right);
        return array_merge($left,array($middle),$right);
    }


}