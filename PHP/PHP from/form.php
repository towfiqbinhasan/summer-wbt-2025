<?php

$rollErr = $fnameErr = $lnameErr = $fatherErr = $dobErr = $mobileErr = $emailErr = $passErr = $genderErr = $courseErr = $cityErr = $addressErr = "";


$roll_no = $first_name = $last_name = $father_name = "";
$dob_day = $dob_month = $dob_year = "";
$country_code = "+91"; $mobile = ""; $email = ""; $password = "";
$gender = ""; $dept = []; $course = ""; $city = ""; $address = "";


function test_input($d) {
  $d = trim($d);
  $d = stripslashes($d);
  $d = htmlspecialchars($d, ENT_QUOTES, 'UTF-8');
  return $d;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if (empty($_POST["roll_no"])) {
    $rollErr = "Roll number is required";
  } else {
    $roll_no = test_input($_POST["roll_no"]);
  }


  if (empty($_POST["first_name"])) {
    $fnameErr = "First name is required";
  } else {
    $first_name = test_input($_POST["first_name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $first_name)) {
      $fnameErr = "Only letters and spaces allowed";
    }
  }

 
  if (empty($_POST["last_name"])) {
    $lnameErr = "Last name is required";
  } else {
    $last_name = test_input($_POST["last_name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $last_name)) {
      $lnameErr = "Only letters and spaces allowed";
    }
  }


  if (empty($_POST["father_name"])) {
    $fatherErr = "Father's name is required";
  } else {
    $father_name = test_input($_POST["father_name"]);
  }

 
  $dob_day   = isset($_POST["dob_day"])   ? test_input($_POST["dob_day"])   : "";
  $dob_month = isset($_POST["dob_month"]) ? test_input($_POST["dob_month"]) : "";
  $dob_year  = isset($_POST["dob_year"])  ? test_input($_POST["dob_year"])  : "";
  if ($dob_day==="" || $dob_month==="" || $dob_year==="") {
    $dobErr = "Date of birth is required";
  } elseif (!ctype_digit($dob_day) || !ctype_digit($dob_month) || !ctype_digit($dob_year)
            || (int)$dob_day<1 || (int)$dob_day>31
            || (int)$dob_month<1 || (int)$dob_month>12
            || (int)$dob_year<1900) {
    $dobErr = "Invalid date";
  }

 
  $country_code = isset($_POST["country_code"]) ? test_input($_POST["country_code"]) : "+91";
  if (empty($_POST["mobile"])) {
    $mobileErr = "Mobile number is required";
  } else {
    $mobile = test_input($_POST["mobile"]);
    if (!preg_match("/^[0-9]{10,11}$/", $mobile)) {
      $mobileErr = "Enter 10–11 digits";
    }
  }


  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email";
    }
  }


  if (empty($_POST["password"])) {
    $passErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    if (strlen($password) < 6) {
      $passErr = "At least 6 characters";
    }
  }


  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }


  if (!empty($_POST["dept"]) && is_array($_POST["dept"])) {
    $dept = array_map('test_input', $_POST["dept"]);
  }

 
  if (empty($_POST["course"]) || strpos($_POST["course"], "Select Current Course") !== false) {
    $courseErr = "Course is required";
  } else {
    $course = test_input($_POST["course"]);
  }

 
  if (empty($_POST["city"])) {
    $cityErr = "City is required";
  } else {
    $city = test_input($_POST["city"]);
  }


  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } else {
    $address = test_input($_POST["address"]);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Student Registration Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>.error{color:red;font-size:.9rem;margin-left:8px}</style>
  <link rel="stylesheet" href="../PHP from/from.css">
</head>
<body>
  <div class="container">
    <h1>Student Registration Form</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data" class="form">

      
      <label for="roll_no" class="label"><strong>Roll no. :</strong></label>
      <div>
        <input id="roll_no" name="roll_no" type="text" class="input" value="<?php echo $roll_no; ?>">
        <span class="error"><?php echo $rollErr; ?></span>
      </div>

    
      <label class="label"><strong>Student name :</strong></label>
      <div class="row-2">
        <div>
          <input name="first_name" type="text" class="input" placeholder="First Name" value="<?php echo $first_name; ?>">
          <span class="error"><?php echo $fnameErr; ?></span>
        </div>
        <div>
          <input name="last_name" type="text" class="input" placeholder="Last Name" value="<?php echo $last_name; ?>">
          <span class="error"><?php echo $lnameErr; ?></span>
        </div>
      </div>

     
      <label for="father" class="label"><strong>Father's name :</strong></label>
      <div>
        <input id="father" name="father_name" type="text" class="input" value="<?php echo $father_name; ?>">
        <span class="error"><?php echo $fatherErr; ?></span>
      </div>

    
      <label class="label"><strong>Date of birth :</strong></label>
      <div class="row-3 dob">
        <div><input name="dob_day" type="text" class="input" placeholder="Day" value="<?php echo $dob_day; ?>"></div>
        <div><input name="dob_month" type="text" class="input" placeholder="Month" value="<?php echo $dob_month; ?>"></div>
        <div><input name="dob_year" type="text" class="input" placeholder="Year" value="<?php echo $dob_year; ?>"></div>
        <span class="hint">(DD-MM-YYYY)</span>
        <span class="error"><?php echo $dobErr; ?></span>
      </div>

     
      <label class="label"><strong>Mobile no. :</strong></label>
      <div class="row-2">
        <input name="country_code" type="text" class="input" value="<?php echo $country_code; ?>">
        <div>
          <input name="mobile" type="text" class="input" value="<?php echo $mobile; ?>">
          <span class="error"><?php echo $mobileErr; ?></span>
        </div>
      </div>

     
      <label for="email" class="label"><strong>Email id :</strong></label>
      <div>
        <input id="email" name="email" type="email" class="input" value="<?php echo $email; ?>">
        <span class="error"><?php echo $emailErr; ?></span>
      </div>

      
      <label for="password" class="label"><strong>Email id :</strong></label>
      <div>
        <input id="password" name="password" type="password" class="input" value="<?php echo $password; ?>">
        <span class="error"><?php echo $passErr; ?></span>
      </div>

      
      <label class="label"><strong>Gender :</strong></label>
      <div class="inline">
        <label><input type="radio" name="gender" value="Male"   <?php if($gender=="Male") echo "checked"; ?>> Male</label>
        <label><input type="radio" name="gender" value="Female" <?php if($gender=="Female") echo "checked"; ?>> Female</label>
        <span class="error"><?php echo $genderErr; ?></span>
      </div>

      
      <label class="label"><strong>Department :</strong></label>
      <div class="inline">
        <label><input type="checkbox" name="dept[]" value="CSE"   <?php if(in_array("CSE",$dept))   echo "checked"; ?>> CSE</label>
        <label><input type="checkbox" name="dept[]" value="IT"    <?php if(in_array("IT",$dept))    echo "checked"; ?>> IT</label>
        <label><input type="checkbox" name="dept[]" value="ECE"   <?php if(in_array("ECE",$dept))   echo "checked"; ?>> ECE</label>
        <label><input type="checkbox" name="dept[]" value="Civil" <?php if(in_array("Civil",$dept)) echo "checked"; ?>> Civil</label>
        <label><input type="checkbox" name="dept[]" value="Mech"  <?php if(in_array("Mech",$dept))  echo "checked"; ?>> Mech</label>
      </div>

      
      <label class="label"><strong>Course :</strong></label>
      <div>
        <select name="course" class="input">
          <option>-------------------- Select Current Course's ---------------------</option>
          <option <?php if($course=="Diploma") echo "selected"; ?>>Diploma</option>
          <option <?php if($course=="B.Tech") echo "selected"; ?>>B.Tech</option>
          <option <?php if($course=="M.Tech") echo "selected"; ?>>M.Tech</option>
          <option <?php if($course=="BCA") echo "selected"; ?>>BCA</option>
          <option <?php if($course=="MCA") echo "selected"; ?>>MCA</option>
        </select>
        <span class="error"><?php echo $courseErr; ?></span>
      </div>

     
      <label class="label"><strong>Student photo :</strong></label>
      <input type="file" name="photo" class="input-file" accept=".jpg,.jpeg,.png">

      
      <label class="label"><strong>City :</strong></label>
      <div>
        <input name="city" type="text" class="input" value="<?php echo $city; ?>">
        <span class="error"><?php echo $cityErr; ?></span>
      </div>

      
      <label class="label"><strong>Address :</strong></label>
      <div>
        <textarea name="address" class="textarea"><?php echo $address; ?></textarea>
        <span class="error"><?php echo $addressErr; ?></span>
      </div>

      
      <div class="center">
        <button class="btn" type="submit">Register</button>
      </div>
    </form>

    <?php
   
    $allClear = ($_SERVER["REQUEST_METHOD"]=="POST" &&
      $rollErr==="" && $fnameErr==="" && $lnameErr==="" && $fatherErr==="" &&
      $dobErr==="" && $mobileErr==="" && $emailErr==="" && $passErr==="" &&
      $genderErr==="" && $courseErr==="" && $cityErr==="" && $addressErr==="");

    if ($allClear) {
      echo "<hr><h2>Submitted Data</h2>";
      echo "Roll no.: ". $roll_no ."<br>";
      echo "Student name: ". $first_name ." ". $last_name ."<br>";
      echo "Father's name: ". $father_name ."<br>";
      echo "Date of birth: ". $dob_day ."-". $dob_month ."-". $dob_year ."<br>";
      echo "Mobile: ". $country_code ." ". $mobile ."<br>";
      echo "Email: ". $email ."<br>";
      echo "Gender: ". $gender ."<br>";
      echo "Department: ". (empty($dept) ? "—" : implode(", ", $dept)) ."<br>";
      echo "Course: ". $course ."<br>";
      echo "City: ". $city ."<br>";
      echo "Address: ". nl2br($address) ."<br>";
    }
    ?>
  </div>
</body>
</html>
