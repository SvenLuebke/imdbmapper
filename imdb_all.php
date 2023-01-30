<?php
include_once 'imdb.class.php';

$IMDB = new IMDB($argv[1]);

function print_return($returnString) {
	print_r("$returnString\n");
}

if ($IMDB->isReady) {
	print_return($IMDB->getRating().'/10');
} else {
	print_return('nomatch');
}

if ($IMDB->isReady) {
	$zeichenkette=($IMDB->getMpaa()) ;
} else {
	$zeichenkette= 'nomatch';
} 

$suchmuster_age = array();
$suchmuster_age[0] = '/oA/';
$suchmuster_age[1] = '/PG-13/';
$suchmuster_age[2] = '/PG/';
$suchmuster_age[3] = '/R/';
$suchmuster_age[4] = '/TV-14/';
$suchmuster_age[5] = '/TV-G/';
$suchmuster_age[6] = '/TV-MA/';
$suchmuster_age[7] = '/TV-PG/';
$suchmuster_age[8] = '/TV-Y7/';
$suchmuster_age[9] = '/TV-Y/';
$suchmuster_age[10] = '/G/';
$suchmuster_age[11] = '/NC-17/';
$suchmuster_age[12] = '/NC/';
$suchmuster_age[13] = '/TV-6/';

$ersetzungen_age = array();
$ersetzungen_age[0] = '0';
$ersetzungen_age[1] = '12';
$ersetzungen_age[2] = '6';
$ersetzungen_age[3] = '16';
$ersetzungen_age[4] = '16';
$ersetzungen_age[5] = '6';
$ersetzungen_age[6] = '18';
$ersetzungen_age[7] = '6';
$ersetzungen_age[8] = '12';
$ersetzungen_age[9] = '6';
$ersetzungen_age[10] = '0';
$ersetzungen_age[11] = '18';
$ersetzungen_age[12] = '16';
$ersetzungen_age[13] = '6';

print_return(preg_replace($suchmuster_age, $ersetzungen_age, $zeichenkette));

if ($IMDB->isReady) {
	print_return($IMDB->getPoster($sSize = 'big', $bDownload = false));
} else {
	print_return('nomatch');
}

if ($IMDB->isReady) {
	$zeichenkette=($IMDB->getCountry());
} else {
	$zeichenkette= 'nomatch';
}

$suchmuster_country = array();
$suchmuster_country[0] = '/United States/';
$suchmuster_country[1] = '/United Arab Emirates/';
$suchmuster_country[2] = '/Australia/';
$suchmuster_country[3] = '/Germany/';
$suchmuster_country[4] = '/Belgium/';
$suchmuster_country[5] = '/Canada/';
$suchmuster_country[6] = '/West Germany/';
$suchmuster_country[7] = '/Finland/';
$suchmuster_country[8] = '/France/';
$suchmuster_country[9] = '/Italy/';
$suchmuster_country[10] = '/Spain/';
$suchmuster_country[11] = '/South Korea/';
$suchmuster_country[12] = '/Japan/';
$suchmuster_country[13] = '/Luxembourg/';
$suchmuster_country[14] = '/Ireland/';
$suchmuster_country[15] = '/Netherlands/';
$suchmuster_country[16] = '/Tunisia/';
$suchmuster_country[17] = '/India/';
$suchmuster_country[18] = '/Irl./';
$suchmuster_country[19] = '/Kan./';
$suchmuster_country[20] = '/Norway/';
$suchmuster_country[21] = '/Poland/';
$suchmuster_country[22] = '/Russia/';
$suchmuster_country[23] = '/Soviet Union/';
$suchmuster_country[24] = '/Sweden/';
$suchmuster_country[25] = '/Denmark/';
$suchmuster_country[26] = '/Switzerland/';
$suchmuster_country[27] = '/United Kingdom/';
$suchmuster_country[28] = '/Philippines/';
$suchmuster_country[29] = '/Czech Republic/';
$suchmuster_country[30] = '/New Zealand/';
$suchmuster_country[31] = '/Indonesia/';
$suchmuster_country[32] = '/Hong Kong/';
$suchmuster_country[33] = '/Mexico/';
$suchmuster_country[34] = '/Portugal/';
$suchmuster_country[35] = '/Austria/';
$suchmuster_country[36] = '/China/';
$suchmuster_country[37] = '/Brazil/';
$suchmuster_country[38] = '/Thailand/';
$suchmuster_country[39] = '/Romania/';
$suchmuster_country[40] = '/Singapore/';
$suchmuster_country[41] = '/South Africa/';
$suchmuster_country[42] = '/Panama/';
$suchmuster_country[43] = '/Hungary/';
$suchmuster_country[44] = '/Bulgaria/';
$suchmuster_country[45] = '/Dominican Republic/';
$suchmuster_country[46] = '/Iceland/';
$suchmuster_country[47] = '/Madagascar/';
$suchmuster_country[48] = '/Ver. Arab. Emir./';
$suchmuster_country[49] = '/East Germany/';

$ersetzungen_country = array();
$ersetzungen_country[0] = 'USA';
$ersetzungen_country[1] = 'ARE';
$ersetzungen_country[2] = 'AUS';
$ersetzungen_country[3] = 'DEU';
$ersetzungen_country[4] = 'BEL';
$ersetzungen_country[5] = 'CAN';
$ersetzungen_country[6] = 'DEU';
$ersetzungen_country[7] = 'FIN';
$ersetzungen_country[8] = 'FRA';
$ersetzungen_country[9] = 'ITA';
$ersetzungen_country[10] = 'ESP';
$ersetzungen_country[11] = 'KOR';
$ersetzungen_country[12] = 'JPN';
$ersetzungen_country[13] = 'LUX';
$ersetzungen_country[14] = 'IRL';
$ersetzungen_country[15] = 'NLD';
$ersetzungen_country[16] = 'TUN';
$ersetzungen_country[17] = 'IND';
$ersetzungen_country[18] = 'IRL';
$ersetzungen_country[19] = 'KAN';
$ersetzungen_country[20] = 'NOR';
$ersetzungen_country[21] = 'POL';
$ersetzungen_country[22] = 'RUS';
$ersetzungen_country[23] = 'SUN';
$ersetzungen_country[24] = 'SWE';
$ersetzungen_country[25] = 'DNK';
$ersetzungen_country[26] = 'CHE';
$ersetzungen_country[27] = 'GBR';
$ersetzungen_country[28] = 'PHL';
$ersetzungen_country[29] = 'CZE';
$ersetzungen_country[30] = 'NZL';
$ersetzungen_country[31] = 'IDN';
$ersetzungen_country[32] = 'HKG';
$ersetzungen_country[33] = 'MEX';
$ersetzungen_country[34] = 'PRT';
$ersetzungen_country[35] = 'AUT';
$ersetzungen_country[36] = 'CHN';
$ersetzungen_country[37] = 'BRA';
$ersetzungen_country[38] = 'THA';
$ersetzungen_country[39] = 'ROU';
$ersetzungen_country[40] = 'SGP';
$ersetzungen_country[41] = 'ZAF';
$ersetzungen_country[42] = 'PAN';
$ersetzungen_country[43] = 'HUN';
$ersetzungen_country[44] = 'BGR';
$ersetzungen_country[45] = 'DOM';
$ersetzungen_country[46] = 'ISL';
$ersetzungen_country[47] = 'MDG';
$ersetzungen_country[48] = 'ARE';
$ersetzungen_country[49] = 'DEU'; 

print_return(preg_replace($suchmuster_country, $ersetzungen_country, $zeichenkette));

if ($IMDB->isReady) {
	print_return($IMDB->getYear());
} else {
	print_return('nomatch');
}

if ($IMDB->isReady) {
	print_return($IMDB->getUrl());
} else {
	print_return('nomatch');
}

?>
