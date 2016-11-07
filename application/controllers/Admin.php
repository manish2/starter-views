<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author manish
 */
class Admin extends Application {
    public function index() { 
        $origin = $_SERVER['HTTP_REFERER'];
        $role = $this->session->userdata('userrole');
        if($role == 'user') { 
           $this->data['content'] = "Sorry! You are not authorized to access this!";
           $this->render('Maintenance'); 
        }
        else { 
            $this->data['content'] = "Hello admin!";
            $this->render('Maintenance'); 
        } 
        
    }
}
