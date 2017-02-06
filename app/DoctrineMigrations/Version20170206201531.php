<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170206201531 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (33, 2, 'Kontrola a seřízení světlometů', '<p>Následující popis kontroly a seřízení světlometů je v podstatě platný pro všechny státy avšak je třeba vzít v úvahu možnost některých odchylek v příslušné zemi.</p>

<h4>Kontrolní a seřizovací podmínky</h4>
<ul>
  <li>Správně nahuštěné pneumatiky.</li>
  <li>Krycí rozpytlová skla světlometů nesmí být poškozena a znečištěna.</li>
  <li>Vlastní reflektor nepoškozený.</li>
  <li>Zatížit vozidlo a potom s ním několik metrů popojet, aby se pružící jednotky nastavily do správné polohy.</li>
  <li>Vozidlo a seřizovací přístroj musí stát na rovné vodorovné ploše (dodržet pokyny návodu k obsluze seřizovacího stroje)</li>
  <li>Vyrovnat vozidlo a seřizovací přístroj.</li>
  <li>Seřídit úhel sklonu.</li>
  <li>Vozidla, která mají dodatečnou možnost regulace sklonu světlometů na přístrojové desce, musí být regulátor v poloze "0".</li>
</ul>

<h4>Sklon světlometů</h4>
<p>Hlavní světlomet: <strong>12 cm</strong></p>
<p>Mlhový světlomet: <strong>22 cm</strong></p>

<p>U vozidel s regulací sklonu na přístrojové desce je v motorovém prostoru u světlometů nalepena nálepka s údaji sklonu světlometů v %. Podle těchto údajů musí být světlomety seřízeny.</p>
<p>Údaje na nálepce v % se vztahují na 10 m vzdálenost projekční stěny, tzn. že například u sklonu 1.2% odpovídá sklon 12 cm.</p>

<h4>Zatížení vozu</h4>
<p>Vozidlo o pohotovostní hmotnosti zatížit jednou osobou na místě řidiče nebo zátěží 75 kg.</p>
<p>Pohotovostní hmotnost je hmotnost vozidla včetně všech náplní, paliva (min. 90%), nářadí a dalšího normálního příslušenství (rezervní kolo, zvedák, apod.)</p>

<h4>Kontrola seřízení světlometů (se zkušebním stínítkem bez 15° přímky)</h4>
<h5>Hlavní světlomet (tlumená světla)</h5>
<ul>
  <li>Světlomet seřídit tak, aby vodorovný světelný obrys splýval s vodorovnou čárou
    <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 1</span> na zkušební ploše.
  </li>
  <li>Bod zlomu
    <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 2</span> mezi vodorovným obrysem a obrysem stoupajícím vpravo vzhůru musí být na kolmici spuštěný ze středové značky
    <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 3</span></li>
  <li>Světelné jádro světelného svazku leží vpravo od této kolmice.</li>
  <li>Je-li tlumené světlo správně seřízeno, musí ležet střed světelného svazku dálkového světla na středové značce
    <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 3</span>.
  </li>
</ul>

<p>Pro snadnější zjištění bodu zlomu zacloňte střídavě několikrát levou polovinu světlometu. Následně ještě jednou přezkoušet tlumená světla.</p>

<h4>Kontrola seřízení světlometů (se zkušebním stínítkem s 15° přímkou)</h4>
<h5>Hlavní světlomet (tlumená světla)</h5>
<ul>
  <li>Seřízení se provádí stejně jako u přístroje bez 15° přímky.
    <span class="label label-default"><i class="fa fa-picture-o"></i> [2]</span></li>
  <li>Aby se zabránilo chybnému měření, nebrat 15° přímku vůbec v úvahu.</li>
</ul>

<h5>Mlhové světlomety</h5>
<ul>
  <li>Horní světelný obrys musí splývat s vorodorvnou čárou na zkušební ploše v celé šířce.
    <span class="label label-default"><i class="fa fa-picture-o"></i> [3]</span></li>
</ul>

<h5>Ostatní přídavné světlomety</h5>
<ul>
  <li>Dodatečně namontované světlomety musí být seřízeny podle příslušných platných předpisů.</li>
</ul>

<h4>Seřízení světlometů</h4>
<h5>Hlavní světlomet (tlumená světla)</h5>
<p>Na obrázku
  <span class="label label-default"><i class="fa fa-picture-o"></i> [4]</span> je vyobrazen levý světlomet, pro který platí:
</p>

<ul>
  <li>Výškové seřízení se provádí šroubem
    <span class="label label-default"><i class="fa fa-picture-o"></i> [4] A</span></li>
  <li>Stranové seřízení se provádí šroubem
    <span class="label label-default"><i class="fa fa-picture-o"></i> [4] B</span></li>
</ul>

<p>Seřizovací šrouby pravého světlometu mají zrcadlovou polohu vůči levému světlometu.</p>

<h5>Mlhové světlomety</h5>
<ol>
  <li>Plochým šroubovákem vypačte směrem dopředu krycí víčko
    <span class="label label-default"><i class="fa fa-picture-o"></i> [5]</span>.
  </li>
  <li>Pro zmenšení dosahu světel otočit stavěcím šroubem
    <span class="label label-default"><i class="fa fa-picture-o"></i> [6] šipka</span> doprava. Se stranovým nastavením se nepočítá.
  </li>
</ol>

<p>Seřizovací šroub pravého mlhového světlometu má zrcadlovou polohu.</p>', 32, 'kontrola-a-serizeni-svetlometu', 0);
TAG
        );


        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (47, 33, 's02-0091', '5898cb17ac1f8_s02-0091.png', 0);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (48, 33, 's02-0090', '5898cb1fe2d1b_s02-0090.png', 1);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (49, 33, 's02-0089', '5898cb28ed152_s02-0089.png', 2);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (50, 33, 's02-0114', '5898cb32938dd_s02-0114.png', 3);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (51, 33, 's02-0115', '5898cb39e5576_s02-0115.png', 4);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (52, 33, 's02-0118', '5898cb42d64ff_s02-0118.png', 5);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
