<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['name'];
    $lastName = $_POST['lastname'];
    $matricNumber = $_POST['number'];
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

    // Prepare and execute the SQL query to insert the user into the database
    $sql = "INSERT INTO users (first_name, last_name, matric_number, department, level, email, password)
            VALUES ('$firstName', '$lastName', '$matricNumber', '$department', '$level', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a success page or display a success message
        header("Location: success.html");
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

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="u-clearfix u-form-custom-backend u-form-spacing-10 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 50px; border-style:groove; background-color:rgba(0, 0, 0, 0.4); color: white;">
    <div class="u-form-group u-form-name u-block-f92e-25">
        <h3>REGISTER DETAILS</h3><br>
        <label for="name-a30d" class="u-label u-block-f92e-26">First Name </label>
        <input type="text" placeholder="Enter your first name" id="name-a30d" name="name" class="u-border-grey-30 u-input u-input-rectangle u-block-f92e-27" required="">
    </div>
    <div class="u-form-group u-form-name u-block-f92e-25">
        <label for="name-a30d" class="u-label u-block-f92e-26">Last Name </label>
        <input type="text" placeholder="Enter your last name" id="name-a30d" name="lastname" class="u-border-grey-30 u-input u-input-rectangle u-block-f92e-27" required="">
    </div>
    <div class="u-form-group u-form-name u-block-f92e-25">
        <label for="number-a30d" class="u-label u-block-f92e-26">Matric Number </label>
        <input type="text" placeholder="Enter your matric number" id="number-a30d" name="number" class="u-border-grey-30 u-input u-input-rectangle u-block-f92e-27" required="">
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
        <input type="email" placeholder="Enter email address" id="number-a30d" name="email" class="u-border-grey-30 u-input u-input-rectangle u-block-f92e-27" required="">
    </div>
    <div class="u-form-group u-form-password u-block-f92e-28">
        <label for="password-a30d" class="u-label u-block-f92e-29">Enter a password </label>
        <input type="password" placeholder="Enter password" id="password-a30d" name="password" class="u-border-grey-30 u-input u-input-rectangle u-block-f92e-30" required="">
    </div><br>
    <div class="u-align-left u-form-group u-form-submit u-block-f92e-33">
        <input type="submit" value="Submit" class="u-btn u-btn-submit u-button-style u-block-f92e-34">
    </div>
    <input type="hidden" value="" name="recaptchaResponse">
    <input type="hidden" id="siteId" name="siteId" value="25032582">
    <input type="hidden" id="pageId" name="pageId" value="25032588">
    <div>
        <a href="index.html" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-login-control u-login-forgot-password u-none u-text-palette-1-base u-block-f92e-21"><< Home</a>
    </div>
</form>
