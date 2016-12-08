<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161203110338 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
            INSERT INTO `manual_pages` (`id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                (11,	'Kontrola výšky hladiny motorového oleje',	'<p>Během kontroly výšky hladiny motorového oleje musí vůz stát na vodorovné ploše. Kontrolu provádět po vypnutí motoru a nejméně po 3-minutové přestávce, aby mohl olej stéci do spodního víka motoru.</p>
                <ol>
                  <li>Vytáhnout měrku na olej, otřít ji čistým hadrem a měrku zpět zasunout</li>
                  <li>Měrku opět vytáhnout a odečíst výšku hladiny oleje</li>
                  <li>V případě, že hladina oleje nedosahuje značky MIN je potřeba olej doplnit</li>
                </ol>
                
                <div class=\"panel panel-default\">
                  <div class=\"panel-heading\">Upozornění</div>
                  <div class=\"panel-body\">
                    <p>Hladina oleje nesmí v žádném případě přesáhnout značku MAX. V opačném případě může dojít k proniknutí oleje přes odvětrávání klikové skříně do sací soustavy - nebezpečí poškození katalyzátoru.</p>
                  </div>
                </div>',	10,	'kontrola-vysky-hladiny-motoroveho-oleje',	0);
TAG
        );

        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
(22,	11,	's02-2011',	'584299525f74a_s02-2011.png',	0);");
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
