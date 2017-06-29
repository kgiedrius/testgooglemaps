# Užduotis

Optimizuoti kurjerių darbą, apskaičiuojant trumpiausią maršrutą prekių išvežiojimui.

## I dalis (backend)

Naudojant PHP sukurti REST API webservisą. Webservisas turi priimti HTTP_POST metodu siunčiamus duomenis ir atlikti 2 užduotis:

* Pagal trumpus vietovių pavadinimus rasti detalią informaciją - pilnus pavadinimus bei koordinates. Duomenys priimami text/csv formatu. Rezultatas - JSON struktūra.
* Apskaičiuoti optimalų maršrutą, kokia tvarka aplankyti visas vietoves ir grįžti į pradinį kelionės tašką. Įvesties duomenys ir rezultatas - JSON duomenų struktūros.

Įvesties ir rezultato pavyzdiniai failai pateikti /io_samples/ kataloge. Kokią užduotį atlikti, ir kokį charset'ą naudoti dekoduojant duomenis, webservisas turėtų suprasti pagal užklausos "Content-type" header'ius (text/csv - vietovių info, application/json - kelio radimas).

## II dalis (frontend)

Naudojant Bootstrap karkasą, sukurti interfeisą, kuriame:

* Iš CSV failo užkrauti siuntų sąrašą (formatas ir duomenų pavyzdys - /io_samples/input1.csv) ir Boostrap Modal lange parodyti Google Maps žemėlapį su faile paminėtomis vietovės. Vietovių informacija turėtų būti gaunama kreipiantis į I dalyje sukurtą API.
* Paspaudus bet kurią iš žemėlapyje atvaizduojamų vietovių, atvaizduoti trumpiausią kelionės maršrutą aplankant visas kitas vietoves, kelionę pradedant ir baigiant tame taške. Kartu pateikti viso maršruto atstumą ir trukmę.

Pageidaujama, kad užduoties antros dalies rezultatas būtų pilnai įgyvendintas naudojant tik HTML/CSS/JS kodą, nekuriant papildomo serverinės dalies kodo (PHP).

## Užduoties atlikimas ir rezultatų pateikimas:

1. Užsiregistruokite http://server1.e-lab.lt:8888.
2. Susikurkite fork'ą užduočiai http://server1.e-lab.lt:8888/giedrius/uzduotis.git, nustatykite "private" prieigos teises (Settings -> General -> Sharing & Permissions). Suteikite prieigą projekto grupei "administrators" (Settings -> Members -> Share with group).
3. Atlikę užduotį, sukelkite kodą į GIT repositoriją ir atsiųskite projekto (fork'o) nuorodą el. paštu.

