<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller_404
 *
 * @author seryapov.a
 */
class Controller_404 extends Controller{
    public function action_index() {
        $this->view->generate('404_view.php','layouts/auth_layout.php');
    }
}
