<?php
$query = "SELECT customerid, numofguests, status, date, time  FROM bookingrequest ORDER BY numofguests desc";
?>

<!DOCTYPE html>
<html>
    <head>
            <title>Reports</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <script src="http:/>/code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <link rel="sttlesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    </head>

    <body>
    <br/><br/>
        <div class="container" style="width:900px;">
            <div class="col-md-3">
                <input type="text" name="from_date" id="from_date" class="form-control"/>
            </div>

            <div class="col-md-3">
                <input type="text" name="to_date" id="to_date" class="form-control"/>
            </div>

            <div class="col-md-5">
                <input type="button" name="filter" id="filter" value="filter" />
            </div>

            <div style="clear:both"></div>
            <br/>
            <div id = "bookingRequest_table">
                <table class = "table table-bordered">
                    <tr>
                        <th width ="5%">customerid</th>
                        <th width ="5%">numofguests</th>
                        <th width ="5%">status</th>
                        <th width ="20%">date</th>
                        <th width ="20%">time</th>
                    </tr>
                 <?php
                 while($row = $query)
                 {
                  ?>
                    <tr>
                        <td><?php echo $row["customerid"]; ?> </td>
                        <td><?php echo $row["numofguests"]; ?> </td>
                        <td><?php echo $row["status"]; ?> </td>
                        <td><?php echo $row["date"]; ?> </td>
                        <td><?php echo $row["time"]; ?> </td>
                    </tr>
                <?php
                 }
                ?>

                </table>
            </div>
        </div>
    </body>
</html>
    <!-- reports -->

    <!-- reports -->

