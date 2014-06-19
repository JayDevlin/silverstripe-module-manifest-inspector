<?php

/*
 * Overload SS_ConfigStaticManifest to implement a getter method for protected variables
 */

class RSManifestInspector_ConfigStaticManifest extends SS_ConfigStaticManifest {

	/**
	 * @param string $var
	 * @return mixed
	 */
	public function getVar($var) {
		if( $var==='initial-statics' ) {
			return $this->getStatics();
		}
		if( $var==='all-statics' ) {
			$this->regenerate();
			return $this->getStatics();
		}
		return $this->$var;
	}

}
