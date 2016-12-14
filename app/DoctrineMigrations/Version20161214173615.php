<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161214173615 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (19, 2, 'Kontrola mrazuvzdornosti chladicí kapaliny a případné doplnění', '<div class="panel panel-main">
                    <div class="panel-heading">Poznámka</div>
                    <div class="panel-body">
                        <p>Následující postupy na měření mrazuvzdornosti jsou v lidových podmínkách dnešní doby poměrně
                            nepřiměřené a težko realizovatelné. Pro běžné smrtelníky stačí, když bude chladící
                            kapalina s destilovanou vodou namíchána v poměru uvedeném na láhvi nemrznoucího koncentrátu
                            - nebo jednodušeji, rovnou nalita koupená hotová směs pro přímé použití. Obsah této stránky
                            byl zdigitaliozován spíše z historických důvodů.</p>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Upozornění</div>
                    <div class="panel-body">
                        <ul>
                            <li>Vypuštěnou chladící kapalinu zachytit do příslušné nádoby</li>
                            <li>Vypuštěnou kapalinu skladovat a likvidovat podle příslušných platných předpisů</li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Potřebné speciální nářadí a pomůcky</div>
                    <div class="panel-body">
                        <ul>
                            <li>Momentový klíč, např. EMK 200 nebo VAG 1331 (5 až 50 Nm)</li>
                            <li>Těsnící prostředek, např. Loctite 511</li>
                            <li>Zkouška mrazuvzdornosti DUO-CHECK 7182</li>
                        </ul>
                    </div>
                </div>

                <h4>Kontrola mrazuvzdornosti chladící kapaliny</h4>
                <ul>
                    <li>Ke kontrole mrazuvzdornosti chladící kapaliny lze např. použít přístroj DUO-CHECK 7182</li>
                    <li>Nasát pipetou trochu chladící kapaliny a nakapat ji na měřící prisma. Přístroj podržet proti
                        světlu a na stupnici pro etylenglycol odečíst stav mrazuvzdornosti zkoušené kapaliny
                    </li>
                    <li>Mrazuvzdornost kapaliny musí být zajištěna do -25°C</li>
                    <li>V zemích s arktickými klimatickými poměry do -35°C</li>
                    <li><strong>Upozornění:</strong> V případě, že je nutno z klimatických důvodů zvýšit mrazuvzdornost
                        chladící kapaliny, je tak možno učinit až do 60% koncentrace (tzn. odolnost proti mrazu do cca
                        -40°C). Další zvýšení koncentrace by zhoršilo chladící a antikorozivní vlastnosti chladící
                        kapaliny.
                    </li>
                </ul>

                <h4>Naplnění mrazuvzdorným prostředkem</h4>
                <ul>
                    <li>V případě, že je motor naplněn schválenou chladicí kapalinou a přesto nemá dostatečnou
                        koncentraci a tím i mrazuvzdornost, je třeba část chladící kapaliny z chladícího systému
                        vypustit.
                    </li>
                    <li>Následně doplnit chladící soustavu koncentrovanou chladící kapalinou</li>
                    <li>Chladící systém má obsah cca 6 litrů</li>
                    <li>Provést zkušební jízdu a mrazuvzdornost chladící kapaliny znou zkontrolovat</li>
                </ul>

                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <table class="table table-bordered table-condensed">
                            <thead>
                            <tr>
                                <td width="33%">Mrazuvzdornost do</td>
                                <td width="33%">Koncentrát</td>
                                <td width="33%">Destilovaná voda</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>-25 °C</td>
                                <td>ca. 40%</td>
                                <td>ca. 60%</td>
                            </tr>
                            <tr>
                                <td>-35 °C</td>
                                <td>ca. 50%</td>
                                <td>ca. 50%</td>
                            </tr>
                            <tr>
                                <td>-40 °C</td>
                                <td>ca. 60%</td>
                                <td>ca. 40%</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <h4>Kontrola stavu (množství) chladicí kapaliny</h4>
                <p>Vyrovnávací nádržka se nachází v motorovém prostoru na levé stráně. Stav chladící kapaliny
                    kontrolovat pouze při stojícím motoru. Předepsaný stav chladící kapaliny při servisní prohlídce:</p>
                <ul>
                    <li>
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [1]</span> Studený motor: Mezi značkami MAX a MIN
                    </li>
                    <li>
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [1]</span> Teplý motor: Cca 5mm nad značku MAX
                    </li>
                </ul>', 18, 'kontrola-mrazuvzdornosti-chladici-kapaliny-a-pripadne-doplneni', 0);
TAG
        );


        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (29, 19, 's02-0131', '585174f496633_s02-0131.png', 0);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
