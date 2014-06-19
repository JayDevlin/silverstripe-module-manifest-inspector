<?php

class RSManifestInspector extends LeftAndMain {

	private static $url_segment = 'rsmanifest-inspector';
	private static $menu_title = 'Manifest Inspector';
	private static $required_permission_codes = 'EDIT_SITECONFIG';
	private static $menu_priority = -1;
	private static $allowed_actions = array(
		'showCacheFolderFiles',
		'showCacheFolderFile',
		'showClassManifest',
		'showConfigStaticManifest',
		'showConfigManifest',
		'showTemplateManifest',
	);

	public function init() {
		parent::init();

		Requirements::css('silverstripe-module-manifest-inspector/css/inspector.css');
		Requirements::javascript('silverstripe-module-manifest-inspector/javascript/inspector.js');
	}

	/**
	 * --- Cache Folder ---
	 */
	public function CacheFolder() {
		$cacheFolderPath = getTempParentFolder();
		$items = array_diff(scandir($cacheFolderPath), array('..', '.'));
		natcasesort($items);

		$output = "<ul>\n";
		foreach ($items AS $item) {
			if (is_dir($cacheFolderPath . '/' . $item)) {
				$_items = array_diff(scandir($cacheFolderPath . '/' . $item), array('..', '.'));
				natcasesort($_items);

				$output .= "<li>\n";
				$output .= "<span class=\"closed\">&nbsp;</span>\n";
				$output .= "<a href=\"" . $this->Link('showCacheFolderFiles') . '?folder=' . $item . "\" data-title=\"" . $item . "\">" . $item . "</a>\n";
				if (!empty($_items)) {
					$subdirOutput = '';
					foreach ($_items AS $_item) {
						if (is_dir($cacheFolderPath . '/' . $item . '/' . $_item)) {
							$subdirOutput .= "<li>\n";
							$subdirOutput .= "<span>&nbsp;</span>\n";
							$subdirOutput .= "<a href=\"" . $this->Link('showCacheFolderFiles') . '?folder=' . $item . '/' . $_item . "\" data-title=\"" . $item . '/' . $_item . "\">" . $_item . "</a>\n";
							$subdirOutput .= "</li>\n";
						}
					}
					if (!empty($subdirOutput)) {
						$output.= "<ul>\n";
						$output.= $subdirOutput;
						$output.= "</ul>\n";
					}
				}
				$output .= "</li>\n";
			}
		}
		$output.= "</ul>\n";

		return $output;
	}

	public function showCacheFolderFiles() {
		Requirements::clear();
		if (!empty($_GET['folder'])) {
			// prevent something stupid
			$folder = str_replace('..', '', $_GET['folder']);
			$folder = Convert::raw2xml($folder);

			$cacheFolderPath = getTempParentFolder() . '/' . $folder;
			$items = array_diff(scandir($cacheFolderPath), array('..', '.'));
			natcasesort($items);

			$output = "<ul class=\"ulli\">\n";
			foreach ($items AS $item) {
				if (is_file($cacheFolderPath . '/' . $item)) {
					$output.= "<li>\n";
					$output.= "<span>&nbsp;</span>\n";
					$output.= "<a href=\"" . $this->Link('showCacheFolderFile') . '?file=' . $folder . '/' . $item . "\" data-title=\"" . $item . "\">" . $item . "</a>\n";
					$output.= "</li>\n";
				}
			}
			$output.= "</ul>\n";
			return $output;
		}
		return;
	}

	public function showCacheFolderFile() {
		Requirements::clear();

		if (!empty($_GET['file'])) {
			// prevent something stupid
			$file = str_replace('..', '', $_GET['file']);
			$file = Convert::raw2xml($file);

			if (is_file(getTempParentFolder() . '/' . $file)) {
				if (substr($_GET['file'], -3) == '.gz') {
					$content = implode("\n", gzfile(getTempParentFolder() . '/' . $file));
				} else {
					$content = file_get_contents(getTempParentFolder() . '/' . $file);
				}

				return $this->parseContent($content);
			}
		}
	}

	private function parseContent($content) {
		// content is object
		if (is_object($content)) {
			return '<pre>' . print_r($content, true) . '</pre>';
		}

		// content is array
		if (is_array($content)) {
			return '<pre>' . print_r($content, true) . '</pre>';
		}

		// content is serialized
		if (substr($content, 0, 2) == 'a:' || substr($content, 0, 2) == 's:') {
			return '<pre>' . print_r(unserialize($content), true) . '</pre>';
		}

		return '<pre>' . (htmlentities($content)) . '</pre>';
	}

	/**
	 * --- Class Manifest ---
	 */
	public function ClassManifest() {
		$items = array(
			'modules',
			'base',
			'tests',
			'cache',
			'cacheKey',
			'classes',
			'roots',
			'children',
			'descendants',
			'interfaces',
			'implementors',
			'configs',
			'configDirs',
		);

		$output = "<ul class=\"ulli\">\n";
		foreach ($items AS $item) {
			$output.= "<li>";
			$output.= "<a href=\"" . $this->Link('showClassManifest') . "?type=" . $item . "\" data-title=\"" . ucfirst($item) . "\">" . ucfirst($item) . "</a>\n";
			$output.= "</li>\n";
		}
		$output.= "</ul>\n";

		return $output;
	}

	public function showClassManifest() {
		Requirements::clear();

		if (!empty($_GET['type'])) {
			global $manifest;
			$manifestInspector = new RSManifestInspector_ClassManifest(BASE_PATH);
			$content = $manifestInspector->getVar($_GET['type']);
			return $this->parseContent($content);
		}
	}

	/**
	 * --- Config Static Manifest ---
	 */
	public function ConfigStaticManifest() {
		$items = array(
			'base',
			'tests',
			'cache',
			'key',
			'index',
			'initial-statics',
			'all-statics',
		);

		$output = "<ul class=\"ulli\">\n";
		foreach ($items AS $item) {
			$output.= "<li>";
			$output.= "<a href=\"" . $this->Link('showConfigStaticManifest') . "?type=" . $item . "\" data-title=\"" . ucfirst($item) . "\">" . ucfirst($item) . "</a>\n";
			$output.= "</li>\n";
		}
		$output.= "</ul>\n";

		return $output;
	}

	public function showConfigStaticManifest() {
		Requirements::clear();

		if (!empty($_GET['type'])) {
			global $manifest;
			$manifestInspector = new RSManifestInspector_ConfigStaticManifest(BASE_PATH);
			$content = $manifestInspector->getVar($_GET['type']);
			return $this->parseContent($content);
		}
	}

	/**
	 * --- Config Manifest ---
	 */
	public function ConfigManifest() {
		$items = array(
			'base',
			'key',
			'includeTests',
			'variantKeySpec',
			'phpConfigSources',
			'yamlConfigFragments',
			'yamlConfig',
			'yamlConfigVariantKey',
			'configChangeCallbacks',
			'modules',
		);

		$output = "<ul class=\"ulli\">\n";
		foreach ($items AS $item) {
			$output.= "<li>";
			$output.= "<a href=\"" . $this->Link('showConfigManifest') . "?type=" . $item . "\" data-title=\"" . ucfirst($item) . "\">" . ucfirst($item) . "</a>\n";
			$output.= "</li>\n";
		}
		$output.= "</ul>\n";

		return $output;
	}

	public function showConfigManifest() {
		Requirements::clear();

		if (!empty($_GET['type'])) {
			global $manifest;
			$manifestInspector = new RSManifestInspector_ConfigManifest(BASE_PATH);
			$content = $manifestInspector->getVar($_GET['type']);
			return $this->parseContent($content);
		}
	}

	/**
	 * --- Config Manifest ---
	 */
	public function TemplateManifest() {
		$items = array(
			'base',
			'tests',
			'cache',
			'cacheKey',
			'project',
			'inited',
			'forceRegen',
			'templates',
		);

		$output = "<ul class=\"ulli\">\n";
		foreach ($items AS $item) {
			$output.= "<li>";
			$output.= "<a href=\"" . $this->Link('showTemplateManifest') . "?type=" . $item . "\" data-title=\"" . ucfirst($item) . "\">" . ucfirst($item) . "</a>\n";
			$output.= "</li>\n";
		}
		$output.= "</ul>\n";

		return $output;
	}

	public function showTemplateManifest() {
		Requirements::clear();

		if (!empty($_GET['type'])) {
			global $manifest;
			$manifestInspector = new RSManifestInspector_TemplateManifest(BASE_PATH, project());
			$content = $manifestInspector->getVar($_GET['type']);
			return $this->parseContent($content);
		}
	}

}
