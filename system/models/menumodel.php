<?php
  Class MenuModel extends Model
  {
  	function MenuModel()
  	{
  		parent::Model();
	}      
	
	function getAllCategories()
	{
		$this->db->order_by('MenId', 'DESC');
		$categories = $this->db->get('menu')->result_array();
		foreach($categories as $categoryInfo)
		{
			$categoryInfo['items'] = $this->getCategoryItems($categoryInfo['MenId']);
			$categoryInfo['amount'] = $this->getItemsCount($categoryInfo['MenId']);
			$filledCategories[] = $categoryInfo;
		}
		return $filledCategories;
	}
	
	function getCategoryItems($id)
	{
		$this->db->order_by('ItmId', 'Desc');
		$categoryItems = $this->db->get_where('menu_items', array('ItmCat' => $id))->result_array();	
		return $categoryItems;
	}
	
	function getCategoryById($id)
	{
		$categoryData = $this->db->get_where('menu', array('MenId' => $id))->result_array();
		return $categoryData[0];
	}
	
	function deleteAll($id)
	{
		$this->deleteCatById($id);
		$this->deleteAllItems($id);
	}
	
	function deleteAllItems($id)
	{
	   $this->db->delete('menu_items', array('ItmCat' => $id));
	}
	
	function deleteCatById($cat_id) 
	{
		$this->db->delete('menu', array('MenId' => $cat_id));
	}
	
	function deleteItemById($item_id)
	{
		$this->db->delete('menu_items', array('ItmId' => $item_id));
	}
	
	function updateItem()
	{
		
		$itemData = $this->input->post('itemData');
		$this->db->update('menu_items',$itemData, array('ItmId' => $itemData['ItmId']));
	}
	
	function insertItem($itemData)
	{
		$this->db->insert('menu_items', $itemData);
	}
	
	function insertCategory()
	{
		$categoryData = $this->input->post('catData');
		$categoryData['MenPosted'] = date('Y-m-d H:m:s');
		$this->db->insert('menu',$categoryData);
		return $this->db->insert_id();
	}
	
	function updateCategory()
	{
		$categoryData = $this->input->post('catData');
		$this->db->update('menu',$categoryData, array('MenId' => $categoryData['MenId']));		
	}
	
	function getItemsCount($id)
	{
		$this->db->where('ItmCat', $id);
		$this->db->from('menu_items');
		return $this->db->count_all_results();
	}	  
  }
?>
