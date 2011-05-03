<?php
  Class News extends Controller
  {
  	  function News()
  	  {
  	  	  parent::Controller();
	  }
	  
	  function index()
	  {
	  	  $this->newsmodel->setLimit(0); //all news
	  	  $data['news'] = $this->newsmodel->getAllNews();
	  	  $this->smarty->assign('area', $this->smarty->view("news.tpl", $data, TRUE));
	  }
	  
	  function insert()
	  {
	  	  $this->smarty->assign('area', $this->smarty->view("news/insertnews.tpl",array(),TRUE));
	  }
	  
	  function edit($id)
	  {
	  		$data['update'] = 1;
	  		$data['newsData'] = $this->newsmodel->getNewsById($id); 
	  		$this->smarty->assign('area', $this->smarty->view("news/insertnews.tpl",$data,TRUE));	  	  
	  }
	  
	  function show($id)
	  {
	  	  
	  }
	  
	  function update()
	  {
	  	$this->newsmodel->updateNews();
	  	redirect('admin/news');	  
	  }
	  function save()
	  {
	  	  $newsData = $this->input->post('newsData'); 
	      if (!empty($newsData)) {
	        $this->newsmodel->insertNews();
	      	redirect('admin/news');
		  } else {
	  	  	redirect('admin/news/insert');
		  } 	  
	  }
	  
	  function delete($id)
	  {
	  	 $this->newsmodel->deleteNews($id);
	  	 redirect('admin/news'); 
	  }
  }
?>
