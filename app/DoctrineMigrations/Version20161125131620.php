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
class Version20161125131620 extends AbstractMigration implements ContainerAwareInterface
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
        $manual->setTitle('Kontrola opotřebení a napnutí řemene alternátoru');
        $manual->setContent(<<<'TAG'
                <h4 class="no-margin page-header">Klínový řemen - kontrola opotřebení</h4>
                <p>Zkontrolujte opotřebení na:</p>
                <ul>
                    <li>Trhliny spodní části (natržení, lomy v jádru, lomy v příčném řezu).</li>
                    <li>Oddělení jednotlivých vrstev (krycí vrstva, tažné prvky).</li>
                    <li>Zálom na spodní části.</li>
                    <li>Roztřepení tažných prvků.</li>
                    <li>Opotřebení boků <span class="label label-default"><i class="fa fa-picture-o"></i> [1]</span>
                        (úbytek materiálu, roztřepené boky, ztvrdnutí boků, skelné boky, povrchové trhliny).
                    </li>
                    <li>Stopy oleje.</li>
                    <li>Zjistit, zda spodní část řemenu nesední na dně klínové drážky řemenice <span
                                class="label label-default"><i class="fa fa-picture-o"></i> [1]</span>,
                    </li>
                </ul>

                <div class="panel panel-info">
                    <div class="panel-heading">Upozornění</div>
                    <div class="panel-body"><p>V případě, že jsou zjištěny některé z uvedených závad, je třeba řemen
                            bezdpodmínečně vyměnit a zabránit tak dalším provozním poruchám.</p>
                    </div>
                </div>

                <h4 class="page-header">Klínový řemen - napnutí/výměna</h4>
                <ol>
                    <li>Klínový řemen je správně napnutý, pokud je možno jej mírným tlakem prstů prohnout o 10 - 15 mm
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [2] A</span>.
                    </li>
                    <li>Povolit upevňovací šrouvy, alespoň o 1 otáčku.</li>
                    <li>Správně napnout řemen vyklopením alternátoru.</li>
                    <li>Šrouby utáhnout předepsaným utahovacím momentem.
                        <ul>
                            <li>Šrouby vzpěry alternátoru M8: 25 Nm</li>
                            <li>Upevňovací šroub alternátoru M10: 40 Nm</li>
                        </ul>
                    </li>
                </ol>

                <h4 class="page-header">Drážkový řemen - kontrola opotřebení</h4>
                <p>Zkontrolujte opotřebení na:</p>
                <ul>
                    <li>Odloupnutí zadní části řemene a pásu řemene od kordu řemene</li>
                    <li>Oddělení plochy (krycí vrstva, tažné smyčky)</li>
                    <li>Natržené nebo uvolněné drážky</li>
                    <li>Přetržená vlákna kordu</li>
                    <li>Opotřebení boků <span class="label label-default"><i class="fa fa-picture-o"></i> [3]</span>
                        (otěr materiálu, vytrhané boky, ztvrdnutí boků, sklovité a ztvrdlé povrchy)
                    </li>
                    <li>Stopy po oleji</li>
                </ul>

                <div class="panel panel-info">
                    <div class="panel-heading">Upozornění</div>
                    <div class="panel-body">V případě, že jsou zjištěny nedostatky, je třeba řemen
                        bezdpodmínečně vyměnit a zabránit tak dalším provozním poruchám.
                    </div>
                </div>

                <h4 class="page-header">Drážkový řemen - napnutí/výměna (motory 1.3l)</h4>
                <div class="panel panel-main">
                    <div class="panel-heading">Poznámka</div>
                    <div class="panel-body">
                        <p>Níže uvedený text je doslovný postup z příručky. Pro napnutí a výměnu drážkového řemene
                            můžete bez problémů použít stejný postup jako pro klínový řemen, popsaný výše. Žádné
                            speciální přípravky
                            nejsou zapotřebí.</p>
                        <p>Ideální je napnutí provádět ve dvou lidech. Jedna osoba zatlačí na alternátor a druhá dotáhne
                            šrouby. Pohlídejte si pouze aby drážky řemenu seděly správně na řemenicích, viz. <span
                                    class="label label-default"><i
                                        class="fa fa-picture-o"></i> [4]</span></p>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Potřebné speciální nářadí a pomůcky</div>
                    <div class="panel-body">
                        <ul>
                            <li>Měřící přístroj firmy Optibelt</li>
                            <li>Napínací přípravek firmy Noit - NP 002</li>
                        </ul>
                    </div>
                </div>

                <p>Zkontrolovat pomocí měřícího přístroje firmy Optibelt <span class="label label-default"><i
                                class="fa fa-picture-o"></i> [4]</span> napnutí drážkového řemene a případně ho
                    nastavit. Hodnota musí být 350 - 400 N.</p>
                <p>V případě výměny, resp. opětovného namontování drážkového řemene je nutné dodržet správnou polohu
                    <span class="label label-default"><i
                                class="fa fa-picture-o"></i> [5]</span></p>
                <p>Upevňovací šrouby <span class="label label-default"><i
                                class="fa fa-picture-o"></i> [2] černé šipky</span> uvolnit nejméně o jedno pootočení.
                </p>
                <p>Napínací přípravek filmy Nolt - NP 002 nasadit na podpěru alternátoru a pomocí přípravu drážkový
                    řemen napnout na požadovanou hodnotu (používat měřící přístroj firmy Optibelt). <span
                            class="label label-default"><i
                                class="fa fa-picture-o"></i> [6]</span></p>
                <p>Šrouby utáhnout předepsaným utahovacím momentem.</p>
                <ul>
                    <li>Šrouby vzpěry alternátoru M8: 25 Nm</li>
                    <li>Upevňovací šroub alternátoru M10: 40 Nm</li>
                </ul>
                <div class="panel panel-info">
                    <div class="panel-heading">Upozornění</div>
                    <div class="panel-body">Po napnutí nového drážkového řemene motor nastartovat a nechat asi 20s běžet
                        na volnoběh. Motor vypnout a opět změřit napnutí.
                    </div>
                </div>

                <h4 class="page-header">Drážkový řemen - napnutí/výměna (motory AEE)</h4>
                <div class="panel panel-main">
                    <div class="panel-heading">Poznámka</div>
                    <div class="panel-body">
                        <p>Níže uvedený text je doslovný postup z příručky. Pro napnutí a výměnu drážkového řemene
                            můžete bez problémů použít stejný postup jako pro klínový řemen, popsaný výše. Žádné
                            speciální přípravky nejsou zapotřebí.</p>
                        <p>Ideální je napnutí provádět ve dvou lidech. Jedna osoba zatlačí na alternátor a druhá dotáhne
                            šrouby. Pohlídejte si pouze aby drážky řemenu seděly správně na řemenicích, viz. <span
                                    class="label label-default"><i
                                        class="fa fa-picture-o"></i> [4]</span></p>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Potřebné speciální nářadí a pomůcky</div>
                    <div class="panel-body">
                        <ul>
                            <li>Napínací přípravek MP1-203</li>
                        </ul>
                    </div>
                </div>

                <p>Postup:</p>
                <ol>
                    <li>Uvolnit šrouby připevnění alternátoru.</li>
                    <li>Nasadit napínací páku MP1-203, pojistit ji zasunutím kolíku a vyklopit alternátor směrem dolů.
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [7]</span></li>
                    <li>Po nasazení řemene alternátoru při uvolněném alternátoru několikrát protočit pomocí spouštěče
                        (asi 10 otáček).
                    </li>
                    <li>Přitáhnout nejdříve spodní a potom horní šroub alternátoru momentem 23 Nm.</li>
                </ol>
TAG
        );
        $manual->setFullWidth(false);
        $em->persist($manual);

        $image = new ManualImage();
        $imageName = 's02-0023';
        $image->setTitle($imageName);
        $image->setImageFile(
            new UploadedFile($this->container->getParameter('kernel.root_dir') . '/../web/images/preload/' . $imageName . '.png',
                $imageName . '.png', null, null, null, true));
        $image->setManual($manual);
        $em->persist($image);

        $image = new ManualImage();
        $imageName = 's02-0012';
        $image->setTitle($imageName);
        $image->setImageFile(
            new UploadedFile($this->container->getParameter('kernel.root_dir') . '/../web/images/preload/' . $imageName . '.png',
                $imageName . '.png', null, null, null, true));
        $image->setManual($manual);
        $em->persist($image);

        $image = new ManualImage();
        $imageName = 's02-0025';
        $image->setTitle($imageName);
        $image->setImageFile(
            new UploadedFile($this->container->getParameter('kernel.root_dir') . '/../web/images/preload/' . $imageName . '.png',
                $imageName . '.png', null, null, null, true));
        $image->setManual($manual);
        $em->persist($image);

        $image = new ManualImage();
        $imageName = 's27-0015';
        $image->setTitle($imageName);
        $image->setImageFile(
            new UploadedFile($this->container->getParameter('kernel.root_dir') . '/../web/images/preload/' . $imageName . '.png',
                $imageName . '.png', null, null, null, true));
        $image->setManual($manual);
        $em->persist($image);

        $image = new ManualImage();
        $imageName = 's02-0024';
        $image->setTitle($imageName);
        $image->setImageFile(
            new UploadedFile($this->container->getParameter('kernel.root_dir') . '/../web/images/preload/' . $imageName . '.png',
                $imageName . '.png', null, null, null, true));
        $image->setManual($manual);
        $em->persist($image);

        $image = new ManualImage();
        $imageName = 's27-0014';
        $image->setTitle($imageName);
        $image->setImageFile(
            new UploadedFile($this->container->getParameter('kernel.root_dir') . '/../web/images/preload/' . $imageName . '.png',
                $imageName . '.png', null, null, null, true));
        $image->setManual($manual);
        $em->persist($image);

        $image = new ManualImage();
        $imageName = 's13-0029';
        $image->setTitle($imageName);
        $image->setImageFile(
            new UploadedFile($this->container->getParameter('kernel.root_dir') . '/../web/images/preload/' . $imageName . '.png',
                $imageName . '.png', null, null, null, true));
        $image->setManual($manual);
        $em->persist($image);

        $em->flush();
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
