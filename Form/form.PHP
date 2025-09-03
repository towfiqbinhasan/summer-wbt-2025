<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Form</title>
    <style>
      * {
    box-sizing: border-box;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}
body {
    background-color: #63676cff;  
    padding: 20px;
    margin: 0;
}
.container {
    max-width: 900px;
    margin: 0 auto;
    background-color: #ffffff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}
h2 {
    color: #0d47a1;  
    margin-bottom: 12px;
}
h3 {
    display: inline;
    color: #ff0000ff;   
}
.form-group {
    margin-bottom: 16px;
    display: flex;
    align-items: center;
}
label {
    flex-basis: 200px;
    text-align: right;
    margin-right: 15px;
    font-weight: 600;
    color: #333;
}
.form-content {
    flex: 1;
}
input[type="text"], 
input[type="email"], 
input[type="number"], 
select, 
textarea {
    width: 100%;
    padding: 9px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 15px;
    transition: border 0.3s, box-shadow 0.3s;
}
input:focus, select:focus, textarea:focus {
    border-color: #0d47a1;
    box-shadow: 0 0 6px rgba(13,71,161,0.4);
    outline: none;
}
.radio-group, .checkbox-group {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}
.radio-option, .checkbox-option {
    display: flex;
    align-items: center;
}
.error {
    color: #b71c1c; 
    font-size: 14px;
    font-weight: bold;
    margin-top: 5px;
    margin-left: 215px;
}
.head {
    margin-bottom: 22px;
    padding-bottom: 10px;
    border-bottom: 2px solid #ddd;
}
.head a {
    text-decoration: none;
    color: #0d47a1;
    margin-right: 12px;
    padding: 6px 12px;
    background-color: #e3f2fd;
    border-radius: 4px;
    transition: background 0.3s;
}
.head a:hover {
    background-color: #bbdefb;
}
.smallbox {
    width: 60px;
    display: inline-block;
}
.button-group {
    text-align: center;
    margin-top: 24px;
}
button {
    padding: 10px 22px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    margin: 0 10px;
    font-weight: 600;
    transition: background 0.3s, transform 0.2s;
}
button[type="submit"] {
    background-color: #1565c0; /* royal blue */
    color: white;
}
button[type="reset"] {
    background-color: #e64a19; /* orange red */
    color: white;
}
button:hover {
    transform: translateY(-2px);
    opacity: 0.95;
}
.hint {
    font-size: 12px;
    color: #555;
    margin-top: 4px;
}

    </style>
</head>
<body>
    <div class="container">
        <h3>*</h3>Denotes Required Information

        <div class="head">
            <a href="">> 1 Donation</a>
            <a href="">> 2 Confirmation</a>
            <a href="">> Thank You!</a>
         </div>
        
        <?php
        $firstName = $lastName = $company = $address1 = $address2 = $city = $state = $zip = $country = "";
        $fax = $email = $donationAmount = $otherAmount = $donationType = $honorMemoryName = $acknowledge = $honorAddress = "";
        $honorCity = $honorState = $honorZip = $pubName = $comments = "";
        $recurring = $monthlyAmount = $months = $anonymous = $matching = $noThankYou = "";
        $contactEmail = $contactPostal = $contactTelephone = $contactFax = $newsEmail = $newsPostal = $anonymous2 = "";
        
        $firstNameErr = $lastNameErr = $address1Err = $cityErr = $stateErr = $zipErr = $countryErr = "";
        $emailErr = $donationAmountErr = $otherAmountErr = $faxErr = $monthlyAmountErr = $monthsErr = "";
        $donationTypeErr = $honorMemoryNameErr = $acknowledgeErr = $honorAddressErr = $honorCityErr = "";
        $honorStateErr = $honorZipErr = $pubNameErr = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["firstName"])) {
                $firstNameErr = "First Name is required";
            } else {
                $firstName = test_input($_POST["firstName"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
                    $firstNameErr = "Only letters and white space allowed";
                }
            }
            
            if (empty($_POST["lastName"])) {
                $lastNameErr = "Last Name is required";
            } else {
                $lastName = test_input($_POST["lastName"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {
                    $lastNameErr = "Only letters and white space allowed";
                }
            }
            
            $company = test_input($_POST["company"]);
            
            if (empty($_POST["address1"])) {
                $address1Err = "Address is required";
            } else {
                $address1 = test_input($_POST["address1"]);
            }
            
            $address2 = test_input($_POST["address2"]);
            
            if (empty($_POST["city"])) {
                $cityErr = "City is required";
            } else {
                $city = test_input($_POST["city"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
                    $cityErr = "Only letters and white space allowed";
                }
            }
            
            if (empty($_POST["state"]) || $_POST["state"] == "") {
                $stateErr = "State is required";
            } else {
                $state = test_input($_POST["state"]);
            }
            
            if (empty($_POST["zip"])) {
                $zipErr = "Zipcode is required";
            } else {
                $zip = test_input($_POST["zip"]);
                if (!preg_match("/^[0-9]*$/", $zip)) {
                    $zipErr = "Only numbers allowed";
                }
            }
            
            if (empty($_POST["country"]) || $_POST["country"] == "") {
                $countryErr = "Country is required";
            } else {
                $country = test_input($_POST["country"]);
            }
            
            $fax = test_input($_POST["fax"]);
            if (!empty($fax) && !preg_match("/^[0-9-]*$/", $fax)) {
                $faxErr = "Invalid fax format";
            }
            
            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }
            
            if (empty($_POST["donationAmount"])) {
                $donationAmountErr = "Donation amount is required";
            } else {
                $donationAmount = test_input($_POST["donationAmount"]);
                if ($donationAmount == "Other" && empty($_POST["otherAmount"])) {
                    $otherAmountErr = "Other amount is required when selecting Other";
                } else if ($donationAmount == "Other" && !empty($_POST["otherAmount"])) {
                    $otherAmount = test_input($_POST["otherAmount"]);
                    if (!is_numeric($otherAmount) || $otherAmount <= 0) {
                        $otherAmountErr = "Other amount must be a positive number";
                    }
                }
            }
            
            if (isset($_POST["recurring"])) {
                $recurring = test_input($_POST["recurring"]);
                
                if (empty($_POST["monthlyAmount"])) {
                    $monthlyAmountErr = "Monthly amount is required for recurring donations";
                } else {
                    $monthlyAmount = test_input($_POST["monthlyAmount"]);
                    if (!is_numeric($monthlyAmount) || $monthlyAmount <= 0) {
                        $monthlyAmountErr = "Monthly amount must be a positive number";
                    }
                }
                
                if (empty($_POST["months"])) {
                    $monthsErr = "Number of months is required for recurring donations";
                } else {
                    $months = test_input($_POST["months"]);
                    if (!is_numeric($months) || $months <= 0) {
                        $monthsErr = "Number of months must be a positive number";
                    }
                }
            }
            
            if (isset($_POST["donationType"])) {
                $donationType = test_input($_POST["donationType"]);
                
                if (empty($_POST["honorMemoryName"])) {
                    $honorMemoryNameErr = "Name is required for honorarium/memorial donation";
                } else {
                    $honorMemoryName = test_input($_POST["honorMemoryName"]);
                    if (!preg_match("/^[a-zA-Z ]*$/", $honorMemoryName)) {
                        $honorMemoryNameErr = "Only letters and white space allowed";
                    }
                }
                
                if (empty($_POST["acknowledge"])) {
                    $acknowledgeErr = "Acknowledge field is required for honorarium/memorial donation";
                } else {
                    $acknowledge = test_input($_POST["acknowledge"]);
                }
                
                if (empty($_POST["honorAddress"])) {
                    $honorAddressErr = "Address is required for honorarium/memorial donation";
                } else {
                    $honorAddress = test_input($_POST["honorAddress"]);
                }
                
                if (empty($_POST["honorCity"])) {
                    $honorCityErr = "City is required for honorarium/memorial donation";
                } else {
                    $honorCity = test_input($_POST["honorCity"]);
                    if (!preg_match("/^[a-zA-Z ]*$/", $honorCity)) {
                        $honorCityErr = "Only letters and white space allowed";
                    }
                }
                
                if (empty($_POST["honorState"]) || $_POST["honorState"] == "") {
                    $honorStateErr = "State is required for honorarium/memorial donation";
                } else {
                    $honorState = test_input($_POST["honorState"]);
                }
                
                if (empty($_POST["honorZip"])) {
                    $honorZipErr = "Zip is required for honorarium/memorial donation";
                } else {
                    $honorZip = test_input($_POST["honorZip"]);
                    if (!preg_match("/^[0-9]*$/", $honorZip)) {
                        $honorZipErr = "Only numbers allowed";
                    }
                }
            }
            
            if (empty($_POST["pubName"])) {
                $pubNameErr = "Publication name is required";
            } else {
                $pubName = test_input($_POST["pubName"]);
            }
            
            $comments = test_input($_POST["comments"]);
            
            if (isset($_POST["anonymous"])) $anonymous = test_input($_POST["anonymous"]);
            if (isset($_POST["matching"])) $matching = test_input($_POST["matching"]);
            if (isset($_POST["noThankYou"])) $noThankYou = test_input($_POST["noThankYou"]);
            if (isset($_POST["contactEmail"])) $contactEmail = test_input($_POST["contactEmail"]);
            if (isset($_POST["contactPostal"])) $contactPostal = test_input($_POST["contactPostal"]);
            if (isset($_POST["contactTelephone"])) $contactTelephone = test_input($_POST["contactTelephone"]);
            if (isset($_POST["contactFax"])) $contactFax = test_input($_POST["contactFax"]);
            if (isset($_POST["newsEmail"])) $newsEmail = test_input($_POST["newsEmail"]);
            if (isset($_POST["newsPostal"])) $newsPostal = test_input($_POST["newsPostal"]);
            if (isset($_POST["anonymous2"])) $anonymous2 = test_input($_POST["anonymous2"]);
        }
        
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2>Donor Information</h2>
            
            <div class="form-group">
                <label for="firstName">First Name <h3>*</h3></label>
                <div class="form-content">
                    <input type="text" id="firstName" name="firstName" value="<?php echo $firstName; ?>">
                    <span class="error"><?php echo $firstNameErr; ?></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="lastName">Last Name <h3>*</h3></label>
                <div class="form-content">
                    <input type="text" id="lastName" name="lastName" value="<?php echo $lastName; ?>">
                    <span class="error"><?php echo $lastNameErr; ?></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="company">Company</label>
                <div class="form-content">
                    <input type="text" id="company" name="company" value="<?php echo $company; ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="address1">Address 1 <h3>*</h3></label>
                <div class="form-content">
                    <input type="text" id="address1" name="address1" value="<?php echo $address1; ?>">
                    <span class="error"><?php echo $address1Err; ?></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="address2">Address 2</label>
                <div class="form-content">
                    <input type="text" id="address2" name="address2" value="<?php echo $address2; ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="city">City <h3>*</h3></label>
                <div class="form-content">
                    <input type="text" id="city" name="city" value="<?php echo $city; ?>">
                    <span class="error"><?php echo $cityErr; ?></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="state">State <h3>*</h3></label>
                <div class="form-content">
                    <select id="state" name="state">
                        <option value="">Select a State</option>
                        <option value="Dhaka" <?php if ($state == "Dhaka") echo "selected"; ?>>Dhaka</option>
                        <option value="Rajshahi" <?php if ($state == "Rajshahi") echo "selected"; ?>>Rajshahi</option>
                        <option value="Khulna" <?php if ($state == "Khulna") echo "selected"; ?>>Khulna</option>
                        <option value="Chittagong" <?php if ($state == "Chittagong") echo "selected"; ?>>Chittagong</option>
                    </select>
                    <span class="error"><?php echo $stateErr; ?></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="zip">Zipcode <h3>*</h3></label>
                <div class="form-content">
                    <input type="text" id="zip" name="zip" value="<?php echo $zip; ?>">
                    <span class="error"><?php echo $zipErr; ?></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="country">Country <h3>*</h3></label>
                <div class="form-content">
                    <select id="country" name="country">
                        <option value="">Select a Country</option>
                        <option value="Bangladesh" <?php if ($country == "Bangladesh") echo "selected"; ?>>Bangladesh</option>
                        <option value="India" <?php if ($country == "India") echo "selected"; ?>>India</option>
                        <option value="US" <?php if ($country == "US") echo "selected"; ?>>US</option>
                        <option value="Maldives" <?php if ($country == "Maldives") echo "selected"; ?>>Maldives</option>
                    </select>
                    <span class="error"><?php echo $countryErr; ?></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="fax">Fax</label>
                <div class="form-content">
                    <input type="text" id="fax" name="fax" value="<?php echo $fax; ?>">
                    <span class="error"><?php echo $faxErr; ?></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="email">Email <h3>*</h3></label>
                <div class="form-content">
                    <input type="text" id="email" name="email" value="<?php echo $email; ?>">
                    <span class="error"><?php echo $emailErr; ?></span>
                </div>
            </div>
            
            <div class="form-group">
                <label>Donation Amount <h3>*</h3></label>
                <div class="form-content">
                    <div class="radio-group">
                        <div class="radio-option">
                            <input type="radio" id="none" name="donationAmount" value="None" <?php if ($donationAmount == "None") echo "checked"; ?>>
                            <label for="none" style="display: inline; font-weight: normal;">None</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="50" name="donationAmount" value="50" <?php if ($donationAmount == "50") echo "checked"; ?>>
                            <label for="50" style="display: inline; font-weight: normal;">$50</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="75" name="donationAmount" value="75" <?php if ($donationAmount == "75") echo "checked"; ?>>
                            <label for="75" style="display: inline; font-weight: normal;">$75</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="100" name="donationAmount" value="100" <?php if ($donationAmount == "100") echo "checked"; ?>>
                            <label for="100" style="display: inline; font-weight: normal;">$100</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="250" name="donationAmount" value="250" <?php if ($donationAmount == "250") echo "checked"; ?>>
                            <label for="250" style="display: inline; font-weight: normal;">$250</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="other" name="donationAmount" value="Other" <?php if ($donationAmount == "Other") echo "checked"; ?>>
                            <label for="other" style="display: inline; font-weight: normal;">Other</label>
                        </div>
                    </div>
                    <span class="error"><?php echo $donationAmountErr; ?></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="otherAmount">
                    <strong>Other Amount $</strong>
                    <small>(Check a button or type your amount)</small>
                </label>
                <div class="form-content">
                    <input type="number" id="otherAmount" name="otherAmount" value="<?php echo $otherAmount; ?>">
                    <span class="error"><?php echo $otherAmountErr; ?></span>
                </div>
            </div>
            
            <div class="form-group">
                <label>Recurring Donation</label>
                <div class="form-content">
                    <input type="checkbox" name="recurring" value="1" <?php if (isset($recurring)) echo "checked"; ?>> I am interested in giving on a regular basis.
                </div>
            </div>
            
            <div class="form-group">
                <label></label>
                <div class="form-content">
                    Monthly Credit Card $<input type="number" class="smallbox" name="monthlyAmount" value="<?php echo $monthlyAmount; ?>"> for <input type="number" class="smallbox" name="months" value="<?php echo $months; ?>"> Months
                    <span class="error"><?php echo $monthlyAmountErr; ?></span>
                    <span class="error"><?php echo $monthsErr; ?></span>
                </div>
            </div>
            
            <h2>Honorarium and Memorial Donation Information</h2>
            
            <div class="form-group">
                <label>I would like to make this donation:</label>
                <div class="form-content">
                    <div class="radio-group">
                        <div class="radio-option">
                            <input type="radio" id="honor" name="donationType" value="honor" <?php if ($donationType == "honor") echo "checked"; ?>>
                            <label for="honor" style="display: inline; font-weight: normal;">To honor</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="memory" name="donationType" value="memory" <?php if ($donationType == "memory") echo "checked"; ?>>
                            <label for="memory" style="display: inline; font-weight: normal;">In memory of</label>
                        </div>
                    </div>
                    <span class="error"><?php echo $donationTypeErr; ?></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="honorMemoryName">Name</label>
                <div class="form-content">
                    <input type="text" id="honorMemoryName" name="honorMemoryName" value="<?php echo $honorMemoryName; ?>">
                    <span class="error"><?php echo $honorMemoryNameErr; ?></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="acknowledge">Acknowledge Donation to</label>
                <div class="form-content">
                    <input type="text" id="acknowledge" name="acknowledge" value="<?php echo $acknowledge; ?>">
                    <span class="error"><?php echo $acknowledgeErr; ?></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="honorAddress">Address</label>
                <div class="form-content">
                    <input type="text" id="honorAddress" name="honorAddress" value="<?php echo $honorAddress; ?>">
                    <span class="error"><?php echo $honorAddressErr; ?></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="honorCity">City</label>
                <div class="form-content">
                    <input type="text" id="honorCity" name="honorCity" value="<?php echo $honorCity; ?>">
                    <span class="error"><?php echo $honorCityErr; ?></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="honorState">State:</label>
                <div class="form-content">
                    <select id="honorState" name="honorState">
                        <option value="">Select a State</option>
                        <option value="Dhaka" <?php if ($honorState == "Dhaka") echo "selected"; ?>>Dhaka</option>
                        <option value="Rajshahi" <?php if ($honorState == "Rajshahi") echo "selected"; ?>>Rajshahi</option>
                        <option value="Khulna" <?php if ($honorState == "Khulna") echo "selected"; ?>>Khulna</option>
                        <option value="Chittagong" <?php if ($honorState == "Chittagong") echo "selected"; ?>>Chittagong</option>
                    </select>
                    <span class="error"><?php echo $honorStateErr; ?></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="honorZip">Zip</label>
                <div class="form-content">
                    <input type="number" id="honorZip" name="honorZip" value="<?php echo $honorZip; ?>">
                    <span class="error"><?php echo $honorZipErr; ?></span>
                </div>
            </div>
            
            <h2>Additional Information</h2>
            <p>Please enter your name, company or organization as you would like it to appear in our publications:</p>
            
            <div class="form-group">
                <label for="pubName">Name</label>
                <div class="form-content">
                    <input type="text" id="pubName" name="pubName" value="<?php echo $pubName; ?>">
                    <span class="error"><?php echo $pubNameErr; ?></span>
                </div>
            </div>
            
            <div class="form-group">
                <label></label>
                <div class="form-content">
                    <input type="checkbox" name="anonymous" value="1" <?php if (isset($anonymous)) echo "checked"; ?>> I would like my gift to remain anonymous. <br>
                    <input type="checkbox" name="matching" value="1" <?php if (isset($matching)) echo "checked"; ?>> My employer offers a matching gift program. I will mail the matching gift form. <br>
                    <input type="checkbox" name="noThankYou" value="1" <?php if (isset($noThankYou)) echo "checked"; ?>> Please save the cost of acknowledging this gift by not mailing a thank you letter. <br>
                </div>
            </div>
            
            <div class="form-group">
                <label for="comments"><strong>Comments</strong><small>(Please type any questions or feedback here)</small></label>
                <div class="form-content">
                    <textarea id="comments" name="comments" rows="4"><?php echo $comments; ?></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <label><strong>How may we contact you?</strong></label>
                <div class="form-content">
                    <div class="checkbox-group">
                        <div class="checkbox-option">
                            <input type="checkbox" name="contactEmail" value="1" <?php if (isset($contactEmail)) echo "checked"; ?>>
                            <label style="display: inline; font-weight: normal;">E-mail</label>
                        </div>
                        <div class="checkbox-option">
                            <input type="checkbox" name="contactPostal" value="1" <?php if (isset($contactPostal)) echo "checked"; ?>>
                            <label style="display: inline; font-weight: normal;">Postal Mail</label>
                        </div>
                        <div class="checkbox-option">
                            <input type="checkbox" name="contactTelephone" value="1" <?php if (isset($contactTelephone)) echo "checked"; ?>>
                            <label style="display: inline; font-weight: normal;">Telephone</label>
                        </div>
                        <div class="checkbox-option">
                            <input type="checkbox" name="contactFax" value="1" <?php if (isset($contactFax)) echo "checked"; ?>>
                            <label style="display: inline; font-weight: normal;">Fax</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <p>I would like to receive newsletters and information about special events by:</p>
            
            <div class="form-group">
                <label></label>
                <div class="form-content">
                    <div class="checkbox-group">
                        <div class="checkbox-option">
                            <input type="checkbox" name="newsEmail" value="1" <?php if (isset($newsEmail)) echo "checked"; ?>>
                            <label style="display: inline; font-weight: normal;">E-mail</label>
                        </div>
                        <div class="checkbox-option">
                            <input type="checkbox" name="newsPostal" value="1" <?php if (isset($newsPostal)) echo "checked"; ?>>
                            <label style="display: inline; font-weight: normal;">Postal Mail</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label></label>
                <div class="form-content">
                    <input type="checkbox" name="anonymous2" value="1" <?php if (isset($anonymous2)) echo "checked"; ?>> I would like my gift to remain anonymous.
                </div>
            </div>
            
            <div class="button-group">
                <button type="reset" value="Reset">Reset</button>
                <button type="submit" value="Continue">Continue</button>
            </div>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $allErrors = array(
                $firstNameErr, $lastNameErr, $address1Err, $cityErr, $stateErr, $zipErr, $countryErr,
                $emailErr, $donationAmountErr, $otherAmountErr, $faxErr, $monthlyAmountErr, $monthsErr,
                $donationTypeErr, $honorMemoryNameErr, $acknowledgeErr, $honorAddressErr, $honorCityErr,
                $honorStateErr, $honorZipErr, $pubNameErr
            );
            
            $hasErrors = false;
            foreach ($allErrors as $error) {
                if (!empty($error)) {
                    $hasErrors = true;
                    break;
                }
            }
            
            if (!$hasErrors) {
                echo "<h2>Donation Submitted Successfully:</h2>";
                echo "Name: " . $firstName . " " . $lastName . "<br>";
                if (!empty($company)) echo "Company: " . $company . "<br>";
                echo "Address: " . $address1 . "<br>";
                if (!empty($address2)) echo "Address 2: " . $address2 . "<br>";
                echo "City: " . $city . "<br>";
                echo "State: " . $state . "<br>";
                echo "Zipcode: " . $zip . "<br>";
                echo "Country: " . $country . "<br>";
                if (!empty($fax)) echo "Fax: " . $fax . "<br>";
                echo "Email: " . $email . "<br>";
                echo "Donation Amount: " . $donationAmount;
                if ($donationAmount == "Other") echo " (" . $otherAmount . ")";
                echo "<br>";
                
                if (isset($recurring)) {
                    echo "Recurring Donation: Yes<br>";
                    echo "Monthly Amount: $" . $monthlyAmount . "<br>";
                    echo "For " . $months . " months<br>";
                }
                
                if (!empty($donationType)) {
                    echo "Donation Type: " . ($donationType == "honor" ? "To honor" : "In memory of") . "<br>";
                    echo "Honoree Name: " . $honorMemoryName . "<br>";
                    echo "Acknowledge to: " . $acknowledge . "<br>";
                    echo "Honoree Address: " . $honorAddress . "<br>";
                    echo "Honoree City: " . $honorCity . "<br>";
                    echo "Honoree State: " . $honorState . "<br>";
                    echo "Honoree Zip: " . $honorZip . "<br>";
                }
                
                echo "Publication Name: " . $pubName . "<br>";
                
                if (!empty($comments)) echo "Comments: " . $comments . "<br>";
                
                if (isset($anonymous)) echo "Anonymous: Yes<br>";
                if (isset($matching)) echo "Matching Gift: Yes<br>";
                if (isset($noThankYou)) echo "No Thank You Letter: Yes<br>";
                
                $contactMethods = array();
                if (isset($contactEmail)) $contactMethods[] = "Email";
                if (isset($contactPostal)) $contactMethods[] = "Postal Mail";
                if (isset($contactTelephone)) $contactMethods[] = "Telephone";
                if (isset($contactFax)) $contactMethods[] = "Fax";
                if (!empty($contactMethods)) echo "Contact Methods: " . implode(", ", $contactMethods) . "<br>";
                
                $newsMethods = array();
                if (isset($newsEmail)) $newsMethods[] = "Email";
                if (isset($newsPostal)) $newsMethods[] = "Postal Mail";
                if (!empty($newsMethods)) echo "Newsletter Methods: " . implode(", ", $newsMethods) . "<br>";
                
                if (isset($anonymous2)) echo "Anonymous Gift: Yes<br>";
            }
        }
        ?>
    </div>
</body>
</html>