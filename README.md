# Užduotis

Optimizuoti kurjerių darbą, apskaičiuojant trumpiausią maršrutą prekių išvežiojimui.

## I dalis (backend)

Naudojant PHP sukurti REST API webservisą. Webservisas turi priimti HTTP_POST metodu siunčiamus duomenis ir atlikti 2 užduotis:

* Pagal trumpus vietovių pavadinimus rasti detalią informaciją - pilnus pavadinimus bei koordinates. Duomenys priimami text/csv formatu. Rezultatas - JSON struktūra.
* Apskaičiuoti optimalų maršrutą, kokia tvarka aplankyti visas vietoves ir grįžti į pradinį kelionės tašką. Įvesties duomenys ir rezultatas - JSON duomenų struktūros.

Įvesties ir rezultato pavyzdiniai failai pateikti /samples/ kataloge. Kokią užduotį atlikti, webservisas turi suprasti pagal užklausos turinio tipą (content-type).

## II dalis (frontend)

Naudojant Bootstrap karkasą, sukurti interfeisą, kuriame būtų:

* Iš CSV failo užkrauti siuntų sąrašą (formatas ir duomenų pavyzdys - input1.csv) ir Boostrap Modal lange parodyti Google Maps žemėlapį, kuriame būtų  ativaizduotos įkeltame faile paminėtos vietovės. Vietovių informacija turėtų būti gaunama kreipiantis į I dalyje sukurtą API.
* Paspaudus bet kurią iš žemėlapyje atvaizduojamų vietovių, atvaizduoti trumpiausią kelionės maršrutą aplankant visas kitas vietoves, kelionę pradedant ir baigiant tame taške. Kartu pateikti viso maršruto atstumą ir trukmę.

Pageidaujama, kad užduoties antros dalies rezultatas būtų pilnai įgyvendintas naudojant tik HTML/CSS/JS kodą, nekuriant papildomo serverinės dalies kodo (PHP).
