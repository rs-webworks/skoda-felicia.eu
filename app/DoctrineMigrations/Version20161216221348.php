<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161216221348 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (24, 2, 'Kontrola hladiny brzdové kapaliny', '<ul>
                    <li>Posuzovat stav (množství) brzdové kapaliny vždy v závislosti na stupni opotřebení brzdových
                        obložení. V důsledku opotřebení brzdového obložení a následnému automatickému vymezení vůlí
                        dochází k malému poklesu hladiny ve vyrovnávací nádržce
                    </li>
                    <li>V případě, že se hladina přibližuje ke značce MIN a brzdová obložení jsou téměř opotřebená není
                        třeba brzdovou kapalinu doplňovat
                    </li>
                    <li><a href="{{ url("frontend_manual_show", {"slug": "vymena-brzdove-kapaliny"}) }}"></a>Doplnění
                        brzdové kapaliny
                    </li>
                    <li>V případě, že brzdová obložení jsou málo opotřebená, musí být hladina brzdové kapaliny mezi
                        značkami MIN a MAX
                    </li>
                    <li>Pokud klesne hladina pod značku MIN, musí být před doplněním provedena kontrola celého brzdového
                        systému
                    </li>
                </ul>', 23, 'kontrola-hladiny-brzdove-kapaliny', 0);
TAG
        );


    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
