<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170209173408 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (51, 2, 'Tažení, roztahování a vlečení vozidla', '<p>Pod předním a zadním nárazníkem jsou na pravé straně umístěna oka pro připevnění vlečného lana.</p>

                <h5>Přední oko - vozy do 07.95</h5>
                <p>Oko pro připevnění vlečného lana se nachází na pravé straně pod nárazníkem a je zakryto víčkem
                    <span class="label label-default"><i class="fa fa-picture-o"></i> [1]</span>.</p>

                <h5>Přední oko - vozy od 08.95 do 3.98</h5>
                <p>Otvor pro našroubování oka se nachází na levé straně předního nárazníku
                    <span class="label label-default"><i class="fa fa-picture-o"></i> [2]</span>. Vlečné oko lze našroubovat rukou otáčením doleva ve směru šipky
                    <span class="label label-default"><i class="fa fa-picture-o"></i> [2]</span> až na doraz.
                </p>

                <h5>Přední oko - vozy od 08.95 do 3.98</h5>
                <p>Otvor pro našroubování oka se nachází na pravé straně předního nárazníku. Pro jeho zpřístupnění je potřeba vyjmout krytku mlhového světlometu, případně záslepku namísto mlhového světlometu.
                    <span class="label label-default"><i class="fa fa-picture-o"></i> [2]</span>. Vlečné oko lze našroubovat rukou otáčením doleva ve směru šipky až na doraz.
                </p>

                <h5>Zadní oko pro připevnění vlečného lana</h5>
                <p>Oko pro připevnění vlečného lana se nachází na pravé straně pod nárazníkem a je zakryto víčkem.
                    Víčko sejměte tahem dopředu. Při montáži nasadit víčko a narazit - musí spolehlivě zaklapnout.</p>


                <h4>Upozornění při tažení a vlečení</h4>
                <ul>
                    <li>Vlečné lano připevnit jen do příslušných ok.</li>
                    <li>Vlečné lano má být pružné, aby nedocházelo k tvrdým rázům do vlečného a vlečeného vozidla.
                        Mají být proto použita pouze lana z umělých vláken nebo lana z podobného pružného materiálu.
                    </li>
                    <li>Snažte se během vlečení zabránit prudkým rázům. Při vlečení vozidla mimo zpevněnou vozovku
                        existuje vždy věčí nebezpečí poškození vozidel - deformace nebo utržení ok.
                    </li>
                    <li>Před nastartováním motoru roztažením vozidla se doporučuje pokus o nastartování z akumulátoru
                        jiného vozidla.
                    </li>
                    <li>Dodržovat zákonné předpisy o vlečení vozidel.</li>
                    <li>Oba řidiči musí být seznámeni s technikou řízení vozidel při vlečení.</li>
                    <li>Řidič tažného vozidla musí udržovat lano stále napnuté.</li>
                    <li>Vlečené vozidlo musí mít zapnuté zapalování, aby nedošlo k uzamknutí volantu a mohly být
                        používány ostatní elektrické spotřebiče.
                    </li>
                    <li>Protože posilovač brzd pracuje pouze při běžícím motoru, je nutné si uvědomit, že při stojícím
                        motoru je nutné vyvinout na brzdový pedál podstatně větší sílu, aby se dosáhlo žádaného
                        brzdícího účinku.
                    </li>
                    <li>Není-li u vlečeného vozidla olej v převodovce, je vlečení možné pouze jen s nadzvednutými
                        hnacími koly.
                    </li>
                </ul>

                <h4>Postup při roztažení</h4>
                <ol>
                    <li>Zařadit 2. nebo 3. rychlostní stupeň.</li>
                    <li>Zapnout zapalování.</li>
                    <li>Jakmile motor nastartuje, okamžitě vyšlápnout spojku a vyřadit rychlost, aby se zabránilo najetí do tažného vozidla.</li>
                    <li>U vozidel s katalyzátorem, který je ohřátý na provozní teplotu, se nesmí vozidlo startovat
                        roztažením na dráze delší, než 50 m. Nespálené palivo se může dostat do katalyzátoru a
                        způsobit vážné škody.
                    </li>
                </ol>', 50, 'tazeni-roztahovani-a-vleceni-vozidla', 0);
TAG
        );


        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (69, 51, 's02-0129', '589c99dd83390_s02-0129.png', 0);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (70, 51, 's02-0210', '589c99e79f5d3_s02-0210.png', 1);");
        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (71, 51, 's02-0130', '589c99f0d87d5_s02-0130.png', 2);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
