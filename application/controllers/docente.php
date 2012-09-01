<?php
class Docente extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
            $this->load->database("secundaria");



       }
       public function index()
       {
       		$this->load->view('includes/header');
       		$this->load->view('docente/index');
       		$this->load->view('includes/footer');

       }

       public function show()
       {


       }

       public function new_view()
       {

       	
       }
       public function edit()
       {

       	
       }
       public function update()
       {

       	
       }
       public function create()
       {

       	
       }
}
?>