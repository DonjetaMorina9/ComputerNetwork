<html>
 <body>
 	<div align ='center'></div>
 	<form method='POST'>
 		<table>
 			<tr>
 				<td>
 					<label>SHeno mesazhin</label>
 					<input type="text" name="mesazhi">
 					<input type="submit" name="dergoni" value="dergo">
 				</td>
 			</tr>
 		<?php
 		    $host='192.168.1.176';
            $port=20205;

            if(isset($_POST['dergoni'])){
            	$msg= $_REQUEST['mesazhi'];
            	$socketi = socket_create(AF_INET, SOCK_STREAM, 0);
            	socket_connect($socketi, $host, $port);
            	socket_write($socketi, $msg, strlen($msg)) or die("Could not send data to server\n");


            	$reply = socket_read($socketi, 2048);
            	$reply = trim($reply);
            	$reply = "serveri thote:\t".$reply;

            }

 		 ?>
 		 <tr>
 		 	<td>
 		 		<textarea rows = '10' col='30'><?php echo @$reply; ?>
 		 	</textarea>

 		 	</td>
 		 </tr>
 		</table>
 	</form>
 </body>
 </html>