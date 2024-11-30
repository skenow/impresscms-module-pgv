<?php
/**
 * PHP GEDView version information
 *
 * The module=specific installation and upgrade procedure for this module
 *
 * @copyright 2007, The ImpressCMS Project, <https://www.impresscms.org/>
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author Steve Kenow
 * @package pgv
 *
 */
function icms_module_install_pgv($module){
	return true;
}

function icms_module_uninstall_pgv($module){
	return true;
}

function icms_module_update_pgv($module, $oldversion){
	switch ($oldversion) {
		case 100:
		{
			// reserved for future use :)
			break;
		}
	}
}
