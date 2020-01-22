#Rendszerterv



##1. Adatterv
	
	MySQL adatbázis kapcsolat:
	Egy külső adatbázis kapcsolat létrehozása ahonnan adatokat kér le és dolgoz fel.
	
	Az adatokat a következő táblákban és mezőkben tároljuk:
	
	Felhasználó (felhasználónév, jelszó, email, regisztáció időpontja)
	Feltöltött sorozat (cím, kiadás éve, történet, vélemény, borítókép, hozzáadás dátuma, felhasználó_azonosító)


##2. Adatvédelmi terv

	Regisztráció és belépés:
	
	Az feltöltési funkciót kizárólag regisztráció, és bejelentkezés után lehet használni. 
	
	Regisztrációkor megkell adni: felhasználónév, e-mail cím, jelszó. 
	

##3. A rendszer működésének terve

	A megrendelő kérései hogy kiszolgálja a felhasználók igényeit, illetve a 
	feltöltött adatok könnyű hozzáférhetősége, letisztult környezetben. Összességében 
	egy olyan online, grafikus rendszer megvalósítása a feladat, ahol a felhasználó regisztráció
	és bejelentkezés után egy egyszerű webfelelületen, könnyedén tudja az adatait feltölteni, 
	tárolni, majd alkalom adtán letölteni.
	
	A megvalósításhoz két felületet szükséges létrehozni:
 
	Egy adminisztrációs felület, ahol a megrendelő regisztrálni tudjon, 
	majd be tudjon jelentkezni. 
	
	Szükség van még egy felhasználói felületre is, ahol az alábbi igényeket kell kiszolgálni:
	
	- Átlátható, letisztult felület
	- Adat feltöltése a tároló szerverre
	- Adat letöltése a tároló szerverről
	- Adat módosítása a tároló szerveren
	- Adat törlése a tároló szerverről
	- Lekérdezések megvalósítása adat tulajdonosa (felhasználónév) szerint


##4. Funkciók terve (programspecifikációk)

	#Regisztráció:
	
	Bármely személy a szükséges megadott adatokkal regisztrálhat.
	A további funkciók eléréséhez nélkülözhetetlen.
	
	#Bejelentkezés:
	
	A felhasználó az elvégzett regisztráció után a regisztráció folyamán megadott 
	felhasználónév-jelszó párosítással beléphet a weboldalra.
	
	#Feltöltés:
	
	Kizárólag a bejelentkezés utáni funkció, a felhasználó feltölheti a kiválasztott
	dokumentumot (fájlt) a szerverre.
	
	#Módosítás:
	
	Kizárólag a bejelentkezés utáni funkció, a felhasználó módosíthatja a kiválasztott
	dokumentumot (fájlt) a szerverre.
	
	#Letöltés:
	
	Kizárólag a bejelentkezés utáni funkció, a felhasználó letöltheti a kiválasztott
	dokumentumot (fájlt) az eszközére.
	
	#Törlés:
	
	Kizárólag a bejelentkezés utáni funkció, a felhasználó törölheti a kiválasztott
	dokumentumot (fájlt) a szerverről.	



