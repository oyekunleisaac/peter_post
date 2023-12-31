
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $matricNumber = $_POST['matricnumber'];
    $department = $_POST['department'];
    $level = $_POST['level'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate and sanitize the form data (you can customize the validation as per your requirements)
    $firstName = validateInput($firstName);
    $lastName = validateInput($lastName);
    $matricNumber = validateInput($matricNumber);
    $department = validateInput($department);
    $level = validateInput($level);
    $email = validateInput($email);
    $password = validateInput($password);

    // Create a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "runsa_peter";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query to insert the user into the database
    $sql = "INSERT INTO users (firstname, lastname, matricnumber, department, level, email, password)
            VALUES ('$firstName', '$lastName', '$matricNumber', '$department', '$level', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a success page or display a success message
        header("Location: home.php");
        exit();
    } else {
        // Display an error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

// Function to validate input data (e.g., remove leading/trailing spaces, prevent HTML/SQL injection)
function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RUNSA PORTAL</title>
	<link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Home-1.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery-1.9.1.min.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="referrer" content="origin">

    <link ref="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/respond.js"></script>
</head>
<body>
	 <section class="" id=""> <div class="u-clearfix u-sheet u-block-f92e-2" style="background-image: url(images/runsaexe2.jpg); background-blend-mode: lighten; background-repeat: repeat;">
    <div class="u-form u-login-control u-block-f92e-24">
      <form action="#" method="POST" class="u-clearfix u-form-custom-backend u-form-spacing-10 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 50px; border-style:groove; background-color:rgba(0, 0, 0, 0.4); color: white;">
        <div class="u-form-group u-form-name u-block-f92e-25">
                  <h3>REGISTER DETAILS</h3><br>
          <label for="username-a30d" class="u-label u-block-f92e-26">First Name </label>
          <input type="text" placeholder="Enter your first name" id="name-a30d" name="firstname" class="u-border-grey-30 u-input u-input-rectangle u-block-f92e-27" required="">
        </div>
        <div class="u-form-group u-form-name u-block-f92e-25">
          <label for="username-a30d" class="u-label u-block-f92e-26">Last Name </label>
          <input type="text" placeholder="Enter your last name" id="name-a30d" name="lastname" class="u-border-grey-30 u-input u-input-rectangle u-block-f92e-27" required="">
        </div>
        <div class="u-form-group u-form-name u-block-f92e-25">
          <label for="number-a30d" class="u-label u-block-f92e-26">Matric Number </label>
          <input type="text" placeholder="Enter your matric number" id="number-a30d" name="matricnumber" class="u-border-grey-30 u-input u-input-rectangle u-block-f92e-27" required="">
        </div>
        <div class="u-form-group u-form-name u-block-f92e-25">
          <label for="name-a30d" class="u-label u-block-f92e-26">Department </label>
          <input type="text" placeholder="Enter your department" id="name-a30d" name="department" class="u-border-grey-30 u-input u-input-rectangle u-block-f92e-27" required="">
        </div>
        <div class="u-form-group u-form-name u-block-f92e-25">
          <label for="number-a30d" class="u-label u-block-f92e-26">Level </label>
          <input type="text" placeholder="Enter your level" id="number-a30d" name="level" class="u-border-grey-30 u-input u-input-rectangle u-block-f92e-27" required="">
        </div>
         <div class="u-form-group u-form-name u-block-f92e-25">
          <label for="number-a30d" class="u-label u-block-f92e-26">Email Address </label>
          <input type="text" placeholder="Enter email address" id="number-a30d" name="email" class="u-border-grey-30 u-input u-input-rectangle u-block-f92e-27" required="">
        </div>
        <div class="u-form-group u-form-password u-block-f92e-28">
          <label for="password-a30d" class="u-label u-block-f92e-29">Enter a password </label>
          <input type="text" placeholder="Enter password" id="password-a30d" name="password" class="u-border-grey-30 u-input u-input-rectangle u-block-f92e-30" required="">
        </div><br>
        <div class="u-align-left u-form-group u-form-submit u-block-f92e-33">
          <a href="Login-Template.html" class="u-btn u-btn-submit u-button-style u-block-f92e-34">Submit</a>
          <input type="submit" value="submit" class="u-form-control-hidden">
        </div>
        <input type="hidden" value="" name="recaptchaResponse">
        <input type="hidden" id="siteId" name="siteId" value="25032582">
        <input type="hidden" id="pageId" name="pageId" value="25032588">

        <div><a href="index.php" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-login-control u-login-forgot-password u-none u-text-palette-1-base u-block-f92e-21">< Back</a>
    </div>
      </form>
    </div>
  </div>
  <style data-mode="XL">@media (min-width: 1200px) {
  .u-block-f92e-2 {
    min-height: 49px;
  }

  h3{
     font-family: cursive;
     padding: 0px;
  }
  .u-block-f92e-24 {
    width: 570px;
    margin-top: 80px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 0;
  }
  .u-block-f92e-27 {
    background-image: none;
  }
  .u-block-f92e-30 {
    background-image: none;
  }
  .u-block-f92e-34 {
    width: 100%;
    padding-top: 10px;
    padding-right: 30px;
    padding-bottom: 10px;
    padding-left: 30px;
  }
  .u-block-f92e-21 {
    border-style: none none solid;
    align-self: center;
    margin-top: 30px;
    margin-left: 0;
    margin-right: 0;
    margin-bottom: 0;
    padding-top: 0;
    padding-bottom: 0;
    padding-left: 0;
    padding-right: 0;
  }
  .u-block-f92e-23 {
    border-style: none none solid;
    margin-top: 30px;
    margin-left: 0;
    margin-right: 0;
    margin-bottom: 0;
    padding-top: 0;
    padding-bottom: 0;
    padding-left: 0;
    padding-right: 0;
  }
}

</style>
  <style data-mode="LG" data-visited="true">@media (max-width: 1199px) and (min-width: 992px) {
  .u-block-f92e-2 {
    min-height: 493px;
  }
  .u-block-f92e-24 {
    width: 570px;
    margin-top: 80px;
    margin-right: auto;
    margin-bottom: 0;
    margin-left: auto;
  }
  .u-block-f92e-27 {
    background-image: none;
  }
  .u-block-f92e-30 {
    background-image: none;
  }
  .u-block-f92e-34 {
    width: 100%;
    padding-top: 10px;
    padding-right: 30px;
    padding-bottom: 10px;
    padding-left: 30px;
  }
  .u-block-f92e-21 {
    border-style: none none solid;
    align-self: center;
    margin-top: 30px;
    margin-right: 0;
    margin-bottom: 0;
    margin-left: 185px;
    padding-top: 0;
    padding-bottom: 0;
    padding-left: 0;
    padding-right: 0;
  }
  .u-block-f92e-23 {
    border-style: none none solid;
    margin-top: 30px;
    margin-right: 185px;
    margin-bottom: 60px;
    margin-left: 0;
    padding-top: 0;
    padding-bottom: 0;
    padding-left: 0;
    padding-right: 0;
  }
}</style>
  <style data-mode="MD" data-visited="true">@media (max-width: 991px) and (min-width: 768px) {
  .u-block-f92e-2 {
    min-height: 493px;
  }
  .u-block-f92e-24 {
    width: 570px;
    margin-top: 80px;
    margin-right: auto;
    margin-bottom: 0;
    margin-left: auto;
  }
  .u-block-f92e-27 {
    background-image: none;
  }
  .u-block-f92e-30 {
    background-image: none;
  }
  .u-block-f92e-34 {
    width: 100%;
    padding-top: 10px;
    padding-right: 30px;
    padding-bottom: 10px;
    padding-left: 30px;
  }
  .u-block-f92e-21 {
    border-style: none none solid;
    align-self: center;
    margin-top: 30px;
    margin-right: 0;
    margin-bottom: 0;
    margin-left: 75px;
    padding-top: 0;
    padding-bottom: 0;
    padding-left: 0;
    padding-right: 0;
  }
  .u-block-f92e-23 {
    border-style: none none solid;
    margin-top: 30px;
    margin-right: 75px;
    margin-bottom: 60px;
    margin-left: 0;
    padding-top: 0;
    padding-bottom: 0;
    padding-left: 0;
    padding-right: 0;
  }
}</style>
  <style data-mode="SM">@media (max-width: 767px) and (min-width: 576px) {
  .u-block-f92e-2 {
    min-height: 493px;
  }
  .u-block-f92e-24 {
    width: 540px;
    margin-top: 80px;
    margin-right: auto;
    margin-bottom: 0;
    margin-left: auto;
  }
  .u-block-f92e-27 {
    background-image: none;
  }
  .u-block-f92e-30 {
    background-image: none;
  }
  .u-block-f92e-34 {
    width: 100%;
    padding-top: 10px;
    padding-right: 30px;
    padding-bottom: 10px;
    padding-left: 30px;
  }
  .u-block-f92e-21 {
    border-style: none none solid;
    margin-top: 30px;
    margin-bottom: 0;
    padding-top: 0;
    padding-bottom: 0;
    padding-left: 0;
    padding-right: 0;
    margin-left: 0;
    margin-right: 0;
    align-self: center;
  }
  .u-block-f92e-23 {
    border-style: none none solid;
    margin-bottom: 60px;
    margin-top: 30px;
    padding-top: 0;
    padding-bottom: 0;
    padding-left: 0;
    padding-right: 0;
    margin-left: 0;
    margin-right: 0;
  }
}</style>
  <style data-mode="XS">@media (max-width: 575px) {
  .u-block-f92e-2 {
    min-height: 493px;
  }
  .u-block-f92e-24 {
    width: 340px;
    margin-top: 80px;
    margin-right: auto;
    margin-bottom: 0;
    margin-left: auto;
  }
  .u-block-f92e-27 {
    background-image: none;
  }
  .u-block-f92e-30 {
    background-image: none;
  }
  .u-block-f92e-34 {
    width: 100%;
    padding-top: 10px;
    padding-right: 30px;
    padding-bottom: 10px;
    padding-left: 30px;
  }
  .u-block-f92e-21 {
    border-style: none none solid;
    margin-top: 30px;
    margin-bottom: 0;
    padding-top: 0;
    padding-bottom: 0;
    padding-left: 0;
    padding-right: 0;
    margin-left: 0;
    margin-right: 0;
    align-self: center;
  }
  .u-block-f92e-23 {
    border-style: none none solid;
    margin-bottom: 60px;
    margin-top: 30px;
    padding-top: 0;
    padding-bottom: 0;
    padding-left: 0;
    padding-right: 0;
    margin-left: 0;
    margin-right: 0;
  }
}</style>
</section>
  </section>
</body>
</html>