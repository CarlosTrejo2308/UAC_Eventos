<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'pumaeventos');
define('DB_USER','root');
define('DB_PASSWORD','');
$con = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysql_error());
function NewUser() {
    if(isset($_POST['fname']))
        $firstname = $_POST['fname'];
    if(isset($_POST['lname']))
        $lastname = $_POST['lname'];
    if(isset($_POST['subject']))
        $subject = $_POST['subject'];
    if(isset($_POST['email']))
        $email = $_POST['email'];
    if(isset($_POST['pass1']))
        $password = $_POST['pass1'];
  $query = "INSERT INTO usuarios (nombre,apellido,carrera,correo,contrasena) VALUES ('$firstname','$lastname','$subject','$email','$password')";
  $var = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);

  //echo $query;
  $con = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
  if($con->query($query) === true) {
      echo "Registro Completado";
  }
  else {
      ECHO "Error";
  }
}
function SignUp() {
  if(!empty($_POST['email'])) { //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
      $aVar = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);
      if(isset($_POST['email'])) {
        $em = $_POST['email'];
      }
      if(isset($_POST['pass1'])) {
        $pa = $_POST['pass1'];
      }
    if(isset($_POST['email']))
        $email = $_POST['email'];
    if(isset($_POST['pass1']))
      $consu = "SELECT * FROM usuarios WHERE CORREO = '$em'";
    $query = mysqli_query($aVar,$consu);
    echo $query;
    if(!$query)
    {
      newuser();
    }
    else {
      echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
    }
  }
}
function CheckPassword() {

    if(isset($_POST['pass1'])) {
        $pa1 = $_POST['pass1'];
    }
    if(isset($_POST['pass2'])) {
        $pa2 = $_POST['pass2'];
    }  
  if($pa1 != $pa2) {
    die("Passwords don't match :c");
  }
  if(empty($pa1)) {
    die("Password can't be empty!");
  }
}


//if(isset($_POST['submit'])) {
    CheckPassword();
    //echo "Contrasena comprobada";
    SignUp();
//}
?>

<!--Read more: http://mrbool.com/how-to-create-a-sign-up-form-registration-with-php-and-mysql/28675#ixzz4z16YKlMf-->
