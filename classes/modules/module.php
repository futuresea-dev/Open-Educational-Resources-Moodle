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
 * Open Educational Resources Plugin
 *
 * @package    local_oer
 * @author     Christian Ortner <christian.ortner@tugraz.at>
 * @copyright  2023 Educational Technologies, Graz, University of Technology
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_oer\modules;

/**
 * Interface for module sub-plugins
 *
 * All module sub-plugins must implement this interface.
 */
interface module {
    /**
     * Returns all elements a sub-plugin can deliver.
     *
     * @param int $courseid Moodle courseid
     * @return elements
     */
    public function load_elements(int $courseid): \local_oer\modules\elements;

    /**
     * Returns an array of writable fields with language string notation.
     * Returns empty array [] if no fields can be written.
     *
     * This is used on GUI to inform the user that saving the metadata will also
     * affect the source itself.
     *
     * Example: [
     *   ['stringname', 'component'],
     *   ['license', 'moodle'],
     *   ['name', 'local_oer'],
     * ]
     *
     * @return array
     */
    public function writable_fields(): array;

    /**
     * Write the writable fields of a single element back to its source.
     *
     * @param \local_oer\modules\element $element
     * @return void
     */
    public function write_to_source(\local_oer\modules\element $element): void;
}
