<?php
	session_start();
	unset($_SESSION['namaPengurus']);
	
	if(session_destroy())
	{
		header("Location: ../index.php");
	}
?>