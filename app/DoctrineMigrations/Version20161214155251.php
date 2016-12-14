<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161214155251 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (18, 2, 'Kontrola a nastavení volnoběžných otáček', '<div class="panel panel-default">
                    <div class="panel-heading">Potřebné speciální nástroje a pomůcky</div>
                    <div class="panel-body">
                        <ul>
                            <li>Tester zapalování, např. VAG 1767 nebo VAG 1367</li>
                            <li>Podložka snímače HÚ MP1-303</li>
                        </ul>
                    </div>
                </div>

                <h4>Zkušební a nastovovací podmínky</h4>
                <ul>
                    <li>Teplota oleje min 60°C</li>
                    <li>Elektrické spotřebiče vypnuty</li>
                </ul>

                <h4>Pracovní průběh</h4>
                <ol>
                    <li>Tester zapalování např. VAG 1367, resp. VAG 1767 připojte podle návodu pro obsluhu</li>
                    <li>Před připojením snímače otáček nutno použít podložku snímače HÚ MP1-303</li>
                    <li>Spustit motor a nechat běžet na volnoběh</li>
                    <li>Nastavit volnoběžné otáčky otočením šroubu nastavování volnoběhu
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 1</span>
                        <ul>
                            <li>Kontrolní hodnota: 850 - 1000 rpm</li>
                            <li>Seřizovací hodnota: 920 - 960 rpm</li>
                        </ul>
                    </li>
                    <li>Šroubem
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 2</span> nesmí být v žádném případě otočeno
                    </li>
                </ol>', 17, 'kontrola-a-nastaveni-volnobeznych-otacek', 0);
TAG
        );

        $this->addSql("INSERT INTO `manuals_engines` (`manual_id`, `engine_id`) VALUES (18, 5);");

        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (28, 18, 'n23-0045', '58515cadd8b4d_n23-0045.png', 0);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
