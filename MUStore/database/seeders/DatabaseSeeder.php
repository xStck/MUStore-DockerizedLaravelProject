<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    //komenda do załadowania produktów do bazy danych: php artisan db:seed --class=DatabaseSeeder
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([

            'category' => 'guitar',
            'name' =>  'Yamaha GL-1',
            'price' =>  400,
            'imgUrl' =>  'images/gitary/yamaha.jpg',
            'description' =>  'Gitara w stylu ukulele, posiada menzurę długości 433 mm oraz nylonowe struny. Poza zmniejszonym korpusem, gitara posiada rozmiary autentycznej gitary klasycznej. Dzięki dołączonemu w komplecie miękkiemu pokrowcowi możesz zabrać ją ze sobą gdzie tylko zechcesz.'
        ]);

        DB::table('products')->insert([
            'category' => 'guitar',
            'name' =>  'Ars Nova AN 700',
            'price' =>  499,
            'imgUrl' =>  'images/gitary/arsNova.jpg',
            'description' =>  'Premiera gitar Ars Nova w Lighting Center! Model AN-700 to najwyższy model gitary marki Ars Nova. AN-700 to elektroakustyk z litą świerkową płyta wierzchnią, wysokiej jakości osprzętem i efektrownym wyglądem. Ciekawa propozycja w tym przedziale cenowym.'
        ]);

        DB::table('products')->insert([
            'category' => 'guitar',
            'name' =>  'Carter Guitars AP-5 NL',
            'price' =>  359,
            'imgUrl' =>  'images/gitary/carterAP-5.jpg',
            'description' =>  'Model AP-5 to gitara akustyczna w kształcie typu Parlor. Charakterystyczne, zmniejszone i wysmuklone pudło zbudowano z najwyższej jakości mahoniu. Za jego sprawą gitara świetnie rezonuje i sprawdzi się zarówno w warunkach domowych, jak i na scenie. Solidny gryf z azjatyckiego drewna nato w matowym wykończeniu zapewnia duży komfort gry i usprawnia poruszanie się dłoni po tym elemencie. Całość została uzupełniona solidnymi kluczami i mostkiem, aby zapewnić stałość stroju i pełną gotowość użytkowania w każdych warunkach. Model dostępny w naturalnym wykończeniu, podkreślającym walory użytego drewna.'
        ]);

        DB::table('products')->insert([
            'category' => 'guitar',
            'name' =>  'Framus FJ-14 SMV VNT',
            'price' =>  1499,
            'imgUrl' =>  'images/gitary/FramusVNT.jpg',
            'description' =>  'Szalenie interesująca gitara elektro-akustyczna typu Jumbo. Instrument ten to unikalne połączenie świerkowo-mahoniowego korpusu o podpalanych bokach, wygodnego gryfu typu C oraz zawodowego pickupu Fishmana. Gitara świetnie brzmienie, doskonale leży w dłoni oraz wykonana jest z najwyższą lutniczą precyzją Framusa, co gwarantuje jakość, trwałośc i niezawodność.'
        ]);

        DB::table('products')->insert([
            'category' => 'guitar',
            'name' =>  'Yamaha GL-1',
            'price' =>  400.00,
            'imgUrl' =>  'images/gitary/yamaha.jpg',
            'description' =>  'Gitara w stylu ukulele, posiada menzurę długości 433 mm oraz nylonowe struny. Poza zmniejszonym korpusem, gitara posiada rozmiary autentycznej gitary klasycznej. Dzięki dołączonemu w komplecie miękkiemu pokrowcowi możesz zabrać ją ze sobą gdzie tylko zechcesz.'
        ]);

        DB::table('products')->insert([
            'category' => 'guitar',
            'name' =>  'Ars Nova AN 700',
            'price' =>  499,
            'imgUrl' =>  'images/gitary/arsNova.jpg',
            'description' =>  'Premiera gitar Ars Nova w Lighting Center! Model AN-700 to najwyższy model gitary marki Ars Nova. AN-700 to elektroakustyk z litą świerkową płyta wierzchnią, wysokiej jakości osprzętem i efektrownym wyglądem. Ciekawa propozycja w tym przedziale cenowym.'
        ]);

        DB::table('products')->insert([
            'category' => 'guitar',
            'name' =>  'Carter Guitars AP-5 NL',
            'price' =>  359,
            'imgUrl' =>  'images/gitary/carterAP-5.jpg',
            'description' =>  'Model AP-5 to gitara akustyczna w kształcie typu Parlor. Charakterystyczne, zmniejszone i wysmuklone pudło zbudowano z najwyższej jakości mahoniu. Za jego sprawą gitara świetnie rezonuje i sprawdzi się zarówno w warunkach domowych, jak i na scenie. Solidny gryf z azjatyckiego drewna nato w matowym wykończeniu zapewnia duży komfort gry i usprawnia poruszanie się dłoni po tym elemencie. Całość została uzupełniona solidnymi kluczami i mostkiem, aby zapewnić stałość stroju i pełną gotowość użytkowania w każdych warunkach. Model dostępny w naturalnym wykończeniu, podkreślającym walory użytego drewna.'
        ]);

        DB::table('products')->insert([
            'category' => 'guitar',
            'name' =>  'Framus FJ-14 SMV VNT',
            'price' =>  1499,
            'imgUrl' =>  'images/gitary/FramusVNT.jpg',
            'description' =>  'Szalenie interesująca gitara elektro-akustyczna typu Jumbo. Instrument ten to unikalne połączenie świerkowo-mahoniowego korpusu o podpalanych bokach, wygodnego gryfu typu C oraz zawodowego pickupu Fishmana. Gitara świetnie brzmienie, doskonale leży w dłoni oraz wykonana jest z najwyższą lutniczą precyzją Framusa, co gwarantuje jakość, trwałośc i niezawodność.'
        ]);

        DB::table('products')->insert([
            'category' => 'bass',
            'name' =>  'Carter Guitars 150A NL',
            'price' =>  599,
            'imgUrl' =>  'images/basy/carterNL.jpg',
            'description' =>  'Model 150A to gitara basowa przypominająca znany kształt instrumentów, jednak udoskonalona przez specjalistów marki Carter. To jednocześnie prosta, ale i skuteczna oraz mocno oryginalna konstrukcja, która dobrze brzmi niemal w każdym zespole i stylu. Zespół lutniczy Carter zadbał o to, by instrument dostarczał jak najwięcej przyjemności z gry nie pomijając przy tym komfortu i brzmienia.'
        ]);
        DB::table('products')->insert([
            'category' => 'bass',
            'name' =>  'Carter Guitars JB VS',
            'price' =>  549,
            'imgUrl' =>  'images/basy/carterVS.jpg',
            'description' =>  'Model JB VS to próba wiernego odtworzenia basowej klasyki. Kształt wzorowano na jednym z najpopularniejszych wówczas i do dziś rodzajów basów. Charakterystyczny korpus wyposażony w dwa pick upy typu single-coil to bodaj najczęściej kupowana gitara basowa. Zawsze dobrze brzmiąca w miksie, idealnie przebijająca się w bandzie. Doskonale brzmiący ton jest bardzo prosty do ustawienia a jednocześnie instrument jest bardzo uniwersalny i sprawdza się w każdym stylu muzycznym i w każdej technice.'
        ]);
        DB::table('products')->insert([
            'category' => 'bass',
            'name' =>  'Cort Action Bass Plus BM',
            'price' =>  699,
            'imgUrl' =>  'images/basy/cortBM.jpg',
            'description' =>  'Gitary basowe Cort z serii Action Bass charakteryzuje niedroga price oraz zastosowanie wysokiej jakości materiałów, komponentów i dobre wykonanie. To zestaw cech nie często spotykany w tym przedziale cenowym. Dlatego też basy z serii Action to idealny wybór dla początkującego basisty- oprócz wygody dostarczają też uniwersalne brzmienie oraz aktywną elektronikę, która pozwala na pierwsze zabawy z tonem.'
        ]);
        DB::table('products')->insert([
            'category' => 'bass',
            'name' =>  'Marcus Miller V7 Alder-4 BK 2nd Gen',
            'price' =>  1899,
            'imgUrl' =>  'images/basy/marcusV7.jpg',
            'description' => 'Uznana przez basistów marka Sire wprowadza na rynek nową generację instrumentów z serii V7, sygnowanych nazwiskiem Marcusa Millera. Druga generacja zyskała nowe przetworniki Revolution, ręcznie rzeźbiony pojemnik na baterię, powiększone progi, podstrunnicę o zaokrąglonych krawędziach oraz satynowe wykończenie gryfu. Gitary niezmiennie wykonane są z najlepszej selekcji olchy oraz oferują komfort gry, za który pokochali je muzycy na całym świecie.'
        ]);
        DB::table('products')->insert([
            'category' => 'bass',
            'name' =>  'Carter Guitars 150A NL',
            'price' =>  599,
            'imgUrl' =>  'images/basy/carterNL.jpg',
            'description' =>  'Model 150A to gitara basowa przypominająca znany kształt instrumentów, jednak udoskonalona przez specjalistów marki Carter. To jednocześnie prosta, ale i skuteczna oraz mocno oryginalna konstrukcja, która dobrze brzmi niemal w każdym zespole i stylu. Zespół lutniczy Carter zadbał o to, by instrument dostarczał jak najwięcej przyjemności z gry nie pomijając przy tym komfortu i brzmienia.'
        ]);
        DB::table('products')->insert([
            'category' => 'bass',
            'name' =>  'Carter Guitars JB VS',
            'price' =>  549,
            'imgUrl' =>  'images/basy/carterVS.jpg',
            'description' =>  'Model JB VS to próba wiernego odtworzenia basowej klasyki. Kształt wzorowano na jednym z najpopularniejszych wówczas i do dziś rodzajów basów. Charakterystyczny korpus wyposażony w dwa pick upy typu single-coil to bodaj najczęściej kupowana gitara basowa. Zawsze dobrze brzmiąca w miksie, idealnie przebijająca się w bandzie. Doskonale brzmiący ton jest bardzo prosty do ustawienia a jednocześnie instrument jest bardzo uniwersalny i sprawdza się w każdym stylu muzycznym i w każdej technice.'
        ]);
        DB::table('products')->insert([
            'category' => 'bass',
            'name' =>  'Cort Action Bass Plus BM',
            'price' =>  699,
            'imgUrl' =>  'images/basy/cortBM.jpg',
            'description' =>  'Gitary basowe Cort z serii Action Bass charakteryzuje niedroga price oraz zastosowanie wysokiej jakości materiałów, komponentów i dobre wykonanie. To zestaw cech nie często spotykany w tym przedziale cenowym. Dlatego też basy z serii Action to idealny wybór dla początkującego basisty- oprócz wygody dostarczają też uniwersalne brzmienie oraz aktywną elektronikę, która pozwala na pierwsze zabawy z tonem.'
        ]);
        DB::table('products')->insert([
            'category' => 'bass',
            'name' =>  'Marcus Miller V7 Alder-4 BK 2nd Gen',
            'price' =>  1899,
            'imgUrl' =>  'images/basy/marcusV7.jpg',
            'description' => 'Uznana przez basistów marka Sire wprowadza na rynek nową generację instrumentów z serii V7, sygnowanych nazwiskiem Marcusa Millera. Druga generacja zyskała nowe przetworniki Revolution, ręcznie rzeźbiony pojemnik na baterię, powiększone progi, podstrunnicę o zaokrąglonych krawędziach oraz satynowe wykończenie gryfu. Gitary niezmiennie wykonane są z najlepszej selekcji olchy oraz oferują komfort gry, za który pokochali je muzycy na całym świecie.'
        ]);
        DB::table('products')->insert([
            'category' => 'keyboard',
            'name' =>  'Akai MPK 225',
            'price' =>  848,
            'imgUrl' =>  'images/keys/mpk255.jpg',
            'description' => 'MPK 225 to nowa wersja mobilnego kontrolera midi z funkcjami i kontrolerami wziętymi prosto ze słynnych samplerów MPC.'
        ]);
        DB::table('products')->insert([
            'category' => 'keyboard',
            'name' =>  'Akai LPK 25',
            'price' =>  184,
            'imgUrl' =>  'images/keys/lpk25.jpg',
            'description' => 'Mini klawiatura 2 oktawy do laptopa, arpeggiator, przycisk sustain, 4 programowalne banki, Plug and Play [Mac/ PC], zasilanie przez USB.'
        ]);
        DB::table('products')->insert([
            'category' => 'keyboard',
            'name' =>  'Akai LPK 25 Wireless',
            'price' =>  184,
            'imgUrl' =>  'images/keys/lpk25wireless.jpg',
            'description' => 'Mini klawiatura 2 oktawy do laptopa, bezprzewodowe MIDI poprzez Bluetooth [iOS, Mac, PC], arpeggiator, tap tempo, octave up/down, 4 programowalne banki, Plug and Play [Mac/ PC], zasilanie baterie [3 x AA] oraz USB.'
        ]);
        DB::table('products')->insert([
            'category' => 'keyboard',
            'name' =>  'Akai MPK 249',
            'price' =>  1489,
            'imgUrl' =>  'images/keys/MPK249.jpg',
            'description' => 'Klawiatura 4 oktawy, 16 podświetlanych padów z maszyn MPC, 8 enkoderów, 8 sliderów, 8 przycisków, transport, kompatybilna z iOS, dołączone oprogramowanie Ableton Live Lite, AIR Hybrid 3, SONiVOX Twist, MPC Essentials.'
        ]);
        DB::table('products')->insert([
            'category' => 'keyboard',
            'name' =>  'Akai MPK 225',
            'price' =>  848,
            'imgUrl' =>  'images/keys/mpk255.jpg',
            'description' => 'MPK 225 to nowa wersja mobilnego kontrolera midi z funkcjami i kontrolerami wziętymi prosto ze słynnych samplerów MPC.'
        ]);
        DB::table('products')->insert([
            'category' => 'keyboard',
            'name' =>  'Akai LPK 25',
            'price' =>  184,
            'imgUrl' =>  'images/keys/lpk25.jpg',
            'description' => 'Mini klawiatura 2 oktawy do laptopa, arpeggiator, przycisk sustain, 4 programowalne banki, Plug and Play [Mac/ PC], zasilanie przez USB.'
        ]);
        DB::table('products')->insert([
            'category' => 'keyboard',
            'name' =>  'Akai LPK 25 Wireless',
            'price' =>  184,
            'imgUrl' =>  'images/keys/lpk25wireless.jpg',
            'description' => 'Mini klawiatura 2 oktawy do laptopa, bezprzewodowe MIDI poprzez Bluetooth [iOS, Mac, PC], arpeggiator, tap tempo, octave up/down, 4 programowalne banki, Plug and Play [Mac/ PC], zasilanie baterie [3 x AA] oraz USB.'
        ]);
        DB::table('products')->insert([
            'category' => 'keyboard',
            'name' =>  'Akai MPK 249',
            'price' =>  1489,
            'imgUrl' =>  'images/keys/MPK249.jpg',
            'description' => 'Klawiatura 4 oktawy, 16 podświetlanych padów z maszyn MPC, 8 enkoderów, 8 sliderów, 8 przycisków, transport, kompatybilna z iOS, dołączone oprogramowanie Ableton Live Lite, AIR Hybrid 3, SONiVOX Twist, MPC Essentials.'
        ]);
        DB::table('products')->insert([
            'category' => 'software',
            'name' =>  'Image Line FL Studio 20 Fruity Edition (Box)',
            'price' =>  339,
            'imgUrl' =>  'images/software/flstudio.jpg',
            'description' => 'Bardzo zaawansowana edycja FL Studio. Idealna do kompleksowego tworzenia utworów, rejestracji, miksu i masteringu.'
        ]);
        DB::table('products')->insert([
            'category' => 'software',
            'name' =>  'Omnisphere 2',
            'price' =>  1589,
            'imgUrl' =>  'images/software/omnisphere.jpg',
            'description' => 'Spectrasonics Omnisphere 2 to syntezator programowy zawierający ponad 12 000 brzmień, import własnych próbek, ponad 400 przebiegów DSP Waveforms, syntezę granularną oraz wavetable.'
        ]);
        DB::table('products')->insert([
            'category' => 'software',
            'name' =>  'Native Instruments KOMPLETE 13 ULT COLL UPG KU8-13',
            'price' =>  2564,
            'imgUrl' =>  'images/software/NI.jpg',
            'description' => 'Native Instruments KOMPLETE 13 ULTIMATE COLLECTOR EDITION to kolekcjonerska, największa wersja z serii KOMPLETE. To ponad 120 instrumentów i efektów premium. W wersji Collector’s znajdują się m.in. CREMONA QUARTET, GUITAR RIG 6 PRO, ARKHIS, MYSTERIA, PHARLIGHT, STRAYLIGHT, NOIRE i wiele więcej, a także aż 73 rozszerzeń NI Expansions.'
        ]);
        DB::table('products')->insert([
            'category' => 'software',
            'name' =>  'Waves API Collection [Native]',
            'price' =>  799,
            'imgUrl' =>  'images/software/waves.jpg',
            'description' => 'Stworzona we współpracy z Automated Process Incorporated kolekcja API zawiera cztery precyzyjne narzędzia oparte na renomowanych modułach =>  3-zakresowy EQ 550A, 4-zakresowy EQ 550B, graficzny EQ 560 i kompresor stereo 2500.'
        ]);
        DB::table('products')->insert([
            'category' => 'software',
            'name' =>  'Image Line FL Studio 20 Fruity Edition (Box)',
            'price' =>  339,
            'imgUrl' =>  'images/software/flstudio.jpg',
            'description' => 'Bardzo zaawansowana edycja FL Studio. Idealna do kompleksowego tworzenia utworów, rejestracji, miksu i masteringu.'
        ]);
        DB::table('products')->insert([
            'category' => 'software',
            'name' =>  'Omnisphere 2',
            'price' =>  1589,
            'imgUrl' =>  'images/software/omnisphere.jpg',
            'description' => 'Spectrasonics Omnisphere 2 to syntezator programowy zawierający ponad 12 000 brzmień, import własnych próbek, ponad 400 przebiegów DSP Waveforms, syntezę granularną oraz wavetable.'
        ]);
        DB::table('products')->insert([
            'category' => 'software',
            'name' =>  'Native Instruments KOMPLETE 13 ULT COLL UPG KU8-13',
            'price' =>  2564,
            'imgUrl' =>  'images/software/NI.jpg',
            'description' => 'Native Instruments KOMPLETE 13 ULTIMATE COLLECTOR EDITION to kolekcjonerska, największa wersja z serii KOMPLETE. To ponad 120 instrumentów i efektów premium. W wersji Collector’s znajdują się m.in. CREMONA QUARTET, GUITAR RIG 6 PRO, ARKHIS, MYSTERIA, PHARLIGHT, STRAYLIGHT, NOIRE i wiele więcej, a także aż 73 rozszerzeń NI Expansions.'
        ]);
        DB::table('products')->insert([
            'category' => 'software',
            'name' =>  'Waves API Collection [Native]',
            'price' =>  799,
            'imgUrl' =>  'images/software/waves.jpg',
            'description' => 'Stworzona we współpracy z Automated Process Incorporated kolekcja API zawiera cztery precyzyjne narzędzia oparte na renomowanych modułach =>  3-zakresowy EQ 550A, 4-zakresowy EQ 550B, graficzny EQ 560 i kompresor stereo 2500.'
        ]);
        DB::table('products')->insert([
            'category' => 'vinyl',
            'name' =>  'Mac Miller - Circles',
            'price' =>  139,
            'imgUrl' =>  'images/winyle/mac_miller.jpg',
            'description' => 'Najnowszy, pośmiertny album Maca Millera. Nie ma mowy o albumie na którym mamy niedokończone piosenki, jakieś totalne odrzuty mające na celu wyciągnięcie ostatniego grosika z kiszonki fana. Miller pracował nad Circles jednocześnie nagrywając Swimming. Ten album bliższy jest muzyce rnb, jest bardziej śpiewany, niż rapowany. Czy jest powalający? Nie. Czy jest smutny? Tak. Bez wątpienia pewne teksty mogą chwycić za gardło, jeśli popatrzymy na to z perspektywy tego co się wydarzyło w trakcie nagrywania tych numerów. Circles to idealne zakończenie kariery Artysty, który miał jeszcze wiele do powiedzenia, który znakomicie się rozwijał. Szkoda,wielka szkoda, ale mimo wszystko jego muzyka pozostaje ciągle z nami.'
        ]);
        DB::table('products')->insert([
            'category' => 'vinyl',
            'name' =>  'Rag n Bone Man - Life By Misadventure',
            'price' =>  139.99,
            'imgUrl' =>  'images/winyle/ragnboneman.jpg',
            'description' => 'Rag’n’Bone Man powraca po trzech latach od niesamowitego debiutu płytowego - „Human”, który zyskał niezliczone złote, platynowe i diamentowe wyróżnienia na całym świecie. Kolejny album jest pełen serca, duszy i nowych pomysłów. „Life By Misadventure” to spektakularna kolekcja emocjonalnych piosenek, które będą nam towarzyszyć wtedy, kiedy będą nam najbardziej potrzebne.'
        ]);
        DB::table('products')->insert([
            'category' => 'vinyl',
            'name' =>  'Janek Traczyk - Nadal jestem',
            'price' =>  89.99,
            'imgUrl' =>  'images/winyle/janekTraczyk.jpg',
            'description' => 'Winylowa edycja debiutanckiej płyty Janka Traczyka. „Nadal jestem” to zbiór historii zgromadzonych na przestrzeni lat.'
        ]);
        DB::table('products')->insert([
            'category' => 'vinyl',
            'name' =>  'Pezet - Muzyka Klasyczna',
            'price' =>  84.99,
            'imgUrl' =>  'images/winyle/pezet.jpg',
            'description' => 'Kolekcja 33 Obroty to limitowana seria wznowień albumów hip-hopowych wyprodukowanych przez NOONa w Studiu 33 Obroty. Re-edycja klasycznego i poszukiwanego obecnie albumu hiphopowego z 2002 roku.'
        ]);
        DB::table('products')->insert([
            'category' => 'vinyl',
            'name' =>  'Mac Miller - Circles',
            'price' =>  139.99,
            'imgUrl' =>  'images/winyle/mac_miller.jpg',
            'description' => 'Najnowszy, pośmiertny album Maca Millera. Nie ma mowy o albumie na którym mamy niedokończone piosenki, jakieś totalne odrzuty mające na celu wyciągnięcie ostatniego grosika z kiszonki fana. Miller pracował nad Circles jednocześnie nagrywając Swimming. Ten album bliższy jest muzyce rnb, jest bardziej śpiewany, niż rapowany. Czy jest powalający? Nie. Czy jest smutny? Tak. Bez wątpienia pewne teksty mogą chwycić za gardło, jeśli popatrzymy na to z perspektywy tego co się wydarzyło w trakcie nagrywania tych numerów. Circles to idealne zakończenie kariery Artysty, który miał jeszcze wiele do powiedzenia, który znakomicie się rozwijał. Szkoda,wielka szkoda, ale mimo wszystko jego muzyka pozostaje ciągle z nami.'
        ]);
        DB::table('products')->insert([
            'category' => 'vinyl',
            'name' =>  'Rag n Bone Man - Life By Misadventure',
            'price' =>  139.99,
            'imgUrl' =>  'images/winyle/ragnboneman.jpg',
            'description' => 'Rag’n’Bone Man powraca po trzech latach od niesamowitego debiutu płytowego - „Human”, który zyskał niezliczone złote, platynowe i diamentowe wyróżnienia na całym świecie. Kolejny album jest pełen serca, duszy i nowych pomysłów. „Life By Misadventure” to spektakularna kolekcja emocjonalnych piosenek, które będą nam towarzyszyć wtedy, kiedy będą nam najbardziej potrzebne.'
        ]);
        DB::table('products')->insert([
            'category' => 'vinyl',
            'name' =>  'Janek Traczyk - Nadal jestem',
            'price' =>  89.99,
            'imgUrl' =>  'images/winyle/janekTraczyk.jpg',
            'description' => 'Winylowa edycja debiutanckiej płyty Janka Traczyka. „Nadal jestem” to zbiór historii zgromadzonych na przestrzeni lat.'
        ]);
        DB::table('products')->insert([
            'category' => 'vinyl',
            'name' =>  'Pezet - Muzyka Klasyczna',
            'price' =>  84.99,
            'imgUrl' =>  'images/winyle/pezet.jpg',
            'description' => 'Kolekcja 33 Obroty to limitowana seria wznowień albumów hip-hopowych wyprodukowanych przez NOONa w Studiu 33 Obroty. Re-edycja klasycznego i poszukiwanego obecnie albumu hiphopowego z 2002 roku.'
        ]);
        DB::table('products')->insert([
            'category' => 'recommended',
            'name' =>  'Pezet - Muzyka Klasyczna',
            'price' =>  84.99,
            'imgUrl' =>  'images/winyle/pezet.jpg',
            'description' => 'Kolekcja 33 Obroty to limitowana seria wznowień albumów hip-hopowych wyprodukowanych przez NOONa w Studiu 33 Obroty. Re-edycja klasycznego i poszukiwanego obecnie albumu hiphopowego z 2002 roku.'
        ]);
        DB::table('products')->insert([
            'category' => 'recommended',
            'name' =>  'Native Instruments KOMPLETE 13 ULT COLL UPG KU8-13',
            'price' =>  2564,
            'imgUrl' =>  'images/software/NI.jpg',
            'description' => 'Native Instruments KOMPLETE 13 ULTIMATE COLLECTOR EDITION to kolekcjonerska, największa wersja z serii KOMPLETE. To ponad 120 instrumentów i efektów premium. W wersji Collector’s znajdują się m.in. CREMONA QUARTET, GUITAR RIG 6 PRO, ARKHIS, MYSTERIA, PHARLIGHT, STRAYLIGHT, NOIRE i wiele więcej, a także aż 73 rozszerzeń NI Expansions.'
        ]);
        DB::table('products')->insert([
            'category' => 'recommended',
            'name' =>  'Rag n Bone Man - Life By Misadventure',
            'price' =>  139.99,
            'imgUrl' =>  'images/winyle/ragnboneman.jpg',
            'description' => 'Rag’n’Bone Man powraca po trzech latach od niesamowitego debiutu płytowego - „Human”, który zyskał niezliczone złote, platynowe i diamentowe wyróżnienia na całym świecie. Kolejny album jest pełen serca, duszy i nowych pomysłów. „Life By Misadventure” to spektakularna kolekcja emocjonalnych piosenek, które będą nam towarzyszyć wtedy, kiedy będą nam najbardziej potrzebne.'
        ]);
        DB::table('products')->insert([
            'category' => 'recommended',
            'name' =>  'Omnisphere 2',
            'price' =>  1589,
            'imgUrl' =>  'images/software/omnisphere.jpg',
            'description' => 'Spectrasonics Omnisphere 2 to syntezator programowy zawierający ponad 12 000 brzmień, import własnych próbek, ponad 400 przebiegów DSP Waveforms, syntezę granularną oraz wavetable.'
        ]);
        DB::table('products')->insert([
            'category' => 'recommended',
            'name' =>  'Cort Action Bass Plus BM',
            'price' =>  699,
            'imgUrl' =>  'images/basy/cortBM.jpg',
            'description' =>  'Gitary basowe Cort z serii Action Bass charakteryzuje niedroga price oraz zastosowanie wysokiej jakości materiałów, komponentów i dobre wykonanie. To zestaw cech nie często spotykany w tym przedziale cenowym. Dlatego też basy z serii Action to idealny wybór dla początkującego basisty- oprócz wygody dostarczają też uniwersalne brzmienie oraz aktywną elektronikę, która pozwala na pierwsze zabawy z tonem.'
        ]);
        DB::table('products')->insert([
            'category' => 'recommended',
            'name' =>  'Framus FJ-14 SMV VNT',
            'price' =>  1499,
            'imgUrl' =>  'images/gitary/FramusVNT.jpg',
            'description' =>  'Szalenie interesująca gitara elektro-akustyczna typu Jumbo. Instrument ten to unikalne połączenie świerkowo-mahoniowego korpusu o podpalanych bokach, wygodnego gryfu typu C oraz zawodowego pickupu Fishmana. Gitara świetnie brzmienie, doskonale leży w dłoni oraz wykonana jest z najwyższą lutniczą precyzją Framusa, co gwarantuje jakość, trwałośc i niezawodność.'
        ]);
    }
}
