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
class Version20161123151122 extends AbstractMigration implements ContainerAwareInterface
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
        $manual->setTitle('Připojení diagnostického přístroje VAG a přečtění paměti závad (vozy od 01.95)');
        $manual->setContent(<<<'TAG'
                <div class="panel panel-default">
                    <div class="panel-heading">Potřebné speciální nářadí a pomůcky</div>
                    <div class="panel-body">
                        <ul>
                            <li>Diagnostický přístroj VAG 1552 nebo VAG 1551 s vedením VAG 1551/3</li>
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
                        <p>Následující popis se vztahuje pouze na diagnostický přístroj VAG 1552 s použitím programové
                            karty
                            2.0.</p>
                        <p>Použití přístroje VAG 1551 je obdobné s ohledem na specifické odlišnosti (např. jiné
                            zobrazení
                            displaye apod.)</p>
                    </div>
                </div>


                <p>Diagnostická 16-pólová svorkovnice je umístěna vpravo pod přístrojovou deskou v prostoru vedle
                    pojistkového panelu <span class="label label-default"><i
                                class="fa fa-picture-o"></i> [1] šipka</span>
                    (u vozů RHD je umístěná taktéž na pravé straně vozu).</p>

                <h4 class="page-header">Průběh práce:</h4>
                <ol>
                    <li>Pomocí vedení VAG 1551/3 připojit diagnostický přístroj</li>
                    <li>Spustit motor a nechat jej běžet na volnoběh</li>
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
                    </li>
                    <li>Zadat 00 pro adresu "Automatický test" a potvrdit <span class="badge">Q</span></li>
                </ol>
                <p>Diagnostický přístroj postupně zobrazí všechny známé adresy. Pokud odpoví řídící jednotka svojí
                    identifikací, zobrazí se na displayi všechny v paměti uložené závady, nebo se zobrazí "Nezjištěna
                    žádná závada".</p>
                <p>Závady systému, které byly případně uloženy do paměti závad, se zobrazí (nutno zapsat). Potom vyšle
                    diagnostický přístroj další adresu.</p>

                <p>Po ukončení automatického testu se na displayi zobrazí:</p>
                <div class="vag-display">
                    <div class="title">Display VAG</div>
                    <div class="display">
                        <div class="line">Test systému vozidla
                            <div class="pull-right">HELP</div>
                        </div>
                        <div class="line">Zadejte adresu XX</div>
                    </div>
                </div>
                <p>Vypněte zapalování.</p>


                <div class="panel panel-info">
                    <div class="panel-heading"><i class="fa fa-exclamation-triangle"></i> Upozornění</div>
                    <div class="panel-body">
                        <p>Není-li na displayi žádné zobrazení, přezkoušet podle elektrického schématu elektrické
                            napájení přístroje VAG.</p>
                        <p>Tlačítkem HELP přístroje pro čtení závad může být proveden dotaz na přehled možných
                            adres.</p>
                        <p>Sledujte, zda odpověděly řídící jednotky všech na voze namontovaných systémů. Pokud některá
                            řídící jednotka neodpoví, zkontrolovat "K" vedení k diagnostické svorkovnici.</p>
                    </div>
                </div>
TAG
        );
        $manual->setFullWidth(false);
        $em->persist($manual);

        $image = new ManualImage();
        $image->setTitle('s01-0019');
        $image->setImageFile(
            new UploadedFile($this->container->getParameter('kernel.root_dir') . '/../web/images/preload/s01-0019.png',
                's01-0019.png', null, null, null, true));
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
