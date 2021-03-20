<?php

//course_model

class Course_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function create($data) {
        //Inserting data from form in the database
        $this->db->insert('course', ['title' => $data['title'],
            'weight' => $data['weight'],
            'volume' => $data['volume'],
            'teacher_idteacher' => 1,            
            'promotion_idpromotion' => 1
            ]);
        //Redirect to the view that sent the request to avoid data duplication on error
        header('location:'.URL.'course');
    }

    public function showCourseList() {
        return $this->db->select("SELECT * FROM course");
    }

    /**
     * showAttributeOfCourseList - Get lists for comboboxes and select html tags
     * @param string $attribute the table field we want to list
     */
    public function showAttributeOfCourseList($attribute) {
        return $this->db->select("SELECT ".$attribute." FROM course");
    }

    public function showSingleList($id) {
        return $this->db->select("SELECT * FROM course WHERE idcourse= :id", array(":id" => $id));
    }

    /**
     * editCourse - Saves the data edition to the database
     * @param array $data values to save to database
     */
    public function editCourse($data) {
        $this->db->update("course", ['names' => $data['names'],
        'birthdate' => $data['birthdate'],
        'email' => $data['email'],
        'password' => $data['password'],            
        'coursetype' => $data['coursetype']]
            , "`idcourse` = {$data['idcourse']}");
    }

    /**
     * deleteCourse -
     * @param Integer $id
     * @return boolean
     */
    public function deleteCourse($id) {
        $result = $this->db->select("SELECT * FROM course WHERE idcourse= :id", array(":id" => $id));
        if ($result[0]['coursetype'] == 'Admin') {
            return false;
        }
        $this->db->delete("course", "idcourse= '$id'");
    }

   //**
   // * getServicesOf
    //* @param String $category - Category name
   // * @return array() -
   //**/
  /*
    public function getServicesOf($category){
      return $this->db->select("SELECT * FROM course WHERE titre= :titre", array(":titre" => $category));
    }
 */
}
