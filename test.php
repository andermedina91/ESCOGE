<?php

function valida_cedula($ced)
{
	$c = str_replace('-', '', $ced);
    $cedula = substr($c, 0, -1);
    $verificador = substr($c, -1);
	$suma = 0;
	$cedulaValida = 0;
	
	//Si no cumple el tamaño FALSE
    if(strlen($ced) < 11)
        return false;

    for($i = 0; $i < strlen($cedula); $i++)
    {
        $mod = (($i % 2) == 0) ? 1 : 2;
	    $res = substr($cedula, $i, 1) * $mod;

        if($res > 9)
        { 
			$res = strval($res);  
			$uno = substr($res, 0, 1);
			$dos = substr($res, 1, 1);
			$res = (int) $uno + (int)$dos; 
		}

		$suma += (int) $res; 
	}

    $el_numero = (10 - ($suma % 10)) % 10;

	if ($el_numero == $verificador && substr($cedula, 0, 3) != "000") {  
		$cedulaValida = TRUE;
	}else{
		$cedulaValida = FALSE;
	}

	return $cedulaValida;
}

if(valida_cedula('049-8627590-8'))
    echo 'la cedula es valida!';
else
    echo 'la cedula es invalida';