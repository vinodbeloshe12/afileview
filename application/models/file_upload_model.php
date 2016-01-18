<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class file_upload_model extends CI_Model
{

function getsinglefile_upload($id){
$this->db->where("id",$id);
$query=$this->db->get("afile_file_upload")->row();
return $query;
}

function getlast_upload(){
  $query=$this->db->query("SELECT `pdf` FROM `afile_file_upload` order by id desc")->row();
  return $query;
}




}
?>
