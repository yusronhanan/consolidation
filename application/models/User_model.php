<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
	public function cek_user(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $level = $this->GetUser(['email'=>$email])->row('is_merchant');
        $id = $this->GetUser(['email'=>$email])->row('id');
        //name by email
        $nama = $this->GetUser(['email'=>$email])->row('name');
        //name by username
        $nama2 = $this->GetUser(['username'=>$email])->row('name');
        $level2 = $this->GetUser(['username'=>$email])->row('is_merchant');
        $id2 = $this->GetUser(['username'=>$email])->row('id');
        
        // $phone = $this->GetUser(['email'=>$email])->row('phone');
        // $address = $this->GetUser(['email'=>$email])->row('address');

        $query = $this->db->where('email', $email)->where('password', md5($password))->get('user_merchant');
        $query2 = $this->db->where('username', $email)->where('password', md5($password))->get('user_merchant');
        if ($query->num_rows() > 0) {
            $data = [
                'logged_id'     => $id,
                // 'logged_email'  => $email,
                'logged_name'   => $nama,
                // 'logged_phone'  => $phone,
                // 'logged_address'=> $address,
                'level'     	=> $level,
                'logged_in'     => TRUE
            ];
            $this->session->set_userdata( $data );
            return TRUE;
        } else if($query2->num_rows() > 0) {
            $data = [
                'logged_id'     => $id2,
                // 'logged_email'  => $email,
                'logged_name'   => $nama2,
                // 'logged_phone'  => $phone,
                // 'logged_address'=> $address,
                'level'         => $level2,
                'logged_in'     => TRUE
            ];
            $this->session->set_userdata( $data );
            return TRUE;
        }
         else {
            return FALSE;
        }
    }
    public function add_user($foto){
        // $int = (int) $this->GetLastId('tb_admin', 'id');
       
        $email = $this->input->post('email');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $username = $this->input->post('username');

        $query1 = $this->db->where('username', $username)->get('user_merchant');
        $query2 = $this->db->where('email', $email)->get('user_merchant');

        if($query1->num_rows() > 0) {
            return "username_exist";
        }
        else if($query2->num_rows() > 0) {
            return "email_exist";
        }
        
        else{
        $query = $this->db->insert('user_merchant', array(
            'name'      => $first_name.' '.$last_name,
            'username'  => $username,
            'phone'     => $this->input->post('telp'),
            'email'  	=> $email,
            'location'  => $this->input->post('location'),
            'address'   => $this->input->post('address'),
            'password'  => md5($this->input->post('password')),
            'image'     => $foto['file_name'],
            'last_update'=> $this->input->post('last_update'),
        ));
        if ($this->db->affected_rows() > 0) {
            
            return "TRUE";
        } else {
            return "FALSE";
        }
    }
    }
    public function add_user_merchant($foto){
        $id = $this->session->userdata('logged_id');
        
        $emailtsel = $this->input->post('email_tsel');
        $emailtselfix =  $emailtsel.'@telkomsel.co.id';
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
       
 
        $passValidasi = $this->input->post('password');
        $password = $this->GetUser(['id'=>$id])->row('password');
        $query2 = $this->db->where('id', $id)->where('password', md5($password))->where('is_merchant', '1')->get('user_merchant');
        if($query2->num_rows() > 0) {
            return FALSE;
        }
        else{
        if($password == md5($passValidasi)){
        $this->db->where(['id'=>$id])->update('user_merchant', array(
            'name'                      => $first_name.' '.$last_name,
            'username'                  => $this->input->post('username'),
            'phone'                     => $this->input->post('phone'),
            'email'                     => $this->input->post('email'),
            'address'                   => $this->input->post('address'),
            'telegram'                  => $this->input->post('telegram'),
            'nik_tsel'                  => $this->input->post('nik_tsel'),
            'email_tsel'                => $emailtselfix,
            'location'                  => $this->input->post('location'),
            'deskripsi_merchant'        => $this->input->post('deskripsi'),
            'merchant_name'             => $this->input->post('merchant_name'),
            'image_merchant'            => $foto['file_name'],
            'last_update'=> $this->input->post('last_update'),
           
            

            // 'deskripsi'  => $this->input->post('deskripsi'),
            // 'last_update' => $this->input->post('last_update'),
            'is_merchant' => '1',
        ));

        $data = [
                'level'         => '1'
            ];
            $this->session->set_userdata( $data );
    
      // $this->load->library('email');    //load email library
      // $this->email->from('yusronzain@gmail.com', 'MTT Test verify'); //sender's email
      // $address = $this->input->post('email');   //receiver's email
      // $subject="Welcome to Jual Beli MTT for Merchant!";    //subject
      // $hash = md5($address+$passValidasi);
      // $message= /*-----------email body starts-----------*/
      //   'Terimakasih sudah mendaftar menjadi Merchant, '.$first_name.'!
      
      //   Your account has been created. 
      //   Here are your login details.
      //   -------------------------------------------------
      //   Email   : ' .$this->input->post('email'). '
      //   Password: ' .substr($this->input->post('password'),0,2). '*******
      //   -------------------------------------------------
                        
      //   Please click this link to activate your account:
            
      //   ' . base_url() . 'index.php/Auth/verify_merchant?' . 
      //   'email=' . $this->input->post('email') . '&hash=' . $hash ;
      //   /*-----------email body ends-----------*/             
      // $this->email->to($address);
      // $this->email->subject($subject);
      // $this->email->message($message);
      // $this->email->send();
    if ($this->db->affected_rows() > 0) {
            
            return TRUE;
        } else {
            return FALSE;
        }
    } else{
        return FALSE;
    }
}
}

    public function Edit_profile(){
        $id = $this->session->userdata('logged_id');
        $name = $this->input->post('name');
        $passValidasi = $this->input->post('password');
        $password = $this->GetUser(['id'=>$id])->row('password');
        $email_tsel = $this->input->post('emailTsel').'@telkomsel.co.id';
        if($password == md5($passValidasi)){
        $this->db->where(['id'=>$id])->update('user_merchant', array(
            'name'      => $this->input->post('name'),
            'username'  => $this->input->post('username'),
            'phone'     => $this->input->post('phone'),
            'email'     => $this->input->post('email'),
            'address'   => $this->input->post('address'),
            'telegram'  => $this->input->post('telegram'),
            'nik_tsel'  => $this->input->post('nikTsel'),
            'location'  => $this->input->post('location'),
            'email_tsel'=> $email_tsel,
            'last_update'=> $this->input->post('last_update'),
        ));
        if ($this->db->affected_rows() > 0) {
            $this->session->set_userdata( array('logged_name' => $name) );
            return TRUE;
        } else {
            return FALSE;
        }
    } else{
        return FALSE;
    }
}

    public function Edit_password(){
        $id = $this->session->userdata('logged_id');
        $this->db->where(['id'=>$id])->update('user_merchant', array(
            'password'      => $this->input->post('password')
        ));
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


public function updatefoto_user_merchant($foto){
        $id = $this->session->userdata('logged_id');
        $this->db->where(['id'=>$id])->update('user_merchant', array(
           
            'image'     => $foto['file_name'],
        ));
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function GetUser($where)
    {
      return $this->db->where($where)->get('user_merchant');
    }

}

/* End of file User_model */
/* Location: ./application/models/User_model */