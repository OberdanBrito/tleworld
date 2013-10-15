<?php

require_once("../../commons/PHP/connectDB.php");
require_once('KLogger.php');
$log = new KLogger("log.txt", KLogger::DEBUG);

if (stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml")) {
    header("Content-type: application/xhtml+xml");
} else {
    header("Content-type: text/xml");
}

$id = trim($_GET["id"]);
$enName = trim($_GET["enName"]);
$thName = trim($_GET["thName"]);
$code = trim($_GET["code"]);

$strSQL = "SELECT companyId FROM loginuser WHERE companyId='$id'";
//$log->LogInfo("SELECT SQL: $strSQL");
$objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
$nr = mysql_num_rows($objQuery);
if (EMPTY($nr)) {
    //create Variable
    $partnerID = "par-" . date('Y-m-d H:i:s') . "-" . $enName;
    $pxcID = "pxc-" . date('Y-m-d H:i:s') . "-" . $enName;
    $loginUserID = "usr-" . date('Y-m-d H:i:s') . "-" . $enName;

    //insert into partner
    $insPartnerSQL = "INSERT INTO partner VALUES ('','$partnerID','0','','','$enName','admin$enName','','','','','','','','','admin','admin','admin','$thName','$enName','$thName','$enName','$code','','','','','',''); ";
    $partnerQuery = mysql_query($insPartnerSQL);
    if ($partnerQuery) {
        $log->LogInfo("Partner Table Inserted.");

//insert into pxc
        $insPxcSQL = "INSERT INTO partnerxcompany VALUES('','$pxcID','$partnerID','employee','$id'); ";
        $pxcQuery = mysql_query($insPxcSQL);
        if ($pxcQuery) {
            $log->LogInfo("PXC Table Inserted.");
            $insLogUserSQL = "INSERT INTO loginuser VALUES('','','$loginUserID','$pxcID','$id','admin$enName','admin$enName','English','','','','','$enName','','','','','','','','','','','','','','','','$enName','$enName',''); ";
            $loginUserQuery = mysql_query($insLogUserSQL);
            if ($loginUserQuery) {
                $log->LogInfo("LoginUser Table Inserted.");
                echo "Inserted, Company=$enName, ID=admin$enName, Password=admin$enName";
            } else {
                $log->LogInfo("LoginUser Table Insert Error. Deleting Partner n PXC");

                //del Partner
                $delPartnerSQL = "DELETE FROM partner WHERE id=$partnerID";
                $delPartnerQuery = mysql_query($delPartnerSQL);
                if ($delPartnerQuery) {
                    $log->LogInfo("Partner Deleted.");
                } else {
                    $log->LogInfo("Partner Delete Error.");
                    echo "Error";
                }

                //del Pxc
                $delPxcSQL = "DELETE FROM partnerxcompany WHERE partner_id=$partnerID";
                $delPxcQuery = mysql_query($delPxcSQL);
                if ($delPxcQuery) {
                    $log->LogInfo("Pxc Deleted.");
                } else {
                    $log->LogInfo("Pxc Delete Error.");
                    echo "Error";
                }
            }
        } else {
            $log->LogInfo("PXC Insert Error. Deleting Partner Table.");

            //del Partner
            $delPartnerSQL = "DELETE FROM partner WHERE id=$partnerID";
            $delPartnerQuery = mysql_query($delPartnerSQL);
            if ($delPartnerQuery) {
                $log->LogInfo("Partner Deleted.");
            } else {
                $log->LogInfo("Partner Delete Error.");
                echo "Error";
            }
        }
    } else {
        $log->LogInfo("Partner Insert Error.");
        echo "Error";
    }

//    $insLogUserSQL = "INSERT INTO loginuser VALUES('','','$loginUserID','$pxcID','$id','admin$enName','admin$enName','English','','','','','$enName','','','','','','','','','','','','','','','','$enName','$enName',''); ";
//    $log->LogInfo("INSERT SQL: $insSQL");
//    $insSQL = "BEGIN " . $insPartnerSQL . $insPxcSQL . $insLogUserSQL . "COMMIT";
//    $log->LogInfo("INSERT SQL: $insSQL");
//
//    $insQuery = mysql_query($insSQL);
//    $log->LogInfo("SQL: $insQuery");
} else {
    echo "Duplicate: This company already has Admin user.";
}
?>
