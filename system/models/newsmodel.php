<?php
  Class NewsModel Extends Model
  {                    
  	  private $limit = 10;
  	  private $offset = 0;
  	  
  	  function NewsModel()
  	  {
  	  	parent::Model();
  	  }
  	  
  	  function insertNews()
  	  {
  	  	  $newsData = $this->input->post('newsData');
  	  	  $newsData['NwsDate'] = date('Y-m-d');
  	  	  /*
  	  	  $data = array(
  	  	  	'NwsTitle' => $newsData['title'],
  	  	  	'NwsContent' => $newsData['content'],
  	  	  	'NwsDate' => 'now()' 
  	  	  );
  	  	   */
  	  	  $this->db->insert('news', $newsData);
	  }
	  
	  function updateNews()
	  {
	  	$newsData= $this->input->post('newsData');
	  	$id = $newsData['NwsId'];
	  	/*
	  	$data = array(
	  		'NwsTitle' => $newsData['title'],
	  		'NwsContent' => $newsData['content']
	  	);
	  	*/
	  	$this->db->update('news', $newsData, array('NwsId' => $id));  
	  }
	  
	  function getNewsById($id)
	  {
	  	$newsData = $this->db->get_where('news', array('NwsId' => $id))->result_array();
	  	
	  	return $newsData[0];	  
	  }
	  
	  function getAllNews($where = null)
	  {
	  	  if ($this->limit > 0)
	  	  {
	  	  	$this->db->limit($this->limit);
		  }
		  $this->db->order_by('NwsDate', 'Desc');
	  	  $this->db->where('NwsId >=', $this->offset);
	  	  $newsData = $this->db->get('news')->result_array();
	  	  return $newsData;  	  
	  }
	  
	  function setLimit($limit = 10)
	  {
	  	  $this->limit = $limit;
	  }
	  
	  function setOffset($offset = 0)
	  {
	  	  $this->offset = $offset;
	  }
	  
	  function deleteNews($id)
	  {
	  	  $this->db->delete('news', array('NwsId' => $id));
	  }
	  
  }
  ?>