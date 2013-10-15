<?php

session_start();
header("Cache-Control: no-cache, must-revalidate");
echo "<script type='text/javascript'>";
echo "var sesCompanyId = '" . $_SESSION['company_id'] . "';";
echo "var sesLanguage = '" . $_SESSION['language'] . "';";
echo "var sesUser = '" . $_SESSION['userName'] . "';";
echo "var sesCompany = '" . $_SESSION['company'] . "';";
echo "var sesUserId = '" . $_SESSION['user_id'] . "';";
echo "</script>";
?>
