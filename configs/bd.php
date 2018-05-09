<?php
$host='localhost';
$login='root';
$clave='12345';
$bd='turbocare';

$link=mysql_connect($host,$login,$clave);
mysql_select_db($bd);
@mysql_query("SET NAMES 'utf8'");

///////////////////////////////
//////    GENERALES    ////////
///////////////////////////////

function enviar_sql($sql){ 
	global $link;
  if (! $res=mysql_query($sql,$link))
	{
		echo error_sql($sql,mysql_error());
		exit;
  }
  return $res;
}

function error_sql($sql,$error){
    return "<html><head></head><body><ul>"
	."<li>Instruccion SQL:<br />$sql</li>"
	."<li>Error SQL: <font color='red'>$error</font></li>"
	."</ul></body></html>";
}

function sql2array($sql) {
    global $link;
    if (! $res=mysql_query($sql,$link)){
		echo error_sql($sql,mysql_error());
		exit;
    }			
	$r=array();
	while($l=mysql_fetch_assoc($res)){
		$r[]=$l;
	}
	return $r;
}

function sql2row($sql) {
    global $link;
    if (! $res=mysql_query($sql,$link)){
		echo error_sql($sql,mysql_error());
		exit;
    }			
	return mysql_fetch_assoc($res);
}

function sql2value($sql) {
    global $link;
    if (! $res=mysql_query($sql,$link)){
		echo error_sql($sql,mysql_error());
		exit;
    }			
	$p=mysql_fetch_array($res);
	return $p[0];
}


function sql2opciones($sql) {
    global $link;
    if (! $res=mysql_query($sql,$link)){
		echo error_sql($sql,mysql_error());
		exit;
    }
	$r=array();
	while($l=mysql_fetch_array($res)){
		$r[$l[0]]=$l[1];
	}
	return $r;
}

function salida($res) {
	$cant=mysql_num_fields($res);
	echo '<table border="0" cellpadding="2" cellspacing="2">';
	echo '<tr bgcolor="#fdfefc">';
	for($i=0; $i<$cant; $i++){
		echo '<th>';
		echo mysql_field_name($res,$i);
		echo '</th>';
	}
	echo '</tr>';
	$num=mysql_num_rows($res);
	for($i=0; $i<$num; $i++){
		$row=mysql_fetch_array($res);
		echo '<tr bgcolor="#dfdfdd">';
		for ($k=0;$k<$cant;$k++){
			echo '<td>';
			echo $row[$k];
			echo '</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
}