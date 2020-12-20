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
 * Settings that allow configuration of the list of tex examples in the equation editor.
 *
 * @package    atto_fontawesome
 * @copyright  2021 michael pollak
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$ADMIN->add('editoratto', new admin_category('atto_fontawesome', new lang_string('pluginname', 'atto_fontawesome')));

$settings = new admin_settingpage('atto_fontawesome_settings', new lang_string('settings', 'atto_fontawesome'));
if ($ADMIN->fulltree) {

    $default = 'camera-retro, exclamation-circle, pencil';
    $settings->add(
        new admin_setting_configtextarea('atto_fontawesome/icons',
                'FontAwesome', 'Add the icons you want your users to see.', $default, PARAM_TEXT));

}
