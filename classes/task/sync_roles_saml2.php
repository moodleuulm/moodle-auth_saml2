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
 * Auth plugin "LDAP SyncPlus" - Task definition
 *
 * @package    auth_ldap_syncplus
 * @copyright  2014 Alexander Bias, Ulm University <alexander.bias@uni-ulm.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace auth_saml2\task;

/**
 * The auth_ldap_syncplus scheduled task class for LDAP roles sync
 *
 * @package    auth_ldap_syncplus
 * @copyright  2014 Alexander Bias, Ulm University <alexander.bias@uni-ulm.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class sync_roles_saml2 extends \core\task\scheduled_task {

    /**
     * Return localised task name.
     *
     * @return string
     */
    public function get_name() {
        return "Synchronisierung von LDAP-Nutzerrollen saml2-Nutzerkonten (Saml2)";
    }

    /**
     * Execute scheduled task
     *
     * @return boolean
     */
    public function execute() {
        global $DB;
        if (is_enabled_auth('saml2')) {
            $auth = get_auth_plugin('ldap_syncplus');
            $users = $DB->get_records('user', ['auth' => 'saml2']);
            foreach ($users as $user) {
                $auth->sync_roles($user);
            }
        }
    }

}
