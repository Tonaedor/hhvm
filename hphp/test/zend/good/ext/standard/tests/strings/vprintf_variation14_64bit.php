<?hh
/* Prototype  : string vprintf(string format, array args)
 * Description: Output a formatted string 
 * Source code: ext/standard/formatted_print.c
*/

/*
 * Test vprintf() when different hexa formats and non-hexa values are passed to
 * the '$format' and '$args' arguments of the function
*/
<<__EntryPoint>> function main(): void {
echo "*** Testing vprintf() : hexa formats and non-hexa values ***\n";

// defining array of different hexa formats
$formats = 
  '%x %+x %-x 
   %lx %Lx %4x %-4x
   %10.4x %-10.4x %.4x 
   %\'#2x %\'2x %\'$2x %\'_2x
   %3$x %4$x %1$x %2$x';

// Arrays of non hexa values for the format defined in $format.
// Each sub array contains non hexa values which correspond to each format in $format
$args_array = vec[

  // array of float values
  vec[2.2, .2, 10.2,
        123456.234, 123456.234, -1234.6789, +1234.6789,
        2e10, +2e12, 22e+12,
        12345.780, 12.000000011111, -12.00000111111, -123456.234,
        3.33, +4.44, 1.11,-2.22 ],

  // array of int values
  vec[2, -2, +2,
        123456, 123456234, -12346789, +12346789,
        123200, +20000, 22212,
        12345780, 1211111, -12111111, -12345634,
        3, +4, 1,-2 ],

  // array of strings
  vec[" ", ' ', 'hello',
        '123hello', "123hello", '-123hello', '+123hello',
        "\12345678hello", "-\12345678hello", 'h123456ello',
        "1234hello", "hello\0world", "NULL", "true",
        "3", "4", '1', '2'],

  // different arrays
  vec[ vec[0], vec[1, 2], vec[-1, -1],
         vec["123"], vec['123'], vec['-123'], vec["-123"],
         vec[true], vec[TRUE], vec[FALSE],
         vec["123hello"], vec["1", "2"], vec['123hello'], dict[12=>"12twelve"],
         vec["3"], vec["4"], vec["1"], vec["2"] ],

  // array of boolean data
  vec[ true, TRUE, false,
         TRUE, 0, FALSE, 1,
         true, TRUE, FALSE,
         0, 1, 1, 0,
         1, TRUE, 0, FALSE],
  
];

// looping to test vprintf() with different hexa formats from the above $format array
// and with non-hexa values from the above $args_array array
 
$counter = 1;
foreach($args_array as $args) {
  echo "\n-- Iteration $counter --\n";
  $result = vprintf($formats, $args);
  echo "\n";
  var_dump($result); 
  $counter++;
}

echo "===DONE===\n";
}
