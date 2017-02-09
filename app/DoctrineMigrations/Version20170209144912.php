<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170209144912 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (48, 2, 'Kontrola funkce vnitřního osvětlení', '<h4 class="no-margin">Vnitřní osvětlení vpředu</h4>

                <table class="table">
                    <thead>
                    <tr>
                        <th class="col-xs-3">Rok výroby</th>
                        <th class="col-xs-3"><i class="fa fa-fw fa-chevron-circle-left"></i> Poloha vlevo</th>
                        <th class="col-xs-3"><i class="fa fa-fw fa-minus-circle"></i> Poloha uprostřed</th>
                        <th class="col-xs-3"><i class="fa fa-fw fa-chevron-circle-right"></i> Poloha vpravo</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Do 07.95</td>
                        <td>Světlo trvale zapnuto</td>
                        <td>Světlo světlo vypnuto</td>
                        <td>Světlo spínané přes kontakt předních dveří</td>
                    </tr>
                    <tr>
                        <td>Oo 08.95</td>
                        <td>Světlo světlo vypnuto</td>
                        <td>Světlo spínané přes kontakt předních dveří</td>
                        <td>Světlo trvale zapnuto</td>
                    </tr>
                    </tbody>
                </table>

                <h4>Osvětlení zavazadlového prostoru</h4>
                <h5>Polohy spínače</h5>

                <ul>
                    <li><span class="label label-default"><i class="fa fa-picture-o"></i> [1] 1</span>
                        <i class="fa fa-fw fa-toggle-on"></i> osvětlení zapnuto
                    </li>
                    <li><span class="label label-default"><i class="fa fa-picture-o"></i> [1] 2</span>
                        <i class="fa fa-fw fa-toggle-off"></i> osvětlení vypnuto
                    </li>
                </ul>

                <p>Osvětlení zavazadlového prostoru lze zapnout při zapnutých obrysových světlech. Dbejte na to, aby světlo nezůstalo zapnuto déle než je třeba.</p>', 47, 'kontrola-funkce-vnitrniho-osvetleni', 0);
TAG
        );


        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (67, 48, 's02-0135', '589c73316cc24_s02-0135.png', 0);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
