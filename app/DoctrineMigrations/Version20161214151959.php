<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161214151959 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (17, 2, 'Výměna olejového filtru', '<div class="panel panel-default">
                    <div class="panel-heading">Upozornění</div>
                    <div class="panel-body">
                        <ul>
                            <li>Čištění a nové použití původního filtru není přípustné</li>
                            <li>Při dalším nakládání s použitými olejovými filtry je třeba bezpodmínečně dodržovat příslušné předpisy o olejovém hospodářství a likvidaci použitých olejů a filtrů</li>
                        </ul>
                    </div>
                </div>
                <ol>
                    <li>Olejový filtr povolit a vyšroubovat</li>
                    <li>Dosedací plochu těsnícího kroužku motoru očistit</li>
                    <li>Těsnící kroužek na novém filtru lehce naolejovat</li>
                    <li>Nasadit filtr a ručně utáhnout</li>
                    <li>Po naplnění motoru novým olejem, zkontrolovat na zahřátém motoru nedochází-li někde k úniku oleje</li>
                </ol>', 16, 'vymena-olejoveho-filtru', 0);
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
