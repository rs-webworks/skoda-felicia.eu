<?php

namespace Application\Migrations;

use AppBundle\Entity\Engine;
use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161122121718 extends AbstractMigration implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        /** @var EntityManager $em */
        $em = $this->container->get('doctrine.orm.entity_manager');

        $engine = new Engine();
        $engine->setName('CARB');
        $engine->setDescription('1.3 karburátor (export)');
        $em->persist($engine);

        $engine = new Engine();
        $engine->setName('BMM');
        $engine->setDescription('1.3 jednobod. vstřik. Bosch Mono-Motronic');
        $em->persist($engine);

        $engine = new Engine();
        $engine->setName('MPI');
        $engine->setDescription('1.3 vícebod. vstřik. Siemens Simos 2P');
        $em->persist($engine);

        $engine = new Engine();
        $engine->setName('1.6');
        $engine->setDescription('1.6 vícebod. vstřik. 1 AV MPI');
        $em->persist($engine);

        $engine = new Engine();
        $engine->setName('1.9 D');
        $engine->setDescription('1.9 diesel');
        $em->persist($engine);

        $em->flush();

        $this->addSql('SELECT `id` FROM `ext_log_entries` LIMIT 1');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
    }
}
