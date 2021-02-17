<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|   example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|   https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|   $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|   $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|   $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|       my-controller/my-method -> my_controller/my_method
*/

$route['default_controller']    = 'front';

$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;

$route['login']                 = 'front/login';
$route['logout']                = 'front/logout';
$route['index']                 = 'front/index';
$route['about']                 = 'front/about';
$route['index/(:any)']          = 'front/cmsdetails/$1';
$route['administration']        = 'front/administration';
$route['rulesandregulations']   = 'front/rulesandregulations';
$route['hostelallotment']       = 'front/hostelallotment';
$route['hostels']               = 'front/hostels';
$route['hostel-listing/(:any)'] = 'front/hostellisting/$1';
$route['admission']             = 'front/admission';
$route['admission-eligibility'] = 'front/admissioneligibility'; 
$route['readmission']           = 'front/readmission';
$route['seat-distribution']     = 'front/seatdistribution';
$route['seat-cancellation']     = 'front/seatcancellation';
$route['contact-us']            = 'front/contactus';
$route['student-profile']       = 'front/studentprofile';
$route['edit-student-profile']  = 'front/updatestudentprofile';
$route['add-student-profile']   = 'front/addstudentprofile';
$route['add-complaint']         = 'front/addcomplaint';
$route['student-form']          = 'front/studentform';
$route['student-submitted-form/(:any)']= 'front/studentsubmittedform/$1';
$route['add-reissue-id-card']   = "front/addreissueidcard";
$route['add-reissue-payment']   = "front/reissuepayment";
$route['add-payment']           = "front/addpayment";
$route['student-payment-details/(:any)']= 'front/studentpaymentdetails/$1';
$route['front-hostel-details']  = "front/hostel_details";
$route['notice-details']        = 'front/noticedetails';
//$route['notice-details/(:any)'] = 'front/noticedetails/$1';
// sudip 22062019 statr
$route['contact']           = 'front/contact_us';
// sudip 22062019 end


$route['check-otp/(:any)']      = "front/check_otp/$1";
$route['student-payment/(:any)/(:any)']= 'front/studentpayment/$1/$2';

$route['download-student-form/(:any)/(:any)']= 'front/download_student/$1/$2';

$route['student-form-done/(:any)']= 'front/studentpaymentWithOutAppFee/$1/$2';


$route['check-bhavanCode']  = "front/check_bhavanCode";
$route['check-courseType']  = "front/check_courseType";
$route['check-Department']  = "front/check_Department";



$route['printSlip/(:any)']  = "front/printSlip/$1";
$route['printAppSlip/(:any)']   = "front/printAppSlip/$1";






/**************** Admin ***************/

// For Admin Auth

$route['admin']                         = "Admin";
$route['check_admin_login']             = "Admin/check_login";
$route['admin_dashboard']               = "Admin/dashboard";
$route['admin_logout']                  = "Admin/admin_logout";

$route['admin_forgot_password']         = "Admin/check_forgot_password";


// Student List 
$route['admin-student-list']            = "student/Admin/index";
$route['admin-add-student']             = "student/Admin/form";
$route['admin-student-details']         = "student/Admin/details";
$route['admin-status-student']          = "student/Admin/status";
$route['admin-delete-student']          = "student/Admin/delete";
$route['admin-check-email']             = "student/Admin/check_email";
$route['get-student-sl-no']             = "student/Admin/get_sl_no";
$route['get-course-list']               = "student/Admin/get_course_list";
$route['get-subject-list']              = "student/Admin/get_subject_list";
$route['generate-student-id']           = "student/Admin/generate_student_id";
$route['check-student-exist']           = "student/Admin/check_student_id_exist";
$route['get-student-subject-details']   = "student/Admin/get_student_subject_details";







$route['admin-check-bhavanCode']    = "student/Admin/admin_check_bhavanCode";
$route['admin-check-courseType']    = "student/Admin/admin_check_courseType";
$route['admin-check-Department']    = "student/Admin/admin_check_Department";
$route['admin-approved-student']    = "student/Admin/admin_approved_student";

/**********************/

$route['front-check-email']             = "front/check_email";
$route['get-course-front-list']         = "front/get_course_list";
$route['get-subject-front-list']        = "front/get_subject_list";
$route['generate-student-id-front']     = "front/generate_student_id";
$route['check-student-exist-front']     = "front/check_student_id_exist";

$route['check-student-id-front']        = "front/check_student_id";

// Allotment List 
$route['admin-allotment-list'] = "allotment/Admin/index";
$route['admin-status-allotment/(:any)'] = "allotment/Admin/status/$1";
$route['admin-delete-allotment/(:any)'] = "allotment/Admin/delete/$1";
$route['admin-allotment-student-details'] = "allotment/Admin/details";
$route['admin-allotment-hostel-details'] = "allotment/Admin/hostel_details";
$route['admin-hostels-list'] = "allotment/Admin/hostel_list";
$route['admin-hostel-room-details'] = "allotment/Admin/hostel_rooms";
$route['admin-hostel-bed-details'] = "allotment/Admin/hostel_beds";
$route['admin-hostel-bed-booked'] = "allotment/Admin/hostel_beds_booked";
$route['admin-collect-payment'] = "allotment/Admin/get_student_details";
$route['admin-update-allotment'] = "allotment/Admin/form";
$route['admin-get-hostel-blocks'] = "allotment/Admin/get_hostel_blocks";
$route['admin-get-hostel-floor'] = "allotment/Admin/get_hostel_floor";
$route['admin-allotment-student'] = "allotment/Admin/admin_allotment_student";
$route['admin-allotment-cancel'] = "allotment/Admin/allotment_cancel";
$route['admin-release-seat'] = "allotment/Admin/release_seat";
$route['admin-download-allotment'] = "allotment/Admin/download_allotment";
$route['admin-download-allotment-pdf'] = "allotment/Admin/download_PDF";
$route['check-student-id-admin'] = "allotment/Admin/check_student_id_admin";
$route['admin-edit-student/(:any)'] = 'allotment/Admin/adminEditStudent/$1';
$route['admin-update-student-info/(:any)'] = 'allotment/Admin/modifyStudentInfo/$1';
$route['admin-allotmentcard-student-details'] = "allotmentcard/Admin/details";


// Payment List 
$route['admin-payment-list']                    = "payment/Admin/index";
$route['admin-add-payment']                     = "payment/Admin/form";
$route['admin-status-payment/(:any)']           = "payment/Admin/status/$1";
$route['admin-delete-payment/(:any)']           = "payment/Admin/delete/$1";
$route['admin-send-sms']                        = "payment/Admin/send_sms";
$route['admin-pay-status']                      = "payment/Admin/pay_status";
$route['admin-payment-hostel']                  = "payment/Admin/payment_hostel";
$route['admin-payment-mess']                    = "payment/Admin/payment_mess";
$route['admin-printAppSlip/(:any)']             = "payment/Admin/printAppSlip/$1";


// Allotment Card List 
$route['admin-allotmentcard-list']              = "allotmentcard/Admin/index";
$route['admin-status-allotmentcard/(:any)']     = "allotmentcard/Admin/status/$1";
$route['admin-delete-allotmentcard/(:any)']     = "allotmentcard/Admin/delete/$1";

// Hostel List 
$route['admin-hostelcard-list']                 = "hostelcard/Admin/index";
$route['admin-status-hostelcard/(:any)']        = "hostelcard/Admin/status/$1";
$route['admin-delete-hostelcard/(:any)']        = "hostelcard/Admin/delete/$1";


// Notice List 
$route['admin-notice-list']                     = "notice/Admin/index";
$route['admin-add-notice']                      = "notice/Admin/form";
$route['admin-notice-details']                  = "notice/Admin/details";
$route['admin-status-notice']                   = "notice/Admin/status";
$route['admin-delete-notice']                   = "notice/Admin/delete";
$route['admin-delete-notice-attachment']        = "notice/Admin/delete_notice_attachment";

// CMS List 
$route['admin-cms-list']                        = "cms/Admin/index";
$route['admin-add-cms']                         = "cms/Admin/form";
$route['admin-cms-details']                     = "cms/Admin/details";
$route['admin-status-cms/(:any)']               = "cms/Admin/status/$1";
$route['admin-delete-cms']                      = "cms/Admin/delete";

// Administration List 
$route['admin-administration-list']             = "administration/Admin/index";
$route['admin-add-administration']              = "administration/Admin/form";
$route['admin-administration-details']          = "administration/Admin/details";
$route['admin-status-administration']           = "administration/Admin/status";
$route['admin-delete-administration']           = "administration/Admin/delete";

// Complaint List 
$route['admin-complaint-list']                  = "complaint/Admin/index";
$route['admin-add-complaint']                   = "complaint/Admin/form";
$route['admin-complaint-details']               = "complaint/Admin/details";
$route['admin-read-status-complaint']           = "complaint/Admin/readstatus";
$route['admin-status-complaint']                = "complaint/Admin/status";
$route['admin-delete-complaint']                = "complaint/Admin/delete";

// New Complaint List 
$route['admin-newcomplaint-list']               = "newcomplaint/Admin/index";
$route['admin-add-newcomplaint']                = "newcomplaint/Admin/form";
$route['admin-newcomplaint-details']            = "newcomplaint/Admin/details";
$route['admin-status-newcomplaint']             = "newcomplaint/Admin/status";
$route['admin-delete-newcomplaint']             = "newcomplaint/Admin/delete";

// Hostel List 
$route['admin-hostel-list']                     = "hostel/Admin/index";
$route['admin-add-hostel']                      = "hostel/Admin/form";
$route['admin-hostel-details']                  = "hostel/Admin/details";
$route['admin-status-hostel']                   = "hostel/Admin/status";
$route['admin-delete-hostel']                   = "hostel/Admin/delete";
$route['admin-check-hostel-code']               = "hostel/Admin/check_hostelcode";

$route['admin-delete-hostel-image']             = "hostel/Admin/delete_hostel_image";
$route['admin-download-hostel-report-excel/(:any)']    = "hostel/Admin/download_hostel_report/$1";

// Payment Option List 
$route['admin-paymentoption-list']              = "paymentoption/Admin/index";
$route['admin-add-paymentoption']               = "paymentoption/Admin/form";
$route['admin-paymentoption-details']           = "paymentoption/Admin/details";
$route['admin-status-paymentoption']            = "paymentoption/Admin/status";
$route['admin-delete-paymentoption']            = "paymentoption/Admin/delete";

// Setting List 
$route['admin-setting-list']                    = "settings/Admin/index";
$route['admin-add-setting']                     = "settings/Admin/form";
$route['admin-setting-details']                 = "settings/Admin/details";
$route['admin-status-setting']                  = "settings/Admin/status";
$route['admin-delete-setting']                  = "settings/Admin/delete";

// Seat List 
$route['admin-seat-list']                       = "seats/Admin/index";
$route['admin-add-seat']                        = "seats/Admin/form";
$route['admin-seat-details']                    = "seats/Admin/details";
$route['admin-status-setting']                  = "seats/Admin/status";
$route['admin-delete-setting']                  = "seats/Admin/delete";
$route['admin-hostel-seat-details']             = "seats/Admin/hostel_seat_details";

$route['admin-save-RoomSeats']                  = "seats/Admin/admin_save_RoomSeats";
$route['admin-edit-RoomSeats']                  = "seats/Admin/admin_edit_RoomSeats";
$route['admin-get-selected-blockNo']            = "seats/Admin/get_selected_blockNo";
$route['admin-get-selected-floorNo']            = "seats/Admin/get_selected_floorNo";
$route['admin-savePer']                         = "seats/Admin/savePerHotel";

$route['admin-save-RoomSeats-edit'] = "seats/Admin/admin_save_RoomSeats_edit";
$route['admin-show-current-student'] = "seats/Admin/show_current_student";
$route['admin-releaseBed/(:any)/(:any)/(:any)'] = "seats/Admin/releaseBed/$1/$2/$3";


$route['admin-hostel-seat-details']             = "seats/Admin/hostel_seat_details";

$route['admin-check-RoomNo']            = "seats/Admin/admin_check_RoomNo";


// Role Management 
$route['admin-role-list']                       = "role/Admin/index";
$route['admin-add-role']                        = "role/Admin/form";
$route['admin-role-details']                    = "role/Admin/details";
$route['admin-status-role/(:any)']              = "role/Admin/status/$1";
$route['admin-delete-role']                 = "role/Admin/delete";
$route['admin-check-email-sub']             = "role/Admin/check_email";

// mess Charge
$route['admin-mess-charge']                     = "messCharge/Admin/index";
$route['admin-mess-session']                    = "messCharge/Admin/form";
$route['admin-check-year']                      = "messCharge/Admin/check_year";
$route['admin-messCharge-details']              = "messCharge/Admin/details";
$route['admin-delete-messCharge']               = "messCharge/Admin/delete";


// reissue Card
$route['admin-reissue-card-list']               = "student_card_reissue/Admin/index";
$route['admin-reissue-card-details']            = "student_card_reissue/Admin/details";
$route['admin-reissue-card']                    = "student_card_reissue/Admin/reissue_card";



// Payment List 
$route['admin-payment-report-list']             = "payment_report/Admin/index";
$route['admin-add-payment-report']              = "payment_report/Admin/form";
$route['admin-status-payment-report/(:any)']    = "payment_report/Admin/status/$1";
$route['admin-delete-payment-report/(:any)']    = "payment_report/Admin/delete/$1";
$route['admin-total-payment-details']           = "payment_report/Admin/total_payment_details";
$route['admin-download-paymentreport-excel']    = "payment_report/Admin/download_paymentreport";
//$route['admin-pay-status']                        = "payment_report/Admin/pay_status";
//$route['admin-payment-hostel']                    = "payment_report/Admin/payment_hostel";
//$route['admin-payment-mess']                  = "payment_report/Admin/payment_mess";
$route['admin-printSlip/(:any)']        = "payment_report/Admin/printSlip/$1";


// Application Report
$route['admin-application-report']          = "application_report/Admin/index";

// Allotment Report
$route['admin-allotment-report']            = "allotment_report/Admin/index";

$route['admin-notice-send']            = "notice_send/Admin/index";

// payment
$route['payment']           = "front/algorithm_AES";
$route['thankyou']          = "front/thankyou";
$route['cancel']            = "front/payment_cancel";

// print
$route['print-hos-payment-invoice/(:any)']            = "front/print_hos_payment_invoice/$1";

$route['download-details']  = "front/download_details";

$route['edit-profile']  = "front/editStudent";
$route['update-student-info/(:any)'] = 'front/modifyStudentInfo/$1';


