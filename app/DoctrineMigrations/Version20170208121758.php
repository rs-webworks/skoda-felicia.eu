<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170208121758 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (38, 2, 'Kontrola funkce ostřikovačů a stěračů', '<p>Ostřikovače a stěrače pracují jenom při zapnutém zapalování.</p>

<h4>Přední sklo</h4>
<h5>Dotykové stírání</h5>
<ul>
<li>Páčku nadzdvihnout jenom k bodu stlačení před polohou
<span class="label label-default"><i class="fa fa-picture-o"></i> [1] 1</span></li>
</ul>

<h5>Intervalové stírání</h5>
<ul>
<li>Páčka v poloze
<span class="label label-default"><i class="fa fa-picture-o"></i> [1] 1</span> - stěrače pracují zhruba každé 4 sekundy.
</li>
<li>U
<strong>plynule nastavitelného intervalového spínání</strong> je přestávka mezi stíráním nastavitelná mezi 2 - 35 sekundami.
<ul>
<li>zapnout intervalové stírání a nechat jednou setřít</li>
<li>vypnout intervalové stírání a zapnout opět po požadované době délky intervalu</li>
</ul>
</li>

Doba intervalu se může měnit libovolně. Po vypnutí zapalování přejde zvolená doba intervalu opět na 4 sekundy.
</ul>

<h5>Pomalý chod stěrače</h5>
<ul>
<li>Páčka v poloze <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 2</span>
</li>
</ul>

<h5>Rychlý chod stěrače</h5>
<ul>
<li>Páčka v poloze <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 3</span>
</li>
</ul>

<h5>Ostřikování předního skla</h5>
<ul>
<li>Páčku přitáhnout k volantu.
</li>
</ul>

<h5>Omývací a stírací automatika</h5>
<ul>
<li>Páčku přitáhnout směrem k volantu - pracují stěrače i ostřikovače.</li>
<li>Páčku pustit - istřikování se zastaví a stěrače provedou ještě 1 - 3 setření (podlé délky ostřiku).</li>
</ul>

<h5>Ostřikování světlometů</h5>
<ul>
<li>Při zapnutých parkovacích, tlumených nebo dálkových světlech budou při každém ostřiku čelního skla ostříknuta také skla světlometů.</li>
</ul>

<h4>Zadní sklo</h4>
<ul>
<li>Páčku stlačit směrem od volantu k první odpružené poloze a držet - stěrač zadního skla pracuje tak dlouho, dokud je páčka držená v této poloze.</li>
<li>Páčku odtlačit směrem od volantu až na doraz a přidržet - pracuje stěrač a ostřikovač, dokud se páčka přidržuje.</li>
<li>U stírací/ostřikovací automatiky po mžikovém stlačení páčky do vzdálenější polohy a uvolnění zpět se zapne intervalové stírání v intervalu asi 5 sekund. Opětovným stlačením páčky do vzdálenější polohy se intervalové stírání vypne.</li>
</ul>', 37, 'kontrola-funkce-ostrikovacu-a-steracu', 0);
TAG
        );


        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (53, 38, 's02-0116', '589b00e5da077_s02-0116.png', 0);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
