<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
    <style>
        .modal-header {
            background-color: #bff7ec;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #ccc;
        }

        .modal-header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
    </style>
    <script>
        //Name-Valid//
        function nameValid(e) {
            var namePattern = /[a-zA-z]{3,9}/;
            var isNameValid = (namePattern.test(e)) ? true : false;

            if (isNameValid) {
                document.getElementById('name').classList.remove("is-invalid");
                document.getElementById('nameError').innerHTML = ` `;
                document.getElementById('b1').disabled = false;
            } else {
                document.getElementById('name').classList.add("is-invalid");
                document.getElementById('nameError').innerHTML = `Please Enter Name Properly`;
                document.getElementById('b1').disabled = true;
            }
        }

        //Contact Validation

        function phoneValid(e) {
            var phonePattern = /^[6789]\d{9}$/;
            var isPhoneValid = phonePattern.test(e) ? true : false;

            if (isPhoneValid) {
                document.getElementById('contact').classList.remove('is-invalid');
                document.getElementById('b1').disabled = false;
                document.getElementById('phoneError').innerHTML = ` `;
            } else {
                document.getElementById('contact').classList.add('is-invalid');
                document.getElementById('b1').disabled = false;
                document.getElementById('phoneError').innerHTML = `Please Check No Properly`;
            }
        }

        //Email Validation

        function emailValid(e) {

            var emailPattern = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

            var isEmailValid = emailPattern.test(e)? true : false;

            if(isEmailValid){
                document.getElementById('email').classList.remove('is-invalid');
                document.getElementById('b1').disabled = false;
                document.getElementById('emailError').innerHTML = ``;
            }else{
                document.getElementById('email').classList.add('is-invalid');
                document.getElementById('b1').disabled = true;
                document.getElementById('emailError').innerHTML = `Please Enter Email Correctly`;
            }

            
        }

        //Education Validation
        const checkboxes = document.querySelectorAll('input[name="edu[]"]');
    let isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

    if (!isChecked) {
        document.getElementById('error').textContent = 'Please select at least one educational qualification.';
        event.preventDefault(); // Prevent form submission
    } else {
        document.getElementById('error').textContent = ''; // Clear error message
    }

    //State Valid

    function stateValid(s){
        var stateNamePattern = /[a-zA-z]{3,9}/;

        var isStateValid = (stateNamePattern.test(s)) ? true : false;
        
        if(isStateValid){
                document.getElementById('state').classList.remove('is-invalid');
                document.getElementById('b1').disabled = false;
                document.getElementById('stateError').innerHTML = ``;
        }else{
                document.getElementById('state').classList.add('is-invalid');
                document.getElementById('b1').disabled = true;
                document.getElementById('stateError').innerHTML = `Please Enter Name Of State Properly`;
        }
    }
    //City Error
    function cityValid(s){
        var cityNamePattern = /[a-zA-z]{3,9}/;
        var isCityValid = (cityNamePattern.test(s)) ? true : false;

        if(isCityValid){
                document.getElementById('city').classList.remove('is-invalid');
                document.getElementById('b1').disabled = false;
                document.getElementById('cityError').innerHTML = ``;
        }else{
                document.getElementById('city').classList.add('is-invalid');
                document.getElementById('b1').disabled = false;
                document.getElementById('cityError').innerHTML = `Please Enter City Name Properly`;
        }
    }
    //Pin Error

    function pinValid(s){

                var pinPattern = /^[7]\d{5}$/;
                var ispinValid = (pinPattern.test(s)) ? true : false;

                if(ispinValid){
                document.getElementById('pin').classList.remove('is-invalid');
                document.getElementById('b1').disabled = false;
                document.getElementById('pinError').innerHTML = ``;
        }else{
                document.getElementById('pin').classList.add('is-invalid');
                document.getElementById('b1').disabled = false;
                document.getElementById('pinError').innerHTML = `Please Enter Pin Properly`;
        }
    }
    //Gender Valid
    function genderValid(){
        var isChecked = document.getElementById('gender').checked;
        var checkError =document.getElementById('genderError');

        if(isChecked){
            document.getElementById('checkError').innerHTML=``;
            document.getElementById('b1').disabled=false;
        }else{
            document.getElementById('checkError').innerHTML=`Please Check Any Of The Option`;
            document.getElementById('b1').disabled=true;
        }
    }
    function pass1Valid(s){
     var passPattern = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
     var passIsValid = passPattern.test(s)? true : false;
     if(passIsValid){
            document.getElementById("pass1Error").innerHTML='';
            document.getElementById("b1").disabled = false;
            document.getElementById("pass1").classList.remove("is-invalid");

     }else{
            document.getElementById("pass1Error").innerHTML=`
               Password should contains...
               <ul class='list-group'>
                <li>Atleast one UpperCase</li>
                <li>Atleast one LowerCase</li>
                <li>Atleast one Digit</li>
                <li>Atleast One Special Chars [!@#$%^]</li>
                <li>Min Length:6 to Max Length:16</li>
               </ul>
`;
            document.getElementById("b1").disabled = true;
            document.getElementById("pass1").classList.add("is-invalid");
     }
    }

    function checkMismatchPass(p1,p2){
        var isMisMatchPassError = ((p1==p2)) ? false : true ;
       if(isMisMatchPassError){
           document.getElementById("pass1").classList.add('is-invalid');
           document.getElementById("pass2").classList.add("is-invalid");
           document.getElementById("pass2Error").innerHTML=`
            <div class='alert alert-danger'>
            Password & Confirm Password combination doesnot match.
            Please try again later.
            </div>
           `;
           document.getElementById("b1").disabled=true;
       }else{
          document.getElementById("pass1").classList.remove("is-invalid");
          document.getElementById("pass2").classList.remove("is-invalid");
          document.getElementById("pass2Error").innerHTML='';
          document.getElementById("b1").disabled=false;
       }

    }
    //TOGGLE PASS
    function togglePass(pass1Field,pass2Field,checkBoxField1){
     
     if(checkBoxField1.checked){
           pass1Field.type = pass2Field.type='text';
     }else{
          pass1Field.type = pass2Field.type='password';
     }
 }

    </script>
</head>

<body>
    <div class="container-fluid">
        <header class="modal-header">
            <h1>SignUp Form</h1>
        </header>
        <div class="card m-2 p-2 border">
            <form method="POST" action="user.php" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            First Name:<input type="text" name="fname" id="name" required class="form-control"
                                placeholder="Enter First Name" onkeyup="nameValid(this.value)">
                            <div id="nameError" class="text-danger"></div>
                        </div>
                        <div class="col">
                            Middle Name:<input type="text" name="mname" id="name" class="form-control"
                                placeholder="Enter Middle Name" onkeyup="nameValid(this.value)">
                            <div id="nameError" class="text-danger"></div>
                        </div>
                        <div class="col">
                            Last Name:<input type="text" name="lname" id="name" required class="form-control"
                                placeholder="Enter Last Name" onkeyup="nameValid(this.value)">
                            <div id="nameError" class="text-danger"></div>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    Contact<input type="text" name="contact" id="contact" required class="form-control"
                        placeholder="Enter Your No" onkeyup="phoneValid(this.value)">
                    <div id="phoneError" class="text-danger"></div>
                </div>
                <div class="form-group">
                    Email<input type="text" name="email" id="email" required class="form-control"
                        placeholder="Enter Email Id" onkeyup="emailValid(this.value)">
                    <div id="emailError" class="text-danger"></div>
                </div>
                <fieldset class="card m-2 p-2 border">
                    <legend>
                        Personal Information
                    </legend>
                    <div class="form-group">
                        <p>Educational Qualification</p>
                        <input type="checkbox" name="edu[]" id="edu[]" value="10th">10<sup>th</sup>
                        <input type="checkbox" name="edu[]" id="edu[]" value="12th">12<sup>th</sup>
                        <input type="checkbox" name="edu[]" id="edu[]" value="Graduation">Graduation
                        <input type="checkbox" name="edu[]" id="edu[]" value="PostGraduation">PostGraduation
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                State<input type="text" name="state" id="state" required class="form-control"
                                    placeholder="State Name" onkeyup="stateValid(this.value)">
                                    <div id="stateError" class="text-danger"></div>
                            </div>
                            <div class="col">
                                City<input type="text" name="city" id="city" required class="form-control"
                                    placeholder="City Name" onkeyup="cityValid(this.value)">
                                    <div id="cityError" class="text-danger"></div>
                                </div>
                            <div class="col">
                                Pin<input type="number" name="pin" id="pin" required class="form-control"
                                    placeholder="ZipCode" onkeyup="pinValid(this.value)">
                                    <div id="pinError" class="text-danger"></div>
                                </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <p>Gender</p>
                        Male<input type="radio" name="gender" id="gender" value="Male" onchange="genderValid()">
                        Female<input type="radio" name="gender" id="gender" value="Female" onchange="genderValid()">
                        Transgender<input type="radio" name="gender" id="gender" value="Transgender" onchange="genderValid()">
                        <div id="genderError" name="text-danger"></div>
                    </div>
                    <div class="form-group">
                        Upload<input type="file" name="f1" id="f1" onchange="loadImg(event)">
                        <div id="img_preview"></div>
                        <script>
                            function loadImg(e) {
                                let file = e.target.files[0];
                                let imgBlob = URL.createObjectURL(file);
                                document.getElementById("img_preview").innerHTML = `
                                <img src='${imgBlob}' style='height:100px; width:100px' class='img-thumbnail'/>`;
                            }
                        </script>
                    </div>
                    <div class="form-group">
                        Password<input type="password" name="pass1" id="pass1" required class="form-control"
                            placeholder="Enter Password" onkeyup="pass1Valid(this.value)">
                        <div id="pass1Error" class="text-danger"></div>
                    </div>
                    <div class="form-group">
                        Confirm Password<input type="password" name="pass2" id="pass2" required class="form-control"
                            placeholder="Enter Password" onkeyup="checkMismatchPass(document.getElementById('pass1').value,this.value)">
                        <div id="pass2Error" class="text-danger"></div>
                    </div>
                    <div class="form-group">
                    Show Password<input type="checkbox" name="ch1" id="ch1" onchange="togglePass(document.getElementById('pass1'),document.getElementById('pass2'),this)">
                    </div>
                    
                </fieldset>
                <div class="form-group">
                    <button class="btn btn-sm btn-outline-primary" id="b1">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>