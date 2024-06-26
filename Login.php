<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <style>
            body {
                background-image: linear-gradient(rgb(180, 201, 245), white, white);
                text-align: center;
                margin: 0;
                font-family: Arial, sans-serif;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .outer {
                max-width: 90%;
                width: 450px;
                border: 3px double black;
                padding: 20px;
                background-color: white;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                border-radius: 10px;
                text-align: left;
            }
            .one {
                font-size: large;
            }
            .input-field {
                display: flex;
                flex-direction: column;
                margin-bottom: 20px;
            }
            .input-field label {
                margin-bottom: 5px;
            }
            .input-field input {
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
            .buttons {
                display: flex;
                justify-content: space-between;
            }
            .buttons input {
                padding: 10px 20px;
                font-size: 16px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                background-color: #50779f;
                color: white;
                
            }
            .buttons input:hover{
                background-color: #204692;
            }
            a {
                margin-top: 20px;
                font-style: italic;
                text-decoration: none;
                color: #000;
            }
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Velammal College of Engineering and Technology</h1>
            <h3>(Autonomous) Viraganoor, Madurai</h3>
        </header>
        <div class="outer">
            <form action="login.php" method="post" class="one">
                <div class="input-field">
                    <label for="login_id">Login Id:</label>
                    <input type="text" id="login_id" name="login_id" required>
                </div>
                <div class="input-field">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="buttons">
                    <input type="reset" value="Reset">
                    <input type="submit" value="Login">
                </div>
            </form>
        </div>
    </body>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Database connection
            $host = "localhost:3390";
           // $host = "localhost:3307";
            $username = "root";
            $password = "";
          //  $dbname = "harsha";
             $dbname = "test";
                        
            $conn = new mysqli($host, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $login_id = $_POST['login_id'];
            $password = $_POST['password'];

            // Prepare and bind
            $stmt = $conn->prepare("SELECT * FROM users WHERE Login_id = ? AND Password = ?");
            $stmt->bind_param("ss", $login_id, $password);

            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                header("Location: redirect.php?value=" . urlencode($login_id));
            }
            else {
                echo "Invalid login credentials.";
            }
            
            $stmt->close();
            $conn->close();
        }

?>
</html>