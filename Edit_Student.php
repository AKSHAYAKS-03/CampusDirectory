<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student View</title>

    <!-- CSS -->
    <link rel="stylesheet" href="Student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <script src="student.js"></script>
    <!-- Inline Styles -->
    <style>
        #generate-pdf, #edit {
            background-color: rgb(95, 158, 164); /* Button background color */
            color: #fff; /* Text color */
            border: none; /* Remove default border */
            padding: 15px 30px; /* Button padding */
            font-size: 16px; /* Font size */
            font-weight: bold; /* Bold text */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
            transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transition */
            margin-top: 20px; /* Space above the button */
            display: inline-block; /* Inline-block display */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        #generate-pdf:hover, #edit:hover {
            background-color: #2980b9; /* Darker background on hover */
            transform: translateY(-2px); /* Slight lift on hover */
        }

        #generate-pdf:active, #edit:active {
            background-color: #1a5a79; /* Even darker background on click */
            transform: translateY(0); /* Remove lift on click */
        }

        #generate-pdf:focus, #edit:focus {
            outline: none; /* Remove default focus outline */
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.5); /* Custom focus outline */
        }
    </style>
</head>
<body>
    <header>
        <h1><b>Velammal College of Engineering & Technology</b> <img src="logo.jpeg" alt="College Logo" width="60" height="60"></h1>
    </header>
    <h2>Submitted Data</h2>


<?php

    // Enable error reporting for debugging
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

// Database connection parameters
    $host = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "student_profile"; // Replace with your actual database name

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

  /*  function getLookupId($mysqli, $category, $value) {
        $stmt = $mysqli->prepare("SELECT LookUpTypeName FROM lookUp WHERE LookUpId like ? AND LookUpTypeId = ?");
        if (!$stmt) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
            return null;
        }
    
        if (!$stmt->bind_param("ss", $category, $value)) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            return null;
        }
    
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return null;
        }
    
        $lookupid = null;
        if (!$stmt->bind_result($lookupid)) {
            echo "Binding result failed: (" . $stmt->errno . ") " . $stmt->error;
            return null;
        }
    
        if (!$stmt->fetch()) {
            echo "Fetching result failed: (" . $stmt->errno . ") " . $stmt->error;
            // If fetch fails, it could mean no result was found.
            // You might want to handle this case differently depending on your needs.
            return null;
        }
    }
    */



    // Retrieve data from the database
    if (isset($_GET['value'])) {
        $rollno = $_GET['value'];
        echo $rollno;

        

        

        $name = $mailid = $mentorid = $genderid = $dob =$fname =$fph = $foccup = $fannum= $phn = $regno = $mname = $mph = $moccup = $mtongue = $langid = $addr = $pin = $native = $doj = $modeid = $transid = $aadhar = $firstgradid = $commid = $caste = $quotaid = $scholar = $physicid = $treatmentid = $vaccinateid = ''; // Initialize variables
        $stmt = $conn->prepare("SELECT Student_Rollno, Student_Mailid, Student_Name, Student_Mentor_ID, 
        Student_Gender_ID, Student_DOB, Student_FatherName, Student_Father_PH, Student_Father_Occupation_ID, 
        Student_Father_AnnualIncome, Student_PH, Student_Register_Numbe, Student_MotherName, 
        Student_Mother_PH, Student_Mother_Occupation_ID, Student_Mother_Tongue_ID, Student_Languages_Known, 
        Student_Address, Student_Pincode, Student_Native, Student_Date_Of_Join, Student_Mode_ID, 
        Student_Transport_ID, Student_Aadhar, Student_First_Graduate_ID, Student_Community_ID, 
        Student_Caste, Student_Quota_ID, Student_Scholarship_Name, Student_PhysicallyChallenged_ID, 
        Student_Treatment_ID, Student_Vaccinated_ID
        FROM student_personal WHERE Student_Rollno = ?");
        
        $stmt->bind_param("s", $rollno);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['Student_Name'];
            $mailid = $row['Student_Mailid'];
            $mentorid = $row['Student_Mentor_ID'];
            $genderid = $row['Student_Gender_ID'];
            $dob = $row['Student_DOB'];
            $fname = $row['Student_FatherName'];
            $fph = $row['Student_Father_PH'];
            $foccup = $row['Student_Father_Occupation_ID'];
            $fannum = $row['Student_Father_AnnualIncome'];
            $phn = $row['Student_PH'];
            $regno = $row['Student_Register_Numbe'];
            $mname = $row['Student_MotherName'];
            $mph = $row['Student_Mother_PH'];
            $moccup = $row['Student_Mother_Occupation_ID'];
            $mtongue = $row['Student_Mother_Tongue_ID'];
            $langid = $row['Student_Languages_Known'];
            $addr = $row['Student_Address'];
            $pin = $row['Student_Pincode'];
            $native = $row['Student_Native'];
            $doj = $row['Student_Date_Of_Join'];
            $modeid = $row['Student_Mode_ID'];
            $transid = $row['Student_Transport_ID'];
            $aadhar = $row['Student_Aadhar'];
            $firstgradid = $row['Student_First_Graduate_ID'];
            $commid = $row['Student_Community_ID'];
            $caste = $row['Student_Caste'];
            $quotaid = $row['Student_Quota_ID'];
            $scholar = $row['Student_Scholarship_Name'];
            $physicid = $row['Student_PhysicallyChallenged_ID'];
            $treatmentid = $row['Student_Treatment_ID'];
            $vaccinateid = $row['Student_Vaccinated_ID'];   

           /* $first_graduate_id = getLookupId($conn, 'Yes or No', $firstgradid);
            $physically_challenged_id = getLookupId($conn, 'Yes or No', $physicid);
            $double_vaccinated_id = getLookupId($conn, 'Yes or No', $vaccinateid);
            $under_treatment_id = getLookupId($conn, 'Yes or No', $treatmentid);
            $community_id = getLookupId($conn, 'Community', $commid);
            $gender_id = getLookupId($conn, 'Gender', $genderid);
            $m_occupation_id = getLookupId($conn, 'Occupation', $moccup);
            $f_occupation_id = getLookupId($conn, 'Occupation', $foccup);
            $mother_tongue_id = getLookupId($conn, 'Mother Tongue', $mtongue);
            $mode_of_study_id = getLookupId($conn, 'Mode of Study', $modeid);
            $transport_id = getLookupId($conn, 'Transport', $transid);
            $quota_id = getLookupId($conn, 'Quota', $quotaid);*/
         
        } 
        
        
        
        
        else {
            echo "No data found for Rollno: $rollno";
            exit();
        }
         // Close statement and connection
    $stmt->close();
}


         $acdtype = $instname = $acd_regno = $modeOfStudy = $modeOfMedium = $board = $marksObtained = $totalMarks = $percentage = $cutOff = ''; // Initialize variables
        $stmt = $conn->prepare("SELECT Student_Rollno, Academic_Type_ID, Institution_Name, Register_Number, Mode_Of_Study_ID,
        Mode_Of_Medium_ID, Board_ID, Mark, Mark_Total, Mark_Percentage, Cut_Of_Mark
           FROM student_academics WHERE Student_Rollno = ?");
        $stmt->bind_param("s", $rollno);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $acdtype = $row['Academic_Type_ID'];
            $instname = $row['Institution_Name'];
            $acd_regno = $row['Register_Number'];
            $modeOfStudy = $row['Mode_Of_Study_ID'];
            $modeOfMedium = $row['Mode_Of_Medium_ID'];
            $board = $row['Board_ID'];
            $marksObtained = $row['Mark'];
            $totalMarks = $row['Mark_Total'];
            $percentage = $row['Mark_Percentage'];
            $cutOff = $row['Cut_Of_Mark'];            
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
}


    $hobbies = $proglang = $others = $interest = $dreamcomp = $ambition = ''; // Initialize variables
    $stmt = $conn->prepare("SELECT Student_Rollno, Student_Hobbies, Student_Programming_Language,
    Student_Others, Student_Interest, Student_DreamCompany,
    Student_Ambition FROM student_extracurriculars WHERE Student_Rollno = ?");

    $stmt->bind_param("s", $rollno);

    if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hobbies = $row['Student_Hobbies'];
        $proglang = $row['Student_Programming_Language'];
        $others = $row['Student_Others'];
        $interest = $row['Student_Interest'];
        $dreamcomp = $row['Student_DreamCompany'];
        $ambition = $row['Student_Ambition'];                    
    } else {
    echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    }

    $conn->close();
    }
    else {
    echo "No rollno provided.";
    exit();
    }
    ?>


    <form id="editform" action="Update_Student.php" method="post">
    <div class="container">
        <section id="personal-info">
            <div class="details"><h3>Personal Details</h3></div>
            <div class="det">
                <div class="input-group">
                    <label for="name">Name:</label><label for="aadhar" style="margin-left: 300px;">Aadhar:</label>
                    <br> 
                    <input type="text" id="name" name="name" placeholder="initials at last ex. Aaaa S or Aaaa S.B" style="width: 300px;" value="<?php echo htmlspecialchars($name); ?>" required>            
                    <input type="text" name="aadhar" placeholder="ex. 1000 2000 3000" style="width: 250px ; margin-left: 125px;" value="<?php echo htmlspecialchars($aadhar); ?>" required>
                </div>
                <br>

                <div class="input-group">
                    <label for="email">Email:</label> <label for="ph" style="margin-left: 295px;">Phone number:</label>
                    <br>
                    <input type="email" name="email" placeholder="Email" style="width: 250px ;" value="<?php echo htmlspecialchars($mailid); ?>" required>
              
                    <input type="tel" name="ph" placeholder="ex. 9123456789" style="width: 250px ;margin-left: 175px;" value="<?php echo htmlspecialchars($phn); ?>" required>
                </div>
                <br>
                <div class="input-group">
                    <label for="dob">Date of Birth:</label> <label for="gender" style="margin-left: 295px;">Gender:</label><br>
                    <input type="date" name="dob" style="width: 200px;" value="<?php echo htmlspecialchars($dob); ?>" required> 
                
                  
                    <input type="radio" name="gender" value="2"  id="gender-female" style="margin-left: 228px;" required>
                    <label class="radio-label" for="gender">Female</label>
                    <input type="radio" name="gender" value="1" id="gender-male" style="margin-left: -30px;" required>
                    <label class="radio-label" for="gender">Male</label>
                </div>
                <br>

                <div class="input-group">
                    <label for="reg">Register number:</label><br>
                    <div class="fixed-input">
                        <span class="fixed-text">9131</span>
                        <input type="text" id="reg" name="reg" placeholder="ex. 22100100" value="<?php echo htmlspecialchars($regno); ?>">
                    </div>
                </div>
                <br>

                <div class="input-group">
                    <label for="m_name">Mother Name:</label>  <label for="m_ph" style="margin-left: 130px;">Phone number:</label><label for="m_occ" style="width: 250px;margin-left: 120px;">Mother's Occupation:</label>
                    <br>
                    <input type="text" name="m_name" placeholder="ex. Aaaa S or Aaaa S.B" style="width:200px;" value="<?php echo htmlspecialchars($mname); ?>" required >
                
                    <input type="tel" name="m_ph" placeholder="ex. 9123456789" style="width: 200px ;margin-left: 60px;" value="<?php echo htmlspecialchars($mph); ?>" required> 
                    <select name="m_occ" style="width: 200px;margin-left: 50px;" value="<?php echo htmlspecialchars($mocc); ?>" required>
                        <option selected disabled>Select any one</option>
                        <option value="1">Government</option>
                        <option value="2">Business</option>
                        <option value="3">Private</option>
                        <option value="4">Self-Employed</option>
                        <option value="5">Other</option>
                        <option value="6">NA</option>
                    </select>
                </div>
                <br>
             
                <br>
                <div class="input-group" required>
                    <label for="f_name">Father Name:</label>  <label for="f_ph" style="margin-left: 130px;">Phone number:</label> <label for="f_occ" style="width: 250px;margin-left: 120px;">Father's Occupation:</label>

                    <br>
                    <input type="text" name="f_name" placeholder="ex. Aaaa S or Aaaa S.B" style="width:200px;" value="<?php echo htmlspecialchars($fname); ?>" required>
                    <input type="tel" name="f_ph" placeholder="ex. 9123456789" style="width: 200px ;margin-left: 60px;" value="<?php echo htmlspecialchars($fph); ?>" required>
              
                    <select name="f_occ" style="width: 200px;margin-left: 50px;" value="<?php echo htmlspecialchars($focc); ?>" required>
                        <option selected disabled>Select any one</option>
                        <option value="1">Government</option>
                        <option value="2">Business</option>
                        <option value="3">Private</option>
                        <option value="4">Self-Employed</option>
                        <option value="5">Other</option>
                        <option value="6">NA</option>
                    </select>
                </div>
                <br>
                <div class="input-group">
                    <label for="income">Annual Income:</label><label for="tongue"  style="margin-left: 130px;">Mother Tongue:</label><br>

                    <input type="number" name="income" placeholder="" min=0 style="width: 150px ;" value="<?php echo htmlspecialchars($fannum); ?>" required>
               
                    <select name="tongue" style="width: 200px ;margin-left: 110px;" value="<?php echo htmlspecialchars($tongue); ?>">
                        <option selected disabled>Select any one</option>

                        <option value="1">Tamil</option>
                        <option value="2">Hindi</option>
                        <option value="3">Malayalam</option>
                        <option value="4">Telugu</option>
                        <option value="5">Kannada</option>
                        <option value="6">English</option>
                        <option value="7">Other</option>
                    </select>
                </div>
                <br>
                <div class="input-group">  <!--value="<?php echo htmlspecialchars($name); ?>"-->
                    <label for="lang">Languages Known: </label> <span id="errr"></span>
                    <br>
                    <div class="row1" style="display: flex; flex-direction: row" >
                    <label class="bold-label" ><input type="checkbox" name="lang[]" value="tamil" >Tamil</label>
                    <label class="bold-label" ><input type="checkbox" name="lang[]" value="english" style="margin-left: -40px;">English</label>
                    <label class="bold-label" ><input type="checkbox" name="lang[]" value="hindi" style="margin-left: -80px;">Hindi</label>
                    </div>
                    <div class="row2" style="display: flex; flex-direction: row" >

                    <label class="bold-label" ><input type="checkbox" name="lang[]" value="malayalam" >Malayalam</label>
                    <label class="bold-label" ><input type="checkbox" name="lang[]" value="telugu" style="margin-left: -40px;">Telugu</label>
                    <label class="bold-label" ><input type="checkbox" name="lang[]" value="kannada" style="margin-left: -80px;">Kannada</label>
                    </div>

                </div>
                <br>

                <div class="input-group">
                    <label for="addr">Address:</label>
                    <textarea name="addr" rows="4" cols="50" value="<?php echo htmlspecialchars($addr); ?>" required></textarea>
                </div>
                <br>
                <div class="input-group">
                    <label for="native">Native:</label><label for="pin" style="width: 250px ;margin-left: 295px;">Pin code:</label>
                    <br>
                    <input type="text" name="native" style="width: 250px" value="<?php echo htmlspecialchars($native); ?>" required>
                    <input type="text" name="pin" placeholder="ex. 600001" style="width: 150px ;margin-left: 175px;" value="<?php echo htmlspecialchars($pin); ?>" required>
                </div>
                
                <br>
                <div class="input-group">
                    <!--value="<?php echo htmlspecialchars($name); ?>"-->
                    <label for="doj">Date of Join:</label><label for="mode" style="margin-left: 295px;">Mode of Study:</label><br>

                    <input type="date" name="doj" style="width: 150px;" required>
           
                    <input type="radio" name="mode" value="1" required style="margin-left: 270px;">
                    <label class="radio-label" for="mode">Day-Scholar</label>
                    <input type="radio" name="mode" value="2" required style="margin-left: -30px;">
                    <label class="radio-label" for="mode">Hostelite</label>
                </div>
                <br>

                <div class="input-group">
                    <label for="trans">Transport:</label>
                    <select name="trans" style="width: 250px ;" value="<?php echo htmlspecialchars($trans); ?>" required>
                        <option selected disabled>Select any one</option>
                        <option value="1">College Bus</option>
                        <option value="2">Self</option>
                        <option value="3">Others</option>
                        <option value="4">NA (if hostel)</option>
                    </select>
                </div>
                <br>

                <div class="input-group">
                    <label for="first_graduate">First Graduate:</label><label for="quota" style="margin-left: 295px;">Quota:</label><br>

                    <input type="radio" name="first_graduate" value="1" style="margin-left: -1px;" required>
                    <label class="radio-label" for="first_graduate">Yes</label>
                    <input type="radio" name="first_graduate" value="2" style="margin-left: -80px;" required>
                    <label class="radio-label" for="first_graduate">No</label>
              
                    <input type="radio" name="quota" value="1" style="margin-left: 180px;" required>
                    <label class="radio-label" for="quota">General</label>
                    <input type="radio" name="quota" value="2" style="margin-left: -50px;" required>
                    <label class="radio-label" for="quota">Management</label>
                </div>
                <br>
                <div class="input-group">
                    <label for="community">Community:</label>  <label for="caste"  style="width: 250px ;margin-left: 295px;">Caste:</label>
                     <br>
                    <select name="community" style="width: 250px" value="<?php echo htmlspecialchars($commid); ?>" required>
                        <option selected disabled>Select any one</option>
                        <option value="1">OC</option>
                        <option value="2">BC</option>
                        <option value="3">MBC</option>
                        <option value="4">SC</option>
                        <option value="5">ST</option>
                        <option value="6">DNC</option>
                        <option value="7">Others</option>
                    </select>

                    <input type="text" name="caste"  style="width: 200px ;margin-left: 195px;" value="<?php echo htmlspecialchars($caste); ?>" required>
                </div>
                <br>

                <div class="input-group">
                    <label for="schlr">Scholarship Name:</label><br>
                    <input type="text" name="schlr" placeholder="if applied for any external scholarship, mention"  value="<?php echo htmlspecialchars($scholar); ?>"style="width: 500px;">
                </div>
                <br>
                <div class="input-group">
                    <label for="physically_challenged" style="width: 250px;">Physically Challenged:</label>
                    <input type="radio" name="physically_challenged" value="1" required style="margin-left: -1px">
                    <label class="radio-label" for="physically_challenged">Yes</label>
                    <input type="radio" name="physically_challenged" value="2" required style="margin-left: -50px">
                    <label class="radio-label" for="physically_challenged">No</label>
                </div>
                <br>

                <div class="input-group">
                    <label for="vaccinated" style="width: 250px;">Double Vaccinated:</label>
                    <input type="radio" name="vaccinated" value="1" required style="margin-left: -1px">
                    <label class="radio-label" for="vaccinated">Yes</label>
                    <input type="radio" name="vaccinated" value="2" required style="margin-left: -50px">
                    <label class="radio-label" for="vaccinated">No</label>
                </div>
                <br>

                <div class="input-group" >
                    <label for="under_any_treatment" style="width: 250px;">Under any Treatment?</label>
                    <input type="radio" name="under_any_treatment" value="1" required style="margin-left: -1px">
                    <label class="radio-label" for="under_any_treatment">Yes</label>
                    <input type="radio" name="under_any_treatment" value="2" required style="margin-left: -50px">
                    <label class="radio-label" for="under_any_treatment">No</label>
                </div>
                <br>
            </div>
        </section>
        <br>
        <section id="academic-details">
            <div class="details"><h3>Academic</h3></div>
            <div class="det">
                    <div class="input-group">
                        <label for="acad_type">Academic Type:</label>
                        <select id="acad_type" name="acad_type" style="width: 250px" value="<?php echo htmlspecialchars($acad_type); ?>"   required>
                            <option selected disabled value="">Select any one</option>
                            <option value="SSLC">SSLC</option>
                            <option value="HSC">HSC</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="inst_name">Institution Name:</label>
                        <input type="text" id="inst_name" name="inst_name" placeholder="Name" value="<?php echo htmlspecialchars($instname); ?>" disabled required>
                    </div>
                    
                    <div class="input-group">
                        <label for="acd_reg_no">Register Number:</label>
                        <input type="text" id="acd_reg_no" name="acd_reg_no" placeholder="" style="width: 180px" value="<?php echo htmlspecialchars($acd_regno); ?>"  disabled required>
                    </div>

                    <div class="input-group">
                        <label for="mode_of_study">Mode Of Study:</label>
                        <select id="mode_of_study" name="mode_of_study" style="width: 180px" value="<?php echo htmlspecialchars($modeOfStudy); ?>"  disabled required>
                            <option selected disabled value="">Select any one</option>
                            <option value="Full-Time">Full-Time</option>
                            <option value="Part-Time">Part-Time</option>
                        </select>
                        <label for="mode_of_medium" style="margin-left: 60px;">Mode Of Medium:</label>
                        <select id="mode_of_medium" name="mode_of_medium" style="width: 180px" value="<?php echo htmlspecialchars($modeOfMedium); ?>" disabled required>
                            <option selected disabled value="">Select any one</option>
                            <option value="English">English</option>
                            <option value="Tamil">Tamil</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="board">Board:</label>
                        <select id="board" name="board" style="width: 200px" value="<?php echo htmlspecialchars($board); ?>" disabled required>
                            <option selected disabled value="">Select any one</option>
                            <option value="CBSE">CBSE</option>
                            <option value="State_Board">State Board</option>
                            <option value="Matric">Matric</option>
                            <option value="ICSE">ICSE</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="marks_obtained">Marks Obtained:</label>
                        <input type="number" id="marks_obtained" name="marks_obtained" placeholder="ex.400" style="width: 90px" min="0" value="<?php echo htmlspecialchars($marksObtained); ?>" disabled required>
                        /
                        <input type="number" id="total_marks" name="total_marks" placeholder="ex.500" style="width: 90px;" min="0" value="<?php echo htmlspecialchars($totalMarks); ?>" disabled required>
                    </div>
                    <div class="input-group">
                        <label for="percentage">Percentage:</label>
                        <label for="cut_off" style="margin-left: 250px;">Cut-Off:</label>
                        <br>
                        <input type="number" id="percentage" name="percentage" placeholder="ex.90.05" style="width: 120px" min="0" max="100" step="0.01" value="<?php echo htmlspecialchars($percentage); ?>" disabled required>
                        <input type="number" id="cut_off" name="cut_off" placeholder="ex.150.7" style="width: 120px;margin-left: 265px;" min="0" max="200"  value="<?php echo htmlspecialchars($cutOff); ?>"disabled required>
                    </div>
                    <input type="hidden" id="storedData" name="storedData">
                    <button id="submitBtn" type="button">Done</button>
                    <br><br>
            </div>
        </section>
        <br>    
        
        <section id="extra-curr">
            <div class="details"><h3>Extra - Curricular</h3></div>
            <div class="det">
                <div class="input-group">
                    <label for="Hobbies">Hobbies:</label><br>
                    <textarea id="Hobbies" name="hobbies" rows="2" cols="30" style="width: 450px" <?php echo htmlspecialchars($hobbies); ?>></textarea>
                </div>
                <div class="input-group" style="display: -webkit-flex;">
                    <label for="Certification_Courses" style="width: 250px">Certification Courses: </label><br>
            
                    <div class="input-row" >
                        <label for="Programming_Language" style="width: 250px;font-size: 14px;margin-top: 40px;">Programming Language: </label>
                        <div class="input-Programming_Language">
                            <input type="text" id="Programming_Language" name="Programming_Language[]" placeholder="" style="width: 200px;display: flex;flex-direction: column;" value="<?php echo htmlspecialchars($proglang); ?>">
                            <i id="addProgrammingLanguage" class="fas fa-plus icon" style="margin-left:5px" ></i>
                    </div>
                    </div>
                    
                    <div class="input-row">
                        <label for="Other_Courses" style="width: 250px;font-size: 14px;margin-left: 20px;margin-top: 40px;">Other Courses: </label>
                        <div class="input-Other_Courses" >
                            <input type="text" id="Other_Courses" name="Other_Courses[]" placeholder="" style="width: 200px;display: flex;flex-direction: column;" value="<?php echo htmlspecialchars($others); ?>">
                            <i id="addOtherCourses" class="fas fa-plus icon" style="margin-left: 5px"></i>
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <label for="Interest">Interests:</label><br>
                    <textarea id="Interest" name="interests" rows="4" cols="30" style="width: 450px" value="<?php echo htmlspecialchars($interest); ?>"required></textarea>
                </div>
                <div class="input-group">
                    <label for="Dream_Company" style="width: 200px"> Dream Company: </label><br>
                    <div class="input-Dream_Company" style="display: flex;flex-direction: column;">
                    <input type="text" id="Dream_Company" name="Dream_Company[]" placeholder="" style="width: 200px" value="<?php echo htmlspecialchars($dreamcomp); ?>"><i id="addDream_Company" class="fas fa-plus icon" style="margin-left: 5px"></i>              
                    </div>
                </div>

                <div class="input-group">
                    <label for="Ambition">Ambition:</label><br>
                    <textarea id="Ambition" name="ambition" rows="4" cols="30" style="width: 450px" value="<?php echo htmlspecialchars($ambition); ?>" required></textarea>
                </div>
            </div>
        </section><br>
        <center><input type="submit" value="Update" class="submit-button"></center>
        <input type="hidden" id="roll_no" name="roll_no" value="">
    </div>
    </form>

</body>
</html>
