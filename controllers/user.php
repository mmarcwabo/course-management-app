<?php

#Class name : User
#Purpose : User controller
#Author : mwabo
#email : mwabo@exsofth.com

class User extends Controller {

    function __construct() {
        parent::__construct();
        //Model instantiation
        //JS files for this controller

    }

    function index() {
        $this->view->title = "User";
        $this->view->js = array(
            "scripts/js/main.js",
            "scripts/js/user.js"
        );
        //Display users' list before render it on the page
        $this->showUserList();
        $this->view->render("user/index");
    }

    public function create() {
        require 'libs/Form.php';
        require 'libs/Val.php';
        //Getting data from form
        //$data = null;
        $form = new Form();
        try {
            $form->post('titre')
                ->post('description');
            $form->submit();
            //echo "the form passed";
            $data = $form->fetch();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        //Real insert here
        $this->model->create($data);
        //Refresh the users' list before render it on the page
        $this->showUserList();
        $this->view->render("user/index");
    }

    public function edit($id) {

        $this->view->title = "Edit user";
        $this->view->user = $this->model->showSingleList($id);
        $this->view->render('user/edit');
    }

    public function editSave($id) {

        require 'libs/Form.php';
        require 'libs/Val.php';
        //Getting data from form
        //$data = null;
        $form = new Form();
        try {
            $form->post('titre')
                ->post('description');
            $form->submit();
            //echo "the form passed";
            $data = $form->fetch();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        //Getting the user id here
        $data['iduser'] = 1;//Get the coordonnee id from database

        // @TODO: Do your error checking!

        $this->model->editSave($data);
        header('location: ' . URL . 'user');
    }

    public function delete($id) {

    }

    public function show() {

    }

    public function showUserList() {
        //Showing all the users
        //Sending list of users on the view
        $this->view->listOfUser = $this->model->showUserList();
    }

    public function showAttributeOfUserList($attribute) {
        $this->view->userNameList = $this->model->showAttributeOfUserList($attribute);
    }

    public function showSingleList($id) {
        $model = new User_Model();
        print_r($model->showSingleList($id));
    }

    public function deleteUser($id) {
        $model = new User_Model();
        $model->deleteUser($id);
        print_r($model->showUserList());
    }

    /*
    public function getservicesof($category){
      $this->view->servicesOfCategory = $this->model->getServicesOf($category);
      //Render all the service of $category
      $this->view->render("user/index");
    }
    */
}
