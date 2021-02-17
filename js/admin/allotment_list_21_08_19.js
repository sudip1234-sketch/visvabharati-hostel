jQuery.validator.addMethod("phoneno", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, "");
    return this.optional(element) || phone_number.length > 9 &&
        phone_number.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/);
}, "<br />Please specify a valid phone number..!!");

jQuery.validator.addMethod("pincodecheck", function(pincode, element) {
    pincode = pincode.replace(/\s+/g, "");
    return this.optional(element) || pincode.length == 6 &&
        pincode.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/);
}, "<br />Please specify a valid 6 digit Pincode..!!");

function change_color(all, id) {
    $(all).toggleClass('selected').siblings().removeClass('selected');
    $('#edit_bed_no').val(id);
}

function hide_allot_modal() {
    $("#myModal").hide();
}

function edit_approve(stuid, stu_hostel_name, stu_hostel_code, stu_block_no, stu_floor_no, stu_room_no, stu_bed_no) {
    if (stu_hostel_name != '' && stu_hostel_code != '' && stu_block_no != '' && stu_floor_no != '' && stu_room_no != '' && stu_bed_no != '') {
        var saveData = $.ajax({
            type: 'POST',
            url: "/admin-status-student",
            data: {
                "id": stuid
            },
            dataType: "text",
            success: function(resultData) {
                location.reload();
            }
        });
    } else {
        alert('Assign Hostel before approve student.');
    }
}

function checkalldata() {
    $(".student_id_unique_err").html('');
    var date_of_admission = $('#datepicker1').val();
    var institute_id = $('#institute_id').val();
    var course_id = $('#course_id').val();
    var department_id = $('#department_id').val();
    var institute_id_code = $('option:selected', '#institute_id').data('code');
    var course_id_code = $('option:selected', '#course_id').data('code');
    var department_id_code = $('option:selected', '#department_id').data('code');

    if ((date_of_admission != '') && (institute_id != 'Choose Bhavana(Institute)') && (course_id != 'null') && (department_id != 'null')) {
        var date_of_yr = date_of_admission.split('/');
        var student_id = (("0" + institute_id_code).slice(-2)) + '' + (("0" + course_id_code).slice(-2)) + '' + (("00" + department_id_code).slice(-3)) + '' + (("0" + date_of_yr[2]).slice(-2));
        $('#institute_idd').val(institute_id);
        $('#course_idd').val(course_id);
        $('#department_idd').val(department_id);
        $('#datepicker11').val(date_of_admission);
        $(".student_id_unique_err").html('Enter last two digit of your student Id!!');
        $("#student_id10").css('border-color', 'red');
        $("#student_id11").css('border-color', 'red');
        $("#student_id10").val('');
        $("#student_id11").val('');
        $('#student_id10').prop('disabled', false);
        $('#student_id11').prop('disabled', false);
        $('#student_id').val('');
        $('#student_id_unique').val('');
    }
}

function get_distance_calculation(zipcode, type) {
    $.ajax({
        url: "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyDJ7LS8lb5JcBD5gnEdFX1tzmAyYuAU3ow&components=postal_code:" + zipcode + "&sensor=false",
        method: "POST",
        success: function(data) {
            from_latitude = data.results[0].geometry.location.lat;
            from_longitude = data.results[0].geometry.location.lng;
            to_latitude = '23.6825';
            to_longitude = '87.6905';

            var dist = distance(from_latitude, from_longitude, to_latitude, to_longitude, 'K').toFixed(2);
            var dist_score = 0;

            if (parseFloat(dist) > 0 && parseFloat(dist) < 7.99) {
                dist_score = 0;
            }

            if (parseFloat(dist) >= 7.99 && parseFloat(dist) < 49.99) {
                dist_score = 1;
            }

            if (parseFloat(dist) >= 49.99 && parseFloat(dist) < 99.99) {
                dist_score = 2;
            }
            if (parseFloat(dist) >= 99.99 && parseFloat(dist) < 149.99) {
                dist_score = 3;
            }

            if (parseFloat(dist) >= 149.99 && parseFloat(dist) < 199.99) {
                dist_score = 4;
            }

            if (parseFloat(dist) >= 199.99 && parseFloat(dist) < 249.99) {
                dist_score = 5;
            }

            if (parseFloat(dist) >= 249.99 && parseFloat(dist) < 299.99) {
                dist_score = 6;
            }

            if (parseFloat(dist) >= 299.99 && parseFloat(dist) < 499.99) {
                dist_score = 7;
            }

            if (parseFloat(dist) >= 499.99 && parseFloat(dist) < 999.99) {
                dist_score = 8;
            }

            if (parseFloat(dist) >= 999.99 && parseFloat(dist) < 1499.99) {
                dist_score = 9;
            }

            if (parseFloat(dist) >= 1499.99) {
                dist_score = 10;
            }

            if (type == 'add') {
                $("#distance_frm").val(dist);
                $("#distance_score").val(dist_score);
            }

            if (type == 'edit') {
                $("#edit_distance_frm").val(dist);
                $("#edit_distance_score").val(dist_score);
            }

            calfinal();
        }
    });
}

function distance(lat1, lon1, lat2, lon2, unit) {
    var radlat1 = Math.PI * lat1 / 180
    var radlat2 = Math.PI * lat2 / 180
    var theta = lon1 - lon2
    var radtheta = Math.PI * theta / 180
    var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
    if (dist > 1) {
        dist = 1;
    }
    dist = Math.acos(dist)
    dist = dist * 180 / Math.PI
    dist = dist * 60 * 1.1515
    if (unit == "K") {
        dist = dist * 1.609344
    }
    if (unit == "N") {
        dist = dist * 0.8684
    }
    return dist
}

function calfinal() {
    var distance_score = $("#distance_score").val();
    var last_final_exam_score = $("#last_final_exam_score").val();

    if (distance_score != '') {
        var total_out_of_twenty = ((parseInt(distance_score) + parseFloat(last_final_exam_score)) / 20);
        var total_out_of_ten = (total_out_of_twenty * 10).toFixed(2);
        if (isNaN(total_out_of_ten)) {
            var total_out_of_ten = 0;
        }
        $("#final_exam_score").val(total_out_of_ten);
    }
}

function validateForm() {
    if ($("#edit_hostel_name").val() == "") {
        $("#edit_hostel_name").css('border-color', '#C80000');
        return false;
    } else if ($("#edit_block_no").val() == "") {
        $("#edit_block_no").css('border-color', '#C80000');
        return false;
    } else if ($("#edit_floor_no").val() == "") {
        $("#edit_floor_no").css('border-color', '#C80000');
        return false;
    } else if ($("#edit_room_no").val() == "") {
        $("#edit_room_no").css('border-color', '#C80000');
        return false;
    } else if ($("#edit_bed_no").val() == "") {
        $(".room").css('border', '1px solid #C80000');
        return false;
    }
}

$("document").ready(function() {

    $("#customRadioInline22").click(function() {
        $("#frm").submit();
    });

    $("#customRadioInline23").click(function() {
        $("#frm").submit();
    });
    
    $("#customRadioInline232").click(function() {
        $("#frm").submit();
    });

    $("#search_by_bhavan").change(function() {
        $("#frm").submit();
    });

    $("#search_by_department").change(function() {
        $("#frm").submit();
    });

    $("#search_by_course").change(function() {
        $("#frm").submit();
    });

    $("#customRadioInline24").click(function() {
        $("#frm").submit();
    });

    $("#customRadioInline25").click(function() {
        $("#frm").submit();
    });

    $("#customRadioInline26").click(function() {
        $("#frm").submit();
    });

    $("#customRadioInline27").click(function() {
        $("#frm").submit();
    });

    $("#search_nationality_type").change(function() {
        $("#frm").submit();
    });

    $("#search_by_hostel").change(function() {
        $("#frm").submit();
    });

    $("#search_by_category").change(function() {
        $("#frm").submit();
    });

    $("#search_by_semester").change(function() {
        $("#frm").submit();
    });

    $("#customRadioInline30").click(function() {
        $("#frm").submit();
    });

    $("#customRadioInline31").click(function() {
        $("#frm").submit();
    });

    $("#editform1").validate({
        rules: {
            hostel_name: {
                "required": true
            },
            hostel_id: {
                "required": true
            },
            hostel_code: {
                "required": true
            }
        },
        messages: {
            hostel_name: {
                "required": "Please Select Hostel Name..!!"
            },
            hostel_id: {
                "required": "Please Enter Hostel Id..!!"
            },
            hostel_code: {
                "required": "Please Enter Hostel Code..!!"
            }
        }
    });

    $('.cancel_allotment_button').click(function() {
        var ad_id = $(this).attr('ad_id');
        var saveData = $.ajax({
            type: 'POST',
            url: "/admin-allotment-cancel",
            data: {
                "id": ad_id
            },
            dataType: "text",
            success: function(resultData) {
                resultData = jQuery.parseJSON(resultData);
                location.reload();
            }
        });
    });

    $(".room .blank").click(function() {
        $(this).toggleClass('selected').siblings().removeClass('selected');
    });

    $("#edit_hostel_name").change(function() {
        $('#edit_block_no').find('option').remove();
        $('#edit_floor_no').find('option').remove();
        $('#edit_room_no').find('option').remove();
        $('#beds_available').html('');

        var hostel_id = $(this).val();
        var saveData = $.ajax({
            type: 'POST',
            url: "/admin-allotment-hostel-details",
            data: {
                "id": hostel_id
            },
            dataType: "text",
            success: function(resultData) {
                $('select[name="block_no"]').val('');
                $('select[name="floor_no"]').val('');
                $('select[name="room_no"]').val('');

                $('#edit_room_no').prop('disabled', false);
                $("#beds_available").html('');

                resultData = jQuery.parseJSON(resultData);

                var student_id = $('#edit_student_id1').val();

                var hostel_id = resultData.hostel_code + '_' + student_id;

                $('#edit_hostel_code').val(resultData.hostel_code);
                $('#edit_hostel_id').val(hostel_id);
                $('#edit_hostel_id11').val(hostel_id);
                $('#edit_hostel_id').prop('readonly', true);
                $('#edit_hostel_code').prop('readonly', true);
            }

        });

        $.ajax({
            type: 'POST',
            url: "/admin-get-hostel-blocks",
            data: {
                "hostel_id": hostel_id
            },
            success: function(resultData1) {
                console.log(resultData1);
                $("#edit_block_no").html(resultData1);
            }
        });
    });

    $("#edit_block_no").change(function() {
        $('select[name="floor_no"]').val('');
        $('select[name="room_no"]').val('');
        $('#edit_room_no').prop('disabled', false);
        $("#beds_available").html('');
        $("#edit_floor_no").html('');
        var hostel_id = $('#edit_hostel_name').val();
        // get block no
        $.ajax({
            type: 'POST',
            url: "/admin-get-hostel-floor",
            data: {
                "hostel_id": hostel_id,
                "block_id": $("#edit_block_no").val()
            },
            success: function(resultData1) {
                $("#edit_floor_no").html(resultData1);
            }
        });
    });

    $("#edit_floor_no").change(function() {
        var hostel_id = $("#edit_hostel_name").val();
        var block_id = $("#edit_block_no").val();
        var floor_id = $(this).val();
        $('select[name="room_no"]').html('');
        var saveData = $.ajax({
            type: 'POST',
            url: "/admin-hostel-room-details",
            data: {
                "id": hostel_id,
                "block_id": block_id,
                "floor_id": floor_id
            },
            dataType: "text",
            success: function(resultData) {
                $('#edit_room_no').prop('disabled', false);
                $("#beds_available").html('');

                resultData = jQuery.parseJSON(resultData);
                if (resultData) {
                    var optionsAsString = "<option value=''> Select Room No </option>";
                    for (var i = 0; i < resultData.length; i++) {
                        optionsAsString += "<option value='" + resultData[i].room_no + "'>" + resultData[i].room_no + "</option>";
                    }

                    $('select[name="room_no"]').html(optionsAsString);
                } else {
                    $('#edit_room_no').prop('disabled', true);
                    $("#beds_available").html('');
                    $('#msg_edit_room_no').html('No Room Found');
                    setTimeout(function() {
                        $('#msg_edit_room_no').hide();
                    }, 3000);
                }
            }
        });
    });

    $("#edit_room_no").change(function() {
        var hostel_id = $("#edit_hostel_name").val();
        var block_no = $("#edit_block_no").val();
        var floor_no = $("#edit_floor_no").val();
        var room_no = $(this).val();

        var saveData = $.ajax({
            type: 'POST',
            url: "/admin-hostel-bed-details",
            data: {
                "hostel_id": hostel_id,
                "block_no": block_no,
                "floor_no": floor_no,
                "room_no": room_no
            },
            dataType: "text",
            success: function(resultData) {
                console.log(resultData);
                var array = [];
                resultData = jQuery.parseJSON(resultData);

                if (resultData) {
                    if (resultData.release_beds_nos) {
                        var array = resultData.release_beds_nos.split(', ');
                    } else {
                        var array = [];
                    }

                    if (resultData.booked_total_seats) {
                        var beds_booked_array = resultData.booked_total_seats.split(',');
                    }

                    $("#beds_available").html('');
                    var k = 0;
                    for (var i = 0; i < array.length; i++) {
                        if (beds_booked_array) {
                            if ((jQuery.inArray(array[k], beds_booked_array)) != -1) {
                                $("#beds_available").append('<a href="javascript:void(0)" class="bed booked">' + array[k] + '</a>');
                            } else {
                                var trtr = "'" + array[k] + "'";
                                $("#beds_available").append('<a href="javascript:void(0)" onclick="change_color(this,' + trtr + ')" class="bed blank">' + array[k] + '</a>');
                            }
                        } else {
                            var trtr = "'" + array[k] + "'";
                            $("#beds_available").append('<a href="javascript:void(0)" onclick="change_color(this,' + trtr + ')" class="bed blank">' + array[k] + '</a>');
                        }

                        k++;
                    }
                } else {
                    $("#beds_available").html('<span style="color:red"> No Bed Found</span>');
                }
            }
        });
    });

    $('.collect_payment').click(function() {
        var ad_id = $(this).attr('ad_id');
        var saveData = $.ajax({
            type: 'POST',
            url: "/admin-collect-payment",
            data: {
                "student_id": ad_id
            },
            dataType: "text",
            success: function(resultData11) {
                if (resultData11 == 'true') {
                    window.location.href = "/student-profile";
                }
            }
        });
    });

    $('.edit_button').click(function() {
        $("#editform1")[0].reset();
        $('#beds_available').html('');
        $("#edit_hostel_name").removeAttr("style");
        $("#edit_block_no").removeAttr("style");
        $("#edit_floor_no").removeAttr("style");
        $("#edit_room_no").removeAttr("style");
        $(".room").removeAttr("style");

        var ad_id = $(this).attr('ad_id');
        $("#student_id_edit").val(ad_id);

        var saveData = $.ajax({
            type: 'POST',
            url: "/admin-allotment-student-details",
            data: {
                "id": ad_id
            },
            dataType: "text",
            success: function(resultData) {
                resultData = jQuery.parseJSON(resultData);
                if (resultData.bed_released == '1') {
                    $("#edit_student1").hide();
                } else {
                    $("#edit_student1").show();
                }

                $('#edit_bed_no').val(resultData.bed_no);

                if (resultData.profile_image) {
                    var src = '/assets/student_pics/' + resultData.profile_image;
                } else {
                    var src = '/assets/front/images/blank-profile-pic.jpg';
                }

                var saveData11 = $.ajax({
                    type: 'POST',
                    url: "/admin-hostels-list",
                    data: {
                        "gender": resultData.gender
                    },
                    dataType: "text",
                    success: function(resultData12) {
                        resultData12 = jQuery.parseJSON(resultData12);
                        var optionsAsString1 = "<option value=''> Select Hostel </option>";
                        for (var i = 0; i < resultData12.length; i++) {
                            var selected = '';
                            if (resultData.hostel_name == resultData12[i].id) {
                                selected = 'selected';
                            }
                            optionsAsString1 += "<option value='" + resultData12[i].id + "' " + selected + ">" + resultData12[i].hostel_name + "</option>";
                        }

                        $('select[name="hostel_name"]').html(optionsAsString1);
                    }
                });

                $("#edit_profile_image1").attr("src", src);
                $('#edit_student_id1').val(resultData.student_id);
                $('#edit_full_name1').val(resultData.full_name);

                $('#edit_department_id1').filter(function() {
                    return ($(this).val() == resultData.department_id); //To select Institute
                }).prop('selected', true);

                $('#edit_institute_id1').filter(function() {
                    return ($(this).val() == resultData.institute_id); //To select Institute
                }).prop('selected', true);

                $('#edit_contact_no1').val(resultData.contact_no);
                $('#edit_email_id1').val(resultData.email_id);
                $('#edit_university_id1').val(resultData.university_id);
                $('#edit_hostel_id').val(resultData.hostel_id);
                $('#edit_hostel_id11').val(resultData.hostel_id);
                $('#edit_hostel_code').val(resultData.hostel_code);
                $('#edit_hostel_wing').val(resultData.hostel_wing);
                $('#edit_blood_group1').val(resultData.blood_group);
                $('#edit_date_of_allotment').val(resultData.date_of_allotment);
                $('#vacating_year123').val(resultData.vacating_year);
                $("#vacating_month123 > [value=" + resultData.vacating_month + "]").attr("selected", "true");
                $("#semester123 > [value=" + resultData.semester + "]").attr("selected", "true");

                var dob = new Date(resultData.date_of_birth);
                var newDob = dob.toString('dd-MM-yy');
                $('#edit_date_of_birth').val(newDob);

                if ($(".edit_pwd1").val() == '0') {
                    $("#customRadioInline122").prop("checked", true);
                } else {
                    $("#customRadioInline133").prop("checked", true);
                }

                if ($(".edit_gender1").val() == 'female') {
                    $("#customRadioInline10").prop("checked", true);
                } else {
                    $("#customRadioInline11").prop("checked", true);
                }

                $('#edit_course_id1').filter(function() {
                    return ($(this).val() == resultData.course_id); //To select Institute
                }).prop('selected', true);

                if ($(".edit_gender1").val() == 'male') {
                    $("#customRadioInline10").prop("checked", true);
                } else {
                    $("#customRadioInline11").prop("checked", true);
                }

                var hostel_id = resultData.hostel_name;
                var block_id = resultData.block_no;
                var floor_id = resultData.floor_no;
                var saveData = $.ajax({
                    type: 'POST',
                    url: "/admin-hostel-room-details",
                    data: {
                        "id": hostel_id,
                        "block_id": block_id,
                        "floor_id": floor_id
                    },
                    dataType: "text",
                    success: function(resultData11) {
                        resultData11 = jQuery.parseJSON(resultData11);

                        if (resultData11) {
                            var optionsAsString = "<option value=''> Select Room No </option>";
                            for (var i = 0; i < resultData11.length; i++) {
                                var selected = '';
                                if (resultData.room_no == resultData11[i].room_no) {
                                    selected = 'selected';
                                }
                                optionsAsString += "<option value='" + resultData11[i].room_no + "' " + selected + ">" + resultData11[i].room_no + "</option>";
                            }
                            $('select[name="room_no"]').html(optionsAsString);
                        }
                    }
                });

                //// get block as per hostel ///
                $.ajax({
                    type: 'POST',
                    url: "/admin-get-hostel-blocks",
                    data: {
                        "hostel_id": resultData.hostel_name
                    },
                    success: function(resultData1a) {

                        $("#edit_block_no").html(resultData1a);
                        $('#edit_block_no').val(resultData.block_no);
                    }
                });

                //// get floor as per hostel ///
                $.ajax({
                    type: 'POST',
                    url: "/admin-get-hostel-floor",
                    data: {
                        "hostel_id": resultData.hostel_name,
                        "block_id": block_id
                    },
                    success: function(resultData1b) {
                        $("#edit_floor_no").html(resultData1b);
                        $('#edit_floor_no').val(resultData.floor_no);
                    }
                });
                //// end get floor as per hostel ///

                //// set floor as per hostel ///
                if (resultData.allotment_assigned == 1) {
                    var saveData = $.ajax({
                        type: 'POST',
                        url: "/admin-hostel-bed-details",
                        data: {
                            "hostel_id": resultData.hostel_name,
                            "block_no": resultData.block_no,
                            "floor_no": resultData.floor_no,
                            "room_no": resultData.room_no
                        },
                        dataType: "text",
                        success: function(resultData1) {
                            resultData1 = jQuery.parseJSON(resultData1);
                            if (resultData1) {
                                var array = resultData1.release_beds_nos.split(', ');
                                if (resultData1.booked_total_seats) {
                                    var beds_booked_array = resultData1.booked_total_seats.split(',');
                                }

                                $("#beds_available").html('');
                                var k = 0;
                                for (var i = 0; i < array.length; i++) {
                                    if (beds_booked_array) {
                                        if ((jQuery.inArray(array[k], beds_booked_array)) != -1) {
                                            $("#beds_available").append('<a href="javascript:void(0)" class="bed booked">' + array[k] + '</a>');
                                        } else {
                                            var trtr = "'" + array[k] + "'";
                                            $("#beds_available").append('<a href="javascript:void(0)" onclick="change_color(this,' + trtr + ')" class="bed blank">' + array[k] + '</a>');
                                        }
                                    } else if (array[k] == parseInt(resultData1.bed_no)) {
                                        $("#beds_available").append('<a href="javascript:void(0)" class="bed booked">' + array[k] + '</a>');
                                    } else {
                                        var trtr = "'" + array[k] + "'";
                                        $("#beds_available").append('<a href="javascript:void(0)" onclick="change_color(this,' + trtr + ')" class="bed blank">' + array[k] + '</a>');
                                    }
                                    k++;
                                }
                            } else {
                                $("#beds_available").html('<span style="color:red"> No Bed Found</span>');
                            }
                        }
                    });
                }

                if ($(".edit_caste1").val() == 'general') {
                    $("#caste_type_1").prop("checked", true);
                } else if ($(".edit_caste1").val() == 'SC') {
                    $("#caste_type_2").prop("checked", true);
                } else if ($(".edit_caste1").val() == 'ST') {
                    $("#caste_type_3").prop("checked", true);
                } else if ($(".edit_caste1").val() == 'OBC') {
                    $("#caste_type_4").prop("checked", true);
                }

                $('#edit_vb_reg_id1').val(resultData.vb_reg_id);
                $('#edit_aadhar_card_no1').val(resultData.aadhar_card_no);
                $('#edit_address1').val(resultData.address);
                $('#edit_city1').val(resultData.city);
                $('#edit_pincode1').val(resultData.pincode);
                $('#edit_guardian_name1').val(resultData.guardian_name);
                $('#edit_relation_with_guardian').val(resultData.relation_with_guardian);
                $('#edit_guardian_contact_no1').val(resultData.guardian_contact_no);
                $('#edit_guardian_email_id1').val(resultData.guardian_email_id);
                $('#edit_guardian_address1').val(resultData.guardian_address);

                if (resultData.allotment_assigned == '1') {
                    $('#edit_hostel_id').prop('readOnly', true);
                    $('#edit_hostel_name').prop('readOnly', true);
                    $('#edit_hostel_code').prop('readOnly', true);
                } else {
                    $('#edit_hostel_id').prop('readOnly', false);
                    $('#edit_hostel_name').prop('readOnly', false);
                    $('#edit_hostel_code').prop('readOnly', false);
                }

                $('#edit_guardian_address1').val(resultData.guardian_address);
                $('#edit_distance_frm1').val(resultData.distance_frm);
                $('#student_profile_image1').val(resultData.profile_image);
                $('#student_id1').val(resultData.id);
            }
        });
    });

    $('#allotform').submit(function() {
        var hostel_name_allot = $.trim($('#hostel_name_allot').val());
        if (hostel_name_allot === '') {
            $('#errAllot').html('Choose Hostel Name');
            return false;
        }
    });

    $("#addform").validate({
        rules: {
            sl_no: {
                "required": true,
            },
            student_id_unique: {
                "required": true
            },
            full_name: {
                "required": true
            },
            contact_no: {
                "required": true,
                "phoneno": true
            },
            email_id: {
                "required": true,
                remote: {
                    url: "/admin-check-email",
                    type: "post",
                    data: {
                        field: "email_id",
                        value: function() {
                            return $("#email_id").val();
                        }
                    }
                }
            },
            university_id: {
                "required": true
            },
            hostel_id: {
                "required": true
            },
            gender: {
                "required": true
            },
            hostel_name: {
                "required": true
            },
            hostel_code: {
                "required": true
            },
            room_no: {
                "required": true
            },
            hostel_wing: {
                "required": true
            },
            course_id: {
                "required": true
            },
            department_id: {
                "required": true
            },
            institute_id: {
                "required": true
            },
            academic_year: {
                "required": true
            },
            vacating_year: {
                "required": true
            },
            state_id: {
                "required": true
            },
            pwd_status: {
                "required": true
            },
            caste_type: {
                "required": true
            },
            obtain_marks_type: {
                "required": true
            },
            pincode: {
                "required": true,
                "pincodecheck": true
            }
        },
        messages: {
            sl_no: {
                "required": "Please Enter Sl No..!!",
                "remote": "Sl No Already Exists"
            },
            student_id_unique: {
                "required": "Please enter your Student Id last two digits"
            },
            full_name: {
                "required": "Please Enter Full Name..!!"
            },
            contact_no: {
                "required": "Please Enter Contact No..!!"
            },
            email_id: {
                "required": "Please Enter Email Id..!!",
                "remote": "Email Already Exists"
            },
            university_id: {
                "required": "Please Enter University Id..!!"
            },
            gender: {
                "required": "Please Select Gender..!!"
            },
            hostel_name: {
                "required": "Please Select Hostel Name..!!"
            },
            hostel_code: {
                "required": "Please Select Hostel Code..!!"
            },
            room_no: {
                "required": "Please Select Room No..!!"
            },
            hostel_wing: {
                "required": "Please Select Hostel Wing..!!"
            },
            course_id: {
                "required": "Please Select Course Id..!!"
            },
            department_id: {
                "required": "Please Select Department Id..!!"
            },
            institute_id: {
                "required": "Please Select Institute Id..!!"
            },
            academic_year: {
                "required": "Please Select Academic Year..!!"
            },
            vacating_year: {
                "required": "Please Select Vacating Year..!!"
            },
            state_id: {
                "required": "Please Select State Id..!!"
            },
            pwd_status: {
                "required": "Please Select PWD Status..!!"
            },
            caste_type: {
                "required": "Please Select Caste Type..!!"
            },
            obtain_marks_type: {
                "required": "Please Select Obtain Marks Type..!!"
            },
            pincode: {
                "required": "Please Select Pincode..!!"
            }
        }
    });

    $("#editform").validate({
        rules: {
            sl_no: {
                "required": true
            },
            full_name: {
                "required": true
            },
            contact_no: {
                "required": true
            },
            email_id: {
                "required": true,
            },
            university_id: {
                "required": true
            },
            pincode: {
                "required": true,
                "pincodecheck": true
            }
        },
        messages: {
            sl_no: {
                "required": "Please Enter Sl No..!!"
            },
            full_name: {
                "required": "Please Enter Full Name..!!"
            },
            contact_no: {
                "required": "Please Enter Contact No..!!"
            },
            email_id: {
                "required": "Please Enter Email Id..!!"
            },
            university_id: {
                "required": "Please Enter University Id..!!"
            },
            pincode: {
                "required": "Please Select Pincode..!!"
            }
        }
    });

    $('input[name="date_of_allotment"]').change(function() {
        var formattedNumber = $(this).val();
        var formattedNumber1 = formattedNumber.split('/');
        var formattedNumber2 = formattedNumber1[2].split('');
        $('#student_id8').val(formattedNumber2[2]);
        $('#student_id9').val(formattedNumber2[3]);

        var institute_id111 = $('#institute_id').val();
        var course_id111 = $('#course_id').val();
        var department_id111 = $('#department_id').val();

        if (institute_id111 != '' && course_id111 != '' && department_id111 != '') {
            $('#student_id10').val('');
            $('#student_id11').val('');
        }

        $("#student_id1").prop('disabled', true);
        $("#student_id2").prop('disabled', true);
        $("#student_id3").prop('disabled', true);
        $("#student_id4").prop('disabled', true);
        $("#student_id5").prop('disabled', true);
        $("#student_id6").prop('disabled', true);
        $("#student_id7").prop('disabled', true);
        $("#student_id8").prop('disabled', true);
        $("#student_id9").prop('disabled', true);
        checkalldata();
    });

    $('.delete_button').click(function() {
        var ad_id = $(this).attr('ad_id');
        var saveData = $.ajax({
            type: 'POST',
            url: "/admin-student-details",
            data: {
                "id": ad_id
            },
            dataType: "text",
            success: function(resultData21) {
                resultData21 = jQuery.parseJSON(resultData21);
                $('#del_ad_id').val(resultData21.id);
            }
        });
    });

    $('body').tooltip({
        selector: '.createdDiv'
    });


    var saveData1 = $.ajax({
        type: 'POST',
        url: "/get-student-sl-no",
        dataType: "text",
        success: function(resultData) {
            $('#sl_no').val(parseInt(resultData) + 1);
        }
    });
});
