<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161216224955 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (25, 2, 'Výměna brzdové kapaliny', '<p>Použít pouze novou brzdovou kapalinu podle normy ISO 4925 (SAE 1703) nebo americké normy FMVSS
                    <strong>DOT3</strong> nebo <strong>DOT4</strong>.</p>

                <div class="panel panel-default">
                    <div class="panel-heading">Upozornění</div>
                    <div class="panel-body">
                        <ul>
                            <li>Brzdovou kapalinu v žádném případě nedávat do styku s tekutinami obsahující minerální
                                oleje (olej, benzín, čistící prodstředky...). Minerální oleje poškozují těsnění a
                                manžety brzd.
                            </li>
                            <li>Brzdová kapaliny je jedovatá, zabraňte vzájemnému kontaktu s pokožkou</li>
                            <li>Brzdová kapalina je žíravina leptající lak, zabraňte vzájemnému kontaktu</li>
                            <li>Brzdová kapalina je hygroskopická, tzn. že má schopnost pohlcovat vlhkost ze vzduchu.
                                Proto ji vždycky uchovávajte v nádobě se vzduchotěsným uzávěrem
                            </li>
                            <li>Dbát na předpis pro odstraňování odpadů</li>
                        </ul>
                    </div>
                </div>

                <h4>Výměna brzdové kapaliny bez plnicího a odvzdušňovacího zařízení ROMESS S 15</h4>
                <ol>
                    <li>Pomocí odsavací lahve odsát starou brzdovou kapalinu z vyrovnávací nádržky</li>
                    <li>Naplnit novou kapalinu. Odsátou použitou brzdovou kapalinu opět nepoužívat</li>
                    <li>Sejmout ochranné čepičky ze všech odvzdušňovacích šroubů</li>
                    <li>Nasadit hadičku na odvzdušňovací šroub a volný konec zasunout do pomocné nádobky zpola zaplněné
                        brzdovou kapalinou
                    </li>
                    <li>Otevřít odvzdušňovací šroub a jeho částečným povolením a střídavým stlačováním brzdového pedálu
                        vypumpovat stanovené množství (v tabulce níže) kapaliny, čímž dojde k výměně staré kapaliny za novou
                    </li>
                    <li>Během pumpování průběžně dolévat vyrovnávací nádobku novou kapalinou</li>
                    <li>Po vytlačení stanoveného množství brzdové kapaliny zcela stlačit brzdový pedál a v této poloze
                        pedálu odvzdušňovací šroub uzavřít
                    </li>
                    <li>Výše uvedený postup provést na všech kolech v pořadí snatoveném tabulkou</li>
                    <li>Po provedné výměně brzdové kapaliny stlačit silně brzdový pedál a provést kontrolu těsnosti
                        odvzdušňovacích šroubů
                    </li>
                    <li>Zkontrolovat volný chod brzdového pedálu, který nesmí být větší než 1/3 celkového chodu</li>
                    <li>Doplnit vyrovnávací nádržku brzdové kapaliny až ke značce MAX</li>
                </ol>

                <h4>Výměna brzdové kapaliny pomocí plnícího a odvzdušňovacího zařízení ROMESS S 15</h4>
                <ol>
                    <li>K čistění přístroje nepoužívat žádné čistící hadry obsahující minerální oleje</li>
                    <li>Pomocí odsavací láhve odsát starou brzdovou kapalinu z vyrovnávací nádržky</li>
                    <li>Odsátou použitou brzdovou kapalinu opět nepoužívat</li>
                    <li>Nasadit plnící zařízení ROMESS S 15 na vyrovnávací nádržku pomocí adaptéru a těsnění</li>
                    <li>Nasadit opěrku brzdového pedálu mezi brzdový pedál a sedadlo řidiče a předepnout</li>
                    <li>Otevřít odvzdušňovací šrouby a nechat vytéci stanovené množství kapaliny, čímž dojde k výměně
                        staré kapaliny za novou
                    </li>
                    <li>Po vytlačení stanoveného množství brzdové kapaliny uzavřít odvzdušňovací šroub utažením</li>
                    <li>Výše uvedený postup provést na všech kolech v pořadí stanoveném tabulkou</li>
                    <li>Sejmout plnící zařízení vyrovnávací nádržky a vyjmout opěrku brzdového pedálu</li>
                    <li>Po provedené výměně brzdové kapaliny stlačit silně brzdový pedál a provést kontrolu těsnosti
                        odzvdzušňovacích šroubů
                    </li>
                    <li>Zkontrolovat volný chod brzdového pedálu, který nesmí být větší než 1/3 celkového chodu</li>
                    <li>Doplnit vyrovnávací nádržku brzdové kapaliny až ke značce MAX</li>
                </ol>

                <h4>Množství vytlačené kapaliny</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Pořadí</th>
                        <th>Množství kapaliny</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Pravý zadní</td>
                        <td>200 až 300 cm<sup>3</sup></td>
                    </tr>
                    <tr>
                        <td>Levý zadní</td>
                        <td>200 až 300 cm<sup>3</sup></td>
                    </tr>
                    <tr>
                        <td>Pravý přední</td>
                        <td>100 až 200 cm<sup>3</sup></td>
                    </tr>
                    <tr>
                        <td>Levý přední</td>
                        <td>100 až 200 cm<sup>3</sup></td>
                    </tr>
                    </tbody>
                </table>', 24, 'vymena-brzdove-kapaliny', 0);
TAG
        );


    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
