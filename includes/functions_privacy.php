<?php
/**
 * Privacy Functions
 *
 * See http://www.phpgedview.net/privacy.php for more information on privacy in PhpGedView
 *
 * phpGedView: Genealogy Viewer
 * Copyright (C) 2002 to 2005  John Finlay and Others
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
 * @version $Id: functions_privacy.php,v 1.2 2006/01/09 00:46:23 skenow Exp $
 * @package PhpGedView
 * @subpackage Privacy
 */

if (strstr($_SERVER["PHP_SELF"],"functions_privacy.php")) {
	print "Why do you want to do that?";
	exit;
}

if ($USE_RELATIONSHIP_PRIVACY) {
	/**
	 * store relationship paths in a cache
	 *
	 * the <var>$NODE_CACHE</var> is an array of nodes that have been previously checked
	 * by the relationship calculator.  This cache greatly speed up the relationship privacy
	 * checking on charts as many relationships on charts are in the same relationship path.
	 *
	 * See the documentation for the get_relationship() function in the functions.php file.
	 */
	$NODE_CACHE = array();
}

//-- allow users to overide functions in privacy file
if (!function_exists("is_dead")) {
/**
 * check if a person is dead
 *
 * this function will read a person's gedcom record and try to determine whether the person is
 * dead or not.  It checks several parameters to determine death status in the following order:
 * 1. a DEAT record returns dead
 * 2. a BIRT record less than <var>$MAX_ALIVE_AGE</var> returns alive
 * 3. Any date in the record that would make them older than <var>$MAX_ALIVE_AGE</var>
 * 4. A date in the parents record that makes the parents older than <var>$MAX_ALIVE_AGE</var>+40
 * 5. A marriage record with a date greater than <var>$MAX_ALIVE_AGE</var>-10
 * 6. A date in the spouse record greater than <var>$MAX_ALIVE_AGE</var>
 * 7. A date in the children's record that is greater than <var>$MAX_ALIVE_AGE</var>-10
 * 8. A date in the grand childnren's record that is greater than <var>$MAX_ALIVE_AGE</var>-30
 *
 * This function should only be called once per individual.  In index mode this is called during
 * the Gedcom import.  In MySQL mode this is called the first time the individual is accessed
 * and then the database table is updated.
 * @author John Finlay (yalnifj)
 * @param string $indirec the raw gedcom record
 * @return bool true if dead false if alive
 */
function is_dead($indirec, $cyear="") {
	global $CHECK_CHILD_DATES;
	global $MAX_ALIVE_AGE;
	global $HIDE_LIVE_PEOPLE;
	global $PRIVACY_BY_YEAR;
	global $pgv_lang;
	global $BUILDING_INDEX;

	$ct = preg_match("/0 @(.*)@ INDI/", $indirec, $match);
	if ($ct>0) {
		$pid = trim($match[1]);
	}

	if (empty($pid)) return false;

	if (empty($cyear)) $cyear = date("Y");

	// -- check for a death record
	$deathrec = get_sub_record(1, "1 DEAT", $indirec);
	if (!empty($deathrec)) {
		if ($cyear==date("Y")) {
			$lines = preg_split("/\n/", $deathrec);
			if (count($lines)>1) return true;
			if (preg_match("/1 DEAT Y/", $deathrec)>0) return true;
		}
		else {
			$ct = preg_match("/\d DATE.*\s(\d{3,4})\s/", $deathrec, $match);
			if ($ct>0) {
				$dyear = $match[1];
				if ($dyear<$cyear) return true;
				else return false;
			}
		}
	}

	//-- if birthdate less than $MAX_ALIVE_AGE return false
	$birthrec = get_sub_record(1, "1 BIRT", $indirec);
	if (!empty($birthrec)) {
		$ct = preg_match("/\d DATE.*\s(\d{3,4})\s/", $birthrec, $match);
		if ($ct>0) {
			$byear = $match[1];
			if (($cyear-$byear) < $MAX_ALIVE_AGE) {
				//print "found birth record less that $MAX_ALIVE_AGE\n";
				return false;
			}
		}
	}

	// If no death record than check all dates; the oldest one is the DOB
	$ct = preg_match_all("/\d DATE.*\s(\d{3,4})\s/", $indirec, $match, PREG_SET_ORDER);
	for($i=0; $i<$ct; $i++) {
		if (strstr($match[$i][0], "@#DHEBREW@")===false) {
			$byear = $match[$i][1];
			// If any date is prior to than MAX_ALIVE_AGE years ago assume they are dead
			if (($cyear-$byear) > $MAX_ALIVE_AGE) {
				//print "older than $MAX_ALIVE_AGE (".$match[$i][0].") year is $byear\n";
				return true;
			}
		}
	}

	// If we found no dates then check the dates of close relatives.
	if($CHECK_CHILD_DATES ) {
		//-- check the parents for dates
		$numfams = preg_match_all("/1\s*FAMC\s*@(.*)@/", $indirec, $fmatch, PREG_SET_ORDER);
		for($j=0; $j<$numfams; $j++) {
			$parents = find_parents($fmatch[$j][1]);
			if ($parents) {
				if (!empty($parents["HUSB"])) {
					$prec = find_person_record($parents["HUSB"]);
					$ct = preg_match_all("/\d DATE.*\s(\d{3,4})\s/", $prec, $match, PREG_SET_ORDER);
					for($i=0; $i<$ct; $i++) {
						$byear = $match[$i][1];
						// If any date is prior to than MAX_ALIVE_AGE years ago assume they are dead
						if (($cyear-$byear) > $MAX_ALIVE_AGE+40) {
							//print "father older than $MAX_ALIVE_AGE+40 (".$match[$i][0].") year is $byear\n";
							return true;
						}
					}
				}
				if (!empty($parents["WIFE"])) {
					$prec = find_person_record($parents["WIFE"]);
					$ct = preg_match_all("/\d DATE.*\s(\d{3,4})\s/", $prec, $match, PREG_SET_ORDER);
					for($i=0; $i<$ct; $i++) {
						$byear = $match[$i][1];
						// If any date is prior to than MAX_ALIVE_AGE years ago assume they are dead
						if (($cyear-$byear) > $MAX_ALIVE_AGE+40) {
							//print "mother older than $MAX_ALIVE_AGE+40 (".$match[$i][0].") year is $byear\n";
							return true;
						}
					}
				}
			}
		}
		$children = array();
		// For each family in which this person is a spouse...
		$numfams = preg_match_all("/1\s*FAMS\s*@(.*)@/", $indirec, $fmatch, PREG_SET_ORDER);
		for($j=0; $j<$numfams; $j++) {
			// Get the family record
			$famrec = find_family_record($fmatch[$j][1]);

			//-- check for marriage date
			$marrec = get_sub_record(1, "1 MARR", $famrec);
			if ($marrec!==false) {
				$bt = preg_match_all("/\d DATE.*\s(\d{3,4})\s/", $marrec, $bmatch, PREG_SET_ORDER);
				for($h=0; $h<$bt; $h++) {
					$byear = $bmatch[$h][1];
					// if marriage was more than MAX_ALIVE_AGE-10 years ago assume the person has died
					if (($cyear-$byear) > ($MAX_ALIVE_AGE-10)) {
						//print "marriage older than $MAX_ALIVE_AGE-10 (".$bmatch[$h][0].") year is $byear\n";
						return true;
					}
				}
			}
			//-- check spouse record for dates
			$parents = find_parents_in_record($famrec);
			if ($parents) {
				if ($parents["HUSB"]!=$pid) $spid = $parents["HUSB"];
				else $spid = $parents["WIFE"];
				$spouserec = find_person_record($spid);
				// Check dates
				$bt = preg_match_all("/\d DATE.*\s(\d{3,4})\s/", $spouserec, $bmatch, PREG_SET_ORDER);
				for($h=0; $h<$bt; $h++) {
					$byear = $bmatch[$h][1];
					// if the spouse is > $MAX_ALIVE_AGE assume the individual is dead
					if (($cyear-$byear) > $MAX_ALIVE_AGE) {
						//print "spouse older than $MAX_ALIVE_AGE (".$bmatch[$h][0].") year is $byear\n";
						return true;
					}
				}
			}
			// Get the set of children
			$ct = preg_match_all("/1 CHIL @(.*)@/", $famrec, $match, PREG_SET_ORDER);
			for($i=0; $i<$ct; $i++) {
				// Get each child's record
				$childrec = find_person_record($match[$i][1]);
				$children[] = $childrec;

				// Check each child's dates
				$bt = preg_match_all("/\d DATE.*\s(\d{3,4})\s/", $childrec, $bmatch, PREG_SET_ORDER);
				for($h=0; $h<$bt; $h++) {
					$byear = $bmatch[$h][1];
					// if any child was born more than MAX_ALIVE_AGE-10 years ago assume the parent has died
					if (($cyear-$byear) > ($MAX_ALIVE_AGE-10)) {
						//print "child older than $MAX_ALIVE_AGE-10 (".$bmatch[$h][0].") year is $byear\n";
						return true;
					}
				}
			}
		}
		//-- check grandchildren for dates
		foreach($children as $indexval => $child) {
			// For each family in which this person is a spouse...
			$numfams = preg_match_all("/1\s*FAMS\s*@(.*)@/", $child, $fmatch, PREG_SET_ORDER);
			for($j=0; $j<$numfams; $j++) {
				// Get the family record
				$famrec = find_family_record($fmatch[$j][1]);

				// Get the set of children
				$ct = preg_match_all("/1 CHIL @(.*)@/", $famrec, $match, PREG_SET_ORDER);
				for($i=0; $i<$ct; $i++) {
					// Get each child's record
					$childrec = find_person_record($match[$i][1]);

					// Check each grandchild's dates
					$bt = preg_match_all("/\d DATE.*\s(\d{3,4})\s/", $childrec, $bmatch, PREG_SET_ORDER);
					for($h=0; $h<$bt; $h++) {
						$byear = $bmatch[$h][1];
						// if any grandchild was born more than MAX_ALIVE_AGE-30 years ago assume the grandparent has died
						if (($cyear-$byear) > ($MAX_ALIVE_AGE-30)) {
							//print "grandchild older than $MAX_ALIVE_AGE-30 (".$bmatch[$h][0].") year is $byear\n";
							return true;
						}
					}
				}
			}
		}
	}
	return false;
}
}

//-- allow users to overide functions in privacy file
if (!function_exists("displayDetails")) {
/**
 * check if the details of the GEDCOM record should be shown
 *
 *
 * This function checks if the details of the given GEDCOM record represented by <var>$indirec</var>
 * should be shown.  This function has been depricated and now all it does is looks up the GEDCOM
 * XRef ID and type from the gedcom record and pass them as parameters to the
 * <var>displayDetailsByID</var> function.
 *
 * @deprecated	This function has been deprecated by the displayDetailsByID function, it is still
 *				provided for backwards compatibility but it should no longer be used in new code
 * @param	string $indirec the raw gedcom record to check privacy settings for
 * @return	boolean return true to show the persons details, return false to keep them private
 */
function displayDetails($indirec) {
	global $HIDE_LIVE_PEOPLE;

	if (!$HIDE_LIVE_PEOPLE) return true;

	$ct = preg_match("/0 @(.*)@ (.*)/", $indirec, $match);
	if ($ct>0) {
		$pid = $match[1];
		$type = trim($match[2]);
	}
	else {
		$pid=0;
		$type = "INDI";
	}
//    print "(Display Detail pid, type: ".$pid.", ".$type.") ";

	return displayDetailsByID($pid, $type);
}
}

//-- allow users to overide functions in privacy file
if (!function_exists("displayDetailsByID")) {
/**
 * check if details for a GEDCOM XRef ID should be shown
 *
 * This function uses the settings in the global variables above to determine if the current user
 * has sufficient privileges to access the GEDCOM resource.
 *
 * @author	yalnifj
 * @param	string $pid the GEDCOM XRef ID for the entity to check privacy settings for
 * @param	string $type the GEDCOM type represented by the $pid.  This setting is used so that
 *			different gedcom types can be handled slightly different. (ie. a source cannot be dead)
 *			The possible values of $type are:
 *			- "INDI" record is an individual
 *			- "FAM" record is a family
 *			- "SOUR" record is a source
 * @return	boolean return true to show the persons details, return false to keep them private
 */
function displayDetailsByID($pid, $type = "INDI") {
	global $PRIV_PUBLIC, $PRIV_USER, $PRIV_NONE, $PRIV_HIDE, $USE_RELATIONSHIP_PRIVACY, $CHECK_MARRIAGE_RELATIONS, $MAX_RELATION_PATH_LENGTH;
	global $global_facts, $person_privacy, $user_privacy, $HIDE_LIVE_PEOPLE, $GEDCOM, $SHOW_DEAD_PEOPLE, $MAX_ALIVE_AGE, $PRIVACY_BY_YEAR;
	global $PRIVACY_CHECKS, $PRIVACY_BY_RESN, $SHOW_SOURCES, $SHOW_LIVING_NAMES;

	if (!$HIDE_LIVE_PEOPLE) return true;
	if (empty($pid)) return true;

	if (!isset($PRIVACY_CHECKS)) $PRIVACY_CHECKS = 1;
	else $PRIVACY_CHECKS++;

	//print "checking privacy for $pid<br />";
//    print "(DisplayDetailsByID - ".$pid .", ".$type .") ";
	$username = getUserName();
	if (!empty($username)) {
		if (userGedcomAdmin($username)) return true;
		if (isset($user_privacy[$username]["all"])) {
			if ($user_privacy[$username]["all"] >= $PRIV_USER) return true;
			else return false;
		}
		if (isset($user_privacy[$username][$pid])) {
			if ($user_privacy[$username][$pid] >= $PRIV_USER) return true;
			else return false;
		}
		if (isset($person_privacy[$pid])) {
			if ($person_privacy[$pid]>=$PRIV_USER) return true;
			else return false;
		}
		if (userCanAccess($username)) {
			if ($type=="INDI") {
				$isdead = is_dead_id($pid);
				if ($USE_RELATIONSHIP_PRIVACY) {
					if ($isdead) return true;
					else {
						$user = getUser($username);
						if (empty($user["gedcomid"][$GEDCOM])) return false;
						if ($user["gedcomid"][$GEDCOM]==$pid) return true;
						$relationship = get_relationship($user["gedcomid"][$GEDCOM], $pid, $CHECK_MARRIAGE_RELATIONS, $MAX_RELATION_PATH_LENGTH);
						if ($relationship!==false) return true;
						else return false;
					}
				}
				else {
					if ($isdead) {
						if ($SHOW_DEAD_PEOPLE>=getUserAccessLevel($username)) return true;
						else return false;
					}
					else {
						if (empty($username)) return false;
						if ($SHOW_LIVING_NAMES>=getUserAccessLevel($username)) return true;
						else return false;
					}
				}
			}
		}
	}
	//-- check the person privacy array for an exception
	if (isset($person_privacy[$pid])) {
		if ($person_privacy[$pid]>=getUserAccessLevel($username)) return true;
		else return false;
	}

	//-- look for an Ancestral File RESN (restriction) tag
	if (isset($PRIVACY_BY_RESN) && ($PRIVACY_BY_RESN==true)) {
		$gedrec = find_gedcom_record($pid);
		if (preg_match("/1 RESN/", $gedrec)>0) return false;
	}

	if ($type=="INDI") {
		//-- option to keep person living if they haven't been dead very long
		if ($PRIVACY_BY_YEAR) {
			$cyear = date("Y");
			$indirec = find_person_record($pid);
			//-- check death record
			$deatrec = get_sub_record(1, "1 DEAT", $indirec);
			$ct = preg_match("/2 DATE .*(\d\d\d\d).*/", $deatrec, $match);
			if ($ct>0) {
				$dyear = $match[1];
				if (($cyear-$dyear) <= $MAX_ALIVE_AGE-25) return false;
			}

			//-- check marriage records
			$famids = find_sfamily_ids($pid);
			foreach($famids as $indexval => $famid) {
				$famrec = find_family_record($famid);
				//-- check death record
				$marrrec = get_sub_record(1, "1 MARR", $indirec);
				$ct = preg_match("/2 DATE .*(\d\d\d\d).*/", $marrrec, $match);
				if ($ct>0) {
					$myear = $match[1];
					if (($cyear-$myear) <= $MAX_ALIVE_AGE-15) return false;
				}
			}

			//-- check birth record
			$birtrec = get_sub_record(1, "1 BIRT", $indirec);
			$ct = preg_match("/2 DATE .*(\d\d\d\d).*/", $birtrec, $match);
			if ($ct>0) {
				$byear = $match[1];
				if (($cyear-$byear) <= $MAX_ALIVE_AGE) return false;
			}
		}
//		$disp = is_dead_id($pid);
		if (is_dead_id($pid)) {
			if ($SHOW_DEAD_PEOPLE>=getUserAccessLevel($username)) return true;
			else return false;
		}
		else {
            if (empty($username)) return false;
//            print "(show living names constant - ".$SHOW_LIVING_NAMES.", user access level - ".getUserAccessLevel($username).") ";
			if ($SHOW_LIVING_NAMES>getUserAccessLevel($username)) return true;
			else return false;
		}
	}
    if ($type=="FAM") {
	    //-- check if we can display both parents
		$parents = find_parents($pid);
		$display = displayDetailsByID($parents["HUSB"]);
		if ($display) {
			$display = displayDetailsByID($parents["WIFE"]);
		}
		return $display;
    }
    if ($type=="SOUR") {
	    if ($SHOW_SOURCES>=getUserAccessLevel($username)) return true;
		else return false;
    }
    return true;
}
}

//-- allow users to overide functions in privacy file
if (!function_exists("showLivingName")) {
/**
 * check if the name of the GEDCOM record should be shown
 *
 *
 * This function checks if the name of the given GEDCOM record represented by <var>$indirec</var>
 * should be shown.  This function has been depricated and now all it does is looks up the GEDCOM
 * XRef ID and type from the gedcom record and pass them as parameters to the
 * <code>showLivingNameByID</code> function.
 *
 * @deprecated	This function has been deprecated by the showLivingNameByID function, it is still
 *				provided for backwards compatibility but it should no longer be used in new code
 * @param	string $indirec the raw gedcom record to check privacy settings for
 * @return	boolean return true to show the persons details, return false to keep them private
 */
function showLivingName($indirec) {
	global $SHOW_LIVING_NAMES, $PRIV_PUBLIC, $PRIV_USER, $PRIV_NONE;

	//-- get the id from the record
	$ct = preg_match("/0 @(.*)@ INDI/", $indirec, $match);
	if ($ct>0) $pid = $match[1];
	else $pid=0;

	return showLivingNameByID($pid);
}
}

//-- allow users to overide functions in privacy file
if (!function_exists("showLivingNameByID")) {
/**
 * check if the name for a GEDCOM XRef ID should be shown
 *
 * This function uses the settings in the global variables above to determine if the current user
 * has sufficient privileges to access the GEDCOM resource.  It first checks the
 * <var>$SHOW_LIVING_NAMES</var> variable to see if names are shown to the public.  If they are
 * then this function will always return true.  If the name is hidden then all relationships
 * connected with the individual are also hidden such that arriving at this record results in a dead
 * end.
 *
 * @author	yalnifj
 * @param	string $pid the GEDCOM XRef ID for the entity to check privacy settings for
 * @return	boolean return true to show the person's name, return false to keep it private
 */
function showLivingNameByID($pid) {
	global $SHOW_LIVING_NAMES, $PRIV_PUBLIC, $PRIV_USER, $PRIV_NONE, $person_privacy, $user_privacy;

	if ((displayDetailsById($pid)) || ($SHOW_LIVING_NAMES>=getUserAccessLevel())) return true;
	return false;
/*
	$username = getUserName();
	if (!empty($username)) {
		//-- admin users can see everything
		if (userGedcomAdmin($username)) return true;
		if (isset($user_privacy[$username]["all"])) {
			if ($user_privacy[$username]["all"] < $PRIV_USER) return false;
			else return true;
		}
		if (isset($user_privacy[$username][$pid])) {
			if ($user_privacy[$username][$pid] < $PRIV_USER) return false;
			else return true;
		}
		if (isset($person_privacy[$pid])) {
			if ($person_privacy[$pid] < $PRIV_USER) return false;
			else return true;
		}
		if ($SHOW_LIVING_NAMES>=getUserAccessLevel($username)) return true;
	}
	//-- check the person privacy array for an exception
	if (isset($person_privacy[$pid])) {
		switch ($person_privacy[$pid]) {
			case $PRIV_PUBLIC:
				return true;
				break;
			default:
				return false;
				break;
		}
	}
	*/

}
}

//-- allow users to overide functions in privacy file
if (!function_exists("showFact")) {
/**
 * check if the given GEDCOM fact for the given individual, family, or source XRef ID should be shown
 *
 * This function uses the settings in the global variables above to determine if the current user
 * has sufficient privileges to access the GEDCOM resource.  It first checks the $global_facts array
 * for admin override settings for the fact.
 *
 * @author	yalnifj
 * @param	string $fact the GEDCOM fact tag to check the privacy settings
 * @param	string $pid the GEDCOM XRef ID for the entity to check privacy settings
 * @return	boolean return true to show the fact, return false to keep it private
 */
function showFact($fact, $pid) {
	global $PRIV_PUBLIC, $PRIV_USER, $PRIV_NONE, $PRIV_HIDE;
	global $global_facts, $person_facts, $SHOW_SOURCES;

	//-- if $PRIV_HIDE even admin users won't see everything
	if (isset($global_facts[$fact]))
	{
	  if (isset($global_facts[$fact]["show"]))
	  {
	    if ($global_facts[$fact]["show"] == $PRIV_HIDE) return false;
	  }
	}
	$username = getUserName();
	//-- admin users can see everything
	if (userGedcomAdmin($username)) return true;

	//-- first check the global facts array
	if (isset($global_facts[$fact]["show"])) {
		switch ($global_facts[$fact]["show"]) {
			case $PRIV_PUBLIC:
				return true;
				break;
			case $PRIV_USER:
				if (!empty($username)) return true;
				else return false;
				break;
			default:
				return false;
				break;
		}
	}
	//-- check the person facts array
	if (isset($person_facts[$pid][$fact]["show"])) {
		switch ($person_facts[$pid][$fact]["show"]) {
			case $PRIV_PUBLIC:
				return true;
				break;
			case $PRIV_USER:
				if (!empty($username)) return true;
				else return false;
				break;
			default:
				return false;
				break;
		}
	}
	if ($fact=="SOUR") {
		if ($SHOW_SOURCES<getUserAccessLevel(getUserName())) return false;
	}
	if ($fact!="NAME") {
		$gedrec = find_gedcom_record($pid);
		//print "gedrec: ".$gedrec."<br/>";
		$disp = displayDetails($gedrec);
        //$disp = displayDetailsByID($pid);
        //print $pid ."<br/>";
        //if ($disp) print "disp: True<br/>";
		//else print "disp: false<br/>";
		return $disp;
	}
	else if (!displayDetails(find_gedcom_record($pid))) return showLivingNameById($pid);
	else return true;
}
}

//-- allow users to overide functions in privacy file
if (!function_exists("showFactDetails")) {
/**
 * check if the details of given GEDCOM fact for the given individual, family, or source XRef ID should be shown
 *
 * This function uses the settings in the global variables above to determine if the current user
 * has sufficient privileges to access the GEDCOM resource.  It first checks the $global_facts array
 * for admin override settings for the fact.
 *
 * @author	yalnifj
 * @param	string $fact the GEDCOM fact tag to check the privacy settings
 * @param	string $pid the GEDCOM XRef ID for the entity to check privacy settings
 * @return	boolean return true to show the fact details, return false to keep it private
 */
function showFactDetails($fact, $pid) {
	global $PRIV_PUBLIC, $PRIV_USER, $PRIV_NONE, $PRIV_HIDE;
	global $global_facts, $person_facts;

	//-- if $PRIV_HIDE even admin users won't see everything
	if (isset($global_facts[$fact]))
	{
	  if (isset($global_facts[$fact]["details"]))
	  {
	    if ($global_facts[$fact]["details"] == $PRIV_HIDE) return false;
	  }
	}

	$username = getUserName();
	//-- admin users can see everything
	if (userGedcomAdmin($username)) return true;
	//-- first check the global facts array
	if (isset($global_facts[$fact]["details"])) {
		switch ($global_facts[$fact]["details"]) {
			case $PRIV_PUBLIC:
				return true;
				break;
			case $PRIV_USER:
				if (!empty($username)) return true;
				else return false;
				break;
			default:
				return false;
				break;
		}
	}
	//-- check the person facts array
	if (isset($person_facts[$pid][$fact]["details"])) {
		switch ($person_facts[$pid][$fact]["details"]) {
			case $PRIV_PUBLIC:
				return true;
				break;
			case $PRIV_USER:
				if (!empty($username)) return true;
				else return false;
				break;
			default:
				return false;
				break;
		}
	}
	return true;
}
}

/**
 * remove all private information from a gedcom record
 *
 * this function will analyze and gedcom record and privatize it by removing all private
 * information that should be hidden from the user trying to access it.
 * @param string $gedrec the raw gedcom record to privatize
 * @return string the privatized gedcom record
 */
function privatize_gedcom($gedrec) {
	global $pgv_lang, $GEDCOM;
	$gt = preg_match("/0 @(.+)@ (.+)/", $gedrec, $gmatch);
	if ($gt > 0) {
		$gid = trim($gmatch[1]);
		$type = trim($gmatch[2]);

		$disp = displayDetailsById($gid, $type);
		//print "[$gid $type $disp]";
		//-- check if the whole record is private
		if (!$disp) {
			//-- check if name should be private
			if (($type=="INDI")&&(!showLivingNameById($gid))) {
				$newrec = "0 @".$gid."@ INDI\r\n";
				$newrec .= "1 NAME " . $pgv_lang["private"] . " /" . $pgv_lang["private"] . "/" . "\r\n";
				$newrec .= "2 SURN " . $pgv_lang["private"] . "\r\n";
				$newrec .= "2 GIVN " . $pgv_lang["private"] . "\r\n";
			}
			else if ($type=="SOUR") {
				$newrec = "0 @".$clipping['id']."@ SOUR\r\n";
				$newrec .= "1 TITL ".$pgv_lang["private"]."\r\n";
			}
			else {
				$newrec = "0 @".$gid."@ $type\r\n";
				if ($type=="INDI") {
					$chil = get_sub_record(1, "1 NAME", $gedrec);
					if (!empty($chil)) $newrec .= trim($chil)."\r\n";
					$chil = get_sub_record(1, "1 FAMC", $gedrec);
					$i=1;
					while (!empty($chil)) {
						$newrec .= trim($chil)."\r\n";
						$i++;
						$chil = get_sub_record(1, "1 FAMC", $gedrec, $i);
					}
					$chil = get_sub_record(1, "1 FAMS", $gedrec);
					$i=1;
					while (!empty($chil)) {
						$newrec .= trim($chil)."\r\n";
						$i++;
						$chil = get_sub_record(1, "1 FAMS", $gedrec, $i);
					}
				}
				else if ($type=="SOUR") {
					$chil = get_sub_record(1, "1 ABBR", $gedrec);
					if (!empty($chil)) $newrec .= trim($chil)."\r\n";
					$chil = get_sub_record(1, "1 TITL", $gedrec);
					if (!empty($chil)) $newrec .= trim($chil)."\r\n";
				}
				else if ($type=="FAM") {
					$chil = get_sub_record(1, "1 HUSB", $gedrec);
					if (!empty($chil)) $newrec .= trim($chil)."\r\n";
					$chil = get_sub_record(1, "1 WIFE", $gedrec);
					if (!empty($chil)) $newrec .= trim($chil)."\r\n";
					$chil = get_sub_record(1, "1 CHIL", $gedrec);
					$i=1;
					while (!empty($chil)) {
						$newrec .= trim($chil)."\r\n";
						$i++;
						$chil = get_sub_record(1, "1 CHIL", $gedrec, $i);
					}
				}
			}
			$newrec .= "1 NOTE ".trim($pgv_lang["person_private"])."\r\n";
			//print $newrec;
			return $newrec;
		}
		else {
			$newrec = "0 @".$gid."@ $type\r\n";
			//-- check all of the sub facts for access
			$subs = get_all_subrecords($gedrec, "", false, false);
			$user = getUser(getUserName());
			foreach($subs as $indexval => $sub) {
				if (FactViewRestricted($gid, $sub)==false) $newrec .= $sub;
			}
			return $newrec;
		}
	}
	else {
		//-- not a valid gedcom record
		return $gedrec;
	}
}

/**
 * get current user's access level
 *
 * checks the current user and returns their privacy access level
 * @return int		their access level
 */
function getUserAccessLevel($username="") {
	global $PRIV_PUBLIC, $PRIV_NONE, $PRIV_USER, $GEDCOM;

	if (empty($username)) $username = getUserName();
	if (empty($username)) return $PRIV_PUBLIC;

	if (userGedcomAdmin($username)) return $PRIV_NONE;
	if (userCanAccess($username)) return $PRIV_USER;
	return $PRIV_PUBLIC;
}

/**
 * Check fact record for editing restrictions
 *
 * Checks if the user is allowed to change fact information,
 * based on the existence of the RESN tag in the fact record.
 *
 * @return int		Allowed or not allowed
 */
function FactEditRestricted($pid, $factrec) {
	global $GEDCOM;
	$user = getUser(getuserName());
	$myindi = "";
	if (isset($user["gedcomid"][$GEDCOM])) trim($myindi = $user["gedcomid"][$GEDCOM]);
	$ct = preg_match("/2 RESN (.*)/", $factrec, $match);
	if ($ct == 0) return false;
	if ($ct > 0) {
		$match[1] = strtolower(trim($match[1]));
		if ($match[1] == "none") return false;
		if ((($match[1] == "confidential") || ($match[1] == "locked")) && ((userIsAdmin(getUserName())) || (userGedcomAdmin(getUserName())))) return false;
		if (($match[1] == "privacy") && ((userIsAdmin(getUserName())) || ($myindi == $pid) || (userGedcomAdmin(getUserName())))) return false;
		if (substr($pid,0,1) == "F"){
			$famrec = find_family_record($pid);
			$parents = find_parents_in_record($famrec);
			if (($match[1] == "privacy") && ((userIsAdmin(getUserName())) || ($myindi == $parents["HUSB"]) || (userGedcomAdmin(getUserName())))) return false;
			if (($match[1] == "privacy") && ((userIsAdmin(getUserName())) || ($myindi == $parents["WIFE"]) || (userGedcomAdmin(getUserName())))) return false;
		}
	}
	return true;
}

/**
 * Check fact record for viewing restrictions
 *
 * Checks if the user is allowed to view fact information,
 * based on the existence of the RESN tag in the fact record.
 *
 * @return int		Allowed or not allowed
 */
function FactViewRestricted($pid, $factrec) {
	global $GEDCOM;
	$user = getUser(getuserName());
	$myindi = "";
	if (isset($user["gedcomid"][$GEDCOM])) $myindi = trim($user["gedcomid"][$GEDCOM]);
	$pid = trim($pid);
	$ct = preg_match("/2 RESN (.*)/", $factrec, $match);
	if ($ct == 0) return false;
	if ($ct > 0) {
		$match[1] = strtolower(trim($match[1]));
		if ($match[1] == "none") return false;
		if ($match[1] == "locked") return false;
		if (($match[1] == "confidential") && ((userIsAdmin(getUserName())) || (userGedcomAdmin(getUserName())))) return false;
		if (($match[1] == "privacy") && ((userIsAdmin(getUserName())) || ($myindi == $pid) || (userGedcomAdmin(getUserName())))) return false;
		if (substr($pid,0,1) == "F"){
			$famrec = find_family_record($pid);
			$parents = find_parents_in_record($famrec);
			if (($match[1] == "privacy") && ((userIsAdmin(getUserName())) || ($myindi == $parents["WIFE"]) || (userGedcomAdmin(getUserName())))) return false;
			if (($match[1] == "privacy") && ((userIsAdmin(getUserName())) || ($myindi == $parents["HUSB"]) || (userGedcomAdmin(getUserName())))) return false;
		}
	}
	return true;
}


?>