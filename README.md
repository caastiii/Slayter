# Slayter
Slayter taldea, Bergarako Antzokiaren webgunea garatzen.

<br>

## Aurkibidea

1. [Sarrera](#1-sarrera)
2. [Benchmark](#2-benchmark)      
   2.1. [Ondorioak](#21-ondorioak)
3. [User profila](#3-user-profila)
4. [Krokisa](#4-krokisa)       
   4.1. [Mobila](##41-mugikorra)<br>
   4.2. [Eskritorioa](#42-eskritorioa)
5. [Nabigazio mapa](#5-nabigazio-mapa)
6. [Estilo gida](#6-estilo-gida)     
   6.1. [Koloreak](#61-koloreak) <br>
   6.2. [Tipografia](#62-tipografia) <br>
   6.3. [Ikonoak](#63-ikonoak) <br>
   6.4. [Botoiak](#64-botoiak) <br>
   6.5. [Irudiak](#65-irudiak) <br>
7. [Prototipoa](#7-prototipoa)
8. [Edukien lizentzia](#8-edukien-lizentzia)
9. [Erabilgarritasunaren azterketa](#9-erabilgarritasunaren-azterketa)
10. [Bibliografia eta webgrafia](#10-bibliografia-eta-webgrafia)

<br>

## 1. Sarrera

Repositorio honetan, **Bergarako Antzokia** , ekitaldiak kudeatu, ekitaldietarako sarrerak eta haien informazioa ikusteko proiektua jasoko da.
Dokumentu honetan berriz, atariaren aurre-diseinua jaso da, benchmark-a, erebiltzaile profilak, krokisak, mobil first kontuan izanik eta nabigazioa mapa jaso dira.

<br>

## 2. Benchmark

Sektoreko bost webgune aztertu dira, antzokiak eta zinemak tarteko, gure kasu-erabilera berdinekin (ekitaldien erakusleihoa, sarreren erosketa/salmenta eta kudeaketa). Nabigazioan, ekitaldien fitxetan, sarreren salmenta prozesuan eta bilaketa-sistemetan arreta jarri da. Lan hau oso baliagarria izan da, jarraitu eta ekidin beharreko patroiak identifikatzeko.

Ondorengo webguneak aztertu dira:

- *Teatro Arriaga (Bilbo)*: [https://www.teatroarriaga.eus/](https://www.teatroarriaga.eus/)
  - *Ona*: Diseinu dotorea eta klasikoa, antzoki baten izaera ondo islatzen duena. Elebiduna da (eu/es) eta ekitaldien fitxak oso osoak dira (sinopsia, fitxa artistikoa, argazkiak).
  - *Ahula*: Batzuetan, sarrerak erosteko prozesuak pauso gehiegi ditu edo leiho berriak irekitzen ditu, erabiltzailearen esperientzia pixka bat trabatuz.

- *Teatro Gayarre (Iruñea)*: [https://teatrogayarre.com/](https://teatrogayarre.com/)
  - *Ona*: Egutegiaren ikuspegia oso argia da, hilabeteko ekitaldiak modu bisualean eta azkar batean ikusteko aukera emanez.
  - *Ahula*: Mugikorretarako egokitzapenean (responsive) hutsuneak ditu, pantaila txikietan nabigatzea apur bat baldarra eginez.

- *Teatro de La Abadía (Madrid)*: [https://www.teatroabadia.com/](https://www.teatroabadia.com/)
  - *Ona*: Irudiei eta ikus-entzunezkoei ematen zaien garrantzia handia da, ikuskizunak modu erakargarrian saltzen laguntzen duena. Diseinu oso modernoa du.
  - *Ahula*: Nabigazio menua nahiko konplexua da eta informazio zehatza (esaterako, sarreren prezioak) lehen begiratuan aurkitzea kosta egiten da batzuetan.

- *Teatro La Latina (Madrid)*: [https://www.teatrolalatina.es/](https://www.teatrolalatina.es/)
  - *Ona*: Ikuspegi oso komertziala eta zuzena dauka. "Sarrerak Erosi" botoiak oso nabarmenak dira eta erosketa prozesura azkar bideratzen zaitu inolako zalantzarik gabe.
  - *Ahula*: Hasierako orria informazioz eta kartelez gainezka dago, eta elementu larregi egoteak erabiltzailea nahastu dezake.

- *Yelmo Cines*: [https://www.yelmocines.es/](https://www.yelmocines.es/)
  - *Ona*: Sarreren kudeaketa eta erosketa prozesua izugarri garbia eta intuitiboa da. Eserlekuak aukeratzeko mapa interaktiboa oso ondo garatuta dago eta erosketa-pausoak bikainak dira.
  - *Ahula*: Orri nagusian publizitate eta promozio gehiegi dago, benetako eduki nagusia (filmak) ezkutatzeraino.

### 2.1. Ondorioak

Azterketa honetatik abiatuta, Bergarako Antzokiaren webguneak honako puntu hauek hartuko ditu ardatz:

- *Elebitasuna*: Euskara eta gaztelania egongo dira eskuragarri webgune osoan, hizkuntza batetik bestera aldatzeko aukera errazarekin.
- *Sarreren erosketa integratua*: Yelmo Cinesen eta La Latinaren ereduari jarraituz, sarreren erosketa (edo erreserba) prozesua ahalik eta zuzenena eta intuitiboena izango da, eserlekuak modu garbian aukeratzeko maparekin.
- *Ekitaldien egoera argia*: Ikuskizunen jarraipen bisuala egingo da ("Sarrerak salgai", "Azken sarrerak", "Agortuta"), kolore-kode argiak erabiliz.
- *Bilatzaile zuzena*: Erabiltzaileek ekitaldiak erraz aurkitzeko aukera izango dute testu bidezko bilatzaile sinple baten bitartez, prozesua konplikatu gabe (beste webgune batzuetako menu konplexuak ekidinez).
- *Kudeaketa panel sendoa (Backoffice)*: Erabiltzaileak (ikusleak) eta ekitaldiak administratzeko gune pribatu argi bat garatuko da, administrazio-lana arintzeko eta sarrerak ondo kudeatzeko.
- *Informazioaren gardentasuna*: Ekitaldiaren fitxan datu tekniko guztiak (ordua, iraupena, prezioa) eta irudiak modu estrukturatuan eta ikusgarrian agertuko dira.

<br>

## 3. User profila

Webgunera hurbilduko den erabiltzailea anitza izango da, kultura eta antzerkia gogoko dituen adin zein egoera sozio-ekonomiko ezberdinetako pertsona multzoa. Batetik, gazteak eta adin tarte ertainekoak erraztasunez nabigatzeko eta sarrerak azkar erosteko asmoz hurbilduko dira. Bestetik, perfil helduago bat egongo da, ingurune digitalean trebetasun gutxiago duena baina programatutako antzezlanei buruzko informazioa bilatzen duena. Hori dela eta, webgunea burutzean erabilgarritasuna eta erabilera-erraztasuna kontu handiz zainduko dira.

Erabiltzaileen artean hiru profil nagusi identifikatu dira:

* **Bisitaria:** Webguneko trafikoaren zatirik handiena izango da. Antzokiko programazioa eta antzezlanei buruzko informazio xehea kontsultatu ahal izango du, bai eta sarrerak erosi ere.
* **Erabiltzailea:** Webgunean erregistratuta dagoen pertsona da. Horri esker, sarrerak erosteko prozesu azkarragoa izateaz gain, bere erosketa-historiala edota lehentasunak kudeatu ahal izango ditu.
* **Administratzailea:** Webgunearen kudeaketaren arduradun nagusia da. Bere eginkizun nagusiak sistema osoaren kudeaketa, erabiltzaileen administrazioa eta programaturiko antzezlan berrien sarrera zein eguneraketa izango dira.

<br>

## 4. Krokisa

Krokisa burutzean **Mobile first** izan da kontuan, webgunearen erabilerarik ugariena mobil bidez izango dela uste baitda. Prototipo hauetan ez dira kontuan hartu ez koloreak ezta tipografiak ere; alderdi horiek estilo-gidan eta azken prototipoan zehaztuko baitira.

Eskema eta krokis guztiak **Aurreproiektuko** karpetetan gordeta daude ikusgai izateko:

### 4.1. Mugikorra

Atal honetan mugikorreko bertsiorako diseinatutako krokis guztiak aurki daitezke:

- 📁 [Ikus mugikorreko krokisak githubeko karpetan](Aurreproiektua/1.Eranskina_%20Web%20orrialdeen%20bozetoa%2C%20nabigazio%20mapa%2C%20estilo%20gida%20eta%20prototipoa/Zirriborroa/Mobile)

### 4.2. Eskritorioa

Atal honetan ordenagailuko pantaila zabaletarako egokitutako krokis guztiak daude jasota:

- 📁 [Ikus ordenagailuko krokisak githubeko karpetan](Aurreproiektua/1.Eranskina_%20Web%20orrialdeen%20bozetoa%2C%20nabigazio%20mapa%2C%20estilo%20gida%20eta%20prototipoa/Zirriborroa/Desktop)

<br>

## 5. Nabigazio mapa

Webguneak ainbat orri izango ditu, hauek lau mailatan banatuko dira:

1. Maila: Index orria.
2. Maila: Logina edo register atalak eta hasierako orria.
3. Maila: Erabiltzaile ezberdinen atalak.
4. Maila: Erabiltzailek dituzten atalentzako bezte azpi atal batzuk.

Webgunearen antolaketa eta nabigazioaren parte bat definitu da ondorengo irudian:

![Nabigazio mapa](https://github.com/caastiii/Slayter/blob/main/Aurreproiektua/1.Eranskina_%20Web%20orrialdeen%20bozetoa%2C%20nabigazio%20mapa%2C%20estilo%20gida%20eta%20prototipoa/NabigazioMapa/NabigazioMapa.pdf)


<br>

## 6. Estilo gida

Estilo gida honetan, *Bergarako Antzokiaren* atari digitala garatzeko jarraituko diren arau eta gomendioak jasoko dira, kultur ekitaldiak zabaltzeko, sarreren salmenta kudeatzeko eta administrazio-panelak (erabiltzaileak, ekitaldiak) antolatzeko. Bertan zehaztuko diren puntuak zehatz-mehatz jarraitu beharko dira, webgune honetan koherentzia bisuala eta funtzionala bermatzeko.
### 6.1. Koloreak

Antzokiaren webgunerako, argitasuna eta funtzionaltasuna lehenetsi dira, kolore-paleta sinple baina eraginkor bat erabiliz. Diseinua garbia izango da, elementu garrantzitsuenak (botoiak, goiburuak) nabarmenduz eta atal administratiboetan irakurgarritasuna bermatuz:

| Funtzioa | Kolorea | Hex Kodea | Helburua |
| :--- | :--- | :--- | :--- |
| *Identitatea* | Urdina | #2B53B8 | Goiburuan (header), orri-oinean (footer) eta webguneko botoi nagusietan erabiliko da. Itxura profesionala eta fidagarria ematen du. |
| *Atzeko plano nagusia eta testu batzuk* | Zuria | #FFFFFF | Webgune osoaren atzeko planorako eta atzealde iluneko testuetarako. Espazio garbia eta irakurgarria bermatzen du. |
| *Testu nagusia* | Beltza | #000000 | Webguneko testu gehienetarako (paragrafoak, izenburuak). Kontraste maximoa eskaintzen du atzeko plano zuriaren gainean. |
| *Kudeaketa eta egitura* | Grisa | #D9D9D9 | Erabiltzaileen eta ekitaldien administrazio-tauletan, atzealde neutro gisa erabiltzeko. |

### 6.2. Tipografia

Izenburuentzat izaera duten letra-tipo dotoreak (Serif) erabiliko dira, kulturaren pisua transmititzeko. Testu-gorputzerako eta kudeaketa-tauletarako, berriz, sans-serif garbi bat erabiliko da, datuak eta informazio teknikoa erraz irakurri ahal izateko.

| Funtzioa | Izenburu eta izenak | Testu-gorputza | Estiloa eta sentsazioa |
| :--- | :--- | :--- | :--- |
| *Izenburu Nagusiak* | Playfair Display | Lato | Klasikoa eta dotorea, antzerki-kartelen estiloa gogorarazten duena. |
| *Informazioa eta Taulak* | Montserrat | Roboto | Egituratua eta argia, datuak, egutegiak eta administrazio-panelak erakusteko. |

*Irizpideak:*
*   *Ikuskizunen izenak:* Izenburuko tipografia Bold (lodia) pisuarekin eta tamaina handian (gutxienez 24px - 32px) erabiliko da.
*   *Datu teknikoak eta taulak:* Testu-gorputzeko iturria tamaina estandarrean (16px) erabiliko da. Tauletako goiburukoetan (izenburuak) Bold aplikatuko da nabarmentzeko.
*   *Irakurgarritasuna botoi eta goiburuetan:* Atzealde urdinean (#2B53B8), testua beti zuriz (#FFFFFF) eta SemiBold edo Bold pisuarekin joango da.

### 6.3. Ikonoak

Webgunearen itxura profesionala eta irisgarritasuna bermatzeko, *Lucide* liburutegiko ikonoak erabiliko dira orokorrean, ondorengo irizpide hauei jarraituz:

*   *Estilo-koherentzia bateratua:* Webgune osoan, ikono familia bera erabiliko da. Lerro fin eta zehatzak dituzten ikonoak lehenetsiko dira.
*   *Formatua, SVG nahitaez:* SVG formatua erabiliko da. Ez dute kalitaterik galtzen, oso gutxi pisatzen dute eta CSS bidez kolorea erraz aldatzeko aukera ematen dute.
*   *Kolore-armonia:* Ikonoak zuriak (#FFFFFF) edota beltzak (#000000) izango dira orokorrean. Goiburuan, orri-oinean edo botoi urdinen barruan doazenean, zuriak izango dira. Kudeaketa tauletan (adibidez, editatu/ezabatu ekintzak), urdina erabil daiteke ekintza nabarmentzeko.

### 6.4. Botoiak

| Botoi Mota | Kolorea | Testuaren kolorea | Erabilera |
| :--- | :--- | :--- | :--- |
| *Nagusiak* | Urdina | Zuria | Ekintza garrantzitsuenetarako (Sarrerak erosi, Ekitaldia gorde, Erabiltzailea sortu) |
| *Sarrerak gehitu edo kendu* | Grisa | Beltza | Erosi nahi dituzun sarrerak gehitu edota kentzeko |

*Estiloa, forma eta interaktibitatea:*
*   *Ertzak:* Botoien ertza arinki borobildua izango da (border-radius: 4px eta 6px artean). Forma karratuago honek seriotasuna ematen dio administrazio-panelari.
*   *Hover (sagua gainean dela):* Botoi urdinaren kolorea %10 ilunduko da eta botoiak itzal leun bat hartuko du zentzu sakona emateko.

### 6.5. Irudiak

Bergarako Antzokiaren webgunean, argazkiek zirrara eta ikuskizunaren magia helarazi behar dituzte. Irudiek kolorea ekarriko diote webguneari, diseinu orokorra oso garbia eta zuria/urdina denez, argazkiek bereganatuko baitute ikuslearen arreta.

*Erabilgarritasunari dagokionez:*
*   *WebP edo AVIF formatuan* landuko dira irudiak pisu gutxiago izan dezaten.
*   Irudiek gutxi okupatu behar dute (100 - 150 KB bitartean fitxa barruko irudientzat, eta gehienez 300 KB banner nagusientzat). Webguneak 2 segundoren azpitik kargatu behar du gailu mugikorretan.

<br>

## 7. Prototipoa

### 7.1. Mugikorra

Atal honetan mugikorreko bertsiorako diseinatutako prototipoak aurki daitezke:

- 📁 [Ikus mugikorreko prototipoa githubeko karpetan](Aurreproiektua/1.Eranskina_%20Web%20orrialdeen%20bozetoa%2C%20nabigazio%20mapa%2C%20estilo%20gida%20eta%20prototipoa/Prototipoa/Mobile)

### 7.2. Eskritorioa

Atal honetan ordenagailuko pantaila zabaletarako egokitutako prototipoak daude jasota:

- 📁 [Ikus ordenagailuko prototipoa githubeko karpetan](Aurreproiektua/1.Eranskina_%20Web%20orrialdeen%20bozetoa%2C%20nabigazio%20mapa%2C%20estilo%20gida%20eta%20prototipoa/Prototipoa/Desktop)

<br>

## 8. Edukien lizentzia

Lan hau **Creative Commons Atribuzioa-Ez Komertziala-Partekatu Berdin 4.0 Nazioarteko Lizentziapean (CC BY-NC-SA 4.0)** dago.

- **Aitortza (BY):** Egilearen izena edo taldea aipatu behar da.  
- **Ez Komertziala (NC):** Ezin da erabili helburu komertzialetarako.  
- **Partekatu Berdin (SA):** Deribatutako lanek lizentzia bera mantendu behar dute.

**© Slayter.**

[Ikusi lizentzia osoa](https://creativecommons.org/licenses/by-nc-sa/4.0/deed.eu)

Edukien lizentziari dagokionez, ondorengo lerrotan jasota geratzen da erabiliko diren lizentzia iturriak:

- **Tipografia:**
  
  Google Fonts erabiliko da letra motentzat. Hau kode irekiko lizentzia da. Dohakoa

- **Ikonoak:**

  Lucide Icons erabiliko da. Hau 2000 ikonoz goraztik osatutako kode irekiko, dohakoa eta kalitate handiko erraminta da.
  
- **Irudiak:**

   Webgune onetako irudi gehienak, administratzaileek sarturiko ekitaldien kartelak izango dira, beraz ez dira guk sortuak izango. Alaber, adibideak sortzeko edo garapenean zehar, gure batzuk erabiliko dira; AA-k sorturiko irudiak erabiliko dira, alanola, ikonorenbat, logorenbat edo kartel bat sortzeko.

  <br>

## 9. Erabilgarritasunaren azterketa

Bergarako antzokiko webgunea garatzean erabilgarritasuna ardatz nagusietako bat izango da, erabiltzaile guztiek (izan gazte zein heldu) webgunea modu erraz eta intuitiboan erabili ahal izateko.

Kontuan hartu beharreko alderdi nagusiak:

* **Nabigazio erraza eta argia:** Webgunearen egitura sinplea izatea, edozein erabiltzailek berehala aurki dezan bilatzen duen antzezlana edo informazioa.
* **Sarrerak erosteko prozesu azkarra:** Erosketa urrats gutxitan eta modu argian egitea, konplikaziorik gabe.
* **Irisgarritasuna:** Testuak irakurtzeko errazak izatea eta botoiak zein aukerak ondo ikustea, edonorentzat egokia izateko.
* **Diseinu moldagarria (Mobile First):** Webguneak mugikorrean zein ordenagailuan era egokian funtzionatzea eta azkar kargatzea.

Emango diren pausoak:

* **Egoeraren berrikuspena:** Webgunearen diseinua aztertzea nabigazioa eta testuen irakurgarritasuna egokiak direla ziurtatzeko.
* **Erabilera-probak:** Erabiltzaile ezberdinekin webgunea probatzea, antzezlanak bilatzeko eta sarrerak erosteko prozesua erraza dela egiaztatzeko.
* **Etengabeko hobekuntzak:** Izandako zailtasunak edo jasotako iritziak kontuan hartuta, webgunea doitu eta hobetzea esperientzia hobea eskaintzeko.

<br>

## 10. Bibliografia eta webgrafia

Bergarako Antzokiaren webgunearen diseinua burutzerako orduan, ondorengo iturriak kontsultatu dira:

*Erabilgarritasuna, diseinu-printzipioak, irisgarritasuna, estilo-gida, tipografia eta baliabide teknikoak:*
*   Miguel Altuna Lanbide Heziketa (2026-2027) ikasmateriala.
*   *Tipografia:* [Google Fonts](https://fonts.google.com/)
*   *Koloreak:* [HTML Color Codes](https://htmlcolorcodes.com/es/)
*   *Irudiak:* Oraingoz Gemini bidez sortuak - [Google Gemini](https://gemini.google.com/)
*   *Ikonoak:* [Lucide Icons](https://lucide.dev/)
*   *Adimen Artifiziala:* [AA Figma](https://www.figma.com/), [AA Gemini](https://gemini.google.com/)

*Benchmarka (aztertutako webguneak):*
*   [Teatro Arriaga (Bilbo)](https://www.teatroarriaga.eus/)
*   [Teatro Gayarre (Iruñea)](https://teatrogayarre.com/)
*   [Teatro de La Abadía (Madril)](https://www.teatroabadia.com/)
*   [Teatro La Latina (Madril)](https://www.teatrolalatina.es/)
*   [Yelmo Cines](https://www.yelmocines.es/)
