<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170208135545 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (41, 2, 'Kontrola typového provedení motoru', '<h4 class="no-margin">Motory 1.3</h4>
                <p>Identifikační kód motoru se nachází na bloku motoru za rozdělovačem (nad vodním čerpadlem)
                    <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 2</span>.</p>
                <p>Sestává se ze dvou číselných skupiny, které jsou odděleny tečkou. Levá skupina je neměnná a udavá číslo modelu, např. 781.</p>
                <p>Pravá číselná skupina udává provedení motoru, např. 135B znamená 40 kW motor Mono-Motronic.</p>
                <p>Pozice
                    <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 1</span> udává výrobní číslo motoru.
                </p>

                <h5>Příklad:</h5>
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <h2>
                            <i class="fa fa-fw fa-asterisk"></i>
                            1234567
                            <i class="fa fa-fw fa-asterisk"></i>
                            <br/>
                            <i class="fa fa-fw fa-circle-o"></i>781 . 135B
                        </h2>
                    </div>
                </div>

                <h4>Motory 1.6</h4>
                <p>Identifikační kód a výrobní číslo motoru se nachází na bloku motoru na straně převodovky
                    <span class="label label-default"><i class="fa fa-picture-o"></i> [2]</span></p>

                <h5>Příklad:</h5>
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <h2>
                            <i class="fa fa-fw fa-asterisk"></i>
                            AEE123456
                            <i class="fa fa-fw fa-asterisk"></i>
                        </h2>
                    </div>
                </div>

                <h4>Motory 1.9d</h4>
                <p>Identifikační kód a výrobní číslo motoru se nachází na boku mezi vstřikovacím čerpadlem a podtlakovým čerpadlem
                    <span class="label label-default"><i class="fa fa-picture-o"></i> [3]</span></p>

                <h5>Příklad:</h5>
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <h2>
                            <i class="fa fa-fw fa-asterisk"></i>
                            AEF123456
                            <i class="fa fa-fw fa-asterisk"></i>
                        </h2>
                    </div>
                </div>', 40, 'kontrola-typoveho-provedeni-motoru', 0);
TAG
        );


        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (57, 41, 's02-0013', '589b152d7b68d_s02-0013.png', 0);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (58, 41, 's00-0048', '589b15365be09_s00-0048.png', 1);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (59, 41, 's10-0023', '589b15402b7d9_s10-0023.png', 2);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
