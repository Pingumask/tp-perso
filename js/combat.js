const ACTIONS = document.querySelectorAll('.action');
const DELAI = 750;

ACTIONS.forEach((action, key) => {
	const APPARITION = DELAI * (key + 1);
	setTimeout(() => {
		afficherAction(action);
		action.scrollIntoView();
	}, APPARITION);
});

function afficherAction(action) {
	action.style.display = 'block';
}

function cacherAction(action) {
	action.style.display = 'none';
}
