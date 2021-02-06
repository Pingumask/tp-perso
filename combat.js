const ACTIONS = document.querySelectorAll('.action');
const DELAI = 750;
const NBACTIONS = 5;
const DELAI_DISPARITION = DELAI * NBACTIONS;

ACTIONS.forEach((action, key) => {
	const APPARITION = DELAI * key;
	setTimeout(() => {
		afficherAction(action);
	}, APPARITION);
	if (key < ACTIONS.length - 1 - NBACTIONS) {
		setTimeout(() => {
			cacherAction(action);
		}, APPARITION + DELAI_DISPARITION);
	}
});

function afficherAction(action) {
	action.style.display = 'block';
}

function cacherAction(action) {
	action.style.display = 'none';
}
