<?php
    $search_url = base_url('admin-allotment-list');
    $search_page_number = $this->input->get('page_no');
    $num_per_page = $this->input->get('num_per_page');

    if(empty($search_page_number)) {
        $search_page_number = 0;
    }

    if(empty($num_per_page)) {
        $num_per_page = 20;
    }

    $is_subadmin = $this->session->userdata('is_subadmin'); 

?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/allotment_list.css">

<script type="text/javascript" src="/js/admin/allotment_list.js" ></script>

<div class="" id="allotment" role="tabpanel">
    <div class="row">
        <div class="col-auto">
            <h4>Allotment</h4>
        </div>
    </div>

    <hr>
    <div class="table-responsive">
        <div class="asd" style="">
            <form name="frm" id="frm" method="get" action="<?php echo $search_url; ?>">
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-group">
                            
                            <div class="">
                                <label>Bhavana </label>
                                <select class="custom-select" name="search_by_bhavan" id="search_by_bhavan">
                                    <option value="" selected>Choose Bhavana...</option>
                                    <?php
                                        if(!empty($all_institutes)) {
                                            foreach($all_institutes as $institute) {
                                    ?>
                                            <option 
                                                <?php if((isset($_GET['search_by_bhavan']) && $_GET['search_by_bhavan'] == $institute->id )){ echo "selected";} ?>
                                                value="<?php echo $institute->id; ?>"><?php echo $institute->institute_name; ?>

                                            </option>
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            
                            <div class="">
                                <label >Course</label>
                                <select class="custom-select" name="search_by_course" id="search_by_course">
                                    <option value="" selected>Choose Course...</option>
                                    <?php
                                        if(!empty($all_courses)) {
                                            foreach($all_courses as $course){
                                    ?>
                                            <option
                                                <?php if( (isset($_GET['search_by_course']) && $_GET['search_by_course'] == $course->id )){ echo "selected";} ?>
                                                value="<?php echo $course->id; ?>"><?php echo $course->course_name; ?>
                                            </option>
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="">
                                <label >Department </label>
                                <select class="custom-select" name="search_by_department" id="search_by_department">
                                    <option value="" selected>Choose Department...</option>
                                    <?php
                                    if(!empty($all_departments)) {
                                        foreach($all_departments as $department) {
                                    ?>
                                        <option 
                                            <?php if( (isset($_GET['search_by_department']) && $_GET['search_by_department'] == $department->id )){ echo "selected";} ?>
                                            value="<?php echo $department->id; ?>"><?php echo $department->department_name; ?>
                                        </option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div  class="col-md-3">
                        <div class="form-group">
                            <label>Gender</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline24" name="gender" class="custom-control-input" <?php if((isset($_GET['gender']) &&  $_GET['gender'] == 'male' )){ echo "checked";} ?> value="male">
                                <label class="custom-control-label" for="customRadioInline24">Male</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline25" name="gender" class="custom-control-input" <?php if((isset($_GET['gender']) &&  $_GET['gender'] == 'female' )){ echo "checked";} ?> value="female">
                                <label class="custom-control-label" for="customRadioInline25">Female</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div  class="col-md-3">
                        <div class="form-group">
                            <label>PWD</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline26" name="search_by_pwd" class="custom-control-input" <?php if((isset($_GET['search_by_pwd']) && $_GET['search_by_pwd'] == '1' )){ echo "checked";} ?> value="1">
                                <label class="custom-control-label" for="customRadioInline26">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline27" name="search_by_pwd" class="custom-control-input" <?php if((isset($_GET['search_by_pwd']) &&  $_GET['search_by_pwd'] == '0' )){ echo "checked";} ?> value="0">
                                <label class="custom-control-label" for="customRadioInline27">No</label>
                            </div>
                        </div>
                    </div>
                    <div  class="col-md-3">
                        <div class="form-group">
                            <div class="">
                                <label >Nationality</label>
                                <select class="custom-select" name="search_nationality_type" id="search_nationality_type">
                                    <option value="" selected>Choose...</option>
                                    <option <?php if((isset($_GET['search_nationality_type']) &&  $_GET['search_nationality_type'] == 'indian' )){ echo "selected";} ?> value="indian">Indian</option>
                                    <option <?php if((isset($_GET['search_nationality_type']) && $_GET['search_nationality_type'] == 'foreign' )){ echo "selected";} ?> value="foreign">Other Nations</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div  class="col-md-3">
                        <div class="">
                            <label >Hostel</label>
                            <select class="custom-select" name="search_by_hostel" id="search_by_hostel">
                                <option value="" selected>Choose Hostel...</option>
                                <?php
                                if(!empty($all_hostels))
                                {
                                foreach($all_hostels as $hostel)
                                { ?>
                                <option <?php if( (isset($_GET['search_by_hostel']) && $_GET['search_by_hostel'] == $hostel->id )){ echo "selected";} ?> value="<?php echo $hostel->id; ?>"><?php echo $hostel->hostel_name; ?></option>
                                <?php
                                }
                                }
                                ?>
                            </select>
                            
                        </div>
                    </div>
                    <div  class="col-md-3">
                        <div class="">
                            <label >Category</label>
                            <select class="custom-select" name="search_by_category" id="search_by_category">
                                <option value="" >All</option>
                                <option <?php if( (isset($_GET['search_by_category']) && $_GET['search_by_category'] == 'general' )){ echo "selected";} ?> value="general" >Gen</option>
                                <option <?php if( (isset($_GET['search_by_category']) && $_GET['search_by_category'] == 'SC' )){ echo "selected";} ?> value="SC" >SC</option>
                                <option <?php if( (isset($_GET['search_by_category']) && $_GET['search_by_category'] == 'ST' )){ echo "selected";} ?> value="ST" >ST</option>
                                <option <?php if( (isset($_GET['search_by_category']) && $_GET['search_by_category'] == 'OBC' )){ echo "selected";} ?> value="OBC" >OBC</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    
                    <div  class="col-md-3">
                        <div class="form-group">
                            <label>Allotment</label><br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline22" name="search_by_allotment" class="custom-control-input" <?php if((isset($_GET['search_by_allotment']) && $_GET['search_by_allotment'] == '0' )){ echo "checked";} ?> value="0">
                                <label class="custom-control-label" for="customRadioInline22">New </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline23" name="search_by_allotment" class="custom-control-input" <?php if((isset($_GET['search_by_allotment']) && $_GET['search_by_allotment'] == '1' )){ echo "checked";} ?> value="1">
                                <label class="custom-control-label" for="customRadioInline23">Approved </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline232" name="search_by_allotment" class="custom-control-input" <?php if((isset($_GET['search_by_allotment']) && $_GET['search_by_allotment'] == '2' )){ echo "checked";} ?> value="2">
                                <label class="custom-control-label" for="customRadioInline232">Cancelled </label>
                            </div>
                        </div>
                    </div>

                    <div  class="col-md-3">
                        <div class="">
                            <label >Semester</label>
                            <select class="custom-select" name="search_by_semester" id="search_by_semester">
                                <option value="" selected>Choose Semester...</option>
                                <?php
                                $semesterArr = array('1'=>1,'2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6);
                                if(!empty($semesterArr))
                                {
                                foreach($semesterArr as $key => $value)
                                { ?>
                                <option <?php if( (isset($_GET['search_by_semester']) && $_GET['search_by_semester'] == $key )){ echo "selected";} ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php
                                }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Renewal Option</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline30" name="search_by_renewal" class="custom-control-input" <?php if((isset($_GET['search_by_renewal']) && $_GET['search_by_renewal'] == '1' )){ echo "checked";} ?> value="1">
                                <label class="custom-control-label" for="customRadioInline30">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline31" name="search_by_renewal" class="custom-control-input" <?php if((isset($_GET['search_by_renewal']) &&  $_GET['search_by_renewal'] == '0' )){ echo "checked";} ?> value="0">
                                <label class="custom-control-label" for="customRadioInline31">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="search_keyword">Search</label>
                            <input type="text" class="form-control" id="search_keyword" name="search_keyword" style="width: 80%; float: left;" placeholder="Enter student id or student name">
                            <button type="submit" class="btn btn-primary" style="width: 19%; float: right;">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <hr>
        <a href="<?php echo base_url('admin-download-allotment') . '?' . $query_string_received; ?>" class="btn btn-sm float-left btn-info" style="margin-left: 5px;">
            <i class="fas fa-download"></i>
            <span>Download XLS</span>
        </a>
        <a href="<?php echo base_url('admin-download-allotment-all') . '?' . $query_string_received; ?>" class="btn btn-sm float-left btn-info" style="margin-left: 5px;">
            <i class="fas fa-download"></i>
            <span>Download ALl XLS</span>
        </a>

        <?php
        if($this->session->flashdata('errormessage'))
        {
            echo '<span class="show_message" style="color:red;">'.$this->session->flashdata('errormessage').'</span>';
        }
        
        ?>
        <table id="example1" class="table table-striped" style="font-size: 14px; display: block; overflow: auto">
            <thead>
                <tr>
                    <th scope="col">Sl No</th>
                    <th scope="col">ID No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Final Score</th>
                    <th scope="col">Rank</th>
                    <th scope="col">Department</th>
                    <th scope="col">Bhavana</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Course</th>
                    <?php if($is_subadmin == 'N'){ ?>
                    <th scope="col" width="120px">Action</th>
                    <?php } ?>
                    <th scope="col">Date of Allotment</th>
                    <th scope="col">Date of Vacating</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Caste</th>
                    <th scope="col">Hostel</th>
                    <th scope="col">Assign Date </th>
                    <th scope="col">Approval Status</th>
                    <th scope="col" width="70px"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!empty($all_data)) {
                    $i =1;
                    foreach($all_data as $student) {
                        if($student->hostel_name!=''){
                            $hostel_name_row = $this->Allotmentmodel->get_row_result('hostel', ['id' => $student->hostel_name]);
                        }else{
                            $hostel_name_row = array();
                        }

                        $stu_hostel_name = $student->hostel_name;
                        $stu_hostel_code = $student->hostel_code;
                        $stu_block_no = $student->block_no;
                        $stu_floor_no = $student->floor_no;
                        $stu_room_no  = $student->room_no;
                        $stu_bed_no = $student->bed_no;
                ?>
                <tr>
                    <th scope="row"><?php echo ($i + ($search_page_number * $num_per_page)); ?></th>
                    <th scope="row"><?php echo $student->student_id; ?></th>
                    <td><?php echo $student->full_name; ?></td>
                    <td><?php echo ucfirst($student->final_score); ?></td>
                    <td><?php echo ucfirst($student->rank); ?></td>
                    <td><?php echo ucfirst($student->department_name); ?></td>
                    <td><?php echo ucfirst($student->institute_name); ?></td>
                    <td><?php //echo ucfirst($student->semester);
                        //current semester
                        $ad_year = substr($student->student_id, -4, 2);
                        $ad_date = '20'.$ad_year.'-07-01';
                        $start = new DateTime($ad_date);
                        $end   = new DateTime('today');
                        $diff  = $start->diff($end);
                        $month =  $diff->format('%y') * 12 + $diff->format('%m');
                        $semester = ceil($month/6);
                        echo $semester; 
                    ?></td>
                    <td><?php echo ucfirst($student->course_name); ?></td>
                    
                    <?php if($is_subadmin == 'N'){ ?>
                    <td>
                        <?php if($student->allotment_assigned == 0){ ?>
                        <a href="#" name="edit_allotment" class="edit_button btn btn-secondary btn-sm" ad_id="<?php echo $student->id; ?>" data-toggle="modal" data-target="#edit-allotment-data" title="Allotment Assign" ><i class="fa fa-window-close"></i></a>
                        <?php } ?>

                        <?php if($student->allotment_assigned == 1){ ?>
                        <a href="#" name="edit_allotment" class="edit_button btn btn-danger btn-sm" ad_id="<?php echo $student->id; ?>" data-toggle="modal" data-target="#edit-allotment-data" title="Allotment Assigned" ><i class="fa fa-check-circle"></i></a>
                        <a href="#" name="collect_payment" class="collect_payment btn btn-warning btn-sm" ad_id="<?php echo $student->id; ?>" data-toggle="modal" title="View Profile" ><i class="fa fa-eye"></i></a>
                        <a href="#" name="cancel_allotment_ad" class="cancel_allotment_button btn btn-secondary btn-sm" ad_id="<?php echo $student->id; ?>" data-toggle="modal" title="Allotment Cancel" ><i class="fa fa-times"></i></a>
                        <?php } ?>
                    </td>
                    <?php } ?>
                    <td><?php echo date('d-m-Y',strtotime($student->date_of_allotment)); ?></td>
                    <td><?php echo $student->vacating_year; ?></td>
                    <td><?php echo ucfirst($student->bloodgroupname); ?></td>
                    <td>
                        <?php
                        echo (!empty($student->caste_type && $student->caste_type == 'general')?'GEN':$student->caste_type);
                        ?>
                    </td>
                    <td><?php echo !empty($hostel_name_row) ? ucfirst($hostel_name_row->hostel_name) : '-'; ?></td>
                    <td ><?php echo (($student->hostel_assign_date!='0000-00-00 00:00:00') ? '<span style="color: #f51414; background: #f1f198;font-weight: bold;">'.date('d-m-Y',strtotime($student->hostel_assign_date)).'</span>':''); ?></td>
                    <td>
                        <?php if($student->is_released == '0'){?>
                        <?php if($student->is_approved == '1'){ ?>
                        Approved
                        <?php }else{ ?>
                        <a onclick="edit_approve('<?php echo $student->id; ?>','<?php echo $stu_hostel_name ; ?>','<?php echo $stu_hostel_code ; ?>','<?php echo $stu_block_no ; ?>','<?php echo $stu_floor_no ; ?>','<?php echo $stu_room_no ; ?>','<?php echo $stu_bed_no ; ?>');" name="edit_new" title="New Applicant" class="edit_new btn btn-danger btn-secondary btn-sm" ad_id="<?php echo $student->id; ?>" >New</a>
                        <?php } ?>
                        <?php } ?>
                        <br>
                        <br>
                        <?php if($student->is_cancelled == '1'){ ?>
                        <a name="edit_cancel" tooltip="Cancelled" class="edit_cancel btn btn-warning btn-sm" ad_id="<?php echo $student->id; ?>" >Cancelled</a>
                        <?php } ?>
                        <br>
                        <br>
                        <?php if($student->is_released == '1'){ ?>
                        <a name="edit_release" tooltip="Released" class="edit_released btn btn-danger btn-sm" ad_id="<?php echo $student->id; ?>" >Released</a>
                        <?php } ?>
                    </td>
                    <?php if($is_subadmin == 'N'){ ?>
                    <td>
                        <a href="<?php echo base_url('admin-edit-student') . '/' . $student->id;?>" target="blank" name="edit_student" title="Edit"><i class="far fa-edit"></i></a>
                        <a href="#" name="delete_ad"  title="Delete" class="delete_button" ad_id="<?php echo $student->id; ?>" data-toggle="modal" data-target="#delete-admin-data"><i class="fa fa-trash"></i></a>
                    </td>
                    <?php } ?>
                </tr>
                <?php
                $i++;
                }
                } ?>
            </tbody>
        </table>
    </div>

    <?php 
        $patterns = array();
        $replacements = array();
        $patterns[0] = '/&?page_no=[0-9]+/';
        $replacements[0] = '';

        $next_page_url = base_url('admin-allotment-list') . '?' .
            preg_replace($patterns, $replacements, $query_string_received) . 
            '&page_no='. ($search_page_number + 1);

        $previous_page_url = base_url('admin-allotment-list') . '?' .
            preg_replace($patterns, $replacements, $query_string_received) . 
            '&page_no='. ($search_page_number -1);
    ?>

    <ul class="pagination flex-wrap" style="max-width: 100%">
        <li class='page-item <?php if($search_page_number == 0) echo "disabled";?>'>
            <a class="page-link" href="<?php echo $previous_page_url; ?>" tabindex="-1">Previous</a>
        </li>
        <?php
            for( $ii = 1; $ii <= $search_num_pages; $ii++ ) {
                echo '<li class="page-item ' . (($ii == ($search_page_number + 1)) ? 'active' : '') . '">';

                echo '<a class="page-link" ' .
                    'href="' . base_url('admin-allotment-list') . 
                    '?' . preg_replace($patterns, $replacements, $query_string_received) . 
                    '&page_no='. ($ii -1) .
                    '">' . $ii . '</a>';

                echo '</li>';
            }
        ?>
        <li class='page-item <?php if($search_page_number == $search_num_pages-1) echo "disabled";?>'>
            <a class="page-link" href="<?php echo $next_page_url; ?>" tabindex="-1">Next</a>
        </li>
    </ul>

    <!-- Modal -->
    <div class="modal fade" id="edit-allotment-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Allotment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form onsubmit="return validateForm()" novalidate method="post" action="<?php echo base_url('admin-update-allotment'); ?>" name="add-form" id="editform1" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img id="edit_profile_image1" src="" alt="" class="img-thumbnail img-fluid">
                            </div>
                            <div class="col-md-9">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Student Id</label>
                                        <input type="text" id="edit_student_id1" name="student_id" class="form-control" placeholder="Enter ID no." value="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Full Name</label>
                                        <input type="text" id="edit_full_name1" name="full_name" class="form-control" placeholder="Enter full name" value="" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Name of Bhavana (Institute)</label>
                                        <select class="custom-select" name="institue_id" id="edit_institute_id1" disabled >
                                            <?php
                                            if($all_institutes){
                                            foreach($all_institutes as $institute)
                                            {
                                            ?>
                                            <option value="<?php echo $institute->id; ?>"><?php echo $institute->institute_name; ?></option>
                                            <?php  }
                                            }
                                            ?>
                                        </select>
                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Course Type</label>
                                        <select class="custom-select" name="course_id" id="edit_course_id1" disabled>
                                            <?php
                                            if(!empty($all_courses_edit))
                                            {
                                            foreach($all_courses_edit as $course)
                                            { ?>
                                            <option  value="<?php echo $course->id; ?>"><?php echo $course->course_name; ?></option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    
                                </div>
                                <div class="form-row">
                                    
                                    <div class="form-group col-md-6">
                                        <label>Name of Department</label>
                                        <select class="custom-select" name="department_id" id="edit_department_id1" disabled >
                                            <?php
                                            if($all_departments_edit){
                                            foreach($all_departments_edit as $department)
                                            {
                                            ?>
                                            <option value="<?php echo $department->id; ?>"><?php echo $department->department_name; ?></option>
                                            <?php  }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Date of Admission/Allotment</label>
                                        <input disabled class="form-control" name="date_of_allotment" id="edit_date_of_allotment"  value="">
                                    </div>
                                    
                                    
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Semester</label>
                                        <select disabled class="custom-select" name="semester" id="semester123" >
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Vacating Month/Year</label>
                                        <div class="col-md-5" style="float: left;">
                                            <select disabled class="custom-select" name="vacating_month" id="vacating_month123" >
                                                <option value="5" selected>May</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6" style="float: left;">
                                            <input readonly class="form-control" name="vacating_year" id="vacating_year123" placeholder="Vacating Year">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Hostel Id</label>
                                        <input disabled type="text" class="form-control" name="hostel_id1" id="edit_hostel_id" placeholder="Enter hostel id" value="" >
                                        <input type="hidden" name="hostel_id" id="edit_hostel_id11" value="" >
                                    </div>
                                    
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Hostel Name</label>
                                        <select class="custom-select" name="hostel_name" id="edit_hostel_name" >
                                            <?php
                                            if(!empty($all_hostels))
                                            {
                                            foreach($all_hostels as $hostel)
                                            { ?>
                                            <option  value="<?php echo $hostel->id; ?>"><?php echo $hostel->hostel_name; ?></option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Hostel Code</label>
                                        <input type="text" class="form-control" name="hostel_code" id="edit_hostel_code" placeholder="Enter hostel code" value="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Block</label>
                                        
                                        <select class="custom-select" name="block_no" id="edit_block_no" >
                                            <option selected>Choose...</option>
                                            <?php
                                            if(!empty($all_hostel_blocks))
                                            {
                                            foreach($all_hostel_blocks as $block)
                                            { ?>
                                            <option  value="<?php echo $block->id; ?>"><?php echo $block->block_name; ?></option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Floor</label>
                                        
                                        <select class="custom-select" name="floor_no" id="edit_floor_no" >
                                            <option selected>Choose...</option>
                                            <?php
                                            if(!empty($all_hostel_floors))
                                            {
                                            foreach($all_hostel_floors as $floor)
                                            { ?>
                                            <option  value="<?php echo $floor->id; ?>"><?php echo $floor->floor_name; ?></option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Room No.</label>
                                        
                                        <select class="custom-select" name="room_no" id="edit_room_no">
                                            
                                            
                                        </select>
                                        <span id="msg_edit_room_no" style="color:red"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Bed No</label>
                                        <input type="hidden" class="form-control" name="bed_no" id="edit_bed_no" placeholder="Enter Bed No" value="">
                                        <div id="beds_available" class="room"></div>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Email Id</label>
                                        <input type="text" class="form-control" name="email_id" id="edit_email_id1" placeholder="Enter email id" value="" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Mobile No</label>
                                        <input type="text" class="form-control" name="contact_no" id="edit_contact_no1" placeholder="Enter Contact No." value="" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" id="edit_address1" class="form-control" placeholder="Enter address" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Guardian Name</label>
                                    <input type="text" class="form-control" name="guardian_name" id="edit_guardian_name1" placeholder="Enter Guardian name" disabled>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Guardian Email Id</label>
                                        <input type="text" class="form-control" name="guardian_email_id" id="edit_guardian_email_id1"  placeholder="Enter Guardian email id" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Guardian Contact No</label>
                                        <input type="text" class="form-control" name="guardian_contact_no" id="edit_guardian_contact_no1" placeholder="Enter Guardian contact no." disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="student_id" id="student_id_edit" value="">
                        <input type="hidden" name="student_profile_image" id="student_profile_image" value="">
                        <input type="submit" name="edit_student" id="edit_student1" class="btn btn-danger" value=" Allotment Assign" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-admin-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form novalidate method="post" action="<?php echo base_url('admin-delete-student'); ?>" name="edit-form" id="editform" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Do you want to delete this data ?</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="del_ad_id" id="del_ad_id" value="">
                        <input type="submit" name="delete_ad" id="delete_ad" class="btn btn-danger" value="Confirm" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<!-- Allotment Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Allotment</h4>
                <button type="button" onclick="hide_allot_modal();"  class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="height: 116px;">
                <form id="allotform" method="post" action="<?php echo base_url('admin-allotment-student'); ?>">
                    <input type="hidden" id="students_ids" name="students_ids" value="">
                    <div class="row">
                        <div class="col-md-4" style="top: 10px;">
                            <label>Hostel Name</label>
                        </div>
                        <div class="col-md-8">
                            <select class="custom-select" name="hostel_name" id="hostel_name_allot" >
                                <option value="">Choose...</option>
                                <?php
                                if(!empty($all_hostels))
                                {
                                foreach($all_hostels as $hostel)
                                { ?>
                                <option  value="<?php echo $hostel->id; ?>"><?php echo $hostel->hostel_name; ?></option>
                                <?php } } ?>
                            </select>
                            <span style="color: red;" id="errAllot"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-8">
                            <input type="submit" name="allot" value="Save" class="btn btn-primary" style="margin-top: 9px; float: right;">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- cancel allotment modal -->
<div class="modal fade" id="delete-all-admin-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLongTitle">Delete Data</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                   </button>
               </div>
              

                   <div class="modal-body">
                       <div class="row">
                           <div class="col-md-12">
                               <div class="form-row">
                                   <div class="form-group col-md-12">
                                       <label>Do you want to delete this record ?</label>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="modal-footer">
                       <input type="hidden" name="del_ad_id" id="del_ad_id" value="">
                       <input type="submit" name="delete_ad" id="delete_ad_delete" data-dismiss="modal" class="btn btn-danger" value="Confirm" />
                   </div>
           </div>
       </div>
   </div>