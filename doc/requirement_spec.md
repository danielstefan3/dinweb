#Követelmény specifikáció


##1. Vezetői összefoglaló/Áttekintés
A weboldal célja hogy kiszolgálja a felhasználókat egy univerzális feltöltő felülettel
ahova minden regisztrált user feltöltheti gondolatait, jegyzeteit vagy akár naplót is vezethet.

A weboldal rendelkezik regisztrációs felülettel, loginnal valamint Upload funkcióval is amit csak login után ér el a felhasználó.
Ha már feltöltötte a kivánt szöveget és modódositani akar rajta azt is szabadon megteheti.
##2. Vágyálom rendszer
A projekt célja egy olyan weboldal megalkotása, ahova a felhasználók szabadon fölthetik véleményük leírását kedvenc sorozatairól, filmjeiről.
Az ehez szükséges folyamatoknak hibátlanul kell végbemenniük, hogy a userek elégedettek legyenek a szolgáltatásokkal.
A rendszer felhasználó barát, egyértelmű utasításokkal van ellátva, letisztult felülettel rendelkezik.
##3. Felhasználói követelmények
A felhasználók számára láthatónak kell lennie a korábban felöltött anyagoknak.
Szerkesztési lehetségnek is addottnak kell lennie.

##4. Jelenlegi üzleti folyamatok modellje:
Igyekem megteremteni egy olyan weboldalt ami designban és felhasználóbarátságban is helyt áll.

##5. Követelmény lista
| Modul                 | Név                           | Kifejtés                                                               |
|-----------------------|-------------------------------|------------------------------------------------------------------------|
| Felület               | Főoldal – index.html          | A weboldal megnyitásakor megjelenő oldal                               |
| Felület               | Header – header.html          | A fejléc és menüsáv minden oldalon ugyan az, kivéve a be/kijelentkezés |
| Felület               | Footer – footer.html          | Minden oldal alsó sávja                                                |
| Felület               | Regisztracio - Register.php   | Regisztrációs oldal ahol adatokat kérünk be  a usertől.                |                                       
| Felület               | Login - Login.php             | Bejelentkező felület                                                   |
| Felület               | Feltöltes - Upload.php        | Feltöltő felület                                                       |
| Felület               | Szerkeztés - Edit.php         | A feltöltött állományok kezelésére szolgáló felület                    |
| Felület               | Design                        | modern                                                             |
| Modifikáció           | Adatbázis kezelés             | Adatbázisban táblák a userekről, feltöltött adatokról                  |
| Modifikáció           | Felhasználó kezelés           | regisztráció, bejelentkezés                                            |
| Jogosultság           | Bejelentkezés / Kijelentkezés | Admin vagy sima felhasználó kezelése                                   |
| Jogosultság / Felület | Regisztráció                  | Regisztrációs felület, adatok bekérése                                 |                                 


