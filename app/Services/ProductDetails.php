<?php
	namespace App\Services;


	class ProductDetails{
		protected $db;
		function __construct(){
			$this->db = new \App\Models\Productdetails;
		}
		public function GetProductDetails($id){
			$product = $this->db->where('product_id', $id)->get();
			return $product;
		}
	}


?>