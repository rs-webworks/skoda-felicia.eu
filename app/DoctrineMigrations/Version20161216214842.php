<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161216214842 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (22, 2, 'Kontrola tloušťky brzdového obložení', '<h4 class="no-margin">Brzdové obložení předních kotoučových brzd</h4>
                <div class="panel panel-main">
                    <div class="panel-heading">Poznámka</div>
                    <div class="panel-body">
                        <p>Vzhledem k tomu, že příručka řeší spíše mírně ojeté vozy a nikoliv auta starší 20ti let se
                            doporučuje zkontrolovat vždy strany obě. Brzdový systém může být na jedné straně poškozený
                            a způsobovat větší opotřebení brzdového obložení.</p>
                        <p>Bod č. 2 je bezpředmětný, kolo je možné na vozidlo vrátit prakticky jakkoliv pootočené vůči
                            náboji, doporučujeme přeskočit.</p>
                    </div>
                </div>
                <ol>
                    <li>Pro lepší posouzení tloušťky brzdového obložení demontovat jedno kolo. Podle zkušenosti je
                        opotřebení brzdového obložení na pravém kole (na straně spolujezdce) o něco větší a proto je
                        účelné demontovat právě toto kolo
                    </li>
                    <li>Před demontáží označit polohu kola vůči náboji kola a při zpětné montáži nasadit kolo do stejné
                        pozice jako před demontáží
                    </li>
                    <li>Změřit tloušťku obložení vnitřní a vnější brzdové destičky</li>
                    <li>Kóta
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [1] A</span> udává tloušťku
                        brzdového obložní včetně opěrné desky
                    </li>
                    <li>Je-li naměřena hodnota
                        <strong>7 mm</strong> (včetně opěrné desky) je životnost brzdového obložení (2 mm)
                        vyčerpána a musí být proto brzdová destička vyměněna
                    </li>
                    <li>Kolové šrouby ocelových a hliníkových ráfků utáhnout pomocí momentového klíče utahovacím
                        momentem <strong>110 Nm</strong></li>
                </ol>

                <h4>Brzdové obložení zadních bubnových brzd</h4>
                <ol>
                    <li>Demontovat kolo</li>
                    <li>Zkontrolovat tloušťku brzdového obložení pohledem do otvoru držáku čelisti dle obr.
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [2]</span>. Při pohledu je
                        nutné použít svítilnu a zrcátko
                    </li>
                    <li>Kóta <span class="label label-default"><i class="fa fa-picture-o"></i> [2] A</span> udává
                        tloušťku obložení včetně čelisti
                    </li>
                    <li>U nýtovaného obložení nesmí tloušťka samotného obložení klesnout pod <strong>2.5 mm</strong>
                    </li>
                    <li>Je-li dosažena výše uvedené tloušťka samotného obložení musí být provedena výměna</li>
                    <li>Kolové šrouby ocelových a hliníkových ráfků utáhnout pomocí momentového klíče utahovacím
                        momentem <strong>110 Nm</strong></li>
                </ol>', 21, 'kontrola-tloustky-brzdoveho-oblozeni', 0);
TAG
        );


        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (37, 22, 's02-0026', '5854530f7b32a_s02-0026.png', 0);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (38, 22, 's02-0140', '5854531add991_s02-0140.png', 1);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
