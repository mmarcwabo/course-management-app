<?php

/*
Dashboard controller

*/

class Dashboard extends Controller{

    function __construct(){
        parent::__construct();
        //JS files for this controller
        $this->view->js=array(
          "scripts/js/main.js",
          "scripts/js/dashboard.js",
          "scripts/js/service.js"
        );
    }
    /**
     *
     */
    function index(){
        $this->view->title = "Tableau de Bord";
        //Instanciate service here
        /*require_once "service.php";
        $service = new Service();*/
        //Call a service method here
        $this->listAttributeOfUser("titre");
        //Render the dashboard view here
        $this->view->render("dashboard/index");
    }

    public function listAttributeOfUser($attribute) {
        require_once 'models/user_model.php';
        $model = new User_Model();
        $this->view->villeNameList = Model::listItemFromDbTable("user", "names");
        $this->view->userNameList = $model->showAttributeOfUserList($attribute);
    }

    function logout(){
        Session::destroy();
        header('location: ../login');
        exit;
    }

}
