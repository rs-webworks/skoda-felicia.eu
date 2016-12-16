<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161215151233 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (21, 2, 'Kontrola a nastavení ventilové vůle', '<ol>
                    <li>Seřizování ventilové vůle provádět na studeném motoru při teplotě cca 20°C</li>
                    <li>Demontovat kryt hlavy válců</li>
                    <li>Zatáhnout ruční brzdu a zařadit 5-rychlostní stupeň</li>
                    <li>Vozidlo nadzvednout vpředu vpravo tak aby pravé přední kolo bylo zcela volně vyvěšeno a levé
                        přední kolo bylo pevně na podloze. V této poloze je motor mechanicky spojen s pravým kolem a je
                        možno polohu - střídaní pohybu vahadel ventilů - přesně nastavit
                    </li>
                    <li>Otáčením pravým kolem nastavovat polohu střídání pohybu vahadel ventilů</li>
                    <li>Ventilovou vůli mezi dříkem ventilu a vahadlem zkontrolovat spárovou (listovou) měrkou <span class="label label-default"><i class="fa fa-picture-o"></i> [3]</span>, případně
                        ji nastavit na předepsanou vůli otáčením seřizovacího šroubu pomocí šroubováku a očkového
                        nástrčkového klíče
                    </li>
                    <li>Po kontrole a seřízení ventilové vůle vyměnit v případě potřeby těsnění krytu hlavy válců</li>
                    <li>Nasadit kryt hlavy válců a utáhnout upevňovací matky momentem 3 Nm</li>
                </ol>
                <div class="panel panel-main">
                    <div class="panel-heading">Poznámka</div>
                    <div class="panel-body">
                        <p>Auto není třeba nutně zvedat, s trochou šikovnosti se dá seřízení provádět stejným postupem s
                            autem na zemi bez ruční brzdy a jeho mírnym posunováním taktéž dochází k otáčení motoru.</p>
                    </div>
                </div>

                <p>
                    <span class="label label-default"><i class="fa fa-picture-o"></i> [1]</span> rozmistění vahadel umístěných na hlavě válců,
                    <span class="label label-default"><i class="fa fa-picture-o"></i> [2]</span> různé provedení rozvodových tyček:
                </p>
                <ul>
                    <li>1 - vahadla sacích ventilů, hlinikové rozvodové tyčky</li>
                    <li>2 - vahadla výfukových ventilů, ocelové rozvodové tyčky</li>
                </ul>
                <p>Hliníkové tyčky se poznajají podle nalisovaných ocelových koncovek. Ocelové tyčky jsou zhotoveny z jednoho kusu.</p>

                <h4>Pořadí válců při seřizování ventilové vůle</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Pořadí při seřizování</th>
                        <th>Střídání vahadel</th>
                    </tr>
                    <tr class="tr-heading">
                        <td>Válec</td>
                        <td>Válec</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>3</td>
                    </tr>
                    </tbody>
                </table>

                <h4>Hodnoty nastavení ventilové vůle</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Sací ventil</th>
                        <th>Výfukový ventil</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Ocelové rozvodové tyčky</td>
                        <td class="text-muted">0.20 mm <sup>1</sup></td>
                        <td>0.20 mm</td>
                    </tr>
                    <tr>
                        <td>Hliníkové rozvodové tyčky</td>
                        <td>0.25 mm</td>
                        <td><i class="fa fa-times text-muted"></i></td>
                    </tr>
                    <tr>
                        <td>Při trvalé teplotě okolí méně než -25°C</td>
                        <td>0.25 mm</td>
                        <td>0.25 mm</td>
                    </tr>
                    </tbody>
                </table>
                <small>
                    <sup>1</sup> motory Felicia nemají na sacích ventilech ocelové rozvodové tyčky, nicméně starší
                    motory Škoda stejné koncepce je dříve používaly, proto je hodnota pro jejich nastavení v příručce
                    uvedena.
                </small>', 20, 'kontrola-a-nastaveni-ventilove-vule', 0);
TAG
        );

        $this->addSql("INSERT INTO `manuals_engines` (`manual_id`, `engine_id`) VALUES (21, 1);");
        $this->addSql("INSERT INTO `manuals_engines` (`manual_id`, `engine_id`) VALUES (21, 2);");
        $this->addSql("INSERT INTO `manuals_engines` (`manual_id`, `engine_id`) VALUES (21, 3);");

        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (34, 21, 's02-0019', '585297a5592ec_s02-0019.png', 0);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (35, 21, 's02-0072', '585297b03f7ff_s02-0072.png', 1);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (36, 21, 's02-0018', '585297bae12b8_s02-0018.png', 2);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
