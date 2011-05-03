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
	  	  if ($this->input->post('newsData')) {
		  	echo "fuck";
		  }
	  }
	  
	  function edit($id)
	  {
	  	  
	  }
	  
	  function show($id)
	  {
	  	  
	  }
	  
	  function save()
	  {
	  	  echo "saving...";
	  	  exit();
	      $this->newsmodel->insertNews();
	  	  redirect('admin/news'); 	  
	  }
  }
?>
