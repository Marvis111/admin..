<?php
if (!isset($_SESSION['username'])) {
	header('location:../registration/login.php');
}