<?php
/**
 * Cetemaster Services
 * Effect Web 2 - MuOnline Suite Software
 *
 * CTM Installer: Command Language
 * Last Update: 24/04/2013 - 18:33h
 * Author: $CTM['Erick-Master']
 *
 * Cetemaster Services, Limited
 * Copyright (c) 2010-2013. All Rights Reserved, 
 * www.cetemaster.com.br / www.cetemaster.com
*/

class CTMCommand_Language
{
	public $words			= array();

	private $loadedLangs	= array();
	
	/**
	 *	Load Language Files
	 *
	 *	@param	string|array	File(s)
	 *	@return	void
	*/
	public function loadLanguageFile($files, $forceReload = FALSE)
	{
		if($forceReload == true)
			$this->words = array();
			
		if(is_string($files))
		{
			if(!in_array($files, $this->loadedLangs))
			{
				if(strstr($files, ":"))
				{
					$files = str_replace(":", "_", $files);
				}
				else
				{
					$files = CTM_SETUP_MODE."_".$files;
				}

				if(file_exists(CTM_SETUP_PATH."cache/language/".$files.".php"))
				{
					require_once(CTM_SETUP_PATH."cache/language/".$files.".php");
					$this->words = array_merge($this->words, $CTM_LANG);
					$this->loadedLangs[] = $files;
				}
			}
		}
		else
		{
			foreach($files as $file)
			{
				if(!in_array($file, $this->loadedLangs))
				{
					if(strstr($file, ":"))
					{
						$file = str_replace(":", "_", $file);
					}
					else
					{
						$file = CTM_SETUP_MODE."_".$file;
					}

					if(file_exists(CTM_SETUP_PATH."cache/language/".$file.".php"))
					{
						require_once(CTM_SETUP_PATH."cache/language/".$file.".php");
						$this->words = array_merge($this->words, $CTM_LANG);
						$this->loadedLangs[] = $file;
					}
				}
			}
		}
	}
	/**
	 *	Set Arguments
	 *
	 *	@param	string	Word - Use "," to set array keys
	 *	@param	string	Argument
	 *	@param	string	[...]
	 *	@return	void
	*/
	public function setArguments()
	{
		$arguments = func_get_args();
		$word = $arguments[0];
		array_shift($arguments);
		
		if(strstr($word, ","))
		{
			$cut = explode(",", $word);
	
			if(count($cut) > 0)
				foreach($cut as $keys)
					$vars .= "['".$keys."']";
				
			eval("\$this->words{$vars} = vsprintf(\$this->words{$vars}, \$arguments);");
			return;
		}
		
		if($this->words[$word])
		{
			$this->words[$word] = vsprintf($this->words[$word], $arguments);
		}
	}
	/**
	 *	Set Arguments Tags
	 *
	 *	@param	string	Word - Use "," to set array keys
	 *	@param	string	Argument
	 *	@param	string	[...]
	 *	@return	void
	*/
	public function setTags()
	{
		$arguments = func_get_args();
		$word = $arguments[0];
		array_shift($arguments);
		
		$vars = "['".$word."']";
		if(strstr($word, ","))
		{
			$cut = explode(",", $word);
			$vars = NULL;
	
			if(count($cut) > 0)
				foreach($cut as $keys) $vars .= "['".$keys."']";
		}
		
		eval("
		for(\$i = 1; \$i <= sizeof(\$arguments); \$i++)
			if(strstr(\$this->words{$vars}, '$'.\$i))
				\$this->words{$vars} = str_replace('$'.\$i, \$arguments[\$i - 1], \$this->words{$vars});");
		
		if($this->words[$word])
		{
			for($i = 1; $i <= sizeof($arguments); $i++)
			{
				if(strstr($this->words[$word], '$'.$i))
				{
					$this->words[$word] = str_replace('$'.$i, $arguments[$i - 1], $this->words[$word]);
				}
			}
		}
	}
	/**
	 *	Set Arguments Parameters
	 *
	 *	@param	string	Word - Use "," to set array keys
	 *	@param	string	Argument
	 *	@param	string	[...]
	 *	@return	void
	*/
	public function setParameters($word, $parameters = array())
	{
		foreach($parameters as $key => $value)
			if(strstr($this->words[$word], $key))
				$this->words[$word] = str_replace($key, $value, $this->words[$word]);
	}
}