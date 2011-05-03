<?php
  class Entry extends Controller {

	function Entry()
	{
		parent::Controller();	
	}
	
	function index()
	{
        // get last upcoming event
		$this->eventsmodel->setLimit(1);
        $where = array(
            'column' => 'EveDate >=',
            'value' => date('Y-m-d')
        );
		$event = $this->eventsmodel->getAllEvents($where);
        // get running alcohol action
        $this->eventsmodel->setLimit(1);
        $where = array(
            'column' => 'EveTemp',
            'value' => 1
        );
        $tempAlcohol = $this->eventsmodel->getAllEvents($where);

        // get last photo album
        $this->gallerymodel->setLimit(1);
        $gallery = $this->gallerymodel->getAllGalleries();
        // build the homebox data array
        $homebox = array();
        // temporary action (alcohol action)
        if (!empty($tempAlcohol)) {
            $homebox[] = array(
                'image' => '/media/events/pb_'.$tempAlcohol[0]['EvePicture'],
                'text' => $tempAlcohol[0]['EveTitle'],
                'link' => '/events/show/'.$tempAlcohol[0]['EveId']
            );
        }
        // gallery
        if (!empty($gallery)) {
            $homebox[] = array(
                    'image'=> '/media/gallery/'.$gallery[0]['GalDir'].'/pb_'.$gallery[0]['PhoFile'],
                    'text' => 'GALERIE: '.$gallery[0]['GalTitle']." ".$gallery[0]['GalPosted'],
                    'link' => '/gallery/show/'.$gallery[0]['GalID']
            );
        }
        // event
        if (!empty($event)) {
            $homebox[] = array(
                'image' => '/media/events/pb_'.$event[0]['EvePicture'],
                'text' => 'AKCE: '. $event[0]['EveDate'] .'<b> '.$event[0]['EveTitle'].'</b> ',
                'link' => '/events/show/'.$event[0]['EveId']
            );
        }



        $data = array(
			"news" => $this->newsmodel->getAllNews(),
		    "homeboxdata" => $homebox
        );
        
		$this->smarty->setPartial("content", "home", $data);
	} 
}
