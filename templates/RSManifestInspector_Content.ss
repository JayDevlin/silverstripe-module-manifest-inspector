<div class="cms-content cms-tabset center $BaseCSSClasses" data-layout-type="border" data-pjax-fragment="Content">
	
	<div class="cms-content-header north">
		<div class="cms-content-header-info">
			<div data-pjax-fragment="Breadcrumbs" class="breadcrumbs-wrapper">
				<h2 id="page-title-heading">
					<span class="section-icon icon icon-16 icon-rsmanifestinspector"></span>
					<span class="cms-panel-link crumb last">Manifest Inspector</span>
				</h2>
			</div>
		</div>

		<div class="cms-content-header-tabs cms-tabset-nav-primary">
			<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
				<li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="Root_CacheFolder" aria-labelledby="ui-id-1" aria-selected="true">
					<a href="#Root_CacheFolder" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">Cache Folder</a>
				</li>
				<li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="Root_ClassManifest" aria-labelledby="ui-id-2" aria-selected="false">
					<a href="#Root_ClassManifest" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2">Class Manifest</a>
				</li>
				<li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="Root_ConfigStaticManifest" aria-labelledby="ui-id-3" aria-selected="false">
					<a href="#Root_ConfigStaticManifest" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3">Config Static Manifest</a>
				</li>
				<li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="Root_ConfigManifest" aria-labelledby="ui-id-4" aria-selected="false">
					<a href="#Root_ConfigManifest" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-4">Config Manifest</a>
				</li>
				<li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="Root_TemplateManifest" aria-labelledby="ui-id-5" aria-selected="false">
					<a href="#Root_TemplateManifest" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-5">Template Manifest</a>
				</li>
			</ul>
		</div>
	</div>
	
	<div class="cms-content-fields center">
		<div id="Root" class="tabset">
			<div id="Root_CacheFolder" class="tab ui-tabs-panel ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-1" role="tabpanel" aria-expanded="true" aria-hidden="false">
				<div class="inspector-panel">
					<h3 class="cms-panel-header">Cache Folder</h3>
					<div id="CacheFolder">$CacheFolder</div>
				</div>
				<div class="inspector-panel">
					<h3 class="cms-panel-header">Cache Files</h3>
					<div id="CacheFiles"><!-- loaded via ajax --></div>
				</div>
				<div class="inspector-content">
					<h3 class="cms-panel-header">Cache File</h3>
					<div id="CacheFile"><!-- loaded via ajax --></div>
				</div>
			</div>
			
			<div id="Root_ClassManifest" class="tab ui-tabs-panel ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-2" role="tabpanel" aria-expanded="true" aria-hidden="false">
				<div class="inspector-panel">
					<h3 class="cms-panel-header">Class Manifest</h3>
					<div id="ClassManifest">
						$ClassManifest
					</div>
				</div>

				<div class="inspector-content">
					<h3 class="cms-panel-header">Manifest Content</h3>
					<div id="ClassManifestContent">
						
					</div>
				</div>
			</div>
			
			<div id="Root_ConfigStaticManifest" class="tab ui-tabs-panel ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-3" role="tabpanel" aria-expanded="true" aria-hidden="false">
				<div class="inspector-panel">
					<h3 class="cms-panel-header">Config Static Manifest</h3>
					<div id="ConfigStaticManifest">
						$ConfigStaticManifest
					</div>
				</div>

				<div class="inspector-content">
					<h3 class="cms-panel-header">Manifest Content</h3>
					<div id="ConfigStaticManifestContent">
						
					</div>
				</div>
			</div>
			
			<div id="Root_ConfigManifest" class="tab ui-tabs-panel ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-4" role="tabpanel" aria-expanded="true" aria-hidden="false">
				<div class="inspector-panel">
					<h3 class="cms-panel-header">Config Manifest</h3>
					<div id="ConfigManifest">
						$ConfigManifest
					</div>
				</div>

				<div class="inspector-content">
					<h3 class="cms-panel-header">Manifest Content</h3>
					<div id="ConfigManifestContent">
						
					</div>
				</div>
			</div>
			
			<div id="Root_TemplateManifest" class="tab ui-tabs-panel ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-5" role="tabpanel" aria-expanded="true" aria-hidden="false">
				<div class="inspector-panel">
					<h3 class="cms-panel-header">Template Manifest</h3>
					<div id="TemplateManifest">
						$TemplateManifest
					</div>
				</div>

				<div class="inspector-content">
					<h3 class="cms-panel-header">Manifest Content</h3>
					<div id="TemplateManifestContent">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>