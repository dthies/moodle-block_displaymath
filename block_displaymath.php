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

//require_once('../../config.php');
require_once("mathform.php");
global $DB;

//$courseid = optional_param('courseid', PARAM_INT);

class block_displaymath extends block_base {
    private $displaytype=0;
    public function init() {
        $this->title = get_string('displaymath', 'block_displaymath');
    }

public function get_content() {
    global $COURSE;
    if ($this->content !== null) {
      return $this->content;
    }


    $this->content  =  new stdClass;
    $this->content->footer='';

    if (get_config('block_displaymath')->requiretex) {
      // If TeX filter is disabled, do not add button.
      $context=$this->page->context;
      $filters = filter_get_active_in_context($context);
      if (!array_key_exists('tex', $filters)) {
        $this->displaytype=10;
        $this->content->text='';
        return $this->content;
      }
    }


    $mform = new displayoption_form(new moodle_url($this->page->url,array('courseid' => $COURSE->id)));
    //$mform = new displayoption_form(new moodle_url($this->page->url));
//Form processing and displaying is done here
    if ($fromform = $mform->get_data()) {
  //In this case you process validated data. $mform->get_data() returns data posted in form.
      if($fromform->displaytype){
        $this->displaytype=$fromform->displaytype;
        unset($fromform->submitbutton);
        //print_object($fromform);
        //$DB->insert_record('block_displaymath', $fromform);
        //if (!$DB->insert_record('block_displaymath', $fromform)) {
          //print_error('inserterror', 'block_displaymath');
        //}
      }
      else {$this->displaytype=0;}
    }

      $this->content->text = $mform->render();
 
    return $this->content;
  }
 function get_required_javascript() {
    global $PAGE;
    if($this->displaytype==10){
      $PAGE->requires->yui_module('moodle-block_displaymath-mathjax', 'M.block_displaymath.showSource');
      return;
    }
    if($this->displaytype/2!=4){
      $PAGE->requires->yui_module('moodle-block_displaymath-mathjax', 'M.block_displaymath.init'
                            ,array(array('displaytype'=>$this->displaytype))
                            );
    }
    if(get_config('block_displaymath')->mathjaxurl) {
        $this->page->requires->js( new moodle_url(get_config('block_displaymath')->mathjaxurl . '?config=TeX-MML-AM_HTMLorMML-full&delayStartupUntil=configured'),true);
    } else {
        $this->page->requires->js( new moodle_url('http://cdn.mathjax.org/mathjax/latest/MathJax.js' . '?config=TeX-MML-AM_HTMLorMML-full&delayStartupUntil=configured'),true);
    }

  }

 function has_config() {return true;}

  public function instance_allow_multiple() {
    return true;
  }

}   // Here's the closing bracket for the class definition
