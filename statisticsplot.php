<?php
/*=================================================
	Project: phpGedView-MySQL
	File: statistiek.php
	Author: Dick Kaas (dick@kaas.nl)
	Comments:	Creates some statistics out of the GEDCOM information.
			We will start with the following possibilities
			* number of persons -> periodes of 10 years from 1700-2010
			* age -> periodes of 10 years (different for 0-1,1-5,5-10,10-20 etc)
	Change Log:
		31/12/03 - File Created
		20/07/04 - Redesign based on x-as, t-as, z-as input
		29/10/04 - completed with support for different languages
		20/01/05 - changed year/date notation (integer instead of string) according to statistics
			   - implemented: month first child in a marriage, month between marriage and birth, age first marriage

to be done:
	- chek presence of jpgraph routines (on your system or in phpgedview space)

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
require("config.php");

//-- You should install jpgraph routines on your computer. I implemented them in phpgedview/jpgraph/
//=== You have to check if the reference to internal subroutines (like plotmark.inc) has the right path
//=== I had to change them (by adding the directory) to jpgraph/plotmark.inc 
//-- Please check this with any availability test

//-- The info below comes from www.php.net when looking at functions

//-- Check if GD library is loaded
if (!extension_loaded('gd')) 
	{print $pgv_lang["stplGDno"] . "<BR>"; exit;}

//-- Check if JPgraph modules are available
	if ((!file_exists($PGV_BASE_DIRECTORY . "jpgraph/jpgraph.php")) or
		(!file_exists($PGV_BASE_DIRECTORY . "jpgraph/jpgraph_line.php")) or
		(!file_exists($PGV_BASE_DIRECTORY . "jpgraph/jpgraph_bar.php"))) 
	{print $pgv_lang["stpljpgraphno"] . "<BR>"; exit;};

include ($PGV_BASE_DIRECTORY . "jpgraph/jpgraph.php");
include ($PGV_BASE_DIRECTORY . "jpgraph/jpgraph_line.php");
include ($PGV_BASE_DIRECTORY . "jpgraph/jpgraph_bar.php");

function bimo($i)
{
global $x_as,$y_as, $z_as, $nrfam, $famgeg, $nrpers, $persgeg, $key2ind, $n1;

	$m= $persgeg[$i]["mbirth"];
	if ($z_as == 301)
	{	$ys= $persgeg[$i]["sex"]-1;}
	else
	{	$ys= $persgeg[$i]["ybirth"]; }

 	if ($m > 0)
	{	
//--print "bimo:".$ys." : ".$m."<br>";
		fill_ydata($ys,$m-1,1);
		$n1++;
	}
}

function bimo1($i)
{
global $x_as,$y_as, $z_as, $nrfam, $famgeg, $nrpers, $persgeg, $key2ind, $n1;

	$m= $famgeg[$i]["mbirth1"];
	if ($z_as == 301)
	{	$ys= $famgeg[$i]["sex1"]-1;}
	else
	{	$ys= $famgeg[$i]["ybirth1"]; }

 	if ($m > 0)
	{	
//--print "bimo:".$ys." : ".$m."<br>";
		fill_ydata($ys,$m-1,1);
		$n1++;
	}
}

function demo($i)
{
global $x_as,$y_as, $z_as, $nrfam, $famgeg, $nrpers, $persgeg, $key2ind, $n1;

	$m= $persgeg[$i]["mdeath"];
	if ($z_as == 301)
	{	$ys= $persgeg[$i]["sex"]-1;}
	else
	{	$ys= $persgeg[$i]["ybirth"]; }
	if ($m > 0)
	{
		fill_ydata($ys,$m-1,1);
		$n1++;
	}
}

function mamo($i)
{
global $x_as,$y_as, $z_as, $nrfam, $famgeg, $nrpers, $persgeg, $key2ind, $n1;

	$m= $famgeg[$i]["mmarr"]; $y= $famgeg[$i]["ymarr"];
//--print "mamo:".$y." : ".$m."<br>";
	if ($m > 0)
	{
		fill_ydata($y,$m-1,1);
		$n1++;
	}
}

function mamo1($i)
{
global $x_as,$y_as, $z_as, $nrfam, $famgeg, $nrpers, $persgeg, $key2ind, $n1;

	$m= $famgeg[$i]["mmarr1"]; $y= $famgeg[$i]["ymarr1"];
//--print "mamo:".$y." : ".$m."<br>";
	if ($m > 0)
	{
		fill_ydata($y,$m-1,1);
		$n1++;
	}
}

function mamam($i)
{
global $x_as,$y_as, $z_as, $nrfam, $famgeg, $nrpers, $persgeg, $key2ind, $n1;

	$m= $famgeg[$i]["mmarr"]; $y= $famgeg[$i]["ymarr"];
//--print "mamo:".$y." : ".$m."<br>";
	if ($m > 0)
	{
		$m2= $famgeg[$i]["mbirth1"]; $y2= $famgeg[$i]["ybirth1"]; 
		if ($z_as == 301)
		{	$ys= $famgeg[$i]["sex1"] - 1;}
		else
		{	$ys= $famgeg[$i]["ybirth1"]; }
		if ($m2 > 0)
		{	$mm= ($y2 - $y) * 12 + $m2 - $m;
//--print $i.":".$y."-".$m."::".$y2."-".$m2."<br>";
			fill_ydata($ys,$mm,1);
			$n1++;
		}
	}
}

function agbi($i)
{
global $x_as,$y_as, $z_as, $nrfam, $famgeg, $nrpers, $persgeg, $key2ind, $n1;

	$yb= $persgeg[$i]["ybirth"];
	$yd= $persgeg[$i]["ydeath"];
	if (($yb > 0) and ($yd > 0)) 
	{	$age= $yd - $yb;
		if ($z_as == 301)
		{	$yb= $persgeg[$i]["sex"]-1;}
		fill_ydata($yb,$age,1);
//-- print "leeftijd:" . $i . ":" . $yb . ":" . $yd . ":" . $age . "<br>";
		$n1++;
	}
}

function agde($i)
{
global $x_as,$y_as, $z_as, $nrfam, $famgeg, $nrpers, $persgeg, $key2ind, $n1;

	$yb= $persgeg[$i]["ybirth"];
	$yd= $persgeg[$i]["ydeath"];
	if (($yb > 0) and ($yd > 0)) 
	{	$age= $yd - $yb;
		if ($z_as == 301)
		{	$yd= $persgeg[$i]["sex"]-1;}
		fill_ydata($yd,$age,1);
//-- print "leeftijd:" . $i . ":" . $yb . ":" . $yd . ":" . $age . "<br>";
		$n1++;
	}
}

function agma($i)
{
global $x_as,$y_as, $z_as, $nrfam, $famgeg, $nrpers, $persgeg, $key2ind, $n1;

	$ym= $famgeg[$i]["ymarr"];
//--print "mamo:".$y." : ".$m."<br>";
	if ($ym > 0)
	{
		$xfather= $famgeg[$i]["male"];
		$xmother= $famgeg[$i]["female"];
		$j= $key2ind[$xfather];
		$j2= $key2ind[$xmother];
		$ybirth= -1; $ybirth2= -1;
		if (isset($j)  and ($xfather !== "")) {$ybirth= $persgeg[$j]["ybirth"];}
		if (isset($j2) and ($xmother !== "")) {$ybirth2= $persgeg[$j2]["ybirth"];}
		$z= $ym; $z1= $ym; 
		if ($z_as == 301) {$z= 0; $z1= 1;}
		if ($ybirth > -1) 
			{$age= $ym - $ybirth; fill_ydata($z,$age,1); $n1++;}
		if ($ybirth2 > -1) 
			{$age2= $ym - $ybirth2; fill_ydata($z1,$age2,1); $n1++;}
		if (($age < 15) or ($age > 70))
		{
//--	print ("huw:" . $xfather . ":" . $xmother . ":" . $ym . ":" . $age . ":" .$age2 . ":" . $mm . "<BR>");
		}
	}
}

function agma1($i)
{
global $x_as,$y_as, $z_as, $nrfam, $famgeg, $nrpers, $persgeg, $key2ind, $n1;

	$ym= $famgeg[$i]["ymarr"];
//--print "mamo:".$y." : ".$m."<br>";
	if ($ym > -1)
	{
		$xfather= $famgeg[$i]["male"];
		$xmother= $famgeg[$i]["female"];
		$j= $key2ind[$xfather];
		$j2= $key2ind[$xmother];
		$ybirth= -1; $ybirth2= -1;
		if (isset($j)  and ($xfather !== "")) 
			{$ybirth=  $persgeg[$j]["ybirth"];  $ymf= $persgeg[$j]["ymarr1"];}
		if (isset($j2) and ($xmother !== "")) 
			{$ybirth2= $persgeg[$j2]["ybirth"]; $ymm= $persgeg[$j2]["ymarr1"];}
		$z= $ym; $z1= $ym; 
		if ($z_as == 301) {$z= 0; $z1= 1;}
		if (($ybirth > -1) and ($ymf > -1) and ($ym == $ymf)) 
			{	
				{$age= $ym - $ybirth; fill_ydata($z,$age,1); $n1++;}
			}
		if (($ybirth2 > -1) and ($ymm > -1) and ($ym == $ymm)) 
			{	
				{$age2= $ym - $ybirth2; fill_ydata($z1,$age2,1); $n1++;}
			}
		if (($age < 15) or ($age > 70))
		{
//--	print ("huw:" . $xfather . ":" . $xmother . ":" . $ym . ":" . $age . ":" .$age2 . ":" . $mm . "<BR>");
		}
	}
}


function nuch($i)
{
global $x_as,$y_as, $z_as, $nrfam, $famgeg, $nrpers, $persgeg, $key2ind, $n1;

	$c= $famgeg[$i]["mmarr"]; $y= $famgeg[$i]["ymarr"];
//--print "mamo:".$y." : ".$m."<br>";
//--	if ($m > 0)
	{
		fill_ydata($y,$c,1);
		$n1++;
	}
}


function fill_ydata($z,$x,$val)
{
global $x_as,$y_as, $z_as, $nrfam, $famgeg, $nrpers, $persgeg, $key2ind, $n1;
global $legend, $xdata, $ydata, $xmax, $xgrenzen, $zmax, $zgrenzen, $xgiven,$zgiven, $percentage, $man_vrouw;
global $pgv_lang;
//--	calculate index $i out of given z value
//--	calculate index $j out of given x value

//--print "z,x,val,xgrenzen,zgrenzen".$z .":".$x.":".$val.":".$xgiven.":".$zgiven."<br>";
	if ($xgiven)
	{	$j= $x;}
	else
	{	$j=0;
		while (($x > $xgrenzen[$j]) and ($j < $xmax)) 
		{
//--print "xgrenzen:".$xgrenzen[$j].":".$x."==<br>"; 
			$j++;
		}
	}
	if ($zgiven)
	{	$i= $z;}
	else
	{	$i=0;
		while (($z > $zgrenzen[$i]) and ($i < $zmax)) 
		{
//--print "zgrenzen:".$zgrenzen[$i].":".$z."==<br>";
			$i++;
		}
	}
	$ydata[$i][$j]= $ydata[$i][$j] + $val;
//--	print "z,x,i,j:" . $z . ":" . $x . ":" . $i . ":" . $j ."<BR>";
}

function myplot($mytitle,$n,$xdata,$xtitle,$ydata,$ytitle,$legend)
{
$colors= array("blue","orange","red","brown","green","yellow");

global $x_as,$y_as, $z_as, $nrfam, $famgeg, $nrpers, $persgeg, $key2ind, $n1;
global $legend, $xdata, $ydata, $xmax, $xgrenzen, $zmax, $zgrenzen, $xgiven,$zgiven, $percentage;
global $pgv_lang;
$b= array();

	$graph= new Graph(700,400,"auto");
	$graph-> SetScale("textlin");
	$graph->title->Set($mytitle);
	$graph->title->SetColor("darkred");
	$graph->xaxis->SetTickLabels($xdata);
	$graph->xaxis->title->Set($xtitle);
	$graph->yaxis->title->Set($ytitle);
	$graph->yaxis->scale->SetGrace(20);
	$graph->xaxis->scale->SetGrace(20);
//--print "myplot".$n.":".$percentage . ":".$xmax."<br>";
	for($i=0; $i<$n; $i++) 
	{
		if ($percentage)
		{	$sum= 0;
			for ($j=0; $j<$xmax;$j++)
			{	$sum= $ydata[$i][$j] + $sum;
			}
			for ($j=0; $j<$xmax; $j++)
			{	if ($sum > 0)
				{	$ynew= $ydata[$i][$j] / $sum * 100;
					settype($ynew, 'integer'); $ydata[$i][$j]= $ynew; 
				}
			}
		}
		$b[$i]=new BarPlot($ydata[$i]);
		$b[$i] ->SetFillColor($colors[$i]);
		$b[$i] ->Setlegend($legend[$i]);
		$b[$i] ->value->Show();
		$b[$i] ->value->SetFormat('%d');
	}
	if ($n==1) {$accbar = new GroupBarPlot(array($b[0]));}
	if ($n==2) {$accbar = new GroupBarPlot(array($b[0],$b[1]));}
	if ($n==3) {$accbar = new GroupBarPlot(array($b[0],$b[1],$b[2]));}
	if ($n==4) {$accbar = new GroupBarPlot(array($b[0],$b[1],$b[2],$b[3]));}
	if ($n==5) {$accbar = new GroupBarPlot(array($b[0],$b[1],$b[2],$b[3],$b[4]));}

	$graph-> Add($accbar);
	$graph-> Stroke();
}

function get_plot_data()
{
	global $GEDCOM, $GEDCOMS, $INDEX_DIRECTORY, $BUILDING_INDEX, $indilist, $famlist, $sourcelist, $otherlist;
global $x_as,$y_as, $z_as, $nrfam, $famgeg, $nrpers, $persgeg, $key2ind, $n1;
global $legend, $xdata, $ydata, $xmax, $xgrenzen, $zmax, $zgrenzen, $xgiven,$zgiven, $percentage, $man_vrouw;
global $pgv_lang;

	$indexfile = $INDEX_DIRECTORY.$GEDCOM."_statistiek.php";
		if (file_exists($indexfile)) 
		{
			//require($indexfile);
			$fp = fopen($indexfile, "rb");
//--			if (!$fp) 
//--			{
//--				print "<font class=\"error\">".$pgv_lang["unable_to_create_index"]."</font>";
//--				exit;
//--			}
		      $fcontents = fread($fp, filesize($indexfile));
		      fclose($fp);
			$lists = unserialize($fcontents);
			unset($fcontents);
			$famgeg = $lists["famgeg"];
			$persgeg = $lists["persgeg"];
			$key2ind = $lists["key2ind"];
			$nrfam= count($famgeg);
			$nrpers= count($persgeg);
		}
}

function calc_axis($xas_grenzen)
{
global $x_as,$y_as, $z_as, $nrfam, $famgeg, $nrpers, $persgeg, $key2ind, $n1;
global $legend, $xdata, $ydata, $xmax, $xgrenzen, $zmax, $zgrenzen, $xgiven,$zgiven, $percentage, $man_vrouw;
global $pgv_lang;

//calculate xdata and zdata elements out of given POST values
$hulpar= array();

	$hulpar= explode(",",$xas_grenzen);
//--print "string x-as".$xas_grenzen."<BR>";
//--for ($k=0;$k<10;$k++) {print "grenzen x-as:" . $k .":" . $hulpar[$k];}print "<br>";
	$i=1; $xdata[0]= "<=" . "$hulpar[0]"; $xgrenzen[0]= $hulpar[0]-1;
	while (isset($hulpar[$i]))
	{	$i1= $i-1; 
		if (($hulpar[$i] - $hulpar[$i1]) == 1) {$xdata[$i]= "$hulpar[$i1]";}
		else
		{	$xdata[$i]= "$hulpar[$i1]" . "-" . "$hulpar[$i]";} 
		$xgrenzen[$i]= $hulpar[$i]; $i++;
//--print " xgrenzen:".$i.":".$xgrenzen[$i-1].":".$xdata[$i-1].":<BR>";
	}
	$xmax= $i; $xmax1= $xmax-1; $xdata[$xmax]= "=>" . "$hulpar[$xmax1]"; $xgrenzen[$xmax]= 10000;
	$xmax= $xmax+1;
	if ($xmax > 20) {$xmax=20;}
}

function calc_legend($grenzen_zas)
{
global $x_as,$y_as, $z_as, $nrfam, $famgeg, $nrpers, $persgeg, $key2ind, $n1;
global $legend, $xdata, $ydata, $xmax, $xgrenzen, $zmax, $zgrenzen, $xgiven,$zgiven, $percentage, $man_vrouw;
global $pgv_lang;

// calculate the legend values
$hulpar= array();
//-- get numbers out of $grenzen_zas

	$hulpar= explode(",",$grenzen_zas);
//--print "string z-as".$grenzen_zas."<BR>";
//--for ($k=0;$k<10;$k++) {print "grenzen z-as" . $k .":" . $hulpar[$k];} print "<br>";
	$i=1; $legend[0]= "<" . "$hulpar[0]"; $zgrenzen[0]= $hulpar[0]-1;
	while (isset($hulpar[$i]))
	{	$i1= $i-1; 
		$legend[$i]= "$hulpar[$i1]" . "-" . "$hulpar[$i]"; 
		$zgrenzen[$i]= $hulpar[$i]; $i++;
//--print " zgrenzen:".$i.":".$zgrenzen[$i-1].":".$legend[$i-1].":<BR>";
	}
	$zmax= $i; $zmax1= $zmax-1; 
	$legend[$zmax]= ">" . "$hulpar[$zmax1]"; 
	$zgrenzen[$zmax]= 10000;
	$zmax= $zmax+1;
	if ($zmax > 5) {$zmax=5;}
}

//--------------------nr,-----bron ,xgiven,zgiven,title, xtitle,ytitle,grenzen_xas, grenzen-zas,functie,
function set_params($current,$indfam, $xg,  $zg, $titstr,  $xt, $yt, $gx, $gz, $myfunc)
{
global $x_as,$y_as, $z_as, $nrfam, $famgeg, $nrpers, $persgeg, $key2ind, $n1;
global $legend, $xdata, $ydata, $xmax, $xgrenzen, $zmax, $zgrenzen, $xgiven,$zgiven, $percentage, $man_vrouw;
global $pgv_lang;

$monthdata= array("jan","feb","mar","apr","may","jun","jul","aug","sep","oct","nov","dec");
$qdata=     array("Q1","Q2","Q3","Q4");
$hdata=     array("H1","H2");

//--print "xas: " . $x_as . " current: " . $current . "<br>";
if ($x_as == $current)
{
	$xgiven= $xg; $zgiven= $zg;
	$title= $pgv_lang["$titstr"];
	$xtitle= $pgv_lang["$xt"]; $ytitle= $pgv_lang["stplnumbers"];
	$grenzen_xas= $gx; $grenzen_zas= $gz;
	if ($xg == true)
	{	if ($grenzen_xas == "1,2,3,4,5,6,7,8,9,10,11,12")
		{	$xdata=$monthdata; $xmax=12;}
		else
		{	$xgiven= false; calc_axis($grenzen_xas);
			if ($grenzen_xas == "3,6,9,12")
			{	$xdata=$qdata; $xmax=4;}
			else if ($grenzen_xas == "6,12")
			{	$xdata=$hdata; $xmax=2;}
		}
	}
	else
	{ 	calc_axis($grenzen_xas);}
	calc_legend($grenzen_zas);

	$percentage= false; $ytitle= $pgv_lang["stplnumbers"];
	if ($y_as == 201) {$percentage= false; $ytitle= $pgv_lang["stplnumbers"];}
	else
	if ($y_as == 202) {$percentage= true;  $ytitle= $pgv_lang["stplperc"];}

	$man_vrouw= false;
	if ($z_as == 300)
	{	$zgiven= false;
		$legend[0]= "all"; $zmax=1; $zgrenzen[0]= 100000;
	}
	else if ($z_as == 301) 
	{	$man_vrouw= true; $zgiven= true;
		$legend[0]= $pgv_lang["male"]; $legend[1]= $pgv_lang["female"]; $zmax=2; 
		$xtitle= $xtitle . $pgv_lang["stplmf"];
	}
	else if ($z_as == 302)
	{	$xtitle= $xtitle . $pgv_lang["stplipot"];}


//-- reset the data array
	for($i=0; $i<$zmax; $i++) 
	{	for($j=0; $j<$xmax; $j++) 
		{	$ydata[$i][$j]= 0;
		}
	}

	if ($indfam == "IND") {$nrmax= $nrpers;} else {$nrmax= $nrfam;}
//--print "nmax".$nrmax.":".$xg.":".$zg.":"."<br>";
	if (!function_exists($myfunc)) 
		{print "not implemented function" . $xas . "<BR>"; exit;}
	for ($i=0; $i < $nrmax; $i++) 
	{	
//--print "main:" . $i . "<br>";
		$myfunc($i);
	}
	$hstr= $title . "\n" . $pgv_lang["stplnumof"] . " N=" . $n1 . " (max= " . $nrmax. ").";
	myplot($hstr,$zmax,$xdata,$xtitle,$ydata,$ytitle,$legend);
} 
}

//--	========= start of main program =========
$legend= array();
$xdata= array();
$ydata= array();
$xgrenzen= array();
$zgrenzen= array();
$famgeg = array();
$persgeg= array();
$key2ind= array();
global $x_as,$y_as, $z_as, $nrfam, $famgeg, $nrpers, $persgeg,$key2ind;
global $legend, $xdata, $ydata, $xmax, $xgrenzen, $zmax, $zgrenzen, $xgiven,$zgiven, $percentage, $man_vrouw;

if (!isset($action)) $action="";
if ($action=="update") 
{
	if (!isset($_POST)) $_POST = $HTTP_POST_VARS;
$keys= array();
	$keys = array_keys($_POST);
//--	print "Gegevens via POST<br>";
//--		foreach($_POST as $i=>$keys) 
//--		{	print $i . "    = " . $_POST[$i] . "<br>";}
}
	$x_as= $_POST["x-as"];
	$y_as= $_POST["y-as"];
	$z_as= $_POST["z-as"];
	$xas_grenzen= $_POST["xas-grenzen"];
	$zas_grenzen= $_POST["zas-grenzen"];
//--	$xas_grenzen_leeftijden= $_POST["xas-grenzen-leeftijden"];
//--	$xas_grenzen_maanden= $_POST["xas-grenzen-maanden"];
//--	$xas_grenzen_aantallen= $_POST["xas-grenzen-aantallen"];
//--	$zas_grenzen_periode= $_POST["zas-grenzen-periode"];
//--	print " sort, x-as,y-as,blokken,periode:" . $x_as . ":". $y_as . ":". $z_as . ":" . 
//--		$xas_grenzen_leeftijden . ":" . $xas_grenzen_maanden . ":" . $xas_grenzen_aantallen . ":" . $zas_grenzen_periode . "<BR>";

//--print_header($pgv_lang["excel_list"]);
//--print "\n\t<center><h2>".$pgv_lang["statistiek_list"]."</h2>\n\t";
//--print "</center>";

	$nrpers=$_SESSION[$GEDCOM."nrpers"];
	$nrfam=$_SESSION[$GEDCOM."nrfam"];
	$nrman=$_SESSION[$GEDCOM."nrman"];
	$nrvrouw=$_SESSION[$GEDCOM."nrvrouw"];
//--print ("aantal namen, families, male and female=".$nrpers . ":" . $nrfam . ":" $nrman . ":" $nrvrouw . "<BR>");

	get_plot_data();
	error_reporting(E_ALL ^E_NOTICE);
//-- no errors because then I cannot plot

//-- out of range values
	if (($x_as <  11) or ($x_as >  21)) {print $pgv_lang["stpl_type"] .$x_as . $pgv_lang["stpl_noim"]  . "<BR>"; exit;}
	if (($y_as < 201) or ($y_as > 202)) {print $pgv_lang["stpl_type"] .$y_as . $pgv_lang["stpl_noim"]  . "<BR>"; exit;}
	if (($z_as < 300) or ($z_as > 302)) {print $pgv_lang["stpl_type"] .$z_as . $pgv_lang["stpl_noim"]  . "<BR>"; exit;}

	$xstr="";
	$ystr="";
//regel 508
//-- Set params for request out of the information for plot
//--	$g_xas= "1,2,3,4,5,6,7,8,9,10,11,12"; //should not be needed. but just for month
	$xg= $xas_grenzen;
	$zg= $zas_grenzen;
//--	$xgl= $xas_grenzen_leeftijden;
//--	$xgm= $xas_grenzen_maanden;
//--	$xga= $xas_grenzen_aantallen;
//--	$zgp= $zas_grenzen_periode;

//-- end of setting variables	

//---------nr,bron ,xgiven,zgiven,	title,      xtitle,   ytitle, grenzen_xas, grenzen-zas,,
//--print "true false". true .":" . false ."<br>";
set_params(11,"IND", true,  false, stat_11_mb,  stplmonth, $y_as, $xg, $zg,bimo);  //plot aantal geboorten per maand
set_params(12,"IND", true,  false, stat_12_md,  stplmonth, $y_as, $xg, $zg,demo);  //plot aantal overlijdens per maand
set_params(13,"FAM", true,  false, stat_13_mm,  stplmonth, $y_as, $xg, $zg,mamo);  //plot aantal huwelijken per maand
set_params(14,"FAM", true,  false, stat_14_mb1, stplmonth, $y_as, $xg, $zg,bimo1); //plot aantal 1e geboorten per huwelijk per maand
set_params(15,"FAM", true,  false, stat_15_mm1, stplmonth, $y_as, $xg, $zg,mamo1); //plot 1e huwelijken per maand
set_params(16,"FAM", false, false, stat_16_mmb, stplmarrbirth,$y_as, $xg,$zg,mamam); //plot tijd tussen 1e geboort en huwelijksdatum
set_params(17,"IND", false, false, stat_17_arb, stplage,   $y_as, $xg,   $zg,agbi);  //plot leeftijd t.o.v. geboortedatum
set_params(18,"IND", false, false, stat_18_ard, stplage,   $y_as, $xg,   $zg,agde);  //plot leeftijd t.o.v. overlijdensdatum
set_params(19,"FAM", false, false, stat_19_arm, stplage,   $y_as, $xg,   $zg,agma);  //plot leeftijd op de huwelijksdatum
set_params(20,"FAM", false, false, stat_20_arm1,stplage,   $y_as, $xg,   $zg,agma1); //plot leeftijd op de 1e huwelijksdatum
set_params(21,"FAM", false, false, stat_21_nok, stplnumbers,$y_as,$xg,   $zg,nuch);  //plot plot aantal kinderen in een maand

//--print "\n\t\t</td>\n\t\t</tr>\n\t</table></center>";
//--print "<br>";
//--print_footer();
//--print "not implemented" . $plot . "<BR>";
?>
