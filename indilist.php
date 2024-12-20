<?php
/**
 * Individual List
 *
 * The individual list shows all individuals from a chosen gedcom file. The list is
 * setup in two sections. The alphabet bar and the details.
 *
 * The alphabet bar shows all the available letters users can click. The bar is built
 * up from the lastnames first letter. Added to this bar is the symbol @, which is
 * shown as a translated version of the variable <var>pgv_lang["NN"]</var>, and a
 * translated version of the word ALL by means of variable <var>$pgv_lang["all"]</var>.
 *
 * The details can be shown in two ways, with surnames or without surnames. By default
 * the user first sees a list of surnames of the chosen letter and by clicking on a
 * surname a list with names of people with that chosen surname is displayed.
 *
 * Beneath the details list is the option to skip the surname list or show it.
 * Depending on the current status of the list.
 *
 * $Id: indilist.php,v 1.169 2005/12/09 20:58:49 yalnifj Exp $
 * @package PhpGedView
 * @subpackage Lists
 */

require("config.php");
print_header($pgv_lang["individual_list"]);
print "<div class =\"center\">";
print "\n\t<h2>".$pgv_lang["individual_list"]."</h2>";
if (empty($surname_sublist)) $surname_sublist = "yes";
if (empty($show_all)) $show_all = "no";
if (empty($show_all_firstnames)) $show_all_firstnames = "no";

$MinNamesPerColumn = 8;		// Number of names required before list switches to two columns


// Remove slashes
if (isset($alpha)) $alpha = stripslashes($alpha);
if (isset($surname)) $surname = stripslashes($surname);

/**
 * Check for the @ symbol
 *
 * This variable is used for checking if the @ symbol is present in the alphabet list.
 * @global boolean $pass
 */
$pass = FALSE;

/**
 * Total indilist array
 *
 * The tindilist array will contain individuals that are extracted from the database.
 * @global array $tindilist
 */
$tindilist = array();

/**
 * Individual alpha array
 *
 * The indialpha array will contain all first letters that are extracted from an individuals
 * lastname.
 * @global array $indialpha
 */

$indialpha = get_indi_alpha();

if ($PGV_DATABASE=="index") uasort($indialpha, "lettersort");
else uasort($indialpha, "stringsort");

if (isset($alpha) && !isset($indialpha["$alpha"])) unset($alpha);

if (count($indialpha) > 0) {
	foreach($indialpha as $letter=>$list) {
		if (empty($alpha)) {
			if (!empty($surname)) {
				$alpha = get_first_letter(strip_prefix($surname));
			}
		}
		if ($letter != "@") {
			if (!isset($startalpha) && !isset($alpha)) {
				$startalpha = $letter;
				$alpha = $letter;
			}
			print "<a href=\"indilist.php?alpha=".urlencode($letter)."&amp;surname_sublist=yes\">";
			if (($alpha==$letter)&&($show_all=="no")) print "<span class=\"warning\">".$letter."</span>";
			else print $letter;
			print "</a> | \n";
		}
		if ($letter === "@") $pass = TRUE;
	}
	if ($pass == TRUE) {
		if (isset($alpha) && $alpha == "@") print "<a href=\"indilist.php?alpha=@&amp;surname_sublist=yes&amp;surname=@N.N.\"><span class=\"warning\">".PrintReady($pgv_lang["NN"])."</span></a>";
		else print "<a href=\"indilist.php?alpha=@&amp;surname_sublist=yes&amp;surname=@N.N.\">".PrintReady($pgv_lang["NN"])."</a>";
		print " | \n";
		$pass = FALSE;
	}
	if ($show_all=="yes") print "<a href=\"indilist.php?show_all=yes&amp;surname_sublist=$surname_sublist\"><span class=\"warning\">".$pgv_lang["all"]."</span>\n";
	else print "<a href=\"indilist.php?show_all=yes&amp;surname_sublist=$surname_sublist\">".$pgv_lang["all"]."</a>\n";
	if (isset($startalpha)) $alpha = $startalpha;
}
print_help_link("alpha_help", "qm");

//-- escaped letter for regular expressions
$expalpha = $alpha;
if ($expalpha=="(" || $expalpha=="[" || $expalpha=="?" || $expalpha=="/" || $expalpha=="*" || $expalpha=="+" || $expalpha==')') $expalpha = "\\".$expalpha;

print "<br /><br /><table class=\"list_table, $TEXT_DIRECTION\"><tr>";
if (($surname_sublist=="yes")&&($show_all=="yes")) {
	get_indi_list();
	if (!isset($alpha)) $alpha="";
	$surnames = array();
	$indi_hide=0;
	foreach($indilist as $gid=>$indi) {
		//-- make sure that favorites from other gedcoms are not shown 
		if ($indi["file"]==$GEDCOM) { 
			if (displayDetailsById($gid)||showLivingNameById($gid)) {
				foreach($indi["names"] as $indexval => $name) {
					surname_count($name[2]);
				}
			}
			else $indi_hide++;
		}
	}
	$i = 0;
	uasort($surnames, "itemsort");
	$count = count($surnames);
	$count_indi = 0;
	$col = 1;
	if ($count>36) $col=4;
	else if ($count>18) $col=3;
	else if ($count>6) $col=2;
	$newcol=ceil($count/$col);
	print "<td class=\"list_label\" colspan=\"$col\">";
	print "<img src=\"".$PGV_IMAGE_DIR."/".$PGV_IMAGES["indis"]["large"]."\" border=\"0\" width=\"25\" title=\"".$pgv_lang["individuals"]."\" alt=\"".$pgv_lang["individuals"]."\" />&nbsp;&nbsp;";
	print $pgv_lang["surnames"]."</td></tr><tr>\n";
	print "<td class=\"list_value\" style=\"padding: 14px;\">\n";

// Surnames with starting and ending letters in 2 text orientations is shown in a wrong way on the page with different orientation from the orientation of the first name letter
	
	foreach($surnames as $surname=>$namecount) {
		if (begRTLText($namecount["name"])) {
 			print "<div class =\"rtl\" dir=\"rtl\">&nbsp;<a href=\"indilist.php?alpha=".urlencode($namecount["alpha"])."&amp;surname_sublist=$surname_sublist&amp;surname=".urlencode($namecount["name"])."\">&nbsp;".PrintReady($namecount["name"]) . "&rlm; - [".($namecount["match"])."]&rlm;";
		}
		else if (substr($namecount["name"], 0, 4) == "@N.N") {
			print "<div class =\"ltr\" dir=\"ltr\">&nbsp;<a href=\"indilist.php?alpha=".$namecount["alpha"]."&amp;surname_sublist=$surname_sublist&amp;surname=@N.N.\">&nbsp;".$pgv_lang["NN"] . "&lrm; - [".($namecount["match"])."]&lrm;&nbsp;";
		}
		else {
			print "<div class =\"ltr\" dir=\"ltr\">&nbsp;<a href=\"indilist.php?alpha=".urlencode($namecount["alpha"])."&amp;surname_sublist=$surname_sublist&amp;surname=".urlencode($namecount["name"])."\">".PrintReady($namecount["name"]) . "&lrm; - [".($namecount["match"])."]&lrm;";
		} 

 		print "</a></div>\n";
		$count_indi += $namecount["match"];
		$i++;
		if ($i==$newcol && $i<$count) {
			print "</td><td class=\"list_value\" style=\"padding: 14px;\">\n";
			$newcol=$i+ceil($count/$col);
		}
	}
	print "</td>\n";
	if ($count>1 || $indi_hide>0) {
		print "</tr><tr><td colspan=\"$col\" align=\"center\">&nbsp;";
		if ($SHOW_MARRIED_NAMES && $count>1) print $pgv_lang["total_names"]." ".$count_indi."<br />";
		if ($count>1) print $pgv_lang["total_indis"]." ".count($indilist)."&nbsp;";
		if ($count>1 && $indi_hide>0) print "--&nbsp;";
		if ($indi_hide>0) print $pgv_lang["hidden"]." ".$indi_hide;
		if ($count>1) print "<br />".$pgv_lang["surnames"]." ".$count;
		print "</td>\n";
	}	
}
else if (($surname_sublist=="yes")&&(empty($surname))&&($show_all=="no")) {
	if (!isset($alpha)) $alpha="";
	// get all of the individuals whose last names start with this letter
	$tindilist = get_alpha_indis($alpha);
	$surnames = array();
	$indi_hide=0;
	foreach($tindilist as $gid=>$indi) {
		if ((displayDetailsByID($gid))||(showLivingNameById($gid))) {
			foreach($indi["names"] as $name) {
				if ($LANGUAGE == "danish" || $LANGUAGE == "norwegian") {
					if ($alpha == "Ø") $text = "OE";
					else if ($alpha == "Æ") $text = "AE";
					else if ($alpha == "Å") $text = "AA";
					if (isset($text)) {
						if ((preg_match("/^$expalpha/", $name[1])>0)||(preg_match("/^$text/", $name[1])>0)) surname_count($name[2]);
					}
					else if (preg_match("/^$expalpha/", $name[1])>0) surname_count($name[2]);
				}
				else {
					if (preg_match("/^$expalpha/", $name[1])>0) surname_count($name[2]);
				}
			}
		}
		else $indi_hide++;
	}
	$i = 0;
	uasort($surnames, "itemsort");
	$count = count($surnames);
	$count_indi = 0;
	$col = 1;
	if ($count>36) $col=4;
	else if ($count>18) $col=3;
	else if ($count>6) $col=2;
	$newcol=ceil($count/$col);
	print "<td class=\"list_label\" colspan=\"$col\">";
	print "<img src=\"".$PGV_IMAGE_DIR."/".$PGV_IMAGES["indis"]["large"]."\" border=\"0\" width=\"25\" title=\"".$pgv_lang["individuals"]."\" alt=\"".$pgv_lang["individuals"]."\" />&nbsp;&nbsp;";
	print $pgv_lang["surnames"]."</td></tr><tr>\n";
	print "<td class=\"list_value\" style=\"padding: 14px;\">\n";
	
	foreach($surnames as $surname=>$namecount) {
		if (begRTLText($namecount["name"])) {
 			print "<div class =\"rtl\" dir=\"rtl\">&nbsp;<a href=\"indilist.php?alpha=".$alpha."&amp;surname_sublist=$surname_sublist&amp;surname=".urlencode($namecount["name"])."\">&nbsp;".PrintReady($namecount["name"]) . "&rlm; - [".($namecount["match"])."]&rlm;";	
		}
		else if (substr($namecount["name"], 0, 5) == "@N.N.") {
			print "<div class =\"ltr\" dir=\"ltr\">&nbsp;<a href=\"indilist.php?alpha=".$namecount["alpha"]."&amp;surname_sublist=$surname_sublist&amp;surname=@N.N.\">&nbsp;".$pgv_lang["NN"] . "&lrm; - [".($namecount["match"])."]&lrm;&nbsp;";
		}
		else {
			print "<div class =\"ltr\" dir=\"ltr\">&nbsp;<a href=\"indilist.php?alpha=".$alpha."&amp;surname_sublist=$surname_sublist&amp;surname=".urlencode($namecount["name"])."\">".PrintReady($namecount["name"]) . "&lrm; - [".($namecount["fam"])."]&lrm;"; 
		} 		
		print "</a>&nbsp;</div>\n";
		$count_indi += $namecount["match"];
		$i++;
		if ($i==$newcol && $i<$count) {
			print "</td><td class=\"list_value\" style=\"padding: 14px;\">\n";
			$newcol=$i+ceil($count/$col);
		}	
	}
	print "</td>\n";
	if ($count>1 || $indi_hide>0) {
		print "</tr><tr><td colspan=\"$col\" align=\"center\">&nbsp;";
		if ($SHOW_MARRIED_NAMES && $count>1) print $pgv_lang["total_names"]." ".$count_indi."<br />";
		if ($count>1) print $pgv_lang["total_indis"]." ".count($tindilist)."&nbsp;";
		if ($count>1 && $indi_hide>0) print "--&nbsp;";
		if ($indi_hide>0) print $pgv_lang["hidden"]." ".$indi_hide;
		if ($count>1) print "<br />".$pgv_lang["surnames"]." ".$count;
		print "</td>\n";
	}
}
else {
	$firstname_alpha = false;
	//-- if the surname is set then only get the names in that surname list
	if ((!empty($surname))&&($surname_sublist=="yes")) {
		$surname = trim($surname);
		$tindilist = get_surname_indis($surname);
		//-- split up long surname lists by first letter of first name
		if (count($tindilist)>500) $firstname_alpha = true;
	}

	if (($surname_sublist=="no")&&(!empty($alpha))&&($show_all=="no")) {
		$tindilist = get_alpha_indis($alpha);
	}
	
	//-- simplify processing for ALL indilist	
	if (($surname_sublist=="no")&&($show_all=="yes")) {
		$tindilist = get_indi_list();
		$names = array();
		foreach($tindilist as $gid => $indi) {
			//-- make sure that favorites from other gedcoms are not shown 
			if ($indi["file"]==$GEDCOM) { 
	            foreach($indi["names"] as $indexval => $namearray) {
		            if ($SHOW_MARRIED_NAMES || $namearray[3]!='C') $names[] = array($namearray[0], $namearray[1], $namearray[2], $namearray[3], $gid);
	            }
			}
		}
		uasort($names, "itemsort");
		reset($names);
		$total_indis = count($indilist);
		$count = count($names);
		$i=0;
		print "<td class=\"list_label\" style=\"padding: 0pt 5pt 0pt 5pt; \" colspan=\"2\">";
		print "<img src=\"".$PGV_IMAGE_DIR."/".$PGV_IMAGES["indis"]["large"]."\" border=\"0\" width=\"25\" title=\"".$pgv_lang["individuals"]."\" alt=\"".$pgv_lang["individuals"]."\" />&nbsp;&nbsp;";
		print $pgv_lang["individuals"]."</td></tr><tr>\n";
		print "<td class=\"list_value_wrap $TEXT_DIRECTION\"><ul>\n";
		foreach($names as $indexval => $namearray) {
			$name = check_NN(sortable_name_from_name($namearray[0]));
			print_list_person($namearray[4], array($name, $GEDCOM));
			$i++;
			if ($i==ceil($count/2) && $count>$MinNamesPerColumn) print "</ul></td><td class=\"list_value_wrap $TEXT_DIRECTION\"><ul>\n";			
		}
		print "</ul></td>\n";
		if ($count>1) {
			print "</tr><tr><td colspan=\"2\" align=\"center\">";
			if ($SHOW_MARRIED_NAMES) print $pgv_lang["total_names"]." ".$count."<br />\n";
			print $pgv_lang["total_indis"]." ".$total_indis."</td>\n";
		}
	}
	else {
		//--- the list is really long so divide it up again by the first letter of the first name
		if ($firstname_alpha) {
			if (!isset($_SESSION[$surname."_firstalpha"])) {
				$firstalpha = array();
				foreach($tindilist as $gid=>$indi) {
					foreach($indi["names"] as $indexval => $namearray) {
						$letter = str2upper(get_first_letter($namearray[0]));
						if (!isset($firstalpha[$letter])) {
							$firstalpha[$letter] = array("letter"=>$letter, "ids"=>$gid);
						}
						else $firstalpha[$letter]["ids"] .= ",".$gid;
					}
				}
				uasort($firstalpha, "lettersort");
				//-- put the list in the session so that we don't have to calculate this the next time
				$_SESSION[$surname."_firstalpha"] = $firstalpha;
			}
			else $firstalpha = $_SESSION[$surname."_firstalpha"];
			print "<td class=\"list_label\" style=\"padding: 0pt 5pt 0pt 5pt; \" colspan=\"2\">";
			print "<img src=\"".$PGV_IMAGE_DIR."/".$PGV_IMAGES["indis"]["large"]."\" border=\"0\" width=\"25\" title=\"".$pgv_lang["individuals"]."\" alt=\"".$pgv_lang["individuals"]."\" />&nbsp;&nbsp;";
			print PrintReady(str_replace("#surname#", check_NN($surname), $pgv_lang["indis_with_surname"]));
			print "</td></tr><tr>\n";
			print "<td style=\"text-align:center;\" colspan=\"2\">";
			print $pgv_lang["first_letter_fname"]."<br />\n";
			foreach($firstalpha as $letter=>$list) {
				$PASS = false;
				if ($letter != "@") {
					if (!isset($fstartalpha) && !isset($falpha)) {
						$fstartalpha = $letter;
						$falpha = $letter;
					}
					print "<a href=\"indilist.php?alpha=".urlencode($alpha)."&amp;surname=".urlencode($surname)."&amp;falpha=".urlencode($letter)."&amp;surname_sublist=$surname_sublist\">";
					if (($falpha==$letter)&&($show_all_firstnames=="no")) print "<span class=\"warning\">".$letter."</span>";
					else print $letter;
					print "</a> | \n";
				}
				if ($letter === "@") $pass = TRUE;
			}
			if ($pass == TRUE) {
				if (isset($falpha) && $falpha == "@") print "<a href=\"indilist.php?alpha=".urlencode($alpha)."&amp;surname=".urlencode($surname)."&amp;falpha=@&amp;surname_sublist=yes\"><span class=\"warning\">".PrintReady($pgv_lang["NN"])."</span></a>";
				else print "<a href=\"indilist.php?alpha=".urlencode($alpha)."&amp;surname=".urlencode($surname)."&amp;falpha=@&amp;surname_sublist=yes\">".PrintReady($pgv_lang["NN"])."</a>";
				print " | \n";
				$pass = FALSE;
			}
			if ($show_all_firstnames=="yes") print "<a href=\"indilist.php?alpha=".urlencode($alpha)."&amp;surname=".urlencode($surname)."&amp;show_all_firstnames=no\"><span class=\"warning\">".$pgv_lang["all"]."</span>\n";
			else print "<a href=\"indilist.php?alpha=".urlencode($alpha)."&amp;surname=".urlencode($surname)."&amp;show_all_firstnames=yes\">".$pgv_lang["all"]."</a>\n";
			print_help_link("firstname_alpha_help", "qm");
//			print "</div>\n";
			if (isset($fstartalpha)) $falpha = $fstartalpha;
			if ($show_all_firstnames=="no") {
				$findilist = array();
				$ids = preg_split("/,/", $firstalpha[$falpha]["ids"]);
				foreach($ids as $indexval => $id) {
					$findilist[$id] = $indilist[$id];
				}
				$tindilist = $findilist;
			}
			print "</td></tr><tr>\n";
		}
		if ($firstname_alpha==false) {
			print "<td class=\"list_label\" style=\"padding: 0pt 5pt 0pt 5pt; \" colspan=\"2\">";
			print "<img src=\"".$PGV_IMAGE_DIR."/".$PGV_IMAGES["indis"]["large"]."\" border=\"0\" width=\"25\" title=\"".$pgv_lang["individuals"]."\" alt=\"".$pgv_lang["individuals"]."\" />&nbsp;&nbsp;";
			if (!empty($surname) && $surname_sublist=="yes") print PrintReady(str_replace("#surname#", check_NN($surname), $pgv_lang["indis_with_surname"]));
			else print $pgv_lang["individuals"];
			print "</td></tr><tr>\n";
		}
		print "<td class=\"list_value_wrap $TEXT_DIRECTION\"><ul>\n";
		$names = array();
		foreach($tindilist as $gid => $indi) {
			foreach($indi["names"] as $indexval => $namearray) {
				$text = "";
				if ($LANGUAGE == "danish" || $LANGUAGE == "norwegian") {
					if ($alpha == "Ø") $text = "OE";
					else if ($alpha == "Æ") $text = "AE";
					else if ($alpha == "Å") $text = "AA";
				}
				if ((empty($surname)&&((preg_match("/^$expalpha/", $namearray[1])>0)||(!empty($text)&&preg_match("/^$text/", $namearray[1])>0))) || (stristr($namearray[2], $surname)!==false)) {
					$name = check_NN(sortable_name_from_name($namearray[0]));
					$names[] = array("gid"=>$gid, "name"=>$name);
				}
			}
		}
		uasort($names, "itemsort");
		$count = count($names);
		$i=0;
		foreach($names as $indexval => $namearray) {
			$gid = $namearray["gid"];
			$name = $namearray["name"];
			$indi = $tindilist[$gid];
			print_list_person($gid, array($name, $indi["file"]));
			$i++;
			if ($i==ceil($count/2) && $count>$MinNamesPerColumn) print "</ul></td><td class=\"list_value_wrap $TEXT_DIRECTION\"><ul>\n";			
		}
		print "</ul></td>\n";
		if ($count>1) {
			print "</tr><tr><td colspan=\"2\" align=\"center\">";
			if ($SHOW_MARRIED_NAMES) print $pgv_lang["total_names"]." ".$i."<br />\n";
			print $pgv_lang["total_indis"]." ".count($tindilist);
			if ($indi_private>0) print "&nbsp;(".$pgv_lang["private"]." ".$indi_private.")";
			if ($indi_hide>0) print "&nbsp;--&nbsp;";
			if ($indi_hide>0) print $pgv_lang["hidden"]." ".$indi_hide;
			print "</td>\n";
		}
	}
}
print "</tr></table>";

print_help_link("name_list_help", "qm");
if ($alpha != "@") {
	if ($surname_sublist=="yes") print "<br /><a href=\"indilist.php?alpha=$alpha&amp;surname_sublist=no&amp;show_all=$show_all\">".$pgv_lang["skip_surnames"]."</a>";
	else print "<br /><a href=\"indilist.php?alpha=$alpha&amp;surname_sublist=yes&amp;show_all=$show_all\">".$pgv_lang["show_surnames"]."</a>";
}
if ($alpha != "@") print_help_link("skip_sublist_help", "qm");
print "<br /><br />\n";
print "</div>\n";
print_footer();

?>