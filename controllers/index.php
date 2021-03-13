<?php

/*
Index controller

*/

class Index extends Controller{

    function __construct(){
        parent::__construct();
        //JS files for this controller
        $this->view->js=array(
          "scripts/js/main.js",
          "scripts/js/service.js"
        );

    }

    function index(){
        $this->view->title = "CMA - Course Management App";
        $this->listAttributeOfCategorie("titre");
        //Render the dashboard view here
        $this->view->render("index/index");
    }

    public function listAttributeOfCategorie($attribute) {
        require_once 'models/user_model.php';
        $model = new User_Model();
        $this->view->courseList = Model::listItemFromDbTable("course", "title");
        $this->view->techerList = Model::listItemFromDbTable("teacher", "user_iduser");
    }
}
