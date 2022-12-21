<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('memory_limit', '1024M');


class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id'))
            redirect('Login');
        date_default_timezone_set('Asia/Calcutta'); 
    }

    public function index() {
        $this->load->view('dashboard');
    }
    
    public function addSubscription(){
        $plan_id =  isset($_POST['plan_id']) ?  $_POST['plan_id'] : '';
        if (isset($_POST['submit']) && $_POST['submit'] == 'submit'){
            $data = array(
             'plan_id' => isset($_POST['plan_id']) ?  $_POST['plan_id'] : '',
             'plan_name' =>   isset($_POST['plan_name']) ?  $_POST['plan_name'] : '',
             'admission_fee' =>   isset($_POST['admission_fee']) ?  $_POST['admission_fee'] : '',
             'plan_amount' =>   isset($_POST['plan_amount']) ?  $_POST['plan_amount'] : '',
             'tenure' =>   isset($_POST['tenure']) ?  $_POST['tenure'] : '',
             'start_month' =>   isset($_POST['start_month']) ?  $_POST['start_month'] : '',
             'agent_commission' =>   isset($_POST['foreman_fees']) ?  $_POST['foreman_fees'] : '',
             'emi' =>   isset($_POST['emi']) ?  $_POST['emi'] : '',
             'foreman_fees' =>   isset($_POST['foreman_fees']) ?  $_POST['foreman_fees'] : '',
             'min_prize_amount' =>   isset($_POST['min_prize_amount']) ?  $_POST['min_prize_amount'] : '',
             'total_subscription' =>   isset($_POST['total_subscription']) ?  $_POST['total_subscription'] : '',  
             'months_completed' =>   isset($_POST['months_completed']) ?  $_POST['months_completed'] : '',  
             'total_months' =>   isset($_POST['total_months']) ?  $_POST['total_months'] : '',  
             'groups_counts' =>   isset($_POST['groups_counts']) ?  $_POST['groups_counts'] : '',  
             'end_date_for_subscription' =>   isset($_POST['end_date_for_subscription']) ?  $_POST['end_date_for_subscription'] : '',  
             'max_bid' =>   isset($_POST['max_bid']) ?  $_POST['max_bid'] : '',     
             'auction_type' =>   isset($_POST['auction_type']) ?  $_POST['auction_type'] : '',
             'variable_auction_percentage' =>   isset($_POST['variable_auction_percentage']) ?  $_POST['variable_auction_percentage'] : '',
             'plan_gst' =>   isset($_POST['plan_gst']) ?  $_POST['plan_gst'] : '',
            );
           if(empty($plan_id)){
                $res = Json_decode(callAPI('POST','addPlan',$data));
                if($res->status == 'success'){
                    $this->session->set_flashdata('success', 'Chit Plans added Successfully');
                    // $this->session->set_flashdata('success', 'Chit Plans added Successfully');
                    redirect('Dashboard/subscription_listing');
                }else{
                    $this->session->set_flashdata('Failure', 'Chit Plans added Failure');
                    // $this->session->set_flashdata('success', 'Post Added successfully');
                   redirect('Dashboard/subscription_listing'); 
                   
                }
           }else{
               $data = array(
                 'plan_id' => isset($_POST['plan_id']) ?  $_POST['plan_id'] : '',
                 'plan_name' =>   isset($_POST['plan_name']) ?  $_POST['plan_name'] : '',
                 'admission_fee' =>   isset($_POST['admission_fee']) ?  $_POST['admission_fee'] : '',
                 'plan_amount' =>   isset($_POST['plan_amount']) ?  $_POST['plan_amount'] : '',
                 'tenure' =>   isset($_POST['tenure']) ?  $_POST['tenure'] : '',
                 'start_month' =>   isset($_POST['start_month']) ?  $_POST['start_month'] : '',
                 'agent_commission' =>   isset($_POST['foreman_fees']) ?  $_POST['foreman_fees'] : '',
                 'emi' =>   isset($_POST['emi']) ?  $_POST['emi'] : '',
                 'foreman_fees' =>   isset($_POST['foreman_fees']) ?  $_POST['foreman_fees'] : '',
                 'min_prize_amount' =>   isset($_POST['min_prize_amount']) ?  $_POST['min_prize_amount'] : '',
                 'total_subscription' =>   isset($_POST['total_subscription']) ?  $_POST['total_subscription'] : '',  
                 'months_completed' =>   isset($_POST['months_completed']) ?  $_POST['months_completed'] : '',  
                 'total_months' =>   isset($_POST['total_months']) ?  $_POST['total_months'] : '',  
                 'groups_counts' =>   isset($_POST['groups_counts']) ?  $_POST['groups_counts'] : '',  
                 'end_date_for_subscription' =>   isset($_POST['end_date_for_subscription']) ?  $_POST['end_date_for_subscription'] : '',  
                 'max_bid' =>   isset($_POST['max_bid']) ?  $_POST['max_bid'] : '',     
                 'auction_type' =>   isset($_POST['auction_type']) ?  $_POST['auction_type'] : '',
                 'variable_auction_percentage' =>   isset($_POST['variable_auction_percentage']) ?  $_POST['variable_auction_percentage'] : '',
                 'plan_gst' =>   isset($_POST['plan_gst']) ?  $_POST['plan_gst'] : '',
                );
                
                $plan_id = isset($_POST['plan_id']) ?  $_POST['plan_id'] : '';
                $check_is_empty_slot = $this->db->where('plan_id',$plan_id)->where('slot_status','assigned')->get('tbl_orders')->num_rows();
                if($check_is_empty_slot == 0){
                    $res = Json_decode(callAPI('POST','addPlan',$data));
                    if($res->status == 'success'){
                        $this->session->set_flashdata('success', 'Chit Plans Update Successfully');
                        redirect('Dashboard/subscription_listing');
                    }else{
                       $this->session->set_flashdata('Failure', 'Chit Plans Update Failure');
                       redirect('Dashboard/subscription_listing'); 
                    } 
                }else{
                    $this->session->set_flashdata('Failure', $check_is_empty_slot.' slot is assigned');
                    redirect('Dashboard/subscription_listing'); 
                }
            }
        }else{
            $this->load->view('add-plan');
        }
    }
    
    public function subscription_listing(){
        $res = json_decode(callAPI('GET','getPlans'));
       if(!empty($res)){
	    if($res->status == 'success'){
	       $this->load->view('plan-listing', array('getPlans' => $res->data));
	    }else{
	        redirect('Dashboard/addSubscription');
	    }
       }else{
         $this->load->view('plan-listing');
       }
    }
    
    public function service_provider_listing(){
        $res = json_decode(callAPI('GET','get_service_provider'));
       if(!empty($res)){
	    if($res->status == 'success'){
	       $this->load->view('service_provider-listing', array('data' => $res->data));
	    }else{
	        redirect('Dashboard/addserviceprovider');
	    }
       }else{
         $this->load->view('service_provider-listing');
       }
    }
    
    public function addserviceprovider(){
         $this->load->view('add-service-provider');
    }
    public function add_service_provider(){
         $res = json_decode(callAPI('POST','addserviceprovider',$_POST));
    	    if($res->status == 'Success'){
    	        redirect('Dashboard/service_provider_listing');
    	    }else{
    		    redirect('Dashboard/service_provider_listing');
    		}
    }

    public function subscriptionDelete($id = '') {
        $this->db->Where('plan_id',$id)->delete('tbl_plans');
        redirect('Dashboard/subscription_listing');
    }

   public function addAgent(){ 
        $agent_id = $this->input->post('agent_id');
        if (isset($_POST['submit']) && $_POST['submit'] == 'submit'){
            $first_name = $this->input->post('fname');
            $last_name = $this->input->post('lname');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $gst_no = $this->input->post('gst_no');
            $company = $this->input->post('company');
            $payment_terms = $this->input->post('payment_terms');
            $address = $this->input->post('address');
            $city = $this->input->post('city');
            $state = $this->input->post('state');
            $country = $this->input->post('country');
            $data = array(
                'first_name' => isset($first_name) ? $first_name : '',
                'last_name' => isset($last_name) ? $last_name : '',
                'email' => isset($email) ? $email : '',
                'phone' => isset($phone) ? $phone : '',
                'gst_no' => isset($gst_no) ? $gst_no : '',
                'company' => isset($company) ? $company : '',
                'payment_terms' => isset($payment_terms) ? $payment_terms : '',
                'address' => isset($address) ? $address : '',
                'city' => isset($city) ? $city : '',
                'state' => isset($state) ? $state : '',
                'country' => isset($country) ? $country : '',
            );
         if(empty($agent_id)){
            $res = json_decode(callAPI('POST','addAgent',$data));
    	    if($res->status == 'Success'){
    	        redirect('Dashboard/agent_listing');
    	    }else{
    		    redirect('Dashboard/agent_listing');
    		}
         }else{
            $res = json_decode(callAPI('POST','agentUpdateDetails',$_POST));
    	    if($res->status == 'Success'){
    	        redirect('Dashboard/agent_listing');
    	    }else{
    		    redirect('Dashboard/agent_listing');
    		} 
         }
        }else{
            $this->load->view('add-agent');
        }
    }
    
    public function agent_listing() {
        $res = json_decode(callAPI('GET','getAllAgentDetails'));
	    if($res->status == 'success'){
	        $this->load->view('agent-listing', array('get_supplier' => $res->data));
	    }else{
	        redirect('Dashboard/addAgent');
	    }
    }
    

    public function agent_delete($id = '') {
        $this->db->where('agent_id', $id)->delete('tbl_agent');
        redirect('Dashboard/agent_listing');
    }

    public function change_status_agent($id = '') {
        $this->load->model('Supplier_Model');
        $this->Supplier_Model->change_status_supplier($id);
        redirect('Dashboard/supplier_listing');
    }
    
    
    public function addSubscriber(){ 
        $member_id = isset($_POST['member_id']) ?  $_POST['member_id'] : '';
        if (isset($_POST['submit']) && $_POST['submit'] == 'submit'){
            if(empty($member_id)){
                
            $submit_data = array(
        	     'name' =>   isset($_POST['name']) ? $_POST['name'] : '',
        	     'last_name' =>   isset($_POST['last_name']) ? $_POST['last_name'] : '',
        	     'father_name' => isset($_POST['father_name']) ? $_POST['father_name'] : '',
        	     'dob' => isset($_POST['dob']) ? $_POST['dob'] : '',
        	     'mobile' => isset($_POST['mobile']) ? $_POST['mobile'] : '',
        	     'secondary_mobile' => isset($_POST['secondary_mobile']) ? $_POST['secondary_mobile'] : '',
        	     'subscriber_type' => isset($_POST['subscriber_type']) ? $_POST['subscriber_type'] : '',
        	     'office_phone' => isset($_POST['office_phone']) ? $_POST['office_phone'] : '',
        	     'email' => isset($_POST['email']) ? $_POST['email'] : '',
        	     'address' => isset($_POST['address']) ? $_POST['address'] : '',
        	     'postal_address' => isset($_POST['potal_address']) ? $_POST['potal_address'] : '',
        	     'reference' => isset($_POST['reference']) ? $_POST['reference'] : '',
        	     'gender' => isset($_POST['gender']) ? $_POST['gender'] : '',
        	     'marital_status' => isset($_POST['marital_status']) ? $_POST['marital_status'] : '',
        	     'spouse_name' => isset($_POST['spouse_name']) ? $_POST['spouse_name'] : '',
        	     'village_city_name' => isset($_POST['village_city_name']) ? $_POST['village_city_name'] : '',
        	     'district' => isset($_POST['district']) ? $_POST['district'] : '',
        	     'state' => isset($_POST['state']) ? $_POST['state'] : '',
        	     'address_pincode' => isset($_POST['address_pincode']) ? $_POST['address_pincode'] : '',
        	     'nature_of_business' => isset($_POST['nature_of_business']) ? $_POST['nature_of_business'] : '',
        	     'business_start_date' => isset($_POST['business_start_date']) ? $_POST['business_start_date'] : '',
        	     'annivarsary_date' => isset($_POST['annivarsary_date']) ? $_POST['annivarsary_date'] : '',
        	     'no_kids' =>    isset($_POST['kids']) ? $_POST['kids'] : '',
        	     'dependents' => isset($_POST['dependents']) ? $_POST['dependents'] : '',
        	     'no_of_nominee' => isset($_POST['no_of_nominee']) ? $_POST['no_of_nominee'] : '',
        	     'nominee_name' => isset($_POST['nominee_name']) ? implode(',',$_POST['nominee_name']) : '',
        	     'nominee_relation' => isset($_POST['nominee_relation']) ? implode(',',$_POST['nominee_relation']) : '',
        	     'nominee_dob' => isset($_POST['nominee_dob']) ? implode(',',$_POST['nominee_dob']) : '',
        	     'nominee_precentage' => isset($_POST['nominee_precentage']) ? implode(',',$_POST['nominee_precentage']) : '',
        	     'nominee_gaurdian_name' => isset($_POST['nominee_gaurdian_name']) ? implode(',',$_POST['nominee_gaurdian_name']) : '',
        	     'pan_no' => isset($_POST['Pan']) ? $_POST['Pan'] : '',
        	     'income_type' => isset($_POST['income_type']) ? $_POST['income_type'] : '',
        	     'company_name' => isset($_POST['company_name']) ? implode(',',$_POST['company_name']) : '',
        	     'company_type' => isset($_POST['company_type']) ? $_POST['company_type'] : '',
        	     'designation' => isset($_POST['designation']) ? $_POST['designation'] : '',
        	     'work_address' => isset($_POST['work_address']) ? $_POST['work_address'] : '',
        	     'salary' =>  isset($_POST['salary']) ? $_POST['salary'] : '',
        	     'other_income' => isset($_POST['other_income']) ? $_POST['other_income'] : '',
        	     'experience'  => isset($_POST['experience']) ? $_POST['experience'] : '',
        	     'office_address' => isset($_POST['office_address']) ? $_POST['office_address'] : '',
        	     'employee_no' => isset($_POST['employee_no']) ? $_POST['employee_no'] : '',
        	     'gst_no' => isset($_POST['gst']) ? $_POST['gst'] : '',
        	     'annual_turnover'  => isset($_POST['annual_turnover']) ? $_POST['annual_turnover'] : '',
        	     'income_source'  => isset($_POST['income_source']) ? $_POST['income_source'] : '',
        	     'monthly_income' => isset($_POST['monthly_income']) ? $_POST['monthly_income'] : '',
        	     'car_category' => isset($_POST['car_category']) ? $_POST['car_category'] : '',
        	     'two_wheeler_category' => isset($_POST['two_wheeler_category']) ? $_POST['two_wheeler_category'] : '',
        	     'house_category'  => isset($_POST['house_category']) ? $_POST['house_category'] : '',
        	     'identity_category' => isset($_POST['identity_category']) ? $_POST['identity_category'] : '',
        	     'address_category'  => isset($_POST['address_category']) ? $_POST['address_category'] : '',
        	     'agent_id' => 1,
        	     'agent_comission' => 1,
        	     'adhaar_number' => isset($_POST['Aadhar']) ? $_POST['Aadhar'] : '',
        	     'incorporation_certificate' => isset($_POST['incorporation_certificate']) ? $_POST['incorporation_certificate'] : '',
        	     'docs' => isset($docs) ? $docs : '',
        	     'member_profile' => isset($_POST['upload_image']) ? $_POST['upload_image'] : 'no-image.png',
        	  );
                
               $res = json_decode(callAPI('POST','addMember',$submit_data));
               if(!empty($res)){
                if($res->status == 'success'){
                    $this->session->set_flashdata('success', 'Subscriber added Successfully');
        	        redirect('Dashboard/subscriber_listing');
        	    }else{
        	        $this->session->set_flashdata('Failure', 'Subscriber added Failure');
        		    redirect('Dashboard/subscriber_listing');
        		}
               }else{
                   $this->session->set_flashdata('Failure', 'Subscriber added Failure');
                 redirect('Dashboard/subscriber_listing');   
               }
            }else{
                $res = json_decode(callAPI('POST','subscriberUpdateDetails',$_POST));
               if(!empty($res)){
                if($res->status == 'success'){
                    $this->session->set_flashdata('success', 'Subscriber Update Successfully');
        	        redirect('Dashboard/subscriber_listing');
        	    }else{
        	        $this->session->set_flashdata('Failure', 'Subscriber Update Failure');
        		    redirect('Dashboard/subscriber_listing');
        		}
               }else{
                   $this->session->set_flashdata('Failure', 'Subscriber Update Failure');
                 redirect('Dashboard/subscriber_listing'); 
               }
            }
        }else{
            $this->load->view('add-member');
        }
    }
    
    public function subscriber_listing() {
        $res = json_decode(callAPI('POST','getAllMemberDetails'));
       if(!empty($res)){
	    if($res->status == 'success'){
	        $this->load->view('member-listing', array('get_member' => $res->data));
	    }else{
	        redirect('Dashboard/addSubscriber');
	    }
       }else{
         redirect('Dashboard/addSubscriber');  
       }
    }
    
    public function member_delete($id = '') {
        $this->db->where('member_id',$id)->delete('tbl_members');
        redirect('Dashboard/subscriber_listing');
    }

    public function subscriptionUpdate($plan_id=''){
        $data = array(
          'plan_id' =>   isset($plan_id) ?  $plan_id : ''
        );
        $check_is_empty_slot = $this->db->where('plan_id',$plan_id)->where('slot_status','assigned')->get('tbl_orders')->num_rows();
        if($check_is_empty_slot == 0){
            $res = json_decode(callAPI('POST','planUpdate',$data),true);
           if(!empty($res)){
            $data = $res['data'];
            if($res['status'] == 'success'){
             $this->load->view('add-plan',array('data' => $data));   
            }else{
              redirect('Dashboard/subscription_listing');  
            }
           }else{
              redirect('Dashboard/subscription_listing');  
           }
        }else{
            $this->session->set_flashdata('Failure', $check_is_empty_slot.' slot is assigned');
            redirect('Dashboard/subscription_listing'); 
        }
        
    }

    public function agentUpdate($agent_id=''){
        $data = array(
           'agent_id' =>   isset($agent_id) ?  $agent_id : ''
        );       
       $res=json_decode(callAPI('POST','agentUpdate',$data),true);
       if(!empty($res)){
        $data = isset($res['data']) ? $res['data'] : '';
        if($res['status'] == 'success'){
           $this->load->view('add-agent',array('data' => $data)); 
        }else{
          redirect('Dashboard/agent_listing');
        }
       }else{
         redirect('Dashboard/agent_listing');  
       }
    }

    public function subscriberupdate($member_id=''){
        $data = array(
           'member_id' => isset($member_id) ?  $member_id : ''
        );
        $res=json_decode(callAPI('POST','subscriberupdate',$data),true);        
       if(!empty($res)){
        $data = isset($res['data']) ? $res['data'] : '' ;
        if($res['status'] == 'success'){
          $this->load->view('add-member',array('data' => $data));    
        }else{
          redirect('Dashboard/subscriber_listing');
        }
       }else{
         redirect('Dashboard/subscriber_listing');
       }
    }

    public function agentDelete($agent_id=''){
        $data = array(
            'agent_id' =>   isset($agent_id) ?  $agent_id : ''
        );
        $res=callAPI('POST','agentDelete',$data);
        redirect('Dashboard/agent_listing');
    }
    
   
     public function GetGroupinplan($plan_id=''){
        $data = array(
            'plan_id' =>   isset($plan_id) ?  $plan_id : ''
        );
        $res=json_decode(callAPI('POST','getGroupDetails',$data),true); 
        $group_detail = isset($res['group_details']) ? $res['group_details'] : '';
        $res1 = isset($res['data'])? $res['data'] : '';
        $new_array = array();
        $plan_data = $this->db->where('plan_id',$plan_id)->get('tbl_plans')->row_array();
        foreach($res1 as $key=>$val){
            $slot_number = isset($val['slot_number']) ? $val['slot_number'] :'';
            $plan_id = isset($val['plan_id']) ? $val['plan_id'] :'';
            $member_id = isset($val['member_id']) ? $val['member_id'] :'';
            $get_chit = $this->db->where('slot_number',$slot_number)->where('plan_id',$plan_id)->where('member_id',$member_id)->get('tbl_chits')->row_array();
            if(!empty($get_chit)){
                $chit_taken = isset($get_chit['chit_month']) ? $get_chit['chit_month'] :'';
                $forgo_amount = isset($get_chit['forgo_amount']) ? $get_chit['forgo_amount'] :'';
            }else{
                $chit_taken ='-';
                $forgo_amount ='';
            }
            $val['chit_taken'] = $chit_taken;
            $val['forgo_amount'] = $forgo_amount;
            $new_array[] = $val;

        }
        // print_r($new_array);die;
        $subscriber_listing = json_decode(callAPI('GET','getAllMemberDetails'),true);
        $subscriber_listing1 = isset($subscriber_listing['data']) ? $subscriber_listing['data'] : '';
        $this->load->view('plan_group_member',array('data'=> $new_array,'subscriber_listing' => $subscriber_listing1,'group_detail'=>$group_detail,'data2' =>$plan_data));
    }
    
    public function getmoreviewmember($member_id=''){
        $data = array(
            'member_id' =>   isset($member_id) ?  $member_id : ''
        );
        $res=json_decode(callAPI('POST','getMembersDetails',$data),true); 
        $res1=json_decode(callAPI('POST','member_risk_calculation',$data),true);  
        $this->load->view('demo',array('data'=>$res['data'],'member_risk_calculate'=>$res1['data']));
    }

    public function getplan_history($member_id=''){
        $data = array(
            'member_id' =>   isset($member_id) ?  $member_id : '',
            'status'=> '0'
        );        
        $res=json_decode(callAPI('POST','plansPurchasedByMember',$data),true);  
        $member_data = $this->db->where('member_id',$member_id)->get('tbl_members')->row_array();
        if($res['status'] == 'success'){
            $this->load->view('member_active_plan',array('data'=>$res['data'],'data2' =>$member_data));
        }
        else{
            $this->session->set_flashdata('Failure','No Plan Available');
            redirect('Dashboard/getmoreviewmember/'.$member_id);
        }        
    }

    public function buy_active_plan($member_id=''){             
        $res=json_decode(callAPI('POST','getActivePlans'),true);  
       if(!empty($res)){
        if($res['status'] == 'success'){
            $member_data = $this->db->where('member_id',$member_id)->get('tbl_members')->row_array();
            $this->load->view('buy-plan-member',array('data'=>$res['data'],'member_id'=>$member_id,'data2' =>$member_data));
        }
        else{
            $this->session->set_flashdata('Failure','No Plan Available');     
            redirect('Dashboard/getmoreviewmember/'.$member_id);
        } 
       }else{
           $this->session->set_flashdata('Failure','No Plan Available');  
            redirect('Dashboard/getmoreviewmember/'.$member_id);
       }
    }

    public function buy_plan_by_agent(){  
        $member_member_detail = $this->db->where('member_id',$_POST['member_id'])->get('tbl_members')->row_array();
        $member_name = isset($member_member_detail['name']) ? $member_member_detail['name'] : '';
        $data = array(
            'member_id' =>   isset($_POST['member_id']) ?  $_POST['member_id'] : '',
            'plan_id' =>   isset($_POST['plan_id']) ?  $_POST['plan_id'] : '',
            'payment_mode' =>   isset($_POST['payment_mode']) ?  $_POST['payment_mode'] : '',
            'member_name' => isset($member_name) ?  $member_name : '',
        ); 
        $res=json_decode(callAPI('POST','BuyPlanByAgent',$data),true);  
        
        if($res['status'] == 'Success'){
            $this->load->view('buy-plan-member',array('data'=>$res['data'],'member_id'=>$_POST['member_id']));
            $this->session->set_flashdata('success', $res['message']);            
        }
        else{
            $this->session->set_flashdata('Failure', $res['message']);
            redirect('Dashboard/buy_active_plan/'.$_POST['member_id']);
        }        
    }

    public function plan_emi_due($member_id=''){  
        $getMemberDetails = $this->db->where('member_id',$member_id)->get('tbl_members')->row_array();
        
        $member_name =   isset($getMemberDetails['name']) ? $getMemberDetails['name'] : '';
        $member_mobile = isset($getMemberDetails['mobile']) ? $getMemberDetails['mobile'] : '';
        $member_id = isset($member_id) ? $member_id :'';
        
        $data = array(
            'member_id' =>   isset($member_id) ?  $member_id : '',           
        ); 
        $res = json_decode(callAPI('POST','getEmiInPlan',$data),true);  
       if(!empty($res)){
        if($res['status'] == 'success'){
            $this->load->view('plan_emi_due',array('data'=>$res['data'],'member_name' => $member_name ,'member_mobile' => $member_mobile,'member_id'=>$member_id));
        }
        else{
            $this->session->set_flashdata('Failure', 'Emi Not Available');
            redirect('Dashboard/getmoreviewmember/'.$member_id);
        } 
       }else{
           $this->session->set_flashdata('Failure','Emi Not Available');
         redirect('Dashboard/getmoreviewmember/'.$member_id);  
       }
    }
    
    public function cancelSubscription(){
        $data = array(
            'slot_number' => isset($_POST['slot_number']) ? $_POST['slot_number'] : '',
            'order_id' => isset($_POST['order_id']) ? $_POST['order_id'] : ''
        );
        $res=json_decode(callAPI('POST','cancelSubscription',$data),true); 
        if($res['status'] == 'success'){
            $output = 'Cancelled Successfully';
        }else{
            $output = 'Something Wrong';
        }
        echo json_encode($output); die;
    }
    
    public function resignSlotSubcription(){
        $data = array(
          'slot_number' => isset($_POST['slot_number']) ? $_POST['slot_number'] : '',
          'member_id' => isset($_POST['member_id']) ? $_POST['member_id']  : '',
          'order_id' => isset($_POST['order_id']) ? $_POST['order_id']  : ''
        );
        $res=json_decode(callAPI('POST','resignSlotSubcription',$data),true); 
        if($res['status'] == 'success'){
            $output = 'Insert Subscription Successfully';
        }else{
            $output = 'Something Wrong';
        }
        echo json_encode($output); die;
    }
    
    public function addCollateral(){
      if(isset($_POST['submit'])){
        $res = json_decode(callAPI('POST','addCollateral',$_POST),true);  
        if($res['status'] == 'success'){
            redirect('Dashboard/listCollateral');
        }else{
           $this->load->view('add-collateral'); 
        }
      }else{
         $this->load->view('add-collateral');
      }
    }
    
    public function listCollateral(){
       $res = json_decode(callAPI('GET','listCollateral'),true);  
       if($res['status'] == 'success'){
        $this->load->view('collateral-listing',array('getCollateral' => $res['data']));
       }else{
         $this->load->view('collateral-listing');
       } 
    }
    
    public function subCollateralList(){
       $collateral_id = isset($_POST['collateral_id']) ? $_POST['collateral_id'] : '';
       $getCollateral =  $this->db->where('parent_id',$collateral_id)->get('tbl_collateral_master')->result_array();
       $output = '';
       $output .=' <select class="form-control" name="sub_collateral">
                        <option value="0">Select Type</option>';
       foreach($getCollateral as $key => $value){ 
        $output .='<option value="'.$value["collateral_id"].'">'.$value["name"].'</option>';
       }
       $output .='</select>';
       echo json_encode($output); die;
    }
    
    public function addSubscriberCollateral(){
       $res = json_decode(callAPI('POST','addSubscriberCollateral',$_POST),true); 
       if($res['status'] == 'success'){
          $output = array(
           'status' => 'Success',
           'message' => 'Add Subscriber Collateral Successfully',
           'data' => []
          );
       }else{
          $output = array(
           'status' => 'Failure',
           'message' => 'Add Subscriber Collateral Unsuccessfully',
           'data' => []
          );
       }  
       echo json_encode($output); die;
    }
    
    public function getControlSheetWithFilter(){
        // print_r('dsfh');die;
        $date = date('M');
        $year = date('Y');
        if(!empty($_POST)){
            $data = $_POST;
        }
        else{
            $data = array(
               'mnth_filter' => $date, 
               'year' => $year, 
                );
        }
       $res = json_decode(callAPI('POST','getreportlist',$data),true);
       $res2 = json_decode(callAPI('POST','automaticReports',$data),true);
      if(!empty($res)){
       if($res['status'] == 'success'){
          $this->load->view('control-sheet-list',array('getControl' => $res['data'],'date_time' =>$data));
       }else{
         $this->load->view('control-sheet-list',array('getControl' => $res['data'],'date_time' =>$data));
       }  
      }else{
        $this->load->view('control-sheet-list',array('getControl' => $res['data'],'date_time' =>$data));  
      }
    }
    
    public function getSlotNumber(){
        $collateral_id = isset($_POST['collateral_id']) ? $_POST['collateral_id'] :  '';
        $member_id = isset($_POST['member_id']) ? $_POST['member_id'] : '';
        $getSlot = $this->db->where('slot_status','assigned')->where('member_id',$member_id)->get('tbl_orders')->result_array();
        $output = '';
        $output .='<div><label>Select Subscription</label><select id="slotnumber" class="form-control selectpicker" name="slotnumber" multiple data-live-search="true">
                        <option value="0">Select Type</option>';
       foreach($getSlot as $key => $value){ 
         $getemi = $this->db->where('member_id',$member_id)->where('plan_id',$value['plan_id'])->get('tbl_emi')->row_array();
          $plan_emi = isset($getemi['plan_emi']) ? $getemi['plan_emi'] : '';
          $divdent = isset($getemi['divident']) ? $getemi['divident'] : '';
          $revised = $plan_emi - $divdent;
          
        $output .='<option value="'.$value["slot_number"].'">'.$value["slot_number"].'-'.$revised.'</option>';
       }
       $output .='</select></div>   <script> $("#slotnumber").selectpicker(); </script>';
       echo json_encode($output); die;
    }
    
    public function reports($member_id = ''){
         $date = date('M');
         $year = date('Y');
        $data = array(
            'member_id' => isset($member_id) ? $member_id : '',
            'mnth_filter' => $date, 
            'year' => $year, 
        );
        // $res = json_decode(callAPI('POST','reports',$data),true);
        $member_data = $this->db->where('member_id',$member_id)->get('tbl_members')->row_array();
        $res = json_decode(callAPI('POST','reportsWithfilter',$data),true);
        $data23 = array('member_id'=>$member_id);
        $res25 = json_decode(callAPI('POST','getsubscriberdues',$data23),true);
        $plan_detail = $this->db->get('tbl_plans')->result_array();
        $sum_of_undistributed_divident = 0;
        foreach($plan_detail as $key=>$val){
            $check_orders = $this->db->where('plan_id',$val['plan_id'])->where('member_id',$member_id)->where('slot_status','assigned')->get('tbl_orders')->num_rows();
            if($check_orders > 0){
                $sum_data = $this->db->select_sum('divident_amount')->where('status !=','used')->where('plan_id',$val['plan_id'])->get('divident_port')->row_array();
                if(!empty($sum_data['divident_amount'])){
                    $sum_of_undistributed_divident += $sum_data['divident_amount'];
                }
            }
        }
        
       if(!empty($res)){
        if($res['status'] == 'success'){
            $this->load->view('reports',array('data'=>$res['data'] , 'member_detail'=>$res['member_data'] ,'date_time'=>$data,'data2' =>$member_data ,'due_amount' => $res25['data'] , 'und_share_of_dis' => $sum_of_undistributed_divident));
        }else{
            $this->load->view('reports',['data2' =>$member_data, 'due_amount' => $res25['data'] , 'und_share_of_dis' => $sum_of_undistributed_divident]);
        }
       }else{
         $this->load->view('reports',['data2' =>$member_data,'due_amount' => $res25['data'] , 'und_share_of_dis' => $sum_of_undistributed_divident]);  
       }
    }
    
    public function subscriberSummary($member_id = ''){
         $date = date('M');
        $year = date('Y');
        $member_id =  isset($member_id) ? $member_id : '';
        $member_data = $this->db->where('member_id',$member_id)->get('tbl_members')->row_array();
        if(!empty($_POST)){
             $data = array(
               'mnth_filter' => $_POST['mnth_filter'], 
               'year' => $_POST['year'], 
               'member_id' => $_POST['member_id'], 
                );
        }
        else{
            $data = array(
               'mnth_filter' => $date, 
               'year' => $year, 
               'member_id' => isset($member_id) ? $member_id : ''
                );
        }
        $res = json_decode(callAPI('POST','reportsWithfilter',$data),true);
        // print_r($res);die;
       if(!empty($res)){
        if($res['status'] == 'success'){
            $this->load->view('subscriber_summary',array('data'=>$res['data'] , 'member_detail'=>$res['member_data'] ,'date_time'=>$data,'data2' =>$member_data));
        }else{
            $this->load->view('subscriber_summary',array('data'=>$res['data'] , 'member_detail'=>$res['member_data'] ,'date_time'=>$data,'data2' =>$member_data));
        }
       }else{
         $this->load->view('subscriber_summary',array('data'=>$res['data'] , 'member_detail'=>$res['member_data'] ,'date_time'=>$data,'data2' =>$member_data));  
       }
    }
    
    // public function subscriberSummary($member_id = ''){
    //     $data = array(
    //         'member_id' => isset($member_id) ? $member_id : ''
    //     );
    //     $res = json_decode(callAPI('POST','reports',$data),true);
    //     $res2  = json_decode(callAPI('POST','member_risk_calculation',$data),true);
    //     $paid_due = isset($res2['due_paid']) ? $res2['due_paid'] :'';
    //   if(!empty($res)){
    //     if($res['status'] == 'success'){
    //         $this->load->view('subscriber_summary',array('data'=>$res['data'],'paid_due'=>$paid_due));
    //     }else{
    //         $this->load->view('reports');
    //     }
    //   }else{
    //      $this->load->view('reports');  
    //   }
    // }
    
    public function planAvailableForAuction(){
        // $this->load->view('comming-soon'); 
        $res = json_decode(callAPI('get','getPlansAvailableForAuction'),true);  
      if(!empty($res)){
        if($res['status'] == 'success'){
            $this->load->view('plan-available-for-auction',array('data'=>$res['data']));
        }else{
          $this->load->view('plan-available-for-auction'); 
        }
      }else{
          $this->load->view('plan-available-for-auction'); 
      }
    }
    
    public function planGroupForAuction($plan_id =""){
        $data = array(
           'plan_id' => isset($plan_id) ? $plan_id : ''
        );
        $res=json_decode(callAPI('POST','plangroupsforauction',$data),true);
        $plan_data = $this->db->where('plan_id',$plan_id)->get('tbl_plans')->row_array();
       if(!empty($res)){
        $result = array();
        foreach ($res['data'] as $key => $value) {
            $result[$key] =  $value;
            $result[$key]['plan_name'] = isset($plan_data['plan_name']) ? $plan_data['plan_name'] : '';
        }
        if($res['status'] == 'success'){ 
            $this->load->view('plan-group-for-auction',['data' => $result ,'data2' =>$plan_data['plan_name'] ]);
        }else{
            redirect('Dashboard/planAvailableForAuction');
        }
       }else{
         redirect('Dashboard/planAvailableForAuction');  
       }
    }
    
    public function liveAuction($auction_id = ''){
        $group_name = isset($_POST['group_name']) ? $_POST['group_name'] : '';
        $forman_fees = isset($_POST['forman_fees']) ? $_POST['forman_fees'] : '';
        $plan_name = isset($_POST['plan_name']) ? $_POST['plan_name'] : '';
        $group_id = isset($_POST['group_id']) ? $_POST['group_id'] : '';
        
        $auction_detail = $this->db->where('auction_id',$auction_id)->get('tbl_auction')->row_array();
        $plan_detail = $this->db->where('plan_id',$auction_detail['plan_id'])->get('tbl_plans')->row_array();
        $group_detail = $this->db->where('group_id',$auction_detail['group_id'])->get('tbl_groups')->row_array();
        // print_r($plan_detail);die;
        
        $data2 = array(
            'plan_id' => $auction_detail['plan_id'],
            'group_id' => $group_id,
            'plan_name' => $plan_detail['plan_name'],
            'group_name' => $group_detail['group_name'],
            );
        
        $auction_type_status = array(
            'type' => 'simple',
            );
        $this->db->where('auction_id',$auction_id)->update('tbl_auction',$auction_type_status);
        
         $dataBid = array(
            'auction_id' => isset($auction_id) ? $auction_id : '',
         );
         $getBidsForAuction= json_decode(callAPI('POST','getbidsforauction',$dataBid),true);
         
         $dataMemberAuction = array(
           'auction_id' => isset($auction_id) ? $auction_id : '',
            'type' => isset($type) ? $type : 'individual',
        //   'type' => isset($type) ? $type : 'combined',
         );
        
        $getMembersInAuction= json_decode(callAPI('POST','getMembersInAuction',$dataMemberAuction),true);
        // echo'<pre>';
        // print_r($getMembersInAuction);die;

        $dataliveAuction = array(
         'getBidsForAuction' => isset($getBidsForAuction['data']) ? $getBidsForAuction['data'] : '',
         'getMembersInAuction' => isset($getMembersInAuction['data']) ? $getMembersInAuction['data'] : '',
         'group_name' => isset($group_detail['group_name']) ? $group_detail['group_name'] :'',
         'plan_name' => isset($plan_detail['plan_name']) ? $plan_detail['plan_name'] :'',
         'forman_fees' => isset($plan_detail['min_bid_amount']) ? $plan_detail['min_bid_amount'] :'',
         'auction_id' => $auction_id,
         'group_id' => $group_id,
         'checkbox' => '',
         'plan_id' => $auction_detail['plan_id'],
            'auction_no' => 'Live Auction'.'[ '.$auction_detail['month'].' ]',
            'plan_name' => $plan_detail['plan_name'],
            'group_name' => $group_detail['group_name'],
            'group_id' => $auction_detail['group_id'],
        );
        
        if(!empty($dataliveAuction)){
            $this->load->view('live-auction-2',$dataliveAuction);
        }else{
          $this->load->view('live-auction-2');  
        }
    }
    
     public function liveAuction2($auction_id = ''){
        // print_r($auction_id);die;
        
        $auction_detail = $this->db->where('auction_id',$auction_id)->get('tbl_auction')->row_array();
        $plan_detail = $this->db->where('plan_id',$auction_detail['plan_id'])->get('tbl_plans')->row_array();
        $group_detail = $this->db->where('group_id',$auction_detail['group_id'])->get('tbl_groups')->row_array();
        
        $auction_type_status = array(
            'type' => 'combined',
            );
        $this->db->where('auction_id',$auction_id)->update('tbl_auction',$auction_type_status);
        
         $dataBid = array(
            'auction_id' => isset($auction_id) ? $auction_id : '',
         );
         $getBidsForAuction= json_decode(callAPI('POST','getbidsforauction',$dataBid),true);
         
         $dataMemberAuction = array(
           'auction_id' => isset($auction_id) ? $auction_id : '',
           'type' => isset($type) ? $type : 'combined',
         );
         
         $getplan_name = $this->db->where('auction_id',$auction_id)->get('tbl_auction')->row_array();
         $getorder = $this->db->where('slot_status','assigned')->where('plan_id',$getplan_name['plan_id'])->get('tbl_orders')->result_array(); // update to not get groups
        
        $getMembersInAuction= json_decode(callAPI('POST','getMembersInAuction',$dataMemberAuction),true);
        // echo'<pre>';
        // print_r($getorder);die;

        $dataliveAuction = array(
         'getBidsForAuction' => isset($getBidsForAuction['data']) ? $getBidsForAuction['data'] : '',
         'getMembersInAuction' => isset($getMembersInAuction['data']) ? $getMembersInAuction['data'] : '',
        // 'getMembersInAuction' => isset($getorder) ? $getorder : '',
         'group_name' => isset($group_name) ? $group_name : '',
         'plan_name' => $plan_detail['plan_name'],
         'forman_fees' => $plan_detail['min_bid_amount'],
         'auction_id' => $auction_id,
         'group_id' => isset($group_id) ? $group_id :'',
         'checkbox' => 'checked',
         'plan_id' => $auction_detail['plan_id'],
         'auction_no' => 'Live Auction'.'[ '.$auction_detail['month'].' ]',
            'plan_name' => $plan_detail['plan_name'],
            'group_name' => $group_detail['group_name'],
            'group_id' => $auction_detail['group_id'],
        );
        
        if(!empty($dataliveAuction)){
            $this->load->view('live-auction-2',$dataliveAuction);
        }else{
          $this->load->view('live-auction2-');  
        }
    }
    
    public function SwitchCombinedAuction(){
        $dataMemberAuction = array(
           'auction_id' => isset($_POST['auction_id']) ? $_POST['auction_id'] : '',
           'type' => isset($_POST['type']) ? $_POST['type'] : ''
        );
       $getMembersInAuction= json_decode(callAPI('POST','getMembersInAuction',$dataMemberAuction),true);
    //   print_r($getMembersInAuction);die;
       $output = '';
       $output .='<div class="container" id="test">
                    <h5>List of open Sub ld For Auction</h5>';
                    if (isset($getMembersInAuction['data']) && is_array($getMembersInAuction['data'])) { 
                    foreach($getMembersInAuction['data'] as $key => $values) { 
                        
    			 $output .='<div class="list-group">
    				     <input type="hidden" name="auction_id" value="'.$_POST["auction_id"].'" id="auction_id">
    				     <input type="hidden" name="group_id" value="'.$_POST["group_id"].'" id="group_id">
    				  	<div class="row" style="margin-top: 15px;"> 
    					    <button class="col-md-3" style="border-radius: 12px; background: #FF4000;color: white; margin-left: 10px;"><span style="color:black">['.$values["slot_number"].'] </span>-'.$values["name"].'</button>
    					    <input class="col-md-3" value="" id="forGoAmount_'.$values["member_id"].'"  name="for_go_amount" type="text" placeholder="Bid Amt" style="border-radius: 12px; margin-left: 10px;background: #A4A4A4;color: white;">
    					    <button class="col-md-3 " type="submit" name="submit" style="border-radius: 12px; background: #0B0719; margin-left: 10px;color: white;" onclick="openModal('.$values["member_id"].')" >Submit</button>
    				    </div>
    				  </div>';
                   }
                   }
			$output .'</div>';
       echo json_encode($output); die;
    }
    
    public function endAuction($auction_id = ''){
        $data = array(
            'auction_id' => isset($auction_id) ? $auction_id : '',
        );
        $saveBidByAgent= json_decode(callAPI('POST','endauctionnow',$data),true);      
        if($saveBidByAgent['status'] == 'success'){
            $this->session->set_flashdata('success', 'Auction close');
            redirect("Dashboard/planAvailableForAuction");
        }
        else{
            $this->session->set_flashdata('Failure','Auction is already close');
            redirect("Dashboard/planAvailableForAuction");
        }
    }
    
    public function endAuctionNow(){
        $data = array(
            'auction_id' => isset($_POST['auction_id']) ? $_POST['auction_id'] : '',
        );
        $saveBidByAgent= json_decode(callAPI('POST','endauctionnow',$data),true); 
            if($saveBidByAgent['status'] == 'success'){
              $output = 1;   
           }else{
              $output = 1;    
           }
       echo json_encode($output);
        
    }
    
    public function cancleAuction($auction_id = ''){
        $data = array(
            'auction_id' => isset($auction_id) ? $auction_id : '',
        );
        $cancelAuction= json_decode(callAPI('POST','cancelAuction',$data),true);     
        if($cancelAuction['status'] == 'success'){
            $this->session->set_flashdata('success', 'Cancle auction');
            redirect("Dashboard/planAvailableForAuction");
        }
        else{
            $this->session->set_flashdata('Failure','Cancel auction already');
            redirect("Dashboard/planAvailableForAuction");
        }
    }
    
    public function saveBidByAgent(){
        $data = array(
            "member_id" => isset($_POST['member_id']) ? $_POST['member_id'] : '',
            "auction_id" => isset($_POST['auction_id']) ? $_POST['auction_id'] : '',
            "for_go_amount" => isset($_POST['for_go_amount']) ? $_POST['for_go_amount'] : '',
            "agent_id" => isset($_POST['agent_id']) ? $_POST['agent_id'] : '',
            "group_id" => isset($_POST['group_id']) ? $_POST['group_id'] : '',
            "forman_fees" => isset($_POST['forman_fees']) ? $_POST['forman_fees'] : '',
            "slot_number" => isset($_POST['slot_number']) ? $_POST['slot_number'] : '',
         );
        //  print_r($data);die;
         
        $saveBidByAgent= json_decode(callAPI('POST','saveBidByAgent',$data),true);
        if($saveBidByAgent['status'] == 'success'){
          $output = $saveBidByAgent['message'];   
       }else{
          $output = $saveBidByAgent['message'];    
       }
       echo json_encode($output);
    }
    

    public function savefinalbid(){
        $data = array(
            "bid_id" => isset($_POST['bid_id']) ? $_POST['bid_id'] : '',
            "slot_number" => isset($_POST['slot_number']) ? $_POST['slot_number'] : ''
        );
       $savefinalbid= json_decode(callAPI('POST','savefinalbid',$data),true); 
       $output = '';
        if($savefinalbid['status'] == 'success'){
          $output .= $savefinalbid['message'];   
       }else{
          $output .= $savefinalbid['message'];    
       }
       echo json_encode($output);
    }
    
    public function startAuction(){
        // $originalDate = $_POST['start_date'];
        // $newDate = date("m/d/Y", strtotime($originalDate));
        $data = array(
            'plan_id' => isset($_POST['plan_id']) ?$_POST['plan_id'] :'',
            'group_id' => isset($_POST['group_id']) ?$_POST['group_id'] :'',
            'start_date' => isset($newDate) ? $newDate :'',
            'startTime' => isset($_POST['start_time']) ?$_POST['start_time'] :'',
            'end_time' => isset($_POST['end_time']) ?$_POST['end_time'] :'',
            );
      $startAuction= json_decode(callAPI('POST','startAuction',$data),true); 
      $auction_data = $startAuction['data'];
      $auction_id = $auction_data['id'];
      if($startAuction['status'] == 'success'){
          $this->session->set_flashdata('success', 'Start Auction Successfully');
          redirect('Dashboard/liveAuction/'.$auction_id);
      }else{
          $this->session->set_flashdata('Failure', 'Start Auction Failure');
          redirect('Dashboard/planAvailableForAuction');  
      }
       
    }
    
    public function startAuction2(){
        // print_r($_POST);die;
        $getplan = $this->db->where('plan_id',$_POST['plan_id'])->get('tbl_plans')->row_array();
			$foreman_fees = $getplan['foreman_fees'];
			$min_prize_amount = $getplan['min_prize_amount'];
			$plan_amount = $getplan['plan_amount'];
			$months_completed = $getplan['months_completed'];

            $month = isset($_POST['month']) ? $_POST['month'] :'';
            if(empty($month)){
                $newDate = date("F-Y", strtotime($_POST['month2']));  
                
                $get_data = $this->db->where('plan_id',$_POST['plan_id'])->where('group_id',$_POST['group_id'])->where('month',$newDate)->get('tbl_auction')->num_rows();
                if($get_data != 0){
                    $update_tenure = $getplan['tenure'] - 1;
                    $update_array = array(
                        'tenure' => $update_tenure
                        );
                    $this->db->where('plan_id',$_POST['plan_id'])->update('tbl_plans',$update_array);
                }else{
                    // echo $newDate;
                    $getLastAuction = $this->db->select('month')->where('plan_id',$_POST['plan_id'])->where('group_id',$_POST['group_id'])->order_by('auction_id','desc')->get('tbl_auction')->row_array();
                    $Last_auction_date = date('m', strtotime($getLastAuction['month']));
                    $Current_auction_date = date('m', strtotime($newDate));
                    $defference = $Current_auction_date - $Last_auction_date;
                    if($defference > 0){
                        $update_array = array(
                            'tenure' => $defference + $getplan['tenure'] -1,
                        );
                        $this->db->where('plan_id',$_POST['plan_id'])->update('tbl_plans',$update_array);
                    }else{
                        $update_array = array(
                            'tenure' =>  $getplan['tenure'] + $defference -1,
                        );
                        $this->db->where('plan_id',$_POST['plan_id'])->update('tbl_plans',$update_array);
                    }
                }
            }else{
                $newDate = date("F-Y", strtotime($_POST['month']));  
            }
             
           $data = array(
             'plan_id' => isset($_POST['plan_id']) ? $_POST['plan_id'] :'',
             'auction_no' => isset($_POST['auction_no']) ? $_POST['auction_no'] :'',
			 'group_id' => isset($_POST['group_id']) ? $_POST['group_id'] :'',
             'start_date' => isset($start_date) ? $start_date : '',
             'end_date' => isset($start_date) ? $start_date :'',
			 'start_time' => isset($start_time) ? $start_time :'',
			 'end_time' => isset($end_time) ? $end_time :'',
			 'month' => isset($newDate) ? $newDate :'',
             'status' => "1",
			 'foreman_fees' => $foreman_fees,
			 'min_prize_amount' => $min_prize_amount,
			 'plan_amount' => $plan_amount,
             'added_date' => date('Y-m-d h:i:s')
           );
          $this->db->insert('tbl_auction',$data);
          $insert_id = $this->db->insert_id();
       if(!empty($insert_id)){
           redirect('Dashboard/liveAuction/'.$insert_id);
       }else{
           echo 'fsgb';
       }
    }
    
    public function auctionSummary($auction_id = ''){      
      $data = array(
          'auction_id'=> isset($auction_id) ? $auction_id :''
      );
      $getbidsforauction=json_decode(callAPI('POST','getbidsforauction',$data),true); 
      $group_name = isset($_POST['group_name']) ? $_POST['group_name'] :'' ; 
      $plan_name = isset($_POST['plan_name']) ? $_POST['plan_name'] :'' ; 
        
        $auction_detail = $this->db->where('auction_id',$auction_id)->get('tbl_auction')->row_array();
        $group_detail = $this->db->where('group_id',$auction_detail['group_id'])->get('tbl_groups')->row_array();
        $plan_detail = $this->db->where('plan_id',$auction_detail['plan_id'])->get('tbl_plans')->row_array();
        
      $data = array(
        'bid_data' => isset($getbidsforauction['data']) ? $getbidsforauction['data'] :'' ,
        'group_name' => isset($group_name) ? $group_name :'' ,
        'plan_name' =>  isset($plan_name) ? $plan_name  : ''
      );
      $data_bredCrumbs = array(
            'plan_id' => $auction_detail['plan_id'],
            'auction_no' => 'Auction Summary'.'[ '.$auction_detail['month'].' ]',
            'plan_name' => $plan_detail['plan_name'],
            'group_name' => $group_detail['group_name'],
            'group_id' => $auction_detail['group_id'],
          ); 
      if(!empty($data)){
            $this->load->view('auction-summary',array('data' => $data ,'auction_id'=>$auction_id ,'data_2' => $data_bredCrumbs));
      }
      else{
          $this->session->set_flashdata('success',$getbidsforauction['message'] );
          $this->load->view('auction-summary');
      }    
    }
    
    public function exportSubscription(){
         $file_name = 'Subscription'.date('Ymd').'.csv'; 
         header("Content-Description: File Transfer"); 
         header("Content-Disposition: attachment; filename=$file_name"); 
         header("Content-Type: application/csv;");
         // get data 
     
         // file creation 
        $file = fopen('php://output', 'w');
        $header =array(
          'plan_id',
          'plan_name',
          'admission_fee',
          'plan_amount',
          'tenure',
          'start_month',
          'agent_commission',
          'emi',
          'total_subscription',
          'months_completed',
          'total_months',
          'groups_counts',
          'end_date_for_subscription',
          'foreman_fees',
          'min_prize_amount',
          'max_bid',
          'remaining_month',
          'min_bid_amount',
          'status',
          'added_date',
          'update_date'   
        );
    
        $data = $this->db->get('tbl_plans')->result_array();
        fputcsv($file, $header);
        foreach($data as $userdata){
           fputcsv($file,$userdata);
        }
        fclose($file); 
        exit; 
    }
   
    public function importSubscription(){
         // Check form submit or not 
        if(!empty($_FILES['file']['name'])){ 
         // Set preference 
        
         $config['upload_path'] = 'images/'; 
         $config['allowed_types'] = 'csv'; 
         $config['max_size'] = '10000'; // max_size in kb 
         $config['file_name'] = $_FILES['file']['name'];

         // Load upload library 
         $this->load->library('upload',$config); 
 
         // File upload
         if($this->upload->do_upload('file')){ 
            // Get data about the file
            $uploadData = $this->upload->data(); 

            $filename = $uploadData['file_name'];

            // Reading file
            $file = fopen("images/".$filename,"r");
            $i = 0;
            
            $numberOfFields = 21; // Total number of fields
            $importData_arr = array();
 
            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
               $num = count($filedata );
                
               if($numberOfFields == $num){
                  for ($c=0; $c < $num; $c++) {
                     $importData_arr[$i][] = $filedata [$c];
                  }
               }
               $i++;
            }
            fclose($file);

            $skip = 0;

            // insert import data
            foreach($importData_arr as $userdata){
            
               // Skip first row
               if($skip != 0){
                
                 $data = array(
                     "plan_name" => isset($userdata[1]) ? $userdata[1] : '',
                     "admission_fee" => isset($userdata[2]) ? $userdata[2]: '',
                     "plan_amount" => isset($userdata[3]) ? $userdata[3] : '',
                     "tenure" => isset($userdata[4]) ? $userdata[4] : '',
                     "start_month" => isset($userdata[5]) ? $userdata[5] : '',
                     "agent_commission" => isset($userdata[6]) ? $userdata[6] : '',
                     "emi" => isset($userdata[7]) ? $userdata[7] : '',
                     "total_months" => isset($userdata[8]) ? $userdata[8] : '',
                     "groups_counts" => isset($userdata[11]) ? $userdata[11] : '',
                     "end_date_for_subscription" => isset($userdata[12]) ? $userdata[12] : '',
                     "foreman_fees" => isset($userdata[13]) ? $userdata[13] : '',
                     "min_prize_amount" => isset($userdata[14]) ? $userdata[14] : '',
                     "max_bid" => isset($userdata[15]) ? $userdata[15] : '',
                    );  
                    $res = Json_decode(callAPI('POST','addPlan',$data));
               }
               $skip ++;
            }
            $data['response'] = 'successfully uploaded '.$filename; 
         }else{ 
            $data['response'] = 'failed'; 
         } 
      }else{ 
         $data['response'] = 'failed'; 
      } 
      // load view 
      $this->session->set_flashdata('Success', 'Import Successfully');
      redirect('Dashboard/ImportExport');
  }
  
    public function exportSubscriber(){
      $file_name = 'Subscriber'.date('Ymd').'.csv'; 
         header("Content-Description: File Transfer"); 
         header("Content-Disposition: attachment; filename=$file_name"); 
         header("Content-Type: application/csv;");
         // get data 
     
         // file creation 
        $file = fopen('php://output', 'w');
         $header =array(
            
            "member_id",
            "name",
            "last_name",
            "father_name",
            "dob	",
            "mobile",
            "secondary_mobile",
            "office_phone	",
            "email",
            "permanent_address",
            "current_postal_address",
            "village_name",
            "district",
            "state",
            "address_pincode",
            "reference",
            "gender",
            "subscriber_type",
            "marital_status",
            "spouse_name",
            "annivarsary_date",
    		"no_of_kids",
    		"no_of_depends",
    		"no_of_nominee",
    		"nominee_name",
    		"nominee_relationship",
    		"nominee_dob",
    		"percentage_of_nomination",
    		"nominee_gaurdian_name",
            "pan_number",
            "income_type",
            "company_name",
            "company_type",
            "designation",
            "work_address",
            "salary",
            "other_income",
            "experience",
            "for_self_employed",
            "for_professional_service",
            "office_address",
            "employee_no",
            "gst_no",
            "annual_turnover",
            "income_source",
            "monthly_income",
            "nature_of_business",
            "business_start_date",
            "car_category",
            "two_wheeler_category",
            "house_category",
            "identity_category",
            "address_category",
            "is_added_by_agent",
            "agent_id",
            "agent_comission",
            "adhaar_number",
            "status",
            "incorporation_certificate",
            "member_profile",
            "docs",
            "unallocated_amount",
            "added_date",
            "update_date"
         
        );
        fputcsv($file, $header);
        $data = $this->db->get('tbl_members')->result_array();
         foreach($data as $userdata){
            fputcsv($file, $userdata);
         }
        fclose($file); 
        exit;
  }
  
    public function importSubscriber(){
     // Check form submit or not 
        if(!empty($_FILES['file']['name'])){ 
         // Set preference 
        
         $config['upload_path'] = 'images/'; 
         $config['allowed_types'] = 'csv'; 
         $config['max_size'] = '10000'; // max_size in kb 
         $config['file_name'] = $_FILES['file']['name'];

         // Load upload library 
         $this->load->library('upload',$config); 
 
         // File upload
         if($this->upload->do_upload('file')){ 
            // Get data about the file
            $uploadData = $this->upload->data(); 
            $filename = $uploadData['file_name'];

            // Reading file
            $file = fopen("images/".$filename,"r");
            $i = 0;
            $numberOfFields = 64; // Total number of fields
            $importData_arr = array();
 
            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
               $num = count($filedata );
                
               if($numberOfFields == $num){
                  for ($c=0; $c < $num; $c++) {
                     $importData_arr[$i][] = $filedata [$c];
                  }
               }
               $i++;
            }
            fclose($file);

            $skip = 0;

            // insert import data
            foreach($importData_arr as $userdata){               
               if($skip != 0){
                $mobile = isset($userdata[5]) ? $userdata[5] : '';
                if($this->checkAlreadyMobile($mobile)){
                 $header = array(
                        "name" => isset($userdata[1]) ? $userdata[1] : '',
                        "last_name"  => isset($userdata[2]) ? $userdata[2] : '',
                        "father_name" => isset($userdata[3]) ? $userdata[3] : '',
                        "dob" => isset($userdata[4]) ? $userdata[4] : '',
                        "mobile"  => isset($userdata[5]) ? $userdata[5] : '',
                        "secondary_mobile" => isset($userdata[6]) ? $userdata[6] : '',
                        "office_phone" => isset($userdata[7]) ? $userdata[7] : '',
                        "email" => isset($userdata[8]) ? $userdata[8] : '',
                        "permanent_address" =>  isset($userdata[9]) ? $userdata[9] : '',
                        "current_potal_address" => isset($userdata[10]) ? $userdata[10] : '',
                        "village_city_name" => isset($userdata[11]) ? $userdata[11] : '',
                        "district" => isset($userdata[12]) ? $userdata[12] : '',
                        "state" => isset($userdata[13]) ? $userdata[13] : '',
                        "address_pincode" => isset($userdata[14]) ? $userdata[14] : '',
                        "reference" => isset($userdata[15]) ? $userdata[15] : '',
                        "gender" => isset($userdata[16]) ? $userdata[16] : '',
                        "subscriber_type" => isset($userdata[17]) ? $userdata[17] : '',
                        "marital_status" =>  isset($userdata[18]) ? $userdata[18] : '',
                        "spouse_name" => isset($userdata[19]) ? $userdata[19] : '',
                        "annivarsary_date" => isset($userdata[20]) ? $userdata[20] : '',
                		"no_of_kids" => isset($userdata[21]) ? $userdata[21] : '',
                		"no_of_depends" => isset($userdata[22]) ? $userdata[22] : '',
                		"no_of_nominee" => isset($userdata[23]) ? $userdata[23] : '',
                		"nominee_name"  => isset($userdata[24]) ? $userdata[24] : '',
                		"nominee_relationship" => isset($userdata[25]) ? $userdata[25] : '',
                		"nominee_d_o_b" => isset($userdata[26]) ? $userdata[26] : '',
                		"percentage_of_nomination" => isset($userdata[27]) ? $userdata[27] : '',
                		"nominee_gaurdian_name"  => isset($userdata[28]) ? $userdata[28] : '',
                        "pan_number" => isset($userdata[29]) ? $userdata[29] : '',
                        "income_type" => isset($userdata[30]) ? $userdata[30] : '',
                        "company_name" => isset($userdata[31]) ? $userdata[31] : '',
                        "company_type" => isset($userdata[32]) ? $userdata[32] : '',
                        "designation" => isset($userdata[33]) ? $userdata[33] : '',
                        "work_address" => isset($userdata[34]) ? $userdata[34] : '',
                        "salary" => isset($userdata[35]) ? $userdata[35] : '',
                        "other_income" => isset($userdata[36]) ? $userdata[36] : '',
                        "experience" => isset($userdata[37]) ? $userdata[37] : '',
                        "for_self_employed" => isset($userdata[38]) ? $userdata[38] : '',
                        "for_professional_service" => isset($userdata[39]) ? $userdata[39] : '',
                        "office_address" => isset($userdata[40]) ? $userdata[40] : '',
                        "employee_no" => isset($userdata[41]) ? $userdata[41] : '',
                        "gst_no" => isset($userdata[42]) ? $userdata[42] : '',
                        "annual_turnover" => isset($userdata[43]) ? $userdata[43] : '',
                        "income_source" => isset($userdata[44]) ? $userdata[44] : '',
                        "monthly_income" => isset($userdata[45]) ? $userdata[45] : '',
                        "nature_of_business" => isset($userdata[46]) ? $userdata[46] : '',
                        "business_start_date" => isset($userdata[47]) ? $userdata[47] : '',
                        "car_category" => isset($userdata[48]) ? $userdata[48] : '',
                        "two_wheeler_category" => isset($userdata[49]) ? $userdata[49] : '',
                        "house_category" => isset($userdata[50]) ? $userdata[50] : '',
                        "identity_category" => isset($userdata[51]) ? $userdata[51] : '',
                        "address_category" => isset($userdata[52]) ? $userdata[52] : '',
                        "is_added_by_agent" => isset($userdata[53]) ? $userdata[53] : '',
                        "agent_id" => isset($userdata[54]) ? $userdata[54] : '',
                        "agent_comission" => isset($userdata[55]) ? $userdata[55] : '',
                        "adhaar_number" => isset($userdata[56]) ? $userdata[56] : '',
                        "status" => isset($userdata[57]) ? $userdata[57] : '',
                        "incorporation_certificate" => isset($userdata[58]) ? $userdata[58] : '',
                        "member_profile" => isset($userdata[59]) ? $userdata[59] : '',
                        "docs" => isset($userdata[60]) ? $userdata[60] : '',
                        "unallocated_amount" => isset($userdata[61]) ? $userdata[61] : '',
                        "added_date" => isset($userdata[62]) ? $userdata[62] : '',
                        "update_date" => isset($userdata[63]) ? $userdata[63] : ''
                    ); 
                }else{
                    $header = array(
                        "name" => isset($userdata[1]) ? $userdata[1] : '',
                        "last_name"  => isset($userdata[2]) ? $userdata[2] : '',
                        "father_name" => isset($userdata[3]) ? $userdata[3] : '',
                        "dob" => isset($userdata[4]) ? $userdata[4] : '',
                        "mobile"  => isset($userdata[5]) ? $userdata[5] : '',
                        "secondary_mobile" => isset($userdata[6]) ? $userdata[6] : '',
                        "office_phone" => isset($userdata[7]) ? $userdata[7] : '',
                        "email" => isset($userdata[8]) ? $userdata[8] : '',
                        "permanent_address" =>  isset($userdata[9]) ? $userdata[9] : '',
                        "current_potal_address" => isset($userdata[10]) ? $userdata[10] : '',
                        "village_city_name" => isset($userdata[11]) ? $userdata[11] : '',
                        "district" => isset($userdata[12]) ? $userdata[12] : '',
                        "state" => isset($userdata[13]) ? $userdata[13] : '',
                        "address_pincode" => isset($userdata[14]) ? $userdata[14] : '',
                        "reference" => isset($userdata[15]) ? $userdata[15] : '',
                        "gender" => isset($userdata[16]) ? $userdata[16] : '',
                        "subscriber_type" => isset($userdata[17]) ? $userdata[17] : '',
                        "marital_status" =>  isset($userdata[18]) ? $userdata[18] : '',
                        "spouse_name" => isset($userdata[19]) ? $userdata[19] : '',
                        "annivarsary_date" => isset($userdata[20]) ? $userdata[20] : '',
                		"no_of_kids" => isset($userdata[21]) ? $userdata[21] : '',
                		"no_of_depends" => isset($userdata[22]) ? $userdata[22] : '',
                		"no_of_nominee" => isset($userdata[23]) ? $userdata[23] : '',
                		"nominee_name"  => isset($userdata[24]) ? $userdata[24] : '',
                		"nominee_relationship" => isset($userdata[25]) ? $userdata[25] : '',
                		"nominee_d_o_b" => isset($userdata[26]) ? $userdata[26] : '',
                		"percentage_of_nomination" => isset($userdata[27]) ? $userdata[27] : '',
                		"nominee_gaurdian_name"  => isset($userdata[28]) ? $userdata[28] : '',
                        "pan_number" => isset($userdata[29]) ? $userdata[29] : '',
                        "income_type" => isset($userdata[30]) ? $userdata[30] : '',
                        "company_name" => isset($userdata[31]) ? $userdata[31] : '',
                        "company_type" => isset($userdata[32]) ? $userdata[32] : '',
                        "designation" => isset($userdata[33]) ? $userdata[33] : '',
                        "work_address" => isset($userdata[34]) ? $userdata[34] : '',
                        "salary" => isset($userdata[35]) ? $userdata[35] : '',
                        "other_income" => isset($userdata[36]) ? $userdata[36] : '',
                        "experience" => isset($userdata[37]) ? $userdata[37] : '',
                        "for_self_employed" => isset($userdata[38]) ? $userdata[38] : '',
                        "for_professional_service" => isset($userdata[39]) ? $userdata[39] : '',
                        "office_address" => isset($userdata[40]) ? $userdata[40] : '',
                        "employee_no" => isset($userdata[41]) ? $userdata[41] : '',
                        "gst_no" => isset($userdata[42]) ? $userdata[42] : '',
                        "annual_turnover" => isset($userdata[43]) ? $userdata[43] : '',
                        "income_source" => isset($userdata[44]) ? $userdata[44] : '',
                        "monthly_income" => isset($userdata[45]) ? $userdata[45] : '',
                        "nature_of_business" => isset($userdata[46]) ? $userdata[46] : '',
                        "business_start_date" => isset($userdata[47]) ? $userdata[47] : '',
                        "car_category" => isset($userdata[48]) ? $userdata[48] : '',
                        "two_wheeler_category" => isset($userdata[49]) ? $userdata[49] : '',
                        "house_category" => isset($userdata[50]) ? $userdata[50] : '',
                        "identity_category" => isset($userdata[51]) ? $userdata[51] : '',
                        "address_category" => isset($userdata[52]) ? $userdata[52] : '',
                        "is_added_by_agent" => isset($userdata[53]) ? $userdata[53] : '',
                        "agent_id" => isset($userdata[54]) ? $userdata[54] : '',
                        "agent_comission" => isset($userdata[55]) ? $userdata[55] : '',
                        "adhaar_number" => isset($userdata[56]) ? $userdata[56] : '',
                        "status" => isset($userdata[57]) ? $userdata[57] : '',
                        "incorporation_certificate" => isset($userdata[58]) ? $userdata[58] : '',
                        "member_profile" => isset($userdata[59]) ? $userdata[59] : '',
                        "docs" => isset($userdata[60]) ? $userdata[60] : '',
                        "unallocated_amount" => isset($userdata[61]) ? $userdata[61] : '',
                        "added_date" => isset($userdata[62]) ? $userdata[62] : '',
                        "update_date" => isset($userdata[63]) ? $userdata[63] : ''
                    );  
                    $this->db->insert('tbl_members',$header);
                }
                    
               }
               $skip ++;
            }
            $data['response'] = 'successfully uploaded '.$filename; 
         }else{ 
            $data['response'] = 'failed'; 
         } 
      }else{ 
         $data['response'] = 'failed'; 
      } 
      // load view 
      $this->session->set_flashdata('Success', 'Import Successfully');
      redirect('Dashboard/ImportExport');
  }
  
    public function checkAlreadyMobile($mobile = ''){
       $check_exist =  $this->db->where('mobile',$mobile)->get('tbl_members')->num_rows();
       if($check_exist > 0){
            return true; 
       }else{
           return false;
       }
    }
  
    public function exportOrder(){
         $file_name = 'Order'.date('Ymd').'.csv'; 
         header("Content-Description: File Transfer"); 
         header("Content-Disposition: attachment; filename=$file_name"); 
         header("Content-Type: application/csv;");
         // get data 
         $data = $this->db->select('order_id,plan_id,member_id,group_id,transaction_id,agent_id,agent_fee,admission_fees,plan_amount,tenure,start_month,agent_commission,emi,total_subscription
         ,months_completed,total_months,groups_count,member_name,end_month,is_added_by_agent,status,payment_mode,slot_number,slot_status,cancel_reason,added_date')
         ->get('tbl_orders')->result_array();
         // file creation 
        $file = fopen('php://output', 'w');
        $header =array();
        $header = array(
             "order_id",
             "plan_id",
             "member_id",
             "group_id",
             "transaction_id",
             "agent_id",
             "agent_fee",
             "admission_fees",
             "plan_amount",
             "tenure",
             "start_month",
             "agent_commission",
             "emi",
             "total_subscription",
             "months_completed",
             "total_months",
             "groups_count",
             "member_name",
             "end_month",
             "is_added_by_agent",
             "status",
             "payment_mode",
             "slot_number",
             "slot_status",
             "cancel_reason",
             "added_date"
        );
        fputcsv($file,$header);
        foreach($data as $userdata){
        fputcsv($file,$userdata);
        }
        fclose($file); 
        exit; 
    }
    
    public function importOrder(){
     // Check form submit or not 
        if(!empty($_FILES['file']['name'])){ 
         // Set preference 
        
         $config['upload_path'] = 'images/'; 
         $config['allowed_types'] = 'csv'; 
         $config['max_size'] = '10000'; // max_size in kb 
         $config['file_name'] = $_FILES['file']['name'];

         // Load upload library 
         $this->load->library('upload',$config); 
 
         // File upload
         if($this->upload->do_upload('file')){ 
            // Get data about the file
            $uploadData = $this->upload->data(); 
            $filename = $uploadData['file_name'];

            // Reading file
            $file = fopen("images/".$filename,"r");
            $i = 0;
            $numberOfFields = 26; // Total number of fields
            $importData_arr = array();
 
            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
               $num = count($filedata );
                
               if($numberOfFields == $num){
                  for ($c=0; $c < $num; $c++) {
                     $importData_arr[$i][] = $filedata [$c];
                  }
               }
               $i++;
            }
            fclose($file);

            $skip = 0;

            // insert import data
            foreach($importData_arr as $userdata){
               // Skip first row
               if($skip != 0){
                if($userdata[2] != 0){
                 $header = array(
                     "plan_id" => isset($userdata[1]) ? $userdata[1] : '',
                     "member_id" => isset($userdata[2]) ? $userdata[2] : '',
                     "transaction_id" => isset($userdata[4]) ? $userdata[4] : '',
                     "agent_id"  => isset($userdata[5]) ? $userdata[5] : '',
                     "member_name"  => isset($userdata[17]) ? $userdata[17] : '',
                     "payment_mode"  => isset($userdata[21]) ? $userdata[21] : '',
                    ); 
                $getbidsforauction=json_decode(callAPI('POST','BuyPlanByAgent',$header),true); 
                }
               }
               $skip ++;
            }
            $data['response'] = 'successfully uploaded '.$filename; 
         }else{ 
            $data['response'] = 'failed'; 
         } 
      }else{ 
         $data['response'] = 'failed'; 
      } 
      // load view 
      $this->session->set_flashdata('Success', 'Import Successfully');
      redirect('Dashboard/ImportExport');
    }
  
    public function ImportExport(){
      $this->load->view('import-export');
    }
    
    public function payDues(){
         $data = isset($_POST['doc']) ? Json_decode($_POST['doc'],true) : '';
         $arr = array();
         $arr['gst'] = isset($_POST['gst']) ? $_POST['gst'] : '0';
         $arr['total_sum'] = isset($_POST['total_sum']) ? $_POST['total_sum'] : '0';
         $arr['member_id'] = isset($_POST['member_id']) ? $_POST['member_id'] : '0';
         $arr['ten'] = isset($_POST['ten']) ? $_POST['ten'] : '0';
         $arr['twenty'] = isset($_POST['twenty']) ? $_POST['twenty'] : '0';
         $arr['fifty'] = isset($_POST['fifty']) ? $_POST['fifty'] : '0';
         $arr['hundred'] = isset($_POST['hundred']) ? $_POST['hundred'] : '0';
         $arr['two_hundred'] = isset($_POST['two_hundred']) ? $_POST['two_hundred'] : '0';
         $arr['five_hundred'] = isset($_POST['five_hundred']) ? $_POST['five_hundred'] : '0';
         $arr['two_thousand'] = isset($_POST['two_thousand']) ? $_POST['two_thousand'] : '0';
         $arr['payment_mode'] = isset($_POST['payment_mode']) ? $_POST['payment_mode'] : '';
         $arr['bank_account_id'] = isset($_POST['bank_account']) ? $_POST['bank_account'] : '';
         $arr['cheque_number'] = isset($_POST['cheque_number']) ? $_POST['cheque_number'] : '';
         $arr['payment_proof'] = isset($_POST['payment_proof']) ? $_POST['payment_proof'] : '';
         $arr['agent_id'] = isset($_POST['agent_id']) ? $_POST['agent_id'] : '';
         $arr['gst_percentage'] = isset($_POST['gst_percentage']) ? $_POST['gst_percentage'] : '';
         
        $data_arr = array_merge($data,$arr);
        
        $res = json_decode(callAPI('POST','payDues',$data_arr),true);
       if(!empty($res)){
        if($res['status'] == 'success'){
            $this->session->set_flashdata('success', 'Pay Emi Successfully');
            redirect('Dashboard');
        }else{
          $this->session->set_flashdata('Failure', 'Pay Emi Failure');
          redirect('Dashboard');
        }
       }else{
          $this->session->set_flashdata('Failure', 'Pay Emi Failure');
          redirect('Dashboard');
       }
	}

    public function Payment(){
    $this->load->view('payment');    
    }
  
    public function addpayment(){
      $res = json_decode(callAPI('POST','SubmitCompanyTransaction',$_POST),true);
       if(!empty($res)){
         if($res['status'] == 'success'){
            $this->session->set_flashdata('success', 'Added '.$res['type'].'Successfully');
            redirect('Dashboard');
        }else{
            $this->session->set_flashdata('Failure', $res['type'] . 'Failure');
            redirect('Dashboard');
        }
       }else{
           $this->session->set_flashdata('Failure', $res['type'] . 'Failure');
           redirect('Dashboard'); 
       }
    }
    
    public function Receipt(){
      $this->load->view('receipt');    
    }
    
    public function memberReceipt($member_id = ''){
    $data = array(
        'member_id' =>  isset($member_id) ? $member_id : ''
    );
    $res = json_decode(callAPI('POST','getMemberTransactionsHistory',$data),true);   
    $member_data = $this->db->where('member_id',$member_id)->get('tbl_members')->row_array();
    $this->load->view('member_recietp',array('data'=>$res['data'],'data2' =>$member_data));    
    }

    public function memberReceiptDetail($transaction_id = ''){
        $data = array(
            'transaction_id' =>  isset($transaction_id) ? $transaction_id : ''
        );
        $res = json_decode(callAPI('POST','getTransactionDetails',$data),true);   
        $this->load->view('member-reciept-detail',array('data'=>$res['data']));    
    }
    
    public function imagesUpload(){
	    $target_dir = BASEPATH . "../images/document_subscriber/"; 
		$error_doc = array();
		$documents = array();
		if (isset($_FILES['docs']) && $_FILES['docs']['name'] != '') {
			$documents['docs'] = $_FILES['docs'];
		}
		foreach ($documents as $key => $val) {
			$random_string = rand(1000, 9999);
			$file_name_arr = $val["name"];
			$file_name = $random_string . '' . str_replace('-', '', str_replace(',', '', str_replace(' ', '', $file_name_arr)));
			$target_file = $target_dir . basename($file_name);
			$target_file_arr[] = $target_file;
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			if (move_uploaded_file($val["tmp_name"], $target_file)) {
				$filename = $file_name;
			} else {
				$error_doc[$key] = 'Sorry,upload failed.';
			}
		}
		echo $filename; die;
	}
	
	public function profileUpload(){
	    $target_dir = BASEPATH . "../images/profile/"; 
		$error_doc = array();
		$documents = array();
		if (isset($_FILES['docs']) && $_FILES['docs']['name'] != '') {
			$documents['docs'] = $_FILES['docs'];
		}
		foreach ($documents as $key => $val) {
			$random_string = rand(1000, 9999);
			$file_name_arr = $val["name"];
			$file_name = $random_string . '' . str_replace('-', '', str_replace(',', '', str_replace(' ', '', $file_name_arr)));
			$target_file = $target_dir . basename($file_name);
			$target_file_arr[] = $target_file;
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			if (move_uploaded_file($val["tmp_name"], $target_file)) {
				$filename = $file_name;
			} else {
				$error_doc[$key] = 'Sorry,upload failed.';
			}
		}
		echo $filename; die;
	}
	
	public function profileUploadUpdate(){
	    
	    $target_dir = BASEPATH . "../images/profile/"; 
		$error_doc = array();
		$documents = array();
		if (isset($_FILES['docs']) && $_FILES['docs']['name'] != '') {
			$documents['docs'] = $_FILES['docs'];
		}
		foreach ($documents as $key => $val) {
			$random_string = rand(1000, 9999);
			$file_name_arr = $val["name"];
			$file_name = $random_string . '' . str_replace('-', '', str_replace(',', '', str_replace(' ', '', $file_name_arr)));
			$target_file = $target_dir . basename($file_name);
			$target_file_arr[] = $target_file;
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			if (move_uploaded_file($val["tmp_name"], $target_file)) {
				$filename = $file_name;
			} else {
				$error_doc[$key] = 'Sorry,upload failed.';
			}
		}
		echo $filename; die;
	}
	
	public function memberProfileUpload(){
	    extract($_POST);
	    if(!empty($_POST)){
	        $data = array(
	          'member_profile' => $upload_file_path
	        );
	        $this->db->where('member_id',$member_id)->update('tbl_members',$data);
	    }
	}
	
	    public function paySucribermoney($member_id = ''){
        $data = array(
            'member_id' =>  isset($member_id) ? $member_id : ''
        );
        $chit_detail = $this->db->where('is_hand_over!=','yes')->where('member_id',$member_id)->get('tbl_chits')->row_array();
        if(!empty($chit_detail)){
            $plan_id = $chit_detail['plan_id'];
            $plandata = $this->db->where('plan_id',$plan_id)->get('tbl_plans')->row_array();
            $group_detail = $this->db->where('group_id',$chit_detail['group_id'])->get('tbl_groups')->row_array();
            $group_name = isset($group_detail['group_name']) ? $group_detail['group_name'] : '';
            $chit_plan_data = array(
                'return_chit_amount' => $chit_detail['return_chit_amount'],
                'forgo_amount' => $chit_detail['forgo_amount'],
                'plan_name' => $plandata['plan_name'],
                'group_name' => isset($group_name) ? $group_name :'X',
                'chit_id' => $chit_detail['chit_id']
            );
        }  
        $plan_data = isset($chit_plan_data) ? $chit_plan_data : '';     
        $member_data = $this->db->where('member_id',$member_id)->get('tbl_members')->row_array();
        $res = json_decode(callAPI('POST','getsubscriberdues',$data),true);   
        $this->load->view('subscriber_chit_detail',array('data'=>$res['data'],'plan_detail' => $plan_data ,'data2' =>$member_data));    
        }
    
    public function chidHandover(){
        $res = json_decode(callAPI('POST','chit_handover',$_POST),true);
         if($res['status'] == 'Success'){
            $this->session->set_flashdata('success', $res['message']);     
            redirect('Dashboard');
        }
        else{
            $this->session->set_flashdata('Failure', $res['message']);
            redirect('Dashboard');
        }
    }
    
    public function payment_listing(){
        $type = 'payment';
        $data = array(
            'type' =>isset($type) ? $type :'', 
            );
        $res = json_decode(callAPI('POST','getcompneytransaction',$data));
       if(!empty($res)){
	    if($res->status == 'success'){
	       $this->load->view('payment-listing', array('data'=> $res->data));
	    }else{
	        redirect('Dashboard/Payment');
	    }
       }else{
         $this->load->view('payment-listing');
       }
    }
    
    public function addUser(){
        $this->load->view('add-users');
    }
    
    public function editGst($id = ''){
        $data = $this->db->where('gst_id',$id)->get('tbl_gst')->row_array();
        $this->load->view('gst',array('data'=>$data));
    }
    
    public function gstListing(){
        $data = $this->db->get('tbl_gst')->result_array();
        $this->load->view('gst-listing',array('data'=>$data));
    }
    
    public function showGST(){
        $this->load->view('gst');
    }
    
    public function addGST(){
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        if(empty($id)){
            $res = json_decode(callAPI('POST','submitGst',$_POST),true);
            if($res['status'] == 'success'){
                $this->session->set_flashdata('success', $res['message']);  
                 redirect('Dashboard/gstListing');
            }
            else{
                $this->session->set_flashdata('Failure', $res['message']);
                redirect('Dashboard/gstListing');
            }
        }else{
            $res = json_decode(callAPI('POST','updateGst',$_POST),true);
            if($res['status'] == 'success'){
                $this->session->set_flashdata('success', $res['message']);  
                 redirect('Dashboard/gstListing');
            }
            else{
                $this->session->set_flashdata('Failure', $res['message']);
                redirect('Dashboard/gstListing');
            }  
        }
    }
    
    public function auction_register(){
        $data = $this->db->get('tbl_auction')->result_array();
        if(!empty($data)){
            $all_detail = array();
            foreach($data as $keys=>$values){
                $plan_detail = $this->db->select('plan_name')->where('plan_id',$values['plan_id'])->get('tbl_plans')->row_array();
                $group_detail = $this->db->select('group_name')->where('group_id',$values['group_id'])->get('tbl_groups')->row_array();
                if(!empty($values['winning_bid_id'])){
                    $bid_detail = $this->db->select('bid_amount')->where('bid_id',$values['winning_bid_id'])->get('tbl_bids')->row_array();
                }
                $all_detail[] = array(
                    'plan_name' => isset($plan_detail['plan_name']) ? $plan_detail['plan_name'] :'',
                    'group_name' => isset($group_detail['group_name']) ? $group_detail['group_name'] :'',
                    'bid_amount' => isset($bid_detail['bid_amount']) ? $bid_detail['bid_amount'] :'',
                    'start_date' =>isset($values['start_date']) ? $values['start_date'] :'',
                    'end_date' =>isset($values['end_date']) ? $values['end_date'] :'',
                    'start_time' =>isset($values['start_time']) ? $values['start_time'] :'',
                    'end_time' =>isset($values['end_time']) ? $values['end_time'] :'',
                    'auction_no' =>isset($values['auction_no']) ? $values['auction_no'] :'',
                    'foreman_fees' =>isset($values['foreman_fees']) ? $values['foreman_fees'] :'',
                    'min_prize_amount' =>isset($values['min_prize_amount']) ? $values['min_prize_amount'] :'',
                    'status' =>isset($values['status']) ? $values['status'] :'',
                    'plan_amount' =>isset($values['plan_amount']) ? $values['plan_amount'] :'',
                    'start_date' =>isset($values['start_date']) ? $values['start_date'] :'',
                    );
            }
            $this->load->view('auction-listing',array('data'=>$all_detail));
        }
        else{
             $this->session->set_flashdata('Failure', 'Auction Not Available');
            redirect('Dashboard');
        }
          
     }
     
     public function transcation_list(){
          $date = date('M');
          $year = date('Y');
         if(!empty($_POST)){
            $res = json_decode(callAPI('POST','getAlltranscation_withfilter',$_POST),true);
            $date = array(
                   'mnth_filter' => $_POST['mnth_filter'], 
                   'year' => $_POST['year'], 
                );
            if($res['status'] == 'Success'){
                $this->load->view('transcation-listing',array('data'=>$res['data'],'date_time'=>$date));
            }
            else{
                $this->session->set_flashdata('success', 'Records Not Found');
                 redirect('Dashboard/transcation_list');
            }
         }
         else{
            $data = array(
               'mnth_filter' => isset($date) ? $date :'', 
               'year' => isset($year) ? $year :'', 
            );
            $res = json_decode(callAPI('POST','getAlltranscation'),true);
            // print_r($res['data']);die;
            $this->load->view('transcation-listing',array('data'=>$res['data'],'date_time'=>$data));
         }
     }
     
     
    public function checkSubscriberBuyPlan(){
       $plan_id = isset($_POST['plan_id']) ? $_POST['plan_id']  : '';
       $group_id = isset($_POST['group_id']) ? $_POST['group_id']  : '';
       $check_exists = $this->db->where('plan_id',$plan_id)->where('group_id',$group_id)->where('slot_status','assigned')->get('tbl_orders')->num_rows();
       if($check_exists > 0){
           $output = 1;
       }else{
          $output = 0;  
       }
      echo json_encode($output); die;
    }
    
    public function startauction_auto(){
        $res = json_decode(callAPI('POST','startAuctionAutomatically'),true);
        // $res = json_decode(callAPI('POST','closeAuctionAutomatically'),true);
        if(!empty($res['data'])){
            $output = $res['message'];
        }else{
            $output = 0; 
        }
        echo json_encode($output); die;
    }
    
    
    public function getGstData(){
      $id = isset($_POST['id']) ? $_POST['id'] : '';
      $getGst = $this->db->where('gst_id',$id)->get('tbl_gst')->row_array();
      echo json_encode($getGst);  die;
    }
    
    public function ledgerAccount(){
      $data = $this->db->get('tbl_ledger_transactions')->result_array();
      $this->load->view('ledger-listing',array('getLedger' => $data));
    }
    
    public function ledgerType(){
      $this->load->view('ledger-type');
    }
    
    public function ledgerTypeList(){
      $data = $this->db->get('tbl_ledger_account')->result_array();
      $this->load->view('ledger-type-list',array('getledger' => $data));
    }
    
    public function addLedgerType(){
       if(isset($_POST['submit'])){
          $id = isset($_POST['id']) ? $_POST['id']: ''; 
          $name = isset($_POST['name']) ? $_POST['name']: ''; 
          $code = isset($_POST['code']) ? $_POST['code']: '';
          $description = isset($_POST['description']) ? $_POST['description']: ''; 
        if($id == ''){
          $this->db->insert('tbl_ledger_account',array('name' =>$name , 'description' => $description,'code'=>$code));
          $this->session->set_flashdata('success', 'Record inserted successfully'); 
          redirect('Dashboard/ledgerTypeList');
        }else{
          $this->db->where('id',$id)->update('tbl_ledger_account',array('name' =>$name , 'description' => $description,'code'=>$code));
          $this->session->set_flashdata('success', 'Record update successfully'); 
          redirect('Dashboard/ledgerTypeList'); 
        }
       }else{
          $this->session->set_flashdata('failure', 'Record not inserted successfully'); 
          redirect('Dashboard/ledgerTypeList'); 
       }
    }
    
    public function ledgerAccountEdit($id = '' ){
       $data = $this->db->where('id',$id)->get('tbl_ledger_account')->row_array();
       $this->load->view('ledger-type',array('getLedger' => $data));
    }
    
    public function ledgerAccountDelete($id = ''){
        $this->db->where('id',$id)->delete('tbl_ledger_account');
        redirect('Dashboard/ledgerTypeList'); 
    }
    
    public function transaction_type_master_listing(){
          $data = $this->db->get('tbl_transaction_type_master')->result_array();
          $this->load->view('master-transcation-type-list',array('data' => $data));
    }
    public function transcation_type_master(){
        $this->load->view('add_transcation_type_master',array());
    }
     public function add_transcation_type_master(){
         if(isset($_POST['submit'])){
          $id = isset($_POST['id']) ? $_POST['id']: ''; 
          $name = isset($_POST['name']) ? $_POST['name']: ''; 
          $code = isset($_POST['code']) ? $_POST['code']: '';
          $description = isset($_POST['description']) ? $_POST['description']: ''; 
        if($id == ''){
          $this->db->insert('tbl_transaction_type_master',array('name' =>$name , 'description' => $description,'code'=>$code));
          $this->session->set_flashdata('success', 'Record inserted successfully'); 
          redirect('Dashboard/transaction_type_master_listing');
        }else{
          $this->db->where('transaction_type_master_id',$id)->update('tbl_transaction_type_master',array('name' =>$name , 'description' => $description,'code'=>$code));
          $this->session->set_flashdata('success', 'Record update successfully'); 
          redirect('Dashboard/transaction_type_master_listing'); 
        }
       }else{
          $this->session->set_flashdata('failure', 'Record not inserted successfully'); 
          redirect('Dashboard/transaction_type_master_listing'); 
       }
    }
    
    public function transcationtypemasterDelete($id = ''){
        $this->db->where('transaction_type_master_id',$id)->delete('tbl_transaction_type_master');
         $this->session->set_flashdata('success', 'Record Delete successfully'); 
        redirect('Dashboard/transaction_type_master_listing'); 
    }
    
    public function transcationtypemasterEdit($id = '' ){
       $data = $this->db->where('transaction_type_master_id',$id)->get('tbl_transaction_type_master')->row_array();
       $this->load->view('add_transcation_type_master',array('data' => $data));
    }
    
    public function Employeesmasterlist(){
          $data = $this->db->get('tbl_master_employees')->result_array();
          $this->load->view('master-employee-list',array('data' => $data));
    }
    public function Employee(){
        $this->load->view('add_employee_master',array());
    }
    public function addEmployeesmaster(){
         if(isset($_POST['submit'])){
          $id = isset($_POST['id']) ? $_POST['id']: ''; 
          $name = isset($_POST['name']) ? $_POST['name']: ''; 
          $code = isset($_POST['code']) ? $_POST['code']: '';
          $description = isset($_POST['description']) ? $_POST['description']: ''; 
          $salary = isset($_POST['salary']) ? $_POST['salary']: ''; 
          $position = isset($_POST['position']) ? $_POST['position']: ''; 
        if($id == ''){
          $this->db->insert('tbl_master_employees',array('name' =>$name , 'description' => $description,'code'=>$code,'position'=>$position,'salary'=>$salary));
          $this->session->set_flashdata('success', 'Record inserted successfully'); 
          redirect('Dashboard/Employeesmasterlist');
        }else{
          $this->db->where('master_employee_id',$id)->update('tbl_master_employees',array('name' =>$name , 'description' => $description,'code'=>$code,'position'=>$position,'salary'=>$salary));
          $this->session->set_flashdata('success', 'Record update successfully'); 
          redirect('Dashboard/Employeesmasterlist'); 
        }
       }else{
          $this->session->set_flashdata('failure', 'Record not inserted successfully'); 
          redirect('Dashboard/Employeesmasterlist'); 
       }
    }
    
    public function MasterEmployeeDelete($id = ''){
        $this->db->where('master_employee_id',$id)->delete('tbl_master_employees');
         $this->session->set_flashdata('success', 'Record Delete successfully'); 
        redirect('Dashboard/Employeesmasterlist'); 
    }
    
    public function MasterEmployeeEdit($id = '' ){
       $data = $this->db->where('master_employee_id',$id)->get('tbl_master_employees')->row_array();
       $this->load->view('add_employee_master',array('data' => $data));
    }
    
    public function master_payment(){
         $this->load->view('master-payment');
    }
    
    public function add_master_payment(){
        if(isset($_POST['submit'])){
            $transcation_type = $_POST['transaction_type'];
            $member_id = $_POST['member_id'];
            $employee_id = $_POST['employee_id'];
            $employee_code = $_POST['employee_code'];
            $service_provider = $_POST['service_provider'];
            $payment_method = $_POST['payment_method'];
            $bank_account = $_POST['bank_account'];
            $cheque_number = $_POST['cheque_number'];
            $amount = $_POST['amount'];
            $paid_by = $_POST['paid_by'];
            $gst = $_POST['gst'];
            $transaction_for = $_POST['transaction_for'];
            $type = $_POST['type'];
            $date = date("Y-m-d H:i:s");
            
            if($payment_method == 'cash'){
                $account_description = 'CASH';
                $gl_account = '1000';
            }else{
                $account_description = 'Bank';
                $gl_account = '1011';
                $bank_detail = $this->db->where('bank_account_id',$bank_account)->get('bank_accounts')->row_array();
            }
            if(!empty($transcation_type)){
                $data = $this->db->where('transaction_type_id',$transcation_type)->get('tbl_transcation_type_category_selection_master')->row_array();
                $transaction_name = $data['transaction_type_name'];
                if(!empty($data['category_id'])){
                   $categree_id =  $this->db->where('category_id',$data['category_id'])->get('tbl_category')->row_array();
                   $category_desc = $categree_id['description'] ;
                   $c_code = $categree_id['code'] ;
                }if(!empty($data['general_ledger_id'])){
                    $gl_ids = $this->db->where('id',$data['general_ledger_id'])->get('tbl_ledger_account')->row_array();
                    $Another_account = $gl_ids['name'];
                }if(!empty($data['general_ledger_id_from'])){
                    $gl_ids = $this->db->where('id',$data['general_ledger_id_from'])->get('tbl_ledger_account')->row_array();
                    $Another_account_From = $gl_ids['name'];
                }
                $transcation_code = $this->db->where('transaction_type_master_id',$transcation_type)->get('tbl_transaction_type_master')->row_array();
                
                if($transcation_code['code'] == '301'){
                    $account_name = $_POST['employee_name'];
                }elseif($transcation_code['code'] == '116'){
                    $account_name =  $_POST['member_name'];
                }elseif($transcation_code['code'] == '600'){
                    $account_name =  $_POST['expenses_name'];
                }
            }
            
            $check_insert_id = $this->db->select('insert_id')->ORDER_BY('general_ledger_master_id','DESC')->get('tbl_general_ledger_master')->row_array();
            if(!empty($check_insert_id['insert_id'])){
                $insert_id =$check_insert_id['insert_id'] + 1;
            }else{
                $insert_id = 1;
            }
            
            $data = array(
                'insert_id'=> $insert_id,
                'c_code' => isset($c_code) ? $c_code :'0',
                'category_desc' => isset($category_desc) ? $category_desc :'0',
                'transaction_mode' => isset($payment_method) ? $payment_method :'0',
                'transaction_type' => isset($transaction_name) ? $transaction_name :'',
                'transaction_description' => isset($transaction_for) ? $transaction_for :'0',
                'amount' => isset($amount) ? $amount :'0',
                'Dr/Cr' =>'Dr',
                'sub_id' => $member_id,
                'account_name' => isset($account_name) ? $account_name : '',
                'added_date' => $date,
                // 'account_description' => isset($account_description) ? $account_description :'',
                'account_description' => isset($Another_account_From) ? $Another_account_From :'',
                'gl_account' => '1002',
                'type' => 'Payment',
            );
             $insert_data =  $this->db->insert('tbl_general_ledger_master',$data);
             $insert_id = $this->db->insert_id();
             $selest_ensert_id = $this->db->where('general_ledger_master_id',$insert_id)->get('tbl_general_ledger_master')->row_array();
              $data2 = array(
                'insert_id'=> $selest_ensert_id['insert_id'],
                'c_code' => isset($c_code) ? $c_code :'0',
                'category_desc' => isset($category_desc) ? $category_desc :'0',
                'transaction_mode' => isset($payment_method) ? $payment_method :'0',
                'transaction_type' => isset($transaction_name) ? $transaction_name :'',
                'transaction_description' => isset($transaction_for) ? $transaction_for :'0',
                'amount' => isset($amount) ? $amount :'0',
                'Dr/Cr' =>'Cr',
                'sub_id' => $member_id,
                'account_name' => isset($account_name) ? $account_name :'',
                'added_date' => $date,
                'account_description' => isset($Another_account) ? $Another_account : '',
                'gl_account' => $gl_account,
                'type' => 'Payment'
            );
            $history_data = array(
			'transaction_type'=>isset($transcation_type) ? $transcation_type :'',
			'transaction_for'=>isset($transaction_for) ? $transaction_for :'0',
			'transaction_amount'=>$amount ,
			'added_date'=>$date, // added_date
			'plan_id'=>isset($member_id['plan_id']) ? $member_id['plan_id'] : '',
			'plan_name'=>isset($plan_name['plan_name']) ? $plan_name['plan_name'] : '',
			'subscriber_id'=> isset($member_id) ? $member_id : '', //Subscriber_id
			'payment_mode'=>isset($payment_method) ? $payment_method : '',
			'cheque_number'=>isset($cheque_number) ? $cheque_number : '',
			'payment_proof'=>isset($payment_proof) ? $payment_proof : '',
			'ten' =>isset($ten) ? $ten : '',
			'tewenty' =>isset($twenty) ? $twenty : '',
			'fifty' =>isset($fifty) ? $fifty : '',
			'hundred' =>isset($hundred) ? $hundred : '',
			'two_hundred' =>isset($two_hundred) ? $two_hundred : '',
			'opening_balance' =>isset($abc['opening_balance']) ? $abc['opening_balance'] : '',
			'current_balance' =>isset($abc['current_amount']) ? $abc['current_amount'] : '',
			'five_hundred' =>isset($five_hundred) ? $five_hundred : '',
			'two_thousand' =>isset($two_thousand) ? $two_thousand : '',
			'is_payment_by_cash' =>isset($is_payment_by_cash) ? $is_payment_by_cash : '',
			'added_date' => date('Y-m-d h:i:s'),
			'transaction_month' => date("M,Y"),
			'transaction_amount_after_gst' =>isset($after_gst_amount) ? $after_gst_amount : '',
			'is_gst_included' =>isset($is_gst_included) ? $is_gst_included : '',
			'gst_percentage' =>isset($gst_percentage) ? $gst_percentage : '',
			'gst_amount' =>isset($gst_amount) ? $gst_amount : '',
			'tax_type' => isset($gst_name) ? $gst_name : '',
			'type' =>'payment'
		  );
		  $this->db->insert('tbl_transactions',$history_data);
            $this->db->insert('tbl_general_ledger_master',$data2);
              $this->session->set_flashdata('success', 'Record inserted successfully'); 
            redirect('Dashboard/masterledgerAccount');
        }else{
            $this->session->set_flashdata('failure', 'Record not inserted successfully'); 
            redirect('Dashboard/masterledgerAccount');
        }
    }
    
    public function masterledgerAccount(){
        $this->load->view('master-ledger-listing');
    }
    
    public function master_Receipt(){
        $this->load->view('master-receipt');
    }
    
    public function add_master_receipt(){
        if(isset($_POST['submit'])){
            $transcation_type = $_POST['transaction_type'];
            $member_id = $_POST['member_id'];
            $payment_method = $_POST['payment_method'];
            $bank_account = $_POST['bank_account'];
            $cheque_number = $_POST['cheque_number'];
            $amount = $_POST['amount'];
            $paid_by = $_POST['received_by'];
            $gst = $_POST['gst'];
            $transaction_for = $_POST['transaction_for'];
            $type = $_POST['type'];
            $date = date("Y-m-d H:i:s");
            
            if($transcation_type == 'subscriber money'){
                $member_name = $this->db->where('member_id',$member_id)->get('tbl_members')->row_array();
                $account_name =  $member_name['name'];
                $c_code = '406';
                $category_desc = 'Subscription Money Received';
            }else{
                $account_name = 'Bank Account';
                $c_code = '624';
                $category_desc = 'Other Receipts';
            }
            $check_insert_id = $this->db->select('insert_id')->ORDER_BY('general_ledger_master_id','DESC')->get('tbl_general_ledger_master')->row_array();
            if(!empty($check_insert_id['insert_id'])){
                $insert_id =$check_insert_id['insert_id'] + 1;
            }else{
                $insert_id = 1;
            }
            if($payment_method == 'cash'){
                $account_description = 'CASH';
                $gl_account = '1000';
            }else{
                $account_description = 'Bank';
                $gl_account = '1011';
                $bank_detail = $this->db->where('bank_account_id',$bank_account)->get('bank_accounts')->row_array();
            }
            $data = array(
                'insert_id'=> $insert_id,
                'c_code' => isset($c_code) ? $c_code :'0',
                'category_desc' => isset($category_desc) ? $category_desc :'0',
                'transaction_mode' => isset($payment_method) ? $payment_method :'0',
                'transaction_type' => isset($transcation_type) ? $transcation_type :'',
                'transaction_description' => isset($transaction_for) ? $transaction_for :'0',
                'amount' => isset($amount) ? $amount :'0',
                'Dr/Cr' =>'Dr',
                'sub_id' => $member_id,
                'account_name' => $account_name,
                'added_date' => $date,
                'account_description' => isset($account_description) ? $account_description :'',
                'gl_account' => '1002',
                'type' => 'Receipt',
                'user' => 'Senthil',
            );
            
             $insert_data =  $this->db->insert('tbl_general_ledger_master',$data);
             $insert_id = $this->db->insert_id();
             $selest_ensert_id = $this->db->where('general_ledger_master_id',$insert_id)->get('tbl_general_ledger_master')->row_array();
             
              $data2 = array(
                'insert_id'=> $selest_ensert_id['insert_id'],
                'c_code' => isset($c_code) ? $c_code :'0',
                'category_desc' => isset($category_desc) ? $category_desc :'0',
                'transaction_mode' => isset($payment_method) ? $payment_method :'0',
                'transaction_type' => isset($transcation_type) ? $transcation_type :'',
                'transaction_description' => isset($transaction_for) ? $transaction_for :'0',
                'amount' => isset($amount) ? $amount :'0',
                'Dr/Cr' =>'Cr',
                'sub_id' => isset($member_id) ? $member_id :'0',
                'account_name' => isset($bank_detail['bank_name']) ? $bank_detail['bank_name'] : '6' ,
                'added_date' => $date,
                'account_description' => isset($account_name) ? $account_name : '6' ,
                'gl_account' => $gl_account,
                'type' => 'Receipt',
                'user' => 'Senthil',
            );
            $this->db->insert('tbl_general_ledger_master',$data2);
            $history_data = array(
			'transaction_type'=>isset($transcation_type) ? $transcation_type :'',
			'transaction_for'=>isset($transaction_for) ? $transaction_for :'0',
			'transaction_amount'=>isset($amount) ? $amount :'0',
			'added_date'=>$date, // added_date
			'plan_id'=>isset($member_id['plan_id']) ? $member_id['plan_id'] : '',
			'plan_name'=>isset($plan_name['plan_name']) ? $plan_name['plan_name'] : '',
			'subscriber_id'=> isset($member_id) ? $member_id : '', //Subscriber_id
			'payment_mode'=>isset($payment_method) ? $payment_method : '',
			'cheque_number'=>isset($cheque_number) ? $cheque_number : '',
			'payment_proof'=>isset($payment_proof) ? $payment_proof : '',
			'ten' =>isset($ten) ? $ten : '',
			'tewenty' =>isset($twenty) ? $twenty : '',
			'fifty' =>isset($fifty) ? $fifty : '',
			'hundred' =>isset($hundred) ? $hundred : '',
			'two_hundred' =>isset($two_hundred) ? $two_hundred : '',
			'opening_balance' =>isset($abc['opening_balance']) ? $abc['opening_balance'] : '',
			'current_balance' =>isset($abc['current_amount']) ? $abc['current_amount'] : '',
			'five_hundred' =>isset($five_hundred) ? $five_hundred : '',
			'two_thousand' =>isset($two_thousand) ? $two_thousand : '',
			'is_payment_by_cash' =>isset($is_payment_by_cash) ? $is_payment_by_cash : '',
			'added_date' => date('Y-m-d h:i:s'),
			'transaction_month' => date("M,Y"),
			'transaction_amount_after_gst' =>isset($after_gst_amount) ? $after_gst_amount : '',
			'is_gst_included' =>isset($is_gst_included) ? $is_gst_included : '',
			'gst_percentage' =>isset($gst_percentage) ? $gst_percentage : '',
			'gst_amount' =>isset($gst_amount) ? $gst_amount : '',
			'tax_type' => isset($gst_name) ? $gst_name : '',
			'type' =>'receipt'
		  );
		  $this->db->insert('tbl_transactions',$history_data);
              $this->session->set_flashdata('success', 'Record inserted successfully'); 
            redirect('Dashboard/masterledgerAccount');
        }else{
            $this->session->set_flashdata('failure', 'Record not inserted successfully'); 
            redirect('Dashboard/masterledgerAccount');
        }
    }
    
    public function bankAccountList(){
         $data = $this->db->get('bank_accounts')->result_array();
         $this->load->view('bank-account-listing',array('data' => $data));
    }
    
    public function BankAccount(){   // show to add bank account view
        $this->load->view('add-bank-account'); 
    }
    
    public function AddBnakAccount(){  // submit to add data in bank account
        if(isset($_POST['submit'])){
          $id = isset($_POST['id']) ? $_POST['id']: ''; 
        if($id == ''){
          $this->db->insert('bank_accounts',array('first_name' => $_POST['first_name'],'last_name' => $_POST['last_name'],'bank_name'=>$_POST['bank_name'] , 'branch_name' => $_POST['branch_name'] , 'account_number' => $_POST['account_number'] , 'ifsc_code' => $_POST['ifsc_code'] , 'address' =>$_POST['address'] ,'city' => $_POST['city'] ,'pincode' => $_POST['pincode'] , 'current_account_balance' => $_POST['current_account_balance']));
          $this->session->set_flashdata('success', 'Record inserted successfully'); 
          redirect('Dashboard/bankAccountList');
        }else{
          $this->db->where('bank_account_id',$id)->update('bank_accounts',array('first_name' => $_POST['first_name'],'last_name' => $_POST['last_name'],'bank_name'=>$_POST['bank_name'] , 'branch_name' => $_POST['branch_name'] , 'account_number' => $_POST['account_number'] , 'ifsc_code' => $_POST['ifsc_code'] , 'address' =>$_POST['address'] ,'city' => $_POST['city'] ,'pincode' => $_POST['pincode'] , 'current_account_balance' => $_POST['current_account_balance']));
          $this->session->set_flashdata('success', 'Record update successfully'); 
          redirect('Dashboard/bankAccountList'); 
        }
       }else{
          $this->session->set_flashdata('failure', 'Record not inserted successfully'); 
          redirect('Dashboard/bankAccountList'); 
       }
    }
    
    public function EditBankAccount($id = ''){
       $data = $this->db->where('bank_account_id',$id)->get('bank_accounts')->row_array();
       $this->load->view('add-bank-account',array('data' => $data));
    }
    public function DeleteBankAccount($id = ''){
        $this->db->where('bank_account_id',$id)->delete('bank_accounts');
         $this->session->set_flashdata('success', 'Record Delete successfully'); 
        redirect('Dashboard/bankAccountList'); 
    }
    
    public function MasterPaymentListing(){
        $data = $this->db->where('type','Payment')->where('Dr/Cr','Dr')->get('tbl_general_ledger_master')->result_array();
        $this->load->view('master-payment-listing',array('data' => $data));
    }
    
    public function CategoryListing(){
        $data = $this->db->get('tbl_category')->result_array();
        $this->load->view('master-category-listing',array('data' => $data));
    }
    
    public function MasterCategory(){
        $this->load->view('add-master-category');
    }
    public function addMasterCategory(){
         if(isset($_POST['submit'])){
          $id = isset($_POST['id']) ? $_POST['id']: ''; 
          $name = isset($_POST['name']) ? $_POST['name']: ''; 
          $code = isset($_POST['code']) ? $_POST['code']: '';
          $description = isset($_POST['description']) ? $_POST['description']: ''; 
        if($id == ''){
          $this->db->insert('tbl_category',array('name' =>$name , 'description' => $description,'code'=>$code));
          $this->session->set_flashdata('success', 'Record inserted successfully'); 
          redirect('Dashboard/CategoryListing');
        }else{
          $this->db->where('category_id',$id)->update('tbl_category',array('name' =>$name , 'description' => $description,'code'=>$code));
          $this->session->set_flashdata('success', 'Record update successfully'); 
          redirect('Dashboard/CategoryListing'); 
        }
       }else{
          $this->session->set_flashdata('failure', 'Record not inserted successfully'); 
          redirect('Dashboard/CategoryListing'); 
       }
    }
    
    public function Editcategory($id = ''){
       $data = $this->db->where('category_id',$id)->get('tbl_category')->row_array();
       $this->load->view('add-master-category',array('data' => $data));
    }
    
    public function Deletecategory($id = ''){
        $this->db->where('category_id',$id)->delete('tbl_category');
         $this->session->set_flashdata('success', 'Record Delete successfully'); 
        redirect('Dashboard/CategoryListing'); 
    }
    
    public function RefreshControl(){
         $res = json_decode(callAPI('POST','automaticReports'),true);
          $this->session->set_flashdata('success',' successfully'); 
        redirect('Dashboard/getControlSheetWithFilter'); 
    }
    
    public function demo(){
        $this->load->view('demo');
    }
    
    public function ExpensesListing(){
        $data = $this->db->get('tbl_master_expenses')->result_array();
        $this->load->view('master-expenses-list',array('data' => $data));
    }
    
    public function MasterExpenses(){
        $this->load->view('add_master_expenses');
    }
    
    public function AddMasterExpenses(){
         if(isset($_POST['submit'])){
          $id = isset($_POST['id']) ? $_POST['id']: ''; 
          $name = isset($_POST['name']) ? $_POST['name']: ''; 
          $code = isset($_POST['code']) ? $_POST['code']: '';
          $description = isset($_POST['description']) ? $_POST['description']: ''; 
        if($id == ''){
          $this->db->insert('tbl_master_expenses',array('name' =>$name , 'description' => $description,'code'=>$code));
          $this->session->set_flashdata('success', 'Record inserted successfully'); 
          redirect('Dashboard/ExpensesListing');
        }else{
          $this->db->where('expense_id',$id)->update('tbl_master_expenses',array('name' =>$name , 'description' => $description,'code'=>$code));
          $this->session->set_flashdata('success', 'Record update successfully'); 
          redirect('Dashboard/ExpensesListing'); 
        }
       }else{
          $this->session->set_flashdata('failure', 'Record not inserted successfully'); 
          redirect('Dashboard/ExpensesListing'); 
       }
    }
    
    public function MasterExpensesEdit($id=''){
        $data = $this->db->where('expense_id',$id)->get('tbl_master_expenses')->row_array();
        $this->load->view('add_master_expenses',array('data'=> $data));
    }
    
    public function MasterExpensesDelete($id=''){
        $data = $this->db->where('expense_id',$id)->delete('tbl_master_expenses');
        $this->session->set_flashdata('success', 'Record Delete successfully'); 
        redirect('Dashboard/ExpensesListing'); 
    }
    
    public function TranscationTypeSelectionMaster(){
        $this->load->view('master-transcation-selection-list');
    }
    
    public function MasterTranscationSelectionList(){
        $this->load->view('add-master-transcation-selection-category');
    }
    
    public function AddtranscationSelectCategory(){
        $no = 0;
        foreach($_POST as $keys=>$values){
            if($keys == 'transcation_type_code'){
                foreach($values as $k=>$y){
                    $no = $no +1;
                }
            }
        }
        $no = $no - 1;
        $data = array();
       for($i=0 ; $i<=$no ; $i++){
            $ids= array_column($_POST, $i);
            $data[] = $ids;
       }
    //   echo '<pre>';
    //   print_r($data);die;
       foreach($data as $key=>$val){ 
           if(!empty($val[0])){
                $get_transcation_type = $this->db->where('transaction_type_master_id',$val[0])->get('tbl_transaction_type_master')->row_array();
                $ty_name = $get_transcation_type['name'];
                $ty_code = $get_transcation_type['code'];
           }if(!empty($val[1])){
               $get_category = $this->db->where('category_id',$val[1])->get('tbl_category')->row_array();
               $ct_name = $get_category['name'];
               $ct_code = $get_category['code'];
           }if(!empty($val[2])){
               $get_gledger = $this->db->where('id',$val[2])->get('tbl_ledger_account')->row_array();
               $gl_name = $get_gledger['name'];
               $gl_code = $get_gledger['code'];
           }if(!empty($val[3])){
               $get_gledger2 = $this->db->where('id',$val[3])->get('tbl_ledger_account')->row_array();
               $gl_name_from = $get_gledger2['name'];
               $gl_code_from = $get_gledger2['code'];
           }
        //   print_r($val[3]);die;
           $submit_data = array(
               'transaction_type_name' => isset($ty_name) ? $ty_name : '',
               'transaction_type_id' => isset($val[0]) ? $val[0] : ' ',
               'transaction_type_code' => isset($ty_code) ? $ty_code : '',
               'category_id' => isset($val[1]) ? $val[1] : '',
               'category_name' => isset($ct_name) ? $ct_name : '',
               'category_code' => isset($ct_code) ? $ct_code : '',
               'general_ledger_name' => isset($gl_name) ? $gl_name : '',
               'general_ledger_id' => isset($val[3]) ? $val[3] : '',
               'general_ledger_code' =>isset($gl_code) ? $gl_code : '',
               'general_ledger_id_from' => isset($val[2]) ? $val[2] : '',
               'general_ledger_nam_frome' => isset($gl_name_from) ? $gl_name_from : '',
               'general_ledger_code_from' => isset($gl_code_from) ? $gl_code_from : '',
               );
          $lastdata = $this->db->where('transaction_type_id',$val[0])->get('tbl_transcation_type_category_selection_master')->row_array();
          if(!empty($lastdata)){
              $this->db->where('transaction_type_id',$val[0])->update('tbl_transcation_type_category_selection_master',$submit_data);
          }else{
              $this->db->insert('tbl_transcation_type_category_selection_master',$submit_data);
          }
       }
       $this->session->set_flashdata('success', 'Successfully');
      redirect('Dashboard/TranscationTypeSelectionMaster'); 
    }
    
    public function change_status_plan($plan_id=''){
        $getstatus = $this->db->where('plan_id',$plan_id)->get('tbl_plans')->row_array();
        if($getstatus['status'] == 'active'){
            $update_status = array(
                'status' => 'inactive'
                );
            $this->db->where('plan_id',$plan_id)->update('tbl_plans',$update_status);
            $this->session->set_flashdata('success', 'Inactive'.''.$getstatus['plan_name']);
             redirect('Dashboard/subscription_listing');
        }else{
            $update_status = array(
                'status' => 'active'
                );
            $this->db->where('plan_id',$plan_id)->update('tbl_plans',$update_status);
            $this->session->set_flashdata('success', 'Active'.' '.$getstatus['plan_name']);
             redirect('Dashboard/subscription_listing');
        }
    }
    
    public function saveBidEndNow(){
        $amount = isset($_POST['amount']) ? $_POST['amount'] :'';
        $slot_number = isset($_POST['slot_number']) ? $_POST['slot_number'] :'';
        $auction_id = isset($_POST['auction_id']) ? $_POST['auction_id'] :'';
        $auction_detail = $this->db->where('auction_id',$auction_id)->get('tbl_auction')->row_array();
        
        $daata = $this->db->select('forgo_amount')->where('auction_id',$auction_id)->get('tbl_bids')->result_array();
		$plan_id =    $this->db->select('plan_id,group_id')->where('auction_id',$auction_id)->get('tbl_auction')->row_array();
		$group_id = isset($auction_detail['group_id']) ? $auction_detail['group_id'] : '';
		$plan_name =  $this->db->select('plan_name')->where('plan_id',$auction_detail['plan_id'])->get('tbl_plans')->row_array();
	    
	    $plan_amount_detail = $this->db->where('plan_id',$auction_detail['plan_id'])->get('tbl_plans')->row_array();
		$plan_amount = isset($plan_amount_detail['plan_amount']) ? $plan_amount_detail['plan_amount'] : '';
		if(!empty($plan_amount_detail['remaining_month'])){
		   $remaining_month = isset($plan_amount_detail['remaining_month']) ? $plan_amount_detail['remaining_month'] : 1; 
		}else{
		    $output = 'Plan Month is completed';
		    echo json_encode($output); die;
		}
        $bid_amount = $plan_amount - $amount;
        // print_r($remaining_month);die;
		$cost_of_chit_taken = ($bid_amount/$remaining_month)/($plan_amount - $bid_amount);	
		$max_bid_amount = ($plan_amount_detail['plan_amount']*$plan_amount_detail['max_bid'])/100; 
		
		if($max_bid_amount > $amount){
		    if($plan_amount_detail['min_bid_amount'] < $amount){
		        	$get_orders = $this->db->where('slot_number',$slot_number)->where('plan_id',$auction_detail['plan_id'])->get('tbl_orders')->row_array();
		      //  	print_r($get_orders);die;
                    $data = array(
                        'plan_id' => isset($auction_detail['plan_id']) ? $auction_detail['plan_id'] :'',
                        'auction_id' => isset($auction_id) ? $auction_id :'',
                        'member_id' => isset($get_orders['member_id']) ? $get_orders['member_id'] : '0',
                        'group_id' => isset($auction_detail['group_id']) ? $auction_detail['group_id'] :'',
                        'agent_id' => '0',
                        'plan_name' => isset($plan_name['plan_name']) ? $plan_name['plan_name'] : '',
                        'member_name' => isset($get_orders['member_name']) ? $get_orders['member_name'] : '',
                        'bid_amount' => isset($bid_amount) ? $bid_amount : '',
                        'forgo_amount' => isset($amount) ? $amount :'',
                        'divident' => '',
                        'cost_of_chit_taken' => isset($cost_of_chit_taken) ? $cost_of_chit_taken :'',
                        'slot_number' => isset($slot_number) ? $slot_number :'',
                        'added_date' => date('y-m-d H:i:s'),
                        );
                    $this->db->insert('tbl_bids',$data);
                    $data = array(
                        'auction_id' => isset($auction_id) ? $auction_id : '',
                    );
                    $saveBidByAgent= json_decode(callAPI('POST','endauctionnow',$data),true);
                    $output = 1;
		    }else{
		        $output ="Discount allowed more then ".$plan_amount_detail['min_bid_amount'];
		    }
		}else{
		    $output ="Discount allowed less then ".$max_bid_amount;
		}
        echo json_encode($output); die;
    }
    
    
    public function enterAuction2(){
        $group_id = isset($_POST['group_id']) ? $_POST['group_id'] :'';
        $plan_id = isset($_POST['plan_id']) ? $_POST['plan_id'] :'';
        $plan_data =$this->db->where('plan_id',$plan_id)->get('tbl_plans')->row_array();
        
        
        
        $time=strtotime($plan_data['added_date']);
        $month=date("M",$time);
        
        $new_array = array();
        for($i=0 ; $i < $plan_data['total_months'] ; $i++){
            $date = new DateTime('now');
            $date->modify('+'.$i.' month'); // or you can use '-90 day' for deduct
            $date = $date->format('Y-m-d h:i:s');
            
            $time=strtotime($date);
            $month=date("F-Y",$time);
            
            $iplus = $i +1;
            $auction_detail = $this->db->where('plan_id',$plan_id)->where('group_id',$group_id)->where('auction_no',$iplus)->get('tbl_auction')->num_rows();
            $auction_detail2 = $this->db->where('plan_id',$plan_id)->where('group_id',$group_id)->where('auction_no',$iplus)->get('tbl_auction')->row_array();
            if(!empty($auction_detail2)){
                $auction_id = $auction_detail2['auction_id'];
                $status = $auction_detail2['status'];
                $set_month = $auction_detail2['month'];
                $auction_type = $auction_detail2['auction_type'];
            }else{
                $auction_id = 0;
                $status = '';
                $set_month = $month;
                $auction_type = '';
            }
            $new_array[] =  array('month'=> $set_month,'auction_type' => $auction_type, 'group_id'=>$group_id,'plan_id'=>$plan_id,'status' => $status,'status_2' => $auction_detail,'auction_no'=>$i+1,'auction_id'=>$auction_id);
        }
        $this->load->view('all-group-auction',array('data'=> $new_array,'plan_id'=>$plan_id,'group_id'=>$group_id ));
    }
    
    public function enterAuction(){
        $group_id = isset($_POST['group_id']) ? $_POST['group_id'] :'';
        $plan_id = isset($_POST['plan_id']) ? $_POST['plan_id'] :'';
        $plan_data =$this->db->where('plan_id',$plan_id)->get('tbl_plans')->row_array();
        $group_data =$this->db->where('group_id',$group_id)->get('tbl_groups')->row_array();
        $auction_detail = $this->db->where('plan_id',$plan_id)->where('group_id',$group_id)->get('tbl_auction')->result_array();
        $data2 = array(
            'plan_id' => $plan_id,
            'group_id' => $group_id,
            'plan_name' => $plan_data['plan_name'],
            'group_name' => $group_data['group_name'],
            );
        
        $new_array = array();
        $i = 1;
        if(!empty($auction_detail)){
            foreach($auction_detail as $key=>$val){
                $new_array[] =  array('month'=> $val['month'],'auction_type' => $val['auction_type'] , 'group_id'=>$group_id,'plan_id'=>$plan_id,'status' =>$val['status'],'status_2' => '1','auction_no' => $val['auction_no'],'auction_id'=>$val['auction_id']);
                $i =+1; 
            }
            $getLastAuction = $this->db->where('plan_id',$plan_id)->where('group_id',$group_id)->order_by('auction_id','desc')->get('tbl_auction')->row_array();
            $last_date = $getLastAuction['month'];
            
            $new_auction_no = $getLastAuction['auction_no'] + 1;
            $time = strtotime($last_date);
            $final = date("F-Y", strtotime("+1 month", $time));
            
            $count_auction = $this->db->where('plan_id',$plan_id)->where('group_id',$group_id)->order_by('auction_id','desc')->get('tbl_auction')->num_rows();
            
            if($count_auction < $plan_data['total_months']){
                $check_all_au_end = $this->db->where('plan_id',$plan_id)->where('group_id',$group_id)->where('status','1')->get('tbl_auction')->num_rows();
                if($check_all_au_end < 1){
                    $new_array[] =  array('month'=> $final, 'auction_type' => '', 'group_id'=>$group_id,'plan_id'=>$plan_id,'status' => '','status_2' => '0','auction_no'=>$new_auction_no,'auction_id'=>0);
                }
            }
        }else{
            $final = date("F-Y", strtotime($plan_data['start_month']));
            $new_array[] =  array('month'=> $final,'auction_type' => '', 'group_id'=>$group_id,'plan_id'=>$plan_id,'status' => '','status_2' => '0','auction_no'=>1,'auction_id'=>0);
        }
        $this->load->view('all-group-auction',array('data'=> $new_array,'plan_id'=>$plan_id,'group_id'=>$group_id,'data2'=>$data2));
    }
    
    public function auction_restart(){
        $auction_id = isset($_POST['auction_id']) ? $_POST['auction_id'] :'';
        $auction_data = array(
            'status' => '1',
            ); 
        $this->db->where('auction_id',$auction_id)->update('tbl_auction',$auction_data);
        $this->db->where('auction_id',$auction_id)->delete('tbl_bids');
        $this->db->where('auction_id',$auction_id)->delete('divident_port');
        redirect('Dashboard/liveAuction/'.$auction_id);
    }
    
    
    public function CheckMobileIsExist(){
        $data = $this->db->where('mobile',$_POST['mobile'])->get('users')->num_rows();
        echo json_encode($data);
    }
    
    public function checkVariableAmountAuction(){
        $plan_id = isset($_POST['plan_id']) ? $_POST['plan_id'] :'';
        $plot_amount = isset($_POST['variable_amount']) ? $_POST['variable_amount'] :'';
        
        $data = $this->db->where('plan_id',$plan_id)->get('tbl_plans')->row_array();
        if($data['auction_type'] == 'variable_auction'){
            $plan_var_amount = $data['plan_amount'] * $data['variable_auction_percentage'] / 100;
            if($plan_var_amount <= $plot_amount){
                $output = array(
                'status' => 1,
                'message' => 'success'
                );
            }else{
                $output = array(
                'status' => 0,
                'message' => 'Port amount should be '.$plan_var_amount.' or more'
                );
            }
        }else{
            $output = array(
                'status' => 0,
                'message' => 'This is not a variabe auction'
                );
        }
        echo json_encode($output);
    }
    
    public function startVariableAuction(){
        
            $getplan = $this->db->where('plan_id',$_POST['plan_id'])->get('tbl_plans')->row_array();
			$foreman_fees = $getplan['foreman_fees'];
			$plan_amount = isset($_POST['port_amount']) ? $_POST['port_amount'] :'';
			
// 			$min_bid_amount = $getplan['plan_amount'] - $_POST['port_amount'];

            $min_bid_amount = $getplan['plan_amount'] * $foreman_fees / 100;
			
			$min_prize_amount = $plan_amount * $foreman_fees / 100;

			$months_completed = $getplan['months_completed'];

            $month = isset($_POST['month']) ? $_POST['month'] :'';
            if(empty($month)){
                $newDate = date("F-Y", strtotime($_POST['month2']));  
                
                $get_data = $this->db->where('plan_id',$_POST['plan_id'])->where('group_id',$_POST['group_id'])->where('month',$newDate)->get('tbl_auction')->num_rows();
                if($get_data != 0){
                    $update_tenure = $getplan['tenure'] - 1;
                    $update_array = array(
                        'tenure' => $update_tenure
                        );
                    $this->db->where('plan_id',$_POST['plan_id'])->update('tbl_plans',$update_array);
                }else{
                    // echo $newDate;
                    $getLastAuction = $this->db->select('month')->where('plan_id',$_POST['plan_id'])->where('group_id',$_POST['group_id'])->order_by('auction_id','desc')->get('tbl_auction')->row_array();
                    $Last_auction_date = date('m', strtotime($getLastAuction['month']));
                    $Current_auction_date = date('m', strtotime($newDate));
                    $defference = $Current_auction_date - $Last_auction_date;
                    if($defference > 0){
                        $update_array = array(
                            'tenure' => $defference + $getplan['tenure'] -1,
                        );
                        $this->db->where('plan_id',$_POST['plan_id'])->update('tbl_plans',$update_array);
                    }else{
                        $update_array = array(
                            'tenure' =>  $getplan['tenure'] + $defference -1,
                        );
                        $this->db->where('plan_id',$_POST['plan_id'])->update('tbl_plans',$update_array);
                    }
                }
            }else{
                $update_array = array(
                            'tenure' =>$getplan['tenure'] - 1,
                        );
                $this->db->where('plan_id',$_POST['plan_id'])->update('tbl_plans',$update_array);
                $newDate = date("F-Y", strtotime($_POST['month']));  
            }
             
             $update_port = array('status' => 'used');
             $this->db->where('plan_id',$_POST['plan_id'])->where('group_id',$_POST['group_id'])->update('divident_port',$update_port);
             
           $data = array(
             'plan_id' => isset($_POST['plan_id']) ? $_POST['plan_id'] :'',
             'auction_no' => isset($_POST['auction_no']) ? $_POST['auction_no'] :'',
			 'group_id' => isset($_POST['group_id']) ? $_POST['group_id'] :'',
             'start_date' => isset($start_date) ? $start_date : '',
             'end_date' => isset($start_date) ? $start_date :'',
			 'start_time' => isset($start_time) ? $start_time :'',
			 'end_time' => isset($end_time) ? $end_time :'',
			 'month' => isset($newDate) ? $newDate :'',
             'status' => "1",
			 'foreman_fees' => $foreman_fees,
			 'min_prize_amount' => $plan_amount,
			 'min_bid_amount' => $min_bid_amount,
			 'plan_amount' => $plan_amount,
			 'auction_type' => 'variable_auction',
             'added_date' => date('Y-m-d h:i:s')
           );
          $this->db->insert('tbl_auction',$data);
          $insert_id = $this->db->insert_id();
       if(!empty($insert_id)){
           redirect('Dashboard/variableLiveAuction/'.$insert_id);
       }else{
           echo 'fsgb';
       }
    }
    
    public function variableLiveAuction($auction_id=""){
        $group_name = isset($_POST['group_name']) ? $_POST['group_name'] : '';
        $forman_fees = isset($_POST['forman_fees']) ? $_POST['forman_fees'] : '';
        $plan_name = isset($_POST['plan_name']) ? $_POST['plan_name'] : '';
        $group_id = isset($_POST['group_id']) ? $_POST['group_id'] : '';
        
        $auction_detail = $this->db->where('auction_id',$auction_id)->get('tbl_auction')->row_array();
        $plan_detail = $this->db->where('plan_id',$auction_detail['plan_id'])->get('tbl_plans')->row_array();
        $group_detail = $this->db->where('group_id',$auction_detail['group_id'])->get('tbl_groups')->row_array();

         $dataBid = array(
            'auction_id' => isset($auction_id) ? $auction_id : '',
         );
         $getBidsForAuction= json_decode(callAPI('POST','getbidsforauction',$dataBid),true);
         
         $dataMemberAuction = array(
           'auction_id' => isset($auction_id) ? $auction_id : '',
          'type' => isset($type) ? $type : 'individual',
         );
        
        $getMembersInAuction= json_decode(callAPI('POST','getMembersInAuction',$dataMemberAuction),true);
        

        $dataliveAuction = array(
         'getBidsForAuction' => isset($getBidsForAuction['data']) ? $getBidsForAuction['data'] : '',
         'getMembersInAuction' => isset($getMembersInAuction['data']) ? $getMembersInAuction['data'] : '',
         'group_name' => isset($group_detail['group_name']) ? $group_detail['group_name'] :'',
         'plan_name' => isset($plan_detail['plan_name']) ? $plan_detail['plan_name'] :'',
         'forman_fees' => isset($auction_detail['min_bid_amount']) ? $auction_detail['min_bid_amount'] :'',
         'auction_id' => $auction_id,
         'plan_amount' => isset($plan_detail['plan_amount']) ? $plan_detail['plan_amount'] :'',
         'group_id' => $group_id,
         'checkbox' => '',
         'plan_id' => $auction_detail['plan_id'],
            'auction_no' => 'Live Auction'.'[ '.$auction_detail['month'].' ]',
            'plan_name' => $plan_detail['plan_name'],
            'group_name' => $group_detail['group_name'],
            'group_id' => $auction_detail['group_id'],
        );
        
        if(!empty($dataliveAuction)){
            $this->load->view('live-variabe-auction',$dataliveAuction);
        }else{
          $this->load->view('live-variabe-auction');  
        }
    }
    
    public function variableLiveAuction2($auction_id=""){
        $group_name = isset($_POST['group_name']) ? $_POST['group_name'] : '';
        $forman_fees = isset($_POST['forman_fees']) ? $_POST['forman_fees'] : '';
        $plan_name = isset($_POST['plan_name']) ? $_POST['plan_name'] : '';
        $group_id = isset($_POST['group_id']) ? $_POST['group_id'] : '';
        
        $auction_detail = $this->db->where('auction_id',$auction_id)->get('tbl_auction')->row_array();
        $plan_detail = $this->db->where('plan_id',$auction_detail['plan_id'])->get('tbl_plans')->row_array();
        $group_detail = $this->db->where('group_id',$auction_detail['group_id'])->get('tbl_groups')->row_array();

         $dataBid = array(
            'auction_id' => isset($auction_id) ? $auction_id : '',
         );
         $getBidsForAuction= json_decode(callAPI('POST','getbidsforauction',$dataBid),true);
         
         $dataMemberAuction = array(
           'auction_id' => isset($auction_id) ? $auction_id : '',
          'type' => isset($type) ? $type : 'combined',
         );
        
        $getMembersInAuction= json_decode(callAPI('POST','getMembersInAuction',$dataMemberAuction),true);
        

        $dataliveAuction = array(
         'getBidsForAuction' => isset($getBidsForAuction['data']) ? $getBidsForAuction['data'] : '',
         'getMembersInAuction' => isset($getMembersInAuction['data']) ? $getMembersInAuction['data'] : '',
         'group_name' => isset($group_detail['group_name']) ? $group_detail['group_name'] :'',
         'plan_name' => isset($plan_detail['plan_name']) ? $plan_detail['plan_name'] :'',
         'forman_fees' => isset($auction_detail['min_bid_amount']) ? $auction_detail['min_bid_amount'] :'',
         'auction_id' => $auction_id,
         'plan_amount' => isset($plan_detail['plan_amount']) ? $plan_detail['plan_amount'] :'',
         'group_id' => $group_id,
         'checkbox' => 'checked',
         'plan_id' => $auction_detail['plan_id'],
            'auction_no' => 'Live Auction'.'[ '.$auction_detail['month'].' ]',
            'plan_name' => $plan_detail['plan_name'],
            'group_name' => $group_detail['group_name'],
            'group_id' => $auction_detail['group_id'],
        );
        
        if(!empty($dataliveAuction)){
            $this->load->view('live-variabe-auction',$dataliveAuction);
        }else{
          $this->load->view('live-variabe-auction');  
        }
    }
    
    public function saveVariableBidEndnow(){
        $auction_id = isset($_POST['auction_id']) ? $_POST['auction_id'] :'';
        $forgo_Amount = isset($_POST['amount']) ? $_POST['amount'] :'';
        $slot_number = isset($_POST['slot_number']) ? $_POST['slot_number'] :'';
        
        $auction_detail = $this->db->where('auction_id',$auction_id)->get('tbl_auction')->row_array();
        $plan_detail = $this->db->where('plan_id',$auction_detail['plan_id'])->get('tbl_plans')->row_array();
        $max_bid_amount = ($plan_detail['plan_amount'] * $plan_detail['max_bid'])/100; 
        
        if($forgo_Amount < $auction_detail['min_bid_amount']){
            $output = array(
                'status' => 0,
                'message' => 'Forgo amount more then '.$auction_detail['min_bid_amount'],
                );
        }else{
            if($max_bid_amount < $forgo_Amount){
                 $output = array(
                    'status' => 0,
                    'message' => 'Forgo amount less then '.$max_bid_amount,
                    );
            }else{  
                    if(!empty($plan_detail['remaining_month'])){
            		   $remaining_month = isset($plan_detail['remaining_month']) ? $plan_detail['remaining_month'] : 1; 
            		}
                    $plan_amount = $plan_detail['plan_amount'];
                    $bid_amount = $plan_amount - $forgo_Amount;
                    $cost_of_chit_taken = ($bid_amount/$remaining_month)/($plan_amount - $bid_amount);
                    $get_orders = $this->db->where('slot_number',$slot_number)->where('plan_id',$auction_detail['plan_id'])->get('tbl_orders')->row_array();
                    $data = array(
                        'plan_id' => isset($auction_detail['plan_id']) ? $auction_detail['plan_id'] :'',
                        'auction_id' => isset($auction_id) ? $auction_id :'',
                        'member_id' => isset($get_orders['member_id']) ? $get_orders['member_id'] : '0',
                        'group_id' => isset($auction_detail['group_id']) ? $auction_detail['group_id'] :'',
                        'agent_id' => '0',
                        'plan_name' => isset($plan_detail['plan_name']) ? $plan_detail['plan_name'] : '',
                        'member_name' => isset($get_orders['member_name']) ? $get_orders['member_name'] : '',
                        'bid_amount' => isset($bid_amount) ? $bid_amount : '',
                        'forgo_amount' => isset($forgo_Amount) ? $forgo_Amount :'',
                        'divident' => '',
                        'cost_of_chit_taken' => isset($cost_of_chit_taken) ? $cost_of_chit_taken :'',
                        'slot_number' => isset($slot_number) ? $slot_number :'',
                        'added_date' => date('y-m-d H:i:s'),
                        );
                    $this->db->insert('tbl_bids',$data);
                    $bid_id = $this->db->insert_id();
                    
                    $plan_Detail_pa = $plan_detail['plan_amount'];
                    
                    $get_plan_less_forgo = $plan_detail['plan_amount'] - $forgo_Amount;
                    
                    $pot_amount = ( $auction_detail['plan_amount'] + $forgo_Amount + $auction_detail['min_bid_amount'] ) - $plan_detail['plan_amount'];
                    
                    $pot_array = array(
                        'plan_id' => isset($auction_detail['plan_id']) ? $auction_detail['plan_id'] :'',
                        'group_id' => isset($auction_detail['group_id']) ? $auction_detail['group_id'] :'',
                        'auction_id' => isset($auction_id) ? $auction_id :'',
                        'status' => 'unused',
                        'divident_amount' =>  $pot_amount,
                        'added_date' => date('y-m-d H:i:s')
                        );
                    $this->db->insert('divident_port',$pot_array);
                    
                    $gst_amount =  $auction_detail['min_bid_amount'] * $plan_detail['plan_gst'] / 100;
                    
                    $return_chit_amount = $plan_detail['plan_amount'];
                    $total_amount_paid = '0';
                    $is_on_EMI = 'yes';	
                    
                    $gst_amount = $plan_detail['min_bid_amount'] * $plan_detail['plan_gst'] / 100;
				
				$admission_amount_gst = $plan_detail['admission_amount'] *  $plan_detail['plan_gst'] / 100;
				
				$chit_amount2 = ($bid_amount - $gst_amount - $plan_detail['admission_amount'] - $admission_amount_gst);
                    
                    $chit_amount = $bid_amount;
                    $forgo_amount = $return_chit_amount - $chit_amount;
                    $plan_months_completed = $plan_detail['months_completed'];
                    $emi_amount = ($return_chit_amount / ($plan_detail['tenure'] - $plan_months_completed));
                    $total_emi = $plan_detail['tenure'] - $plan_months_completed;//
                    $data = array(
                    'plan_id' => isset($auction_detail['plan_id']) ? $auction_detail['plan_id'] :'',
                    'group_id' =>  isset($auction_detail['group_id']) ? $auction_detail['group_id'] :'',
                    'member_id' =>  isset($get_orders['member_id']) ? $get_orders['member_id'] : '',
                    'auction_id' =>  isset($auction_id) ? $auction_id : '',
                    'return_chit_amount' =>  isset($return_chit_amount) ? $return_chit_amount : '',
                    'total_amount_paid' => isset($total_amount_paid) ? $total_amount_paid : '',
                    'total_amount_due' => isset($return_chit_amount) ? $return_chit_amount : '',
                    'chit_amount' => isset($chit_amount2) ? $chit_amount2 : '',
                    'forgo_amount' => isset($forgo_amount) ? $forgo_amount : '',
                    'is_on_EMI' => isset($is_on_EMI) ? $is_on_EMI : '',
                    'emi_amount' => isset($emi_amount) ? $emi_amount : '',
                    'total_emi' => isset($total_emi) ? $total_emi : '',
                    'due_emi' => isset($total_emi) ? $total_emi : '',
                    'emi_paid' => '0',
                    'is_active' => '1',
                    'slot_number' => isset($slot_number) ? $slot_number : '',
                    'chit_month' =>date("M,Y"),
                    'added_date' => date('Y-m-d h:i:s') 
                ); 			
                $insertdata = $this->db->insert('tbl_chits',$data);
                
                $win_bid_acc = array(
                'is_bid_accepted'=>'yes'
            );
            $this->db->where('bid_id',$bid_id)->update('tbl_bids',$win_bid_acc);
                
                $winning_bid_id = array(
                    'winning_bid_id'=> isset($bid_id) ? $bid_id  : '',
                );
                $winning_id_update = $this->db->where('auction_id',$auction_id)->update('tbl_auction',$winning_bid_id);
                $auction_status = array(
                    'status' => '0'
                );
                $update = $this->db->where('auction_id',$auction_id)->update('tbl_auction',$auction_status);
                $output = array(
                    'status' => 1,
                    'message' => 'Forgo amount more then '.$auction_detail['min_prize_amount'],
                );
            }
        }
        echo json_encode($output);
    }
    
    public function chits($member_id =""){
        $data = array(
            'member_id' => isset($member_id) ? $member_id :'',
            );
        $res = json_decode(callAPI('POST','getuserchit',$data),true);
        $member_data = $this->db->where('member_id',$member_id)->get('tbl_members')->row_array();
        if($res['status'] == 'Success'){
           $this->load->view('member-chits',['data' => $res['data'],'data2' =>$member_data]);  
        }else{
            $this->session->set_flashdata('success', 'No chit Found');
            redirect('Dashboard/getmoreviewmember/'.$member_id);

        }
        
    }
    
    public function GetBankDetail(){
        $id= isset($_POST['id']) ? $_POST['id'] :'';
        $data = $this->db->where('bank_account_id',$id)->get('bank_accounts')->row_array();
        echo json_encode($data);
    }
    
    public function GetMemberDetails(){
        $id= isset($_POST['id']) ? $_POST['id'] :'';
        $data = $this->db->where('member_id',$id)->get('tbl_members')->row_array();
        echo json_encode($data);
    }
    
    
    
    
    
    
    
    
}
