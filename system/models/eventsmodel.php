<?php
  Class EventsModel Extends Model
  {                    
  	  private $limit = 10;
  	  private $offset = 0;
  	  
  	  function EventsModel()
  	  {
  	  	parent::Model();
  	  }
  	  
  	  function insertEvent()
  	  {
  	  	  $eventData = $this->input->post('eventData');
  	  	  /*       
  	  	  $data = array(
  	  	  	'NwsTitle' => $newsData['title'],
  	  	  	'NwsContent' => $newsData['content'],
  	  	  	'NwsDate' => 'now()' 
  	  	  );
  	  	   */
  	  	  $this->db->insert('events', $eventData);
	  }
	  
	  function updateEvent()
	  {
	  	$eventData= $this->input->post('eventData');
	  	$id = $eventData['EveId'];
	  	/*
	  	$data = array(
	  		'NwsTitle' => $newsData['title'],
	  		'NwsContent' => $newsData['content']
	  	);
	  	*/
	  	$this->db->update('events', $eventData, array('EveId' => $id));  
	  }
	  
	  function getEventsById($id)
	  {
	  	$eventsData = $this->db->get_where('events', array('EveId' => $id))->result_array();
	  	
	  	return $eventsData[0];	  
	  }
	  
	  function getAllEvents($where = null)
	  {
	  	  if ($this->limit > 0)
	  	  {
	  	  	$this->db->limit($this->limit);
		  }
		  $this->db->order_by('EveDate', 'Asc');
	  	  $this->db->where('EveId >=', $this->offset);
          // custom condition
	  	  if ($where != null) {
            $this->db->where($where['column'], $where['value']);  
          }
	  	  $eventsData = $this->db->get('events')->result_array();
	  	  return $eventsData;  	  
	  }
	  
	  function setLimit($limit = 10)
	  {
	  	  $this->limit = $limit;
	  }
	  
	  function setOffset($offset = 0)
	  {
	  	  $this->offset = $offset;
	  }
	  
	  function deleteEvents($id)
	  {
	  	  $this->db->delete('events', array('EveId' => $id));
	  }
	  
	  
  }
  ?>
