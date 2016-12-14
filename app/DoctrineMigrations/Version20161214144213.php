<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161214144213 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
                    INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
                    (15, 2, 'Výměna čističe paliva - palivového filtru', '<div class="panel panel-default">
                    <div class="panel-heading">Upozornění</div>
                    <div class="panel-body">
                        <ul>
                            <li>Při práci na palivové soustavě je potřeba dodržovat příslušné předpisy bezpečnosti práce</li>
                            <li>Při dalším nakládání s použitými čističi paliva je třeba bezpodmínečně dodržovat příslušné předpisy o zacházení s ropnými produkty a jejich likvidaci</li>
                        </ul>
                    </div>
                </div>

                <h4>Demontáž čističe paliva</h4>
                <ol>
                    <li>Stáhnout příchytnou svorku <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 3</span>
                    </li>
                    <li>Odejmout regulační ventil <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 2</span> s připojeným palivovým potrubím
                    </li>
                    <li>Palivové hadice stáhnout z vývodů
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 4</span> a
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 8</span></li>
                </ol>

                <h4>Montáž čističe paliva</h4>
                <ol>
                    <li>Nasadit nový kroužek
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 1</span></li>
                    <li>Namontovat regulační ventil <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 2</span> s připojenými palivovými trubkami
                    </li>
                    <li>Umístiti příchytnou svorku <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 3</span>
                    </li>
                    <li>Nasunout palivové hadice na vývody
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 4</span> a
                        <span class="label label-default"><i class="fa fa-picture-o"></i> [1] 8</span> a hadice zajistit hadivocými sponami. Směr průtoku je označen šipkami (přípoje nezaměnit)
                    </li>
                    <li>Provést kontrolu palivového systému na těsnost (pohledová kontrola)</li>
                </ol>', 14, 'vymena-cistice-paliva-palivoveho-filtru-2', 0);
TAG
        );

        $this->addSql("INSERT INTO `manuals_engines` (`manual_id`, `engine_id`) VALUES (15, 5);");

        $this->addSql("INSERT INTO `manual_images` (`id`, `manual_id`, `title`, `image_name`, `position`) VALUES
                (26, 15, 's23-0024', '58514c1f9b619_s23-0024.png', 0);");
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
