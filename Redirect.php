<?php
    if (isset($_GET['value'])) {
        $roll_no = $_GET['value'];
        echo "Received value: " . htmlspecialchars($value);
    }
        // Database connection
        $host = "localhost:3390";
       // $host = "localhost:3307";
        $username = "root";
        $password = "";
        $dbname = "student_profile";
        
        //$dbname = "harsha";
        
        $conn = new mysqli($host, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT * FROM student_personal WHERE Student_Rollno = ?");
        $stmt->bind_param("s", $roll_no);

        echo 'found';
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $stmt->close();
            $conn->close();
            //echo 'found';
            header("Location: Student_view.php?value=" . urlencode($roll_no)); 
            exit();
        } else {
            // Roll number not found
            $stmt->close();
            $conn->close();
            //echo 'not found';
            header("Location: index.html?value=" . urlencode($roll_no)); 
            exit();
        }
    
?>
