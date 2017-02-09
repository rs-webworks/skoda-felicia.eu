<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170207194216 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (36, 2, 'Dobití akumulátoru', '
                    <div class="alert alert-danger">
  <h4 class="no-margin"><i class="fa fa-fw fa-exclamation-triangle"></i> Pozor!</h4>
  Během nabíjení akumulátoru vzniká třaskavý plyn a proto se vyvarujte jakéhokoliv přiblížení s cigaretou, otevřeným ohněm a zbraňte vzniku elektrické jiskry.
</div>
<p>Akumulátory, které se delší dobu nepoužívají se mohou samovolně vybít a navíc může dojít k sulfatizaci článků.</p>
<ul>
  <li>Pro dobíjení akumulátorů se smí použít pouze taková zařízení, která mají regulací nabíjecího proudu a napěťové omezení. Maximální nabíjecí proud nesmí překročit 10% hodnoty jmenovité kapacity akumulátoru (44 Ah akumulátor = 4.4 nabíjecí proud) a maximální nabíjecí napětí něsmí přesáhnout 14,4 V.</li>
  <li>Při nabíjení akumulátoru dodržet pokyny výrobce.</li>
  <li>Po dosažení hustoty elektrolytu 1.28 g/cm<sup>3</sup> nabíjení ukončit.</li>
  <li>Před vlastním nabíjením sejmout svorky připojovacích kabelů.</li>
  <li>Při odpojování kabelů odpojit nejdříve kostřící
    <span class="label label-default"><strong><i class="fa fa-fw fa-minus"></i> "minus"</strong></span> kabel.
  </li>
  <li>Při zpětném zapojování akumulátoru zapojit nejdříve
    <span class="label label-danger"><strong><i class="fa fa-fw fa-plus"></i> "plus"</strong></span> kabel. Připojovací kabely se nesmí v žádném případě zapojit opačně - nebezpečí požáru elektrické instalace.
  </li>
  <li>Při nabíjení neotevírat zátky akumulátoru.</li>
  <li>Vybít akumulátor může zamrznout již při několika stupních mrazu. Zamrzlá baterie se musí nechat před nabíjením vždy rozmrazit - nebezpečí exploze.</li>
  <li>Síťová přípojka nabíjecího zařízení se připojí do zásuvky až po řádném a správném připojení polových svorek nabíječky na akumulátor.</li>
  <li>Po ukončení nabíjení je třeba provézt zkoušku napětí se zatěžovacím odporem.</li>
</ul>
', 35, 'dobiti-akumulatoru', 0);
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
