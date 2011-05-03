<?php
/**
 * Created by PhpStorm.
 * User: neutrum
 * Date: Nov 23, 2010
 * Time: 5:04:37 PM
 * To change this template use File | Settings | File Templates.
 */
 
class Underconstruction extends Controller {
    function Underconstruction()
    {
        parent::Controller();
    }

    function index()
    {
        $this->smarty->setPartial('content', 'underconstruction', array());
    }
}