<?php 
class Administracion extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url');     
        $this->load->library('grocery_CRUD');
    }


/*========================================== GESTION DE USUARIOS ===========================================*/
    public function alta_usuarios()
    {
        if(($this->session->userdata("tipoUsuarioId")== 1 || $this->session->userdata("tipoUsuarioId")== 2  ) && $this->session->userdata('validated')){
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_subject('usuario');
            $crud->set_table('usuario');

            if($this->session->userdata("tipoUsuarioId")== 1){
                $crud->where('usuario.tipoUsuarioId',' 2' );
                $crud->set_relation('tipoUsuarioId','tipo_usuario','tipoUsuario', array('tipoUsuarioId' => '2'));
                
            }
            else{
                $crud->where('usuario.tipoUsuarioId >','2' );
                $crud->set_relation('tipoUsuarioId','tipo_usuario','tipoUsuario', array('tipoUsuarioId >' => '2'));
                
            }


            $crud->columns('usuarioId', 'usuario','password', 'tipoUsuarioId');
            $crud->fields('usuario','password', 'verificar_password', 'tipoUsuarioId');
            $crud->display_as('tipoUsuarioId','Tipo de usuario');
    
            $crud->change_field_type('password', 'password');
            $crud->change_field_type('verificar_password', 'password');
            $crud->set_rules('verificar_password', 'Verificar Password', 'required|matches[password]');
            
            //callbacks
            $crud->callback_before_insert(array($this,'encrypt_password_callback'));
            $crud->callback_before_update(array($this,'encrypt_password_callback'));
            $crud->callback_edit_field('password',array($this,'decrypt_password_callback'));
            $crud->callback_before_insert(array($this,'unset_verification'));
            $crud->callback_before_update(array($this,'unset_verification'));
            
            $crud->set_rules('usuario','Usuario','required|max_length[100]');
            $crud->set_rules('password','Password','required|min_length[4]');
            $crud->required_fields('tipoUsuarioId');
    
            $crud->add_action('Contacto','', 'datos_contacto/index/edit', 'ui-icon-plus');
            $crud->add_action('Domicilio','', 'domicilio/index/edit', 'ui-icon-plus');
            $crud->add_action('Adicionales','', 'adicional/index/edit', 'ui-icon-plus');
            $crud->add_action('Personales','', 'datos_personal/index/edit', 'ui-icon-plus');
            
            /*$crud->add_action('Contacto','', '', 'ui-icon-plus', array($this, '_idContacto'));
            $crud->add_action('Domicilio','', '', 'ui-icon-plus', array($this, '_idDomicilio'));
            $crud->add_action('Adicionales','', '', 'ui-icon-plus', array($this, '_idAdicional'));
            $crud->add_action('Personales','', '', 'ui-icon-plus', array($this, '_idPersonal'));*/
    
            $output = $crud->render();
            if($this->session->userdata("tipoUsuarioId")== 1){
                $this->load->view('includes/header-sa');
            }
            else{
                $this->load->view('includes/header-escuela');
            }
            $this->load->view('alta_usuario/index',$output);
            $this->load->view('includes/footer');
        }
        else{
            redirect('404');
        }
    }

    function encrypt_password_callback($post_array, $primary_key = null){
        $this->load->library('encrypt');
 
        $key = 'k1PAjW3tuHCjewV7p7gFEiHps501b68d';
        $post_array['password'] = $this->encrypt->encode($post_array['password'], $key);
        return $post_array;
    }
 
    function decrypt_password_callback($value)
    {
        $this->load->library('encrypt');

        $key = 'k1PAjW3tuHCjewV7p7gFEiHps501b68d';
        $decrypted_password = $this->encrypt->decode($value, $key);
        return "<input type='password' name='password' value='$decrypted_password' />";
    }

    function unset_verification($post_array) {
           unset($post_array['verificar_password']);
           return $post_array;
    }

    public function _idContacto($primary_key, $row){
        $llave_contacto = $this->db->query('SELECT usuarioId FROM datos_contacto WHERE usuarioId=' . $primary_key . '');
        $contacto = $llave_contacto->row(); 
        return site_url('datos_contacto/index/edit/'.$contacto->datosContactoId);
    }
    public function _idDomicilio($primary_key, $row){
        $llave_domicilio = $this->db->query('SELECT usuarioId FROM domicilio WHERE usuarioId=' . $primary_key . '');
        $domicilio = $llave_domicilio->row();       
        return site_url('domicilio/index/edit/'.$domicilio->domicilioId);
    }
    public function _idAdicional($primary_key, $row){
        $llave_domicilio = $this->db->query('SELECT usuarioId FROM adicional WHERE usuarioId=' . $primary_key . '');
        $domicilio = $llave_domicilio->row();       
        return site_url('adicional/index/edit/'.$domicilio->adicionalesId);
    }
    public function _idPersonal($primary_key, $row){
        $llave_domicilio = $this->db->query('SELECT usuarioId FROM datos_personal WHERE usuarioId=' . $primary_key . '');
        $domicilio = $llave_domicilio->row();       
        return site_url('datos_personal/index/edit/'.$domicilio->datosPersonalesId);
    }


/*========================================== GESTION DE ALUMNOS ===========================================*/

    public function alumnos(){

        if (!$this->session->userdata('validated') || $this->session->userdata('tipoUsuarioId') != 2) {
            redirect('login');
        } else {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_subject('padre');
            $crud->set_table('padre');
            $crud->set_relation('alumnoId', 'alumno', '{alumnoId} - {nombre}');
            $crud->set_relation('padreId', 'padre', '{padreId} - {nombre}');
            $crud->columns('nombre','alumnoId');
            $crud->fields('alumnoId', 'padreId');
            $crud->unset_add();
            
            $output = $crud->render();
            
            $this->load->view('includes/header-escuela');
            $this->load->view('alumno/index', $output);
            $this->load->view('includes/footer');

        }
    }

/*========================================== GESTION DE DOCENTES ===========================================*/
    public function docentes(){
        if (!$this->session->userdata('validated') ||  $this->session->userdata('tipoUsuarioId') != 2 ) {
            redirect('login');
        } 
        else {        
      
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('docente');
            $crud->unset_add();
    
            $crud->set_relation('docenteId', 'docente', '{docenteId} - {nombre}');
            $crud->set_relation_n_n('materiaId', 'docente_materia', 'materia', 'docenteId', 'materiaId', 'materia');
            $crud->columns('nombre','materiaId');
            $crud->fields('docenteId', 'materiaId');

            $crud->callback_after_update(array($this, 'callback_docente_materia'));

            //$crud->fields('docenteId');
    
            $output = $crud->render();
            $this->load->view('includes/header-escuela');
            $this->load->view('docente/index', $output);
            $this->load->view('includes/footer');
        }

    }

    function callback_docente_materia($post_array,$primary_key) {
        $lol = $this->db->query("call procedure_docente_materia()");
        return true;
    }
/*========================================== GESTION DE GRUPOS ===========================================*/


    public function grupos(){
        if (!$this->session->userdata('validated') ||  $this->session->userdata('tipoUsuarioId') != 2 ) {
            redirect('login');
        } 
        else {

            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            //$crud->set_subject('Grupo');
            $crud->set_table('grupo');
      
            $crud->columns('claveGrupo','cicloEscolar','grado','alumnoId');
            $crud->fields('claveGrupo','cicloEscolar','grado','escuelaId','alumnoId','docente_materiaId'); 
            $crud->change_field_type('escuelaId','invisible');
            //$crud->callback_add_field('escuelaId',array($this,'add_field_callback_1'));
            $crud->callback_before_insert(array($this,'set_escuela_id'));
            $crud->callback_after_insert(array($this, 'callback_grupo_docente_materia'));
            $crud->callback_after_update(array($this, 'callback_grupo_docente_materia'));

            $crud->set_relation_n_n('alumnoId', 'alumno_grupo', 'alumno', 'grupoId', 'alumnoId', 'nombre');
            $crud->set_relation_n_n('docente_materiaId', 'grupo_docente_materia', 'docente_materia', 'grupoId', 'docente_materiaId', '{nombreMateria} - {nombre}');      
            $output = $crud->render();

            $this->load->view('includes/header-escuela');
            $this->load->view('grupo/index', $output);
            $this->load->view('includes/footer');
        }
    }

    function set_escuela_id($post_array){  
        $post_array['escuelaId'] = $this->session->userdata('usuarioId');
        return $post_array;
     }


    function callback_grupo_docente_materia($post_array,$primary_key) {
        $lol = $this->db->query("call procedure_grupo_docente_materia()");
        return true;
    }


/*=============================    GESTION DE ESCUELAS SOLO SUPER ADMIN ============================*/

    public function escuelas(){

        if (!$this->session->userdata('validated') || $this->session->userdata('tipoUsuarioId') != 1 ) {
            redirect('login');
        } 
        else {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_subject('escuela');
            $crud->set_table('escuela');        

            $crud->columns('escuela','claveEscuela', 'turno' );
            $crud->fields('escuela', 'claveEscuela','turno', 'descEscuela', 'adicional');
            //$crud->set_relation('administradorId', 'usuario', 'usuarioId');
            //$crud->display_as('administradorId','Administrador Escuela');

            $crud->add_action('Contacto','', 'contacto_escuela/index/edit', 'ui-icon-plus');
            $crud->add_action('Domicilio','', 'domicilio_escuela/index/edit', 'ui-icon-plus');
            //$crud->add_action('Contacto','', '', 'ui-icon-plus', array($this, '_idContacto'));
            //$crud->add_action('Domicilio','', '', 'ui-icon-plus', array($this, '_idDomicilio'));

            $crud->unset_add();

            $output = $crud->render();
            
            $this->load->view('includes/header-sa');
            $this->load->view('escuela/index',$output);
            $this->load->view('includes/footer');
        }
    }

/*=============================    GESTION DE MATERIAS SOLO SUPER ADMIN ============================*/

    public function materias() {
        if (!$this->session->userdata('validated') ||  $this->session->userdata('tipoUsuarioId') != 2 ) {
            redirect('login');
        } else {

        $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_subject('Materia');
            $crud->set_table('materia');


            $crud->columns('matriculaMateria','materia');
            $crud->fields('matriculaMateria','materia'); 

            $crud->display_as('matriculaMateria','Matricula');        

            /*$crud->unset_delete();
            $crud->unset_add_fields();
            $crud->unset_add();
            $crud->unset_export();
            $crud->unset_print();*/
            //$crud->unset_list();

            $output = $crud->render();

            $this->load->view('includes/header-docente');
            $this->load->view('materia/index', $output);
            $this->load->view('includes/footer');

        }
    }

}

?>