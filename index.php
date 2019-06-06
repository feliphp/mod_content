<?php
  /**
   * Fecha:  2019-05-29 - Update: 2019-05-31
   * PHP Version 7
   * 
   * @category   Components
   * @package    Moodle
   * @subpackage Mod_Itcontent
   * @author     JFHR <felsul@hotmail.com>
   * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
   * @link       https://aulavirtual.issste.gob.mx
   */

require_once dirname(dirname(dirname(__FILE__))).'/config.php';
require_once dirname(__FILE__).'/lib.php';
//
require_once $CFG->libdir.'/adminlib.php';
$contextid = optional_param('contextid', 0, PARAM_INT);
$openlink = optional_param('openlink', 0, PARAM_INT); 
$user = optional_param('user', 0, PARAM_INT); 
$returnurl = optional_param('returnurl', '', PARAM_LOCALURL);
$strname = get_string('itcontent', 'itcontent');
$idcontent = optional_param('idcontent', '', PARAM_TEXT); 
$arrayContent=array(
    array('id'=>'preguntas_frecuentes', 'access'=>'open'),
    array('id'=>'segundo', 'access'=>'close'),
);

$baseurl = new moodle_url('/mod/itcontent/index.php', null);
if ($contextid) {
    $context = context_system::instance();
} else {
    $context = context_system::instance();
}

$PAGE->set_url($CFG->wwwroot.'/mod/itcontent/index.php');


$joined=false;
if (isloggedin()) {
     // Contenido Restringido
    $joined=true;
} 
if ($idcontent != '' ) {
    $PAGE->requires->css('/mod/itcontent/styles.css');
    $PAGE->requires->css('/mod/itcontent/vendor/font-awesome/font-awesome.min.css');
    $body_title = str_replace("_", " ", $idcontent);
    $body_title = ucwords(strtolower($body_title));
    $PAGE->navbar->add($strname." | ".$body_title);
    $PAGE->set_context($context);
    $PAGE->set_pagelayout('admin');
    $PAGE->set_heading($site->fullname);
    $strorg = get_string('itcontent', 'itcontent');
    echo $PAGE->set_title($body_title);  
    echo $OUTPUT->header();  
    echo $OUTPUT->heading($body_title);  
    

    $clave = array_search($idcontent, array_column($arrayContent, 'id'));
    $permission_content = $arrayContent[$clave]['access'];
    if (($permission_content == 'close') && ($joined == false )) {
        echo get_string(
            'requireloginerror',
            'itcontent'
        )."<a href='".$CFG->wwwroot."'> Return</a>";
    } else {
        switch($idcontent){
        case'preguntas_frecuentes':
            include './content_html/'.$idcontent.'.html';
            echo '<script src="./content_html/js/preguntas_frecuentes.js"></script>';
            break;
        default:
            echo "Aqui va el contenido";
        }
        

    }
} else {
    $PAGE->navbar->add($strname);
    $PAGE->set_context($context);
    $PAGE->set_pagelayout('admin');
    $PAGE->set_heading($site->fullname);
    $strorg = get_string('itcontent', 'itcontent');
    echo $PAGE->set_title($strorg);  
    echo $OUTPUT->header();  
    echo $OUTPUT->heading($strname);  
    echo get_string(
        'requireidcontenterror',
        'itcontent'
    )."<a href='".$CFG->wwwroot."'> Return</a>";
}


    echo $OUTPUT->footer();
?>
