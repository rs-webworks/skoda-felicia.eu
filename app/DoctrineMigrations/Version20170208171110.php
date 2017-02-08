<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170208171110 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (45, 2, 'Funkce dveřních klik včetně pojistek', '<h4 class="no-margin">Kontrola uzamykání</h4>
                <ul>
                    <li>Z vnějšku se nechají dveře řidiče a spolujezdce odemknout a uzamknout klíčem.</li>
                    <li>Při odemknutí se pohybuje tlačítko pojistky nahoru.</li>
                    <li>Při uzamknutí se pohybuje tlačítko pojistky dolu.</li>
                    <li>Dveře řidiče, pokud jsou otevřené, se nenechají zatlačením tlačítka pojistky uzamknout. Tím se zabraňuje tomu, aby se nezapoměl klíč v zámku zapalování.</li>
                    <li>Dveře spolujezdce a zadní dveře lze bez klíče v otevřeném stavu z vnějšku zamknout tlačíkem pojistky.</li>
                    <li>Z vnitřku se všechny dveře zamknou zatlačením tlačítek pojistek.</li>
                    <li>Pokud jsou tlačítka pojistek zatlačeny, nenechají se dveře otevřít ani zevnitř ani zvenku.</li>
                </ul>

                <h4>Kontrola zadních (pátých) dveří</h4>
                <ul>
                    <li>Do svislé polohy zářezu zámku vložit klíč a otočit jím ve směru šipky
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [1]</span>. Klíč vyjmout ze zámku, stisknout tlačítko zámku a dveře zvednout nahoru.
                    </li>
                    <li>Zadní dveře jsou v otevřeném stavu jištěny plynovými vzpěrami.</li>
                    <li>Zavření se provádí stáhnutím dveří dolu a lehkým přibouhcnutím. Vložit klíč a dveře zamknout.</li>
                    <li>Dveře jsou uzamčeny, když je výřez pro klíč ve svislé poloze.</li>
                </ul>

                <h4>Vozidla s ovládáním zadních dveří zevnitř vozu</h4>
                <ul>
                    <li>Páčku vedle řidiče zatáhnout nahoru.</li>
                    <li>Dveře se tímto odjistí, bez ohledu, zda-li je zámek uzamčen nebo odemčen.</li>
                    <li>Dveře zvednout až do horní krajní pozice.</li>
                    <li>Zadní dveře jsou v otevřeném stavu jištěny plynovými vzpěrami.</li>
                    <li>Zavření se provádí stáhnutím dveří dolu a lehkým přibouhcnutím.</li>
                    <li>Dveře jsou uzamčeny, když je výřez pro klíč ve svislé poloze.</li>
                </ul>', 44, 'funkce-dvernich-klik-vcetne-pojistek', 0);
TAG
        );


        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (64, 45, 's02-0123', '589b43088f2b3_s02-0123.png', 0);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (65, 45, 's02-0124', '589b431183cf8_s02-0124.png', 1);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
