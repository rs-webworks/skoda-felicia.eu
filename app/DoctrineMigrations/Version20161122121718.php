<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161122121718 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
        INSERT INTO `engines` (`id`, `name`, `description`, `slug`) VALUES
            (1,	'CARB',	'1.3 karburátor(export)',	'carb'),
            (2,	'BMM',	'1.3 jednobod. vstřik. Bosch Mono - Motronic',	'bmm'),
            (3,	'MPI',	'1.3 vícebod. vstřik. Siemens Simos 2P',	'mpi'),
            (4,	'1.6',	'1.6 vícebod. vstřik. 1 AV MPI',	'1-6'),
            (5,	'1.9 D',	'1.9 diesel',	'1-9-d');
TAG
        );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
    }
}
