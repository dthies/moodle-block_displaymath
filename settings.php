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
 * Displaymath settings.
 *
 * @package   block_displaymath
 * @copyright 2014 Daniel Thies <dthies@ccal.edu>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

    $settings->add(new admin_setting_heading(
            'headerconfig',
            get_string('headerconfig', 'block_displaymath'),
            get_string('descconfig', 'block_displaymath')
        ));
    $settings->add(new admin_setting_configcheckbox(
            'block_displaymath/requiretex',
            get_string('requiretex', 'block_displaymath'), 
            get_string('requiretex_desc', 'block_displaymath'), 0
        ));
    $settings->add(new admin_setting_configtext('block_displaymath/mathjaxurl',
            get_string('mathjaxurl', 'block_displaymath'), 
            get_string('mathjaxurl_desc', 'block_displaymath'),
            'http://cdn.mathjax.org/mathjax/latest/MathJax.js', PARAM_RAW
        ));


