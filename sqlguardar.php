<?php
session_start();;
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
$archivos=array();

$datos = dir("./respaldobd");
while (false !== ($entry = $datos->read())) {
    
    $archi=pathinfo($entry);
    
    if ($archi['extension']=='sql'){
        $archi['a']=substr($archi['filename'],0,4);
        $archi['mes']=substr($archi['filename'],4,2);
        $archi['d']=substr($archi['filename'],6,2);
        $archi['h']=substr($archi['filename'],8,2);
        $archi['m']=substr($archi['filename'],10,2);
        $archi['s']=substr($archi['filename'],12,2);
        $archivos[$archi['filename']]=$archi;    
    }
}
krsort($archivos);
$aa=array();
foreach($archivos as $miarch){
    $aa[]=$miarch;
}

$datos->close();

$m=isset($_REQUEST['m'])?$_REQUEST['m']:'';
$smarty=new Smarty();

$smarty->assign('mensaje',$m);
$smarty->assign('a',$aa);
$smarty->disp();
