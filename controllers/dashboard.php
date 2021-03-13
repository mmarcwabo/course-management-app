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
        $this->listAttributeOfCategorie("titre");
        //Render the dashboard view here
        $this->view->render("dashboard/index");
    }

    public function listAttributeOfCategorie($attribute) {
        require_once 'models/categorie_model.php';
        $model = new Categorie_Model();
        $this->view->paysNameList = Model::listItemFromDbTable("pays", "nom");
        $this->view->paysIdFromVilleList = Model::listItemFromDbTable("ville", "pays_idpays");
        $this->view->villeNameList = Model::listItemFromDbTable("ville", "nom");
        $this->view->categorieNameList = $model->showAttributeOfCategorieList($attribute);
    }

    function logout(){
        Session::destroy();
        header('location: ../login');
        exit;
    }

}
