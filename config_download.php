<?php
/*=================================================
	Project: phpGedView
	File: config_download.php
	Author: John Finlay
	Comments:
		Download config files that could not be saved.

	phpGedView: Genealogy Viewer
    Copyright (C) 2002 to 2003  John Finlay and Others

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
    
===================================================*/
# $Id: config_download.php,v 1.2 2006/01/09 00:46:23 skenow Exp $

require "config.php";
require $PGV_BASE_DIRECTORY.$confighelpfile["english"];
if (file_exists($PGV_BASE_DIRECTORY.$confighelpfile[$LANGUAGE])) require $PGV_BASE_DIRECTORY.$confighelpfile[$LANGUAGE];

if ((adminUserExists()&&!userIsAdmin(getUserName()))&&$CONFIGURED) {
	header("Location: admin.php");
	exit;
}

if (empty($file)) $file="config.php";

header("Content-Type: text/plain");
header("Content-Disposition: attachment; filename=$file");

print $_SESSION[$file];
print "\r\n";

?>