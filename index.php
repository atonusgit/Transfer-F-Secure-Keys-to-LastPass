<?php
	/**
	 *	File paths
	 *
	 *	EDIT THESE
	 */
	$fs_filepath = '/Users/[[ USER ]]/Desktop/TallennetutSalasanat.fsk';
	$lp_filepath = '/Users/[[ USER ]]/Desktop/file_for_lastpass_import.csv';

	/**
	 *	Import F-Secure Key file
	 */
	$fs_key_file = fopen($fs_filepath, "r");
	$fs_key_json = fread($fs_key_file, filesize($fs_filepath));
	fclose($fs_key_file);

	/**
	 *	Set up LastPass file
	 */
	$fs_key_array = json_decode($fs_key_json, true);
	$lp_file = fopen($lp_filepath, 'w');

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