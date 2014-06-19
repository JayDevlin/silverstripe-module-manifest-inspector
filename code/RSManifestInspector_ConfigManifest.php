<?php

/*
 * Overload SS_ConfigManifest to implement a getter method for protected variables
 */

class RSManifestInspector_ConfigManifest extends SS_ConfigManifest {

	/**
	 * @param string $var
	 * @return mixed
	 */
	public function getVar($var) {
		return $this->$var;
	}

}
