Upload tesztelés ###################################################################################################################################

1.1 Elvárások a teszt során:
	-T1: Kezdőkép / Login screen: 
		bejelntkezés egy adatbázisbán tárolt username/password párossal
		VAGY
		link ami továbbvisz a regisztrációs oldalra
	-T2: Regisztrációs oldal: 	
				-e-mail cím ellenőrzés: csak a megfelelő formátumu e-amil címet fogadja el, a mező nem maradhat kitöltetlen
				-jelszó ellenőrzés: tartalmaznia kell legalább egy kis- és egy nagybetűt, valamint számot, a mező nem maradhat kitöltetlen
				-username ellenőrzés: mező nem maradhat kitöltetlen, az adatbázisban nem szerepelhetnek azonos usernevek
		az ellenőrzések a regisztráció gomb megnyomásával hajtódnak végre
	-T3: Home oldal:
		Felsorolja az adatbázisba sikeresen feltöltött sorozat objektumokat
			-az objektumok az edit gombbal módosíthatók azon felhasználók által, akik létrehozták azt
			-a view gombbal megtekinthetjük az objetum részleteit
			-a menüsávban tartalmazza az összes user számára fontos linket
	-T4: Edit oldal:
		A sorozat objektum mezőit ezen oldalon módosíthatjuk, a mezők tartalmát ellenőrizzük:
			-a betöltéskor autómatikusan megjelennek a korábban adatbázisba letárolt mezők
			-egyik mező sem maradhat kitöltetlen az editálás során
			-a kiadás événak nagyobbnak kell lennie mint a 1900
			-a leírás mező legalább 50 karakter hosszúságú
			- a vélemény mező legalább 50 karakter hosszúságú
		az ellenőrzés az edit gomb lenyomásával hajtódik végre
	-T5: Upload oldal:
		Új sorozat objektumot hozhatunk létre, ami az adatbázisba töltődik, a mezők tartalmát ellenőrizzük:
			-a betöltéskor autómatikusan megjelennek a korábban adatbázisba letárolt mezők
			-egyik mező sem maradhat kitöltetlen az editálás során
			-a kiadás événak nagyobbnak kell lennie mint a 1900
			-a leírás mező legalább 50 karakter hosszúságú
			- a vélemény mező legalább 50 karakter hosszúságú
		az ellenőrzés az upload gomb lenyomásával hajtódik végre
	-T6: Details oldal:
		A kiválasztott sorozat objektum mezőit részletező oldal. Amennyiben az objektum nem található az adatbázisban,
		az oldal átirányít a 404 page-re.
	-T7: Reszponzivitás: az előbbiekben felsorolt, és egyéb oldalak megjelenése nem torzul képernyőméret változása esetén
	-T8: Böngészőfüggetlenség: az oldalak megjeleníthetőek a leggyakrabban használt böngészőkben
	
1.2 Fejlesztő tesztek
	Fejlesztői teszt célja a weboldal elemi működéséhez szükséges metódusok, funkciók, hibakezelések, adatbázis scriptek ellenőrzése.
	Teszt elemei:
		1. "functions.php" metódusainak tesztelése
		2. Adatbáziskapcsolat tesztelése
		3. SQL scriptek működésének ellenőrzése
		4. Hibakezelések elvárható módon működnek,
		5. akár adatbáziskapcsolat megszűnésével is
		
1.3 User teszt
	-A user teszt célja a felhasználó szemszögéből megvizsgálni a felület elemeinek és funkcióinak gördülékeny működését
	-A teszt az 1. pontban meghatározott kritériumok alapján kivitelezhető
	
	
################################################################################################################################################################################

2.1 Fejlesztői teszt eremények:

	1. function php függvényei:
			felfedezett hibák:
			@ get_series_by_id sql command stringje hibát dob az atabázisban -- javítva
			
			függvények elvárt módon működnek
			
	2. Adatbáziskapcsolat
			felfedezett hibák:
			@ -
			
			adatbáziskapcsolat az elvárt módon működik (localhoston)
			
	3. SQL create table scriptek:
			felfedezett hibák:
			@ -
			
			sql scriptek az elvárt módon működnek

	4. hibakezelések:
			felfedezett hibák:
			@ -
			
			hibakezelések a user test során átirányítják a usert a 404 error pagere
			
	5. adatbáziskapcsolat megszűnése esetén:
			felfedezett hibák:
			@ -
			
			hibakezelések a user test során átirányítják a usert a 404 error pagere

2.2 User teszt eredmények:

	1. Login:
		@ bejelentkezés sikeres az adatbázisban rögzített felhasználónévvel és jelszóval
		@ regisztrációs oldal linkje átirányít
	
	2. Regisztráció:
		@kitöltetlen mezők ellenőrzésre kerülnek, figyelmeztetnek
		@email cím formátumot ellenőrizzük
		@létrehozott userrel be lehet lépni
		
	3. Home:
		@listázza a sorozateket, deatils, edit, upload gombok étirányítanak
		@menüsor látható, linkek működnek
		
	4. Edit:
		@kitöltetlen mezők ellenőrzésre kerülnek, figyelmeztetnek
		@rövid input esetén a mezők figyelmeztetnek
		@időnként upload gomb hatására 404 error page-re ugrik - 
				javítva - get_series_by_id függvény nem működött megfelelően mert a $id változó null értéket kapott
	
	5. Upload:
		@kitöltetlen mezők ellenőrzésre kerülnek, figyelmeztetnek
		@rövid input esetén a mezők figyelmeztetnek
		@időnként upload gomb hatására 404 error page-re ugrik - 
				javítva - get_series_by_id függvény nem működött megfelelően mert a $id változó null értéket kapott
				
	6. Details:
		@elvárt módon működik, a sorozat mezői olvashatók
		
	7. Reszponzivitás:
		@az oldalak reszponzívak, torzulásuk nem zavaró
		
	8. Böngészőfüggetlenség:
		@Chromeból és Edge-ből tesztelve megfelelőek
	
		
