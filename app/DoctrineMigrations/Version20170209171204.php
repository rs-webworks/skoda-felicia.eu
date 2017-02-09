<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170209171204 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (49, 2, 'Kontrola funkce varovného zařízení (alarmu)', '<p>Varovné zařízení je namontované v motorovém prostoru vpravo vedle akumulátoru. Uvnitř vozu jsou
                    nalevo a napravo nahoře na předních sloupcích umístěna ultrazvuková čidla. Uprostřed, pod předním
                    sklem, je zabudovaná kontrolka pro kontrolu funkce varovného zařízení.</p>

                <h5>Na vozidle se hlídají následující oblasti</h5>
                <ul>
                    <li>Boční a zadní (páté) dveře</li>
                    <li>Kapota motoru</li>
                    <li>Napětí v palubní síti vozidla</li>
                    <li>Vnitřní prostor vozidla</li>
                </ul>

                <h5>Poplach je vyvolán</h5>
                <ul>
                    <li>Otevřením dveří</li>
                    <li>Otevřením zadních (pátých) dveří</li>
                    <li>Otevřením kapoty motoru</li>
                    <li>Pohyby uvnitř vozu</li>
                    <li>Zapnutím el. spotřebičů s vyšším odběrem proudu, např. nastartováním</li>
                    <li>Demontáži varovného zařízení</li>
                    <li>Odpojením akumulátoru</li>
                </ul>

                <p>Následují optické a akustické signály v délce 25 sekund - směrová světla blikají a siréna houká.</p>
                <p>Jestliže se po uplynutí 25 sekund s vozidlem opět manipuluje, následuje opětovné vyvolání poplachu.</p>
                <p>Při obsluze varovného zařízení se musí dbát na následující body:</p>

                <ul>
                    <li>Zapíná se spínacím klíčkem na hlavním vypínači.</li>
                    <li>Vypnutí varovného zařízení spínacím klíčkem je nutné při opravách el. instalace vozu nebo při
                        nekontrolovaném poplachu, např. když nebyly včas obnoveny baterie dálkového ovládání a varovné
                        zařízení již nelze deaktivovat.
                    </li>
                    <li>Aktivování varovného zařízení znamená, že kontrolní funkce se zapnou stistknutím dálkového ovládání.</li>
                    <li>Deaktivování varovného zařízení znamená, že kontrolní funkce se stisknutím dálkového ovládání vypnou.</li>
                </ul>

                <p>Dálkové ovládání umožňuje varovné zařízení aktivovat až na vzdálenost 10 m a vozidlo zamknout nebo
                    varovné zařízení deaktivovat a vozidlo odemknout.</p>
                <p>Odemknutí a uzavření dveří vozu klíčem varovné zařízení neaktivuje ani nedeaktivuje, to je možné jen dálkovým ovládáním.</p>

                <h5>Zapnutí a vypnutí hlavního vypínače</h5>
                <p>Hlavní vypínač varovného zařízení je v motorovém prostoru na varovném zařízení. Je zakryt ochranou čepičkou.
                    Z hlavního vypínače sejmout ochranou čepičku a varovné zařízení spínacím klíčkem zapnout.</p>

                <ul>
                    <li><span class="label label-default"><i class="fa fa-picture-o"></i> [1] 1</span> vypnuto</li>
                    <li><span class="label label-default"><i class="fa fa-picture-o"></i> [1] 2</span> zapnuto</li>
                </ul>

                <p>Zapnutí je potvrzeno čtyřnásobným krátkým rozsvícením směrových světel. Po zapnutí varovného zařízení
                    klíčkem je v aktivním stavu - kontrolní funkce zapnuty. Varovné zařízení se nyní musí deaktivovat
                    pomocí dálkového ovládání, protože jinak může být vyvolán poplach.</p>

                <p>Po deaktivování opět nasadit ochrannou čepičku hlavního vypínače.</p>

                <p>Spínací klíček by se měl uschovávat s klíči od vozu, aby v případě potřeby (např. při poruše
                    dálkového ovládání) mohlo být varovné zařízení vypnuto na hlavním vypínači.</p>

                <h5>Aktivování varovného zařízení</h5>
                <p>Po stisknutí tlačítka dálkového ovládání po dobu asi 2 vteřin se varovné zařízení aktivuje.
                    Aktivování je potvrzeno čtyčrnásobným rozsvícením směrových světel a dvěma krátkými pípnutími sirény.</p>

                <p>Jestliže při aktivování nejsou zavřené dveře, nebo kapota motoru, pak se směrová světla čtyřikrát
                    krátce rozsvící a siréna osmkrát pípne.</p>

                <p>Po aktivování je varovné zařízení ještě asi 25 sekund deaktivováné dokud se blikáním kontrolky
                    uprostřed pod předním sklem nesignalizuje funkční připravenost zařízení.</p>

                <h5>Deaktivace varovného zařízení</h5>
                <p>Po stistknutí tlačítka dálkového ovládání při aktiovaném zařízení po dobu asi 1 vteřiny se zařízení
                    deaktivuje. Deaktivace je potvrzena jedném rozsvícením směrových světel a jedním krátkým pípnutím,
                    současně zhasne kontrolka.</p>

                <p>Po deaktivaci může být centrální zamykání ovládáno pouze klíčem od vozu. Bliká-li po deaktivaci
                    kontrolka (pamět poplachu) byl během aktivace spuštěn poplach. Zapnutím zapalování se provede
                    vymazání paměti poplachu.</p>

                <h5>Vypnutí spuštěného poplachu</h5>
                <p>Byl-li poplach spuštěn, lze jej vypnout stisknutím (po dobu asi 1 sekundy) tlačítka dálkového
                    ovládání. Poplach je tím vypnutý, varovné zařízení však zůstává aktivní.</p>

                <p>Dalším stisknutím tlačítka se zabezpečovací zařízení deaktivuje, kontrolka zhasne a vozidlem lze
                    manipulovat bez spuštění alarmu.</p>

                <h5>Nouzový poplach "Panika"</h5>
                <p>Při zapnutém varovném zařízení proti krádeži se nechá při nebezpečí spustit "nouzový poplach",
                    nezávisle na tom, zda je varovné zařízení aktivováno nebo deaktivováno.</p>

                <ul>
                    <li>Tlačítko dálkového ovládání stisknout po dobu asi 5 sekund, nezávisle na tom, zda se nacházíte
                        uvnitř nebo vně vozidla. Zařízení se aktivuje, po dobu asi 15 sekund je spuštěn nouzový poplach
                        a lze tím v nouzové situaci na sebe upozornit. Vozidlo s centrálním zamykáním se zároveň uzamkne.
                        Je-li spuštěn nouzový poplach, není možné ho dálkovým ovládáním přerušit. Po uplynutí 15 sekund
                        může být pohyby uvnitř vozidla nouzový poplach spuštěn znovu.
                    </li>
                    <li>Opakovaným stisknutím tlačítka na dobu 5 vteřin bude nouzový poplach vyhlášen znovu. Vozidlo
                        zůstává uzamknuto. Tento postup se může stále opakovat.
                    </li>
                    <li>Není-li již nouzový poplach zapotřebí, varovné zařízení se deaktivuje.</li>
                </ul>

                <h5>Dálkové ovládání</h5>
                <ul>
                    <li>Frekvence dálkového ovládání a přijímací části jsou kódovány. S dálkovým ovládáním jiných vozidel
                        se nenechá zařízení ovládat.
                    </li>
                    <li>Dálkové ovládání je elektricky napájeno dvěma bateriemi. Reaguje-li zabezpečovací zařízení na
                        dálkové ovládání teprve ze vzdálenosti asi 3 metrů, je nutné baterie vyměnit.
                    </li>
                    <li>Nemůže-li být z různých důvodů zařízení deaktivováno, vypne se spínacím klíčem na hlavním vypínači.</li>
                    <li>Před odpojením akumulátoru je třeba zabezpečovací zařízení na hlavním vypínači vypnout, protože jinak se spustí poplach.</li>
                </ul>', 48, 'kontrola-funkce-varovneho-zarizeni-alarmu', 0);
TAG
        );


        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (68, 49, 's02-0126', '589c93fd229ec_s02-0126.png', 0);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
