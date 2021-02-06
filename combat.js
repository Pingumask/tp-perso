const actions = document.querySelectorAll('.action');

actions.forEach((action, key) => {
	console.log(action);
	setTimeout(() => {
		afficherAction(action);
	}, 600 * key);
	if (key < actions.length - 5) {
		setTimeout(() => {
			cacherAction(action);
		}, 600 * key + 2400);
	}
});

function afficherAction(action) {
	action.style.display = 'block';
}

function cacherAction(action) {
	action.style.display = 'none';
}
