<?php
/**
 * Fecha:  2019-05-29 - Update: 2019-05-29
 * PHP Version 7
 * 
 * @category   Components
 * @package    Moodle
 * @subpackage Mod_Itcontent
 * @author     JFHR <felipe.herrera@iteraprocess.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://aulavirtual.issste.gob.mx
 */
namespace mod_itcontent\event;
defined('MOODLE_INTERNAL') || die();
/**
 * Course_module_viewed Class
 * 
 * @category Class
 * @package  Moodle
 * @author   JFHR <felipe.herrera@iteraprocess.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://aulavirtual.issste.gob.mx
 */
class Course_Module_Viewed extends \core\event\course_module_viewed
{
    /**
     * Function init 
     * 
     * @return null
     */
    protected function init() 
    {
        $this->data['objecttable'] = 'itcontent';
        parent::init();
    }
}