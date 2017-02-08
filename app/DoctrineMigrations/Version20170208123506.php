<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170208123506 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (39, 2, 'Kontrola a seřízení ostřikovacích trysek stěračů', '<h4 class="no-margin">Nastavení ostřikovacích trysek předního skla</h4>
<ul>
<li>Trysky musí být seřízeny dle <span class="label label-default"><i class="fa fa-picture-o"></i> [1]</span>. V případě odchylky seřídit pomocí jehly.
</li>
<li>Trysky seřídit tak, aby omývaly horní třetinu skla.</li>
</ul>

<h4>Seřízení ostřikovací trysky zadního skla</h4>
<ul>
<li>Seřízení ostřikovací trysky zadního skla dle
<span class="label label-default"><i class="fa fa-picture-o"></i> [2]</span>. Paprsky vody musí svírat úhel zhruba 30° a zasahovat do poloviny stíraného pole.
</li>
<li>V případě, že se tryska nenechá seřídit nebo paprsek vody není rovnoměrný je třeba trysku vyměnit.</li>
</ul>', 38, 'kontrola-a-serizeni-ostrikovacich-trysek-steracu', 0);
TAG
        );


        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (54, 39, 's92-0013', '589b02442933a_s92-0013.png', 0);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (55, 39, 's02-0117', '589b0251ab820_s02-0117.png', 1);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
