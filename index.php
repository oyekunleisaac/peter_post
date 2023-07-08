<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $matricNumber = $_POST['matricnumber'];
    $password = $_POST['password'];

    // Validate and sanitize the form data (you can customize the validation as per your requirements)
    $matricNumber = validateInput($matricNumber);
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

    // Prepare and execute the SQL query to check if the user exists
    $sql = "SELECT * FROM users WHERE matricnumber = '$matricNumber' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User exists, redirect to the main page or display a success message
        header("Location: home.php");
        exit();
    } else {
        // User doesn't exist or invalid credentials, display an error message
        $errorMessage = "Invalid matric number or password";
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
<html style="font-size: 16px;"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content=""><meta name="description" content="">
    <title></title>
    <link rel="stylesheet" href="" media="screen" class="u-static-style"><link rel="stylesheet" href="nicepage.css" media="screen">
    <script class="u-script" type="text/javascript" src="//capp.nicepage.com/assets/jquery-1.9.1.min.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="//capp.nicepage.com/0bcad38c69dcfd90c4459a4d49a057db8404895c/nicepage.js" defer=""></script>
    <meta name="generator" content=""></head>


    <body class="u-body" data-style="login-template-1" data-posts="" data-global-section-properties="{&quot;code&quot;:&quot;LOGIN&quot;,&quot;colorings&quot;:{&quot;light&quot;:[&quot;clean&quot;,&quot;clean&quot;],&quot;colored&quot;:[&quot;clean&quot;,&quot;clean&quot;,&quot;clean&quot;],&quot;dark&quot;:[&quot;clean&quot;,&quot;clean&quot;,&quot;clean&quot;]},&quot;isPreset&quot;:true}" data-source="fix" data-page-sections-style="[{&quot;name&quot;:&quot;login-form-1&quot;,&quot;margin&quot;:&quot;both&quot;,&quot;repeat&quot;:false}]" data-page-coloring-types="{&quot;light&quot;:[&quot;clean&quot;,&quot;clean&quot;],&quot;colored&quot;:[&quot;clean&quot;,&quot;clean&quot;,&quot;clean&quot;],&quot;dark&quot;:[&quot;clean&quot;,&quot;clean&quot;,&quot;clean&quot;]}" data-page-category="&quot;Login&quot;">
      <section class="u-align-center u-clearfix u-block-f92e-1" custom-posts-hash="T" data-section-properties="{&quot;margin&quot;:&quot;both&quot;,&quot;stretch&quot;:true}" data-id="f92e" data-style="login-form-1" id="sec-f9d3">


  <div class="u-clearfix u-sheet u-block-f92e-2" style="background-image: url(images/runsaexe4.jpg); ">
    <div class="u-form u-login-control u-block-f92e-24">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="u-clearfix u-form-custom-backend u-form-spacing-10 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 50px; border-style:groove; background-color: rgba(0, 0, 0, 0.4); color: white;">
        <!-- <a href="#" class="u-image u-logo u-image-1">
        </a><h6 style="padding:50px; padding-top: 0px; padding-left: 10px;"> <img src="file:///C:/Users/AFOLABI%20JOSEPH/Desktop/ADEOLA%20FOLDER/RUNSA%20PORTAL/runsalogo-.png" class="u-logo-image u-logo-image-1" width="100">REDEEMER'S UNIVERSITY <br>STUDENTS' ASSOCIATION</h6> -->

        <div class="container">
          <div class="image">
            <img src="images/runsalogo-.png">
          </div>

          <div class="text">
            <h6>REDEEMER'S UNIVERSITY <br>STUDENTS ASSOCIATION</h6>
          </div>
        </div><hr>
         <div class="u-form-group u-form-name u-block-f92e-25">       
           <h3>STUDENT LOG-IN</h3><br>        
          <label for="username-a30d" class="u-label u-block-f92e-26">Matric Number *</label>
          <input type="text" placeholder="Enter matric number" id="username-a30d" name="matricnumber" class="u-border-grey-30 u-input u-input-rectangle u-block-f92e-27" required="">
        </div>

        <div class="u-form-group u-form-password u-block-f92e-28">
          <label for="password-a30d" class="u-label u-block-f92e-29">Password *</label>
          <input type="text" placeholder="Enter Password" id="password-a30d" name="password" class="u-border-grey-30 u-input u-input-rectangle u-block-f92e-30" required="">
        </div>
        <div class="u-form-checkbox u-form-group u-block-f92e-31">
          <input type="checkbox" id="checkbox-a30d" name="remember" value="On">
          <label for="checkbox-a30d" class="u-label u-block-f92e-32">Remember me</label>
        </div>
        <div class="u-align-left u-form-group u-form-submit u-block-f92e-33">
          <a href="main_page.html" class="u-btn u-btn-submit u-button-style u-block-f92e-34">Login</a>
          <input type="submit" value="submit" class="u-form-control-hidden">
        </div>
        <input type="hidden" value="" name="recaptchaResponse">
        <input type="hidden" id="siteId" name="siteId" value="25032582">
        <input type="hidden" id="pageId" name="pageId" value="25032588">

        <div>
          <a href="forgot_password.html" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-login-control u-login-forgot-password u-none u-text-palette-1-base u-block-f92e-21">Forgotten password?</a>
          <a href="register.php" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-login-control u-login-create-account u-none u-text-palette-1-base u-block-f92e-23">Don't have an account?</a></div>
      </form>
    </div>
  </div>
<style>
  .container {
    align-items: center;
    justify-content: center;
    padding-top: 10px;
  }

  
  img {
    max-width: 20%;
    max-height:20%;
    float: left;
  }
  
  h6 {
    font-size: 20px;
    font-family: cursive;
    padding-left: 20px;
    padding-top: 90%;
    float: left;
  }

  h3{
     font-family: cursive;
     padding: 0px;
  }
  </style>

  <style data-mode="XL">@media (min-width: 1200px) {
  .u-block-f92e-2 {
    min-height: 493px;
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
    margin-top: 0px;
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
</body></html>