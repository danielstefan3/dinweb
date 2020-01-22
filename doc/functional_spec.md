1. Áttekintés

A weboldal célja hogy kiszolgálja a felhasználókat egy univerzális feltöltő felülettel ahova minden regisztrált user feltöltheti véleményét leírását kedvenc sorozatairól, filmjeiről. 
A hosszútávú cél, hogy ne csak számítógépen legyen elérhető az alkalmazás hanem telefonon is.
A weboldal rendelkezik regisztrációs felülettel, loginnal valamint Upload funkcióval is amit csak login után ér el a felhasználó. Ha már feltöltötte a kivánt szöveget és modódositani akar rajta azt is szabadon megteheti.
Szeretnénk a későbbiekben lehetőséget biztosítani a feltöltött tartalmak megosztására is a különböző közösségi hálókon.


2. Jelenlegi helyzet

A weboldal célja hogy kiszolgálja a felhasználókat egy univerzális feltöltő felülettel ahova minden regisztrált user feltöltheti véleményét leírását kedvenc sorozatairól, filmjeiről. 
A weboldal rendelkezik regisztrációs felülettel, loginnal valamint Upload funkcióval is amit csak login után ér el a felhasználó. Ha már feltöltötte a kivánt szöveget és modódositani akar rajta azt is szabadon megteheti.


3. Vágyálom rendszer leírása

A projekt célja egy olyan weboldal megalkotása, ahova a felhasználók szabadon fölthetnek barmilyen szöveges állományt. 
Az ehez szükséges folyamatoknak hibátlanul kell végbemenniük, hogy a userek elégedettek legyenek a szolgáltatásokkal. 
A rendszer felhasználó barát, egyértelmű utasításokkal van ellátva, letisztult felülettel rendelkezik.



4. Jelenlegi folyamatok modellje

A jelenlegi rendszer nem elég átlátható és felhasználóbarát. A szerkesztett adatok könnyen elveszhetnek és nincs mód azok visszaállítására.



5. Igényelt folyamatok modellje

A megrendelő kérései hogy kiszolgálja a felhasználók igényeit, illetve a 
feltöltött adatok könnyebb hozzáférhetősége, letisztult környezetben. Összességében 
egy olyan online, grafikus rendszer megvalósítása a feladat, ahol a felhasználó regisztráció
és bejelentkezés után egy egyszerű webfelelületen, könnyedén tudja az szöveges véleményét feltölteni, 
tárolni.



6. Követelmény lista

Követelmény lista | Modul | Név | Kifejtés | |-----------------------|-------------------------------|------------------------------------------------------------------------| | Felület | Főoldal – index.html | A weboldal megnyitásakor megjelenő oldal | | Felület | Header – header.html | A fejléc és menüsáv minden oldalon ugyan az, kivéve a be/kijelentkezés | | Felület | Footer – footer.html | Minden oldal alsó sávja | | Felület | Regisztracio - Register.php | Regisztrációs oldal ahol adatokat kérünk be a usertől. |
| Felület | Login - Login.php | Bejelentkező felület | | Felület | Feltöltes - Upload.php | Feltöltő felület | | Felület | Szerkeztés - Edit.php | A feltöltött állományok kezelésére szolgáló felület | | Felület | Design | letisztult | | Modifikáció | Adatbázis kezelés | Adatbázisban táblák a userekről, feltöltött adatokról | | Modifikáció | Felhasználó kezelés | regisztráció, bejelentkezés | | Jogosultság | Bejelentkezés / Kijelentkezés | Admin vagy sima felhasználó kezelése | | Jogosultság / Felület | Regisztráció | Regisztrációs felület, adatok bekérése |


7. Használati esetek

A használati esetek feladata, hogy leírja a különböző felhasználok hogyan fognak a rendszerhez viszonyulni, hogyan fogják használni, és mihez is fognak majd hozzáférni.
Már megvannak adva a különböző felhasználói szerepkörök és, hogy milyen dolgokhoz milyen hozzáféréseik vannak. Ezek alapján kell megírni a használati eseteket.
Két felhasználói szerepkör van: ADMIN, FELHASZNÁLÓ. Fontos, hogy a különböző rendszer használatokhoz csak az férjen hozzá akinek hozzá kell férnie.
