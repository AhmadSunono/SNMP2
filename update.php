<?php
if($_POST['select']=="Select the node"){
    header("Location:index.php");
exit;
}
else{


    if($_POST['select']=="sysContact"){
snmp2_set("localhost","public","1.3.6.1.2.1.1.4.0","s",$_POST['value']);  }
 else if($_POST['select']=="sysName")
 {   snmp2_set("localhost","public","1.3.6.1.2.1.1.5.0","s",$_POST['value']); }
 else if ($_POST['select']=="sysLocation") {
     snmp2_set("localhost", "public", "1.3.6.1.2.1.1.6.0", "s", $_POST['value']);
   }


    header("Location:index.php");
exit;
}
?>