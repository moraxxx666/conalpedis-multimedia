<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Administrador_model extends CI_Model
{
    public function AgregarAlbum($album)
    {
        if ($this->db->insert('multimedia_album', $album)) {
            return true;
        } else return false;
    }
    public function ObtenerAlbums()
    {
        $query = $this->db->query("SELECT * FROM multimedia_album");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else return false;
    }
    public function EliminarAlbum($id)
    {
        if ($this->EncontrarAlbum($id) != false) {
            if ($this->db->delete('multimedia_album', array('id_album' => $id))) {
                return true;
            } else return false;
        } else return false;
    }
    public function EncontrarAlbum($id)
    {
        $query = $this->db->query("SELECT * FROM multimedia_album n WHERE n.id_album = $id");
        if ($query->num_rows() === 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function AgregarFoto($foto){
        if ($this->db->insert('multimedia_fotos', $foto)) {
            return true;
        } else return false;
    }
    public function ObtenerFotos($id)
    {
        $query = $this->db->query("SELECT * FROM multimedia_fotos WHERE id_album = $id");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else return array();
    }
    public function EncontrarFoto($id)
    {
        $query = $this->db->query("SELECT * FROM multimedia_fotos n WHERE n.id_foto = $id");
        if ($query->num_rows() === 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function EliminarFoto($id)
    {
        if ($this->EncontrarFoto($id) != false) {
            if ($this->db->delete('multimedia_fotos', array('id_foto' => $id))) {
                return true;
            } else return false;
        } else return false;
    }
}
