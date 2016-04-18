(function() {
	var getById = function(id) { return document.getElementById(id); };

	var $menuToggle = getById('userControlsToggle'),
		$menu = getById('userControlsMenu');
	
	var toggleMenu = function(state) {
		$menu.classList.toggle('open', state);
	};
	
	$menuToggle.addEventListener('click', function(event) {
		event = event || window.event;
		event.preventDefault();
	});
	
	document.addEventListener('click', function(event) {
		event = event || window.event;
		
		var target = event.target || event.srcElement;
		
		if (target.id === 'userControlsImage' || target.id === 'userControlsToggle') {
			event.preventDefault();
			
			toggleMenu(!$menu.classList.contains('open'));
		}
		else if (target.id !== 'userControlsMenu') {
			toggleMenu(false);
		}
	});
})();
