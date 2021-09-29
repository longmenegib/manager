<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Reports extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
       $this->load->model("report_model");
       $this->load->model('organization_model');
        $this->load->model('employee_model');
        $this->load->model('equipment_model');
        $this->load->model('token_model');
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id = 0)
	{
        if(!empty($id)){
            $data = $this->report_model->report_exist($id);
        }else{
            $data = $this->report_model->report_list();
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $requestData = json_decode(file_get_contents('php://input'), TRUE);
        $token_get = $this->input->post('token');
        $mac_get = $this->input->post('mac');
        $status = $this->input->post('status');

        //get token id
        $get_token = $this->token_model->check($token_get);

        //use token id to get equipment id and others
        //infos on the organization
        $equipData = array(
            'tokenid' => $get_token[0]['tokenid'],
            'macaddress' => $mac_get
        );
        $get_infos = $this->equipment_model->get_equipment_token($equipData);

        if(count($get_infos)>0){
            echo 'the equipment for this mac exists';
            //get the equipment id from the infos
            $equipId = $get_infos[0]['equipmentid'];

            //save the reports now in database with the current date
            $current_day = date('d-m-Y');
            $current_time = gmdate('H:i');
            echo $current_day.' '.$current_time;

            //check if the report with the current day exist already
            $check_report_data = array(
                'equipmentid'=> $equipId,
                'day' => $current_day
            );

            $check_report = $this->report_model->report_exist($check_report_data);
            
            //if report of the day were save already,
            //then we will update the end time
            //else means the user is connecting for the 
            //first time on the day
            if(count($check_report)>0){
                echo "the user is already connected";

                if($status == 'connected'){
                    //we have delete the end time
                    $reportInsert = array(
                        'end'=> "",
                        'status' => 'connected'
                    );
                    $this->report_model->update_report($reportInsert, $equipId);
                    echo 'user has connected back';
                }elseif($status == 'disconnected'){
                    //we have set the disconnected time
                    $reportInsert = array(
                        'end'=> $current_time,
                        'status' => 'disconnected'
                    );
                    $this->report_model->update_report($reportInsert, $equipId);
                    echo 'user has disconnected back';
                }
                
            }else{
                
                $reportInsert = array(
                    'equipmentid'=>$equipId,
                    'day' => $current_day,
                    'start'=> $current_time,
                    'status' => 'connected'
                );

                $this->report_model->save_report($reportInsert);
                echo "the user is connected";
            }
        }else{
            //send an error message cause the equipment is not
            //registered in this company with the mac address
            echo $mac_get.' Not registered in your company';
        }

        // $result = $this->report_model->save_report($data);
        // $this->response($get_infos, REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $result = $this->report_model->update_report($input, array('id'=>$id));
     
        $this->response(['report updated successfully.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $result = $this->report_model->delete_report($id);
       
        $this->response(['report deleted successfully.'], REST_Controller::HTTP_OK);
    }
    	
}