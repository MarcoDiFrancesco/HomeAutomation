Questo progetto è stato fatto per il progetto di maturità 2017/2018 di Marco Di Francesco scuola E. Fermi di Venezia

Questo progetto prevede la gestione della casa domotica tramite un Web Server, sia remoto che locale.
Per l'utilizzo di un server locale si deve utilizzare il programma XAMPP.

Step per la creazione:
* Installare [XAMPP](https://www.apachefriends.org/download.html), [Arduino](https://www.arduino.cc/en/Main/Software), [Processing](https://processing.org/download)
* Scaricare il repository e inserire la cartella unzippata `HomeAutomation-master` in `C:\xampp\htdocs`
* Aprire XAMPP e avviare `Apache` e `MySQL`
* Cercare nel browser l'indirizzo [`127.0.0.1/HomeAutomation-master/createDatabase.php`](127.0.0.1/HomeAutomation-master/createDatabase.php) per creare il DataBase
* Aprire `CasaDomotica.ino` con il programma Arduino
* Per importare le librerie andare su `File` →  `Prefesences` → `Sketchbook location` e incollare `C:\xampp\htdocs\HomeAutomation-master`
* Caricare il codice nel proprio Arduino con il comando `Upload`
* Aprire il file `processing.pde` → `processing` e avviare il programma con il triangolo `Run`
* Entrare in [`127.0.0.1/HomeAutomation-master`](127.0.0.1/HomeAutomation-master/)
