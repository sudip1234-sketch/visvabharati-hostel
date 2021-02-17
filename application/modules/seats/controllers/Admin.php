<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for seat [HMVC]. Handles all the datatypes and methods required
 * for seat section of Visvabharati
 */
class Admin extends MX_Controller {

    /**
     * The constructor method of this class.
     *
     * @access  public
     * @param   none
     * @return  Loads all the method, helper, library etc. required throughout this class
     */
    public function __construct() {
        parent::__construct();
        admin_authenticate();
        $this->load->model('admin/Seatmodel');
    }

    /**
     * Index Page for this user controller.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function index() {


        $uri = $this->uri->segment(1);
       
        $all_data = $this->Seatmodel->load_all_data();
      
        $this->data             = array();
        $this->data['uri']      = $uri;
        $this->data['all_data'] = $all_data;

       
        $this->middle = 'seats/admin/list';
        $this->admin_layout();
    }

    public function form($id=NULL)
    {
        //admin_authenticate();
        $admin_uid=$this->session->userdata('admin_uid');
        $msg="Seats Added Successfully";
        $id = '1';
        $uri = $this->uri->segment(1);
        if(!empty($id))
        {
          $id=base64_decode(urldecode($id));
          $msg="Seats Updated Successfully";
        }

        if($this->input->post())
        {

           /* $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
            if ($this->form_validation->run() == TRUE) {*/
            $flg = $this->Seatmodel->modify($id);
            if (!empty($flg)) 
            {
                $this->session->set_flashdata('successmessage', $msg);
            }
            else 
            {
                $this->session->set_flashdata('errormessage', "Oops! Something went wrong.Please try again later.");
            }
            $redirect = base_url('admin-add-seat');
            redirect($redirect);
           /* }*/

        }
        else
        {  
            
            $data=array();

            $where['id']='1';
            $all_data=$this->Seatmodel->get_row_data('seats_available',$where);

            $this->data['all_hostels']      = $this->Seatmodel->get_result_data('hostel', ['is_active' => '1']);


            $this->data['uri']      = $uri;
            $this->data['result']   = $all_data;
            $this->data['floorNo']   = $this->Seatmodel->get_result_data('hostel_floor');
            $this->data['blockNo']   = $this->Seatmodel->get_result_data('hostel_block');
            $this->middle = 'seats/admin/form';
            $this->admin_layout();

        }
    }

    // 04122020
    // public function hostel_seat_details_by_id($id){
    //     $admin_uid=$this->session->userdata('admin_uid');
    //     $msg="Seats Added Successfully";
    //     $uri = $this->uri->segment(1);


    //     $data=array();
    //         $where['id']='1';
    //     $all_data=$this->Seatmodel->get_row_data('seats_available',$where);

    //     $this->data['all_hostels']      = $this->Seatmodel->get_result_data('hostel', ['is_active' => '1']);
    //     $this->data['uri']      = $uri;
    //     $this->data['result']   = $all_data;
    //     $this->data['floorNo']   = $this->Seatmodel->get_result_data('hostel_floor');
    //     $this->data['blockNo']   = $this->Seatmodel->get_result_data('hostel_block');




    //     $this->data['seats_available'] = $this->Seatmodel->get_row_data('seats_available', ['hostel_id' => $id]);

    //     $this->data['hostel_rooms_seats'] = $this->db->select('hostel_rooms_seats.*,hostel_block.block_name,hostel_floor.floor_name')->join('hostel_floor','hostel_floor.id = hostel_rooms_seats.floor_id','left')->join('hostel_block','hostel_block.id = hostel_rooms_seats.block_id','left')->where('hostel_rooms_seats.hostel_id',$id)->where('hostel_rooms_seats.is_active',1)->get('hostel_rooms_seats')->result();

    //     $this->middle = 'seats/admin/form';
    //     $this->admin_layout();
    // }


     /**
     * Status Change function of User module
     *
     * @access  public
     * @param   id
     * @return  success of failure of status change
     */
    public function details() {

        $id = $this->input->post('id');
        $data = $this->Seatmodel->get_row_data('seats_available', ['id' => $id]);
      
        if(!empty($data))
        {
            echo json_encode($data);
        }
        else
        {
            echo false;
        }
    }


    public function hostel_seat_details() {

        $id   = $this->input->post('id');
        $data['seats_available'] = $this->Seatmodel->get_row_data('seats_available', ['hostel_id' => $id]);
        // delete in active room seats in hostel
        $this->db->delete('hostel_rooms_seats', array('hostel_id' => $id,'is_active'=>0));

        $data['hostel_rooms_seats'] = $this->db->select('hostel_rooms_seats.*,hostel_block.block_name,hostel_floor.floor_name')->join('hostel_floor','hostel_floor.id = hostel_rooms_seats.floor_id','left')->join('hostel_block','hostel_block.id = hostel_rooms_seats.block_id','left')->where('hostel_rooms_seats.hostel_id',$id)->where('hostel_rooms_seats.is_active',1)->get('hostel_rooms_seats')->result();      
        if(!empty($data))
        {
            echo json_encode($data);
        }
        else
        {
            echo false;
        }
    }


     /**
     * Status Change function of User module
     *
     * @access  public
     * @param   id
     * @return  success of failure of status change
     */
    public function status($id) {
        $flg = $this->Seatmodel->status($id);

        if (!empty($flg)) {
            $this->session->set_flashdata('successmessage', 'Seat status changed successfully');
        } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
        }

        redirect(base_url('admin-seat-list'));
    }

    /**
     * Delete function of user module
     *
     * @access  public
     * @param   id
     * @return  success of failure of delete
     */
    public function delete() {
        $flg = $this->Seatmodel->delete();

        if (!empty($flg)) {
            $this->session->set_flashdata('successmessage', 'Data deleted successfully');
        } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
        }

        redirect(base_url('admin-seat-list'));
    }





    public function admin_save_RoomSeats()
    {
        //echo "<pre>"; print_r($_POST); die;

        $data = array(               
                'hostel_id' => $_POST['hostel_id'],
                'block_id' => $_POST['block_id'],
                'floor_id' => $_POST['floor_id'],
                'room_no' => $_POST['room_no'],
                'room_fee' => $_POST['room_fee'],
                'room_fee_foreigner' => $_POST['room_fee_foreigner'],
                'no_of_seats' => $_POST['no_of_seats'],
                'block' => $_POST['seat_block'],
                'beds_nos'=> implode(', ', $_POST['beds_nos'])
            );

     $save =  $this->db->insert(tablename('hostel_rooms_seats'), $data);

     //$rooms  = $this->Seatmodel->get_result_data('hostel_rooms_seats', ['hostel_id' => $_POST['hostel_id']]);
     $rooms  = $this->db->select('hostel_rooms_seats.*,hostel_block.block_name,hostel_floor.floor_name')->join('hostel_floor','hostel_floor.id = hostel_rooms_seats.floor_id','left')->join('hostel_block','hostel_block.id = hostel_rooms_seats.block_id','left')->where('hostel_rooms_seats.hostel_id',$_POST['hostel_id'])->where('hostel_rooms_seats.is_active',0)->get('hostel_rooms_seats')->result();
           

     $room_data =  '';
     $i = 1;
     $block_seats = 0;
     $non_block_seats = 0;
     $seatIds = array();
     if(!empty($rooms)){
        foreach ($rooms as $value) {
            if($value->block==1){
                $block_seats += $value->no_of_seats;
            }else{
                $non_block_seats += $value->no_of_seats;
            }

            if($value->block==1){
                $seatt = 'Blocked';
            }else{
                $seatt = '-';
            }
            array_push($seatIds, $value->id);


            $room_data .= '<tr class="idDetails" data-id="'.$value->id.'" >
                  <th scope="row">'.$i++.'</th>
                  <td>'.$value->block_name.'</td>
                  <td>'.$value->floor_name.'</td>
                  <td>'.$value->room_no.'</td>
                  <td>'.$value->room_fee.'</td>
                  <td>'.$value->room_fee_foreigner.'</td>
                  <td>'.$value->no_of_seats.'</td>
                  <td>'.$value->beds_nos.'</td>
                  <td>'.$seatt.'</td>                        
                </tr>';
        }
     }


     $room_data .= '##'.$block_seats.'##'.$non_block_seats.'##'.implode('@@', $seatIds);

     echo $room_data; exit();


    }
    public function admin_edit_RoomSeats()
    {
        //echo "<pre>"; print_r($_POST); die;

        $data = array(               
                'block_id' => $_POST['block_id_edit'],
                'floor_id' => $_POST['floor_id_edit'],
                'room_no' => $_POST['room_no'],
                'room_fee' => $_POST['room_fee'],
                'room_fee_foreigner' => $_POST['room_fee_foreigner'],
                'block' => $_POST['seat_block'],
                'beds_nos'=> $_POST['beds_nos']
            );

     $update = $this->db->where('id', $_POST['bedId'])->update(tablename('hostel_rooms_seats'), $data);

      //$rooms  = $this->Seatmodel->get_result_data('hostel_rooms_seats', ['hostel_id' => $_POST['hostel_id']]);
      $rooms  = $this->db->select('hostel_rooms_seats.*,hostel_block.block_name,hostel_floor.floor_name')->join('hostel_floor','hostel_floor.id = hostel_rooms_seats.floor_id','left')->join('hostel_block','hostel_block.id = hostel_rooms_seats.block_id','left')->where('hostel_rooms_seats.hostel_id',$_POST['hostel_id'])->where('hostel_rooms_seats.is_active',1)->get('hostel_rooms_seats')->result();
     $i = 1;
     $block_seats = 0;
     $non_block_seats = 0;
     if(!empty($rooms)){
        foreach ($rooms as $value) {
            if($value->block==1){
                $block_seats += $value->no_of_seats;
            }else{
                $non_block_seats += $value->no_of_seats;
            }
        }
     }

     $seats_available  = $this->Seatmodel->get_row_data('seats_available', ['hostel_id' => $_POST['hostel_id']]);

    $seats_available_after_release = (($non_block_seats * $seats_available->release_seats_in_percent)/100);
    $seats_not_released = $seats_available->total_seats - $seats_available_after_release;

     $data1 = array(
                'total_seats_booked'                => $block_seats,
                'total_seats_remaining'             => $non_block_seats,
                'seats_available_after_release'     => $seats_available_after_release,
                'seats_not_released'                => $seats_not_released               
            );

    $this->db->where('hostel_id', $_POST['hostel_id'])->update(tablename('seats_available'), $data1);

     $room_data = $block_seats.'##'.$non_block_seats;

      echo $room_data; exit();
    }



     public function get_selected_blockNo()
    {
       // echo "<pre>"; print_r($_POST); die;
        $blockNo   = $this->Seatmodel->get_result_data('hostel_block');          
        $data = '<select name="block_id_edit" id="block_id_edit_'.$_POST['bedId'].'" class="form-control" style="width: 75px;">';
     
     if(!empty($blockNo)){
        foreach ($blockNo as $value) {
            if($value->block_name==$_POST['block_name']){
                    $selected = "selected";
                }else{
                    $selected = "";
                }

            $data .= '<option value="'.$value->id.'" '.$selected.'>'.$value->block_name.'</option>';
        }
     }
     $data .= '</select>';     
     echo $data; exit();
    }

     public function get_selected_floorNo()
    {
       // echo "<pre>"; print_r($_POST); die;
        $floorNo   = $this->Seatmodel->get_result_data('hostel_floor');
        $data = '<select name="floor_id_edit" id="floor_id_edit_'.$_POST['bedId'].'" class="form-control" style="width: 60px;">';
     
     if(!empty($floorNo)){
        foreach ($floorNo as $value) {
            if($value->floor_name==$_POST['floor_name']){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
            $data .= '<option value="'.$value->id.'" '.$selected.'>'.$value->floor_name.'</option>';
        }
     }
     $data .= '</select>';     
     echo $data; exit();
    }


    public function savePerHotel()
    {
       // echo "<pre>"; print_r($_POST); die;
        $seats_not_released  = ($_POST['total_seats'] - $_POST['total_released_seats']);

        $data = array(
            'total_seats_booked'                => $_POST['total_seats_booked'],
            'total_seats_remaining'             => $_POST['total_seats_remaining'],
            'release_seats_in_percent'          => $_POST['release_seats_in_percent'],
            'seats_available_after_release'     => $_POST['total_released_seats'],
            'seats_not_released'                => $seats_not_released
        );

      $save = $this->db->where('hostel_id', $_POST['hostel_id'])->update(tablename('seats_available'), $data);


      // save release bed nos
      $bed_nos   = $this->Seatmodel->get_result_data('hostel_rooms_seats',array('hostel_id'=> $_POST['hostel_id'],'is_active'=>'1','block'=>'0'));

      //echo "<pre>"; print_r($bed_nos); die;

      $save_bed_no = 0;

      
      if(!empty($bed_nos)){
        foreach ($bed_nos as $value) {
            
            $exp_beds = explode(', ', $value->beds_nos);
            if($_POST['total_seats_remaining']!=$_POST['total_released_seats']){
             
            if($value->no_of_seats < $_POST['total_released_seats']){ // less               
                    if($save_bed_no==0){
                    $save_bed_no += $value->no_of_seats; 
                    $this->db->where('id', $value->id)->update(tablename('hostel_rooms_seats'), array('release_beds_nos'=>$value->beds_nos)); 
                    }else{

                        $get_beds = array();
                        $rest_bed = $_POST['total_released_seats'] - $save_bed_no;
                        if($rest_bed <= $value->no_of_seats){
                        for ($i=0; $i < $rest_bed; $i++) { 
                            array_push($get_beds, $exp_beds[$i]);
                        }
                        $save_bed_no += count($get_beds); 
                        $this->db->where('id', $value->id)->update(tablename('hostel_rooms_seats'), array('release_beds_nos'=>implode(", ", $get_beds)));
                        break;
                    }else{
                        for ($i=0; $i < $value->no_of_seats; $i++) { 
                            array_push($get_beds, $exp_beds[$i]);
                        }
                        $save_bed_no += count($get_beds); 
                        $this->db->where('id', $value->id)->update(tablename('hostel_rooms_seats'), array('release_beds_nos'=>implode(", ", $get_beds)));
                    }




                    }

                } else if($value->no_of_seats >= $_POST['total_released_seats']){ // greater
                    
                    $this->db->where('hostel_id', $_POST['hostel_id'])->update(tablename('hostel_rooms_seats'), array('release_beds_nos'=>'')); 

                    $get_beds = array();
                    for ($i=0; $i < $_POST['total_released_seats']; $i++) { 
                        array_push($get_beds, $exp_beds[$i]);
                    }
                    $save_bed_no += count($get_beds); 
                    //echo "<pre>"; print_r($get_beds); die;
                    $this->db->where('id', $value->id)->update(tablename('hostel_rooms_seats'), array('release_beds_nos'=>implode(", ", $get_beds))); 
                    break;
                }   


            }else{
                $this->db->where('id', $value->id)->update(tablename('hostel_rooms_seats'), array('release_beds_nos'=>$value->beds_nos)); 
            }         
        }
      }
       
      echo $save; exit();
    }

 public function admin_save_RoomSeats_edit()
    {
        //echo "<pre>"; print_r($_POST); die;

        if(!empty($_POST['ids'])){
            foreach ($_POST['ids'] as $value) {
                $this->db->where('id', $value)->update(tablename('hostel_rooms_seats'), array('is_active'=>1));
            }
        }
     $rooms  = $this->db->select('*')->where('hostel_id',$_POST['hostel_id'])->where('is_active',1)->get('hostel_rooms_seats')->result();

     $total_seats = 0;
     $block_seats = 0;
     $non_block_seats = 0;
     $seatIds = array();
     if(!empty($rooms)){
        foreach ($rooms as $value) {
            $total_seats += $value->no_of_seats;
            if($value->block==1){
                $block_seats += $value->no_of_seats;
            }else{
                $non_block_seats += $value->no_of_seats;
            }            
            array_push($seatIds, $value->id);  
        }
     }


     // calculate percentage
     $rooms_seats_available  = $this->db->select('*')->where('hostel_id',$_POST['hostel_id'])->get('seats_available')->row();
 
     $release_seats_in_percent = $rooms_seats_available->release_seats_in_percent;
     $seats_not_released = $rooms_seats_available->seats_not_released;
     //non block seat release
     $release = (($non_block_seats * $release_seats_in_percent)/100);
     $not_released = $non_block_seats - $release;

     $this->db->where('hostel_id',$_POST['hostel_id'])->update(tablename('seats_available'), array('seats_available_after_release'=>$release,'total_seats_booked'=>$block_seats,'total_seats_remaining'=>$non_block_seats,'seats_not_released'=>$not_released,'total_seats'=>$total_seats));

     // send data to show
     $data11['seats_available'] = $this->Seatmodel->get_row_data('seats_available', ['hostel_id' => $_POST['hostel_id']]);

    $data11['hostel_rooms_seats'] = $this->db->select('hostel_rooms_seats.*,hostel_block.block_name,hostel_floor.floor_name')->join('hostel_floor','hostel_floor.id = hostel_rooms_seats.floor_id','left')->join('hostel_block','hostel_block.id = hostel_rooms_seats.block_id','left')->where('hostel_rooms_seats.hostel_id',$_POST['hostel_id'])->where('hostel_rooms_seats.is_active',1)->get('hostel_rooms_seats')->result();      
        if(!empty($data11))
        {
            echo json_encode($data11); exit();
        }
        else
        {
            echo 'none'; exit();
        }

    }






    public function admin_check_RoomNo()
    {
        //echo "<pre>"; print_r($_POST); die;
        if($_POST['edit']==''){
        $hostel_rooms_seats = $this->db->select('*')->where('hostel_id',$_POST['hostel_id'])->where('block_id',$_POST['block_id'])->where('floor_id',$_POST['floor_id'])->where('room_no',$_POST['room_no'])->get('hostel_rooms_seats')->row();

    }else{
        $hostel_rooms_seats = $this->db->select('*')->where('hostel_id',$_POST['hostel_id'])->where('block_id',$_POST['block_id'])->where('floor_id',$_POST['floor_id'])->where('room_no',$_POST['room_no'])->where('id <>',$_POST['edit'])->get('hostel_rooms_seats')->row();
    }

        if(empty($hostel_rooms_seats)){
            echo "ok"; exit();
        }else{
            echo "not"; exit();
        }

    }

public function show_current_student() {
        $uri = $this->uri->segment(1);       
        $all_data = $this->Seatmodel->show_current_student();      
        $this->data             = array();
        $this->data['uri']      = $uri;
        $this->data['all_data'] = $all_data;   
        $this->data['seatId'] = @$_GET['seatId'];  
        $this->data['bed'] = @$_GET['bed'];     
       // echo "<pre>"; print_r($this->data['all_data']); die;  
        $this->middle = 'seats/admin/current_student';
        $this->admin_layout();
    }


    public function releaseBed($stid,$seatId,$bedno) {
         $flg = $this->Seatmodel->releaseBed($stid,$seatId,$bedno);

        if (!empty($flg)) {
            $this->session->set_flashdata('successmessage', 'Bed released successfully');
        } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
        }

        redirect(base_url('admin-add-seat'));
    }
}
/* End of file admin.php */
/* Location: ./application/modules/seat/controllers/admin.php */
