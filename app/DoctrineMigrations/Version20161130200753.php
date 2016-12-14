<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161130200753 extends AbstractMigration
{

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
            INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
            (8,2,	'Kontrola stavu převodového oleje',	'                <div class="panel panel-default">
                    <div class="panel-heading">Upozornění</div>
                    <div class="panel-body">
                        <p>Při kontrole stavu hladiny převodového oleje musí vozidlo stát na vodorovné ploše.</p>
                    </div>
                </div>

                <h4>Převodovka do 04.97</h4>
                <p>Pro kontrolu stavu převodového oleje je třeba vymontovat a zamontovat náhon tachometru a změřit výšku hladiny "A" viz.
                    <span class="label label-default"><i class="fa fa-picture-o"></i> [1]</span> která musí být nejméně A = 4 mm.
                </p>

                <h4>Převodovka od 05.97</h4>
                <p>Hladina oleje musí minimálně zasahovat do spodního okraje pastorku <span class="label label-default"><i class="fa fa-picture-o"></i> [2]</span>
                </p>

                <ol>
                    <li>V případě nutnosti doplnit převodový olej otvorem náhonu tachometru</li>
                    <li>Náhon tachometru opět namontovat</li>
                    <li>Příložku náhonového hřídele tachometru opět namontovat a šroub utáhnout momentem 10 Nm</li>
                </ol>',	7,	'kontrola-stavu-prevodoveho-oleje',	0);
TAG
        );

        $images = array(
            's02-0021',
            's34-0220'
        );

        $i = 0;
        foreach ($images as $image) {
            $this->addSql("INSERT INTO `manual_images` (`manual_id`, `title`, `image_name`, `position`) VALUES (8,	'$image',	'$image.png',	" . $i++ . ");");
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
