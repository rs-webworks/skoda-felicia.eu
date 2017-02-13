<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170213204401 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
        INSERT INTO `download_categories` (`id`, `title`, `position`, `slug`, `icon`) VALUES
                (1,	'Wallpapery',	4,	'wallpapery',	'picture-o'),
                (2,	'Diagnostika',	2,	'diagnostika',	'plug'),
                (3,	'Schémata',	3,	'schemata',	'map-o'),
                (4,	'PDF',	1,	'pdf',	'file-pdf-o'),
                (5,	'Vektorová grafika',	5,	'vektorova-grafika',	'car'),
                (6,	'Archív',	0,	'archiv',	'archive');
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
