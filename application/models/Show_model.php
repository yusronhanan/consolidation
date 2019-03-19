<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	 public function GetMiniStatus()
    {
      $user_id = $this->session->userdata('logged_id');
      return $this->db->select('*, product_order.id as product_order_id, product_order_detail.id as product_order_detail_id, product_order.status as status_order, product_order_detail.status as status_order_detail')
            ->from('product_order')
            ->where('product_order.user_id',$user_id)
            ->where('product_order_detail.status','Proses Kirim')
            ->or_where('product_order.user_id',$user_id)
            ->where('product_order_detail.status','Pesanan ditujukan ke Merchant')
            ->join('product_order_detail', 'product_order.id = product_order_detail.order_id')
            ->order_by('product_order_detail.last_update', 'DESC')
            ->get()
            ->result();
            
    }



    public function GetData($where, $table)
    {
      return $this->db->where($where)->get($table)->row();
    }
    public function GetMAXprice()
    {
      return $this->db->order_by('price','DESC')->get('product')->row('price');
    }

    public function GetFilterProduk($where,$order_by,$minimum, $maksimum)
    {
      if ($where == 'all') {
        return $this->db
            ->select('*, product.id as pro_id, wishlist_product.id as wish_id')
        
            ->where('price >= ',$minimum)
            ->where('price <= ',$maksimum)
            ->join('product', 'product.id = product_category.product_id')
            
            ->join('wishlist_product','product.id = wishlist_product.product_id', 'left')
            
            ->group_by('product.id')
            // ->order_by($order_by)
            ->get('product_category')
            ->result();
      }
      else{
        return $this->db
            ->select('*, product.id as pro_id, wishlist_product.id as wish_id')
            ->where($where)
            ->where('price >= ',$minimum)
            ->where('price <= ',$maksimum)
            ->join('product', 'product.id = product_category.product_id')
            
            ->join('wishlist_product','product.id = wishlist_product.product_id', 'left')
            
            ->group_by('product.id')
            // ->order_by($order_by)
            ->get('product_category')
            ->result();  
      }
      
    }
    public function GetKategoriData($where,$order_by)
    {
      return $this->db
            ->select('*, product.id as pro_id, wishlist_product.id as wish_id')
            ->where($where)
            ->join('product', 'product.id = product_category.product_id')
            
            ->join('wishlist_product','product.id = wishlist_product.product_id', 'left')
            
            ->group_by('product.id')
            // ->order_by($order_by)
            ->get('product_category')
            ->result();
    }
     public function GetDetailProduct($where){
    return $this->db->select('*, product.name as product_name, user_merchant.name as merchant_name, product.id as product_id, user_merchant.id as merchant_id, product.last_update as last_update_product,wishlist_product.id as wish_id')
            ->where('product.id',$where)
            ->join('user_merchant', 'product.merchant_id = user_merchant.id')
            ->join('wishlist_product','product.id = wishlist_product.product_id', 'left')
            
            ->group_by('product.id')
            
            //->order_by('product_category','ASC')
            ->get('product')
            ->row();

  }
    public function GetSearchData($where)
    {
      return $this->db
            ->select('*, product.id as pro_id, wishlist_product.id as wish_id')
            ->where($where)
            ->join('product', 'product.id = product_category.product_id')
            ->join('wishlist_product','product.id = wishlist_product.product_id', 'left')
            ->group_by('product.id')
            ->get('product_category')
            ->result();
    }
    public function notification(){
      $user_id = $this->session->userdata('logged_id');
      return $this->db->where('for_id',$user_id)
              ->or_where('for_id','0920')
              ->or_where('for_id','0921')
              ->order_by('id_notification')
              // ->limit(5,0)
              ->get('notification')
              ->result();


    }
    public function unseen_notification(){
      $user_id = $this->session->userdata('logged_id');
      return $this->db->where('for_id',$user_id)

              ->where('status','0')
              ->order_by('id_notification')
              ->get('notification')
              ->result();


    }
    public function GetProdukMerchant($where)
    {
      return $this->db->select('*, product.id as pro_id, wishlist_product.id as wish_id')
            ->where($where)
            ->join('product', 'product.id = product_category.product_id')
            ->join('wishlist_product','product.id = wishlist_product.product_id', 'left')
            ->group_by('product.id')
            ->get('product_category')
            ->result();
    }
     public function GetDataInvoice($order_detail)
    {
      return $this->db->select('*, product_order.id as order_id, product_order_detail.id as detail_id, product_order_detail.created_at as detail_created, product_order_detail.status as detail_status, product_order.status as order_status')
            ->where('product_order_detail.id', $order_detail)
            ->join('product_order', 'product_order.id = product_order_detail.order_id')
            ->get('product_order_detail')
            ->row();
    }

    // public function searchProduct($search){
    //     $query = $this->db->select('*')
    //                       ->from('product')
    //                       ->like('name',$search)
    //                       ->or_like('price',$search)
    //                       ->get();
     
    //     if($query->num_rows()>0)
    //     {
    //         return $query->result(); 
    //     }
    //     else
    //     {
    //         return null;
    //     }
    //   }

    public function GetDataProdukHome($where)
    {
     	return $this->db
            ->select('*, product.id as pro_id, wishlist_product.id as wish_id')
            ->where('product_category.category_id',$where)
						->join('product', 'product.id = product_category.product_id')
            ->join('wishlist_product','product.id = wishlist_product.product_id', 'left')
            ->group_by('product.id')
						//->order_by('product_category','ASC')
						->get('product_category')
						
						->result();
    }
   

	public function GetProdukData()
    {
      return $this->db->join('product', 'product.id = product_category.product_id')
      				  ->get('product_category')
      				  ->result();
    }

  public function GetDiscussion($where){
    return $this->db->select('*, product.name as product_name, user_merchant.name as user_name, product.id as product_id, user_merchant.id as user_id, discussion.created_at as created_at_discuss')
            ->where('discussion.product_id',$where)
            ->join('product', 'product.id = discussion.product_id')
            ->join('user_merchant', 'user_merchant.id = discussion.id_user')
            ->order_by('discussion.created_at','DESC')
            ->get('discussion')
            ->result();

  }


    public function GetDataCart()
    {
      $user_id = $this->session->userdata('logged_id');
      return $this->db->select('*')
                      ->where('cart.id_user',$user_id)
                      ->join('product', 'product.id = cart.product_id')
                 // ->join('user_merchant', 'user_merchant.id = cart.id_merchant')
                    //->order_by('product_category','ASC')
                      ->get('cart')
                      ->result();
    }
    public function GetDataMerchantProfile($merchant_username)
    {
      $user_id = $this->session->userdata('logged_id');
      return $this->db
              ->select('*, user_merchant.id as merchant_id ,wishlist_merchant.merchant_id as merchant_id2, wishlist_merchant.id as wish_id')
      // ->select('*, product.id as product_id, user_merchant.id as user_merchant_id, product.name as product_name, user_merchant.name as merchant_name')
                      ->where('is_merchant','1')
                      ->where('username',$merchant_username)
                      // ->join('product', 'user_merchant.id = product.merchant_id')
                 // ->join('user_merchant', 'user_merchant.id = cart.id_merchant')
                    //->order_by('product_category','ASC')
                      ->join('wishlist_merchant','user_merchant.id = wishlist_merchant.merchant_id', 'left')
                      ->group_by('user_merchant.id')
                      

                      // ->join('product', 'product.id = cart.product_id')
                 // ->join('user_merchant', 'user_merchant.id = cart.id_merchant')
                    //->order_by('product_category','ASC')
                      ->get('user_merchant')
            
                      ->row();
    }
    public function GetDataWishlist()//product
    {
      $user_id = $this->session->userdata('logged_id');
      return $this->db->select('*, wishlist_product.id as wishlist_id, product.id as product_id')
                      ->where('wishlist_product.id_user',$user_id)
                      ->join('product', 'product.id = wishlist_product.product_id')
                 // ->join('user_merchant', 'user_merchant.id = cart.id_merchant')
                    //->order_by('product_category','ASC')
                      ->get('wishlist_product')
            
                      ->result();
    }

    public function GetDataWishlist2()//merchant
    {
      $user_id = $this->session->userdata('logged_id');
      return $this->db->select('*, wishlist_merchant.id as wishlist_merchant, user_merchant.id as user_merchant_id')
                      ->where('wishlist_merchant.id_user',$user_id)
                      ->join('user_merchant', 'user_merchant.id = wishlist_merchant.merchant_id')
                 // ->join('user_merchant', 'user_merchant.id = cart.id_merchant')
                    //->order_by('product_category','ASC')
                      ->get('wishlist_merchant')
            
                      ->result();
    }
    public function GetDataKeranjang()
    {
      $user_id = $this->session->userdata('logged_id');
      return $this->db->select('*, product.name as product_name, user_merchant.name as merchant_name,')
            ->where('cart.id_user',$user_id)
            ->join('product', 'product.id = cart.product_id')
            ->join('user_merchant', 'user_merchant.id = cart.id_merchant')
            ->order_by('id_cart','ASC')
            ->group_by('id_cart')
            ->get('cart')
            
            ->result();
            
    }
    public function GetDataOrder($status)
    {
      $user_id = $this->session->userdata('logged_id');
      return $this->db->select('*, product_order.id as product_order_id, product_order_detail.id as product_order_detail_id, product_order.status as status_order, product_order_detail.status as status_order_detail')
            ->where('product_order.user_id',$user_id)
            ->where('product_order_detail.status',$status)

            ->join('product_order_detail', 'product_order.id = product_order_detail.order_id')
            ->order_by('product_order_detail.last_update', 'DESC')
            ->get('product_order')
            ->result();
            
    }
    
    public function GetDataSearchMerchant($where){
      return $this->db
      ->select('*, user_merchant.id as merchant_id ,wishlist_merchant.merchant_id as merchant_id2, wishlist_merchant.id as wish_id')
      // ->select('*, product.id as product_id, user_merchant.id as user_merchant_id, product.name as product_name, user_merchant.name as merchant_name')
                      ->where('is_merchant','1')
                      ->where($where)
                      // ->join('product', 'user_merchant.id = product.merchant_id')
                 // ->join('user_merchant', 'user_merchant.id = cart.id_merchant')
                    //->order_by('product_category','ASC')
                      ->join('wishlist_merchant','user_merchant.id = wishlist_merchant.merchant_id', 'left')
                      ->group_by('user_merchant.id')
                      ->get('user_merchant')
            
                      ->result();
    }
    public function GetDataMerchant(){
      return $this->db
      ->select('*, user_merchant.id as merchant_id ,wishlist_merchant.merchant_id as merchant_id2, wishlist_merchant.id as wish_id')
      // ->select('*, product.id as product_id, user_merchant.id as user_merchant_id, product.name as product_name, user_merchant.name as merchant_name')
                      ->where('is_merchant','1')
                      
                      // ->join('product', 'user_merchant.id = product.merchant_id')
                 // ->join('user_merchant', 'user_merchant.id = cart.id_merchant')
                    //->order_by('product_category','ASC')
                      ->join('wishlist_merchant','user_merchant.id = wishlist_merchant.merchant_id', 'left')
                      ->group_by('user_merchant.id')
                      ->get('user_merchant')
            
                      ->result();
    }

    public function GetDataMerchantFavorite(){
      $id_user = $this->session->userdata('logged_id');
     return $this->db
      ->select('*, user_merchant.id as merchant_id ,wishlist_merchant.merchant_id as merchant_id2, wishlist_merchant.id as wish_id')
      // ->select('*, product.id as product_id, user_merchant.id as user_merchant_id, product.name as product_name, user_merchant.name as merchant_name')
                      ->where('is_merchant','1')
                      // ->join('product', 'user_merchant.id = product.merchant_id')
                 // ->join('user_merchant', 'user_merchant.id = cart.id_merchant')
                    //->order_by('product_category','ASC')
                      ->where('id_user', $id_user)
                      ->join('wishlist_merchant','user_merchant.id = wishlist_merchant.merchant_id', 'left')
                      ->group_by('user_merchant.id')
                      ->get('user_merchant')
            
                      ->result();
    }

    public function GetDataNotification(){
      $id_user = $this->session->userdata('logged_id');
     
      return $this->db
                      ->where('for_id',$id_user)
                      ->order_by('id_notification', 'DESC')
                      ->get('notification')
                      ->result();
    }
    public function GetDataTlmerchant($id_merchant){
 
      return $this->db
                      ->where('for_id',$id_merchant)
                      ->order_by('id_notification', 'DESC')
                      ->get('notification')
                      ->result();
    }


    public function GetAllData($table)
    {
      return $this->db->get($table)->result();
    }
    public function GetCartData($limit,$offset)
    {
      $user_id = $this->session->userdata('logged_id');
      return $this->db->select('*, product.name as product_name, user_merchant.name as merchant_name,')
                      ->from('cart')
                      ->where('cart.id_user',$user_id)
                      ->join('product', 'product.id = cart.product_id')
                      ->join('user_merchant', 'user_merchant.id = cart.id_merchant')
                      ->order_by('id_cart','ASC')
                      ->limit($limit,$offset)
                      ->get()
                      ->result();
    }
    public function Total_Records()
    {
      $user_id = $this->session->userdata('logged_id');
      $this->db->select('*')
               ->from('cart')
               ->where('cart.id_user',$user_id)
               ->join('product', 'product.id = cart.product_id')
               ->join('user_merchant', 'user_merchant.id = cart.id_merchant')
               ->order_by('id_cart','ASC');
      return $this->db->count_all_results();
    }
    public function GetFinishOrder($statusselesai,$limit,$offset)
    {
       $user_id = $this->session->userdata('logged_id');
       return $this->db->select('*, product_order.id as product_order_id, product_order_detail.id as product_order_detail_id, product_order.status as status_order, product_order_detail.status as status_order_detail')
            ->from('product_order')
            ->where('product_order.user_id',$user_id)
            ->where('product_order_detail.status',$statusselesai)
            ->join('product_order_detail', 'product_order.id = product_order_detail.order_id')
            ->order_by('product_order_detail.last_update', 'DESC')
            ->limit($limit,$offset)
            ->get()
            ->result();
    }
    public function Total_Records_Finish($statusselesai)
    {
      $user_id = $this->session->userdata('logged_id');
       $this->db->select('*') 
            ->from('product_order')
            ->where('product_order.user_id',$user_id)
            ->where('product_order_detail.status',$statusselesai)
            ->join('product_order_detail', 'product_order.id = product_order_detail.order_id')
            ->order_by('product_order_detail.last_update', 'DESC');
      return $this->db->count_all_results();
    }
    public function GetStatusOrder($status,$limit,$offset)
    {
      $user_id = $this->session->userdata('logged_id');
      return $this->db->select('*, product_order.id as product_order_id, product_order_detail.id as product_order_detail_id, product_order.status as status_order, product_order_detail.status as status_order_detail')
            ->from('product_order')
            ->where('product_order.user_id',$user_id)
            ->where('product_order_detail.status',$status)
            ->or_where('product_order.user_id',$user_id)
            ->where('product_order_detail.status','Proses Kirim')
            ->join('product_order_detail', 'product_order.id = product_order_detail.order_id')
            ->order_by('product_order_detail.last_update', 'DESC')
            ->limit($limit,$offset)
            ->get()
            ->result();
            
    }
    public function Total_Records_Status($status)
    {
      $user_id = $this->session->userdata('logged_id');
    $this->db->select('*, product_order.id as product_order_id, product_order_detail.id as product_order_detail_id, product_order.status as status_order, product_order_detail.status as status_order_detail')
            ->from('product_order')
            ->where('product_order.user_id',$user_id)
            ->where('product_order_detail.status',$status)
            ->or_where('product_order_detail.status','Proses Kirim')
            ->join('product_order_detail', 'product_order.id = product_order_detail.order_id')
            ->order_by('product_order_detail.last_update', 'DESC');
      return $this->db->count_all_results();
    }
     public function AmountOrder()
    {
      $status = "Pesanan ditujukan ke Merchant";
      $user_id = $this->session->userdata('logged_id');
      
    $this->db->select('*, product_order.id as product_order_id, product_order_detail.id as product_order_detail_id, product_order.status as status_order, product_order_detail.status as status_order_detail')
            ->from('product_order')
            ->where('product_order_detail.status','Proses Kirim')
            ->or_where('product_order_detail.status',$status)
            ->or_where('product_order.user_id',$user_id)
            ->join('product_order_detail', 'product_order.id = product_order_detail.order_id')
            ->order_by('product_order_detail.last_update', 'DESC');
      return $this->db->count_all_results();
    }
      

}

/* End of file product_model.php */
/* Location: ./application/models/product_model.php */