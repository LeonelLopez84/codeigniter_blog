<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'controllers/admin/Home.php';

class Categorias extends Home {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('categoria_model');

		$this->body['form']=[
                            'accept-charset' =>  "UTF-8",
                            'role'          =>  "form",
                            ]; 

        $this->body['id']=[
                            'type'          => 'text',
                            'name'          => 'id',
                            'value'         => set_value('id'),
                            'class'         => 'form-control',
                            'placeholder'   => '0',
                            'id'            => 'id',
                            'disabled'       => 'disable'
                            ];
        $this->body['id_hidden']=[
                            'type'          => 'hidden',
                            'name'          => 'id_hidden',
                            'value'         => set_value('id_hidden'),
                            'class'         => 'form-control',
                            'placeholder'   => '0',
                            'id'            => 'id_hidden',
                            ];
		$this->body['name']=[
                            'type'          => 'text',
                            'name'          => 'name',
                            'value'			=> set_value('name'),
                            'class'         => 'form-control',
                            'placeholder'   => 'Name',
                            'id'            => 'name',
                            'maxlength'     => '100',
                            'size'          => '50'
                            ];

		 $this->body['enabled']=[
                            'type'          => 'checkbox',
                            'name'          => 'enabled',
                            'value'         => set_value('enabled'),
                            'id'            => 'enabled'
                            ];
        $this->body['submit']=[
                            'type'          => 'submit',
                            'name'          => 'submit',
                            'class'         => 'btn btn-success',
                            'id'            => 'submit',
                            'value'         => 'Create'
                            ];

	}

	public function index()
	{
		$this->body['categorias']=categoria_model::orderBy('name','ASC')->get();
		echo $this->templates->render('categorias/lista',$this->body);
	}

	public function nueva()
	{
		echo $this->templates->render('categorias/crear',$this->body);
	}

	public function editar($id=null)
	{
		if(!is_null($id)){

            $categoria=categoria_model::find($id);
            $this->body['id']['value']=$categoria->id;
            $this->body['id_hidden']['value']=$categoria->id;
            $this->body['name']['value']=$categoria->name;
            if((bool)$categoria->enabled){
            	$this->body['enabled']['checked']='checked';
        	}
        	$this->body['enabled']['value']=$categoria->enabled;
            $this->body['submit']['value']='Save';
            $this->body['submit']['class']='btn btn-info';

            echo $this->templates->render('categorias/editar',$this->body);
        }
	}

	public function create()
	{

		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE){

            echo $this->templates->render('categorias/crear',$this->body);	

		}else{

			$Categoria=new categoria_model;

			$Categoria->name=$this->input->post('name');

			$Categoria->save();

			redirect('admin/categorias/todas-las-categorias','refresh');
		}
	}

	public function update()
	{

        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE){

            echo $this->templates->render('categorias/editar',$this->body); 

        }else{

            $id=$this->input->post('id_hidden');

            $Categoria=categoria_model::find($id);
            $Categoria->name=$this->input->post('name');
            $Categoria->enabled=(empty($this->input->post('enabled')))?0:1;
            $Categoria->save();

           	redirect('admin/categorias/todas-las-categorias','refresh');

            }
        }

}

/* End of file Categorias.php */
/* Location: ./application/controllers/admin/Categorias.php */