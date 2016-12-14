<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161213145808 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (14,2, 'Výměna čističe paliva - palivového filtru', '<div class="panel panel-default">
                    <div class="panel-heading">Upozornění</div>
                    <div class="panel-body">
                        <ul>
                            <li>Při práci na palivové soustavě je potřeba dodržovat příslušné předpisy bezpečnosti práce</li>
                            <li>Při montáži a demontáži čističe paliva je nutno počítat s vytékajícím palivem. Z tohoto důvodu je nutno použít ochranné rukavice z materiálu odolného vůči bezinu</li>
                            <li>Přípojky hadic jsou zajištěny sponami. Pokud dojde k demontáži těchto spon, je třeba vždy vyměnit za nové</li>
                            <li>Při dalším nakládání s použitými čističi paliva je třeba bezpodmínečně dodržovat příslušné předpisy o zacházení s ropnými produkty a jejich likvidaci</li>
                        </ul>
                    </div>
                </div>

                <h4>Demontáž čističe paliva</h4>
                <p>Čistič paliva se nachází v motorovém prostoru v blízkosti posilovač brzd
                    <span class="label label-default"><i class="fa fa-picture-o"></i> [1]</span></p>

                <ol>
                    <li>Povolit páskové spony na čističi paliva a stáhnout hadice</li>
                </ol>

                <h4>Montáž čističe paliva</h4>
                <ol>
                    <li>Montáž se provede opačným postupem než demontáž</li>
                    <li>Při montáži je třeba respektovat směr průtoku paliva čističem. Směr je vyznačen na tělese čističe šipkou
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [1] šipky</span></li>
                    <li>Provést kontrolu palivového systému na těsnost</li>
                </ol>', 13, 'vymena-cistice-paliva-palivoveho-filtru-1', 0);
TAG
        );

        $this->addSql("INSERT INTO `manuals_engines` (`manual_id`, `engine_id`) VALUES (14, 1);");

        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (25, 14, 's02-0040', '584ffe5eb0113_s02-0040.png', 0);");
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
