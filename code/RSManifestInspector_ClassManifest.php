<?php

/*
 * Overload SS_ClassManifest to implement a getter method for protected variables
 */

class RSManifestInspector_ClassManifest extends SS_ClassManifest {

	/**
	 * @param string $var
	 * @return mixed
	 */
	public function getVar($var) {
		if ($var === 'modules') {
			return $this->getModules();
		}
		return $this->$var;
	}

}
