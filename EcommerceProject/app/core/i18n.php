<?php
$locale = 'fr';//this locale matches the wanted language

function valid($locale) {//always best to validate
   return in_array($locale, ['en', 'fr']);
}

if(isset($_GET['lang']) && valid($_GET['lang']))
{
	$locale = $_GET['lang'];
	setcookie('lang', $locale, 0, '/');
}
elseif(isset($_COOKIE['lang']) && valid($_COOKIE['lang']))
{
	$locale = $_COOKIE['lang'];
}


putenv("LANG=$locale");
putenv("LANGUAGE=$locale");

setlocale(LC_ALL, $locale);//this is important

$domain = $locale; //important this points to the correct file
textdomain($domain);//which file to use in the localization
bindtextdomain($domain, 'locales');//directory for all localizations l10n
bind_textdomain_codeset($domain, 'UTF-8');


?>