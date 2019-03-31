<?php 
session_start();
ob_start();
include_once 'conn.php';

$error = false;
if (isset($_POST['login'])) {
    $username = pg_escape_string($con, $_POST['username']);
    $password = pg_escape_string($con, $_POST['password']);

    if(isset($_POST['sort']) && $_POST['sort'] === "students") {

        $sql = "SELECT  * FROM students WHERE students.s_username = '" . $username. "' and students.s_password = '" .$password. "' " ;
        $result = pg_query($con, $sql);

        if (pg_num_rows($result) > 0) {
            if($row = pg_fetch_assoc($result)) {
                    $_SESSION['usr_id'] = $row['s_id'];
                    $_SESSION['usr_name'] = $row['s_username'];
                    header("Location: student");
            }
        } else {
            $errormsg = "Incorrect email or password !!!";
        }
        pg_close($con);
    }
    elseif(isset($_POST['sort']) && $_POST['sort'] === "parents"){

        $sql = "SELECT  * FROM parents WHERE parents.p_username = '" . $username. "' and parents.p_password = '" .$password. "' " ;
        $result = pg_query($con, $sql);

        if (pg_num_rows($result) > 0) {
            if($row = pg_fetch_assoc($result)) {
                    $_SESSION['usr_id'] = $row['p_id'];
                    $_SESSION['usr_name'] = $row['p_username'];
                    header("Location: parent");
            }
        } else {
            $errormsg = "Incorrect email or password !!!";
        }
        pg_close($con);

        
    }elseif(isset($_POST['sort']) && $_POST['sort'] === "teacher"){
        
        
        $sql = "SELECT  * FROM teachers WHERE teachers.t_username = '" . $username. "' and teachers.t_password = '" .$password. "' " ;
        $result = pg_query($con, $sql);

        if (pg_num_rows($result) > 0) {
            if($row = pg_fetch_assoc($result)) {
                    $_SESSION['usr_id'] = $row['t_id'];
                    $_SESSION['usr_name'] = $row['t_username'];
                    header("Location: teacher");
            }
        } else {
            $errormsg = "Incorrect email or password !!!";
        }
        pg_close($con);

    }

    
}


?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>Login</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/login.css">

    </head>

<body>
        
            <div class="container w3-display-middle ">
                <div > 
                <div class="text-center" >
                    <a href="login">
                      <b style="font-size:20px; color: #4CAF50;">LOGIN</b>
                    </a>
                </div >
                 
                    <div class="row">
                        <div class="col-12">
                            <!-- Login Form-->
                            <br> 
                                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">

                                    <div class="form-group">
                                        <input type="text" name="username" placeholder="Username" required class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password" required class="form-control" />
                                    </div>
                                    <div class="row" style="color:white;">
                                        <label class="radio-inline">
                                        <input type="radio" name="sort" value="students" checked> Student
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="sort" value="parents" > Parents
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="sort" value="teacher"> Teacher
                                        </label>
                                    </div>

                                    
                                    
                                       
                                    


                                    <div class="form-group">
                                        <input type="submit"   name="login" value="Login" class="btn btn-success" />
                                    </div>
                                </form>
                                
                               
                                
                                <span class="text-danger">
                                    <?php if (isset($errormsg)) { echo $errormsg; } ?>
                                </span>

                        </div>
                       
                    </div>
            
                </div>

            </div>

    </body>

    </html>