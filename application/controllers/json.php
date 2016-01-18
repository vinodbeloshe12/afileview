<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Json extends CI_Controller
{function getallfile_upload()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`afile_file_upload`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`afile_file_upload`.`cdate`";
$elements[1]->sort="1";
$elements[1]->header="cdate";
$elements[1]->alias="cdate";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`afile_file_upload`.`pdf`";
$elements[2]->sort="1";
$elements[2]->header="pdf";
$elements[2]->alias="pdf";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`afile_file_upload`.`current_time`";
$elements[3]->sort="1";
$elements[3]->header="current_time";
$elements[3]->alias="current_time";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `afile_file_upload`");
$this->load->view("json",$data);
}
public function getsinglefile_upload()
{
$id=$this->input->get_post("id");
$data["message"]=$this->file_upload_model->getsinglefile_upload($id);
$this->load->view("json",$data);
}
} ?>
