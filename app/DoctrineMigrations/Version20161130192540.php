<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161130192540 extends AbstractMigration
{

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {

        $this->addSql(<<<TAG
            INSERT INTO `manual_pages` (`id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
            (7,	'Výměna oleje v převodovce',	'                <p>Výměnu oleje provádět pouze když má motor provozní teplotu, jedině tak je zajištěna dostatečná
                    tekutost oleje a možnost jeho dokonalého vpuštění.</p>
                <p>Vždy vyměnit těsnící kroužek vypouštěcího šroubu.</p>

                <h4>Vypuštění převodového oleje</h4>
                <ol>
                    <li>Vypouštěcí šroub <span class="label label-default"><i class="fa fa-picture-o"></i> [1]</span>
                        ve spodní části převodovky vyšroubovat a olej vypustit
                    </li>
                    <li>Vypouštěcí šroub opět zašroubovat a utáhnout momentem 35 Nm</li>
                    <li>Vymontovat hřídel náhonu tachometru</li>
                    <li>K tomu je třeba odšroubovat upevňovací šroub příložky a vyjmout hřídel náhonu tachometru
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [2]</span></li>
                    <li>Vzniklým otvorem naplnit převodovku olejem v množství <strong>2,4 litru</strong></li>
                </ol>

                <h4>Specifikace převodového oleje</h4>
                <span>API-GL 4</span>
                <ul>
                    <li>SAE 75 W</li>
                    <li>SAE 75 W-80</li>
                    <li>SAE 75 W-85</li>
                    <li>SAE 75 W-90</li>
                </ul>',	6,	'vymena-oleje-v-prevodovce',	0);
TAG
        );

        $images = array(
            's02-0014',
            's02-0022'
        );

        $i = 0;
        foreach ($images as $image) {
            $this->addSql("INSERT INTO `manual_images` (`manual_id`, `title`, `image_name`, `position`) VALUES (7,	'$image',	'$image.png',	" . $i++ . ");");
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
