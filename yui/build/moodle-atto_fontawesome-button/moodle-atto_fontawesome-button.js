YUI.add('moodle-atto_fontawesome-button', function (Y, NAME) {

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

/*
 * @package    atto_fontawesome
 * @copyright  2021 michael pollak
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * @module moodle-atto_fontawesome-button
 */

var COMPONENTNAME = 'atto_fontawesome',
    CSS = {
        EMOTE: 'atto_fontawesome_emote',
        MAP: 'atto_fontawesome_map'
    },
    SELECTORS = {
        EMOTE: '.atto_fontawesome_emote'
    },
    TEMPLATE = '' +
            '<div class="{{CSS.MAP}}">' +
                '<ul>' +
                    '{{#each fontawesomes}}' +
                        '<li>' +
                            '<a href="#" class="{{../CSS.EMOTE}}" data-text="{{text}}">' +
                            '{{{icon}}}' +
                            '</a>' +
                        '</li>' +
                    '{{/each}}' +
                '</ul>' +
            '</div>';

/**
 * Atto text editor fontawesome plugin.
 *
 * @namespace M.atto_fontawesome
 * @class button
 * @extends M.editor_atto.EditorPlugin
 */

Y.namespace('M.atto_fontawesome').Button = Y.Base.create('button', Y.M.editor_atto.EditorPlugin, [], {

    /**
     * A reference to the current selection at the time that the dialogue
     * was opened.
     *
     * @property _currentSelection
     * @type Range
     * @private
     */
    _currentSelection: null,

    initializer: function() {
        this.addButton({
            // Define the logo here, I feel a paintbrush looks cool.
            icon: 'e/text_color_picker',
            callback: this._displayDialogue
        });
    },

    /**
     * Display the Emoticon chooser.
     *
     * @method _displayDialogue
     * @private
     */
    _displayDialogue: function() {
        // Store the current selection.
        this._currentSelection = this.get('host').getSelection();
        if (this._currentSelection === false) {
            return;
        }

        var dialogue = this.getDialogue({
            headerContent: "FontAwesome Icons",
            focusAfterHide: true
        }, true);

        // Set the dialogue content, and then show the dialogue.
        dialogue.set('bodyContent', this._getDialogueContent())
                .show();
    },

    /**
     * Insert the fontawesome.
     *
     * @method _insertEmote
     * @param {EventFacade} e
     * @private
     */
    _insertEmote: function(e) {
        var target = e.target.ancestor(SELECTORS.EMOTE, true),
            host = this.get('host');

        e.preventDefault();

        // Hide the dialogue.
        this.getDialogue({
            focusAfterHide: null
        }).hide();

        // Build the Emoticon text.
        var html = ' ' + target.getData('text') + ' ';

        // Focus on the previous selection.
        host.setSelection(this._currentSelection);

        // And add the character.
        host.insertContentAtFocusPoint(html);

        this.markUpdated();
    },

    /**
     * Generates the content of the dialogue, attaching event listeners to
     * the content.
     *
     * @method _getDialogueContent
     * @return {Node} Node containing the dialogue content
     * @private
     */
    _getDialogueContent: function() {
        var template = Y.Handlebars.compile(TEMPLATE),
            content = Y.Node.create(template({
                fontawesomes: this.get('fontawesomes'),
                CSS: CSS
            }));
        content.delegate('click', this._insertEmote, SELECTORS.EMOTE, this);
        // content.delegate('key', this._insertEmote, '32', SELECTORS.EMOTE, this);

        return content;
    }
}, {
    ATTRS: {
        /**
         * The list of fontawesomes to display.
         *
         * @attribute fontawesomes
         * @type array
         * @default {}
         */
        fontawesomes: {
            value: {}
        }
    }
});


}, '@VERSION@', {"requires": ["moodle-editor_atto-plugin"]});
