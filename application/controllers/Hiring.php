<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of Hiring
 *
 * @author manish
 */
class Hiring extends Application{
    //put your code here
     public function index() {
         $stuff = file_get_contents('../data/jobs.md');
         $this->data['content'] = $this->parsedown->parse($stuff);
         $this->render('template-secondary'); 
     }
}
