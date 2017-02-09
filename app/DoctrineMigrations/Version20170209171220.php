<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170209171220 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (50, 2, 'Seřízení hodin', '<h4>Digitální hodiny</h4>
                <ul>
                    <li>Nastavovací tlačítko nestlačovat!</li>
                    <li>Pro seřízení hodin slouží ovládací knoflík vpravo dole vedle otáčkoměru.</li>
                    <li>Pootočením doprava se nastaví hodiny.</li>
                    <li>Pootočením doleva se nastaví minuty.</li>
                </ul>

                <h4>Analogové hodiny</h4>
                <ul>
                    <li>Pro seřízení hodin slouží ovládací knoflík vpravo dole vedle hodin.</li>
                    <li>Čas se seřizuje otáčením ovládacího knoflíku doleva nebo doprava.</li>
                </ul>', 49, 'serizeni-hodin', 0);
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
