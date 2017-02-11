<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170210163052 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
        INSERT INTO `manual_categories` (`id`, `title`, `position`, `slug`) VALUES
            (3,	'Elektrická zařízení',	7, 'elektricka-zarizeni'),
            (4,	'Elektrická schémata',	8, 'elektricka-schemata'),
            (5,	'Karoserie',	3, 'karoserie'),
            (6,	'Podvozek',	5, 'podvozek'),
            (7,	'Převodovka',	13, 'prevodovka'),
            (8,	'Hledání závad',	2, 'hledani-zavad'),
            (9,	'Klempířské práce',	4, 'klempirske-prace'),
            (10,	'Palivový systém Mono-motronic (BMM)',	11, 'palivovy-system-mono-motronic-bmm'),
            (11,	'Montážní místa',	6, 'montazni-mista'),
            (12,	'Motor 1.3',	10, 'motor-1-3'),
            (14,	'Palivový systém Simos 2P (MPI)',	12, 'palivovy-system-simos-2p-mpi'),
            (15,	'Topení a klimatizace',	9, 'topeni-a-klimatizace');
TAG
        );

        $this->addSql('UPDATE manual_categories SET `slug` = \'prehledy\' WHERE `id` = 1;');
        $this->addSql('UPDATE manual_categories SET `slug` = \'servisni-prohlidky\' WHERE `id` = 2;');

        $this->addSql('CREATE UNIQUE INDEX UNIQ_321EBCA7989D9B62 ON manual_categories (slug)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
