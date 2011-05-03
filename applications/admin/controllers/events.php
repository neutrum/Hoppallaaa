<?php
  Class Events Extends Controller {
  	function Events()
  	{
  		parent::Controller();
	}
	
	function index()
 	{
		$this->eventsmodel->setLimit(0); //all news
	  	$data['events'] = $this->eventsmodel->getAllEvents();
	  	$this->smarty->assign('area', $this->smarty->view("events.tpl", $data, TRUE));
	}
	
	  function insert()
	  {
	  	  $defaultTime = date('H').':00';
	  	  $data = array(
	  	  'hours' => $this->createHourBox($defaultTime)
	  	  );
	  	  $this->smarty->assign('area', $this->smarty->view("events/insertevent.tpl",$data,TRUE));
	  }
	  
	  function edit($id)
	  {
	  		$data['update'] = 1;
	  		$data['eventData'] = $this->eventsmodel->getEventsById($id); 
	  		$data['hours'] = $this->createHourBox($data['eventData']['EveTime']);  
	  		$this->smarty->assign('area', $this->smarty->view("events/insertevent.tpl",$data,TRUE));	  	  
	  }
	  
	  function show($id)
	  {
	  	  
	  }
	  
	  function update()
	  {
	  	$this->eventsmodel->updateEvent();
	  	redirect('admin/events');	  
	  }
    
	  function save()
	  {
	  	  $eventData = $this->input->post('eventData'); 
	      if ((!empty($eventData['EveTitle']) && !empty($eventData['EveDate'])) || (!empty($eventData['EveTitle']) && !empty($eventData['EveTemp']))) {
	        $this->eventsmodel->insertEvent();
	      	redirect('admin/events');
		  } else {
	  	  	redirect('admin/events/insert');
		  } 	  
	  }
	  
	  function delete($id)
	  {
	  	 $this->eventsmodel->deleteEvents($id);
	  	 redirect('admin/events'); 
	  }
	  
	  // this is fucking lame but have no time to play with jQuery timepicker bullshit
	  function createHourBox($selected = null)
	  {
	  	  $box = '<select name="eventData[EveTime]">';
	  	  for($hour = 0;$hour < 24;$hour++)
	  	  {
	  	  	if ($hour < 10)
	  	  	{
	  	  		$hour = '0'.$hour;
			}
			$minutes = array('00','15','30','45');
			foreach($minutes as $span)
			{
				$time = $hour.':'.$span; 
				$isSelected = '';
				if (strtotime($time) == strtotime($selected))
				{
					$isSelected = ' selected';
				}
				$box .= '<option value="'.$time.'" '.$isSelected.'>'.$time.'</option>';	
			}  
	  	  	  
		  }
		  $box .= '</select>'; 
		  return $box;
	  }
	 
  }
?>
