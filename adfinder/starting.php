<center>
<?php
error_reporting(0);
$string = htmlspecialchars($_GET['str']);
$jdjsk = $_POST['urels'];
function cek_pesan($jdjsk)
{
$kata_kotor = array("http://","https://");
$hasil = 0;
$jml_kata = count($kata_kotor);
for ($i=0;$i<$jml_kata;$i++)
{
if (stristr($jdjsk,$kata_kotor[$i])) {
$hasil=1;
}
}
return $hasil;
}
$djjdg = $string;
if (cek_pesan($djjdg)) {
$bpad = $string;
}
else {
$bpad = "http://" . $string;
}
$srcsd = array(
'operator/',
'sika/',
'develop/',
'ketua/',
'redaktur/',
'admin/',
'administrator/',
'adminweb/',
'user/',
'users/',
'dinkesadmin/',
'retel/',
'author/',
'panel/',
'paneladmin/',
'panellogin/',
'redaksi/',
'cp-admin/',
'master/',
'master/index.php',
'master/login.php',
'operator/index.php',
'sika/index.php',
'develop/index.php',
'ketua/index.php',
'redaktur/index.php',
'admin/index.php',
'administrator/index.php',
'adminweb/index.php',
'user/index.php',
'users/index.php',
'dinkesadmin/index.php',
'retel/index.php',
'author/index.php',
'panel/index.php',
'paneladmin/index.php',
'panellogin/index.php',
'redaksi/index.php',
'cp-admin/index.php',
'operator/login.php',
'sika/login.php',
'develop/login.php',
'ketua/login.php',
'redaktur/login.php',
'admin/login.php',
'administrator/login.php',
'adminweb/login.php',
'user/login.php',
'users/login.php',
'dinkesadmin/login.php',
'retel/login.php',
'author/login.php',
'panel/login.php',
'paneladmin/login.php',
'panellogin/login.php',
'redaksi/login.php',
'cp-admin/login.php',
'terasadmin/',
'terasadmin/index.php',
'terasadmin/login.php',
'rahasia/',
'rahasia/index.php',
'rahasia/admin.php',
'rahasia/login.php',
'dinkesadmin/',
'dinkesadmin/login.php',
'adminpmb/',
'adminpmb/index.php',
'adminpmb/login.php',
'system/',
'system/index.php',
'system/login.php',
'webadmin/',
'webadmin/index.php',
'webadmin/login.php',
'wpanel/',
'wpanel/index.php',
'wpanel/login.php',
'adminpanel/index.php',
'adminpanel/',
'adminpanel/login.php',
'adminkec/',
'adminkec/index.php',
'adminkec/login.php',
'admindesa/',
'admindesa/index.php',
'admindesa/login.php',
'adminkota/',
'adminkota/index.php',
'adminkota/login.php',
'admin123/',
'admin123/index.php',
'admin123/login.php',
'logout/',
'logout/index.php',
'logout/login.php',
'logout/admin.php',
'sistem/',
'webpanel/',
'w3bc0ntr0l/',
'apanel/',
'sysadmin/',
);
foreach ($srcsd as $srcss)
{
$bling = file("$bpad/$srcss");
if($bling) {
echo '<br/><font color="green">Checking ("</font><font color="black"><a href="'.$bpad . '/' . $srcss . '">'.$bpad . '/' . $srcss . '</a></font><font color="green">") | Found</font>';
break;
}
else {
echo '<br/><font color="red">Checking ("</font><font color="black"><a href="'.$bpad .'/' . $srcss . '">'.$bpad . '/' . $srcss . '</a></font><font color="red">") | Not Found</font>';
continue;
}
}
?>
</center>