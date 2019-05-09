<?php

	/**
	 *	Import F-Secure Key file
	 */
	$fs_key_file = fopen("/Users/[[ USER ]]/Desktop/TallennetutSalasanat.fsk", "r");
	$fs_key_json = fread($fs_key_file, filesize("/Users/[[ USER ]]/Desktop/TallennetutSalasanat.fsk"));
	fclose($fs_key_file);

	/**
	 *	Set up LastPass file
	 */
	$fs_key_array = json_decode($fs_key_json, true);
	$lp_filename = '/Users/[[ USER ]]/Desktop/file_for_lastpass_import.csv';
	$lp_file = fopen($lp_filename, 'w');

	/**
	 *	Create header row
	 */
	fputcsv($lp_file, array(
		'url',
		'type',
		'username',
		'password',
		'hostname',
		'extra',
		'name',
		'grouping')
	);

	/**
	 *	Add FS Key rows to LP file
	 */
	foreach($fs_key_array['data'] as $row) {
		fputcsv($lp_file, array(
			$row['url'],		// url
			'', 				// type
			$row['username'],	// username
			$row['password'],	// password
			'',					// hostname
			$row['notes'],		// extra
			$row['service'],	// name
			'')					// grouping
		);
	}
	fclose($lp_file);

	echo 'Done 👍 - unless there\'s PHP errors above';
?>