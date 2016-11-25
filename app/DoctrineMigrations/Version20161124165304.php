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
class Version20161124165304 extends AbstractMigration implements ContainerAwareInterface
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
        $manual->setTitle('Brzdová soustava: Funkce a nastavení');
        $manual->setContent(<<<'TAG'
                <h4 class="no-margin page-header">Ruční brzda</h4>
                <p>Seřízení má být provedeno tak, aby páka zapadla při síle 100 + 40 N do druhého zářezu.</p>
                <p>Vahadlo <span class="label label-default"><i class="fa fa-picture-o"></i> [1] šipka</span> musí být
                    vždy kolmo k páce ruční brzdy.</p>
                <h4 class="page-header">Zkouška posilovače brzd</h4>
                <ol>
                    <li>Vypnout motor a několikrát silně sešlápnout brzdový pedál, čímž dojde ke zrušení podtlaku v
                        posilovači.
                    </li>
                    <li>Sešlápnout brzdový pedál a za stálého tlaku nastartovat motor.</li>
                    <li>Je-li posilovač brzd ve funkčním stavu, dojde po nastartování motoru k citelnému poklesu
                        brzdového pedálu - funkce posilovače se uvede v činnost.
                    </li>
                </ol>
TAG
        );
        $manual->setFullWidth(false);
        $em->persist($manual);

        $image = new ManualImage();
        $imageName = 's46-0019';
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
