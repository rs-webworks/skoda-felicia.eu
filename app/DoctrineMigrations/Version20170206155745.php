<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170206155745 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (27, 2, 'Namazání rozdělovače', '<ol>
  <li>Sejmout víčko a raménko rozdělovače.</li>
  <li>Vyšroubovat šroub
    <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 1</span> a do otvoru nakapat 3 kapky motorového oleje.
  </li>
  <li>Šroub opět zašroubovat.</li>
</ol>', 26, 'namazani-rozdelovace-1', 0);
TAG
        );

        $this->addSql("INSERT INTO `manuals_engines` (`manual_id`, `engine_id`) VALUES (27, 2);");

        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (41, 27, 's02-0137', '58988edae24b3_s02-0137.png', 0);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
