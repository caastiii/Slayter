# Bergarako Antzokia - Slayter Taldea

## Aurkibidea

1. [Sarrera](#1-sarrera)
2. [Testuingurua](#2-testuingurua)
3. [Helburuak](#3-helburuak)
4. [Zereginak](#4-zereginak)
5. [Baliabideak](#5-baliabideak)
6. [Ondorioak](#6-ondorioak)
7. [Bibliografia](#7-bibliografia)
8. [Edukien lizentzia](#8-edukien-lizentzia)
9. [Eranskinak](#9-eranskinak)

---

## 1. Sarrera

Proiektu hau Miguel Altuna Lanbide Heziketako Web Aplikazioen Garapena (2. maila) zikloko lehen erronkari dagokio. Dokumentu honetan, Slayter taldeak Bergarako Antzokirako garatu duen web aplikazioaren eta azpiegituraren nondik norakoak jasotzen dira. Erronka honen ardatza ekitaldi kulturalen kudeaketa eta sarreren salmenta ahalbidetuko duen plataforma bat sortzea izan da, atzean dituen zerbitzu guztiak integratuz.

## 2. Testuingurua

Bergarako Antzokiak bere ekitaldiak sarean erakusteko eta sarrerak Internet bidez saltzeko webgune baten beharra zeukan. Horretarako, hiru erabiltzaile profil kudeatu ditzakeen sistema bat garatu da:

- **Bisitariak (Erregistratu gabeak):** Webgunean konturik gabe nabigatu dezaketen erabiltzaileak dira, ekitaldien informazioa eta programazioa kontsultatzeko.
- **Erabiltzaile arruntak (Erregistratuak):** Sistemak erregistratuta dauden pertsonak dira; beren saioa hasita, sarrerak eros ditzakete.
- **Administratzaileak (Erregistratuak):** Kudeaketarako baimen bereziak dituzten erabiltzaile erregistratuak dira, ekitaldiak nahiz erabiltzaileak kudeatzeko aukera dutenak.

Hau guztia ezartzeko, sistema osoa fisikoki antzokiaren kontrolpean egoteko diseinatu da, Mac ordenagailuak eta birtualizazio-tresnak erabiliz sare lokal bat (LAN) sortuz, non web-aplikazioa eta kudeaketa-sistema elkarrekin konektatuta dauden.

## 3. Helburuak

- **Web Aplikazioa garatzea:** Ekitaldiak erakusteko eta sarrerak saltzeko webgune seguru eta intuitibo bat garatzea Laravel framework-a (MVC arkitektura) eta Blade txantiloiak erabiliz.
- **Interfaze moldagarria:** Erabiltzailearen esperientzia (UX/UI) eta irisgarritasuna bermatzea diseinu responsive baten bidez (HTML, CSS eta JavaScript erabiliz).
- **Azpiegitura teknologikoa:** VMWare Fusion erabiliz makina birtualak sortzea eta sare lokala (LAN) ondo konfiguratzea.
- **Zerbitzarian hedatzea:** Aplikazioa sare lokaleko edozein gailutatik atzitzeko Apache zerbitzariaren bidez publikatzea.

## 4. Zereginak

Proiektua aurrera eramateko honako zeregin nagusiak burutu dira:

1. **Azpiegitura sortzea:** Mac ordenagailuetan VMWare bidez Windows (garapena) makina birtualak instalatu eta IP helbidea konfiguratzea.
2. **Datu-baseen kudeaketa:** Web-aplikaziorako MySQL datu-baseak egituratzea.
3. **Backend garapena:** Laravel eta PHP erabiliz aplikazioaren logika, modeloak, eta kontrolatzaileak sortzea.
4. **Frontend garapena:** Web interfazearen diseinua eta sarreren erosketa prozesua eraikitzea.
5. **Hedapena (Deployment):** Apache Lounge erabiliz web aplikazioa sarean eskuragarri jartzea.
6. **Dokumentazioa:** Proiektuaren memoria, prototipoak eta beharrezko eranskin guztiak idatzi eta GitHub bidez kudeatzea.

## 5. Baliabideak

**Giza baliabideak:**

- **Slayter Taldea:** 2 pertsonaz osatutako lantaldea. Bakoitzak bere rolak hartu ditu proiektuaren garapen egokia bermatzeko.

**Baliabide materialak / Softwarea:**

- **Hardwarea:** Mac ordenagailua, Wi-Fi sare lokala sortzeko routerra eta taldekideen ordenagailu pertsonala.
- **Sistemak:** VMWare Fusion Windows 11.
- **Garapena:** Visual Studio Code, GitHub (bertsio-kontrola).
- **Teknologiak eta Zerbitzuak:** Laravel, PHP, Composer, HTML/CSS/JS, MySQL, Apache Lounge.

## 6. Ondorioak

Erronka honen bitartez, bezeroaren eskakizun nagusiei arrakastaz erantzutea lortu dugu. Bergarako Antzokiak orain erabat funtzionala den webgunea dauka, sarreren salmenta eta ekitaldien erakusleihoa ziurtatzen dituena. Teknikoki, garapen prozesuak (MVC arkitekturarekin lan egiteak, makina birtualen bidezko sare lokalak konfiguratzeak eta garapen tresna ezberdinak erabiltzeak) taldearen gaitasun informatikoak eta arazoei irtenbide egingarriak emateko trebetasunak nabarmen hobetu ditu. Talde-lanaren planifikazioa funtsezkoa izan da epe barruan proiektua amaitzeko.

## 7. Bibliografia

- Miguel Altuna Lanbide Heziketa (2026-2027) ikasmateriala.
- **Laravel Dokumentazio Ofiziala:** [https://laravel.com/docs](https://laravel.com/docs)
- **Tipografia:** Google Fonts
- **Koloreak:** HTML Color Codes
- **Ikonoak:** Lucide Icons
- **Prototipadoa:** Figma
- **Laguntza / AA:** Google Gemini

## 8. Edukien lizentzia

Proiektu hau formalki enpresa bati saltzeko garatu den arren, kodea irekian uztea erabaki dugu, jendeak erreferentzia gisa erabili eta aldatu ahal izateko.

Hori dela eta, lan hau _Creative Commons Atribuzioa-Ez Komertziala-Partekatu Berdin 4.0 Nazioarteko Lizentziapean (CC BY-NC-SA 4.0)_ argitaratzen da.

Erabilera baldintza nagusiak:

- _Aitortza (BY):_ Proiektua edo kodea berrerabili, kopiatu edo aldatuz gero, _Slayter Taldea_ aipatu behar da nahitaez.
- _Ez Komertziala (NC):_ Ezin da gure kodea erabili hirugarrenek irabazi ekonomikoak lortzeko (ezin da saldu ezta erabilera komertzialik eman ere).
- _Partekatu Berdin (SA):_ Gure proiektutik eratorritako lanek edo aldaketek lizentzia bera mantendu behar dute derrigorrez.

## 9. Eranskinak

Ondorengo eranskinak errepositorioan daude ikusgai:

- [Eranskina: Talde kontratua](Eranskinak/Slayter_TaldeKontratua.pdf)
- [Web orrialdea publikatzeko pausuak](Eranskinak/)
- [Erabiltzaile eta administradoreen loginak](slayter_bergarako_antzokia/)

_©️ 2026 Slayter._
