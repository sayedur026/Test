<?php
if(isset($_SESSION['specialUserMode']))
{
	if($_SESSION['specialUserMode']<1)
		die();
}
else
{
	die();
}
?>