<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161130205042 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
            INSERT INTO `manual_pages` (`id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
            (9,	'Kontrola stavu oleje servořízení',	'                <div class="panel panel-default">
                    <div class="panel-heading">Upozornění</div>
                    <div class="panel-body">
                        <p>Systém kontrolovat při stojícím motoru.</p>
                    </div>
                </div>
                <div class="panel panel-main">
                    <div class="panel-heading">Poznámka</div>
                    <div class="panel-body">
                        <p>Olej pro dolití je možné použít prakticky jakýkoliv olej označený jako olej pro automatické převodovky.</p>
                    </div>
                </div>

                <h4>Olej ve studeném stavu</h4>
                <ol>
                    <li>Přední kola nastavit do přímého směru</li>
                    <li>Uzávěr
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [1] šipka</span> odšroubovat, např. pomocí tyčky
                    </li>
                    <li>Měrku na olej otřít čistým hadrem</li>
                    <li>Uzávěr zašroubovat, ručně utáhnout a opět odšroubovat</li>
                    <li>Platí pouze stav hladiny oleje u předtím zašroubovaného uzávěru.<br/>
                        <small>(pozn. autoři zde měli na mysli to, že nestačí pouze měrku namočit do nádobky ale po otření hadrem jí opět důkladně zašroubovat zpět)</small>
                    </li>
                    <li>Hladina oleje musí být v rozsahu značky MIN (do 5 mm nad značkou MIN)
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [2] šipka</span>
                        <ul>
                            <li>Je-li hladina oleje pod uvedeným rozsahem, musí se hydraulický systém zkontrolovat na netěsnosti (oprava). Pak nestačí olej pouze doplnit</li>
                            <li>Je-li hydraulický systém těsný, doplnit olej <strong>G002 000</strong></li>
                        </ul>
                    </li>
                    <li>Uzávěr zašroubovat a ručně utáhnout, musí být utažen do polohy, aby otvor pro odvzdušnění byl ve směru jízdy, resp. vlevo.</li>
                </ol>

                <h4>Olej v provozně teplém stavu (asi od 50°C)</h4>
                <ol>
                    <li>Přední kola nastavit do přímého směru</li>
                    <li>Uzávěr
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [1] šipka</span> odšroubovat, např. pomocí tyčky
                    </li>
                    <li>Měrku na olej otřít čistým hadrem</li>
                    <li>Uzávěr zašroubovat, ručně utáhnout a opět odšroubovat</li>
                    <li>Platí pouze stav hladiny oleje u předtím zašroubovaného uzávěru.<br/>
                        <small>(pozn. autoři zde měli na mysli to, že nestačí pouze měrku namočit do nádobky ale po otření hadrem jí opět důkladně zašroubovat zpět)</small>
                    </li>
                    <li>Hladina oleje musí být mezi značkami MIN a MAX
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [3] šipka</span>
                        <ul>
                            <li>Je-li hladina nad značkou MAX, musí se olej odsát</li>
                            <li>Je-li hladina oleje pod uvedeným rozsahem, musí se hydraulický systém zkontrolovat na netěsnosti (oprava). Pak nestačí olej pouze doplnit</li>
                            <li>Je-li hydraulický systém těsný, doplnit olej <strong>G002 000</strong></li>
                        </ul>
                    </li>
                    <li>Uzávěr zašroubovat a ručně utáhnout, musí být utažen do polohy, aby otvor pro odvzdušnění byl ve směru jízdy, resp. vlevo.</li>
                </ol>',	8,	'kontrola-stavu-oleje-servorizeni',	0);
TAG
        );

        $images = array(
            's02-0212',
            's48-0030',
            'n02-0028'
        );

        $i = 0;
        foreach ($images as $image) {
            $this->addSql("INSERT INTO `manual_images` (`manual_id`, `title`, `image_name`, `position`) VALUES (9,	'$image',	'$image.png',	" . $i++ . ");");
        }
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
