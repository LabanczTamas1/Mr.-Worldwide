# Mr. Wordlwide
## Követelmény specifikáció:
### Jelenlegi helyzet:
A MR.WorldWide platform célja, hogy összekapcsolja a bloggereket és az olvasókat, lehetővé téve számukra, hogy megosszák tapasztalataikat és felfedezéseiket különböző helyekről amiket már meglátogadtak.
A platform a felhasználói élményre specifikálódik, hogy minél könnyedébben tudjanak az olvasók elérni különböző blogokat.

### Vágyálom rendszer:
A projekt célja egy olyan rendszer, amely az utazni vágyó felhasználók számára kényelmes, egyszerű és hatékony böngészését biztosítja. Célunk, hogy a felhasználó naprakész információkat kaphasson az elérhető úticélokról, látványosságokról. A web oldalt látogatók csak megtekinteni képesek a különböző posztokat, majd regisztrációt követően a rendszer lehetővé teszi a felhasználók számára egyes posztokhoz való hozzászólást és azok kedvelését. A rendszernek van egy admin felülete is, ahol az admin képes új posztokat létrehozni, azokat módosítani vagy éppen törölni.

Kifinomult, letisztult és elegáns felülettel rendelkezik a program, hogy felkeltse a felhasználók figyelmét. Ezenkívül reszponzív felülettel rendelkezik, mely lehetővé teszi, hogy az online megjelenés mobil telefonon vagy akár tableten is működjön.

### Jelenlegi üzleti folyamatok:
3.Jelenlegi üzleti folyamatok a MR.WorldWide platformon

3.1. Blogbejegyzések nyilvántartása

3.1.1. Új blogbejegyzés létrehozása
- A blogger saját döntése alapján készíti a bejegyzést.
- A bejegyzés dokumentálva van, majd publikálva a platformon.

3.1.2. Blogbejegyzés eltávolítása
- A blogger dönt a bejegyzés törléséről.
- Az adminisztrációs felületen keresztül eltávolítja a tartalmat, ami manuálisan is rögzítésre kerül egy nyilvántartásban.

3.2. Blogmegjelenítés és olvasói interakciók
- Az olvasók regisztráció vagy bejelentkezés után tudnak hozzászólni a blogbejegyzésekhez illetve likeolni.
- A kommenteket közvetlenül a blogbejegyzés alatt lehet megírni, amit a rendszer azonnal rögzít.

### Igényelt üzleti folyamatok:
4.‎‎‎Igényelt üzleti folyamatok a MR.WorldWide platformon

4.1 Online megjelenés

4.1.1. Blogbejegyzés felvitele az adatbázisba
- Adminisztrátor jogosultsággal belépés
- Adminisztráció menü kiválasztása
- Új blogbejegyzés felvitel menüpont kiválasztása
- Adatok megadása (cím, leírás, képek, címkék)
- Véglegesítés

4.1.2. Blogbejegyzés szerkesztése
- Adminisztrátor jogosultsággal belépés
- Adminisztráció menü kiválasztása
- Blogbejegyzések listája megnyitása
- Kiválasztott bejegyzés szerkesztése (módosítások végrehajtása)
- Véglegesítés

4.1.3. Blogbejegyzés törlése
- Adminisztrátor jogosultsággal belépés
- Adminisztráció menü kiválasztása
- Blogbejegyzések listája megnyitása
- Kiválasztott bejegyzés törlése (megerősítés kérése)
- Törlés végrehajtása

4.1.4. Blogger regisztrálása
- Felhasználói regisztrációs űrlap kitöltése
- Adatok megadása (felhasználónév, email cím, jelszó)
- Regisztráció elküldése

4.1.5. Blog olvasása
- Felhasználó bejelentkezése (opcionális)
- Keresési funkció használata (kontinens, ország, város)
- Kiválasztott blogbejegyzés megnyitása és olvasása

4.1.6. Blog kommentelése
- Regisztrált felhasználó bejelentkezése
- Kiválasztott blogbejegyzés megnyitása
- Kommentmező kitöltése
- Komment elküldése

4.1.7 Blog like-olása
- Regisztrált felhasználó bejelentkezése
- Kiválasztott blogbejegyzés megnyitása
- Like gomb megnyomása
- A rendszer regisztrálja a lájkot, és frissíti a lájkok számát a bejegyzésnél
- Visszajelzés a felhasználónak, hogy a lájk sikeresen rögzítésre került

### A rendszerre vonatkozó szabályok:
MIT License

Copyright (c) 2024 Mr.WorldWide

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
### Követelménylista:
1. Funkcionális Követelmények

1.1 Felhasználói kezelés
- Regisztráció és Bejelentkezés: A felhasználók regisztrálhatnak e-mail cím vagy közösségi média fiók segítségével.
- Felhasználói Profil: Felhasználók létrehozhatnak és szerkezhetik a saját profiljukat beleértve a kapcsolati információikat és profilképüket.

1.2 Tartalom kezelés
- Blogbejegyzés Készítése: Felhasználók új blogokat írhatnak, szerkeszthetnek és közzéthetnek.
- Tartalom Formázás: Bejegyzések formázása a webolalon.
- Kategorizálás: Bejegyzések kategorizálásának lehetősége.
- Kép feltöltés: A bejegyzésekhez képeket tölthetnek fel.

1.2 Keresés és Navigáció
- Keresőfunkció: Felhasználók keresési lehetősége bejegyzések eléréséhez.
-Navigáció: Weboldalon könnyű navigáció kategóriák alapján.

1.4 Interakció és Közösségi Funkciók
- Kommentelés: Felhasználók kommentelhetnek blogbejegyzések alatt.
- Like: Bejegyzések lájkolhatók

1.6 Adminisztráció
- Admin: Adminisztrátorok hozzáférhetnek a felhasználói fiókok kezelésére és a tartalom moderálására.

## Funkcionális specifikáció:

## Rendszerterv:

1.Architektúra áttekintés:
A Mr.WorldWide blogplatform egy webalapú alkalmazás, amely a felhasználók számára blogbejegyzések létrehozását, olvasását, kommentelését és interakcióját teszi lehetővé.

1.1. Alkalmazásarchitektúra:
Kliens (Front-end): A felhasználói felület HTML5, CSS és JavaScript technológiákra épül. A reszponzív megjelenést a Bootstrap CSS framework biztosítja, amely lehetővé teszi az oldal mobil nézetben történő használatát.
Back-end: A szerver oldali működés PHP alapú, amely a blogbejegyzéseket, felhasználói interakciókat és adminisztratív funkciókat kezeli. 
Adatbázis: A blogbejegyzések, felhasználói fiókok és interakciók adatainak tárolására (pl. MySQL vagy DbForge) szolgál.

1.2. Fő komponensek:
Front-end:
Felhasználói bejelentkezési és regisztrációs felület
Blogbejegyzések olvasása, kommentelés, like-olás
Kereső- és szűrőfunkciók
Reszponzív design
Back-end:
Felhasználói hitelesítés és jogosultságkezelés (regisztráció, bejelentkezés, admin jogosultság)
Blogbejegyzések kezelése (létrehozás, szerkesztés, törlés)
Interakciók kezelése (kommentek és like-ok rögzítése)
Adminisztrációs felület
Adatbázis:
Tervezés alatt.

2.Adatmodell:

2.1. Felhasználói táblák:
Tervezés alatt.

2.2. Tartalomkezelési táblák:
Tervezés alatt.

3.Fő funkciók:

3.1. Felhasználói funkciók:
Regisztráció: A felhasználók kitöltik a regisztrációs űrlapot, a rendszer ellenőrzi az adatokat, majd elmenti azokat az adatbázisba. 
Bejelentkezés: A felhasználók bejelentkeznek a felhasználónév/jelszó kombinációval, amelyet a rendszer összevet az adatbázissal.
Blogok megtekintése: A felhasználók böngészhetik a blogokat, olvashatják a bejegyzéseket és interakcióba léphetnek azokkal.
Keresés és szűrés: A felhasználók kereshetnek blogokat kulcsszó vagy kategória alapján.

3.2. Adminisztrációs funkciók:
Blogkezelés: Az admin felület lehetővé teszi a blogbejegyzések kezelését (új bejegyzés létrehozása, szerkesztése, törlése).
Moderálás: Az admin moderálhatja a felhasználói interakciókat, például törölhet kommenteket és posztokat.

4. Felhasználói hitelesítés és jogosultságkezelés:
Jelszavak titkosítása 


5. Technológiai Stack:
Front-end: HTML5, CSS, JavaScript és JQuery
Back-end: PHP (MVC)
Adatbázis: DbForge vagy MySQL

