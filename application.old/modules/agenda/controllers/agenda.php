<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller agenda
 * @created on : 05-06-2014
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class agenda extends MY_Controller
{
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
         $this->template->render('agenda/view');
    }
}