<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161216220702 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (23, 2, 'Pohledová kontrola brzdové soustavy na netěsnost a poškození', '<ul>
                      <li>Zkontrolovat hlavní brzdový válec, posilovač brzd, rozdělovací ventily (nebo zát. reuglátor brzd
                        a brzdové třmeny na netěsnost a poškození
                      </li>
                      <li>Zkontrolovat zda nejsou brzdové hadice zkroucené</li>
                      <li>Zkontrolovat zda při krajních výchylkách řízení se nedotýkají brzdoví hadice některých částí
                        vozidla
                      </li>
                      <li>Zkontrolovat brzdové hadice na porezitu a trhliny</li>
                      <li>Zkontrolovat zda nejsou brzdové hadice a trubky v některých místech prodřeny</li>
                      <li>Zkontrolovat přípojky, šroubení a příchytk na správnou polohu a upevnění, těsnost a korozi</li>
                    </ul>', 22, 'pohledova-kontrola-brzdove-soustavy-na-netesnost-a-poskozeni', 0);
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
