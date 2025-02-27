<?hh
/* Prototype  : bool ctype_lower(mixed $c)
 * Description: Checks for lowercase character(s)
 * Source code: ext/ctype/ctype.c
 */

/*
 * Pass octal and hexadecimal values to ctype_lower() to test behaviour
 */
<<__EntryPoint>> function main(): void {
echo "*** Testing ctype_lower() : usage variations ***\n";

$orig = setlocale(LC_CTYPE, "C");

$octal_values = vec[0141, 0142, 0143, 0144];
$hex_values = vec  [0x61, 0x62, 0x63, 0x64];

echo "\n-- Octal Values --\n";
$iterator = 1;
foreach($octal_values as $c) {
    echo "-- Iteration $iterator --\n";
    var_dump(ctype_lower($c));
    $iterator++;
}

echo "\n-- Hexadecimal Values --\n";
$iterator = 1;
foreach($hex_values as $c) {
    echo "-- Iteration $iterator --\n";
    var_dump(ctype_lower($c));
    $iterator++;
}

setlocale(LC_CTYPE, $orig);
echo "===DONE===\n";
}
