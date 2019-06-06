<?php
/**
 * Fecha:  2019-05-29 - Update: 2019-05-29
 * PHP Version 7
 * 
 * @category   Components
 * @package    Moodle
 * @subpackage Mod_Itcontent
 * @author     JFHR <felsul@hotmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link      
 */
defined('MOODLE_INTERNAL') || die;
/**
 * Backup_itcontent_activity_structure_step Class
 * 
 * @category Class
 * @package  Moodle
 * @author   JFHR <felsul@hotmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     
 */
class Backup_Itcontent_Activity_Structure_Step extends 
backup_activity_structure_step
{
    /**
     * Defines the backup structure of the module
     *
     * @return backup_nested_element
     */
    protected function defineStructure()
    {
        $userinfo = $this->get_setting_value('userinfo');
        $itcontent = new backup_nested_element(
            'itcontent', array('id'),
            array('name', 'intro', 'introformat', 'grade')
        );
        $itcontent->set_source_table(
            'itcontent',
            array('id' => backup::VAR_ACTIVITYID)
        );
        $itcontent->annotate_files(
            'mod_itcontent', 
            'intro', 
            null
        );
        return $this->prepare_activity_structure($itcontent);
    }
}
