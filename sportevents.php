

<?php 
include_once 'conn.php'; 
 session_start(); 
 ob_start();
    $result1 = pg_query($con, "SELECT  * FROM sports_events");

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TTT 2018</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/index.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php include_once 'headlink.php'; ?>
  
</head>
<body>
<?php include_once 'navbar.php'; ?>
</body>

    
<section>

        <div class="stu-db">
            <div class="container pg-inn">
        
                <div class="col-md-12">
                        <div class="udb-sec udb-prof">

                            <h4><img src="images/icon/db1.png" alt="" /> Sports Events</h4>

                            

 <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col"><b>Sr. No.</b></th>
      <th scope="col"><b>Details</b></th>  
      <th scope="col"><b>Date</b></th>
      <th scope="col"><b>Venue</b></th>
    </tr>
  </thead>
  <tbody>
  <?php  while ($row = pg_fetch_row($result1)) { ?>
    <tr>
      <th scope="row"><?php echo "$row[0]";?> </th>
      <td><?php echo "$row[1]";?></td>
      <td><?php echo "$row[2]";?></td>
      <td><?php echo "$row[3]";?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
 <br>

                        </div>

               

</section>
     
 </body>
 </html>