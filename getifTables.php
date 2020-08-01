<?php

echo json_encode(snmp2_walk("localhost","public",$_POST['value']));