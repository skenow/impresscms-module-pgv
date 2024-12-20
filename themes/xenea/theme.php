<?php
/**
 * Xenea theme
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
 * @subpackage Themes
 * @version $Id: theme.php,v 1.3 2006/03/06 00:26:33 skenow Exp $
 */

$theme_name = "Xenea";		//-- the name of this theme

$stylesheet = $THEME_DIR."style.css";	//-- CSS level 2 stylesheet to use
$print_stylesheet = $THEME_DIR."print.css";	//-- CSS level 2 print stylesheet to use
$toplinks = $THEME_DIR."toplinks.html";	//-- File to display the icons and links to different sections
$headerfile = $THEME_DIR."header.html";	//-- Header information for the site
$footerfile = $THEME_DIR."footer.html";	//-- Footer information for the site
$print_footerfile = $THEME_DIR."print_footer.html";	//-- Print Preview Footer information for the site
$print_headerfile = $THEME_DIR."print_header.html";	//-- Print Preview Header information for the site
$PGV_IMAGE_DIR = $THEME_DIR."images";		//-- directory to look for images

$PGV_USE_HELPIMG = true;		// set to true to use image for help questionmark, set to false to use $pgv_lang["qm"]

//-- variables for image names
//- PGV main icons
$PGV_IMAGES["gedcom"]["large"] = "gedcom.gif";
$PGV_IMAGES["help"]["large"] = "help.gif";
$PGV_IMAGES["indis"]["large"] = "indis.gif";
$PGV_IMAGES["media"]["large"] = "media.gif";
$PGV_IMAGES["notes"]["large"] = "notes.gif";
$PGV_IMAGES["pedigree"]["large"] = "pedigree.gif";
$PGV_IMAGES["sfamily"]["large"] = "sfamily.gif";
$PGV_IMAGES["search"]["large"] = "search.gif";
$PGV_IMAGES["reports"]["large"] = "report.gif";
$PGV_IMAGES["source"]["large"] = "source.gif";
$PGV_IMAGES["repository"]["large"] = "repository.gif";

//- Theme main icons
$PGV_IMAGES["calendar"]["large"] = "calendar.gif";
$PGV_IMAGES["clippings"]["large"] = "clippings.gif";
$PGV_IMAGES["mygedview"]["large"] = "my_gedview.gif";

//- PGV small icons
$PGV_IMAGES["admin"]["small"] = "small/admin.gif";
$PGV_IMAGES["ancestry"]["small"] = "small/ancestry.gif";
$PGV_IMAGES["calendar"]["small"] = "small/calendar.gif";
$PGV_IMAGES["cfamily"]["small"] = "small/cfamily.gif";
$PGV_IMAGES["clippings"]["small"] = "small/clippings.gif";
$PGV_IMAGES["edit_indi"]["small"] = "small/edit_indi.gif";
$PGV_IMAGES["edit_fam"]["small"] = "small/edit_fam.gif";
$PGV_IMAGES["fanchart"]["small"] = "small/fanchart.gif";
$PGV_IMAGES["gedcom"]["small"] = "small/gedcom.gif";
$PGV_IMAGES["help"]["small"] = "small/help.gif";
$PGV_IMAGES["indis"]["small"] = "small/indis.gif";
$PGV_IMAGES["mygedview"]["small"] = "small/my_gedview.gif";
$PGV_IMAGES["patriarch"]["small"] = "small/patriarch.gif";
$PGV_IMAGES["pedigree"]["small"] = "small/pedigree.gif";
$PGV_IMAGES["search"]["small"] = "small/search.gif";
$PGV_IMAGES["sex"]["small"] = "small/male.gif";
$PGV_IMAGES["sexf"]["small"] = "small/female.gif";
$PGV_IMAGES["sexn"]["small"] = "small/fe_male.gif";
$PGV_IMAGES["sfamily"]["small"] = "small/sfamily.gif";
$PGV_IMAGES["statistic"]["small"] = "small/statistic.gif";
$PGV_IMAGES["timeline"]["small"] = "small/timeline.gif";
$PGV_IMAGES["reports"]["small"] = "small/report.gif";
$PGV_IMAGES["hourglass"]["small"] = "small/hourglass.gif";

//- Theme small icons
$PGV_IMAGES["descendant"]["small"] = "small/descendancy.gif";
$PGV_IMAGES["media"]["small"] = "small/media.gif";
$PGV_IMAGES["place"]["small"] = "small/place.gif";
$PGV_IMAGES["relationship"]["small"] = "small/relationship.gif";
$PGV_IMAGES["source"]["small"] = "small/source.gif";
$PGV_IMAGES["repository"]["small"] = "small/repository.gif";

//- other images
$PGV_IMAGES["dline2"]["other"] = "dline2.gif";
$PGV_IMAGES["dline"]["other"] = "dline.gif";
$PGV_IMAGES["hline"]["other"] = "hline.gif";
$PGV_IMAGES["spacer"]["other"] = "spacer.gif";
$PGV_IMAGES["gedview"]["other"] = "gedview.gif";
$PGV_IMAGES["larrow2"]["other"] = "larrow2.gif";
$PGV_IMAGES["larrow"]["other"] = "larrow.gif";
$PGV_IMAGES["minus"]["other"] = "minus.gif";
$PGV_IMAGES["note"]["other"] = "notes.gif";
$PGV_IMAGES["plus"]["other"] = "plus.gif";
$PGV_IMAGES["rarrow2"]["other"] = "rarrow2.gif";
$PGV_IMAGES["rarrow"]["other"] = "rarrow.gif";
$PGV_IMAGES["uarrow"]["other"] = "uarrow.gif";
$PGV_IMAGES["uarrow2"]["other"] = "uarrow2.gif";
$PGV_IMAGES["darrow"]["other"] = "darrow.gif";
$PGV_IMAGES["darrow2"]["other"] = "darrow2.gif";
$PGV_IMAGES["vline"]["other"] = "vline.gif";
$PGV_IMAGES["uarrow3"]["other"] = "uarrow3.gif";
$PGV_IMAGES["zoomin"]["other"] = "zoomin.gif";
$PGV_IMAGES["zoomout"]["other"] = "zoomout.gif";
$PGV_IMAGES["rdarrow"]["other"] = "rdarrow.gif";
$PGV_IMAGES["udarrow"]["other"] = "udarrow.gif";
$PGV_IMAGES["ldarrow"]["other"] = "ldarrow.gif";
$PGV_IMAGES["ddarrow"]["other"] = "ddarrow.gif";

//- digits
$PGV_IMAGES["0"]["digit"] = "0.jpg";
$PGV_IMAGES["1"]["digit"] = "1.jpg";
$PGV_IMAGES["2"]["digit"] = "2.jpg";
$PGV_IMAGES["3"]["digit"] = "3.jpg";
$PGV_IMAGES["4"]["digit"] = "4.jpg";
$PGV_IMAGES["5"]["digit"] = "5.jpg";
$PGV_IMAGES["6"]["digit"] = "6.jpg";
$PGV_IMAGES["7"]["digit"] = "7.jpg";
$PGV_IMAGES["8"]["digit"] = "8.jpg";
$PGV_IMAGES["9"]["digit"] = "9.jpg";

//-- This section defines variables for the pedigree chart
$bwidth = 220;		// -- width of boxes on pedigree chart
$bheight = 80;		// -- height of boxes on pedigree chart
$baseyoffset = 10;	// -- position the entire pedigree tree relative to the top of the page
$basexoffset = 10;	// -- position the entire pedigree tree relative to the left of the page
$bxspacing = 1;		// -- horizontal spacing between boxes on the pedigree chart
$byspacing = 2;		// -- vertical spacing between boxes on the pedigree chart

// -- global variables for the descendancy chart
$Dbaseyoffset = 0;	// -- position the entire descendancy tree relative to the top of the page
$Dbasexoffset = 0;		// -- position the entire descendancy tree relative to the left of the page
$Dbxspacing = 1;		// -- horizontal spacing between boxes
$Dbyspacing = 2;		// -- vertical spacing between boxes
$Dbwidth = 250;			// -- width of DIV layer boxes
$Dbheight = 80;			// -- height of DIV layer boxes
$Dindent = 15;			// -- width to indent descendancy boxes
$Darrowwidth = 15;		// -- additional width to include for the up arrows

$CHARTS_CLOSE_HTML = false;		//-- should the charts, pedigree, descendacy, etc clost the HTML on the page

// Arrow symbol or icon for up-page links on Help pages
$ImgSrc = $PGV_IMAGE_DIR."/uarrow3.gif";
$UpArrow = "<b>^&nbsp;&nbsp;</b>";
if (file_exists($ImgSrc)) $UpArrow = "<img src=\"$ImgSrc\" class=\"icon\" border=\"0\" alt=\"\" />";
$pgv_lang["UpArrow"] = $UpArrow;	// help_text.xx.php requires this _untranslatable_ term!

?>