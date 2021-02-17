var LAST_XHR = undefined;

jQuery.validator.addMethod("phoneno", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, "");
    return this.optional(element) || phone_number.length > 9 && 
        phone_number.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/);
}, "Please specify a valid phone number.");

jQuery.validator.addMethod("pincodecheck", function(pincode, element) {
    pincode = pincode.replace(/\s+/g, "");
    return this.optional(element) || pincode.length == 6 && 
            pincode.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/);
}, "Please specify a valid 6 digit Pincode.");

jQuery.validator.addMethod("studentid", function(studentid, element) {
    studentid = studentid.replace(/\s+/g, "");
    return this.optional(element) || (studentid.length == 11 || studentid.length == 12) && 
        studentid.match(/^(F)?([0-9]{2})([0-9]{2})([0-9]{3})([0-9]{2})([0-9]{2})$/);
}, "Please specify a valid student id.");

jQuery.validator.addMethod("admissionDateMatcher", function(date, element) {
    date = date.replace(/\s+/g, "");
    var studentid = $("#edit_student_id").val();
    var stud_parts = studentid.match(/^(F)?([0-9]{2})([0-9]{2})([0-9]{3})([0-9]{2})([0-9]{2})$/);
    var parts = date.match(/[0-9]{2}\/[0-9]{2}\/[0-9]{2}([0-9]{2})$/);
    if(parts && parts[1] && stud_parts && stud_parts[5] && parts[1] != stud_parts[5]) {
        return false;
    }
    return true;
}, "Date of admission does not match with studentid.");

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
            var institutes = qid("edit_institute_id").options;
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
                qid("edit_institute_id").selectedIndex  = -1;
                qid('institute_id_validation').value = "";
            }
        } else {
            qid("edit_institute_id").selectedIndex  = -1;
            qid('institute_id_validation').value = "";
        }

        parts = studentid.match((/^(F)?([0-9]{2})([0-9]{2})/));
        if(parts && parts[3]) {
            var course_id = parts[3];
            flag = false;
            var courses = qid("edit_course_id").options;
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
                qid("edit_course_id").selectedIndex  = -1;
                qid('course_id_validation').value = "";
            }
        } else {
            qid("edit_course_id").selectedIndex  = -1;
            qid('course_id_validation').value = "";
        }

        parts = studentid.match((/^(F)?([0-9]{2})([0-9]{2})([0-9]{3})/));
        if(parts && parts[4]) {
            var department_id = parts[4];
            flag = false;
            var departments = qid("edit_department_id").options;
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
                qid("edit_department_id").selectedIndex  = -1;
                qid('department_id_validation').value = "";
            }
        } else {
            qid("edit_department_id").selectedIndex  = -1;
            qid('department_id_validation').value = "";
        }
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
                    $("#edit_distance_frm").val(dist);
                    $("#edit_distance_score").val(dist_score);
                    $("#distance_score_validation").val(dist_score);
                }
            }
        });
    } else{
        $("#edit_distance_frm").val('');
        $("#edit_distance_score").val('');
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
    var distance_score = $("#edit_distance_score").val();
    var last_final_exam_score = $("#edit_last_final_exam_score").val();
    var final_score = calculate_final_score(distance_score, last_final_exam_score);

    if(!isNaN(final_score)) {
        $("#edit_final_exam_score").val(final_score);
        $("#final_score_validation").val(final_score);
    } else {
        $("#edit_final_exam_score").val("");
        $("#final_score_validation").val("");
    }
}

function analyse_pincode() {
    var zipcode = $("#edit_pincode").val();
    set_distance(zipcode,'add');
    set_final_score();
}

function onEditDistanceFrom(event) {
    if(event.target.value) {
        var score = distance_score(event.target.value);
        $("#edit_distance_score").val(score);
        $("#distance_score_validation").val(score);
    } else {
        $("#edit_distance_score").val("");
        $("#distance_score_validation").val("");
    }
    set_final_score();
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#edit_profile_image').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function signaturereadURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#student_signature_image').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$("document").ready(function() {
    $( "#edit_date_of_allotment1" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "-50:+0",
    });

    $( "#edit_date_of_birth" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "-50:+0",
    });

    $("#editformstd").validate({
        ignore: ".ignore",
        rules:{
            student_id: {
                "required":true,
                "studentid":true
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
                "required":"#nationality_type_indian:selected, #customRadioInline12:checked"
            },
            caste_type:{
                "required":"#nationality_type_indian:selected"
            },
            date_of_admission:{
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
            nationality_type:{
                "required":true
            },
            distance_score_validation:{
                "required":true
            },
            distance_frm:{
                "required":true
            },
            final_score_validation:{
                "required":true
            },
            last_final_exam_score:{
                "required":true
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
            address:{
                "required":true
            }
        },
        messages:{
            student_id: {
                "required":"Student Id is manditory!"
            },
            full_name:{
              "required":"Full name is manditory!"
            },
            contact_no:{
              "required":"Please Enter Contact No."
            },
            email_id:{
              "required":"Please Enter Email Id."
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
            obtain_marks_type:{
                "required":"Please Select Obtain Marks Type."
            },
            date_of_admission:{
              "required":"Please Select Date of Admission.",
            },
            date_of_birth:{
                "required":"Please Select Date of Birth."
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
            }
        }
    });

    $("#edit_student_id").keyup(analyseStudendID);
    $("#edit_student_id").blur(analyseStudendID);

    $("#edit_pincode").keyup(analyse_pincode);
    $("#edit_pincode").blur(analyse_pincode);

    $("#edit_distance_frm").keyup(onEditDistanceFrom);
    $("#edit_distance_frm").blur(onEditDistanceFrom);

    $("#edit_last_final_exam_score").keyup(set_final_score);
    $("#edit_last_final_exam_score").blur(set_final_score);

    $("#profile_image").change(function() {
        readURL(this);
    });

    $("#student_signature").change(function() {
        signaturereadURL(this);
    });

});