<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161214151141 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (16, 2, 'Odvodnění čističe paliva - palivového filtru', '<div class="panel panel-default">
                    <div class="panel-heading">Upozornění</div>
                    <div class="panel-body">
                        <ul>
                            <li>Pozor aby se motorová nafta nedostala na hadice chladící kapaliny. Příp. hadice ihned očistit</li>
                            <li>Při dalším nakládání s použitými čističi paliva je třeba bezpodmínečně dodržovat příslušné předpisy o zacházení s ropnými produkty a jejich likvidaci</li>
                        </ul>
                    </div>
                </div>
                <ol>
                    <li>Stáhnout příchytnou svorku <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 3</span> a odejmout regulační ventil
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 2</span> s připojeným palivovým potrubím
                    </li>
                    <li>Povolit odvodňovací šroub <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 7</span> a nechat vytéci cca 0,1l kapaliny
                    </li>
                    <li>Namontovat regulační ventil <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 2</span> a umístit příchytnou svorku
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 3</span></li>
                    <li>Utáhnout odvodňovací šroub <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 7</span>
                    </li>
                    <li>Provést kontrolu palivového systému na těsnost (pohledová kontrola)</li>
                </ol>', 15, 'odvodneni-cistice-paliva-palivoveho-filtru', 0);
TAG
        );

        $this->addSql("INSERT INTO `manuals_engines` (`manual_id`, `engine_id`) VALUES (16, 5);");

        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (27, 16, 's23-0024', '5851530f2d91a_s23-0024.png', 0);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
