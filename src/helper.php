<?php

function site_url()
{
	return 'http://localhost/phpnative/';
}

function base_url($link)
{
	return site_url() . $link;
}

function asset_url($file)
{
	return site_url() . "assets/{$file}";
}

function password($password)
{
	return sha1($password);
}

function parse_array($array = array())
{
	$temp = array();
	foreach($array as $key => $value)
		$temp[] = $value;
	return $temp;
}

/**
 * Return the slug of a string to be used in a URL.
 *
 * @return String
 */
function slugify($text, $separator = '-'){
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', $separator, $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, $separator);

    // remove duplicated - symbols
    $text = preg_replace('~-+~', $separator, $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
      return 'n-a';
    }

    return $text;
}

function post_endpoint($endpoint, $post)
{
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
	curl_setopt($curl, CURLOPT_URL, $endpoint);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);

	if(!$result)
		die('Connection failure');

	curl_close($curl);

	return json_decode($result, true);
}

function checkbox_state($value)
{
	return ($value) ? 'checked' : '';
}

// as filter
function array_single($data = array(), $field)
{
	$tmp = array();
	foreach($data as $key => $value)
		if(isset($value[$field]))
			$tmp[] = $value[$field];

	unset($data); unset($field);
	return implode($tmp,',');
}

function join_array($array2 = array())
{
	return array_merge(array(), $array2);
}
