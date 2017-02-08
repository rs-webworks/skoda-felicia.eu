<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170208125957 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (40, 2, 'Kontrola a seřízení ostřikovacích trysek světlometů', '<ul>
<li>Zkontrolovat seřízení trysek, případně je seřídit jehlou nebo přípravkem MP 8-524.</li>
<li>Obrázek znázorňuje seřizovací míry levého světlometu, seřízení pravého je zrcadlovým obrazem.</li>
<li>Na krycí sklo vyznačit body o průměru 10 mm podle
<span class="label label-default"><i class="fa fa-picture-o"></i> [1]</span></li>
<li>Seřídit trysky podle těchto bodů.</li>
</ul>', 39, 'kontrola-a-serizeni-ostrikovacich-trysek-svetlometu', 0);
TAG
        );


        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (56, 40, 's92-0016', '589b089015b78_s92-0016.png', 0);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
