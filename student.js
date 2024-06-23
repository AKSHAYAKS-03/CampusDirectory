document.addEventListener("DOMContentLoaded", function() {

    var form = document.getElementById("form");

    // (address, radio, doj, dob, income, native)--> required* reg,schlrship--> optional

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
    var lang = document.getElementsByName('lang');
   // var addr = document.getElementsByName("addr")[0];s
    var native = document.getElementsByName("native")[0];
    var pin = document.getElementsByName("pin")[0];
    var doj = document.getElementsByName("doj")[0];
   // var mode = document.getElementsByName("mode")[0];
    var trans = document.getElementsByName("trans")[0];
    var community = document.getElementsByName("community")[0];
   // var caste = document.getElementsByName("caste")[0];


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



    var pattern_name = /^[A-Z][a-zA-Z\s]{2,} [A-Z](\.[A-Z])?$/;
    var pattern_ph = /^[0-9]{10}$/;
    var pattern_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;
    var pattern_aadhar = /^[0-9]{4} [0-9]{4} [0-9]{4}$/;
    var pattern_pin = /^[0-9]{6}$/;

    form.addEventListener("submit", function(event) {
            event.preventDefault();
            var m_occ_value = m_occ.value.trim();
            if (m_occ_value === "" || m_occ_value === "Select any one") 
                m_occ.style.borderColor = "red";
             else 
                m_occ.style.borderColor = "";
            console.log("Mother's occupation changed:", m_occ.value);
        
            var f_occ_value = f_occ.value.trim();
            if (f_occ_value === "" || f_occ_value === "Select any one") 
                f_occ.style.borderColor = "red";
            else 
                f_occ.style.borderColor = "";
            console.log("Father's occupation changed:", f_occ.value);

            var tongue_value = tongue.value.trim();
            if (tongue_value === "" || tongue_value === "Select any one") 
                tongue.style.borderColor = "red";
            else 
                tongue.style.borderColor = "";
            console.log("Mother's Tongue changed:", tongue.value);

            var trans_value = trans.value.trim();
            if (trans_value === "" || trans_value === "Select any one") 
                trans.style.borderColor = "red";
            else 
                trans.style.borderColor = "";
            console.log("Caste changed:", trans.value);

            var community_value = community.value.trim();
            if (community_value === "" || community_value === "Select any one") 
                community.style.borderColor = "red";
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
            } else {
                document.getElementById('errr').innerHTML = ""; // Clear error message if valid
            }
    });

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

    f_name.addEventListener("submit", function() {
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
        console.log("Annual income changed:", income.value);
    });

    native.addEventListener("change", function() {
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
        console.log("Date of Join changed:", doj.value);
    });
});
