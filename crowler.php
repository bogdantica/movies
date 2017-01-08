<?php


$sitemapXML = 'http://www.filmeonline.biz/sitemap.xml';


$context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
$xml = file_get_contents($sitemapXML, false, $context);
$xml = simplexml_load_string($xml);

$subXMLs = [];

foreach($xml->sitemap as $subXML)
{
	$tmp = ((array)$subXML->loc);
	$tmp = reset($tmp);
	$subXMLs[] = $tmp;
}

unset($subXMLs[0]);

$cloudIDs = [];

foreach($subXMLs as $index => $subXML){

	$xml = file_get_contents($subXML, false, $context);
	$xml = simplexml_load_string($xml) ;

	foreach($xml->url as $element)
	{
		if($element->loc){
			$url = ((array)$element->loc)[0];
			$title = unslug(end(explode('/',$url)));
			$website = googleBot($url);
			//var_dump($website);die();
			$urlPattern = "/(http|https|ftp|ftps)\:\/\/openload+\.[a-zA-Z]{2,3}(\/\S*)?/" ;
			$embeded = false;
			if( preg_match($urlPattern, $website,$result))
			{
				$embeded = $result[0];
				$embeded = str_replace('"', '', $embeded);
				// $uid = ($result[2]);
				// $uid = explode('/',$uid);
				// $uid = $uid[2];
				// $cloudID = $uid;
			}
			if($embeded)
			{
				echo $title . PHP_EOL;
				$cloudIDs[] = ['embeded'=> $embeded, 'title' => $title];

			}
		}
	}
}

echo 'Total Movies: ' . count($cloudIDs) . PHP_EOL;

$file = fopen('movies.json','w');
fwrite($file, json_encode($cloudIDs));
fclose($file);


function unslug($slug)
{
	$slug = explode('-',$slug);
	array_pop($slug);
	$slug = implode(' ',$slug);
	return ucfirst($slug);

	$slug = str_replace('-',' ',$slug);
	$slug = str_replace('.html','',$slug);

	return $slug;
}


function googleBot($url) 
{
	$header = array();
	$header[] = 'Accept: text/html,application/html,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5'; 
	$header[] = 'Cache-Control: max-age=0'; 
	$header[] = 'Content-Type: text/html; charset=utf-8'; 
	$header[] = 'Transfer-Encoding: chunked'; 
	$header[] = 'Connection: keep-alive'; 
	$header[] = 'Keep-Alive: 300'; 
	$header[] = 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7'; 
	$header[] = 'Accept-Language: en-us,en;q=0.5'; 
	$header[] = 'Pragma:'; 
	 
	$curl = curl_init();     
	curl_setopt($curl, CURLOPT_URL, $url); 
	 curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'); 
	//curl_setopt($curl, CURLOPT_HTTPHEADER, $header); 
	 curl_setopt($curl, CURLOPT_REFERER, 'http://www.google.com'); 
	 curl_setopt($curl, CURLOPT_ENCODING, 'gzip, deflate'); 
	 curl_setopt($curl, CURLOPT_AUTOREFERER, true); 
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($curl, CURLOPT_TIMEOUT, 10); 
	$body = curl_exec($curl); 
	curl_close($curl); 
	return $body; 
} 


?>