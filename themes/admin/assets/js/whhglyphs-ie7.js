/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'whhglyphs\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-image' : '&#x22b7;',
			'icon-layers' : '&#xf1ca;',
			'icon-news' : '&#xf256;',
			'icon-foldertree' : '&#xf0f0;',
			'icon-list' : '&#xf113;',
			'icon-videocamera' : '&#xf19c;',
			'icon-home' : '&#x21b8;',
			'icon-infographic' : '&#xf336;',
			'icon-microphone' : '&#xf191;',
			'icon-settings5' : '&#xf309;',
			'icon-podium' : '&#xf2d6;',
			'icon-trophy' : '&#xf2d7;',
			'icon-address' : '&#xf08f;',
			'icon-domain' : '&#xf01b;',
			'icon-businesscard2' : '&#xf137;',
			'icon-piggybank' : '&#xf257;',
			'icon-phonebook' : '&#xf135;',
			'icon-starempty' : '&#xf2de;',
			'icon-starfull' : '&#xf2e0;',
			'icon-filemanager' : '&#xf094;',
			'icon-darthvader' : '&#xf34a;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};