<?php

namespace Application\Migrations;

use AppBundle\Entity\Manual\Manual;
use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161123144630 extends AbstractMigration implements ContainerAwareInterface
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
        $manual->setTitle('Přehled motorů');
        $manual->setFullWidth(true);
        $manual->setContent('
        <table class="table table-bordered table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>Identifikační kód</th>
                        <th>135</th>
                        <th>135B</th>
                        <th>136B</th>
                        <th>AEE</th>
                        <th>AEF</th>
                        <th>135M</th>
                        <th>136M</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>Označení</th>
                        <td>Karburátor</td>
                        <td>BMM 40</td>
                        <td>BMM 50</td>
                        <td>1.6 MPI</td>
                        <td>1.9 D</td>
                        <td>MPI 40</td>
                        <td>MPI 50</td>
                    </tr>
                    <tr>
                        <th>Výroba od-do</th>
                        <td>09.94 - 06.01</td>
                        <td>09.94 - 09.96</td>
                        <td>09.94 - 09.96</td>
                        <td>09.95 - 09.01</td>
                        <td>12.95 - 09.01</td>
                        <td>08.96 - 09.01</td>
                        <td>08.96 - 09.01</td>
                    </tr>
                    <tr>
                        <th>Zdvih. objem (l)</th>
                        <td>1.3</td>
                        <td>1.3</td>
                        <td>1.3</td>
                        <td>1.6</td>
                        <td>1.9</td>
                        <td>1.3</td>
                        <td>1.3</td>
                    </tr>
                    <tr>
                        <th>Výkon kW / rpm</th>
                        <td>42 / 5000<sup>1</sup></td>
                        <td>40 / 5000</td>
                        <td>50 / 5000</td>
                        <td>55 / 4500</td>
                        <td>47 / 4300</td>
                        <td>40 / 4500</td>
                        <td>50 / 5000</td>
                    </tr>
                    <tr>
                        <th>Max. točivý moment nM / rpm</th>
                        <td>94 / 3000</td>
                        <td>94 / 3250</td>
                        <td>100 / 3750</td>
                        <td>135 / 3500</td>
                        <td>124 / 2500-3200</td>
                        <td>99 / 2500</td>
                        <td>106 / 2600</td>
                    </tr>
                    <tr>
                        <th>Vrtání &#x2300; mm</th>
                        <td>75,5</td>
                        <td>75,5</td>
                        <td>75,5</td>
                        <td>76,5</td>
                        <td>79,5</td>
                        <td>75,5</td>
                        <td>75,5</td>
                    </tr>
                    <tr>
                        <th>Zdvih mm</th>
                        <td>72</td>
                        <td>72</td>
                        <td>72</td>
                        <td>86,9</td>
                        <td>95,5</td>
                        <td>72</td>
                        <td>72</td>
                    </tr>
                    <tr>
                        <th>Stupeň komprese</th>
                        <td>8,8</td>
                        <td>8,8</td>
                        <td>9,7</td>
                        <td>9,8</td>
                        <td>22,5</td>
                        <td>9,5</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <th>Hydraulická zdvihátka</th>
                        <td><i class="fa fa-times text-muted"></i></td>
                        <td><i class="fa fa-times text-muted"></i></td>
                        <td><i class="fa fa-times text-muted"></i></td>
                        <td><i class="fa fa-check text-main"></i></td>
                        <td><i class="fa fa-check text-main"></i></td>
                        <td><i class="fa fa-times text-muted"></i></td>
                        <td><i class="fa fa-times text-muted"></i></td>
                    </tr>
                    <tr>
                        <th>Příprava směsi</th>
                        <td>karb. JIKOV 28-30</td>
                        <td>Bosch Mono-Motronic</td>
                        <td>Bosch Mono-Motronic</td>
                        <td>1 AV MPI</td>
                        <td>vstřikování nafty</td>
                        <td>Simos 2P</td>
                        <td>Simos 2P</td>
                    </tr>
                    <tr>
                        <th>Palivo min. OČ ROZ<sup>4</sup></th>
                        <td>91<sup>2, 3</sup></td>
                        <td>bezolovnatý 91<sup>3</sup></td>
                        <td>bezolovnatý 95</td>
                        <td>bezolovnatý 95</td>
                        <td><i class="fa fa-times text-muted"></i></td>
                        <td>bezolovnatý 91<sup>3</sup></td>
                        <td>bezolovnatý 95</td>
                    </tr>
                    <tr>
                        <th>Palivo min. CČ<sup>5</sup></th>
                        <td><i class="fa fa-times text-muted"></i></td>
                        <td><i class="fa fa-times text-muted"></i></td>
                        <td><i class="fa fa-times text-muted"></i></td>
                        <td><i class="fa fa-times text-muted"></i></td>
                        <td>49</td>
                        <td><i class="fa fa-times text-muted"></i></td>
                        <td><i class="fa fa-times text-muted"></i></td>
                    </tr>
                    <tr>
                        <th>Pořadí zapalování</th>
                        <td colspan="7" class="text-center">1-3-4-2</td>
                    </tr>
                    <tr>
                        <th>Zapalování</th>
                        <td>bezkontaktní</td>
                        <td>Mono-Motronic</td>
                        <td>Mono-Motronic</td>
                        <td>1 AV</td>
                        <td>Diesel</td>
                        <td>Simos 2P</td>
                        <td>Simos 2P</td>
                    </tr>
                    <tr>
                        <th>Vlastní diagnostika</th>
                        <td><i class="fa fa-times text-muted"></i></td>
                        <td><i class="fa fa-check text-main"></i></td>
                        <td><i class="fa fa-check text-main"></i></td>
                        <td><i class="fa fa-check text-main"></i></td>
                        <td><i class="fa fa-check text-main"></i></td>
                        <td><i class="fa fa-check text-main"></i></td>
                        <td><i class="fa fa-check text-main"></i></td>
                    </tr>
                    <tr>
                        <th>Katalyzátor</th>
                        <td><i class="fa fa-check text-main"></i><sup>6</sup> / <i class="fa fa-times text-muted"></i>
                        </td>
                        <td><i class="fa fa-check text-main"></i></td>
                        <td><i class="fa fa-check text-main"></i></td>
                        <td><i class="fa fa-check text-main"></i></td>
                        <td><i class="fa fa-check text-main"></i></td>
                        <td><i class="fa fa-check text-main"></i></td>
                        <td><i class="fa fa-check text-main"></i></td>
                    </tr>
                    <tr>
                        <th>Lambda sonda</th>
                        <td><i class="fa fa-times text-muted"></i></td>
                        <td><i class="fa fa-check text-main"></i></td>
                        <td><i class="fa fa-check text-main"></i></td>
                        <td><i class="fa fa-check text-main"></i></td>
                        <td><i class="fa fa-times text-muted"></i></td>
                        <td><i class="fa fa-check text-main"></i></td>
                        <td><i class="fa fa-check text-main"></i></td>
                    </tr>
                    <tr>
                        <th>Zpětné ved. výf. plynů (EGR)</th>
                        <td><i class="fa fa-times text-muted"></i></td>
                        <td><i class="fa fa-times text-muted"></i></td>
                        <td><i class="fa fa-times text-muted"></i></td>
                        <td><i class="fa fa-times text-muted"></i></td>
                        <td><i class="fa fa-check text-main"></i></td>
                        <td><i class="fa fa-times text-muted"></i></td>
                        <td><i class="fa fa-times text-muted"></i></td>
                    </tr>
                    </tbody>
                </table>

                <p>
                    <small><sup>1</sup> U vozidel s katalyzátorem</small>
                </p>
                <p>
                    <small><sup>2</sup> S katalyzátorem bezolovnatý, bez katalyzátoru bezolovnatý nebo olovnatý
                    </small>
                </p>
                <p>
                    <small><sup>3</sup> Dochází-li vlivem snížené kvality paliva k detonačnímu spalování, doporučujeme
                        používat palivo s OČ 95
                    </small>
                </p>
                <p>
                    <small><sup>4</sup> Oktanové číslo - Research-Oktan-Zahl</small>
                </p>
                </p>
                <p>
                    <small><sup>5</sup> Cetanové číslo</small>
                </p>
                <p>
                    <small><sup>6</sup> Podle cílové země, pokud ano tak pouze neřízený katalyzátor bez lambda sondy
                    </small>
                </p>
        ');
        $em->persist($manual);
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
