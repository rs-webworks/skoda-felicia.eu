<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170207190554 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (35, 2, 'Kontrola stavu hladiny elektrolytu v akumulátoru a její doplnění', '<ul>
  <li>Hladina elektrolytu musí ležet mezi značkami <strong>MIN</strong> a <strong>MAX</strong>.</li>
  <li>V případě potřeby doplnit jednotlivé články destilovadou vodou až ke značce <strong>MAX</strong>.
  </li>
</ul>

<p>Akumulátory s vysokou hladiou elektrolytu se mohou začít "vařit". Příliš nízký stav elektrolytu zkracuje životnost akumulátoru.</p>', 34, 'kontrola-stavu-hladiny-elektrolytu-v-akumulatoru-a-jeji-doplneni', 0);
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
