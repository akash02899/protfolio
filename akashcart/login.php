<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">


 
</head>
<body id="loginbody">


    
    <div class="container container-fluid">
<!-- card -->
<a href='home.php' id="homeicon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-house-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
</svg></a>
    <div class="card card-fluid" style="width: 18rem;">
  
  <div class="card-body">
    <h5 class="card-title">Login</h5>

    <form  method="post">
      
    <div id="slogin">
      <label for="sname"><b>Username :</b></label>
      <input type="text" placeholder="Enter username" name="sname" required><br>
  
      <label for=""><b>password :</b></label>
      <input type="password" placeholder="Enter passward" name="spass" required><br><br>
  
      


      <button class="btn btn-warning" type="submit" name="login">Login</button><br><br>
                 <div >
                <div class="forgot login-footer">  <span>Or<br>Looking to <a href="signup.php">create an account</a> ?</span> </div>
                
            </div>
</div>
</div>
</div>
    
  
  </div>
</div>


    
    
      <!-- insert into mysql -->

      <?php 
      include 'dbconfig.php';

     if(isset($_POST['login']))
     {


 $named = trim($_POST['sname']);
 $passd = trim($_POST['spass']);

$sql = "SELECT uname, password, id FROM studlogin WHERE uname='$named' AND password='$passd'";
$result= mysqli_query($conn,$sql)or die(mysqli_error());
$num_row= mysqli_num_rows($result);
$row= mysqli_fetch_array($result);
if($num_row>0)
{
$_SESSION["uname"]=$named;
?>
<script>
    alert('<?php $username=$_SESSION["uname"];
echo "$username ";?>successfully logged');
window.location="home.php";
</script>
<?php
}
else{
  ?>
  <script>
  alert('failed please entered correctly');
</script>
<?php
}
}
?>
   
    </div>
  
    
  </form>
  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg> -->
</body>
</html>