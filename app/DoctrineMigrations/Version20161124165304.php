<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161124165304 extends AbstractMigration
{

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
            INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
            (5, 2,	'Brzdová soustava: Funkce a nastavení',	'                <h4 class="no-margin page-header">Ruční brzda</h4>
                <p>Seřízení má být provedeno tak, aby páka zapadla při síle 100 + 40 N do druhého zářezu.</p>
                <p>Vahadlo <span class="label label-default"><i class="fa fa-picture-o"></i> [1] šipka</span> musí být
                    vždy kolmo k páce ruční brzdy.</p>
                <h4 class="page-header">Zkouška posilovače brzd</h4>
                <ol>
                    <li>Vypnout motor a několikrát silně sešlápnout brzdový pedál, čímž dojde ke zrušení podtlaku v
                        posilovači.
                    </li>
                    <li>Sešlápnout brzdový pedál a za stálého tlaku nastartovat motor.</li>
                    <li>Je-li posilovač brzd ve funkčním stavu, dojde po nastartování motoru k citelnému poklesu
                        brzdového pedálu - funkce posilovače se uvede v činnost.
                    </li>
                </ol>',	4,	'brzdova-soustava-funkce-a-nastaveni',	0);
TAG
        );

        $images = array(
            's46-0019'
        );

        $i = 0;
        foreach ($images as $image) {
            $this->addSql("INSERT INTO `manual_images` (`manual_id`, `title`, `image_name`, `position`) VALUES (5,	'$image',	'$image.png',	" . $i++ . ");");
        }
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
