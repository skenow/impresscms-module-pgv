<?php
/**
 * On This Day Events Block
 *
 * This block will print a list of today's events
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
 * $Id: upcoming_events.php,v 1.1 2005/10/07 18:08:13 skenow Exp $
 * @package PhpGedView
 * @subpackage Blocks
 */

$PGV_BLOCKS["print_upcoming_events"]["name"]        = $pgv_lang["upcoming_events_block"];
$PGV_BLOCKS["print_upcoming_events"]["descr"]        = $pgv_lang["upcoming_events_descr"];
$PGV_BLOCKS["print_upcoming_events"]["canconfig"]        = true;
$PGV_BLOCKS["print_upcoming_events"]["config"] = array("days"=>30);

//-- today's events block
//-- this block prints a list of today's upcoming events of living people in your gedcom
function print_upcoming_events($block=true, $config="", $side, $index) {
	global $pgv_lang, $month, $year, $day, $monthtonum, $HIDE_LIVE_PEOPLE, $SHOW_ID_NUMBERS, $command, $TEXT_DIRECTION, $SHOW_FAM_ID_NUMBERS;
	global $PGV_IMAGE_DIR, $PGV_IMAGES, $GEDCOM, $REGEXP_DB, $DEBUG, $ASC, $IGNORE_FACTS, $IGNORE_YEAR, $TOTAL_QUERIES, $LAST_QUERY, $PGV_BLOCKS;
	global $INDEX_DIRECTORY;

	$block = true;			// Always restrict this block's height
	
	if (empty($config)) $config = $PGV_BLOCKS["print_upcoming_events"]["config"];
	
	if ($command=="user") $filter = "living";
	else $filter = "all";
	
	$skipfacts = "CHAN,BAPL,SLGC,SLGS,ENDL";

	$daytext = "";
	$action = "upcoming";
	$dayindilist = array();
	$dayfamlist = array();
	$found_facts = array();
	$cache_load = false;

	if (($command=="user")&&isset($_SESSION["upcoming_events"][$command][$GEDCOM])&&(!isset($DEBUG)||($DEBUG==false))) {
		$found_facts = $_SESSION["upcoming_events"][$command][$GEDCOM];
		$cache_load = true;
	}
	else if (($command=="gedcom")&&(file_exists($INDEX_DIRECTORY.$GEDCOM."_upcoming.php"))&&(!isset($DEBUG)||($DEBUG==false))) {
		$modtime = filemtime($INDEX_DIRECTORY.$GEDCOM."_upcoming.php");
		$mday = date("d", $modtime);
		if ($mday==$day) {
			$fp = fopen($INDEX_DIRECTORY.$GEDCOM."_upcoming.php", "rb");
			$fcache = fread($fp, filesize($INDEX_DIRECTORY.$GEDCOM."_upcoming.php"));
			fclose($fp);
			$found_facts = unserialize($fcache);
			$cache_load = true;
		}
	}
	if (!$cache_load) {
		$monthstart = mktime(1,0,0,$monthtonum[strtolower($month)],$day,$year);
		$mmon = strtolower(date("M", $monthstart));
		$mmon2 = strtolower(date("M", $monthstart+(60*60*24*$config["days"])));
		if ($mmon=="mar" && $mmon2=="jan") $mmon2="feb";
		if ($REGEXP_DB) $query = "2 DATE[^\n]*$mmon";
		else $query = "2 DATE %$mmon%";
		
		$dayindilist = search_indis($query);
		$dayfamlist = search_fams($query);
		if ($mmon!=$mmon2) {
			if ($REGEXP_DB) $query = "2 DATE[^\n]*$mmon2";
			else $query = "2 DATE %$mmon2%";
			$dayindilist2 = search_indis($query);
			$dayfamlist2 = search_fams($query);
			$dayindilist = array_merge($dayindilist, $dayindilist2);
			$dayfamlist = array_merge($dayfamlist, $dayfamlist2);
		}
	}
	if ((count($dayindilist)>0)||(count($dayfamlist)>0)) {
		$found_facts = array();
		$last_total = $TOTAL_QUERIES;
		foreach($dayindilist as $gid=>$indi) {
			$disp = true;
			if (($filter=="living")&&(is_dead_id($gid)==1)) $disp = false;
			else if ($HIDE_LIVE_PEOPLE) $disp = displayDetailsByID($gid);
			if ($disp) {
				$facts = get_all_subrecords($indi["gedcom"], $skipfacts, false, false);
				foreach($facts as $index=>$factrec) {
					$ct = preg_match("/2 DATE (.*)/", $factrec, $match);
					if ($ct>0) {
						$date = parse_date(trim($match[1]));
						$datestamp = mktime(1,0,0,$date[0]["mon"],$date[0]["day"],$year);
						if (($datestamp > $monthstart) && ($datestamp<=$monthstart+(60*60*24*$config["days"]))) {
							$found_facts[] = array($gid, $factrec, "INDI");
						}
					}
				}
			}
		}
		foreach($dayfamlist as $gid=>$fam) {
			$disp = true;
			if ($filter=="living") {
				$parents = find_parents_in_record($fam["gedcom"]);
				if (is_dead_id($parents["HUSB"])==1) $disp = false;
				else if ($HIDE_LIVE_PEOPLE) $disp = displayDetailsByID($parents["HUSB"]);
				if ($disp) {
					if (is_dead_id($parents["WIFE"])==1) $disp = false;
					else if ($HIDE_LIVE_PEOPLE) $disp = displayDetailsByID($parents["WIFE"]);
				}
			}
			else if ($HIDE_LIVE_PEOPLE) $disp = displayDetailsByID($gid, "FAM");
			if ($disp) {
				$facts = get_all_subrecords($fam["gedcom"], $skipfacts, false, false);
				foreach($facts as $index=>$factrec) {
					$ct = preg_match("/2 DATE (.*)/", $factrec, $match);
					if ($ct>0) {
						$date = parse_date(trim($match[1]));
						$datestamp = mktime(1,0,0,$date[0]["mon"],$date[0]["day"],$year);
						if (($datestamp > $monthstart) && ($datestamp<=$monthstart+(60*60*24*$config["days"]))) {
							$found_facts[] = array($gid, $factrec, "FAM");
						}
					}
				}
			}
		}
	}
	if (count($found_facts)>0) {
		print "<div id=\"upcoming_events\" class=\"block\">";
		print "<table class=\"blockheader\" cellspacing=\"0\" cellpadding=\"0\" style=\"direction:ltr;\"><tr>";
		print "<td class=\"blockh1\" >&nbsp;</td>";
		print "<td class=\"blockh2\" ><div class=\"blockhc\">";
		print "<b>".$pgv_lang["upcoming_events"]."</b>";
		print_help_link("index_events_help", "qm");
		if ($PGV_BLOCKS["print_upcoming_events"]["canconfig"]) {
			$username = getUserName();
			if ((($command=="gedcom")&&(userGedcomAdmin($username))) || (($command=="user")&&(!empty($username)))) {
				if ($command=="gedcom") $name = preg_replace("/'/", "\'", $GEDCOM);
				else $name = $username;
				print "<a href=\"javascript: configure block\" onclick=\"window.open('index_edit.php?name=$name&amp;command=$command&amp;action=configure&amp;side=$side&amp;index=$index', '', 'top=50,left=50,width=600,height=550,scrollbars=1,resizable=1'); return false;\">";
				print "<img class=\"adminicon\" src=\"$PGV_IMAGE_DIR/".$PGV_IMAGES["admin"]["small"]."\" width=\"15\" height=\"15\" border=\"0\" alt=\"".$pgv_lang["config_block"]."\" /></a>\n";
			}
		}
		print "</div></td>";
		print "<td class=\"blockh3\">&nbsp;</td></tr>\n";
		print "</table>";
		print "<div class=\"blockcontent\" >";
		if ($block) print "<div class=\"small_inner_block\">\n";
		
		$ASC = 0;
		$IGNORE_FACTS = 1;
		$IGNORE_YEAR = 1;
		uasort($found_facts, "compare_facts");
		$lastgid="";
		foreach($found_facts as $index=>$factarray) {
			if ($factarray[2]=="INDI") {
				$gid = $factarray[0];
				$factrec = $factarray[1];
		  		if ((displayDetailsById($gid)) && (!FactViewRestricted($gid, $factrec))) {
					$indirec = find_person_record($gid);
					$text = get_calendar_fact($factrec, $action, $filter, $gid);
					if ($text!="filter") {
						if ($lastgid!=$gid) {
							print "<img id=\"box-".$gid."-".$index."-sex\" src=\"$PGV_IMAGE_DIR/";
							if (preg_match("/1 SEX M/", $indirec)>0) print $PGV_IMAGES["sex"]["small"]."\" title=\"".$pgv_lang["male"]."\" alt=\"".$pgv_lang["male"];
							else  if (preg_match("/1 SEX F/", $indirec)>0) print $PGV_IMAGES["sexf"]["small"]."\" title=\"".$pgv_lang["female"]."\" alt=\"".$pgv_lang["female"];
							else print $PGV_IMAGES["sexn"]["small"]."\" title=\"".$pgv_lang["sex"]." ".$pgv_lang["unknown"]."\" alt=\"".$pgv_lang["sex"]." ".$pgv_lang["unknown"];
							print "\" class=\"sex_image\" />";
							$name = check_NN(get_person_name($gid));
							print "<a href=\"individual.php?pid=$gid&amp;ged=".$GEDCOM."\"><b>".PrintReady($name)."</b>";
							if ($SHOW_ID_NUMBERS) {
							   if ($TEXT_DIRECTION=="ltr") 
									print " &lrm;($gid)&lrm;";
							   else print " &rlm;($gid)&rlm;";
							}
							print "</a><br />\n";
							$lastgid=$gid;
						}
						print "<div class=\"indent" . ($TEXT_DIRECTION=="rtl"?"_rtl":"") . "\">";
						print $text;
						print "</div><br />";
					}
				}
			}
			
			if ($factarray[2]=="FAM") {
				$gid = $factarray[0];
				$factrec = $factarray[1];
		  		if ((displayDetailsById($gid, "FAM")) && (!FactViewRestricted($gid, $factrec))) {
					$famrec = find_family_record($gid);
					$name = get_family_descriptor($gid);
					$text = get_calendar_fact($factrec, $action, $filter, $gid);;
					if ($text!="filter") {
						if ($lastgid!=$gid) {
							print "<a href=\"family.php?famid=$gid&amp;ged=".$GEDCOM."\"><b>".PrintReady($name)."</b>";
							if ($SHOW_FAM_ID_NUMBERS) {
							   if ($TEXT_DIRECTION=="ltr") 
									print " &lrm;($gid)&lrm;";
							   else print " &rlm;($gid)&rlm;";
							}
							print "</a><br />\n";
							$lastgid=$gid;
						}
						print "<div class=\"indent" . ($TEXT_DIRECTION=="rtl"?"_rtl":"") . "\">";
						print $text;
						print "</div><br />";
					}
				}
			}
		}
		
		if ($block) print "</div>\n";
		print "</div>"; // blockcontent
		print "</div>"; // block
	}
	//-- store the results in the session to improve speed of future page loads
	if ($command=="user") {
		$_SESSION["upcoming_events"][$command][$GEDCOM] = $found_facts;
	}
	else if (($command=="gedcom")&&(is_writable($INDEX_DIRECTORY))) {
		$fp = fopen($INDEX_DIRECTORY."/".$GEDCOM."_upcoming.php", "wb");
		fwrite($fp, serialize($found_facts));
		fclose($fp);
	}
}

function print_upcoming_events_config($config) {
	global $pgv_lang, $PGV_BLOCKS;
	if (empty($config)) $config = $PGV_BLOCKS["print_recent_changes"]["config"];
	?>
	<?php print $pgv_lang["days_to_show"]; ?> <select name="days">
		<?php
		for($i=2; $i<=30; $i++) {
			print "\t\t<option value=\"$i\"";
			if ($config["days"]==$i) print " selected=\"selected\"";
			print ">$i</option>\n";
		}
		?>
	</select>
	<?php
}
?>