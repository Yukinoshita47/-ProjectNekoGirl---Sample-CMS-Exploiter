<?php
// Non-Aktif Semua Pesan Error
error_reporting(0);
$rootdir = $_SERVER['DOCUMENT_ROOT'];
include "$rootdir/data.php"
?>
<script language="javascript">
function toggle() {

var ele = document.getElementById("sembunyikan");

var text = document.getElementById("penampakan");

if(ele.style.display == "block") {

ele.style.display = "none";
text.innerHTML = "+";

}
else {
ele.style.display = "block";
text.innerHTML = "-";
}
} 
</script>
<?php
$string = htmlspecialchars($_GET['str']);
$timex = htmlspecialchars($_GET['ztr']);
$trgt = htmlspecialchars($_GET['tgr']);
?>
<?php
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
?>
<?php
$djjdg = $string;
if (cek_pesan($djjdg)) {
$bpad = $string;
}
else {
$bpad = "http://" . $string;
}
// $jmlh = $_POST['jumlah'];
$i=1;
?>
<form method="post" target="<? echo $trgt; ?>" action="<? echo $bpad; ?>" enctype='multipart/form-data'>
<b><font color="<? print $trz; ?>">File For Upload</font></b>
<br/><input type="file" name="<? echo $timex; ?>"><input type="submit" value="Submit">
</form>