<?php
/**
 * Interface to review/accept/reject changes made by editing online.
 *
 * phpGedView: Genealogy Viewer
 * Copyright (C) 2002 to 2003  John Finlay and Others
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @package PhpGedView
 * @subpackage Edit
 * @version $Id: edit_changes.php,v 1.1 2005/10/07 18:08:01 skenow Exp $
 */

require "config.php";
require "includes/functions_edit.php";
require $INDEX_DIRECTORY."pgv_changes.php";
require($PGV_BASE_DIRECTORY.$factsfile["english"]);
if (file_exists($PGV_BASE_DIRECTORY . $factsfile[$LANGUAGE])) require $PGV_BASE_DIRECTORY . $factsfile[$LANGUAGE];

if (!userCanAccept(getUserName())) {
	header("Location: login.php?url=edit_changes.php");
	exit;
}

if (empty($action)) $action="";

print_simple_header($pgv_lang["review_changes"]);
print "<script language=\"JavaScript\" type=\"text/javascript\">\n";
print "		function show_gedcom_record(xref) {\n";
print "			var recwin = window.open(\"gedrecord.php?fromfile=1&pid=\"+xref, \"\", \"top=50,left=50,width=300,height=400,scrollbars=1,scrollable=1,resizable=1\");\n";
print "		}\n";
?>
	function show_diff(diffurl) {
		window.opener.location = diffurl;
		return false;
	}
<?php
print "</script>\n";
print "<div><center>\n";
print "<span class=\"subheaders\">";
print $pgv_lang["review_changes"];
print "</span><br /><br />\n";

if ($action=="undo") {
	if (undo_change($cid, $index)) {
		print "<br /><br /><b>";
		print $pgv_lang["undo_successful"];
		print "</b><br /><br />";
	}
}
if ($action=="undoall") {
	//-- alert that we only want to save the file once
	$manual_save = true;
	$temp_changes = $pgv_changes;
	if ($PGV_DATABASE=="index") {
		setup_database(1);
		empty_database($ged);
		foreach($temp_changes as $cid=>$changes) {
			$change = $changes[0];
			if ($change["gedcom"]==$ged) undo_change($cid, 0);
		}
		cleanup_database();
		write_changes();
	}
	else {
		foreach($temp_changes as $cid=>$changes) {
			$change = $changes[0];
			if ($change["gedcom"]==$ged) undo_change($cid, 0);
		}
	}
	write_file();
	$manual_save = false;
	print "<br /><br /><b>";
	print $pgv_lang["undo_successful"];
	print "</b><br /><br />";
}

if ($action=="accept") {
	if (accept_changes($cid)) {
		print "<br /><br /><b>";
		print $pgv_lang["accept_successful"];
		print "</b><br /><br />";
	}
}
if ($action=="acceptall") {
	$temp_changes = $pgv_changes;
	if ($PGV_DATABASE=="index") {
		setup_database(1);
		empty_database($ged);
		foreach($temp_changes as $cid=>$changes) {
			for($i=0; $i<count($changes); $i++) {
				$change = $changes[$i];
				if ($change["gedcom"]==$ged) accept_changes($cid, true);
			}
		}
		cleanup_database();
		write_changes();
	}
	else {
		foreach($temp_changes as $cid=>$changes) {
			for($i=0; $i<count($changes); $i++) {
				$change = $changes[$i];
				if ($change["gedcom"]==$ged) accept_changes($cid);
			}
		}
	}
	print "<br /><br /><b>";
	print $pgv_lang["accept_successful"];
	print "</b><br /><br />";
}

if (count($pgv_changes)==0) {
	print "<br /><br /><b>";
	print $pgv_lang["no_changes"];
	print "</b>";
}
else {
	print "</center>";
	print $pgv_lang["accept_gedcom"];
	print "<center>";
	print "<br /><br /><table class=\"list_table\">";
	print "<tr><td class=\"list_value $TEXT_DIRECTION\">";
	$changedgedcoms = array();
	foreach($pgv_changes as $cid=>$changes) {
		for($i=0; $i<count($changes); $i++) {
			$change = $changes[$i];
			if ($i==0) {
				$changedgedcoms[$change["gedcom"]] = true;
				if ($GEDCOM != $change["gedcom"]) {
					$GEDCOM = $change["gedcom"];
				}
				$gedrec = find_record_in_file($change["gid"]);
				if (empty($gedrec)) $gedrec = $change["undo"];
				$ct = preg_match("/0 @(.*)@(.*)/", $gedrec, $match);
				if ($ct>0) $type = trim($match[2]);
				else $type = "INDI";
				if ($type=="INDI") print "<b>".PrintReady(get_person_name($change["gid"]))."</b> &lrm;(".$change["gid"].")&lrm;<br />\n";
				else if ($type=="FAM") print "<b>".PrintReady(get_family_descriptor($change["gid"]))."</b> &lrm;(".$change["gid"].")&lrm;<br />\n";
				else if ($type=="SOUR") print "<b>".PrintReady(get_source_descriptor($change["gid"]))."</b> &lrm;(".$change["gid"].")&lrm;<br />\n";
				else print "<b>".$factarray[$type]."</b> &lrm;(".$change["gid"].")&lrm;<br />\n";
				if ($type=="INDI") print "<a href=\"#\" onclick=\"return show_diff('individual.php?pid=".$change["gid"]."&amp;ged=".$change["gedcom"]."&amp;show_changes=yes');\">".$pgv_lang["view_change_diff"]."</a> | \n";
				if ($type=="FAM") print "<a href=\"#\" onclick=\"return show_diff('family.php?famid=".$change["gid"]."&amp;ged=".$change["gedcom"]."&amp;show_changes=yes');\">".$pgv_lang["view_change_diff"]."</a> | \n";
				if ($type=="SOUR") print "<a href=\"#\" onclick=\"return show_diff('source.php?sid=".$change["gid"]."&amp;ged=".$change["gedcom"]."&amp;show_changes=yes');\">".$pgv_lang["view_change_diff"]."</a> | \n";
				print "<a href=\"javascript:show_gedcom_record('".$change["gid"]."');\">".$pgv_lang["view_gedcom"]."</a><br />";
				print "<div class=\"indent\">\n";
				print $pgv_lang["changes_occurred"]."<br />\n";
				print "<table class=\"list_table\">\n";
				print "<tr><td class=\"list_label\">".$pgv_lang["undo"]."</td>";
				print "<td class=\"list_label\">".$pgv_lang["accept"]."</td>";
				print "<td class=\"list_label\">".$pgv_lang["type"]."</td><td class=\"list_label\">".$pgv_lang["username"]."</td><td class=\"list_label\">".$pgv_lang["date"]."</td><td class=\"list_label\">GEDCOM</td></tr>\n";
			}
			if ($i==count($changes)-1) {
				print "<td class=\"list_value $TEXT_DIRECTION\"><a href=\"edit_changes.php?action=undo&amp;cid=$cid&amp;index=$i\">".$pgv_lang["undo"]."</a></td>";
				print "<td class=\"list_value $TEXT_DIRECTION\"><a href=\"edit_changes.php?action=accept&amp;cid=$cid\">".$pgv_lang["accept"]."</a></td>\n";
			}
			else {
				print "<td class=\"list_value $TEXT_DIRECTION\"><br /></td>";
				print "<td class=\"list_value $TEXT_DIRECTION\"><br /></td>";
			}
			print "<td class=\"list_value $TEXT_DIRECTION\"><b>".$pgv_lang[$change["type"]]."</b></td>\n";
			print "<td class=\"list_value $TEXT_DIRECTION\">".$change["user"]."</td>\n";
			print "<td class=\"list_value $TEXT_DIRECTION\"><span dir=\"ltr\">".get_changed_date(date("j M Y",$change["time"]))." ".date($TIME_FORMAT, $change["time"])."<span></td>\n";
			print "<td class=\"list_value $TEXT_DIRECTION\">".$change["gedcom"]."</td>\n";
			print "</tr>\n";
			if ($i==count($changes)-1) {
				print "</table>\n";
				print "</div><br />";
			}
		}
	}
	print "</td></tr></table>";
	
	//-- accept all
		print "<br /><br /><table class=\"list_table\"><tr><td class=\"list_label\">".$pgv_lang["accept_all"]."</td></tr><tr><td class=\"list_value\">";
		foreach($changedgedcoms as $ged=>$value) {
			print "<a href=\"edit_changes.php?action=acceptall&amp;ged=$ged\">$ged - ".$pgv_lang["accept_all"]."</a><br />\n";
		}
		print "</td></tr></table>";
}
print "<br /><br />\n</center></div>\n";
print "<center><a href=\"#\" onclick=\"if (window.opener.showchanges) window.opener.showchanges(); window.close();\">".$pgv_lang["close_window"]."</a><br /></center>\n";
print_simple_footer();
?>