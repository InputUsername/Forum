(function() {
	var getById = function(id) { return document.getElementById(id); };

	var $menuToggle = getById('userControlsToggle'),
		$menu = getById('userControlsMenu');

	$menuToggle.addEventListener('click', function(event) {
		event.preventDefault();

		$menu.classList.toggle('open', !$menu.classList.contains('open'));
	});
})();
