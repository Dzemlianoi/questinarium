<?php


class Controller_Main extends Controller{
    //put your code here
    public function action_index() {
        $this->view->generate('main_view.php', 'layouts/main_layout.php');
    }
}
