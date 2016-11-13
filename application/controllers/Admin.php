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
    public function __construct() {
        parent::__construct();
        $this->load->helper('formfields');
    }
    
    public function index() { 
        $origin = $_SERVER['HTTP_REFERER'];
        $role = $this->session->userdata('userrole');
        if($role != 'admin'){
            $message = 'Sorry! You are not authorized to access this!';
            $this ->data['content'] = $message;
            $this->render('Maintenance');
            return;
        }
        
        $this->data['pagebody'] = 'mtce';
        $this->data['items'] = $this->Menu->all();
        $this->render('Maintenance');
    }
    
    public function edit($id=null){
        $key = $this->session->userdata('key');
        $record = $this->session->userdata('record');
        
        if(empty($key)){
            $record = $this->Menu->get($id);
            $key = $id;
            $this->session->set_userdata('key',$id);
            $this->session->set_userdata('record',$record);
            
        }
        //$this->data['content'] = "Looking at " . $key . ': ' . $record->name;;
        $this->data['fid'] = makeTextField('Menu code', 'id', $record->id);
        $this->data['fname'] = makeTextField('Item name', 'name', $record->name);
        $this->data['fdescription'] = makeTextArea('Description', 'description', $record->description);
        $this->data['fprice'] = makeTextField('Price, each', 'price', $record->price);
        $this->data['fpicture'] = makeTextField('Item image', 'picture', $record->picture);
        
        $cats = $this->Categories->all(); // get an array of category objects
        foreach($cats as $code => $category) // make it into an associative array
            $codes[$code] = $category->name;
        $this->data['fcategory'] = makeCombobox('Category', 'category', $record->category,$codes);
        // show the editing form
        $this->data['zsubmit'] = makeSubmitButton('Save', 'Submit changes');
        $this->data['pagebody'] = "mtce-edit";
        $this->render();
    }
    
    function cancel() {
        $this->session->unset_userdata('key');
        $this->session->unset_userdata('record');
        $this->index();
    }
}
