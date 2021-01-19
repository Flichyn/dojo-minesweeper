# dojo-minesweeper

Une grille de démineur rectangulaire de taille variable (sous forme de tableaux à 2 dimensions), est envoyée en paramètre à une classe MineSweeper(array $tiles). Sur cette grille, les 0 sont des cases vides, les 'x' correspondent à des bombes (une constante MineSweeper::BOMB peut être utilisée à la place du 'x').
Une méthode play($x,$y) permet de tester une case de la grille d’après ses coordonnées (commence à 0,0 en haut à gauche). Le retour de la méthode doit être le nombre de bombes adjacentes (diagonales incluses). 
Une exception doit être levée avec le message “Boom” si la case contient une bombe. 
Une exception doit également être retournée si les coordonnées sont en dehors de la grille
Exemples : 
    Exemple d’une grille de 4x3
	[
	    [0,0,0,'x'],
	    [0,'x',0,'x'],
	    ['x',0,0,0],
	]
	si l’on souhaite tester la case 2,1 (en vert), le retour doit être 3 (il y a en effet 3 bombes autour, diagonales comprises)
	si l’on souhaite tester la case 0,2 (en rouge), une exception avec le message “boom” est levée car nous sommes sur une bombe
Option : modifier la valeur de la case jouée pour y indiquer le nombre de bombes trouvé par la méthode play().
