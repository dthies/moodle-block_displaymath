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

M.block_displaymath = M.block_displaymath || {};
M.block_displaymath.showSource = function(){
        Y.all('.texrender').each(function(i){
            Y.one('body').insert('<span class="texsource" style="display: inline">\\['+i.getAttribute('alt')+'\\]</span> ',i.ancestor());
            i.setStyle('display','none');
        });
};
M.block_displaymath.init = function(params){
    MathJax.Hub.Config({
        tex2jax: {
            inlineMath: [ ['$$','$$'], ['\\(','\\)'], ['%i','%i'] ],
            displayMath: [ ['\\[$ $$','$$ $\\]'], ['\\[','\\]'], ['%d','%d'] ]
        }
    });
    MathJax.Hub.Configured();
    if(params.dislpaytype/2===1){MathJax.Hub.setRenderer('MML');}
    if(params.dislpaytype/2===2){MathJax.Hub.setRenderer('SVG');}

    MathJax.Hub.Queue( function(){
        Y.all('.texrender').each(function(i){
            var texSrc = '\\('+i.getAttribute('alt')+'\\)';
            texSrc = texSrc.replace( /\\\(\$ \$\$(.*)\$\$ \$\\\)/, '\\[$1\\]');
            Y.one('body').insert(
                '<span class="texsource" style="display: none">'
                +texSrc
                +'</span> ',i.ancestor());
        });
    });
MathJax.Hub.Queue(['Typeset',MathJax.Hub]);
    MathJax.Hub.Queue(function(){
        Y.all('.texrender').each(function(i){
            i.setStyle('display','none');
        });
        Y.all('.texsource').each(function(i){
            i.setStyle('display','inline');
        });
    });
};
