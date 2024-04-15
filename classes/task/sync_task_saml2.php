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
 * Auth plugin "Saml2" - Task definition
 *
 * @package    auth_saml2
 * @copyright  2025 Alina Antonova, Ulm University <alina.antonova@uni-ulm.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace auth_saml2\task;

/**
 * The auth_saml2 scheduled task class for Saml2 user sync
 *
 * @package    auth_saml2
 * @copyright  2025 Alina Antonova, Ulm University <alina.antonova@uni-ulm.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class sync_task_saml2 extends \core\task\scheduled_task {

    /**
     * Return localised task name.
     *
     * @return string
     */
    public function get_name() {
        return 'Synchronisierung von LDAP für saml2-Nutzerkonten (Saml2)';
    }

    /**
     * Execute scheduled task
     *
     * @return boolean
     */
    public function execute() {
        global $CFG;
        if (is_enabled_auth('ldap_syncplus') and is_enabled_auth('saml2')) {
            $auth_saml2 = get_auth_plugin('saml2');
            //$auth_saml2->auth_update_ldap_syncplus_for_saml2(); //TODO einschalten, wenn Saml2 in betrieb genommen wird
            //$auth = get_auth_plugin('ldap_syncplus');
            //$auth->authtype = 'saml2';
            //$auth->sync_users(true);
        }
    }

}
