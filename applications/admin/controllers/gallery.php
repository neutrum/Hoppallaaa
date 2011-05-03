<?php
  Class Gallery Extends Controller
  {
  	  function Gallery()
  	  {
  	  	  parent::Controller();
	  }
	  
	  function index()
	  {
	  	$this->eventsmodel->setLimit(0); //all news
	  	$data['galleries'] = $this->gallerymodel->getAllGalleries();
	  	$this->smarty->assign('area', $this->smarty->view("gallery.tpl", $data, TRUE));
	  }
	  
	  function insert()
	  {
	  	  $data = array(
	  	  	'session_id' => $this->session->userdata('session_id')
	  	  );                
	  	  $this->smarty->assign('area', $this->smarty->view("gallery/insertgallery.tpl",$data,TRUE));
	  	  
	  }
	  
	  function upload($galId)
	  {
	  	  $data = array('galId' => $galId);
	  	  $galleryId = $this->gallerymodel->getGalleryById($galId);
	  	  $data['galDir'] = $galleryId['GalDir'];
	  	  $data['photos'] = $galleryId['photos'];
	  	  
	  	  $this->smarty->assign('area', $this->smarty->view("gallery/uploadphotos.tpl",$data,TRUE));		  
	  }
	  
	  function edit($id)
	  {	
	  		$data = array(
	  			'update' => 1,
	  			'galleryData' => $this->gallerymodel->getGalleryById($id),  
	  			'session_id' => $this->session->userdata('session_id') 
	  		);
	  		$this->smarty->assign('area', $this->smarty->view("gallery/insertgallery.tpl",$data,TRUE));	  	  
	  }
	  
	  function show($id)
	  {
	  	  
	  }
	  function deletepic()
	  {
	  	  $id = $this->input->post('id');
	  	  if ($id) {
	  	  	$this->db->delete('photos', array('PhoId'=> $id));
		    $resp = array('resp' => 'ok');
		    echo json_encode($resp);
		  }
	  }
	  function update()
	  {
	  	$this->gallerymodel->updateGallery(); 
	  	redirect('admin/gallery');	  
	  }
	  
	  function save()               
	  {
	  	  $galleryData = $this->input->post('galleryData'); 
	      if (!empty($galleryData['GalTitle'])) {
	        $id = $this->gallerymodel->insertGallery();
	      	redirect('admin/gallery/upload/'.$id);
		  } else {
	  	  	redirect('admin/gallery/insert');
		  } 	  
	  }
	  
	  function delete($id)
	  {
	  	 $this->gallerymodel->deleteGallery($id);
	  	 redirect('admin/gallery'); 
	  }

  }
?>
