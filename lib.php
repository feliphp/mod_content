<?php
/**
 * Fecha: 2019-05-29 - Update: 2019-05-29
 * PHP Version 7
 * 
 * @category   Components
 * @package    Moodle
 * @subpackage Mod_Itcontent
 * @author     JFHR <felipe.herrera@iteraprocess.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://aulavirtual.issste.gob.mx
 */
require_once dirname(dirname(dirname(__FILE__))).'/config.php';

defined('MOODLE_INTERNAL') || die();

/**
 * Get username
 * 
 * @param int $id id user
 * 
 * @return string
 */
function Itcontent_Get_username($id)
{
    global $DB;
    $query ="SELECT username FROM {user} WHERE id = ".$id."";
    $result_string = $DB->get_record_sql($query);
    return $result_string->username;
}
