<?php
$rootdir = $_SERVER['DOCUMENT_ROOT'];
$fp = fopen("$rootdir/shjxbbssnd.txt", "r");
$count = fread($fp, 1024);
fclose($fp);
$count = $count + 1;
echo '<br/><br/><b><font color="red">Visitor</font></b><br/><font color="blue">' . $count . '</font>';
$fp = fopen("$rootdir/shjxbbssnd.txt", "w");
fwrite($fp, $count);
fclose($fp);
?>