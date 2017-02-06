<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170206164855 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (30, 2, 'Kontrola vůle a seřízení lanka akcelerace', '<div class="panel panel-default">
  <div class="panel-heading">Potřebné speciální nářadí, přístroje a pomůcky</div>
  <div class="panel-body">
    Diagnostický přístroj V.A.G 1552 nebo V.A.G 1551 s vedením V.A.G 1551/1 a adaptér T003
  </div>
</div>
<ol>
  <li>Táhlo akcelerace přendáním pružné pojistky
    <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 1</span> na držáku lanovodu nastavit tak, aby se na škrticí klapce dosáhlo plné akcelerace.
  </li>
  <li>Připojit diagnostický přístroj V.A.G 1552, případně V.A.G 1551 a při zapnutém zapalování navolit:
    <ol>
      <li>"01" -<strong>Elektronika motoru</strong></li>
      <li>Vstřikovací a zapalovací zařízení Mono-Motronic</li>
      <li>"01 - <strong>Skupina oprav</strong></li>
      <li>Vlastní diagnostika</li>
    </ol>
    Na displayi se zobrazí:

    <div class="vag-display">
      <div class="title">Display VAG</div>
      <div class="display">
        <div class="line">Test systému vozidla
          <div class="pull-right">HELP</div>
        </div>
        <div class="line">Zvolte funkci XX</div>
      </div>
    </div>
  </li>
  <li>Zadat "04" pro funkci <strong>Uvedení do základního nastavení</strong> a potvrdit pomocí
    <span class="badge">Q</span>, následně zadat "00" pro číslo zobrazované skupiny a potvrdit pomocí
    <span class="badge">Q</span>:
    <div class="vag-display">
      <div class="title">Display VAG</div>
      <div class="display">
        <div class="line">Uvedení do základního nastavení
          <div class="pull-right">HELP</div>
        </div>
        <div class="line">Zadejte číslo zobrazované skupiny XX</div>
      </div>
    </div>
  </li>
  <li>Pole displaye:
    <div class="vag-display">
      <div class="title">Display VAG</div>
      <div class="display">
        <div class="line">Uvedení do základního nastavení 0
          <div class="pull-right">HELP</div>
        </div>
        <div class="line">
          <div style="width: 10%; float: left;">1</div>
          <div style="width: 10%; float: left;">2</div>
          <div style="width: 10%; float: left;">3</div>
          <div style="width: 10%; float: left;">4</div>
          <div style="width: 10%; float: left;">5</div>
          <div style="width: 10%; float: left;">6</div>
          <div style="width: 10%; float: left;">7</div>
          <div style="width: 10%; float: left;">8</div>
          <div style="width: 10%; float: left;">9</div>
          <div style="width: 10%; float: left;">10</div>
          <div class="clearfix"></div>

        </div>
      </div>
    </div>
  </li>
  <li>Plynový pedál zcela prošlápnout a minimálně 5 sekund držet v této poloze. V poli
    <strong>3</strong> musí být požadovaná hodnota
    <strong>240 - 255</strong>.
  </li>
  <li>Uvolnit plynový pedál. Doraz nastavovače škrtící klapky zajede do základní polohy (zcela zatažen).</li>
  <li>Požadovaná hodnota v poli displaye <strong>2</strong> je <strong>5 - 15</strong>.</li>
</ol>

<h4>Není-li požadovaných hodnot dosaženo:</h4>
<ol>
  <li>Pomocí přendání pružné pojistky
    <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 1</span> na držáku lanovodu
    nastavit vůli lanka akcelerátoru.
  </li>
</ol>', 29, 'kontrola-vule-a-serizeni-lanka-akcelerace-1', 0);
TAG
        );

        $this->addSql("INSERT INTO `manuals_engines` (`manual_id`, `engine_id`) VALUES (30, 2);");

        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (44, 30, 's02-0110', '58989ad690d9c_s02-0110.png', 0);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
