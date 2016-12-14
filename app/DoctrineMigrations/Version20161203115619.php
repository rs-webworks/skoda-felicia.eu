<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161203115619 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(<<<TAG
            INSERT INTO `manual_pages` (`id`, `category_id`, `title`, `content`, `position`, `slug`, `full_width`) VALUES
            (12,2,	'Výměna motorového oleje',	'<p>Výměnu oleje je potřeba provádět pokud možno při provozní teplotě motoru.</p>
            <ol>
              <li>Sejmout uzávěr oleje</li>
              <li>Vyšroubovat vypouštěcí šroub ve spodním víku motoru a vytékající olej zachytit do příslušné nádoby</li>
              <li>Výpustný šroub očistit, nasadit nový těsnící kroužek a utáhnout momentem <strong>65 Nm</strong>
              </li>
              <li>Pokud je to zapotřebí, postupujte dále dle postupu
                <a href="{{ url("frontend_manual_show", {"slug": "vymena-olejoveho-filtru"}) }}">Výměna olejového filtru</a>
              </li>
              <li>Nalít olej podle dané specifikace</li>
              <li>Uzávěr oleje opět nasadit</li>
              <li>Nastartovat motor a zkontrolovat na těsnost</li>
              <li>Zkontrolovat znovu stav hladiny oleje v motoru a případně olej doplnit</li>
            </ol>
            
            <h4>Množství olejové náplně</h4>
            <table class="table">
              <thead>
                <tr>
                  <th colspan="2">S výměnou olejového filtru</th>
                </tr>
              </thead>
            
              <tbody>
                <tr>
                  <td>motor 1.3</td>
                  <td>asi 4.5l</td>
                </tr>
                <tr>
                  <td>motor 1.6</td>
                  <td>asi 3.5l</td>
                </tr>
                <tr>
                  <td>motor 1.9</td>
                  <td>asi 5.0l</td>
                </tr>
              </tbody>
            </table>
            <table class="table">
              <thead>
                <tr>
                  <th colspan="2">Bez výměny olejového filtru</th>
                </tr>
              </thead>
            
              <tbody>
                <tr>
                  <td>motor 1.3</td>
                  <td>asi 4.0l</td>
                </tr>
                <tr>
                  <td>motor 1.6</td>
                  <td>asi 3.0l</td>
                </tr>
                <tr>
                  <td>motor 1.9</td>
                  <td>asi 4.5l</td>
                </tr>
              </tbody>
            </table>
            
            <h4>Klasifikace motorových olejů</h4>
            <p>Třídu viskozity oleje je nutné volit podle obrázku
              <span class="label label-default"><i class="fa fa-picture-o"></i> [1]</span>. Když vnější teplota překročí krátkodobě uvedené rozsahy, není nutné olej měnit.
            </p>
            
            <div class="row">
              <div class="col-xs-12 col-sm-6">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th>Zážehové motory</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>vícerozsahové lehkoběžné oleje</th>
                    </tr>
                    <tr>
                      <td>klasifikace VW 500 00<sup>1</sup></td>
                    </tr>
                    <tr>
                      <th>vícerozsahové oleje</th>
                    </tr>
                    <tr>
                      <td>klasifikace VW 501 00<sup>1</sup></td>
                    </tr>
                    <tr>
                      <td>klasifikace VW 502 00<sup>2</sup></td>
                    </tr>
                    <tr>
                      <td>klasifikace ACEA A2<sup>3</sup></td>
                    </tr>
                    <tr>
                      <td>klasifikace ACEA A3-96<sup>3</sup></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-xs-12 col-sm-6">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th>Vznětové motory</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>vícerozsahové lehkoběžné oleje</th>
                    </tr>
                    <tr>
                      <td>klasifikace VW 500 00<sup>1</sup> pouze s VW 505 00<sup>1</sup></td>
                    </tr>
                    <tr>
                      <th>vícerozsahové oleje</th>
                    </tr>
                    <tr>
                      <td>klasifikace VW 501 01<sup>1</sup> pouze s VW 505 00<sup>1</sup></td>
                    </tr>
                    <tr>
                      <td>klasifikace VW 505 00<sup>1</sup></td>
                    </tr>
                    <tr>
                      <td>klasifikace VW 502 00<sup>2</sup> pouze s VW 505 00<sup>1</sup></td>
                    </tr>
                    <tr>
                      <td>klasifikace ACEA B3-96<sup>3</sup></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            
            <p><sup>1</sup> Za touto normou VW nesmí být uvedeno datum starší než 11.92.</p>
            <p><sup>2</sup> Za touto normou VW nesmí být uvedeno datum starší než 01.97.</p>
            <p>
              <sup>3</sup> Tyto oleje se smí použít v daném cyklu výměny oleje pouze jednou pro doplnění a to v případě, že není k dispozici povolený motorový olej.
            </p>
            
            <p>Při doplnění mohou být oleje i navzájem míchány.</p>',	11,	'vymena-motoroveho-oleje',	0);
TAG
        );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
