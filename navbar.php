

<section>
        <div class="pro-cover">
        </div>

         <nav class="navbar navbar-inverse ">
            <div class="container">
                <div class="row">
                  <div class="col-sm-10"> 
                    <a href="index"><button type="button" class="btn btn-default">Home</button></a>
                    
                    <a href="<?php if(isset($_SESSION['usr_id'])) { echo "teachers"; } else { echo "login";} ?>"><button type="button" class="btn btn-default">Teachers</button></a>
                    <a href="<?php if(isset($_SESSION['usr_id'])) { echo "student"; } else { echo "login";} ?>"><button type="button" class="btn btn-default">Student</button></a>
                    <a href="<?php if(isset($_SESSION['usr_id'])) { echo "parent"; } else { echo "login";} ?>"><button type="button" class="btn btn-default">Parents</button></a>
                    <a href="events"><button type="button" class="btn btn-default">Upcomming Events</button></a>
                    <a href="holidays"><button type="button" class="btn btn-default">Holiday</button></a>
                    <a href="teachersinfo"><button type="button" class="btn btn-default">Teachers Info</button></a>
                    <a href="about"><button type="button" class="btn btn-default">About</button></a>
                    

                </div>
                  <div class="col-sm-2"> 
                    
                  
                  <ul class="nav navbar-nav navbar-right">
      
      <?php if (isset($_SESSION['usr_id'])) { ?>
      <li><a  href="logout" style="font-size:16px;"><span class="glyphicon glyphicon-log-in btn btn-default"></span> Logout</a></li>
      <?php } else { ?>
        <li><a href="login" style="font-size:16px;"><span class="glyphicon glyphicon-log-in btn btn-default"></span> Login</a></li>
        <?php }  ?>
    </ul> 
                
                

                </div>
            </div>
          </nav>



</section>
     

  



