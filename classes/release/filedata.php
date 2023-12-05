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
 * @copyright  2017-2023 Educational Technologies, Graz, University of Technology
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_oer\release;

use local_oer\modules\element;
use local_oer\identifier;

class filedata extends \releasedata {
    public function __construct(int $courseid, \local_oer\modules\element $element, \stdClass $elementinfo) {
        parent::__construct($courseid, $element, $elementinfo);
        global $CFG;

        $decomposed = identifier::decompose($element->get_identifier());
        $contenthash = $decomposed->value;
        $publicurl = $CFG->wwwroot . '/pluginfile.php/' .
                $this->context->id . '/local_oer/public/' .
                $elementinfo->id . '/' . $contenthash;
        $this->metadata['contenthash'] = $contenthash; // Field for backwards compatibility.
        $this->metadata['fileurl'] = $publicurl; // Field for backwards compatibility.
        $this->metadata['source'] = $publicurl; // Overwrite parent field source.
    }
}