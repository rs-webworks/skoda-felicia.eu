<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170208140415 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (42, 2, 'Kontrola typového (výrobního) štítku', '<p>Na typovém štítku
<span class="label label-default"><i class="fa fa-picture-o"></i> [1] C</span> jsou vyraženy údaje, např.
<strong><i class="fa fa-fw fa-asterisk"></i> TMB EFF 016 S5 000004
<i class="fa fa-fw fa-asterisk"></i></strong>, které musí souhlasit s údaji vyraženými na krytu tlumiče
<span class="label label-default"><i class="fa fa-picture-o"></i> [1] A</span>.</p>', 41, 'kontrola-typoveho-vyrobniho-stitku', 0);
TAG
        );


        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (60, 42, 's02-0133', '589b174221eaf_s02-0133.png', 0);");


    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
