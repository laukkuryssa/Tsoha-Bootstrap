# Tietokantasovelluksen esittelysivu

Yleisiä linkkejä:

* [Linkki sovellukseeni](http://timohaut.users.cs.helsinki.fi/kurssihallinta/)
* [Linkki sovelluksen dokumentaatioon](doc/dokumentaatio.pdf)

## Kurssihallinta

Kurssihallinta-sovelluksessa on samat ominaisuudet kuin aiheessa Kurssitarjonta ja kurssipaikan varaus on määritetty.

[Kurssihallinta](http://advancedkittenry.github.io/suunnittelu_ja_tyoymparisto/aiheet/Kurssitarjonta_ja_kurssipaikan_varaus.html) 

### Linkkejä muille sivuille

* [Linkki etusivulle](http://timohaut.users.cs.helsinki.fi/kurssihallinta/)
* [Linkki kurssien listaussivulle](http://timohaut.users.cs.helsinki.fi/kurssihallinta/kurssiLista)
* [Linkki kirjautumiseen](http://timohaut.users.cs.helsinki.fi/kurssihallinta/login)
* [Linkki opiskelijoiden listaussivulle](http://timohaut.users.cs.helsinki.fi/kurssihallinta/opiskelijaLista)
* [Linkki uuden kurssin luontiin sekä jo luotujen kurssien muokkaukseen (näkyy vain ylläpidolle)](http://timohaut.users.cs.helsinki.fi/kurssihallinta/uusiKurssi)


### Käyttöohje

Sovellukseni URL-osoite: http://timohaut.users.cs.helsinki.fi/kurssihallinta/

Kirjautuminen onnistuu seuraavilla tunnuksilla:

käyttäjätunnus: timohau
salasana: secret123

user_logged_in -muuttuja ei toimi, vaikka se on toteutettu. Marko ei osannut sanoa, missä on vika ja laitoin tänään Artolle sähköpostia asiasta. Asia oletettavasti korjaantuu lähipäivinä. Kirjautuminen kuitenkin toimii.

Mitään varsinaisia käyttöohjeita ei ole. Etusivulta pääsee muille sivuille navigointipalkin avulla. Tässä vaiheessa [kurssin luonti](http://timohaut.users.cs.helsinki.fi/kurssihallinta/uusiKurssi), [muokkaus ja poisto](http://timohaut.users.cs.helsinki.fi/kurssihallinta/kurssiLista) onnistuu keneltä tahansa, mutta kun saan toimimaan muuttujan user_logged_in, vaaditan tämän userin käyttäjätunnukseksi "admin". Deadlinessa vaadittu toiminnallisuus siis pelaa, mutta oikeudet kaikilla.
