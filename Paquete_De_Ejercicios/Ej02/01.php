<?php



function elMayor(){


    $A = random_int(0,20);
    $B = random_int(0,20);
    $C = 0;

    echo "El primer número es:" .$A;
    echo "<br>"; 
    echo "El primer número es:" .$B;
    echo "<br>"; 

    if ($A < $B) {
        $C = $B;
        echo "El numero mayor es: ".$C;
    } elseif ($A > $B){
        $C = $A;
        echo "El numero mayor es: ".$C;
    } elseif ($A == $B) {
        $C = 0;
        echo "El numero mayor es: ".$C;
    }

}

elMayor();





