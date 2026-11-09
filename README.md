# Bergarako Antzokia - Slayter Taldea

## Aurkibidea

1. [Sarrera](#1-sarrera)
2. [Testuingurua](#2-testuingurua)
3. [Helburuak](#3-helburuak)
4. [Zereginak](#4-zereginak)
5. [Baliabideak (Giza baliabideak eta baliabide materialak)](#5-baliabideak-giza-baliabideak-eta-baliabide-materialak)
6. [Ondorioak](#6-ondorioak)
7. [Bibliografia](#7-bibliografia)
8. [Eranskinak](#8-eranskinak)

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

## 5. Baliabideak (Giza baliabideak eta baliabide materialak)

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

## 8. Eranskinak

Ondorengo eranskinak errepositorioko `EranskinFinalak` karpetan daude ikusgai:

- 📁 [I.- Eranskina: Talde kontratua](EranskinFinalak/Slayter_TaldeKontratua.pdf)
- 📁 [V.- Web orrialdea publikatzeko pausuak](EranskinFinalak/)
- 📁 [VI.- Erabiltzaile eta administradoreen loginak](slayter_bergarako_antzokia/)
