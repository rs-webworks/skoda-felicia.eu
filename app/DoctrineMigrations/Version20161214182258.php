<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161214182258 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (20, 2, 'Výměna chladící kapaliny', '<div class="panel panel-main">
                    <div class="panel-heading">Poznámka</div>
                    <div class="panel-body">
                        <p>Zde uvedené konkrétní chladící kapaliny se již nemusí vyrábět. Při nákupu chladící kapaliny
                            se stačí řídit typem (G11/G12), obecně se doporučuje použít tu, která již v autě byla před
                            výměnou. Tabulka níže uvedených kapalin je zde uvedena pro historické dohledávání použitých
                            kapalin přímo výrobcem.</p>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Upozornění</div>
                    <div class="panel-body">
                        <ul>
                            <li>Vypuštěnou chladící kapalinu zachytit do příslušné nádoby pro další likvidaci</li>
                            <li>Vypuštěnou kapalinu skladovat a likvidovat podle příslušných platných předpisů</li>
                            <li>Smí se doplňovat nebo nově naplňovat do motorů jen taková chladící kapalina, která
                                odpovídá normě TL-VW 774B/774C/774D kretá je uvedená na obalu
                            </li>
                            <li><strong>Chladící kapaliny G100 (G10) s G12 není možné vzájemně mísit</strong></li>
                            <li>Vypuštěná chladící kapalina by se normálně neměla znovu používat, musí se likvidovat
                                při dodržení předpisů na ochranu životního prostředí
                            </li>
                        </ul>
                    </div>
                </div>

                <p>Všechny chladicí kapaliny, které výrobní podnik neschálí k použití se nesmí použít. Mohou totiž velmi
                    negativně ovlivnit antikorozní ochranu chladicího systému a způsobit značné škody na motoru
                    případně jeho havárii.</p>
                <p>Vznikající škody korozí mohou vézt ke ztrátě chladicí kapaliny s následným závažným poškozením motoru</p>

                <p>Chladicí kapaliny, které odpovídají normě VW-TL-VW 774B/774C/774D a mohou být použity do vozů Škoda:</p>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th rowspan="2">Výrobce</th>
                        <th colspan="3" class="text-center">Plněno do vozů vyráběných</th>
                    </tr>
                    <tr>
                        <th class="text-center">
                            do 07.96
                            <br/>
                            TL-VW-774B (G10)<br/>
                            <span class="label label-primary">modrá</span><span class="label label-main">zelená</span>
                        </th>
                        <th class="text-center">
                            od 08.96 do 12.97
                            <br/>
                            TL-VW-774C (G11)<br/>
                            <span class="label label-primary">modrá</span><span class="label label-main">zelená</span>
                        </th>
                        <th class="text-center">
                            od 01.98
                            <br/>
                            TL-VW-774B (G12)<br/>
                            <span class="label label-danger">červená</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Velvana Velvary</td>
                        <td>Fridex D 824 HS</td>
                        <td>Viz. Katalog orig. příslušenství</td>
                        <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                    </tr>

                    <tr>
                        <td>BASF AG</td>
                        <td>Glysantin G 05-25</td>
                        <td>Glysantin s Protect Plus</td>
                        <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                    </tr>

                    <tr>
                        <td>Dt. Shell Chemie GmbH</td>
                        <td>Glycoshell AF 511 S</td>
                        <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                        <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                    </tr>

                    <tr>
                        <td>DOW Chemical GmbH</td>
                        <td>Antifreeze D 824 HS</td>
                        <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                        <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                    </tr>

                    <tr>
                        <td>Höechts AG</td>
                        <td>BP Napgel C2220 (X139B)</td>
                        <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                        <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                    </tr>

                    <tr>
                        <td>Agrimex Třebíč</td>
                        <td>Fridiol Extra</td>
                        <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                        <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                    </tr>

                    <tr>
                        <td>Elf</td>
                        <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                        <td class="text-center"><i class="fa fa-times text-muted"></i></td>
                        <td>Elf XT 40-30</td>
                    </tr>
                    </tbody>
                </table>

                <p>Uvedené chladicí kapaliny lze navzájem mísit pouze v rozsahu norem VW-TL-VW 774B a 774C (tzn. G10 + G11).</p>
                <p>Chladicí kapaliny G10, G11 a G12 zraučují dokonalou ochranu proti mrazu, korozi a navíc zvyšují
                    bod varu.</p>
                <p>Z těchto důvodů je třeba tyto kapaliny používat celoročně zejména v tropických krajích, kde zvýšený
                    bod varu zvyšuje bezpečnost a spolehlivost vozu zejména při vysokém zatížení.</p>

                <h4>Vypuštění chladicí kapaliny</h4>
                <ol>
                    <li>Opatrně otevřít vyrovnávací nádržku chladicí kapaliny (po vyrovnání tlaku)</li>
                    <li>Motory
                        <span class="label label-main">CARB</span><span class="label label-main">BMM</span><span class="label label-main">MPI</span>:
                        <ol>
                            <li>Vyšroubovat výpustný šroub na ocelové trubce
                                <span class="label label-default"><i class="fa fa-picture-o"></i> [1] šipka</span>, která se nachází pod oběhovým čerpadlem chladicí kapaliny
                            </li>
                            <li>Vyšroubovat výpustný šroub na bloku motoru, šroub se nachází nad tlakovým spínačem motorového oleje
                                <span class="label label-default"><i class="fa fa-picture-o"></i> [2] šipka</span></li>
                        </ol>
                        Motory <span class="label label-main">1.6</span>:
                        <ul>
                            <li>Po odpojení spodní hadice u chladiče vypustit chladicí kapalinu</li>
                        </ul>
                        Motory <span class="label label-main">1.9 D</span>
                        <ul>
                            <li>Vyšroubovat výpustný šroub na ocelové trubce, která se nachází pod oběhovým čerpadlem chladící kapaliny
                                <span class="label label-default"><i class="fa fa-picture-o"></i> [3] šipka</span></li>
                        </ul>
                    </li>
                    <li>Vypuštěnou chladicí kapalinu zachytit do příslušné nádoby pro další likvidaci. Dodržet všechny platné předpisy pro likvidaci chladicích kapalin.</li>
                </ol>

                <h4>Naplnění chladicí soustavy</h4>
                <ol>
                    <li>Výpustné šrouby opět našroubovat a utáhnout:
                        <ul>
                            <li>Výpustný šroub v trubce: <strong>20 Nm</strong></li>
                            <li>Výpustný šroub v bloku motoru: <strong>25 Nm</strong></li>
                        </ul>
                        Výpustné šrouby musí být opatřeny těsnícimi kroužky a navíc utěsněny těsnící hmotou např. Loctite 511
                    </li>
                    <li>Chladicí kapalinu odpovídající koncentrace plnit přes vyrovnávací nádržku až do značky MAX.
                        <a href="{{ url("frontend_manual_show", {"slug": "kontrola-mrazuvzdornosti-chladici-kapaliny-a-pripadne-doplneni"}) }}">Více informací o množství koncentrátu</a>
                    </li>
                    <li>Uzavřít vyrovnávací nádržku</li>
                    <li>Nechat motor běžet až do dosažení pracovní teploty</li>
                    <li>Podle potřeby doplnit kapalinu na předepsaný stav</li>
                </ol>

                <h4>Kontrola stavu (množství) chladicí kapaliny</h4>
                <p>Vyrovnávací nádržka se nachází v motorovém prostoru na levé stráně. Stav chladící kapaliny
                    kontrolovat pouze při stojícím motoru. Předepsaný stav chladící kapaliny při servisní prohlídce:</p>
                <ul>
                    <li>
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [4]</span> Studený motor: Mezi značkami MAX a MIN
                    </li>
                    <li>
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [4]</span> Teplý motor: Cca 5mm nad značku MAX
                    </li>
                </ul>', 19, 'vymena-chladici-kapaliny', 0);
TAG
        );


        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (30, 20, 's02-0038', '58517fb9a2ee7_s02-0038.png', 0);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (31, 20, 's02-0039', '58517fc6de68f_s02-0039.png', 1);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (32, 20, 's19-033', '58517fd5cf8eb_s19-033.png', 2);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (33, 20, 's02-0131', '58517fe3a4999_s02-0131.png', 3);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
