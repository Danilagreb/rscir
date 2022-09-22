<?php
function shell_Sort($my_array)
{
    $x = round(count($my_array) / 4);
    while ($x > 0) {
        for ($i = $x; $i < count($my_array); $i++) {
            $temp = $my_array[$i];
            $j = $i;
            while ($j >= $x && $my_array[$j - $x] > $temp) {
                $my_array[$j] = $my_array[$j - $x];
                $j -= $x;
            }
            $my_array[$j] = $temp;
        }
        $x = round($x / 4);
    }
    return $my_array;
}