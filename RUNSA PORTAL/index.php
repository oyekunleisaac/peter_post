<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $matricNumber = $_POST['username'];
    $password = $_POST['password'];

    // Validate and sanitize the form data (you can customize the validation as per your requirements)
    $matricNumber = validateInput($matricNumber);
    $password = validateInput($password);

    // Create a database connection
    $servername = "your_servername";
    $username = "your_username";
    $password = "your_password";
    $database = "your_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query to check if the user exists
    $sql = "SELECT * FROM users WHERE matric_number = '$matricNumber' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User exists, redirect to the main page or display a success message
        header("Location: main_page.html");
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

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="u-clearfix u-form-custom-backend u-form-spacing-10 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 50px; border-style:groove; background-color: rgba(0, 0, 0, 0.4); color: white;">
    <div class="container">
        <div class="image">
            <img src="images/runsalogo-.png">
        </div>
        <div class="text">
            <h6>REDEEMER'S UNIVERSITY <br>STUDENTS ASSOCIATION</h6>
        </div>
    </div>
    <hr>
    <div class="u-form-group u-form-name u-block-f92e-25">
        <h3>STUDENT LOG-IN</h3><br>
        <label for="username-a30d" class="u-label u-block-f92e-26">Matric Number *</label>
        <input type="text" placeholder="Enter matric number" id="username-a30d" name="username" class="u-border-grey-30 u-input u-input-rectangle u-block-f92e-27" required="">
    </div>
    <div class="u-form-group u-form-password u-block-f92e-28">
        <label for="password-a30d" class="u-label u-block-f92e-29">Password *</label>
        <input type="password" placeholder="Enter Password" id="password-a30d" name="password" class="u-border-grey-30 u-input u-input-rectangle u-block-f92e-30" required="">
    </div>
    <div class="u-form-checkbox u-form-group u-block-f92e-31">
        <input type="checkbox" id="checkbox-a30d" name="remember" value="On">
        <label for="checkbox-a30d" class="u-label u-block-f92e-32">Remember me</label>
    </div>
    <div class="u-align-left u-form-group u-form-submit u-block-f92e-33">
        <input type="submit" value="Login" class="u-btn u-btn-submit u-button-style u-block-f92e-34">
    </div>
    <?php if (isset($errorMessage)) : ?>
        <div class="error-message"><?php echo $errorMessage; ?></div>
    <?php endif; ?>
    <input type="hidden" value="" name="recaptchaResponse">
    <input type="hidden" id="siteId" name="siteId" value="25032582">
    <input type="hidden" id="pageId" name="pageId" value="25032588">
    <div>
        <a href="forgot_password.html" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-login-control u-login-forgot-password u-none u-text-palette-1-base u-block-f92e-21">Forgotten password?</a>
        <a href="Register.html" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-login-control u-login-create-account u-none u-text-palette-1-base u-block-f92e-23">Don't have an account?</a>
    </div>
</form>
