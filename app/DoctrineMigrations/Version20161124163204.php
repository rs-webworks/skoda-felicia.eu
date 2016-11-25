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
class Version20161124163204 extends AbstractMigration implements ContainerAwareInterface
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
        $manual->setTitle('Spojkový pedál: Kontrola polohy, nastavení');
        $manual->setContent(<<<'TAG'
                <div class="panel panel-default">
                    <div class="panel-heading">Výchozí podmínky</div>
                    <div class="panel-body">
                        <ul>
                            <li>Spojkový pedál bez vůle</li>
                            <li>Spojkový pedál v klidové poloze</li>
                        </ul>
                    </div>
                </div>

                <h4 class="page-header">Seřizovací hodnota</h4>
                <p>Spojkový pedál 0 &plusmn; 3 mm vůči brzdovému pedálu <span class="label label-default"><i
                                class="fa fa-picture-o"></i> [1]</span></p>

                <h4 class="page-header">Seřízení polohy</h4>
                <ol>
                    <li>Před seřízením vytáhnout pojistku <span class="label label-default"><i
                                    class="fa fa-picture-o"></i> [2] 2</span></li>
                    <li>Polohu spojkového pedálu seřídit otáčením seřizovací matice <span class="label label-default"><i
                                    class="fa fa-picture-o"></i> [2] 1</span></li>
                    <li>Po seřízení nasadit pojistku <span class="label label-default"><i class="fa fa-picture-o"></i> [2] 2</span>
                        zpět
                    </li>
                </ol>
TAG
        );
        $manual->setFullWidth(false);
        $em->persist($manual);

        $image = new ManualImage();
        $imageName = 's30-0001';
        $image->setTitle($imageName);
        $image->setImageFile(
            new UploadedFile($this->container->getParameter('kernel.root_dir') . '/../web/images/preload/' . $imageName . '.png',
                $imageName . '.png', null, null, null, true));
        $image->setManual($manual);
        $em->persist($image);

        $image = new ManualImage();
        $imageName = 's30-0010';
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
