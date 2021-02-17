var LAST_XHR = undefined;

jQuery.validator.addMethod("phoneno", function(phone_number, element) {
          phone_number = phone_number.replace(/\s+/g, "");
          return this.optional(element) || phone_number.length > 9 && 
          phone_number.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/);
}, "<br />Please specify a valid phone number.");


jQuery.validator.addMethod("pincodecheck", function(pincode, element) {
          pincode = pincode.replace(/\s+/g, "");
          return this.optional(element) || pincode.length == 6 && 
          pincode.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/);
}, "<br />Please specify a valid 6 digit Pincode.");

jQuery.validator.addMethod("studentid", function(studentid, element) {
    studentid = studentid.replace(/\s+/g, "");
    return this.optional(element) || (studentid.length == 11 || studentid.length == 12) && 
        studentid.match(/^(F)?([0-9]{2})([0-9]{2})([0-9]{3})([0-9]{2})([0-9]{2})$/);
}, "Please specify a valid student id.");

jQuery.validator.addMethod("admissionDateMatcher", function(date, element) {
    date = date.replace(/\s+/g, "");
    var studentid = $("#student_id").val();
    var stud_parts = studentid.match(/^(F)?([0-9]{2})([0-9]{2})([0-9]{3})([0-9]{2})([0-9]{2})$/);
    var parts = date.match(/[0-9]{2}\/[0-9]{2}\/[0-9]{2}([0-9]{2})$/);
    if(parts && parts[1] && stud_parts && stud_parts[5] && parts[1] != stud_parts[5]) {
        return false;
    }
    return true;
}, "Date of admission does not match with studentid.");

jQuery.validator.addMethod("cgpa", function(cgpa, element) {
    if($("#customRadioInline5").prop("checked") == false) {
        return true;
    }
    cgpa = parseFloat(cgpa);
    return (cgpa >= 0 && cgpa <= 10);
}, "Please specify a valid CGPA (10 point scale).");

jQuery.validator.addMethod("percentage", function(percentage, element) {
    if($("#customRadioInline6").prop("checked") == false) {
        return true;
    }
    percentage = parseFloat(percentage);
    return (percentage >= 0 && percentage <= 100);
}, "Please specify a valid percentage.");


function qid(id) {
    return document.getElementById(id);
}

function analyseStudendID(event) {
    if(event.target) {
        var studentid = event.target.value;
        var parts = studentid.match(/^(F)?([0-9]{2})/);
        var flag = false;

        if(parts && parts[2]) {
            var institute_id = parts[2]
            flag = false;
            var institutes = qid("institute_id").options;
            for(var k in institutes) {
                var institute = institutes[k];
                if(institute.value == parseInt(institute_id)) {
                    institute.selected = true;
                    qid('institute_id_validation').value = institute.value;
                    flag = true;
                    break;
                }
            }

            if(!flag) {
                qid("institute_id").selectedIndex  = -1;
                qid('institute_id_validation').value = "";
            }
        } else {
            qid("institute_id").selectedIndex  = -1;
            qid('institute_id_validation').value = "";
        }

        parts = studentid.match((/^(F)?([0-9]{2})([0-9]{2})/));
        if(parts && parts[3]) {
            var course_id = parts[3];
            flag = false;
            var courses = qid("course_id").options;
            for(var k in courses) {
                course = courses[k];
                if(course.getAttribute('data-course-code') == parseInt(course_id)){
                    course.selected = true;
                    qid('course_id_validation').value = course.value;
                    flag = true;
                    break;
                }
            }

            if(!flag) {
                qid("course_id").selectedIndex  = -1;
                qid('course_id_validation').value = "";
            }
        } else {
            qid("course_id").selectedIndex  = -1;
            qid('course_id_validation').value = "";
        }

        parts = studentid.match((/^(F)?([0-9]{2})([0-9]{2})([0-9]{3})/));
        if(parts && parts[4]) {
            var department_id = parts[4];
            flag = false;
            var departments = qid("department_id").options;
            for(var k in departments) {
                var department = departments[k]
                if(department.getAttribute('data-subject-code') == parseInt(department_id)){
                    department.selected = true;
                    qid('department_id_validation').value = department.value;
                    flag = true;
                    break;
                }
            }

            if(!flag) {
                qid("department_id").selectedIndex  = -1;
                qid('department_id_validation').value = "";
            }
        } else {
            qid("department_id").selectedIndex  = -1;
            qid('department_id_validation').value = "";
        }
    }
}

function distanceScoreDetails() {
    $("#distance_score_details").css("display", "block");
}

function closeScoreDetails() {
    $("#distance_score_details").css("display", "none");
}

function yesnoCheck() {
    if (document.getElementById('customRadioInline6').checked) {
        $("#div_for_best_of_5").show();
        $('#div_cgpa_entry_field').hide();
        $('#last_final_exam_score').val('');
        $('#final_exam_score').val('');
    }

    if (document.getElementById('customRadioInline5').checked) {
        $("#div_for_best_of_5").hide();
        $('#div_cgpa_entry_field').show();
        $('#last_final_exam_score').val('');
        $('#final_exam_score').val('');
    }
}

function getVacatingYear() {
    var allotdate = $('#date_of_allotment').val();
    var course_year = $($('#course_id')[0].selectedOptions[0]).attr('data-duration');
    var vacYear = '';

    if ((allotdate != '' && typeof allotdate != "undefined") && (course_year != '' && typeof course_year != "undefined")) {
        var allotYear = allotdate.split('/');
        var vacYear = parseInt(course_year) + parseInt(allotYear[2]);
    }

    $("#vacating_year").val(vacYear);
}

function renewalCheck() {
    if (document.getElementById('customRadioInline15').checked) {
        $("#renewal_check").css("display", "block");
        $("#renewal_msg").css("display", "none");
    }

    if (document.getElementById('customRadioInline16').checked) {
        $("#renewal_check").css("display", "none");
        $("#renewal_msg").css("display", "none");
    }
}

function distance_score(dist) {
    var dist_score = 0;

    if(parseFloat(dist) > 0 && parseFloat(dist) < 7.99) {
      dist_score = 0;
    }

    if(parseFloat(dist) >= 7.99 && parseFloat(dist) < 49.99) {
      dist_score = 1;
    }

    if(parseFloat(dist) >= 49.99 && parseFloat(dist) < 99.99) {
      dist_score = 2;
    }

    if(parseFloat(dist) >= 99.99 && parseFloat(dist) < 149.99) {
      dist_score = 3;
    }

    if(parseFloat(dist) >= 149.99 && parseFloat(dist) < 199.99) {
      dist_score = 4;
    }

    if(parseFloat(dist) >= 199.99 && parseFloat(dist) < 249.99) {
      dist_score = 5;
    }

    if(parseFloat(dist) >= 249.99 && parseFloat(dist) < 299.99) {
      dist_score = 6;
    }

    if(parseFloat(dist) >= 299.99 && parseFloat(dist) < 499.99) {
      dist_score = 7;
    }

    if(parseFloat(dist) >= 499.99 && parseFloat(dist) < 999.99) {
      dist_score = 8;
    }

    if(parseFloat(dist) >= 999.99 && parseFloat(dist) < 1499.99) {
      dist_score = 9;
    }

    if(parseFloat(dist) >= 1499.99) {
      dist_score = 10;
    }

    return dist_score;
}

function set_distance(zipcode,type){
    if(zipcode.length == 6){
        if(LAST_XHR) {
            LAST_XHR.abort();
        }

        LAST_XHR = $.ajax({
            url : "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyDJ7LS8lb5JcBD5gnEdFX1tzmAyYuAU3ow&components=postal_code:"+zipcode+"&sensor=false",
            method: "POST",

           success:function(data){
                from_latitude = data.results[0].geometry.location.lat;
                from_longitude= data.results[0].geometry.location.lng;
                to_latitude  = '23.6825';
                to_longitude = '87.6905';

                var dist = distance(from_latitude,from_longitude,to_latitude,to_longitude,'K').toFixed(2);
                var dist_score = distance_score(dist);
                if(type=='add') {
                    $("#distance_frm").val(dist);
                    $("#distance_score").val(dist_score);
                    $("#distance_score_validation").val(dist_score);
                }
            }
        });
    } else{
        $("#distance_frm").val('');
        $("#distance_score").val('');
        $("#distance_score_validation").val('');
    }
}

//This function takes in latitude and longitude of two location and returns the distance between them as the crow flies (in km)
function distance(lat1, lon1, lat2, lon2, unit) {
    var radlat1 = Math.PI * lat1/180
    var radlat2 = Math.PI * lat2/180
    var theta = lon1-lon2
    var radtheta = Math.PI * theta/180
    var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
    
    if (dist > 1) {
        dist = 1;
    }

    dist = Math.acos(dist)
    dist = dist * 180/Math.PI
    dist = dist * 60 * 1.1515
    
    if (unit=="K") { dist = dist * 1.609344 }
    if (unit=="N") { dist = dist * 0.8684 }
    
    return dist
}

function calculate_final_score(distance_score, last_final_exam_score) {
    var total_out_of_twenty = ((parseInt(distance_score) + parseFloat(last_final_exam_score)) / 20);
    var total_out_of_ten = (total_out_of_twenty * 10).toFixed(2);
    return total_out_of_ten;
}

function set_final_score() {
    var distance_score = $("#distance_score").val();
    var last_final_exam_score = $("#last_final_exam_score").val();
    var final_score = calculate_final_score(distance_score, last_final_exam_score);

    if(!isNaN(final_score)) {
        $("#final_exam_score").val(final_score);
        $("#final_score_validation").val(final_score);
    } else {
        $("#final_exam_score").val("");
        $("#final_score_validation").val("");
    }
}

function analyse_pincode() {
    var zipcode = $("#pincode").val();
    set_distance(zipcode,'add');
    set_final_score();
}

function onEditCGPA(event) {
    if(event.target.value && parseFloat(event.target.value) >= 0 && parseFloat(event.target.value) <= 10) {
        $("#last_final_exam_score").val(event.target.value);
    } else {
        $("#last_final_exam_score").val('');
    }
    set_final_score();
}

function onEditBestOf5(event) {
    if(event.target.value && parseFloat(event.target.value) >= 0 && parseFloat(event.target.value) <= 100) {
        $("#last_final_exam_score").val(parseFloat(event.target.value)/10.0);
    } else {
        $("#last_final_exam_score").val('');
    }
    set_final_score();
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#show_profile_image').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function signaturereadURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#show_student_signature').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}



$("document").ready(function(){
    $( "#date_of_allotment" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "-50:+0",
    });

    $( "#date_of_birth" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "-50:+0",
    });

    $("#addform").validate({
        ignore: ".ignore",
        rules:{
            student_id: {
                "required":true,
                "studentid":true,
                remote: {
                    url:"/check-student-id-front",
                    type: "post",
                    data: {
                        field:"student_id",
                        value: function() {
                            return $( "#student_id" ).val();
                        }
                    }
                } 
            },
            full_name:{
                "required":true
            },
            contact_no:{
                "required":true,
                "phoneno":true
            },
            email_id:{
                "required": true,
            },
            gender:{
                "required":true
            },
            vacating_year:{
                "required":true
            },
            state_id:{
                "required":"#nationality_type_indian:selected"
            },
            pwd_status:{
                "required":"#nationality_type_indian:selected"
            },
            physically_challenged:{
                "required":"#nationality_type_indian:selected, #customRadioInline1:checked"
            },
            caste_type:{
                "required":"#nationality_type_indian:selected"
            },
            profile_image:{
                "required":true
            },
            student_signature:{
                "required":true
            },
            declaration:{
                "required":true
            },
            obtain_marks_type:{
                "required":"#nationality_type_indian:selected"
            },
            date_of_allotment:{
                "required":true,
                "date":true,
                "admissionDateMatcher":true
            },
            date_of_birth: {
                "required":true,
                "date":true
            },
            pincode:{
                "required":"#nationality_type_indian:selected",
                "pincodecheck":true
            },
            institute_id_validation:{
                "required":true
            },
            course_id_validation:{
                "required":true
            },
            department_id_validation:{
                "required":true
            },
            nationality_type:{
                "required":true
            },
            distance_score_validation:{
                "required":"#nationality_type_indian:selected"
            },
            distance_frm:{
                "required":"#nationality_type_indian:selected"
            },
            final_score_validation:{
                "required":"#nationality_type_indian:selected"
            },
            last_final_exam_score:{
                "required":"#nationality_type_indian:selected"
            },
            address:{
                "required":true
            },
            last_score_validation: {
                "required":"#nationality_type_indian:selected"
            },
            cgpa_entry_field: {
                "cgpa":true
            },
            best_of_5: {
                "percentage":true
            }
        },
        messages:{
            student_id: {
                "required":"Student Id is manditory!",
                "studentid": "Please specify a valid student id.",
                "remote":"Student Id Already Exists"
            },
            full_name:{
              "required":"Full name is manditory!"
            },
            contact_no:{
              "required":"Please Enter Contact No."
            },
            email_id:{
              "required":"Please Enter Email Id.",
              "remote":"Email Already Exists"
            },
            gender:{
                "required":"Please Select Gender."
            },
            course_id:{
                "required":"Please Select Course Id."
            },
            department_id:{
                "required":"Please Select Department Id."
            },
            institute_id:{
                "required":"Please Select Institute Id."
            }, 
            vacating_year:{
                "required":"Please Select Vacating Year."
            },
            state_id:{
                "required":"Please Select State Id."
            },
            pwd_status:{
                "required":"Please Select PWD Status."
            },
            physically_challenged: {
                "required":"Please select PWD Status Category"
            },
            caste_type:{
                "required":"Please Select Caste Type."
            },
            date_of_birth:{
                "required":"Please Select Date of Birth."
            },
            profile_image:{
               "required":"Please Select Student Image."
            },
            student_signature:{
                "required":"Please Select Student Signature."
            },
            declaration:{
                "required":"Please Check Declaration."
            },
            obtain_marks_type:{
                "required":"Please Select Obtain Marks Type."
            },
            date_of_allotment:{
              "required":"Please Select Date of Admission/Allotment."
            },
            pincode:{
                "required":"Please Select Pincode."
            },
            nationality_type:{
                "required":"Please select your nationality."
            },
            distance_score_validation:{
                "required":"Distance score is required."
            },
            distance_frm:{
                "required":"Distance from university is required."
            },
            final_score_validation:{
                "required":"Make sure distance and last exam score are entered properly."
            },
            last_final_exam_score:{
                "required":"Last exam score is required. "
            },
            department_id_validation:{
                "required":"Make sure the student id is correct."
            },
            course_id_validation:{
                "required":"Make sure the student id is correct."
            },
            institute_id_validation:{
                "required":"Make sure the student id is correct."
            },
            address:{
                "required":"Please specify your current address."
            },
            last_score_validation: {
                "required":"Test validation"
            },
            cgpa_entry_field: {
                "cgpa":"Please specify a valid CGPA (10 point scale)."
            },
            best_of_5: {
                "percentage":"Please specify a valid percentage."
            }
        }
    });

    $("#student_id").keyup(analyseStudendID);
    $("#student_id").blur(analyseStudendID);

    $("#pincode").keyup(analyse_pincode);
    $("#pincode").blur(analyse_pincode);

    $("#cgpa_entry_field").keyup(onEditCGPA);
    $("#cgpa_entry_field").blur(onEditCGPA);

    $("#best_of_5").keyup(onEditBestOf5);
    $("#best_of_5").blur(onEditBestOf5);

    $("#check_student_exist").click(function() {
        var renewal_student_id = $('#renewal_student_id').val();

        $.ajax({ 
            type: 'POST',
            url: "/check-student-exist",
            data: {  "renewal_student_id": renewal_student_id},
            dataType: "text",

            success: function(resultData) { 
                if(resultData) {
                    $("#renewal_msg").css("display", "block");
                    $("#renewal_msg").html('Student Id Matches With Existing Record');
                    setTimeout(function(){ $("#renewal_msg").css("display", "none"); }, 3000);
                } else {
                    $("#renewal_msg").css("display", "block");
                    $("#renewal_msg").html('Student Id Does Not Match');
                    setTimeout(function(){ $("#renewal_msg").css("display", "none"); }, 3000);
                }
            }
        });
    });

    $('body').tooltip({
        selector: '.createdDiv'
    });

    $("#profile_image").change(function() {
        readURL(this);
    });

    $("#student_signature").change(function() {
        signaturereadURL(this);
    });

    $('input[type=radio][name=pwd_status]').change(function() {
        if (this.value == '1') {
            $("#physically_challenged").prop("readonly", false);
            $("#div_physically_challenged").show();
        } else {
            $("#physically_challenged").val('Choose...');
            $("#physically_challenged").prop("readonly", true);
            $("#div_physically_challenged").hide();
        }
    });

    $('#nationality_type').change(function() {
        if(this.value == 'indian') {
            $("#div_pwd_status").show();
            $("#div_caste_type").show();
            $("#div_obtain_marks_type").show();
            $("#div_distance_score").show();
            $("#div_final_score").show();
            $("#state_div").show();
            $("#pincode_div").show();
        } else {
            $("#state_div").hide();
            $("#pincode_div").hide();
            $("#div_pwd_status").hide();
            $("#div_caste_type").hide();
            $("#div_obtain_marks_type").hide();
            $("#div_distance_score").hide();
            $("#div_final_score").hide();
            $("#div_for_best_of_5").hide();
            $('#div_cgpa_entry_field').hide();
        }
    })
});