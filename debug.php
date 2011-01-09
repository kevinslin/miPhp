<!-- This is a coment inserted locally -->

<?php
define ('TESTING', 0);
define ('LOGGING', 1);


	
/*============= Public Functions ==========================*/

//Pretty vardump
//$object -> the object being logged
//Optional:
//string $description	-> describe the object
function miLog($object, $description = 0){	
	if (LOGGING){
		if ($description){
			echo $description;
		}
		echo "<br>";
		echo '<pre>'.print_r($object, true).'</pre>';
		echo "<br>";
	}
}

//string $text
function dEcho($text){
	if (LOGGING){
		echo $text;
	}
}

//Line divider
function dBR(){
	if (LOGGING){
		echo "<br>"."============================="."<br>";
	}
}



/*============Private Functions===========================*/
function getVarName(&$var)
{
	$ret = '';
	$tmp = $var;
	$var = md5(uniqid(rand(), TRUE));

	$key = array_keys($GLOBALS);
	foreach ( $key as $k )
	if ( $GLOBALS[$k] === $var )
	{
	$ret = $k;
	break;
	}
	
	$var = $tmp;
	return $ret;
}
 
function varName (&$iVar, &$aDefinedVars)
    {
    foreach ($aDefinedVars as $k=>$v)
        $aDefinedVars_0[$k] = $v;
 
    $iVarSave = $iVar;
    $iVar     =!$iVar;
 
    $aDiffKeys = array_keys (array_diff_assoc ($aDefinedVars_0, $aDefinedVars));
    $iVar      = $iVarSave;
 
    return $aDiffKeys[0];
    }



/*=============Testing==========================*/
if (TESTING){
	define ('LOGGING', 1);
	
	$flag = 5;

	miLog($flag, "The flag");

}



?>
