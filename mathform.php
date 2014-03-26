<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Block for displaying mathematics using TeX filter and MathJax in cooperation
 *
 * @package    block_displaymath
 * @copyright  2014 onwards Daniel Thies <dthies@ccal.edu>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Daniel Thies <dthies@ccal.edu>
 */

require_once("$CFG->libdir/formslib.php");

class displayoption_form extends moodleform {

    //Add elements to form
    public function definition() {
        global $CFG;
 
        $mform = $this->_form; 

        $mform->addElement('html', 'Choose Mathemathics Display Method');

        $mform->addElement('select', 'displaytype', '', array(
            0=>'Default',
            2=>'HTML5',
            4=>'MathML',
            6=>'SVG',
            8=>'PNG',
            10=>'TeX Source',
        ) );
        $this->add_action_buttons($cancel = false);
   
    }
}
