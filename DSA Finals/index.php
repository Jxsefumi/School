<?php

$stack = [];
$input = null;
$Mütterficker = [];


print "
==================================== \n
||                                || \n
||       John Carlos Lugada       || \n
||            BSCS - ||           || \n
||                                || \n
==================================== \n
";

while (true) {
	$input = readline("What do you want to do? type an integer so insert a value, else type the operations or actions: ");
	if ($input == "+") {
        if (count($stack) > 1) {
            $b = array_pop($stack);
            $a = array_pop($stack);
            $stack[] = $a + $b;
        } else {
            print "Ukininanam \n ";
        }
	} 
    else if ($input == "-") {
        if (count($stack) > 1) {
            $b = array_pop($stack);
            $a = array_pop($stack);
            $stack[] = $a - $b;
        } else {
            print "Ukininanam \n ";
        }
    } 
    else if ($input == "*") {
        if (count($stack) > 1) {
            $b = array_pop($stack);
            $a = array_pop($stack);
            $stack[] = $a * $b;
        } else {
            print "Ukininanam \n ";
        }
    }
    else if ($input == "/") { 
        if (count($stack) > 1) {
            $b = array_pop($stack);
            if ($b == 0) {
                print("Fick dich Hündin \n");
            } else {
            $a = array_pop($stack);
            $stack[] = $a / $b;
            }
        } else {
            print "Ukininanam \n ";
        }
        // $b = array_pop($stack);
        // if ($b == 0) {
        //     print("Fick dich Hündin \n");
        //     $stack[] = $b;
        // } else {
        // $a = array_pop($stack);
        // $stack[] = $a / $b;
        // }
    }
    else if ($input == "sqrt") {
        if ($input < 0) {
            print ("Fick dich Hündin");
        } else {
		$a = array_pop($stack);
		$stack[] = sqrt($a);
        }
	} else if ($input == "pow") {
        if (count($stack) > 1) {
            $b = array_pop($stack);
            $a = array_pop($stack);
            if ($b < 1 && $a < 0 && $b > 0) {
                print("Fick dich Hündin \n");
                $stack[] = $a;
                $stack[] = $b;
            } else {
                $stack[] = pow($a, $b);
            }
        } else {
            print "Ukininanam \n ";
        }
    } else if ($input == "neg") {
        $b = array_pop($stack);
        $stack[] = -$b;
    } else if ($input == "swap") {
        if (count($stack) > 1) {
            $b = array_pop($stack);
            $a = array_pop($stack);
            $stack[] = $b;
            $stack[] = $a;
        } else {
            print "Ukininanam \n ";
        }
    } else if ($input == "sto") {
        $b = array_pop($stack);
        $x = readline("Den mund halt Scheiße?: ");
        $Mütterficker[$x] = $b;
    } else if ($input == "get") {
        $x = readline("wie heißt du?: ");
        $value = $Mütterficker[$x];
        $stack[] = $value;
    } else {
		$stack[] = (float)$input;
	}

	print("[");
	foreach ($stack as $s) {
		print($s . ", ");
	}
	print("]\n : ");
}


?>