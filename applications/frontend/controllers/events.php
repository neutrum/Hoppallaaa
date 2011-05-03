<?php
  Class Events Extends Controller{
  	function Events()
  	{
  		parent::Controller();
	}
	
	function index()
	{
        $where = array(
            'column' => 'EveDate >=',
            'value' => date('Y-m-d')
        );
		$data = array(
			'events' => $this->eventsmodel->getAllEvents($where)
		);
		$this->smarty->setPartial("content", "events", $data);
	}

    function show($id)
    {
        $data = array(
            'event' => $this->eventsmodel->getEventsById($id)
        );
        $this->smarty->setPartial("content","events/show_event", $data);
    }
  }
?>
