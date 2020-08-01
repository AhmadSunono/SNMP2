<?php
//this is for SysGroup :
$p1 = snmp2_walk("localhost", "public", "1.3.6.1.2.1.1");


//This is UDP table ::


//This is UDP local Address :
$p31 = snmp2_walk("localhost", "public", "1.3.6.1.2.1.7.5.1.1");
//This is UDP Local Port :
$p32 = snmp2_walk("localhost", "public", "1.3.6.1.2.1.7.5.1.2");


?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SNMP</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

</head>
<body>

<div class="container-fluid main-container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">SNMP</a>
        <button
                class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto nav nav-tabs" id="nav-tab" role="tablist">
                <li class="nav-item ">
                    <a
                            class="nav-link" id="first-tab" data-toggle="tab" href="#first" role="tab"
                            aria-controls="first" aria-selected="true"
                    >System Group Table </a>
                </li>
                <li class="nav-item">
                    <a
                            class="nav-link" id="second-tab" data-toggle="tab" href="#second" role="tab"
                            aria-controls="second" aria-selected="false"
                    >Interface Table</a>
                </li>
                <li class="nav-item">
                    <a
                            class="nav-link" id="third-tab" data-toggle="tab" href="#third" role="tab"
                            aria-controls="third" aria-selected="false"
                    >UDP Table</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="main-section text-center">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active first-page" id="first" role="tabpanel" aria-labelledby="first-tab">
                <div class="container mt-5">
                    <table class="table text-left table-bordered">
                        <colgroup>
                            <col span="1" style="width: 20%;">
                            <col span="1" style="width: 80%;">
                        </colgroup>
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Node</th>
                            <th scope="col">Value</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>sysDescr</td>
                            <td id="sysDescr"><?php echo mb_split(":", $p1[0])[1] . mb_split(":", $p1[0])[2] . mb_split(":", $p1[0])[3]; ?></td>
                        </tr>
                        <tr>
                            <td>sysObjectID</td>
                            <td id="sysObjectID"><?php echo mb_split(":", $p1[1])[1]; ?></td>
                        </tr>
                        <tr>
                            <td>sysUpTime</td>
                            <td id="sysUpTime"><?php echo mb_split(":", $p1[2])[1]; ?></td>
                        </tr>
                        <tr>
                            <td>sysContact</td>
                            <td id="sysContact"><?php echo mb_split(":", $p1[3])[1]; ?></td>
                        </tr>
                        <tr>
                            <td>sysName</td>
                            <td id="sysName"><?php echo mb_split(":", $p1[4])[1]; ?></td>
                        </tr>
                        <tr>
                            <td>sysLocation</td>
                            <td id="sysLocation"><?php echo mb_split(":", $p1[5])[1]; ?></td>
                        </tr>
                        <tr>
                            <td>sysServices</td>
                            <td id="sysServices"><?php echo mb_split(":", $p1[6])[1]; ?></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="fields mt-2">
                        <form id="potatoForm" method="post" action="update.php">
                            <div class="input-group-text">
                                <select class="custom-select" id="nodeName" name="select">
                                    <option selected>Select the node</option>
                                    <option value="sysContact">sysContact</option>
                                    <option value="sysName">sysName</option>
                                    <option value="sysLocation">sysLocation</option>
                                </select>
                                <input class="form-control" type="text" id="nodeValue" placeholder="Type the new value"
                                       name="value">
                            </div>
                            <div class="input-group-text">
                                <input class="form-control btn btn-dark" type="submit" value="Change Values">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade second-page" id="second" role="tabpanel" aria-labelledby="second-tab">
                <div class="container mt-5">
                    <table id="secondTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Value</th>

                        </tr>
                        </thead>
                        <tbody id="TableBody">

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Value</th>

                        </tr>
                        </tfoot>
                    </table>

                    <div class="input-group-text my-5">
                        <select class="custom-select" id="imad">
                            <option selected>Select the node</option>
                            <option value="1.3.6.1.2.1.2.2.1.1">ifIndex</option>
                            <option value="1.3.6.1.2.1.2.2.1.2">ifDescr</option>
                            <option value="1.3.6.1.2.1.2.2.1.3">ifType</option>
                            <option value="1.3.6.1.2.1.2.2.1.4">ifMtu</option>
                            <option value="1.3.6.1.2.1.2.2.1.5">ifSpeed</option>
                            <option value="1.3.6.1.2.1.2.2.1.6">ifPhysAddress</option>
                            <option value="1.3.6.1.2.1.2.2.1.7">ifAdminStatus</option>
                            <option value="1.3.6.1.2.1.2.2.1.8">ifOperStatus</option>
                            <option value="1.3.6.1.2.1.2.2.1.9">ifLastChange</option>
                            <option value="1.3.6.1.2.1.2.2.1.10">ifInOctets</option>
                            <option value="1.3.6.1.2.1.2.2.1.11">ifInUcastPkts</option>
                            <option value="1.3.6.1.2.1.2.2.1.12">ifInNUcastPkts</option>
                            <option value="1.3.6.1.2.1.2.2.1.13">ifInDiscards</option>
                            <option value="1.3.6.1.2.1.2.2.1.14">ifInErrors</option>
                            <option value="1.3.6.1.2.1.2.2.1.15">ifInUnknownProtos</option>
                            <option value="1.3.6.1.2.1.2.2.1.16">ifOutOctets</option>
                            <option value="1.3.6.1.2.1.2.2.1.17">ifOutUcastPkts</option>
                            <option value="1.3.6.1.2.1.2.2.1.18">ifOutNUcastPkts</option>
                            <option value="1.3.6.1.2.1.2.2.1.19">ifOutDiscards</option>
                            <option value="1.3.6.1.2.1.2.2.1.20">ifOutErrors</option>
                            <option value="1.3.6.1.2.1.2.2.1.21">ifOutQLen</option>
                            <option value="1.3.6.1.2.1.2.2.1.22">ifSpecific</option>


                        </select>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade third-page" id="third" role="tabpanel" aria-labelledby="third-tab">
                <div class="container mt-5">
                    <table id="thirdTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>IP Address</th>
                            <th>Port Number</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        for ($i = 0; $i < sizeof($p31); $i++) {
                            echo "<tr>";
                            echo "<td>";


                            echo mb_split(":", $p31[$i])[1];
                            echo "</td>";

                            echo "<td>";
                            echo mb_split(":", $p32[$i])[1];
                            echo "</td>";

                            echo "</tr>";

                        }


                        ?>


                        </tbody>
                        <tfoot>
                        <tr>
                            <th>IP Address</th>
                            <th>Port Number</th>

                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery-3.0.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script
        type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"
></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        var secondTable = $('#secondTable').DataTable();
        $('#thirdTable').DataTable();

        //Second Page Handle Select Change
        $('#imad').on('change', function (event) {
            console.log(this.value);


            $.ajax({
                url: "getifTables.php",
                method: "post",
                data: {value: this.value},
                dataType: "html"
            })
                .done(function (msg) {
                        var parsedMSG = JSON.parse(msg);
                        console.log(parsedMSG.length);
                        secondTable.clear().draw();
                        for (var i = 0; i < parsedMSG.length; i++) {
                            console.log(parsedMSG[i]);
                            secondTable.row.add({
                                "0": "Val" + i,
                                "1": parsedMSG[i]

                            }).draw();


                            /*    var temp = document.createElement("tr");
                                var temp2 = document.createElement("td");
                                temp2.appendChild(document.createTextNode("Val" + i));
                                var temp3 = document.createElement("td");
                                temp3.appendChild(document.createTextNode(parsedMSG[i]));
                                temp.appendChild(temp2);
                                temp.appendChild(temp3);
                                document.getElementById("TableBody").append(temp);*/
                        }

                        $('#secondTable').DataTable();


                    }
                ).fail(function (jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });

        })

    });
</script>
<script>
    /*$(function () {
        $('#potatoForm').on('submit', function (event) {
            event.preventDefault();

            console.log($("#nodeName").val());
            console.log($("#nodeValue").val());

            let nodeName = $("#nodeName").val();
            let nodeValue = $("#nodeValue").val();

            $("#" + nodeName).html(nodeValue);

            //write ajax code here

        });
    });*/
</script>
</body>

</html>