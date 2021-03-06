<?php

require_once 'Creation/CreationObject.php';

/**
 * Parses a CREATE VIEW statement
 *
 * @package   Creation
 * @copyright 2006 silverorange
 */
class CreationView extends CreationObject
{
	// {{{ protected function parseName()

	protected function parseName()
	{
		$regexp = '/create(\s+or\s+replace)?\s+view\s+([a-zA-Z0-9_]+)/ui';
		preg_match($regexp, $this->sql, $matches);

		return $matches[2];
	}

	// }}}
	// {{{ protected function parseDeps()

	protected function parseDeps()
	{
		$regexp = '/(from|join)\s+([a-zA-Z0-9_]+)/ui';
		preg_match_all($regexp, $this->sql, $matches);

		return $matches[2];
	}

	// }}}
}

?>
