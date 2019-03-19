<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class In_model extends CI_Model {

	
public function __construct()
{
	parent::__construct();
	//Do your magic here
}



	public function Add_cart($id, $merchant, $jumlah){
        $userid = $this->session->userdata('logged_id');
        $query = $this->db->where('product_id', $id)->where('id_user', $userid)->get('cart');
        $value = $this->GetData(['product_id'=>$id],'cart')->row('value');
        $amount = $value+1;
        if ($query->num_rows() > 0) {
            
            $data=array(
            
            'value' => $amount,

            );

        $this->db->where('product_id',$id)
                 ->update('cart', $data);


        if ($this->db->affected_rows() > 0) {
            return "true";
        } else {
            return "false";
        }
    } else{
        $user_id = $this->session->userdata('logged_id');
        if($user_id != ""){
        $data = array(
            'product_id'    => $id,
            'id_merchant'   => $merchant,
            'value'         => $jumlah,
            'id_user'       => $user_id,
            
            );

        $this->db->insert('cart', $data);

      
        if ($this->db->affected_rows() > 0) {
            return "true";
        } else {
            return "false";
        }
    } else{
        return "logged_id_null";
    }
    }
}

    public function Add_wishproduct($id){
        $userid = $this->session->userdata('logged_id');
        $query = $this->db->where('product_id', $id)->where('id_user', $userid)->get('wishlist_product');
        if ($query->num_rows() > 0) {
        
        return "wish_null";    
        
        }
     else{
        $user_id = $this->session->userdata('logged_id');
        if($user_id != ""){
        $data = array(
            'product_id'    => $id,
            'id_user'       => $user_id,
            
            );

        $this->db->insert('wishlist_product', $data);

      
        if ($this->db->affected_rows() > 0) {
            return $this->GetData(['product_id'=> $id,'id_user'=> $user_id,],'wishlist_product')->row('id');
        } else {
            return "false";
        }
    } else{
        return "logged_id_null";
    }
    }
}
public function Add_discuss($product_id,$merchant_id,$comment){
        $userid = $this->session->userdata('logged_id');
        $query = $this->db->where('id', $product_id)->where('merchant_id', $merchant_id)->get('product');
        if ($query->num_rows() > 0) {
        
        if ($userid == $merchant_id) {
            $data = array(
            'product_id'    => $product_id,
            'id_user'       => $userid,
            'merchant_id'   => $merchant_id,
            'comment'       => $comment,
            'level'         => '1',
            
            );
        }
        else{
            $data = array(
            'product_id'    => $product_id,
            'id_user'       => $userid,
            'merchant_id'    => $merchant_id,
            'comment'       => $comment,
            
            );
        }
        $this->db->insert('discussion', $data);




        if ($this->db->affected_rows() > 0 ) {
            // return "true";
        $check_inarray = array();
        $id_getnotif = array();
        $id_validnotif = array();
        $id_getnotif = $this->GetData(['product_id'=>$product_id],'discussion')->result();


        if (!empty($id_getnotif)) {
        //            for($i = 0; $i < count($id_getnotif); $i++)
        // {   
            
        //     if (!in_array($id_getnotif[$i], $id_validnotif)){
        //              $id_validnotif[] = $id_getnotif[$i];
                    
                
                     
                
        //     }


        // }
                $id_validnotif[] = $merchant_id;
        
            foreach ($id_getnotif as $getnotif) {
                if (!in_array($getnotif->id_user, $id_validnotif)){
                    if ($userid != $getnotif->id_user) {
                        $id_validnotif[] = $getnotif->id_user;
                    }
            
        }
        }
        // $id_validnotif[] = $merchant_id;
            
            
        }

        
                   
        
 
        // $this->insert_notification($user_id,$comment,$product_id,$merchant_id,$id_validnotif);
        
        $insert_notif = array();
        $username = $this->GetData(['id'=>$userid],'user_merchant')->row('username');
        $product_name = $this->GetData(['id'=>$product_id],'product')->row('name');
        for($i = 0; $i < count($id_validnotif); $i++)
        {
            $insert_notif[] = array(
                
                'from_id'               => $userid,
                'for_id'                => $id_validnotif[$i],
                'subject'               => '@'.$username,
                'text'                  => ' menambahkan komentar di produk '.$product_name,
                'product_id'            => $product_id,
                'comment'               => $comment,
                'type_notification'     => 'diskusi',
                
            );
        }
         $this->db->insert_batch('notification', $insert_notif);

            if ($this->db->affected_rows() > 0 ) {
            return "true";
        } 
        else{
            return "false";
        }
        } else {
            return "false";
        }
     
        
        }
         else{ 
            return "false";
        
    }
}


    public function UpAmount($id,$amount){
        $data=array(
            'value' => $amount
            );

        $this->db->where('id_cart',$id)
                 ->update('cart', $data);


        if ($this->db->affected_rows() > 0) {
            return "true";
        } else {
            return "false";
        }
    }

    public function Delete_cart($id){
        $user_id = $this->session->userdata('logged_id');
        $this->db->where('id_cart',$id)
                 ->delete('cart');
      
        if ($this->db->affected_rows() > 0) {
            return "true";
        } else {
            return "false";
        }
    }
     public function Delete_discussdel($id){
        // $user_id = $this->session->userdata('logged_id');
        $this->db->where('id_discussion',$id)
                 ->delete('discussion');
      
        if ($this->db->affected_rows() > 0) {
            return "true";
        } else {
            return "false";
        }
    }
    public function Cek_favorite($id){
        $user_id = $this->session->userdata('logged_id');
        $query1 = $this->db->where('id_user', $user_id)->where('merchant_id',$id)->get('wishlist_merchant');

        if($query1->num_rows() > 0) {
            return "true";
        }
        else {
            return "false";
        }
    }

    public function Merchant_favoritedel($id){
        $user_id = $this->session->userdata('logged_id');
        $this->db->where('id',$id)
                 ->delete('wishlist_merchant');
      
        if ($this->db->affected_rows() > 0) {
            return "true";
        } else {
            return "false";
        }
    }
    public function Delete_wishproduct($id){
        $user_id = $this->session->userdata('logged_id');
        $this->db->where('id',$id)
                 ->delete('wishlist_product');
      
        if ($this->db->affected_rows() > 0) {
            return "true";
        } else {
            return "false";
        }
    }

    public function Merchant_favorite($id){
        $userid = $this->session->userdata('logged_id');
        $query = $this->db->where('merchant_id', $id)->where('id_user', $userid)->get('wishlist_merchant');
        if ($query->num_rows() > 0) {
        
        return "wish_null";    
        
        }
     else{
        $user_id = $this->session->userdata('logged_id');
        if($user_id != ""){
        $data = array(
            'merchant_id'    => $id,
            'id_user'       => $user_id,
            
            );

            
        $this->db->insert('wishlist_merchant', $data);

      
        if ($this->db->affected_rows() > 0) {
            return $this->GetData(['merchant_id'=> $id,'id_user'=> $user_id],'wishlist_merchant')->row('id');
        } else {
            return "false";
        }
    } else{
        return "logged_id_null";
    }
    }
    }

    public function Cancel_order($id,$last_update){
        $user_id = $this->session->userdata('logged_id');
        
        $statuscancel = "Order Dibatalkan";
        $this->db->where('id',$id)
                 ->update('product_order_detail', array('status' => $statuscancel, 'last_update'=>$last_update));
      
        if ($this->db->affected_rows() > 0) {
            return "true";
        } else {
            return "false";
        }
    }
    public function Order_selesai($id,$last_update,$feedback,$emotion){
        $user_id = $this->session->userdata('logged_id');
        
        $statusselesai = "Selesai";
        $this->db->where('id',$id)
                 ->update('product_order_detail', array('status' => $statusselesai, 'last_update'=>$last_update, 'feedback'=>$feedback, 'emotion' => $emotion));
      
        if ($this->db->affected_rows() > 0) {
            return "true";
        } else {
            return "false";
        }
    }

    public function Insert_checkout(){
        $user_id = $this->session->userdata('logged_id');
        $index = $this->input->post('index');
        $code = $this->input->post('random');
         $data = array(
            'user_id'   => $this->input->post('id_user'),
            'code'      => $code,
            'email'     => $this->input->post('email'),
            'buyer'     => $this->input->post('name'),
            'address'   => $this->input->post('address'),
            'phone'     => $this->input->post('phone'),
            // 'status'    => 'Pesanan ditujukan ke Merchant',
            'comment'   => $this->input->post('comment'),
            'status'        => 'Pesanan ditujukan ke Merchant',
            // 'noTCASH'   => $this->input->post('noTCASH'),
            
            'shipping'  => $this->input->post('shipping'),
            'date_ship' => strtotime($this->input->post('date_ship')),
            'total_fees'=> $this->input->post('total'),
            'fee_infaq' => $this->input->post('infaq'),
            'created_at'=> $this->input->post('date_buy'),
            'last_update'=> $this->input->post('date_buy'),
            
            );

        $this->db->insert('product_order', $data);

        $order_id = $this->GetData(['code'=>$code],'product_order')->row('id');
        $insert_data = array();
        $field_data = $this->input->post('field');
        // product_order_detail : data product
        for($i = 0; $i < count($field_data['product_id']); $i++)
        {
            $insert_data[] = array(
                
                'order_id'      => $order_id,
                'product_id'    => $field_data['product_id'][$i],
                'product_name'  => $field_data['product_name'][$i],
                'merchant_id'   => $field_data['merchant_id'][$i],
                'merchant_name' => $field_data['merchant_name'][$i],
                'merchant_phone'=> $field_data['merchant_phone'][$i],
                'merchant_email'=> $field_data['merchant_email'][$i],
                'status'        => 'Menunggu Pembayaran',
                'amount'        => $field_data['amount'][$i],
                'price_item'    => $field_data['product_price'][$i],
                'created_at'    => $field_data['created_at'][$i],
                'last_update'   => $field_data['last_update'][$i],
                // 'db_col_name_textarea' => $field_data['textarea'][$i]
            );
        }

        $this->db->insert_batch('product_order_detail', $insert_data);
    
        for($i = 0; $i < count($field_data['cart_id']); $i++)
        {
            $this->db->where('id_cart',$field_data['cart_id'][$i])
                     ->delete('cart');

        }
    
            
        

        if ($this->db->affected_rows() > 0 ) {
      

        $insert_notif = array();
        $username = $this->GetData(['id'=>$user_id],'user_merchant')->row('username');
        for($i = 0; $i < count($field_data['product_id']); $i++)
        {
            $insert_notif[] = array(
                
                'from_id'               => $user_id,
                'for_id'                => $field_data['merchant_id'][$i],
                'subject'               => '@'.$username,
                'text'                  => ' telah memesan '.$field_data['product_name'][$i],
                'product_id'            => $field_data['product_id'][$i],
                'type_notification'     => 'order_waiting',
            );
        }
         $this->db->insert_batch('notification', $insert_notif);

            if ($this->db->affected_rows() > 0 ) {
            return TRUE;
        } 
        else{
            return FALSE;
        }
        } else {
            return FALSE;
        }
    
    }

    public function insertNotification(){
        
    }
    public function nullNotification(){
        $userid = $this->session->userdata('logged_id');
        $this->db->where('for_id',$userid)
                 ->where('status','0')
                 ->update('notification', array('status' => '1'));


        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

     public function GetData($where, $table)
    {
      return $this->db->where($where)->get($table);
    }
    public function GetLastId($table, $field) {
        return $this->db->order_by($field, 'desc')->limit(1)->get($table)->row($field);
    }

}

/* End of file in_model.php */
/* Location: ./application/models/in_model.php */