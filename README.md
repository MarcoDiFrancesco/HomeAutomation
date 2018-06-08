Questo progetto è stato fatto per il progetto di maturità di Marco Di Francesco dell'anno 2017/2018

Questo progetto prevede l'utilizzo di un Web Server, remoto o locale.
Per l'utilizzo di un server locale si deve utilizzare il programma XAMPP.

* Installazione [XAMPP](https://www.apachefriends.org/download.html), [Arduino](https://www.arduino.cc/en/Main/Software), [Processing](https://processing.org/download)
* Scaricare il repository e inserire la cartella unzippata `HomeAutomation-master` in `C:\xampp\htdocs`
* Aprire XAMPP e avviare `Apache` e `MySQL`
* Cercare nel browser l'indirizzo di XAMPP `127.0.0.1/createDatabase.php` per creare il DataBase
* Aprire `CasaDomotica.ino` con il programma Arduino
* Andare su `File` →  `Prefesences` → `Sketchbook location` e incollare `C:\xampp\htdocs\HomeAutomation-master` per importare le librerie
* Caricare il codice nel proprio Arduino con il comando `Upload`
* Aprire il file `processing.pde` presente nella cartella `processing`
