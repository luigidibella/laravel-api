Esercizio: Laravel Boolfolio - Base
===
Creiamo con Laravel il nostro sistema di gestione del nostro Portfolio di progetti.
## PROCEDURE PER AUTH

### Creazione progetto
2. Scaricare Breeze
3. installare breeze
4. installare il pacchetto di Pacifici
5. installare ui:bootrsap --auth
(con mac e laravel 10 rinominare vite.config.js in vite.config.cjs)

### Sviluppo 
1. Creare il DB
2. Fare la migration
3. Nelle view aggiungere le cartelle guest e admin
4. customizzate  il layout guest e aggiungere la view home in view/guest
5. creare il controller Guest/PageController che in index restituisce la view guest.home
6. Aggiornare la rotta home
7. Creare il layout admin.blade
8. Creare il Admin/DashboardController chi in index punta alla view admin.home che estende il layout admin
9. Raggruppare le rotte admin protette da Middleware impostando prefisso e nome
10. Creare la rotta admin/home che punta a DashboardController@index
11. Modificare RouteServiceProvider in modo che la rotta admin di default sia ‘/admin’
12. Nell’header del layout admin collegare la home della dashboard, la home pubblica, mettere il nome dell’utente loggato e il bottone funzionante logout

## BONUS
Creazione del modello `Project` con relativa migrazione, seeder, controller e rotte e stampare la index  dei progetti (protetta da middleware).
