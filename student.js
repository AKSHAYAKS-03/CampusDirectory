document.addEventListener("DOMContentLoaded", function() {

    console.log(" fully loaded and parsed");
    var form = document.getElementById("form");
    var finalSubmitBtn = document.getElementById("FinalSubmit");
    var editSubmitBtn = document.getElementById("EditSubmit");

     //personal validation
    // (address, radio, doj, dob, income, native)--> required* schlrship--> optional

    var name = document.getElementsByName("name")[0];
    var email = document.getElementsByName("email")[0];
    var ph = document.getElementsByName("ph")[0];
    var aadhar = document.getElementsByName("aadhar")[0];
    var dob = document.getElementsByName("dob")[0];
    var reg = document.getElementsByName("reg")[0];
    var m_name = document.getElementsByName("m_name")[0];
    var m_ph = document.getElementsByName("m_ph")[0];
    var m_occ = document.getElementsByName("m_occ")[0];
    var f_name = document.getElementsByName("f_name")[0];
    var f_ph = document.getElementsByName("f_ph")[0];
    var f_occ = document.getElementsByName("f_occ")[0];
    var income = document.getElementsByName("income")[0];
    var tongue = document.getElementsByName("tongue")[0];
    var lang = document.getElementsByName('lang[]');
    var addr = document.getElementsByName("addr")[0];
    var native = document.getElementsByName("native")[0];
    var pin = document.getElementsByName("pin")[0];
    var doj = document.getElementsByName("doj")[0];
    var mode = document.getElementsByName("mode")[0];
    var trans = document.getElementsByName("trans")[0];
    var community = document.getElementsByName("community")[0];
    var caste = document.getElementsByName("caste")[0];


    var today = new Date(); //max date -> 15 yrs ago from tdy (refer)
    var year = today.getFullYear();
    var month = today.getMonth() + 1; 
    var day = today.getDate();
    var mm = month < 10 ? '0' + month : month;
    var dd = day < 10 ? '0' + day : day;

    var maxDate_dob = (year-15) + '-' + mm + '-' + dd;
    document.getElementsByName("dob")[0].setAttribute('max', maxDate_dob);

    var maxDate_doj = year + '-' + mm + '-' + dd;
    document.getElementsByName("doj")[0].setAttribute('max', maxDate_doj);



    var pattern_name = /^[A-Za-z]{2,}(?: [A-Za-z ]+)? [A-Za-z]{1}(?:[ .]?[A-Za-z]{1})?$/;    
    var pattern_ph = /^[0-9]{10}$/;
    var pattern_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;
    var pattern_aadhar = /^[0-9]{4} [0-9]{4} [0-9]{4}$/;
    var pattern_pin = /^[0-9]{6}$/;

    name.addEventListener("change", function() {
        var name_value = name.value.trim();
        if(!name_value.match(pattern_name)) 
            name.style.borderColor = "red";
        else 
            name.style.borderColor = ""; 
        console.log("Name changed:", name.value);
    });

    email.addEventListener("change", function() {
        if(!pattern_email.test(email.value))
            email.style.borderColor = "red";
        else
            email.style.borderColor = "";
        console.log("Email changed:", email.value);
    });

    ph.addEventListener("change", function() {
        if(!ph.value.match(pattern_ph))
            ph.style.borderColor = "red";
        else
            ph.style.borderColor = "";
        console.log("Phone number changed:", ph.value);
    });

    aadhar.addEventListener("change", function() {
        if(!pattern_aadhar.test(aadhar.value))
            aadhar.style.borderColor = "red";
        else
            aadhar.style.borderColor = "";
        console.log("Aadhar number changed:", aadhar.value);
    });

    dob.addEventListener("change", function() {        
        console.log("Date of Birth changed:", dob.value);
        dob.style.borderColor = "";

    });

    reg.addEventListener("change", function() {
        var reg_value = reg.value.trim();
        if(reg_value.length!==8 && reg_value!=='') 
            reg.style.borderColor = "red";
        else 
            reg.style.borderColor = "";
        console.log("Register number changed:", reg.value);
    });

    m_name.addEventListener("change", function() {
        var m_name_value = m_name.value.trim();
        if(!m_name_value.match(pattern_name)) 
            m_name.style.borderColor = "red";
        else 
            m_name.style.borderColor = ""; 
        console.log("Mother's name changed:", m_name.value);
    });

    m_ph.addEventListener("change", function() {
        if(!m_ph.value.match(pattern_ph))
            m_ph.style.borderColor = "red";
        else
            m_ph.style.borderColor = "";
        console.log("Mother's phone number changed:", m_ph.value);
    });

    f_name.addEventListener("change", function() {
        var f_name_value = f_name.value.trim();
        if(!f_name_value.match(pattern_name)) 
            f_name.style.borderColor = "red";
        else 
            f_name.style.borderColor = ""; 
        console.log("Father's name changed:", f_name.value);
    });

    f_ph.addEventListener("change", function() {
        if(!f_ph.value.match(pattern_ph))
            f_ph.style.borderColor = "red";
        else
            f_ph.style.borderColor = "";
        console.log("Father's phone number changed:", f_ph.value);
    });

    income.addEventListener("change", function() {
        income.style.borderColor="";
        console.log("Annual income changed:", income.value);
    });

    native.addEventListener("change", function() {
        native.style.borderColor="";
        console.log("Native place changed:", native.value);
    });

    pin.addEventListener("change", function() {
        if(!pattern_pin.test(pin.value))
            pin.style.borderColor = "red";
        else
            pin.style.borderColor = "";
        console.log("Pin code changed:", pin.value);
    });

    doj.addEventListener("change", function() {
        doj.style.borderColor = "";
        console.log("Date of Join changed:", doj.value);
    });

    m_occ.addEventListener("change", function() {
        m_occ.style.borderColor = "";
        console.log("Mother's occupation changed:", m_occ.value);
    });

    f_occ.addEventListener("change", function() {
        f_occ.style.borderColor = "";
        console.log("Father's occupation changed:", f_occ.value);
    });


    tongue.addEventListener("change", function() {
        tongue.style.borderColor = "";
        console.log("Mother's Tongue changed:", tongue.value);
    });

    trans.addEventListener("change", function() {
        trans.style.borderColor = "";
        console.log("trans's  changed:", trans.value);
    });


    addr.addEventListener("change", function() {
        addr.style.borderColor = "";
        console.log("addr's  changed:", addr.value);
    });
    community.addEventListener("change", function() {
        community.style.borderColor = "";
        console.log("community  changed:", community.value);
    });
    caste.addEventListener("change", function() {
        caste.style.borderColor = "";
        console.log("caste  changed:", caste.value);
    });
    var checked = false;
    for (var i = 0; i < lang.length; i++) {
        lang[i].addEventListener("change", function() {
            // Reset error message
            document.getElementById('errr').innerHTML = "";
            
            // Check if at least one language is checked
            checked = false;
            for (var j = 0; j < lang.length; j++) {
                if (lang[j].checked) {
                    checked = true;
                    break;
                }
            }            
            // Display error message if no language is checked
            if (!checked) {
                document.getElementById('errr').innerHTML = "Please select at least one language.";
                flag = false; // Assuming flag is declared somewhere else
            }
        });
    }



    function validate_personal() {
        var flag = true;

        var name_value = document.getElementsByName("name")[0].value.trim();
        if ((!name_value.match(pattern_name)) || (name_value === '')) {
            name.style.borderColor = "red";
            flag = false;
        } else {
            name.style.borderColor = "";
        }
    
        if ((!pattern_email.test(email.value)) || (email.value === '')) {
            email.style.borderColor = "red";
            flag = false;
        } else {
            email.style.borderColor = "";
        }
    
        var ph_value = document.getElementsByName("ph")[0].value.trim();
        if ((!ph_value.match(pattern_ph)) || (ph_value === '')) {
            ph.style.borderColor = "red";
            flag = false;
        } else {
            ph.style.borderColor = "";
        }
    
        if ((!pattern_aadhar.test(aadhar.value)) || (aadhar.value === '')) {
            aadhar.style.borderColor = "red";
            flag = false;
        } else {
            aadhar.style.borderColor = "";
        }
    
        var reg_value = reg.value.trim();
        if (reg_value.length !== 8 || reg_value === '') {
            reg.style.borderColor = "red";
            flag = false;
        } else {
            reg.style.borderColor = "";
        }
    
        var m_name_value = m_name.value.trim();
        if ((!m_name_value.match(pattern_name)) || m_name_value === "") {
            m_name.style.borderColor = "red";
            flag = false;
        } else {
            m_name.style.borderColor = "";
        }
    
        if ((!m_ph.value.match(pattern_ph)) || m_ph.value === "") {
            m_ph.style.borderColor = "red";
            flag = false;
        } else {
            m_ph.style.borderColor = "";
        }
    
        var f_name_value = f_name.value.trim();
        if ((!f_name_value.match(pattern_name)) || f_name_value === "") {
            f_name.style.borderColor = "red";
            flag = false;
        } else {
            f_name.style.borderColor = "";
        }
    
        if ((!f_ph.value.match(pattern_ph)) || f_ph.value === "") {
            f_ph.style.borderColor = "red";
            flag = false;
        } else {
            f_ph.style.borderColor = "";
        }
    
        var income_value = income.value.trim();
        if (income_value==='') {
            income.style.borderColor = "red";
            flag = false;
        } else {
            income.style.borderColor = "";
        }
    
        var native_value = native.value.trim();
        if (native_value==='') {
            native.style.borderColor = "red";
            flag = false;
        } else {
            native.style.borderColor = "";
        }
    
        if (dob.value==='') {
            dob.style.borderColor = "red";
            flag = false;
        } else {
            dob.style.borderColor = "";
        }
    
        if ((!pattern_pin.test(pin.value)) || (pin.value === '')) {
            pin.style.borderColor = "red";
            flag = false;
        } else {
            pin.style.borderColor = "";
        }
    
        if (doj.value==='') {
            doj.style.borderColor = "red";
            flag = false;
        } else {
            doj.style.borderColor = "";
        }
    
        var addr_value = addr.value.trim();
        if (addr_value==='') {
            addr.style.borderColor = "red";
            flag = false;
        } else {
            addr.style.borderColor = "";
        }
    
        if (caste.value==='') {
            caste.style.borderColor = "red";
            flag = false;
        } else {
            caste.style.borderColor = "";
        }

            var radiosToValidate = ['gender', 'mode', 'first_graduate', 'quota', 'physically_challenged', 'vaccinated', 'under_any_treatment'];
            radiosToValidate.forEach(function(radioName) {
                var radios = document.getElementsByName(radioName);
                var radioValid = false;
                
                for (var i = 0; i < radios.length; i++) {
                    if (radios[i].checked) {
                        radioValid = true;
                        break;
                    }
                }
        
                if (!radioValid) {
                    flag = false;
                    alert('Please select an option for ' + radioName);
                }
            });

            var m_occ_value = m_occ.value.trim();
            if (m_occ_value === "" || m_occ_value === "Select any one"){
                m_occ.style.borderColor = "red";
                flag=false;
            }
            else 
                m_occ.style.borderColor = "";
            console.log("Mother's occupation changed:", m_occ.value);
            
            var f_occ_value = f_occ.value.trim();
            if (f_occ_value === "" || f_occ_value === "Select any one"){
                f_occ.style.borderColor = "red";
                flag=false;
            }
            else 
                f_occ.style.borderColor = "";
            console.log("Father's occupation changed:", f_occ.value);
    
            var tongue_value = tongue.value.trim();
            if (tongue_value === "" || tongue_value === "Select any one"){ 
                tongue.style.borderColor = "red";
                flag=false;
            }
            else 
                tongue.style.borderColor = "";
            console.log("Mother's Tongue changed:", tongue.value);
    
            var trans_value = trans.value.trim();
            if (trans_value === "" || trans_value === "Select any one") {
                trans.style.borderColor = "red";
                flag=false;
            }
            else 
                trans.style.borderColor = "";
            console.log("transport changed:", trans.value);

            var community_value = community.value.trim();
            if (community_value === "" || community_value === "Select any one"){
                community.style.borderColor = "red";
                flag=false;
            }
            else 
                community.style.borderColor = "";
            console.log("Community changed:", community.value);
    




            var checked = false;
            for (var i = 0; i < lang.length; i++) {
                
               if (lang[i].checked) {
                    checked = true;
                    break;
                }
            }
            if (!checked) {
                document.getElementById('errr').innerHTML = "Please select at least one language.";
                flag=false;
            } else {
                document.getElementById('errr').innerHTML = ""; 
            }

            return flag;



           
    }


    //ACademic validation
    
        var academictype = document.getElementById("acad_type");
        var institution = document.getElementById("inst_name");
        var regno = document.getElementById("acd_reg_no");
        var modeOfStudy = document.getElementById("mode_of_study");
        var modeOfMedium = document.getElementById("mode_of_medium");
        var board = document.getElementById("board");
        var totalMarks = document.getElementById("total_marks");
        var marksObtained = document.getElementById("marks_obtained");
        var percentage = document.getElementById("percentage");
        var cutOff = document.getElementById("cut_off");
        var submitBtn = document.getElementById("submitBtn");
        var storedDataField = document.getElementById("storedData");
    
        var academicData = {
            SSLC: {},
            HSC: {},
            Diploma: {}
        };
    
        academictype.addEventListener("change", function() {
            var selectedValue = academictype.value;
            
            if (selectedValue) {
                institution.disabled = false;
                console.log('You have selected: ' + selectedValue);
            } else {
                institution.disabled = true;
                regno.disabled = true;
                modeOfStudy.disabled = true;
                modeOfMedium.disabled = true;
                board.disabled = true;
                totalMarks.disabled = true;
                marksObtained.disabled = true;
                percentage.disabled = true;
                cutOff.disabled = true;
    
                console.log('No academic type selected');
            }
        });
    
        function validateAndEnableNext(inputElement, nextElement) {
            inputElement.addEventListener("change", function() {
                var inputValue = this.value;
                if (inputValue === "" || (this.id === "total_marks" && inputValue> 600) || (this.id === "marks_obtained" && inputValue > totalMarks.value) || (this.id === "percentage" && inputValue > 100) || (this.id === "cut_off" && inputValue > 200)) {
                    console.log("Please enter the valid " + this.name);
                    this.style.border = "1px solid red";
                } else {
                    console.log("Entered " + this.name + ": " + inputValue);
                    this.style.border = "1px solid black";
                    nextElement.disabled = false;
                }
            });
        }
    
        validateAndEnableNext(institution, regno);
        validateAndEnableNext(regno, modeOfStudy);
        validateAndEnableNext(modeOfStudy, modeOfMedium);
        validateAndEnableNext(modeOfMedium, board);
        validateAndEnableNext(board, totalMarks);
        validateAndEnableNext(totalMarks, marksObtained);
        validateAndEnableNext(marksObtained, percentage);
        validateAndEnableNext(percentage, cutOff);
        validateAndEnableNext(cutOff, cutOff);

    
        function storeData() {
            var selectedValue = academictype.value;
            console.log(selectedValue);
            if (selectedValue) {
                var allFilled = true;
    
                // Validate all required fields
                if (!institution.value) {
                    allFilled = false;
                    institution.style.border = "1px solid red";
                } else {
                    institution.style.border = "1px solid black";
                }
    
                if (!regno.value) {
                    allFilled = false;
                    regno.style.border = "1px solid red";
                } else {
                    regno.style.border = "1px solid black";
                }
    
                if (!modeOfStudy.value) {
                    allFilled = false;
                    modeOfStudy.style.border = "1px solid red";
                } else {
                    modeOfStudy.style.border = "1px solid black";
                }
    
                if (!modeOfMedium.value) {
                    allFilled = false;
                    modeOfMedium.style.border = "1px solid red";
                } else {
                    modeOfMedium.style.border = "1px solid black";
                }
    
                if (!board.value) {
                    allFilled = false;
                    board.style.border = "1px solid red";
                } else {
                    board.style.border = "1px solid black";
                }
    
                if (!totalMarks.value || totalMarks.value <= 400) {
                    allFilled = false;
                    totalMarks.style.border = "1px solid red";
                } else {
                    totalMarks.style.border = "1px solid black";
                }
    
                if (!marksObtained.value || marksObtained.value > totalMarks.value) {
                    allFilled = false;
                    marksObtained.style.border = "1px solid red";
                } else {
                    marksObtained.style.border = "1px solid black";
                }
    
                if (!percentage.value || percentage.value > 100) {
                    allFilled = false;
                    percentage.style.border = "1px solid red";
                } else {
                    percentage.style.border = "1px solid black";
                }
    
                if (!cutOff.value || cutOff.value > 200) {
                    allFilled = false;
                    cutOff.style.border = "1px solid red";
                } else {
                    cutOff.style.border = "1px solid black";
                }

                if (allFilled) {
                    academicData[selectedValue] = {
                        institution: institution.value,
                        regno: regno.value,
                        modeOfStudy: modeOfStudy.value,
                        modeOfMedium: modeOfMedium.value,
                        board: board.value,
                        totalMarks: totalMarks.value,
                        marksObtained: marksObtained.value,
                        percentage: percentage.value,
                        cutOff: cutOff.value
                    };
                    // console.log("Stored Data for " + selectedValue + ": ", academicData[selectedValue]);
                    console.log("Stored Data for " + selectedValue + ": ", academicData[selectedValue]);
                    if(selectedValue === '1')
                        document.getElementById('sslc').innerText = '1';
                    else if(selectedValue === '2')
                        document.getElementById('hsc').innerText = '1';
                    else if(selectedValue === '3')
                        document.getElementById('diploma').innerText = '1';
                    return true;
                } 
                else {
                    console.log("Please fill in all fields correctly.");
                    document.getElementById('academic-details').scrollIntoView({ behavior: 'smooth', block: 'start' });
                    return false;
                }
            }
        }
    
        submitBtn.addEventListener("click", function(event) {
            event.preventDefault();
            if (storeData()) {
                disableType();
            institution.value = "";
            regno.value = "";
            modeOfStudy.value = "";
            modeOfMedium.value = "";
            board.value = "";
            totalMarks.value = "";
            marksObtained.value = "";
            percentage.value = "";
            cutOff.value = "";
    
            institution.disabled = true;
            regno.disabled = true;
            modeOfStudy.disabled = true;
            modeOfMedium.disabled = true;
            board.disabled = true;
            totalMarks.disabled = true;
            marksObtained.disabled = true;
            percentage.disabled = true;
            cutOff.disabled = true;            
            submitBtn.disabled=true;
    
            }
        });

    
        function disableType() {
            var selectedType = academictype.options[academictype.selectedIndex];
            selectedType.disabled = true;
        }

        function validate_acad(){
            var flag = true;
            var f1 = document.getElementById('sslc').innerText;
            var f2 = document.getElementById('hsc').innerText;
            var f3 = document.getElementById('diploma').innerText;
            console.log("ssls"+f1);
            console.log("hsc"+f2);
            console.log("diploma"+f3);
            
            if ((f1 == '1' && f2 == '1') || (f1 == '1' && f3 == '1')) {
                flag = true;
            } 
            else{
                flag = false;
            }
            return flag;
        }
    
        // extracurriculars
        const MaxDreamCompanyCount = 3;
        var hobbies = document.getElementById('Hobbies');
        var interest = document.getElementById('Interest');
        var ambition = document.getElementById('Ambition');
        var Programming_LanguageInputs = document.querySelectorAll('.input-Programming_Language input');
        var otherCoursesInputs = document.querySelectorAll('.input-Other_Courses input');
        var DreamCoursesInputs = document.querySelectorAll('.input-Dream_Company input');


        hobbies.addEventListener("change", function() {
            hobbies.style.borderColor = "";
            console.log("hobbies changed:", hobbies.value);
        });
        interest.addEventListener("change", function() {
            interest.style.borderColor = "";
            console.log("interest changed:", interest.value);
        });
        ambition.addEventListener("change", function() {
            ambition.style.borderColor = "";
            console.log("ambition changed:", ambition.value);
        });

        Programming_LanguageInputs.forEach(function(input) {
            input.addEventListener('change', function() {                
                input.style.borderColor = ''; // Reset to default
                console.log("Programming Language changed:", input.value);
                });        
        });

        otherCoursesInputs.forEach(function(input) {
            input.addEventListener('change', function() {                
                input.style.borderColor = ''; // Reset to default
                console.log("otherCoursesInputs changed:", input.value);
                });        
        });

        DreamCoursesInputs.forEach(function(input) {
            input.addEventListener('change', function() {                
                input.style.borderColor = ''; // Reset to default
                console.log("DreamCourses changed:", input.value);
                });        
        });


        function validate_extracurricular() {
            let isValid = true;

            // Validate each field
            const hobbies = document.getElementById('Hobbies');
            if (hobbies && !validateField(hobbies)) 
                isValid = false;
            else if (hobbies) {
                console.log("Hobbies: " + hobbies.value);
            }

            const interest = document.getElementById('Interest');
            if (interest && !validateField(interest)) 
                isValid = false;
            else if (interest) {
                console.log("Interest: " + interest.value);
            }

            const ambition = document.getElementById('Ambition');
            if (ambition && !validateField(ambition)) 
                isValid = false;
            else if (ambition) {
                console.log("Ambition: " + ambition.value);
            }

            const Programming_LanguageInputs = document.querySelectorAll('.input-Programming_Language input');
                Programming_LanguageInputs.forEach(function(input) {
                    if (!validateField(input)) {
                        isValid = false;
                    } else {
                        console.log("Programming Language: " + input.value);
                    }
                });
            

            const otherCoursesInputs = document.querySelectorAll('.input-Other_Courses input');
                otherCoursesInputs.forEach(function(input) {
                    if (!validateField(input)) {
                        isValid = false;
                    } else {
                        console.log("Other Courses: " + input.value);
                    }
                });
            

            document.querySelectorAll('.input-Dream_Company input').forEach(function(input) {
                if (!validateField(input)) isValid = false;
                else {
                    console.log("Dream Company: " + input.value);
                }
            });

            return isValid;
        }

        // Function to validate a field
        function validateField(field) {
            if (field.value.trim() === '') {
                field.style.borderColor = 'red';
                return false;
            } else {
                field.style.borderColor = '';
            }
            return true;
        }

        // Add dynamic fields

        form.addEventListener('click', function(event) {
            if (event.target.id === 'addProgrammingLanguage') {
                addDynamicField(event.target.closest('.input-group').querySelector('.input-Programming_Language'));
            } else if (event.target.id === 'addOtherCourses') {
                addDynamicField(event.target.closest('.input-group').querySelector('.input-Other_Courses'));
            } else if (event.target.id === 'addDream_Company') {
                if (document.querySelectorAll('.input-Dream_Company input').length < MaxDreamCompanyCount) {
                    addDynamicField(event.target.closest('.input-group').querySelector('.input-Dream_Company'));
                }
            }
        });
        

        // Function to add a dynamic field
        function addDynamicField(container) {


            const wrapper = document.createElement('div');
            wrapper.style.display = 'flex';
            wrapper.style.alignItems = 'center';
            wrapper.style.marginBottom = '5px';


            const input = document.createElement('input');
            input.type = 'text';
            input.name = container.classList.contains('input-Programming_Language') ? 'Programming_Language[]' :
                         container.classList.contains('input-Other_Courses') ? 'Other_Courses[]' :
                         'Dream_Company[]';
            input.placeholder = '';
            input.style.width = '200px';
            input.style.marginRight = '5px';

            input.addEventListener('change', function() {
                if (!validateField(input)) {
                    input.style.borderColor = 'red';
                } else {
                    input.style.borderColor = ''; // Reset to default
                    console.log(" changed:", input.value);
                }
            });
        
                    
            const removeIcon = document.createElement('i');
            removeIcon.className = 'fas fa-minus icon';
            removeIcon.style.cursor = 'pointer';
            removeIcon.style.color = 'red';
            removeIcon.style.marginLeft = '5px';
            removeIcon.addEventListener('click', function() {
                container.removeChild(wrapper);
            });

            wrapper.appendChild(input);
            wrapper.appendChild(removeIcon);
            container.appendChild(wrapper);
        }




        
        // final check -> index.html
                
        finalSubmitBtn.addEventListener("click", function(event) {
            event.preventDefault();
            storeData();
            storedDataField.value = JSON.stringify(academicData);
            
            var f = validate_personal();
            console.log(f);
    
            var acad_f = validate_acad()
            console.log(acad_f);
    
            var isExtraValid = validate_extracurricular();
            console.log(isExtraValid);
    
            if(f == true && acad_f == true && isExtraValid == true)
                form.submit();
            else if(f==false)
                document.getElementById('personal-info').scrollIntoView({ behavior: 'smooth', block: 'start' });
            else if(acad_f==false)
                document.getElementById('academic-details').scrollIntoView({ behavior: 'smooth', block: 'start' });
            else
                document.getElementById('extra-curr').scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    

        // final check -> edit
        editSubmitBtn.addEventListener("click", function(event) {
            event.preventDefault();
            if (typeof window.storeData === 'function') {
                window.storeData(); // Call storeData function
            } else {
                console.error("storeData function is not defined");
            }
            storedDataField.value = JSON.stringify(academicData);
            
            var f = validate_personal();
            console.log(f);
    
            var isExtraValid = validate_extracurricular();
            console.log(isExtraValid);
    
            if(f == true && isExtraValid == true)
                form.submit();
            else if(f==false)
                document.getElementById('personal-info').scrollIntoView({ behavior: 'smooth', block: 'start' });
            else
                document.getElementById('extra-curr').scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    
});