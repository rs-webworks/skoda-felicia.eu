<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170206155133 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (26, 2, 'Namazání rozdělovače', '<div class="panel panel-default">
  <div class="panel-heading">Upozornění</div>
  <div class="panel-body">
    <ul>
      <li>Víčko a raménko rozdělovače nesmí být znečištěny prachem nebo tukem, případně poškozeny. V případě znečištění umýt benzinem.</li>
      <li>Nasadit víčko a uzavřít rozdělovač až po vyprchání benzinových par.</li>
    </ul>
  </div>
</div>

<ol>
  <li>Sejmout víčko a raménko rozdělovače</li>
  <li>Nakapat na plšt v rozdělovači
    <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 1. šipka</span> asi 3 kapky oleje.
  </li>
  <li>Namazat táhlo podtlakové regulace
    <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 2. šipka</span> 1 kapkou oleje.
  </li>
  <li>Třecí plochu otočného kotouče <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 3. šipka</span> namazat 3 kapkami oleje na vnější straně v místě čepu táhla podtlakové regulace.
  </li>
  <li>Namazat odstředivý regulátor 5 kapkami oleje po uvolnění krytky
    <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 4. šipka</span> na tělese rozdělovače.
  </li>
  <li>
    Vodič
    <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 5. šipka</span> musí být volný mezi rozdělovačem a zapnutou připevňovací sponou.
  </li>
  <li>Vyšroubovat
    <span class="label label-default"><i class="fa fa-picture-o"></i> [2] 1</span>, do otvoru nakapat 3 kapky oleje.
  </li>
  <li>Šroub opět zašroubovat.</li>
</ol>', 25, 'namazani-rozdelovace', 0);
TAG
        );

        $this->addSql("INSERT INTO `manuals_engines` (`manual_id`, `engine_id`) VALUES (26, 1);");

        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (39, 26, 's02-009', '58988d18c9648_s02-0009.png', 0);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (40, 26, 's02-0137', '58988d2222bbe_s02-0137.png', 1);");


    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
