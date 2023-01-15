<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create an accout</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

   
</head>
<body id="signupbody">
<div class="container-fluid">

<a href='home.php' id="homeicon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-house-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
</svg></a>

<div class="card card-fluid" style="width: 18rem;">
 <div class="card-body">
    <h5 class="card-title">signup</h5>
    
    <form  method="post">
    
    <div id="slogin">
      <label for="sname"><b>Username :</b></label>
      <input type="text" placeholder="Enter username" name="sname" required><br>
  
      <label for=""><b>password :</b></label>
      <input type="password" placeholder="Enter passward" name="spass" required><br><br>
     <button type="submit" name="signup" class=" btn btn-warning">sign up</button>

</div>

    
  </div>
</div>
</div>


    
    
     <?php
if(isset($_POST['signup']))
{
    include 'dbconfig.php';

    $named = trim($_POST['sname']);
    $phnd = trim($_POST['spass']);


     $sql = "INSERT INTO studlogin(uname,password) VALUES('$named','$phnd')";
     
     if (mysqli_query($conn, $sql)) 
     {
        $_SESSION["uname"]=$named;
        ?>
        <script>
        alert('<?php $username=$_SESSION["uname"];
          echo "$username ";?>successfully created');
          window.location="home.php";
    </script>
    <?php
     }
     else
     {
        ?>
  <script>
  alert('failed please entered correctly');
</script>
<?php
     }
   
  
}



?>
</body>
</html>