<?
/**
* Blank 
*
*
* @package project
* @author Serge J. <jey@tut.by>
* @copyright http://www.smartliving.ru/ (c)
*/
//
//
class widget_rangeslider extends module {
/**
* blank
*
* Module class constructor
*
* @access private
*/
function widget_rangeslider() {
  $this->name="widget_rangeslider";
  //$this->title="Blank";
  //$this->module_category="<#LANG_SECTION_APPLICATIONS#>";
  $this->checkInstalled();
}
/**
* saveParams
*
* Saving module parameters
*
* @access public
*/
function saveParams() {
 $p=array();
 if (IsSet($this->id)) {
  $p["id"]=$this->id;
 }
 if (IsSet($this->view_mode)) {
  $p["view_mode"]=$this->view_mode;
 }
 if (IsSet($this->edit_mode)) {
  $p["edit_mode"]=$this->edit_mode;
 }
 if (IsSet($this->tab)) {
  $p["tab"]=$this->tab;
 }
 return parent::saveParams($p);
}
/**
* getParams
*
* Getting module parameters from query string
*
* @access public
*/
function getParams() {
  global $id;
  global $mode;
  global $view_mode;
  global $edit_mode;
  global $tab;
  if (isset($id)) {
   $this->id=$id;
  }
  if (isset($mode)) {
   $this->mode=$mode;
  }
  if (isset($view_mode)) {
   $this->view_mode=$view_mode;
  }
  if (isset($edit_mode)) {
   $this->edit_mode=$edit_mode;
  }
  if (isset($tab)) {
   $this->tab=$tab;
  }
}
/**
* Run
*
* Description
*
* @access public
*/
function run() {
 global $session;
  $out=array();
  if ($this->action=='admin') {
   $this->admin($out);
  } else {
   $this->usual($out);
  }
  if (IsSet($this->owner->action)) {
   $out['PARENT_ACTION']=$this->owner->action;
  }
  if (IsSet($this->owner->name)) {
   $out['PARENT_NAME']=$this->owner->name;
  }
  $out['VIEW_MODE']=$this->view_mode;
  $out['EDIT_MODE']=$this->edit_mode;
  $out['MODE']=$this->mode;
  $out['ACTION']=$this->action;
  if ($this->single_rec) {
   $out['SINGLE_REC']=1;
  }
  $this->data=$out;
  $p=new parser(DIR_TEMPLATES.$this->name."/".$this->name.".html", $this->data, $this);
  $this->result=$p->result;
}
/**
* BackEnd
*
* Module backend
*
* @access public
*/
function admin(&$out) {
}
/**
* FrontEnd
*
* Module frontend
*
* @access public
*/
function usual(&$out) {
 $this->admin($out);
 $min = $this->min;
 $max = $this->max;
 $val = $this->val;
 $prp1 = $this->prp1;
 $prp2 = $this->prp2;
 $obj = $this->obj;
 $step = $this->step;
  
 $out["RS"]["min"] = $min;
 $out["RS"]["max"] = $max;
 $out["RS"]["val"] = $val;
 $out["RS"]["obj"] = $obj;
 $out["RS"]["prp1"] = gg($obj.'.'.$prp1);
 $out["RS"]["prp2"] = gg($obj.'.'.$prp2);
 $out["RS"]["prp1_n"] = $prp1;
 $out["RS"]["prp2_n"] = $prp2;
 $out["RS"]["step"] = $step;
}
/**
* Install
*
* Module installation routine
*
* @access private
*/
 function install() {
  parent::install();
 }
// --------------------------------------------------------------------
}
?>