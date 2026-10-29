<?php 

class Solution {

    /**
     * @param Integer $num
     * @return String
     */
    function intToRoman($num) {
        $thousands = (int) $num / 1000;
        $roman_numeral = str_repeat('M', $thousands); 
        $num = $num % 1000;

        $roman_numeral .= $this->handle_repeats($num, 100, 'M', 'D', 'C');
        $num = $num % 100;

        $roman_numeral .= $this->handle_repeats($num, 10, 'C', 'L', 'X');
        $num = $num % 10;

        $roman_numeral .= $this->handle_repeats($num, 1, 'X', 'V', 'I');

        return $roman_numeral;
    }

    protected function handle_repeats ($num, $multiplicative, $roman_tens, $roman_five, $roman_ones) {
        $num = $num / $multiplicative;
        $num = (int) $num;

        if ($num > 5) {
            if ($num === 9) {
                $roman_numeral = $roman_ones . $roman_tens;
            } else {
                $roman_numeral = $roman_five . str_repeat($roman_ones, $num - 5);
            }
        } else if ($num < 5) {
            if ($num === 4) {
                $roman_numeral = $roman_ones . $roman_five;
            } else {
                $roman_numeral = str_repeat($roman_ones, $num);
            }
        } else if ($num === 5) {
            $roman_numeral = $roman_five;
        }

        return $roman_numeral;
    }
}
