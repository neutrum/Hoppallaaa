<?php
Class Menu Extends Controller {

    function Menu()
    {
        parent::Controller();
    }

    function index()
    {
        $data = array(
            'menu' => $this->menumodel->getAllCategories()
        );
        $this->smarty->setPartial('content', 'menu',$data);
    }
}
