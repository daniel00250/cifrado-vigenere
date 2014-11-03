<html>
<head>
	<title>cifrado vigenere</title>
</head>
<body>
	<form post>
<form method="post">
		<table>
		<tr>
		<td> texto en claro	</td>
		<td> <input type="text" name="texto">	</td>
		</tr>
		<tr>
		<td> clave	</td>
		<td> <input type="text" name="clave">	</td>
		</tr>
		<p><input type="submit" /></p>
	</form>

</table>
</body>
</html>


<?php
function vige($texto,$clave,$ty=true)
{   $alfabeto = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";	
	$texto=strtoupper($texto);
	$clave=strtoupper($clave);		
	$cla=$clave;		
	while(strlen($clave)<strlen($texto))$clave.=$cla;			
	$result= '';	
	for($i=0; $i< strlen($texto); $i++) 
	{	if($texto[$i]==' '){ $result.=$texto[$i]; continue; }
		$idx = strpos($alfabeto,$texto[$i]);
		if($idx < 0) $result .= $texto[$i];
		else {	
				$k = strpos($alfabeto,$clave[$i]);				
				$idx+=$ty?$k:strlen($alfabeto)-$k;
				$result.=$alfabeto[$idx % strlen($alfabeto)];
			}
		}
	return $result;
}

function cifrado($texto,$clave){ return vige($texto,$clave,true); }
function decifrado($texto,$clave){ return vige($texto,$clave,false); }

		 
$str=$_POST['texto'];
$key=$_POST['clave'];

echo '<strong>CIFRADO DE VIGENÈRE </strong><HR>';
echo 'Clave: <strong>'.$key.'</strong><hr>';
echo 'Texto en claro: <strong>'.$str.'</strong><hr>';
echo 'Texto cifrado: <strong>'.cifrado($str,$key).'</strong><HR>';

?>
