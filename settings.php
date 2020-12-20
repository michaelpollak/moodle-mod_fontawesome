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

    $default = 'envelope-o, user-circle, user-circle-o, user-o, handshake-o, calculator, caret-square-o-right, comment-o, ';
    $default .= 'comments-o, eye, bolt, graduation-cap, thumbs-o-up, hourglass-half, film, pencil-square-o, calendar, check-square-o, ';
    $default .= 'handshake-o, inbox, plus-square-o, wrench, smile-o, bomb, hand-o-right, hand-o-left, user, paperclip, floppy-o, ';
    $default .= 'file-text-o, arrow-circle-o-left, arrow-circle-o-right, arrow-circle-o-up, arrow-circle-o-down, caret-square-o-down, ';
    $default .= 'caret-square-o-up, youtube-play, rocket, thumbs-o-down, lightbulb-o, info, gift exclamation, exclamation-circle, cogs, ';
    $default .= 'bullhorn, users, download, folder-o, folder-open-o, headphones, hourglass-half, lightbulb-o, save, sun-o, thumbs-up, thumbs-down, users, user';
    $settings->add(
        new admin_setting_configtextarea('atto_fontawesome/icons',
                'FontAwesome', 'Add the icons you want your users to see.', $default, PARAM_TEXT));

}
