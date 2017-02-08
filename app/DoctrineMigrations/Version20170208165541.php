<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170208165541 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (44, 2, 'Seřízení motorové kapoty a všech dveří', '<h4>Seřízení kapoty</h4>
                <ul>
                    <li>Poloha čepu musí být vůči zámku v kapotě vystřeďěná.</li>
                    <li>Po nastavení zámku pojišťovací matici čepu zámku pevně utáhnout.</li>
                </ul>

                <h4>Seřízení bočních a zadních (pátých) dveří</h4>
                <p>Seřídit zámek tak, aby:</p>
                <ul>
                    <li>Byla zajištěna těsnost.</li>
                    <li>Hrany dveří lícovaly s hranami karoserie.</li>
                    <li>Bylo zajištěno snadné uzavírání.</li>
                </ul>
                <p>Nerovnoměrnosti v podelném směru lze vyrovnat podložkami pod zámek.</p>', 43, 'serizeni-motorove-kapoty-a-vsech-dveri', 0);
TAG
        );


        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (63, 44, 's02-0037', '589b3f6deabee_s02-0037.png', 0);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
