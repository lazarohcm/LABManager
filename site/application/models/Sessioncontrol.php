<?php
class Sessioncontrol extends CI_Model{

    public function isLoggedIn() {
        $arrayUserData = $this->session->all_userdata();
        if (array_key_exists("id_user_labmanager", $arrayUserData)) {
            return TRUE;
        }
        return FALSE;
    }

    public function setVarSession($var, $value) {
        $this->session->set_userdata($var, $value);
    }

    public function getUserDataSession() {
        return $this->session->userdata("id_user_labmanager");
    }

}
