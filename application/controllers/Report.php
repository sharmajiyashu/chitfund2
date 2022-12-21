<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta'); 
    }
    
   public function DailtReconcilition(){
       if(!empty($_POST)){
           $month = isset($_POST['mnth_filter']) ? $_POST['mnth_filter'] :'';
           $year = isset($_POST['year']) ? $_POST['year'] :'';
           $m_y = $month.'-'.$year;
           
           $current_date_1 = date("Y-m", strtotime($m_y)); 
           if($current_date_1 == date('Y-m')){
                $date = date('d');
                $current_date_1 = date('Y-m');
                $month_filter = array(
                    'mnth_filter' => $month,
                    'year' => $year,
                    );
           }else{
                $chng_month = date("m", strtotime($m_y)); 
                $date = cal_days_in_month(CAL_GREGORIAN,$chng_month,$year);
                $month_filter = array(
                    'mnth_filter' => $month,
                    'year' => $year,
                );
           }

       }else{
           $date = date('d');
           $current_date_1 = date('Y-m');
           $month = date("M", strtotime($current_date_1));
           $year = date("Y", strtotime($current_date_1));
           $month_filter = array(
                'mnth_filter' => $month,
                'year' => $year,
            );
       }
        
        $current_date = $current_date_1.'-1';
         
         $data_receipt_cash = $this->db->select_sum('transaction_amount')->where('payment_mode','cash')->where('type','receipt')->where('added_date <',$current_date)->get('tbl_transactions')->row_array();
         $data_receipt_bank = $this->db->select_sum('transaction_amount')->where('payment_mode !=','cash')->where('type','receipt')->where('added_date <',$current_date)->get('tbl_transactions')->row_array();
         $data_payment_cash = $this->db->select_sum('transaction_amount')->where('payment_mode','cash')->where('type','payment')->where('added_date <',$current_date)->get('tbl_transactions')->row_array();
         $data_payment_bank = $this->db->select_sum('transaction_amount')->where('payment_mode !=','cash')->where('type','payment')->where('added_date <',$current_date)->get('tbl_transactions')->row_array();
         $opening_cash_balance = intval($data_receipt_cash['transaction_amount']) - intval($data_payment_cash['transaction_amount']);
         $opening_bank_balance = intval($data_receipt_bank['transaction_amount']) - intval($data_payment_bank['transaction_amount']);
         $total_opening = $opening_cash_balance + $opening_bank_balance;
         
         $save_all_data = array();
         for($i=1 ; $i<=$date; $i++){
             $date_2 = $i+1;
             $current_date_2 = $current_date_1.'-'.$date_2;
             $data_receipt_cash_cl = $this->db->select_sum('transaction_amount')->where('payment_mode','cash')->where('type','receipt')->where('added_date <=',$current_date_2)->get('tbl_transactions')->row_array();
             $data_receipt_bank_cl = $this->db->select_sum('transaction_amount')->where('payment_mode !=','cash')->where('type','receipt')->where('added_date <=',$current_date_2)->get('tbl_transactions')->row_array();
             $data_payment_cash_cl = $this->db->select_sum('transaction_amount')->where('payment_mode','cash')->where('type','payment')->where('added_date <=',$current_date_2)->get('tbl_transactions')->row_array();
             $data_payment_bank_cl = $this->db->select_sum('transaction_amount')->where('payment_mode !=','cash')->where('type','payment')->where('added_date <=',$current_date_2)->get('tbl_transactions')->row_array();
             $opening_cash_balance_cl = intval($data_receipt_cash_cl['transaction_amount']) - intval($data_payment_cash_cl['transaction_amount']);
             $opening_bank_balance_cl = intval($data_receipt_bank_cl['transaction_amount']) - intval($data_payment_bank_cl['transaction_amount']);
             $total_opening_cl = $opening_cash_balance_cl + $opening_bank_balance_cl;

             $cd = $current_date_1.'-'.$i;
             $data = array(
                 'date' => $i,
                 'full_date' =>  date("d-M-Y", strtotime($cd))  ,
                 'opening_bank_balance' => isset($opening_bank_balance) ? $opening_bank_balance :'',
                 'opening_cash_balance' => isset($opening_cash_balance) ? $opening_cash_balance :'',
                 'total_opening_balance' => $total_opening,
                 'closing_bank_balance' => $opening_bank_balance_cl,
                 'closing_cash_balance' => $opening_cash_balance_cl,
                 'total_closing_balance' => $total_opening_cl,
                 );
            $save_all_data[] = $data;
            $opening_bank_balance = $opening_bank_balance_cl;
            $opening_cash_balance = $opening_cash_balance_cl;
            $total_opening = $total_opening_cl;
             
         }
          $reverce_array = array_reverse($save_all_data);
          $this->load->view('reports/daily-reconciliation-summary',['reverce_array' => $reverce_array ,'date_time'=> $month_filter]);
   }
   
   public function Receivables(){
       $get_members = $this->db->select('member_id,name')->get('tbl_members')->result_array();
       $get_all_data = array();
       $total_amount_due = 0;
       foreach($get_members as $key=>$val){
           if(!empty($val['member_id'])){
               $data = array(
               'member_id' => isset($val['member_id']) ? $val['member_id'] :'1',
               );
               $res = Json_decode(callAPI('POST','getsubscriberdues',$data),true);
               $data = isset($res['data']) ? $res['data'] :'';
               if(!empty($data)){
                   $due = isset($data['emi_total_due_amount']) ? $data['emi_total_due_amount'] : 0;
                   if($due > 0){
                       $member_dues = array(
                            'member_name' =>isset($val['name']) ? $val['name'] :'',
                            'due' => $due,
                       );
                       $total_amount_due +=$due;
                       $get_all_data[] = $member_dues;
                   }
                   
               }
           }
       }
       $sorted = $this->array_orderby($get_all_data, 'due', SORT_DESC);
       $this->load->view('reports/Receivables',['data'=> $sorted ,'total_due' => $total_amount_due]);
   }
   
   public function Receipts(){
       $get_members = $this->db->select('member_id,name')->get('tbl_members')->result_array();
   }
   
   
function array_orderby()
{
    $args = func_get_args();
    $data = array_shift($args);
    foreach ($args as $n => $field) {
        if (is_string($field)) {
            $tmp = array();
            foreach ($data as $key => $row)
                $tmp[$key] = $row[$field];
            $args[$n] = $tmp;
            }
    }
    $args[] = &$data;
    call_user_func_array('array_multisort', $args);
    return array_pop($args);
}

   
}
