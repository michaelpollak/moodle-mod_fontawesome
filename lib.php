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
 * Atto text editor fontawesome plugin lib.
 *
 * @package    atto_fontawesome
 * @copyright  2021 michael pollak
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Initialise the strings required for JS.
 *
 * @return void
 */
function atto_fontawesome_strings_for_js() {
    global $PAGE;
    $PAGE->requires->strings_for_js(array('insertfontawesome'), 'atto_fontawesome');
}

/**
 * Sends the parameters to JS module.
 *
 * @return array
 */
function atto_fontawesome_params_for_js($elementid, $options, $fpoptions) {

    $setting = get_config('atto_fontawesome', 'icons');
    $setting = explode(", ", $setting);

    $icons = array();

    foreach ($setting as $i => &$icon) {
        $icons[$i]['text'] = '<class class="fa fa-' . $icon . '"></class>'; // This is the code that gets inserted.
        $icons[$i]['icon'] = '<class class="fa fa-' . $icon . '  fa-2x"></class>';
        // This is the image graphic for the display, keep separated in case we need it later.
    }
/*
$icons = array();
$icons[0]['text'] = '<i class="fa fa-pencil"></i>'; // This is the code that gets inserted.
$icons[1]['text'] = '<i class="fa fa-pencil"></i>'; // This is the code that gets inserted.
$icons[0]['image'] = '<i class="fa fa-pencil"></i>'; // This is the code that gets inserted.
$icons[1]['image'] = '<i class="fa fa-pencil"></i>'; // This is the code that gets inserted.
*/
    return array(
        'fontawesomes' =>  $icons
    );
}
