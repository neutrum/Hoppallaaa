<?php
  Class Gallery Extends Controller 
  {
  	function Gallery()
  	{
  		parent::Controller();
	}
	
	function index()
	{
		$data = array(
			'galleries' => $this->gallerymodel->getAllGalleries()
		);
		$this->smarty->setPartial("content", "gallery", $data);
	}
	
	function show($id)
	{
		$this->gallerymodel->incrementViews($id);
        $data = array(
			'gallery_data' => $this->gallerymodel->getGalleryById($id)
		);
		$this->smarty->setPartial("content", "gallery/show_gallery", $data);
	}
  }
?>
