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

$string['pluginname'] = 'Choose Mathematics Display';
$string['displaymath'] = 'Choose Mathematics Display';
$string['displaytype'] = 'Mathematics Display';
$string['displaymath:addinstance'] = 'Add a block to choose method to display mathematics';
$string['displaymath:myaddinstance'] = 'Add block to choose method to display mathematics to the My Moodle page';
$string['headerconfig'] = 'Mathematics Display';
$string['descconfig'] = 'Mathematics Display';
$string['mathjaxurl'] = 'MathJax url';
$string['mathjaxurl_desc'] = 'The url for the MathJax.js file that display should load. The default downloads from the internet using http. If your site uses https use "https://c328740.ssl.cf1.rackcdn.com/mathjax/latest/MathJax.js" or better install a local copy.';
$string['requiretex'] = 'Require TeX filter';
$string['requiretex_desc'] = 'If enabled the Displaymath block will be visible only when the TeX filter. Disable if you want it to appear even if TeX filter is not used to load MathJax';
