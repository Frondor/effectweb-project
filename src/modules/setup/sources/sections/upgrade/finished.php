<?php
/**
 * Cetemaster Services
 * Effect Web 2 - MuOnline Suite Software
 *
 * CTM Installer: Section - Finished
 * Last Update: 09/06/2013 - 05:56h
 * Author: $CTM['Erick-Master']
 *
 * Cetemaster Services, Limited
 * Copyright (c) 2010-2013. All Rights Reserved, 
 * www.cetemaster.com.br / www.cetemaster.com
*/

class Update_Finished extends CTM_Command
{
	/**
	 *	Class construct
	 *
	 *	@return	void
	*/
	public function __construct()
	{
		$this->registry();
	}
	/**
	 *	Run Section
	 *
	 *	@return	void
	*/
	public function run()
	{
		global $installation;

		$new_file = "<?php\n";
		$new_file .= "/**\n";
		$new_file .= " * Generated by Effect Web Board\n";
		$new_file .= " * ".date("r")."\n";
		$new_file .= "*/\n\n";
		$new_file .= "\$installation['is_installed']		= true;\n";
		$new_file .= "\$installation['current_version']	= 0x".str_pad(strtoupper(dechex(EW_THIS_VERSION)), 4, 0, STR_PAD_RIGHT).";\n";
		$new_file .= "\$installation['old_version']		= 0x".str_pad(strtoupper(dechex($installation['current_version'])), 4, 0, STR_PAD_RIGHT).";\n";
		$new_file .= "\$installation['last_installation']	= 0x".strtoupper(dechex($installation['last_installation'])).";\n";
		$new_file .= "\$installation['last_update']		= 0x".strtoupper(dechex(time())).";";
				
		$fp = fopen(CTM_CACHE_PATH."server_cache/db_php/core_sources/installation_info.php", "wb");
		fwrite($fp, $new_file);
		fclose($fp);

		$GLOBALS['links'] = array
		(
			0 => array
			(
				"address" => "../",
				"value" => "Admin Control Panel",
				"blank" => false
			),
			1 => array
			(
				"address" => "../../",
				"value" => "Effect Web",
				"blank" => true
			),
		);
	}
	/**
	 *	Section Content
	 *
	 *	@param	&string	Content variable
	 *	@return	string
	*/
	public function content(&$content = NULL)
	{
		$this->lang->loadLanguageFile("finished");
		$this->output->setTitles($this->lang->words['Finished']['HTML'], $this->lang->words['Finished']['Step']);
		$GLOBALS['hide_button'] = true;

		return $content = array("type" => "section", "section" => "finished");
	}
}

$section = new Update_Finished();