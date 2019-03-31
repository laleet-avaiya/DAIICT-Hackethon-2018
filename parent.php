

<?php 
include_once 'conn.php'; 
 session_start(); 
 ob_start();

 if(isset($_SESSION['usr_id'])) {
    $result = pg_query($con, "SELECT  * FROM students WHERE students.s_id = {$_SESSION['usr_id']} ");
    $result1 = pg_query($con,"select marks,sub_name from  subjects join (select * from stu_marks where s_id={$_SESSION['usr_id']}) A
    on (subjects.sub_id=A.sub_id)");
    $result2 = pg_query($con, "SELECT  * FROM students WHERE students.s_id = {$_SESSION['usr_id']} ");

    $result3 = pg_query($con, "SELECT  * FROM parents WHERE parents.s_id = {$_SESSION['usr_id']} ");
    

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
                    <h4> <b>Parent/Guardian Name:</b></h4>
                    
                      
                    <?php  while ($row1 = pg_fetch_row($result3)) { ?>
                      <ul> 
                            <li><h4><?php echo "$row1[1] $row1[2] $row1[3]";?></h4></li>
                            <li>Email: <?php echo "$row1[9]";?></li>
                            <li>Contact No: <?php echo "$row1[8]";?></li>   
                        </ul>
                    <?php } ?>
                    

<br>
                      <h4><b>Student Details:</b></h4><br>
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

                            <h4><img src="images/icon/db1.png" alt="" /> Marks</h4>

                           <table class="table table-bordered">
  <thead>
    <tr >
      <th  scope="col"><b>Sr. No.</b></th>
      <th scope="col"><b>Subject</b></th>
      <th scope="col"><b>Marks</b></th>
                    
    </tr>
  </thead>
  <tbody >
      
  <?php $a = 1; while ($row = pg_fetch_row($result1)) { ?>
    <tr >
      <th scope="row"> <?php echo "$a";?></th>
      <td><?php echo "$row[1]";?></td>
      <td><?php echo "$row[0]";?></td>
    </tr>
    <?php $a=$a+1; } ?>
  </tbody>
  
</table>

                                <br>

                
                        </div>

                <div class="udb-sec udb-cour"  >
                            <h4><img src="images/icon/db2.png" alt="" /> Attendance</h4>
                            
                          <?php include_once 'attandancegraph.php'; ?>
                        </div>
                </div>


</section>
     
 </body>
 </html>