<?php

/*
 * Overload SS_TemplateManifest to implement a getter method for protected variables
 */

class RSManifestInspector_TemplateManifest extends SS_TemplateManifest {

	/**
	 * @param string $var
	 * @return mixed
	 */
	public function getVar($var) {
		if( $var==='templates' ) {
			return $this->getTemplates();
		}
		return $this->$var;
	}

}
