<?php
/**
* 
*/
class Model_upload_video extends CI_Model
{
	function insert_video($data='', $id='')
    {
        $this->db->insert('db_list_video', $data);
        
    }
  	
    function insert_berita($data='', $id='')
    {
        if ($id) 
        {
            $this->db->where('id', $id);
            $this->db->update('berita', $data);
        } else {
            $this->db->insert('berita', $data);
        }
    }

    function view_video()
    {
        return $this->db->query("SELECT * FROM db_list_video")->result();
    }

    function view_nm_video()
    {
        return $this->db->query("SELECT nama_video FROM db_list_video")->result();
    }

    function update_status_by_id($id='',$cond)
    {
        return $this->db->query("UPDATE db_list_video SET tampil='$cond' WHERE id = '$id' ");
    }

    function view_status_by_id($id='')
    {
        return $this->db->query("SELECT * FROM db_list_video WHERE id='$id'")->row();
    }



    function delete($id,$video)
    {
        $this->db->where('id', $id);
        $this->db->delete('db_list_video');
        unlink('./assets/video/'.$video);
        
    }   
}

?>