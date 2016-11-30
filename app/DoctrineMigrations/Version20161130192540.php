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
class Version20161130192540 extends AbstractMigration implements ContainerAwareInterface
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
        $manual->setTitle('Výměna oleje v převodovce');
        $manual->setContent(<<<'TAG'
                <p>Výměnu oleje provádět pouze když má motor provozní teplotu, jedině tak je zajištěna dostatečná
                    tekutost oleje a možnost jeho dokonalého vpuštění.</p>
                <p>Vždy vyměnit těsnící kroužek vypouštěcího šroubu.</p>

                <h4>Vypuštění převodového oleje</h4>
                <ol>
                    <li>Vypouštěcí šroub <span class="label label-default"><i class="fa fa-picture-o"></i> [1]</span>
                        ve spodní části převodovky vyšroubovat a olej vypustit
                    </li>
                    <li>Vypouštěcí šroub opět zašroubovat a utáhnout momentem 35 Nm</li>
                    <li>Vymontovat hřídel náhonu tachometru</li>
                    <li>K tomu je třeba odšroubovat upevňovací šroub příložky a vyjmout hřídel náhonu tachometru
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [2]</span></li>
                    <li>Vzniklým otvorem naplnit převodovku olejem v množství <strong>2,4 litru</strong></li>
                </ol>

                <h4>Specifikace převodového oleje</h4>
                <span>API-GL 4</span>
                <ul>
                    <li>SAE 75 W</li>
                    <li>SAE 75 W-80</li>
                    <li>SAE 75 W-85</li>
                    <li>SAE 75 W-90</li>
                </ul>
TAG
        );
        $manual->setFullWidth(false);
        $em->persist($manual);

        $image = new ManualImage();
        $imageName = 's02-0014';
        $image->setTitle($imageName);
        $image->setImageFile(
            new UploadedFile($this->container->getParameter('kernel.root_dir') . '/../web/images/preload/' . $imageName . '.png',
                $imageName . '.png', null, null, null, true));
        $image->setManual($manual);
        $em->persist($image);

        $image = new ManualImage();
        $imageName = 's02-0022';
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
