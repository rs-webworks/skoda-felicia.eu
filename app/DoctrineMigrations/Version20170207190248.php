<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170207190248 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (34, 2, 'Kontrola klidového napětí akumulátoru', '<p>Zkoušku klidového napětí akumulátoru je možné provést dvěma různými způsoby:</p>
<ul>
  <li>Rychlá zkouška</li>
  <li>Dlouhodobá zkouška</li>
</ul>

<p>Dlouhodobá zkouška je přesnější metodou a proto je třeba ji používat přednostně.</p>

<h4>Rychlá zkouška</h4>
<ol>
  <li>Vypnout motor a zapalování.</li>
  <li>Zapnout tlumená světla a zapalování na dobu 30 sec.</li>
  <li>Vypnout tlumená světla a všechny ostatní spotřebiče včetně stropního světla.</li>
  <li>Čekat nejméně 5 minut.</li>
  <li>Změřit napětí mezi svorkami zabudovaného akumulátoru např. digitálním multimetrem (VAG 1315 nebo VAG 1526)</li>
</ol>

<p>V případě, že je naměřeno 12,5 V a více je akumulátor v pořádku.</p>
<p>Je-li naměřeno napětí menší než 12,5 V je třeba zjistit příčinu.</p>

<h4>Dlouhodobá zkouška</h4>
<ol>
  <li>Vozidlo musí být před měřením alespoň 2 hodiny v klidu (žádné starty, nabíjení či vybíjení).</li>
  <li>Změřit napětí naprázdno (všechny spotřebiče vypnuty)</li>
  <li>Změřit napětí mezi svorkami zabudovaného akumulátoru např. digitálním multimetrem (VAG 1315 nebo VAG 1526)</li>
</ol>

<p>V případě, že je naměřeno 12,5 V a více je akumulátor v pořádku.</p>
<p>Je-li naměřeno napětí menší než 12,5 V je třeba zjistit příčinu.</p>', 33, 'kontrola-klidoveho-napeti-akumulatoru', 0);
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
