<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161203105125 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
            INSERT INTO `manual_pages` (`id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
            (10,	'Ozubený řemen pro pohon vačkového hřídele: kontrola stavu a napnutí',	'<p>Zkontrolujte stav ozubeného řemenu na:</p>
            
            <ul>
              <li>Natržení, resp. trhliny <span class="label label-default"> [1] A</span></li>
              <li>Boční náběhy <span class="label label-default"> [1] B</span></li>
              <li>Roztřepení, resp. zálomy <span class="label label-default"> [1] C</span></li>
              <li>Trhliny v základu zubu <span class="label label-default"> [1] D</span></li>
              <li>Oddělení jednotlivých vrstev (těleso ozubeného řemenu, tažné prvky)</li>
              <li>Stopy oleje a tuku</li>
            </ul>
            
            <p>Jsou-li zjištěny nedostatky, musí se ozubený řemen bezpodmníněčně vyměnit. Tím lze předejít případným výpadkům, resp. funkčním poruchám.</p>',	9,	'ozubeny-remen-pro-pohon-vackoveho-hridele-kontrola-stavu-a-napnuti',	0);
TAG
        );

        $this->addSql("INSERT INTO `manuals_engines` (`manual_id`, `engine_id`) VALUES (10,	5);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
(21,	10,	'n02-0015',	'584296c48d2dd_n02-0015.png',	0);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
