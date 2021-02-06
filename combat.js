const ACTIONS = document.querySelectorAll('.action');
const DELAI = 750;
const NBACTIONS = 8;
const DELAI_DISPARITION = DELAI * NBACTIONS;

ACTIONS.forEach((action, key) => {
	const APPARITION = DELAI * (key + 1);
	setTimeout(() => {
		afficherAction(action);
		action.scrollIntoView();
	}, APPARITION);
	/*
	if (key < ACTIONS.length - 1 - NBACTIONS) {
		setTimeout(() => {
			cacherAction(action);
		}, APPARITION + DELAI_DISPARITION);
    }
    */
});

function afficherAction(action) {
	action.style.display = 'block';
}

function cacherAction(action) {
	action.style.display = 'none';
}
