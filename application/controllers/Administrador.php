<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Administrador extends CI_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->load->model('administrador_model', '', TRUE);
    }
    public function login()
    {
        $usuario =  $this->input->post('usuario');
        $contrasena = $this->input->post('contrasena');
        if ($this->ion_auth->login($usuario, $contrasena, false) && $this->ion_auth->is_admin()) {
            redirect('Administrador/Inicio');
        } else {
            $this->session->set_flashdata('mensaje', 'Usuario o Contraseña incorrecta intentalo de nuevo');
            redirect('/Inicio');
        }
    }
    public function logout()
    {

        $this->ion_auth->logout();
        redirect('/Inicio');
    }
    public function Inicio()
    {
        if ($this->ion_auth->logged_in()) {
            $data['usuario'] = $this->ion_auth->user()->row();
            if ($this->administrador_model->ObtenerAlbums() != false) {
                $data['albums'] = $this->administrador_model->ObtenerAlbums();
            } else {
                $data['albums'] = array();
            }

            $this->load->view('administrador/Header', $data);
            $this->load->view('administrador/Styles');
            $this->load->view('administrador/NavBar');
            $this->load->view('administrador/Inicio');
            $this->load->view('publico/Footer');
            $this->load->view('administrador/Scripts');
        } else {
            $this->session->set_flashdata('mensaje', 'Necesitas Iniciar Sesion');
            redirect('/Inicio');
        }
    }

    public function AgregarAlbum()
    {
        if ($this->ion_auth->logged_in()) {
            $NombreAlbum = $this->input->post('nombre_album');
            $DescripcionAlbum = $this->input->post('descripcion_album');
            if (empty($NombreAlbum) || empty($DescripcionAlbum)) {
                $this->session->set_flashdata('mensaje', "Todos los campos son obligatorios");
                redirect('/Administrador/Inicio');
            } else {
                $obj = array(
                    "nombre" => $NombreAlbum,
                    "descripcion" => $DescripcionAlbum
                );
                if ($this->administrador_model->AgregarAlbum($obj) != false) {
                    $this->session->set_flashdata('mensaje', "Album Agregado Correctamente");
                    redirect('/Administrador/Inicio');
                } else {
                    $this->session->set_flashdata('mensaje', "Error al Agregar el Album");
                    redirect('/Administrador/Inicio');
                }
            }
        } else {
            $this->session->set_flashdata('mensaje', "Necesita Iniciar Sesión");
            redirect('/Inicio');
        }
    }
    public function EliminarAlbum()
    {
        $IdAlbum = $this->input->post('id_album');

        if ($this->ion_auth->logged_in()) {
            if ($this->administrador_model->EliminarAlbum($IdAlbum)) {
                $this->session->set_flashdata('mensaje', "Colección Eliminada Correctamente");
                redirect('/Administrador/Inicio');
            } else {
                $this->session->set_flashdata('mensaje', "Error al Eliminar la Colección");
                redirect('/Administrador/Inicio');
            }
        } else {
            $this->session->set_flashdata('mensaje', "Necesita Iniciar Sesión");
            redirect('/Inicio');
        }
    }
    public function VerAlbum($id)
    {


        if ($this->ion_auth->logged_in()) {
            $data['usuario'] = $this->ion_auth->user()->row();
            $data['id'] = $id;
            if (is_numeric($id) &&  $this->administrador_model->EncontrarAlbum($id) != false) {
                $data['album'] = $this->administrador_model->EncontrarAlbum($id);
                $data['fotos'] = $this->administrador_model->ObtenerFotos($id);
            } else {
                $this->session->set_flashdata('mensaje', "No se Encuentra el Album");
                redirect('/Administrador/Inicio');
            }

            $this->load->view('administrador/Header', $data);
            $this->load->view('administrador/Styles');
            $this->load->view('administrador/NavBar');
            $this->load->view('administrador/Coleccion', $data);
            $this->load->view('publico/Footer');
            $this->load->view('administrador/Scripts');
        } else {
            $this->session->set_flashdata('mensaje', "Necesita Iniciar Sesión");
            redirect('/Inicio');
        }
    }
    public function AgregarFoto()
    {
        if ($this->ion_auth->logged_in()) {
            $IdAlbum = $this->input->post('id_album');
            $Titulo = $this->input->post('titulo');
            $Descripcion = $this->input->post('descripcion');
            $TipoRecurso = $this->input->post('tipo_recurso');
            $Archivo = $_FILES['archivo']['name'];
            if (empty($IdAlbum) || empty($Titulo) || empty($Descripcion) || empty($Archivo)) {
                $this->session->set_flashdata('mensaje', "Todos los campos son obligatorios");
                redirect('/Administrador/Album/' . $IdAlbum);
            } else {

                $config['upload_path'] = './uploads/multimedia/';
                $config['allowed_types'] = '*';
                $config['max_size'] = '0'; // max_size in kb
                $config['file_name'] = $_FILES['archivo']['name'];
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('archivo')) {
                    $this->session->set_flashdata('mensaje', "Error al Subir el Archivo");
                    redirect('/Administrador/Album/' . $IdAlbum);
                    //echo $this->upload->display_errors();
                } else {
                    $data['uploadSuccess'] = $this->upload->data();
                    $obj = array(
                        "titulo" => $Titulo,
                        
                        "descripcion" => $Descripcion,
                        
                        "tipo_recurso" => $TipoRecurso,
                        "nombre_recurso" => $data['uploadSuccess']['file_name'],
                        "id_album" => $IdAlbum

                    );
                    if ($this->administrador_model->AgregarFoto($obj)) {
                        $this->session->set_flashdata('mensaje', "Foto Agregada Exitosamente");
                        redirect('/Administrador/Album/' . $IdAlbum);
                    } else {
                        $this->session->set_flashdata('mensaje', "Error al Agregar la Foto");
                        redirect('/Administrador/Album/' . $$IdAlbum);
                    }
                }
            }
        } else {
            $this->session->set_flashdata('mensaje', "Necesita Iniciar Sesión");
            redirect('/Inicio');
        }
    }
    public function EliminarFoto()
    {
        $IdFoto = $this->input->post('id_foto');
        $IdAlbum = $this->input->post('id_album');
        if ($this->ion_auth->logged_in()) {
            if ($this->administrador_model->EliminarFoto($IdFoto)) {
                $this->session->set_flashdata('mensaje', "Foto Eliminada Correctamente");
                redirect('/Administrador/Album/' . $IdAlbum);
            } else {
                $this->session->set_flashdata('mensaje', "Error al Eliminar la Foto");
                redirect('/Administrador/Album/' . $IdAlbum);
            }
        } else {
            $this->session->set_flashdata('mensaje', "Necesita Iniciar Sesión");
            redirect('/Inicio');
        }
    }
}
