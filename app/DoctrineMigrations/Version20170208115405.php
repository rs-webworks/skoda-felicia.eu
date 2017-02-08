<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170208115405 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (37, 2, 'Doplnění nádobky ostřikovačů skel a světlometů', '<div class="panel panel-main">
<div class="panel-heading">Poznámka</div>
<div class="panel-body">
<p>Do vody žádné přípravky dávat nemusíte, pokud koupíte samozřejmě již připravené letní/zimní směsi do ostřikovačů.</p>
</div>
</div>

<p>Nádobky musí být naplněny až po okraj. V případě, že se doplňují je třeba do vody přidávat tyto příravky:</p>
<ul>
<li>V létě: čistič skel</li>
<li>V zimě: lihovou nemrznoucí směs</li>
</ul>

<p>Nádobka se nachází na levé straně motorového prostoru. Nádobka ostřikovačů čelního skla má obsah
<strong>3 litry</strong>, u vozidel s ostřikovači světlometů <strong>8 litrů.</strong></p>', 36, 'doplneni-nadobky-ostrikovacu-skel-a-svetlometu', 0);
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
