<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170208153410 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (43, 2, 'Kontrola a funkce zámku kapoty', '<h4 class="no-margin">Zámek kapoty motoru</h4>

                <ol>
                    <li>Zatažením za páčku na levé straně pod přístrojovou deskou
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [1]</span> dojde k odemčení a povyskočení kapoty ze zámku.
                    </li>
                    <li>Před otevřením kapoty motoru dbát na to, aby nebyla odklopena ramena stěračů. Jinak by mohlo dojít k poškození laku.</li>
                    <li>Pro odjištění:
                        <ul>
                            <li>
                                <strong>Vozdy do roku výroby 97:</strong> je nutno kapotu trochu nadvzednout a páčku stlačit prsty
                                <span class="label label-default"><i class="fa fa-picture-o"></i> [2]</span>.
                            </li>
                            <li>
                                <strong>Vozy od roku výroby 98:</strong> povytáhnout páčku, která se vysune v levé části masky.
                            </li>
                        </ul>
                    </li>
                    <li>Kapotu nadzvednout, vyjmout vzpěru kapoty z uložení a její konec zasunout do otvoru, který je pro ní vyhrazen.</li>
                    <li>Kapotu uzamknout tím, že se nechá padnout asi z 30 cm výšky do zámku. V žádném případě kapotu do zámku nedomačkávat!</li>
                    <li>Nadzvednutím zkontrolovat, zda kapota zapadla správně do zámku a je uzamčena.</li>
                </ol>

                <div class="panel panel-main">
                    <div class="panel-heading">Poznámka</div>
                    <div class="panel-body">
                        <p>Výrobce nedoporučuje kapotu zamačkávat z důvodu možnosti promáčknutí plechu karoserie,
                            ohmatání laku a faktu, že pokud se kapota při puštění z cca 30 cm výšky sama nezamkne, je
                            to chyba kterou je potřeba opravit.</p>
                    </div>
                </div>', 42, 'kontrola-a-funkce-zamku-kapoty', 0);
TAG
        );


        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (61, 43, 's02-0120', '589b2bc31a507_s02-0120.png', 0);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (62, 43, 's02-0121', '589b2bcd80093_s02-0121.png', 1);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
