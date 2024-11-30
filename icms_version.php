<?php
/**
 * PHP GEDView version information
 *
 * The configuration information of this module
 *
 * @copyright 2007, The ImpressCMS Project, <https://www.impresscms.org/>
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author Steve Kenow
 * @package pgv
 *
 */

$modversion = array(
	'name' => 'PHPGedView',
	'version' => '2.0.0',
	'status' => 'Beta',
	'description' => 'PhpGedView is a revolutionary genealogy program which allows you to view and edit your genealogy on your website.',
	'credits' => 'John Finlay & Others (http://www.PhpGedView.net/)',
	'author' => 'Steve Kenow, Patrick Kellum',
	'help' => '',
	'license' => 'GNU General Public License (GPL) see LICENSE',
	'official' => 0,
	'image' => 'pgv_slogo.png',
	'dirname' => basename(__DIR__),
	'onInstall' => 'icms_install_funcs.php',
	'onUninstall' => 'icms_install_funcs.php',
	'onUpdate' => 'icms_install_funcs.php');

// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";

// Tables created by sql file (without prefix!)
$modversion['tables'] = array(
	'pgv_blocks', 
	'pgv_dates', 
	'pgv_families', 
	'pgv_favorites', 
	'pgv_individuals', 
	'pgv_messages', 
	'pgv_names', 
	'pgv_news', 
	'pgv_other', 
	'pgv_placelinks', 
	'pgv_places', 
	'pgv_sources', 
	'pgv_users', 
	'pgv_media', 
	'pgv_media_mapping', 
	'pgv_tblver');

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin.php';
$modversion['adminmenu'] = 'icms_adminmenu.php';

// Menu
$modversion['hasMain'] = 1;
$modversion['sub'][1]['name'] = 'Welcome Page';
$modversion['sub'][1]['url'] = 'index.php?command=gedcom';
$modversion['sub'][2]['name'] = 'MyGedView Portal';
$modversion['sub'][2]['url'] = 'index.php?command=user';

// Smarty
$modversion['use_smarty'] = 1;
