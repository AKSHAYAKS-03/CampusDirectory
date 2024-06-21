<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Reset default margin and padding */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif; /* Set a fallback font */
            background-color: #f2f2f2; /* Light gray background */
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Header styles */
        header {
            background-color: lightcyan; /* Green header background */
            color: coralblack; /* White text */
            padding: 10px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: normal;
        }

        header img {
            vertical-align: middle; /* Align the logo vertically with text */
            margin-left: 10px; /* Add space between text and logo */
            border-radius: 50%;
        }

        /* Main content container */
        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
            border-radius: 5px; /* Rounded corners */
        }

        /* Responsive design for smaller screens */
        @media (max-width: 600px) {
            header {
                padding: 15px 0;
            }
            header h1 {
                font-size: 20px;
            }
        }

        .details{
            padding: 20px;
            text-align: center;
            background-color: black ;
            border: 2px solid white;
            color: white;
            cursor: pointer;
            width: 850px;
            border-radius: 10px;
        }

        .det{
            padding: 10px;
        }

        label{
            padding: 20px;
        }

    </style>
</head>
<body>
    <header>
        <h1>Velammal College of Engineering & Technology <img src="logo.jpeg" alt="College Logo" width="60" height="60"></h1>
    </header>

    <div class="container">
        <section>
                <div class="details">Personal Details</div>
                <div class="det">
                    <label for="name">Name:</label>
                    <input type="text" name="name" placeholder="initials at last">

                    <label for="aadhar">Aadhar:</label>
                    <input type="text" name='aadhar' placeholder='ex. 1000 2000 3000'>

                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Email">
                    <br>
                    
                    <label for="name">Phone number:</label>
                    <input type="tel" name="ph" placeholder="ex. 9123456789">

                    <label for="dob">Date of Birth:</label>
                    <input type="date" name="dob" min="" max="" >
                    <br>

                    <label for="name">Gender:</label>
                    <input type="radio" name="gender" value="female">Female
                    <input type="radio" name="gender" value="male">Male
                    
                    <label for="name">Register number:</label>
                    <input type="text" name="reg" placeholder="ex. 9131122100100">
                    <br>
                    <hr>

                    <label for="m_name">Mother Name:</label>
                    <input type="text" name="m_name" placeholder="ex. AAAA S"> 

                    <label for="m_ph">Phone number:</label>
                    <input type="tel" name="m_ph" placeholder="ex. 9123456789">
                    <br>

                    <label for="m_occ">Mother's Ocuupation:</label>
                    <select name="m_occ">
                        <option selected disabled>Select any one</option>
                        <option value="govt">Government</option>
                        <option value="bussiness">Business</option>
                        <option value="private">Private</option>
                        <option value="self">Self-Employed</option>
                        <option value="other">Other</option>
                        <option value="nil">NA</option>
                    </select>    
                    <br>

                    <label for="f_name">Father Name:</label>
                    <input type="text" name="f_name" placeholder="ex. AAAA S"> 

                    <label for="f_ph">Phone number:</label>
                    <input type="tel" name="f_ph" placeholder="ex. 9123456789">
                    <br>

                    <label for="f_occ">Father's Ocuupation:</label>
                    <select name="f_occ">
                        <option selected disabled>Select any one</option>
                        <option value="govt">Government</option>
                        <option value="bussiness">Business</option>
                        <option value="private">Private</option>
                        <option value="self">Self-Employed</option>
                        <option value="other">Other</option>
                        <option value="nil">NA</option>
                    </select>    
                    <br>

                    <label for="income">Income:</label>
                    <input type="number" name="income" placeholder="" min=0>
                    <br>

                    <label for="tongue">Mother Tongue:</label>
                    <select name="tongue">
                        <option value="tamil">Tamil</option>
                        <option value="hindi">Hindi</option>
                        <option value="malayalam">Malayalam</option>
                        <option value="telegu">Telegu</option>
                        <option value="kannadam">Kannadam</option>
                        <option value="english">English</option>
                        <option value="other">Other</option>
                    </select>    

                    <label for="lang">Languages Known:</label>
                    <option selected disabled>Select any one</option>
                    Tamil<input type="checkbox" name="lang" value="tamil">
                    English<input type="checkbox" name="lang" value="english">
                    Hindi<input type="checkbox" name="lang" value="hindi">
                    Malayalam<input type="checkbox" name="lang" value="malayalam">
                    Telugu<input type="checkbox" name="lang" value="telugu">
                    Kannadam<input type="checkbox" name="lang" value="kannadam">
                    <br>

                    <label for="addr">Address:</label>
                    <textarea name="addr" rows=4 cols=50></textarea>
                    <br>

                    <label for="native">Native:</label>
                    <input type="text" name='native'>
                    <label for="pin">Pin code:</label>
                    <input type="text" name='pin' placeholder='ex. 600001'>
                    <br>

                    <label for="doj">Date of Join:</label>
                    <input type="date" name='doj'>

                    <label for="mode">Mode of Study:</label>
                    <input type="radio" name='mode' value="day_schlr">Day-Scholar
                    <input type="radio" name="mode" value="hostel">Hostelite
                    <br>

                    <label for="trans">Transport</label>
                    <select name="trans">
                        <option selected disabled>Select any one</option>
                        <option value="c_bus">College Bus</option>
                        <option value="self">Self</option>
                        <option value="other">Others</option>
                    </select> 
                    <br>
                    
                    <label for="grad">First Graduate:</label>
                    <input type="radio" name='grad' value="yes">Yes
                    <input type="radio" name="grad" value="no">No

                    <label for="quota">Quota</label>
                    <input type="radio" name='grad' value="gq">General 
                    <input type="radio" name="grad" value="mq">Management
                    <br>

                    <label for="community">Community:</label>
                    <select name="community">
                        <option selected disabled>Select any one</option>
                        <option value="OC">OC</option>
                        <option value="BC">BC</option>
                        <option value="MBC">MBC</option>
                        <option value="SC">SC</option>
                        <option value="ST">ST</option>
                        <option value="DNC">DNC</option>
                        <option value="other">Others</option>
                    </select>

                    <label for="caste">Caste:</label>
                    <input type="text" name='caste'>
                    <br>

                    <label for="schlr">Scholarship Name:</label>
                    <input type="text" name="schlr" value="nil" placeholder="if applied for any external scholarship, mention">

                    <label for="p_chl">Physically Challenged:</label>
                    <input type="radio" name='p_chl' value="yes">Yes
                    <input type="radio" name="p_chl" value="no">No
                    <br>

                    <label for="vacc">Double Vaccinated:</label>
                    <input type="radio" name='vacc' value="yes">Yes
                    <input type="radio" name="vacc" value="no">No
                    
                    <label for="treat">Under any Treatment?</label>
                    <input type="radio" name='treat' value="yes">Yes
                    <input type="radio" name="treat" value="no">No
                    <br>

                </div>           
        </section>

        <section>
                <div class="details">Academic</div>
                <div class="det">
                    <input type="text" name="name" placeholder="Name">
                </div>
        </section>

        <section>
                <div class="details">Extra - Curricular</div>
                <div class="det">
                    <input type="text" name="name" placeholder="Name">
                </div>
        </section>

        <script>
           $(document).ready(function() {
            $(".details").click(function() {
                // Toggle the corresponding details-content
                $(this).next(".det").slideToggle();
            });
        });
        </script>
    </div>
</body>
</html>

