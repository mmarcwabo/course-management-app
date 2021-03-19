<?php

#Class name : Course
#Purpose : Course controller
#Author : mwabo
#email : mwabo@exsofth.com

class Course extends Controller {

    function __construct() {
        parent::__construct();
        //Model instantiation
        //JS files for this controller

    }

    function index() {
        $this->view->title = "Course";
        $this->view->js = array(
            "scripts/js/main.js",
            "scripts/js/course.js"
        );
        //Display courses' list before render it on the page
        $this->showCourseList();
        $this->view->render("course/index");
    }

    public function create() {
        require 'libs/Form.php';
        require 'libs/Val.php';
        //Getting data from form
        //$data = null;
        $form = new Form();
        try {
            $form->post('title')
                ->post('weight')
                ->post('volume')
                ->post('teacher')
                ->post('promotion');
            $form->submit();
            //echo "the form passed";
            $data = $form->fetch();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        //Real insert here
        $this->model->create($data);
        //Refresh the courses' list before render it on the page
        $this->showCourseList();
        $this->view->render("course/index");
    }

    public function edit($id) {

        $this->view->title = "Edit course";
        $this->view->course = $this->model->showSingleList($id);
        $this->view->render('course/edit');
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
            ->post('coursetype');
            $form->submit();
            //echo "the form passed";
            $data = $form->fetch();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        //Getting the course id here
        $data['idcourse'] = 1;//Get the coordonnee id from database

        // @TODO: Do your error checking!

        $this->model->editSave($data);
        header('location: ' . URL . 'course');
    }

    public function delete($id) {

    }

    public function show() {

    }

    public function showCourseList() {
        //Showing all the courses
        //Sending list of courses on the view
        $this->view->listOfCourse = $this->model->showCourseList();
    }

    public function showAttributeOfCourseList($attribute) {
        $this->view->courseNameList = $this->model->showAttributeOfCourseList($attribute);
    }

    public function showSingleList($id) {
        $model = new Course_Model();
        print_r($model->showSingleList($id));
    }

    public function deleteCourse($id) {
        $model = new Course_Model();
        $model->deleteCourse($id);
        print_r($model->showCourseList());
    }

    /*
    public function getservicesof($category){
      $this->view->servicesOfCategory = $this->model->getServicesOf($category);
      //Render all the service of $category
      $this->view->render("course/index");
    }
    */
}
