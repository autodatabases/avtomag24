function bindSEvent(obj, eventName, func) {
	
		if (document.attachEvent)
			obj.attachEvent("on"+eventName, func);
		else if (document.addEventListener) {
			obj.addEventListener(eventName, func, 0);
		}
	
}

function getWidth(id) {
	
	return (document.getElementById(id).scrollWidth > document.getElementById(id).offsetWidth)?document.getElementById(id).scrollWidth:document.getElementById(id).offsetWidth;
		
}

function getWidthByObj(obj) {
	
	return (obj.scrollWidth > obj.offsetWidth)?obj.scrollWidth:obj.offsetWidth;
		
}

function getMinWidth(id) {
	
	return (document.getElementById(id).scrollWidth < document.getElementById(id).offsetWidth)?document.getElementById(id).scrollWidth:document.getElementById(id).offsetWidth;
		
}

function getWidthByObj(obj) {
	
	return (obj.scrollWidth > obj.offsetWidth)?obj.scrollWidth:obj.offsetWidth;
		
}

function getSumWidth(els) {
	
	var sumWidth = 0;
	$$(els).each(function(elm) {
		sumWidth = sumWidth + getWidthByObj(elm);
	});
	
	return sumWidth;
	
}


function fixWidth() {
	//bindSEvent(window, 'load', setWidth);
	//bindSEvent(window, 'resize', setWidth);
}

function replaceSelect(el) {
	new DropDownList({el: el, replaceSelect: true});
}


function getWidthForce(el) {
	var size = el.measure(function(){
		return this.getSize();
	});

	return size.x;
}

function getHeightForce(el) {
	var size = el.measure(function(){
		return this.getSize();
	});

	return size.y;
}

function tryForFree(flTry) {
	flTry = flTry||1;
	TINY.box.show({
		iframe: '/?try='+flTry,
		width: 505,
		height: 238,
		animate: false,
		close: true,
		opacity: 50
	});
}


function showRequestForm() {
	tryForFree(100);
}
