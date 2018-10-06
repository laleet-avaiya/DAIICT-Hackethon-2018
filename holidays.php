

<?php 
include_once 'conn.php'; 
 session_start(); 
 ob_start();

 if(isset($_SESSION['usr_id'])) {
    $result = pg_query($con, "SELECT  * FROM students WHERE students.s_id = {$_SESSION['usr_id']} ");

    $result1 = pg_query($con, "SELECT  * FROM holiday");
   
}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
     <?php include_once 'headlink.php'; ?>
 </head>
 <body>

    
<section>
        <div class="pro-cover">
        </div>

         <nav class="navbar navbar-inverse ">
            <div class="container">
                <div class="row">
                  <div class="col-sm-10"> 
                  <a href="index"><button type="button" class="btn btn-default">Home</button></a>
                   
                </div>
                  <div class="col-sm-2"> <a href="#" ><?php if (isset($_SESSION['usr_id'])) { ?>
                <a  style="float:right,padding-top:15px;" href="logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
                <?php }  ?></a></div>                
                </div>
            </div>
          </nav>


        <div class="stu-db">
            <div class="container pg-inn">
                <div class="col-md-3">
                   
                    <div class="pro-user-bio">
                    <?php  while ($row = pg_fetch_row($result)) { ?>
                        <ul>
                            <li>
                                <h4><?php echo "$row[1] $row[2] $row[3]";?></h4>
                            </li>
                            <li>Student Id: <?php echo "$row[4]";?></li>
                        </ul>
                    <?php } ?>
                    </div>
                </div>
            
                <div class="col-md-9">
                        <div class="udb-sec udb-prof">

                            <h4><img src="images/icon/db1.png" alt="" /> List Of Holidays</h4>

                            

 <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col"><b>Sr. No.</b></th>
      <th scope="col"><b>Holiday</b></th>
      <th scope="col"><b>Date</b></th>
     
    </tr>
  </thead>
  <tbody>
  <?php  while ($row = pg_fetch_row($result1)) { ?>
    <tr>
      <th scope="row"><?php echo "$row[0]";?> </th>
      <td><?php echo "$row[1]";?></td>
      <td><?php echo "$row[2]";?></td>
     
    </tr>
    <?php } ?>
  </tbody>
</table>
 <br>

                        </div>

               

</section>
     
 </body>
 </html>