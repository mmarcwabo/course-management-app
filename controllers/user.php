<?php

#Class name : User
#Purpose : User controller
#Author : mwabo
#email : mwabo@exsofth.com

class User extends Controller {
    
    //
    private $email;
    private $password;

    function __construct() {
        parent::__construct();
        //Model instantiation
        //JS files for this controller

    }

    function index() {
        $this->view->title = "User login / register page";
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
            $form->post('names')
                ->post('birthdate')
                ->post('email')
                ->post('password')
                ->post('usertype');
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
            $form->post('names')
            ->post('birthdate')
            ->post('email')
            ->post('password')
            ->post('usertype');
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
    public function login(){
        
        require 'libs/Form.php';
        require 'libs/Val.php';
        //Getting data from form
        //$data = null;
        $form = new Form();
        try {
            $form->post('email')
                ->post('password');
            $form->submit();
            //echo "the form passed";
            //Posted data are in the $data mixed array
            $data = $form->fetch();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        //Login process here
        $user_ = $this->model->findUserInfoByEmail($data['email']);
        //if the email if found in our db
        if(isset($user_[0]) && $user_[0]['email']==$data['email']){
            //The user exists
            echo "<br/>";
            echo "Email exists\t";
            echo "<br/>";
            //Let's go for password checking
            $password_ = $user_[0]['password'];
            $password__ = Hash::create("tiger128,3", $data['password'], HASH_PASSWORD_KEY);
            if($password__==$password_){
                echo "Password is correct - Welcome <br/>";
                Session::destroy();
                Session::init();
                Session::set("connectedUser", $user_[0]['names']);
                //Session::set("visitor", (explode('@',$user_[0]['names']))[0]);
                Session::set("sessionId",  $user_[0]['email']);
                Session::set("userType",  $user_[0]['usertype']);
                //Send a success message on the dashboard
                Session::set("alertMessage", "Login Successfull");
                header('location: ' . URL . 'dashboard');
            }else{
                echo "The password is not correct, go away and leave me alone man <br/>";
                header('location: ' . URL . 'user');
            }
           exit;
        }else{
            echo "This email is not registered as a valid user";
            header('location: ' . URL . 'user');
            exit;
        }
        
        //Find the user from our database by email
        $user__ = $this->model->findUserInfoByEmail($username);
        print_r($user__);
        //With get field from any else, find the password
        //with passwordMatch, find if the users has inputed the real password
        //Occasion to test the match function of php 8.
    


    }
    /**
     * Getter and Setter
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * Getter and Setter
     */
    public function getPassword(){
        return $this->password;
    }
}
