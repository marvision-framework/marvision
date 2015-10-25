<?php
/**
 * Created by PhpStorm.
 * User: Marwen Hlaoui
 * Date: 23/10/2015
 * Time: 07:42
 */

    class EmptyController extends Controller
    {

        /**  Add  **/
        function add(){
            $this->layout = '';
            $d['title_for_layout'] = '';
            //$d['rightmenu'] = array("categ"=>"users","pg"=>"list"); ### menu
            //$this->loadModel('');  ### load DB

            $this->set($d);
        }

        /**  Edit  **/
        function edit(){
            $this->layout = '';
            $d['title_for_layout'] = '';
            //$d['rightmenu'] = array("categ"=>"users","pg"=>"list"); ### menu
            //$this->loadModel('');  ### load DB

            $this->set($d);
        }

        /**  find List  **/
        function find(){
            $this->layout = '';
            $d['title_for_layout'] = '';
            //$d['rightmenu'] = array("categ"=>"users","pg"=>"list"); ### menu
            //$this->loadModel('');  ### load DB

            $this->set($d);
        }


    }