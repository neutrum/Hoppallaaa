<?php
  Class Menu Extends Controller
  {
  	  function Menu()
  	  {
  	  	  parent::Controller();
	  }
	  
	  function index()
	  {
	  	  		$data['categories'] = $this->menumodel->getAllCategories();
	  			$this->smarty->assign('area', $this->smarty->view("menu.tpl", $data, TRUE));
	  }
	  
	  function insert()
	  { 
	  	$data = array();                        
	  	$this->smarty->assign('area', $this->smarty->view("menu/insertmenu.tpl",$data,TRUE));
	  }
	  
	  function save()
	  {
	  	  $categoryData = $this->input->post('catData'); 
	      if (!empty($categoryData['MenTitle'])) {  
	        $id = $this->menumodel->insertCategory();
	      	redirect('admin/menu/items/'.$id);
		  } else {
	  	  	redirect('admin/menu/insert');
		  }
	  }
	  
	  function edit($id)
	  {
	  	  $data['update'] = 1;
	  	  $data['catData'] = $this->menumodel->getCategoryById($id);
	  	  $this->smarty->assign('area', $this->smarty->view("menu/insertmenu.tpl",$data,TRUE));
	  }
	  
	  function update()
	  {
	  	$this->menumodel->updateCategory(); 
	  	redirect('admin/menu');	  
	  }
	  
	  function delete($id)
	  {
	  	  $this->menumodel->deleteAll($id);
	  	  redirect('admin/menu');
	  }
	  
	  function items($id)
	  {
	  	  $data['catData'] = $this->menumodel->getCategoryById($id);
	  	  $data['items'] = $this->menumodel->getCategoryItems($id); 
	  	  $this->smarty->assign('area', $this->smarty->view("menu/items.tpl",$data,TRUE));
	  }
	  
	  function saveitems()
	  {
	  	  $allItems = $this->input->post('itemData');
	  	  $category_id = $this->input->post('category_id');
	  	  if (!empty($category_id)) {
	  	      $this->menumodel->deleteAllItems($category_id);
	  	  	  $allItems = array_reverse($allItems);
	  	  	  foreach ($allItems as $item) {
	  	  	  	$item['ItmCat'] = $category_id;
	  	  	  	$this->menumodel->insertItem($item);
			}
			redirect('/admin/menu/items/'.$category_id);
		  }
	  }
  }
?>
