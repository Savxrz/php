<?php

function letraMasrepetida ($cadena){


   $cont = -1;
   $resultado= "";

   foreach (count_chars($cadena,1) as $letra => $repetido ) {

      if ($repetido > $cont) {
         $cont = $repetido;


         if ($letra == 32) {
               $resultado = "espacio";
         } else {
            $resultado = chr($letra);
         }
      }

   }

   return $resultado;
}

function  palabraMasrepetida($cadena) {

   $cadena = trim($cadena);
   $resultado = "";
   $contador = -1;


   $ListaCadena = explode(" ",$cadena);


   foreach(array_count_values($ListaCadena) as $c => $v) {
      if($v > $contador) {
         $resultado = $c;
         $contador = $v;

      }

      return $resultado;
   }
}


function usuarioOk($usuario, $contraseña) :bool {
  
   $usuario = strip_tags($usuario);
   $contraseña = strip_tags($contraseña);

   $comprobar = false;

   if (strlen($usuario)>=8) {
      $comprobar = ($contraseña == strrev($usuario));
   }

   return $comprobar;
}

