jQuery(document).ready(function() {
	jQuery(document).on('click', '#CacheFolder span.closed, #CacheFolders span.open', function() {
		jQuery(this).css('cursor', 'pointer');
		if( !jQuery(this).hasClass('open') ) {
			jQuery(this).addClass('open');
			jQuery(this).parent().children('ul').show();
		} else {
			jQuery(this).removeClass('open');
			jQuery(this).parent().children('ul').hide();
		}
		return false;
	});
	jQuery(document).on('click', '#CacheFolder a', function() {
		jQuery('#CacheFiles').parent().children('h3').html(jQuery(this).attr('data-title'));
		jQuery('#CacheFiles').html('<img src="framework/admin/images/throbber.gif">');
		jQuery('#CacheFiles').load(jQuery(this).attr('href'));
		return false;
	});
	jQuery(document).on('click', '#CacheFiles a', function() {
		jQuery('#CacheFile').parent().children('h3').html(jQuery(this).attr('data-title'));
		jQuery('#CacheFile').html('<img src="framework/admin/images/throbber.gif">');
		jQuery('#CacheFile').load(jQuery(this).attr('href'));
		return false;
	});
	
	jQuery(document).on('click', '#ClassManifest a', function() {
		jQuery('#ClassManifestContent').parent().children('h3').html(jQuery(this).attr('data-title'));
		jQuery('#ClassManifestContent').html('<img src="framework/admin/images/throbber.gif">');
		jQuery('#ClassManifestContent').load(jQuery(this).attr('href'));
		return false;
	});
	
	jQuery(document).on('click', '#ConfigStaticManifest a', function() {
		jQuery('#ConfigStaticManifestContent').parent().children('h3').html(jQuery(this).attr('data-title'));
		jQuery('#ConfigStaticManifestContent').html('<img src="framework/admin/images/throbber.gif">');
		jQuery('#ConfigStaticManifestContent').load(jQuery(this).attr('href'));
		return false;
	});
	
	jQuery(document).on('click', '#ConfigManifest a', function() {
		jQuery('#ConfigManifestContent').parent().children('h3').html(jQuery(this).attr('data-title'));
		jQuery('#ConfigManifestContent').html('<img src="framework/admin/images/throbber.gif">');
		jQuery('#ConfigManifestContent').load(jQuery(this).attr('href'));
		return false;
	});
	
	jQuery(document).on('click', '#TemplateManifest a', function() {
		jQuery('#TemplateManifestContent').parent().children('h3').html(jQuery(this).attr('data-title'));
		jQuery('#TemplateManifestContent').html('<img src="framework/admin/images/throbber.gif">');
		jQuery('#TemplateManifestContent').load(jQuery(this).attr('href'));
		return false;
	});
});