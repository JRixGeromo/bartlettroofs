// WIDGET.JS.TEMPLATE FILE FROM MONOLITH
(function() {
  var loadScript = function(url, callback) {
    // Adding the script tag to the head as suggested before
    var head = document.getElementsByTagName('head')[0];
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = url;
    script.onreadystatechange = callback;
    script.onload = callback;
    head.appendChild(script);
  };

  loadScript('https://cdnjs.cloudflare.com/ajax/libs/pym/1.3.2/pym.v1.min.js');

  var bootstrap = function() {
    if (typeof pym == 'undefined') {
      waitForPym();
    } else {
      init();
    }
  };

  var waitForPym = function() {
    setTimeout(function() {
      bootstrap();
    }, 20);
  };

  var generateSiteDataParams = function(firstChar) {
    var siteDomain = encodeURIComponent(window.location.hostname) || "";
    var sitePath = encodeURIComponent(window.location.pathname) || "";
    var siteURL = encodeURIComponent(window.location.href) || "";

    return (firstChar || '&') + 'sitedomain=' + siteDomain + '&sitepath=' + sitePath + '&siteurl=' + siteURL;
  }

  var init = function() {
    //SHINGLES
    if(document.querySelector('div.oc_shingle_view')) {
      var widget_links = document.querySelectorAll('div.oc_shingle_view');
for (var i = 0; i < widget_links.length; i++) {
  var link = widget_links[i];
  var shingle;
  var view;
  var layout;
  var style;
  var id = 'oc_shingle_view_' + i;

  link.setAttribute('id', id);

  shingle = link.getAttribute('data-shingle') || 'trudefinition-duration';
  view = link.getAttribute('data-view') || 'house';
  layout = link.getAttribute('data-layout') || 'row';
  style = link.getAttribute('data-style') || 'default';
  allowed_colors = link.getAttribute('data-allowed-colors') || '';

  // Alias requests for old slugs / misspellings
  var aliases = {
    'trudefinition-duration' : [ 'trudefintion-duration' ],
    'trudefinition-duration-cool' : [ 'duration-cool' ]
  };

  for (var key in aliases) {
    if (aliases[key].indexOf(shingle) > -1) {
      shingle = key;
      break;
    }
  }

  // Fix mispelling on some client pages
  if (shingle === 'trudefintion-duration') {
    shingle = 'trudefinition-duration';
  }

  var analyticTrackingData = "&widget=true&sitedomain=" + window.location.host + "&sitepath=" + window.location.pathname + "&siteurl=" + window.location.href;
  var pymParent = new pym.Parent(id, 'https://www.owenscorning.com/public_widgets/shingle/' + shingle + '?view=' + view + '&style=' + style + '&layout=' + layout + '&allowedcolors=' + allowed_colors + analyticTrackingData, {});
}

    }

    //DESIGN AND INSPIRE
    if(document.querySelector('div.oc_design_and_inspire')) {
      //DESIGN AND INSPIRE
var design_and_inspire_links = document.querySelectorAll('div.oc_design_and_inspire');
for (var i = 0; i < design_and_inspire_links.length; i++) {
	var link = design_and_inspire_links[i];
	var id = 'oc_design_and_inspire_' + i;
	link.setAttribute('id', id);
	var slide_delay = link.getAttribute('slide-delay') || '4000';

	var analyticTrackingData = "?widget=true&sitedomain=" + window.location.host + "&sitepath=" + window.location.pathname + "&siteurl=" + window.location.href;
	var pymParent = new pym.Parent(id, 'https://www.owenscorning.com/public_widgets/design_and_inspire' + analyticTrackingData, {});
}
    }

    //TOTAL PROTECTION ROOFING SYSTEM
    if(document.querySelector('div.total_protection_roofing_system')) {
      //TOTAL PROTECTION ROOFING SYSTEM
var tprs_links = document.querySelectorAll('div.total_protection_roofing_system');
for (var i = 0; i < tprs_links.length; i++) {
  var link = tprs_links[i];
  var id = 'total_protection_roofing_system_' + i;
  link.setAttribute('id', id);

  var analyticTrackingData = "?widget=true&sitedomain=" + window.location.host + "&sitepath=" + window.location.pathname + "&siteurl=" + window.location.href;
  var pymParent = new pym.Parent(id, 'https://www.owenscorning.com/public_widgets/tprs' + analyticTrackingData, {});
}

    }

    // WARRANTY
    if(document.querySelector('div.oc_warranty')) {
      var warranty_links = document.querySelectorAll('div.oc_warranty');
for (var i = 0; i < warranty_links.length; i++) {
  var link = warranty_links[i];
  var id = 'oc_warranty_' + i;
  link.setAttribute('id', id);

  var standard, tprs, systemProtection, preferredProtection, platinumProtection;
  var standard = link.getAttribute('data-standard-coverage') || 'false';
  var tprs = link.getAttribute('data-tprs-coverage') || 'false';
  var systemProtection = link.getAttribute('data-system-protection') || 'false';
  var preferredProtection = link.getAttribute('data-preferred-protection') || 'false';
  var platinumProtection = link.getAttribute('data-platinum-protection') || 'false';

  if (tprs === 'false' && systemProtection === 'false' && preferredProtection === 'false' && platinumProtection === 'false') {
    standard = true;
  }

  var p = new pym.Parent(id, 'https://www.owenscorning.com/public_widgets/warranty' + generateSiteDataParams('?') + '&standard=' + standard + '&tprs=' + tprs + '&systemProtection=' + systemProtection + '&preferredProtection=' + preferredProtection + '&platinumProtection=' + platinumProtection);
}

// Setting scrolling="yes" so nothing is cut off.
// Warranty widgets have tooltips that go outside of the iframe if the iframe is too small
// eg with mobiles and PYM doesn't resize once iframe is initailized.
for (var i = 0; i < warranty_links.length; i++) {
  document.getElementById('oc_warranty_' + i).children[0].setAttribute("scrolling", "yes")
}

    }

    // DESIGN EYE Q
    if (document.getElementById("visualizer")) {
      renderDeq = () => {
  const deqDiv = document.getElementById('visualizer')
  const deqZip = deqDiv.getAttribute('data-zip')
  const widget = new deq({
    target: '#visualizer',
    zip: deqZip,
  });
}
loadScript('https://owenscorning.chameleonpower.com/js/widget/deq.min.js', renderDeq);

    }
  };

  document.addEventListener('DOMContentLoaded', bootstrap);
  if (document.readyState !== 'loading') {
    setTimeout(bootstrap, 1);
  }
})();