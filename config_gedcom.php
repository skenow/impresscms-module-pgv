<?php
/**
 * Default Gedcom configuration file
 *
 * The variables in this file are the Gedcom configuration variables, this file defines the default
 * settings. Site administrators may edit these settings online through the editconfig_gedcom.php
 * file.  Once edited, a new file specific to the gedcom is stored in the $INDEX_DIRECTORY
 * names gedcom.ged_conf.php.
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
 * @subpackage Admin
 * @see editconfig_gedcom.php
 * @version $Id: config_gedcom.php,v 1.1 2005/10/07 18:08:01 skenow Exp $
 */

if (preg_match("/\Wconfig_gedcom\.php/", $_SERVER["PHP_SELF"])>0) {
	print "Naughty, Naughty, Naughty!";
	exit;
}
if (preg_match("/_conf\.php/", $_SERVER["PHP_SELF"])>0) {
	print "Naughty, Naughty, Naughty!";
	exit;
}

//-- assign the default language.  User can override this setting if $ENABLE_MULTI_LANGUAGE = true
$LANGUAGE = "english";

$CALENDAR_FORMAT = "gregorian";			//-- Translate dates to the specified Calendar
										//-- options are gregorian, julian, french, jewish, jewish_and_gregorian,
										//-- hebrew, hebrew_and_gregorian
$DISPLAY_JEWISH_THOUSANDS = false;		//-- show Alafim in Jewish dates Similar to php 5.0 CAL_JEWISH_ADD_ALAFIM
$DISPLAY_JEWISH_GERESHAYIM = true;		//-- show single and double quotes in Hebrew dates. Similar to php 5.0 CAL_JEWISH_ADD_GERESHAYIM
$JEWISH_ASHKENAZ_PRONUNCIATION = true;	//-- Jewish pronunciation option
$USE_RTL_FUNCTIONS = false;				//-- Use processing to properly display GEDCOM data in RTL languages

$CHARACTER_SET = "UTF-8";				//-- This is the character set of your gedcom file.  UTF-8 is the default and should work for
										//-- almost all sites.  If you export your gedcom using ibm windows encoding, then you should put
										//-- WINDOWS here.
										//-- NOTE: PHP does NOT support UNICODE so don't try it :-)

$CREATE_GENDEX = false;					//-- whether or not to create a gendex file when importing your gedcom.  The gendex file will be placed in
										//-- the index directory

$ENABLE_MULTI_LANGUAGE = true;			//-- set to true to give users the option of selecting a different language from
										//-- a dropdown list in the footer and default to the language they have set in their browser settings
$DEFAULT_PEDIGREE_GENERATIONS = "4";	// -- set the default number of generations to display on the pedigree charts
$MAX_PEDIGREE_GENERATIONS = "10";		// -- set the max number of generations to display on the pedigree charts
$MAX_DESCENDANCY_GENERATIONS = "15";	// -- set the max number of generations to display on the descendancy charts
$USE_RIN = false;						// -- Use the RIN # instead of the regular GEDCOM ID for places where you are asked to enter an ID
$PEDIGREE_ROOT_ID = "I1";				// -- use this line to change the default person who appears on
										// -- the Pedigree tree
$GEDCOM_ID_PREFIX = "I";				// -- This is the prefix to prepend to ID numbers typed in the ID boxes on charts
$SOURCE_ID_PREFIX = "S";				// -- This is the prefix prepend to newly generated source records
$REPO_ID_PREFIX = "R";					// -- This is the prefix prepend to newly generated repository records
$FAM_ID_PREFIX = "F";					// -- This is the prefix prepend to newly generated family records
$PEDIGREE_FULL_DETAILS = true;			// -- Show the birth and death details of an individual on the pedigree tree
$PEDIGREE_LAYOUT = true;					// -- Set to true for Landscape mode, false for portrait mode
$SHOW_EMPTY_BOXES = true;				// -- Show empty boxes on charts if the person is unknown
$ZOOM_BOXES = "click";				// -- When should pedigree boxes zoom.  Values are "disabled", "mouseover", "click"
$LINK_ICONS = "mouseover";				// -- When should pedigree box extra links show up.  Values are "disabled", "mouseover", "click"
$ABBREVIATE_CHART_LABELS = false;		//-- should chart labels like "Birth" be abbreviated as "B"
$SHOW_PARENTS_AGE = true;				// -- show age of parents on charts next to the birth date

$HIDE_LIVE_PEOPLE   = true;				// -- a false value will show details of people who are still alive
$REQUIRE_AUTHENTICATION = false;		// -- set this to try to force all visitors to login before they can view anything on the site
$WELCOME_TEXT_AUTH_MODE = "1";			// -- Sets which predefined of custom welcome message will be displayed on the welcome page in authentication mode
$WELCOME_TEXT_AUTH_MODE_4 = "";			// -- Customized welcome text to display on login screen if that option is chosen
$WELCOME_TEXT_CUST_HEAD = false;		// -- Use standard PGV header to display with custom welcome text
$CHECK_CHILD_DATES  = true;             // -- When checking if a person is alive, check the children's birth dates in addition to the person's
$SHOW_GEDCOM_RECORD = true;				// -- a true value will provide a link on detail pages that will
										// --allow people to view the actual lines from the gedcom file
$ALLOW_EDIT_GEDCOM = true;				//-- allow users with canEdit privileges to edit the gedcom

$ALPHA_INDEX_LISTS = true;				// -- for very long individual and family lists, set this to true to split the list into
										// -- pages by the first letter of their last name.

$NAME_FROM_GEDCOM = false;				// -- By default phpGedView uses the name stored in the indexes to get a person's name
										// -- With some gedcom formats the sortable name stored in the indexes does not get
										// -- displayed properly and the best way to get the correct display name is from the gedcom
										// -- However, retrieving the name from the gedcom will slow the program down.
$SHOW_MARRIED_NAMES = false;			// -- Option to show the married name for females in the indilist

$SHOW_ID_NUMBERS = true;				// -- Show gedcom id numbers on charts next to individual names
$SHOW_FAM_ID_NUMBERS = true;			// -- Show gedcom id numbers on charts next to family names
$SHOW_PEDIGREE_PLACES = "9";			// -- What level to show the birth and death places next to the birth and death dates on the pedigree and descendency charts.

$MULTI_MEDIA = true;            		// -- if you have no multi-media files, set this to false
$MULTI_MEDIA_DB = false;				// -- if your gedcom contains no media and you want to keep media links between fresh imports
$MEDIA_EXTERNAL = true;            		// -- Set whether or not to change links starting with http, ftp etc.
$MEDIA_DIRECTORY = "media/";			// -- Directory where media files are stored
$MEDIA_DIRECTORY_LEVELS = "0";			// -- the number of sub-directories to keep when getting names of media files
$SHOW_HIGHLIGHT_IMAGES = true;			// -- show highlighted photos on pedigree tree and individual pages.
$USE_THUMBS_MAIN = false;				// -- for the main image on the individual page, whether or not to use the full res image or the thumbnail

$HIDE_GEDCOM_ERRORS = false;			//-- a true value will disable error messages for undefined GEDCOM codes.  See the
										//-- non-standard gedcom codes section of the readme file for more information.

$WORD_WRAPPED_NOTES = false;			//-- some programs wrap notes at word boundaries while others wrap notes anywhere
										//-- setting this to true will add a space between words where they are wrapped in the gedcom
$GEDCOM_DEFAULT_TAB = "0";				//-- this setting controls which tab on the individual page should first be displayed to visitors 

$SHOW_CONTEXT_HELP = true;				// show ? links on the page for contextual popup help
$CONTACT_EMAIL   = "you@yourdomain.com";		    // -- this is who the user should contact for more information
$CONTACT_METHOD = "messaging2";						// -- the method to allow users to contact you. options are: mailto, messaging, messaging2
$WEBMASTER_EMAIL = "webmaster@yourdomain.com";		// -- this is who the user should contact in case of errors
$SUPPORT_METHOD = "messaging2";						// -- the method to allow users to contact you. options are: mailto, messaging, messaging2
$HOME_SITE_URL   = "http://www.phpgedview.net";     // -- url for your home page
$HOME_SITE_TEXT  = "About PhpGedView";                     // -- name of your site
$FAVICON = "images/favicon.ico";                          // -- change to point to your favicon, either relative or absolute
$THEME_DIR = "themes/standard/";					// -- directory where display theme files are kept
if (substr ($THEME_DIR, -1) != "/") $THEME_DIR = $THEME_DIR . "/";
$ALLOW_THEME_DROPDOWN = false; 					//-- allows the themes to display theme change dropdown

$SHOW_STATS = false;					//-- Show execution stats at the bottom of the page
$SHOW_COUNTER = false;        //-- Show hit counters on portal and individual pages
$COMMON_NAMES_THRESHOLD	= "40";		//-- The minimum number of times a surname must appear before it is shown on the most common surnames list
$COMMON_NAMES_ADD	= "";			//-- a comma seperated list of surnames the admin can add to the common surnames list
$COMMON_NAMES_REMOVE	= "";		//-- a comma seperated list of surnames to ignore in the common surnames list

$META_AUTHOR		= "";			//-- the author of the webpage leave empty to use gedcom contact user name
$META_PUBLISHER		= "";			//-- the publisher of the web page, leave empty to use gedcom contact
$META_COPYRIGHT		= "";			//-- the copyright statement, leave empty to use gedcom contact
$META_DESCRIPTION	= "";			//-- the page description, leave empty to use the gedcom title
$META_PAGE_TOPIC	= "";			//-- the page topic, leave empty to use the gedcom title
$META_AUDIENCE		= "All";			//-- the intended audience
$META_PAGE_TYPE		= "Private Homepage";	//-- the type of page
$META_ROBOTS		= "index, follow";		//-- instructions for robots
$META_REVISIT		= "10 days";			//-- how often crawlers should reindex the site
$META_KEYWORDS		= "ancestry, genealogy, pedigree tree";		//-- any aditional keywords, the most common surnames list will be appended to anything you put in
$META_TITLE			= "";			//-- optional text that can be added to the html page <title></title> line
$META_SURNAME_KEYWORDS	= true;		//-- option to use the most common surnames in the keywords field

$CHART_BOX_TAGS		= "";		//-- optional comma seperated gedcom tags to show in chart boxes
$USE_QUICK_UPDATE	= true;		//-- whether or not to use the quick update form
$SHOW_QUICK_RESN	= false;	//-- whether or not to show RESN tags on the quick update form
$SEARCHLOG_CREATE   = "none";	//-- save searches executed by users
$SHOW_LDS_AT_GLANCE	= false;	//-- Show status of LDS ordinances in chart boxes
$UNDERLINE_NAME_QUOTES	= false;	//-- convert double quotes in names to underlines
$SPLIT_PLACES	= false;	//-- split PLAC tag into subtags (town, county, state...) in edit mode

// -- amount of time to execute before quitting in seconds
// -- set this to 0 to remove all time limits
$TIME_LIMIT = "60";

@set_time_limit($TIME_LIMIT);

?>