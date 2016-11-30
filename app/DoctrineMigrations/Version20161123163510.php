<?php

namespace Application\Migrations;

use AppBundle\Entity\Manual\Manual;
use AppBundle\Entity\Manual\ManualImage;
use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161123163510 extends AbstractMigration implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        /** @var EntityManager $em */
        $em = $this->container->get('doctrine.orm.entity_manager');

        $manual = new Manual();
        $manual->setTitle('Připojení diagnostického přístroje VAG a přečtění paměti závad (vozy do 01.95)');
        $manual->setContent(<<<'TAG'
                <div class="panel panel-default">
                    <div class="panel-heading">Potřebné speciální nářadí a pomůcky</div>
                    <div class="panel-body">
                        <ul>
                            <li>Zkušební adaptér T 003</li>
                            <li>Diagnostický přístroj VAG 1552 nebo VAG 1551 s vedením VAG 1551/1</li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Zkušební podmínky</div>
                    <div class="panel-body">
                        <ul>
                            <li>Napětí na akomulátoru min. 11,5V</li>
                            <li>Pojistky a diagnostická svorkovnice v pořádku</li>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading"><i class="fa fa-exclamation-triangle"></i> Upozornění</div>
                    <div class="panel-body">
                        <p>Všechny funkce, které jsou možné, prověřte diagnostickým přístrojem VAG 1552, nebo se mohou
                            prověřit též diag. přístrojem VAG 1551.</p>
                    </div>
                </div>

                <p>Zkušební adaptér T 003 sestává z následujících částí:</p>
                <ul class="list-unstyled">
                    <li><span class="label label-default"><i class="fa fa-picture-o"></i> [1] 1</span> Světelná dioda
                        (LED)
                    </li>
                    <li><span class="label label-default"><i class="fa fa-picture-o"></i> [1] 2</span> Spínač zkušebního
                        adaptéru
                    </li>
                    <li><span class="label label-default"><i class="fa fa-picture-o"></i> [1] 3</span> Připojovací
                        svorkovnice pro diagnostické přístroje VAG 1552/1
                    </li>
                    <li><span class="label label-default"><i class="fa fa-picture-o"></i> [1] 4</span> Připojovací 5-ti
                        pólová svorkovnice pro připojení adaptéru do diagnostické zásuvky
                    </li>
                </ul>

                <h4 class="page-header">Průběh práce:</h4>
                <ol>
                    <li>Diagnostický přístroj VAG připojit následovně:</li>
                    <li>Připojit adaptér T 003 do diagnostické zásuvky. Spínač adaptéru musí být v poloze vypnuto
                        (směrem ke svět. diodě)
                    </li>
                    <li>Před připojením zkušebního adaptéru je nutno sejmout ochranný kryt diagnostické svorkovnice a po
                        ukončení měření jej nasunout opět zpátky
                    </li>
                    <li>5-ti pólová diagnostická svorkovnice <span class="label label-default"><i
                                    class="fa fa-picture-o"></i> [2] šipka</span> se nachází v zadní části motorového
                        prostoru mezi nídobkou s aktivním uhlím a stěnou motorového prostoru.
                    </li>
                    <li>Zapnout zapalování</li>
                    <li>Připojit diagnostický přístroj na svorkovnici adaptéru</li>
                    <li>Nejdříve připojit svorkovnici do černé zásuvky (napájení diag. přístroje)</li>
                </ol>

                <h4 class="page-header">Přečtení paměti závad:</h4>
                <ol>
                    <li>Na displayi se zobrazí:
                        <div class="vag-display">
                            <div class="title">Display VAG</div>
                            <div class="display">
                                <div class="line">Test systému vozidla
                                    <div class="pull-right">HELP</div>
                                </div>
                                <div class="line">Zadejte adresu XX</div>
                            </div>
                        </div>

                        <div class="panel panel-info">
                            <div class="panel-heading">Upozornění</div>
                            <div class="panel-body">Nebude li na displayi indikován žádný údaj, nepřipojujte druhou
                                svorkovnici. V tomto případě překontrolujte napájení diag. přístroje a odstraňte závadu.
                            </div>
                        </div>
                    </li>

                    <li>Do bílé zásuvky diagnostického přístroje připojte druhou svorkovnici
                        <ul>
                            <li>Tlačítkem HELP je možno na displayi vyvolat další pokyny pro obsluhu</li>
                            <li>Tlačítkem <span class="badge"><i class="fa fa-arrow-right"></i></span> se přechází k
                                dalšímu kroku diag. programu
                            </li>
                        </ul>
                    </li>
                    <li>Nastartovat motor a nechat běžet na volnoběh</li>
                    <li>Diagnostický přístroj obsluhovat podle pokynů zobrazených na displayi</li>
                    <li>Tlačítky vložit adresu "01" - <strong>Elektronika motoru</strong></li>
                    <li>Na displayi se zobrazí:
                        <div class="vag-display">
                            <div class="title">Display VAG</div>
                            <div class="display">
                                <div class="line">Test systému vozidla
                                    <div class="pull-right">HELP</div>
                                </div>
                                <div class="line">01 - Elektronika motoru</div>
                            </div>
                        </div>
                    </li>
                    <li>Vložení adresy potvrdit tlačítkem <span class="badge">Q</span></li>
                    <li>Po zobrazení identifikace řídící jednotky stisknout tlačítko <span class="badge"><i
                                    class="fa fa-arrow-right"></i></span></li>
                    <li>Tlačítky navolit "02" pro vyvolání paměti závad a potvrdit tlačítkem <span
                                class="badge">Q</span>:
                        <div class="vag-display">
                            <div class="title">Display VAG</div>
                            <div class="display">
                                <div class="line">Test systému vozidla
                                    <div class="pull-right">HELP</div>
                                </div>
                                <div class="line">02 - Výzva k výpisu chybové paměti</div>
                            </div>
                        </div>
                    </li>
                    <li>Na displayi se zobrazí počet uložených závad v paměti nebo "Nezjištěna žádná závada". Uložené
                        závady se budou postupně zobrazovat tlačítkem <span class="badge"><i
                                    class="fa fa-arrow-right"></i></span></li>
                    <li>V případě, že nebyla zjištěna žádná závada pokračujte tlačítkem <span class="badge"><i
                                    class="fa fa-arrow-right"></i></span></li>
                </ol>
TAG
        );
        $manual->setFullWidth(false);
        $em->persist($manual);

        $image = new ManualImage();
        $imageName = 's01-0002';
        $image->setTitle($imageName);
        $image->setImageFile(
            new UploadedFile($this->container->getParameter('kernel.root_dir') . '/../web/images/preload/' . $imageName . '.png',
                $imageName . '.png', null, null, null, true));
        $image->setManual($manual);
        $em->persist($image);

        $image = new ManualImage();
        $imageName = 's01-0001';
        $image->setTitle($imageName);
        $image->setImageFile(
            new UploadedFile($this->container->getParameter('kernel.root_dir') . '/../web/images/preload/' . $imageName . '.png',
                $imageName . '.png', null, null, null, true));
        $image->setManual($manual);
        $em->persist($image);

        $em->flush();

        $this->addSql('SELECT `id` FROM `ext_log_entries` LIMIT 1'); //Ping for migrations.
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
