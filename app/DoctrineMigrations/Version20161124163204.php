<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161124163204 extends AbstractMigration
{

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                (4, 2,	'Spojkový pedál: Kontrola polohy, nastavení',	'                <div class="panel panel-default">
                    <div class="panel-heading">Výchozí podmínky</div>
                    <div class="panel-body">
                        <ul>
                            <li>Spojkový pedál bez vůle</li>
                            <li>Spojkový pedál v klidové poloze</li>
                        </ul>
                    </div>
                </div>

                <h4 class="page-header">Seřizovací hodnota</h4>
                <p>Spojkový pedál 0 &plusmn; 3 mm vůči brzdovému pedálu <span class="label label-default"><i
                                class="fa fa-picture-o"></i> [1]</span></p>

                <h4 class="page-header">Seřízení polohy</h4>
                <ol>
                    <li>Před seřízením vytáhnout pojistku <span class="label label-default"><i
                                    class="fa fa-picture-o"></i> [2] 2</span></li>
                    <li>Polohu spojkového pedálu seřídit otáčením seřizovací matice <span class="label label-default"><i
                                    class="fa fa-picture-o"></i> [2] 1</span></li>
                    <li>Po seřízení nasadit pojistku <span class="label label-default"><i class="fa fa-picture-o"></i> [2] 2</span>
                        zpět
                    </li>
                </ol>',	3,	'spojkovy-pedal-kontrola-polohy-nastaveni',	0);
TAG
        );

        $images = array(
            's30-0001',
            's30-0010'
        );

        $i = 0;
        foreach ($images as $image) {
            $this->addSql("INSERT INTO `manual_images` (`manual_id`, `title`, `image_name`, `position`) VALUES (4,	'$image',	'$image.png',	" . $i++ . ");");
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
