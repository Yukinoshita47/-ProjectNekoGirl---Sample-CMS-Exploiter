<?

function getmicrotime() {
   list($usec, $sec) = explode(" ",microtime());
   return ((float)$usec + (float)$sec);
} 
 
$time_start = getmicrotime();
 
// algorithm of hash
// see http://php.net/hash_algos for available algorithms
define('HASH_ALGO', 'md5');
 
// max length of password to try
define('PASSWORD_MAX_LENGTH', 8);
 
$charset = 'abcdefghijklmnopqrstuvwxyz';
#$charset .= '0123456789';
#$charset .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
#$charset .= '~`!@#$%^&*()-_\/\'";:,.+=<>? ';
$str_length = strlen($charset);
// Get MD5 checksum from command line
$hash_password = $_GET['md5'];
 
function check($password)
{
        global $hash_password, $time_start;     
 
        if (hash(HASH_ALGO, $password) == $hash_password) {
 
                echo  $password."<br/>";
                $time_end = getmicrotime();
                $time = $time_end - $time_start; 
                exit;
        }
}
 
 
function recurse($width, $position, $base_string)
{
        global $charset, $str_length;
 
        for ($i = 0; $i < $str_length; ++$i) {
                if ($position  < $width - 1) {
                        recurse($width, $position + 1, $base_string . $charset[$i]);
                }
                check($base_string . $charset[$i]);
        }
}
 
for ($i = 1; $i < PASSWORD_MAX_LENGTH + 1; ++$i) {
        $time_check = getmicrotime();
        $time = $time_check - $time_start;
        recurse($i, 0, '');
}
 
echo "Not Found :v\r\n";
?>