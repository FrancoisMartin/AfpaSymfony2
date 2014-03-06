AfpaCalculetteBundle
========================

Bundle de Calculette pour SYmfony2.

Utilisation :

1. Addition 
URL : /calculette/1/2
Retourne la somme de 1+2

2. Autres opérations arithmétiques
URL : /calculette/3/5?operation=multiplication
Retourne le résultat de 3*5

Une page /result/{resultat} affiche le resultat calculé précédemment (redirection)

3. Service Fibonacci
La Bundle dispose d'un service 'fibonacci'
- Utilisation :
$fib = $this->get('fibonacci');
$fib->get(7); // Retourne 13