<?php
$host='192.168.1.176';
$port=20205;
set_time_limit(0);

$sock = socket_create(AF_INET, SOCK_STREAM, 0) or die("socketi nuk eshte krijuar\n");
$result = socket_bind($sock, $host, $port) or die("socketi nuk eshte bere bind\n");
echo "duke pritur connections";
class Chat
{
	function readline()
	{
		return rtrim(fgets(STDIN));
	}
}

do
{
	$listener = socket_listen($sock, 3) or die("Could not set up socket listener\n");
	$accept = socket_accept($sock) or die("nuk u pranua connection");
	$msg = socket_read($accept, 2048) or die ("inputi nuk u lexua\n");
	$msg = trim($msg);
	echo "klienti thote:\t".$msg."\n\n";

	$line = new Chat();
	echo "shkruani reply ;\t";
	$reply = $line->readline();
	socket_write($accept, $reply, strlen($reply)) or die("nuk mund te shkruhet output-i\n");
}while (true);

socket_close($accept, $sock);
?>
