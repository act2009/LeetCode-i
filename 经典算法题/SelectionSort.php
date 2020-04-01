<?php
/**
 * 选择排序
 * 数据结构----------------数组
 * 最差时间复杂度-----------O(n^2)
 * 最优时间复杂度-----------O(n^2)
 * 平均时间复杂度-----------O(n^2)
 * 空间复杂度--------------O(1)
 * 稳定性-----------------不稳定
 *
原理：每一次从待排序的数据元素中选出最小（或最大）的一个元素，存放在序列的起始位置，直到全部待排序的数据元素排完.。
————————————————
版权声明：本文为CSDN博主「lxxxxxl_」的原创文章，遵循 CC 4.0 BY-SA 版权协议，转载请附上原文出处链接及本声明。
原文链接：https://blog.csdn.net/qq_36045946/article/details/80751831

 */
$arr = [1, 3, 34, 2, 32, 2, 78, -43, 53, -35, 0];
class solution{

    function SelectionSort($arr){
        $length=count($arr);
        for($i=0;$i<$length-1;$i++){
            $min=$i;
            for($j=$i+1;$j<$length;$j++){
                if($arr[$j]<$arr[$min]){
                    $min=$j;
                }
            }
            //如果找到最小值，放到已排列序列末尾
            if($min!=$i){
                $temp=$arr[$min];
                $arr[$min]=$arr[$i];
                $arr[$i]=$temp;

            }
        }
        return $arr;
    }
}
 