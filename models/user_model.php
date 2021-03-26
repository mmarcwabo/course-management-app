<?php

//user_model

class User_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function create($data)
    {
        //Inserting data from form in the database
        $this->db->insert('user', [
            'names' => $data['names'],
            'birthdate' => $data['birthdate'],
            'email' => $data['email'],
            'password' => Hash::create("tiger128,3", $data['password'], HASH_PASSWORD_KEY),
            'usertype' => $data['usertype']
        ]);
        //Redirect to the view that sent the request to avoid data duplication on error
        header('location:' . URL . 'user');
    }

    public function showUserList()
    {
        return $this->db->select("SELECT * FROM user");
    }

    /**
     * showAttributeOfUserList - Get lists for comboboxes and select html tags
     * @param string $attribute the table field we want to list
     */
    public function showAttributeOfUserList($attribute)
    {
        return $this->db->select("SELECT " . $attribute . " FROM user");
    }

    public function showSingleList($id)
    {
        return $this->db->select("SELECT * FROM user WHERE iduser= :id", array(":id" => $id));
    }

    /**
     * editUser - Saves the data edition to the database
     * @param array $data values to save to database
     */
    public function editUser($data)
    {
        $this->db->update(
            "user",
            [
                'names' => $data['names'],
                'birthdate' => $data['birthdate'],
                'email' => $data['email'],
                'password' => $data['password'],
                'usertype' => $data['usertype']
            ],
            "`iduser` = {$data['iduser']}"
        );
    }

    /**
     * deleteUser -
     * @param Integer $id
     * @return boolean
     */
    public function deleteUser($id)
    {
        $result = $this->db->select("SELECT * FROM user WHERE iduser= :id", array(":id" => $id));
        if ($result[0]['usertype'] == 'Admin') {
            return false;
        }
        $this->db->delete("user", "iduser= '$id'");
    }

    /**
     * find a user for login purposes
     * @param String $email - User email (username)
     * @return array() -
     **/

    public function findUserInfoByEmail($email)
    {
        return $this->db->select("SELECT * FROM user WHERE email= :email", array(":email" => $email));
    }
}
