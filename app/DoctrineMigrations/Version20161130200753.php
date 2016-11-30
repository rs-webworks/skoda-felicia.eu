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
class Version20161130200753 extends AbstractMigration implements ContainerAwareInterface
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
        $manual->setTitle('Kontrola stavu převodového oleje');
        $manual->setContent(<<<'TAG'
                <div class="panel panel-default">
                    <div class="panel-heading">Upozornění</div>
                    <div class="panel-body">
                        <p>Při kontrole stavu hladiny převodového oleje musí vozidlo stát na vodorovné ploše.</p>
                    </div>
                </div>

                <h4>Převodovka do 04.97</h4>
                <p>Pro kontrolu stavu převodového oleje je třeba vymontovat a zamontovat náhon tachometru a změřit výšku hladiny "A" viz.
                    <span class="label label-default"><i class="fa fa-picture-o"></i> [1]</span> která musí být nejméně A = 4 mm.
                </p>

                <h4>Převodovka od 05.97</h4>
                <p>Hladina oleje musí minimálně zasahovat do spodního okraje pastorku <span class="label label-default"><i class="fa fa-picture-o"></i> [2]</span>
                </p>

                <ol>
                    <li>V případě nutnosti doplnit převodový olej otvorem náhonu tachometru</li>
                    <li>Náhon tachometru opět namontovat</li>
                    <li>Příložku náhonového hřídele tachometru opět namontovat a šroub utáhnout momentem 10 Nm</li>
                </ol>
TAG
        );
        $manual->setFullWidth(false);
        $em->persist($manual);

        $image = new ManualImage();
        $imageName = 's02-0021';
        $image->setTitle($imageName);
        $image->setImageFile(
            new UploadedFile($this->container->getParameter('kernel.root_dir') . '/../web/images/preload/' . $imageName . '.png',
                $imageName . '.png', null, null, null, true));
        $image->setManual($manual);
        $em->persist($image);

        $image = new ManualImage();
        $imageName = 's34-0220';
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
