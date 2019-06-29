Tere!

Vot lopuks sai valmis, aga moned asjad ma pean siia seletama/kirjutama, et koik tootaks.


Niisiis...

Kasutasin admebaasi olemasoluks programmi Xampp(seal panin toole Apache ja MySQL)

Te peate siis Ka seda allalaadima(kui teil pole :) ning tegema -
-- localhost/phpmyadmin'is voi siis lihtsalt phpmyadmin'is Andmebaasi(database)
nimega 'veebipood'(ilma ulakomadeta) ning sinna kaks table'it uhe nimi on...
'images' ja teise nimi on 'users'.

Table'is 'images' peate tegema kolm(3) column'it 'id', 'name', 'image'(tapselt samas jarjekorras)
'Id' on int(11), 'name' on varchar(200) ja 'image' on Blob.
Table'is 'users' peate tegema neli(4) column'it 'user_id', 'user_email', 'user_uid', 'user_pwd' (tapselt samas jarjekorras)
'Id' on int(11) koik muu on varchar(256).
Ecnription on latin1_swedish_ci  (igaks juhuks kirjutan, see peaks olema default'ne :).



CSS ma palju ei teinud, kuna siin voib fantaasia lennata :), aga kui minu theme ei hakka teile meeldima, siis----
-- kirjutage kohe tagasi, et ma teeks lehe ilusamaks :D, mul juba valmis pildid ja varvid(mujal failides, neid ma ei saada :D), et teha lehe ilusamaks.

Kui tekkib mingi Bug/Glitch kirjutage koheselt! Saab parandatud.


Kaustas 'Testid' arge minge, aga kui lahete, siis seal saate naha raskemate veebilehe funktioonide prototuupe, ehk kuidas nad algasid, kuidas ma mida tegin, aga seal pole koik---
--- kuna ma paljud ebavajalikud asjad viisid teistesse kasutadesse arvutil. :D


Siin on ka kaust 'PHP', kuid seal on neid faile vahe, kuna paljud '.php' failid on rohkesti HTML :)


Kaustas includes on failid mis , nagu nimigi utleb, on abistavad voi 'tagaplaanil' nt:Logimise susteemi too, andmebaasiga uhendamine jne.
 

NB! Et programm/failid tootaks/toodaksid on vaja minna Xammpi failidesse, seal minna kausta htdocs ja sinna lisama see fail/kausta mis teile saadsin.
Location peaks olema selline---   C:xampp/htdocs/'MuSaadetudKaust'.(Igaks juhuks lisan)