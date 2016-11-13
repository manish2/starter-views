<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Menu extends MY_Model {
    //put your code here
    
    function _construct() 
    { 
        parent::_construct();
    }
    
    function rules() {
        $config = [
            ['field'=>'id', 'label'=>'Menu code', 'rules'=> 'required|integer'],
            ['field'=>'name', 'label'=>'Item name', 'rules'=> 'required'],
            ['field'=>'description', 'label'=>'Item description', 'rules'=> 'required|max_length[256]'],
            ['field'=>'price', 'label'=>'Item price', 'rules'=> 'required|decimal'],
            ['field'=>'picture', 'label'=>'Item picture', 'rules'=> 'required'],
            ['field'=>'category', 'label'=>'Menu category', 'rules'=> 'required']
        ];
        return $config;
    }
    
}
