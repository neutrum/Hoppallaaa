<?php
  Class GalleryModel Extends Model
  {
      private $limit = 10;
  	  private $offset = 0;
  	  private $home_dir = './media/gallery/';
  	
  	  function GalleryModel()
  	  {
  	  	  parent::Model();
	  }
	  
	  function getAllGalleries()
	  {
	  	 if ($this->limit > 0)
	  	  {
	  	  	$this->db->limit($this->limit);
		  }
		  $this->db->order_by('GalId', 'Desc');
	  	  $this->db->where('GalId >=', $this->offset);
	  	  $this->db->join('photos', 'photos.PhoGalId = gallery.GalID','left');
	  	  $this->db->group_by('PhoGalId');
	  	  $galleryData = $this->db->get('gallery')->result_array();
	  	  return $galleryData; 
	  }
	                               
	  function insertGallery()
	  {
	      $galleryData = $this->input->post('galleryData');
	      $galleryData['GalPosted'] = date('Y-m-d H:m:s');
  	  	  $galleryData['GalDir'] = uniqid().'_'.url_title($galleryData['GalTitle']);
  	  	  mkdir($this->home_dir.$galleryData['GalDir']);
  	  	  $this->db->insert('gallery', $galleryData);
	  	  return $this->db->insert_id();
	  }
	  
	  function updateGallery()
	  {
	  	$galleryData= $this->input->post('galleryData');
	  	$id = $galleryData['GalID'];
	  	$galInfo = $this->getGalleryById($id);
	  	/*
	  	$data = array(
	  		'NwsTitle' => $newsData['title'],
	  		'NwsContent' => $newsData['content']
	  	);
	  	*/
	  	$this->db->update('gallery', $galleryData, array('GalID' => $id));  
	   			  
	  }
	  
	  function movePhotos()
	  {
	  	  $photos_tmp = $this->session->userdata('photos_tmp');
	  	  if (!empty($photos_tmp)) 
	  	  {
	  	  	  foreach ($photos_tmp as $photo)
	  	  	  {
	  	  	  	  
			  }
		  }
	  }
	  function getGalleryById($id)
	  {
	  	$galleryData = $this->db->get_where('gallery', array('GalID' => $id))->result_array();
	  	$galleryPhotos = $this->db->get_where('photos',array('PhoGalId' => $id))->result_array();
	  	$galleryData[0]['photos'] = $galleryPhotos; 
	  	return $galleryData[0];	  
	  }
	  
	  function setLimit($limit = 10)
	  {
	  	  $this->limit = $limit;
	  }
	  
	  function setOffset($offset = 0)
	  {
	  	  $this->offset = $offset;
	  } 
	  
	  function deleteGallery($id)
	  {
	  	  $this->db->delete('gallery', array('GalID' => $id));
	  	  $this->db->delete('photos', array('PhoGalId' => $id)); 
	  }

      function incrementViews($id)
      {
        $galleryData = $this->getGalleryById($id);
        if ($galleryData['GalViews'] == null) $galleryData['GalViews'] = 0;
        $galleryData['GalViews']++;
        unset($galleryData['photos']);
        $this->db->update('gallery', $galleryData, array('GalID' => $id));             
      }
	  
  }
?>
