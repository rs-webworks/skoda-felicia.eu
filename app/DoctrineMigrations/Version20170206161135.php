<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170206161135 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (28, 2, 'Kontrola a nastavení bezpečnostních pásů a výklopného střešního okna', '<h4 class="no-margin">Kontrola upínacích pásů</h4>
<ol>
  <li>Kontrola navíjecí automatiky včetně blokace:
    <ul>
      <li>Rychlým tahem za upínací pás překontrolovat zda bolkuje automatika navíjení.</li>
    </ul>
  </li>
  <li>Pohledová kontrola zámků bezp. pásů:
    <ul>
      <li>Zkontrolovat zámky na praskliny a poškození.</li>
    </ul>
  </li>
  <li>Kontrola funkce zámků:
    <ul>
      <li>Zasunout jazýček západky do zámku až dojde k slyšitelné aretaci. Silným tahem za pás zkontrolovat funkčnost aretace.</li>
      <li>Stisknout prstem tlačítko a zámek odemknout.</li>
    </ul>
  </li>
  <li>Zkontrolovat vratné oko a jazýček západky:
    <ul>
      <li>Zkontrolovat na deformaci a případné paskliny a trhliny v plastické hmotě.</li>
    </ul>
  </li>
  <li>Zkontrolovat konstrukční prvky upevňovacích (kotevních) bodů.</li>
</ol>

<h4>Výškové nastavení bezp. pásů</h4>
<ol>
  <li>Pro nastavení výšky stistknout tlačítko dolů, vyklopit horní průvlak pásu nahoru
    <span class="label label-default"><i class="fa fa-picture-o"></i> [1]</span></li>
  <li>Posunout uchycení pásu požadovaným směrem nahoru nebo dolů.</li>
  <li>Trhnutím za pás se přesvědčit, že došlo k bezpečné aretaci do polohy.</li>
</ol>

<h4>Výklopné střešní okno</h4>
<ul>
  <li>Zkontrolovat zda je možno pomocí ručního kolečka okno plynule otevírat a zavírat.</li>
  <li>Úplným otočením kolečka vlevo se okno otevře.</li>
  <li>Úplným otočením kolečka vpravo se okno zavře.</li>
</ul>', 27, 'kontrola-a-nastaveni-bezpecnostnich-pasu-a-vyklopneho-stresniho-okna', 0);
TAG
        );


        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (42, 28, 's02-0132', '58989218e23de_s02-0132.png', 0);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
