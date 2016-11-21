<!DOCTYPE html>
<html lang="cs" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<meta name="referrer" content="origin-when-crossorigin">
<title>Vypsat: manpages - Adminer</title>
<link rel="stylesheet" type="text/css" href="?file=default.css&amp;version=4.2.5">
<script type="text/javascript" src="?file=functions.js&amp;version=4.2.5"></script>
<link rel="shortcut icon" type="image/x-icon" href="?file=favicon.ico&amp;version=4.2.5">
<link rel="apple-touch-icon" href="?file=favicon.ico&amp;version=4.2.5">

<body class="ltr nojs" onkeydown="bodyKeydown(event);" onclick="bodyClick(event);">
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = 'Jste offline.';
</script>

<div id="help" class="jush-sql jsonly hidden" onmouseover="helpOpen = 1;" onmouseout="helpMouseout(this, event);"></div>

<div id="content">
<p id="breadcrumb"><a href="?server=localhost">MySQL</a> &raquo; <a href='?server=localhost&amp;username=root' accesskey='1' title='Alt+Shift+1'>localhost</a> &raquo; <a href="?server=localhost&amp;username=root&amp;db=felicia">felicia</a> &raquo; Vypsat: manpages
<h2>Vypsat: manpages</h2>
<div id='ajaxstatus' class='jsonly hidden'></div>
<p class="links"> <a href='?server=localhost&amp;username=root&amp;db=felicia&amp;select=manpages' class='active '>Vypsat data</a> <a href='?server=localhost&amp;username=root&amp;db=felicia&amp;table=manpages'>Zobrazit strukturu</a> <a href='?server=localhost&amp;username=root&amp;db=felicia&amp;create=manpages'>Pozměnit tabulku</a> <a href='?server=localhost&amp;username=root&amp;db=felicia&amp;edit=manpages'>Nová položka</a>
<form action='' id='form'>
<div style='display: none;'><input type="hidden" name="server" value="localhost"><input type="hidden" name="username" value="root"><input type="hidden" name="db" value="felicia"><input type="hidden" name="select" value="manpages"></div>
<fieldset><legend><a href='#fieldset-select' onclick="return !toggle('fieldset-select');">Vypsat</a></legend><div id='fieldset-select' class='hidden'>
<div><select name='columns[0][fun]' onchange='helpClose(); this.nextSibling.nextSibling.onchange();' onmouseover='helpMouseover(this, event, getTarget(event).value &amp;&amp; getTarget(event).value.replace(/ |$/, &#039;(&#039;) + &#039;)&#039;, 1);' onmouseout='helpMouseout(this, event);'><option><optgroup label="Funkce"><option>char_length<option>date<option>from_unixtime<option>lower<option>round<option>sec_to_time<option>time_to_sec<option>upper</optgroup><optgroup label="Agregace"><option>avg<option>count<option>count distinct<option>group_concat<option>max<option>min<option>sum</optgroup></select>(<select name='columns[0][col]' onchange='selectAddRow(this);'><option value=''><option value="id">id<option value="title">title<option value="content">content</select>)</div>
</div></fieldset>
<fieldset><legend><a href='#fieldset-search' onclick="return !toggle('fieldset-search');">Vyhledat</a></legend><div id='fieldset-search' class='hidden'>
<div><select name='where[0][col]' onchange='this.nextSibling.onchange();'><option value=''>(kdekoliv)<option value="id">id<option value="title">title<option value="content">content</select><select name='where[0][op]' onchange="this.nextSibling.onchange();"><option>=<option>&lt;<option>&gt;<option>&lt;=<option>&gt;=<option>!=<option>LIKE<option>LIKE %%<option>REGEXP<option>IN<option>IS NULL<option>NOT LIKE<option>NOT REGEXP<option>NOT IN<option>IS NOT NULL<option>SQL</select><input type='search' name='where[0][val]' value='' onchange='selectAddRow(this);' onkeydown='selectSearchKeydown(this, event);' onsearch='selectSearchSearch(this);'></div>
</div></fieldset>
<fieldset><legend><a href='#fieldset-sort' onclick="return !toggle('fieldset-sort');">Seřadit</a></legend><div id='fieldset-sort' class='hidden'>
<div><select name='order[0]' onchange='selectAddRow(this);'><option value=''><option value="id">id<option value="title">title<option value="content">content</select><label><input type='checkbox' name='desc[0]' value='1'>sestupně</label></div>
</div></fieldset>
<fieldset><legend>Limit</legend><div><input type='number' name='limit' class='size' value='50' onchange='selectFieldChange(this.form);'></div></fieldset>
<fieldset><legend>Délka textů</legend><div><input type='number' name='text_length' class='size' value='100'></div></fieldset>
<fieldset><legend>Akce</legend><div><input type='submit' value='Vypsat'> <span id='noindex' title='Průchod celé tabulky'></span><script type='text/javascript'>
var indexColumns = {
	"id": undefined
}
;
selectFieldChange(document.getElementById('form'));
</script>
</div></fieldset>
</form>
<p><code class='jush-sql'>SELECT * FROM `manpages` LIMIT 50</code> <span class='time'>(0.000 s)</span> <a href='?server=localhost&amp;username=root&amp;db=felicia&amp;sql=SELECT+%2A%0AFROM+%60manpages%60%0ALIMIT+50'>Upravit</a></p><form action='' method='post' enctype='multipart/form-data'>
<table id='table' cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);' onkeydown='return editingKeydown(event);'>
<thead><tr><td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'> <a href='/0_ADMINER/?server=localhost&amp;username=root&amp;db=felicia&amp;select=manpages&amp;modify=1'>Změnit</a><th onmouseover="columnMouse(this);" onmouseout="columnMouse(this, ' hidden');"><a href="/0_ADMINER/?server=localhost&amp;username=root&amp;db=felicia&amp;select=manpages&amp;order%5B0%5D=id"><span title="int(11)">id</span></a><span class='column hidden'><a href='/0_ADMINER/?server=localhost&amp;username=root&amp;db=felicia&amp;select=manpages&amp;order%5B0%5D=id&amp;desc%5B0%5D=1' title='sestupně' class='text'> ↓</a><a href="#fieldset-search" onclick="selectSearch('id'); return false;" title="Vyhledat" class="text jsonly"> =</a></span><th onmouseover="columnMouse(this);" onmouseout="columnMouse(this, ' hidden');"><a href="/0_ADMINER/?server=localhost&amp;username=root&amp;db=felicia&amp;select=manpages&amp;order%5B0%5D=title"><span title="varchar(255)">title</span></a><span class='column hidden'><a href='/0_ADMINER/?server=localhost&amp;username=root&amp;db=felicia&amp;select=manpages&amp;order%5B0%5D=title&amp;desc%5B0%5D=1' title='sestupně' class='text'> ↓</a><a href="#fieldset-search" onclick="selectSearch('title'); return false;" title="Vyhledat" class="text jsonly"> =</a></span><th onmouseover="columnMouse(this);" onmouseout="columnMouse(this, ' hidden');"><a href="/0_ADMINER/?server=localhost&amp;username=root&amp;db=felicia&amp;select=manpages&amp;order%5B0%5D=content"><span title="longtext">content</span></a><span class='column hidden'><a href='/0_ADMINER/?server=localhost&amp;username=root&amp;db=felicia&amp;select=manpages&amp;order%5B0%5D=content&amp;desc%5B0%5D=1' title='sestupně' class='text'> ↓</a><a href="#fieldset-search" onclick="selectSearch('content'); return false;" title="Vyhledat" class="text jsonly"> =</a></span></thead>
<tr><td><input type='checkbox' name='check[]' value='where%5Bid%5D=1' onclick="this.form[&#039;all&#039;].checked = false; formUncheck(&#039;all-page&#039;);"> <a href='?server=localhost&amp;username=root&amp;db=felicia&amp;edit=manpages&amp;where%5Bid%5D=1'>upravit</a><td id='val[&amp;where%5Bid%5D=1][id]' onclick="selectClick(this, event, 0);">1<td id='val[&amp;where%5Bid%5D=1][title]' onclick="selectClick(this, event, 0);">Kontrola vůle a seřízení lanka akcelerace (karburátorový motor)<td id='val[&amp;where%5Bid%5D=1][content]' onclick="selectClick(this, event, 2);">&lt;ol&gt;
	&lt;li&gt;Pedál akcelerace sešlápnout do polohy: &lt;strong&gt;plný plyn&lt;/strong&gt;.&lt;/li&gt;
    &lt;li&gt;Polohu p<i>...</i></tr>
<tr class="odd"><td><input type='checkbox' name='check[]' value='where%5Bid%5D=2' onclick="this.form[&#039;all&#039;].checked = false; formUncheck(&#039;all-page&#039;);"> <a href='?server=localhost&amp;username=root&amp;db=felicia&amp;edit=manpages&amp;where%5Bid%5D=2'>upravit</a><td id='val[&amp;where%5Bid%5D=2][id]' onclick="selectClick(this, event, 0);">2<td id='val[&amp;where%5Bid%5D=2][title]' onclick="selectClick(this, event, 0);">Kontrola vůle a seřízení lanka akcelerace (motor 1,3l se vstřikováním paliva Mono-Motronic)<td id='val[&amp;where%5Bid%5D=2][content]' onclick="selectClick(this, event, 2);">&lt;div class=&quot;panel panel-default&quot;&gt;
  &lt;div class=&quot;panel-heading&quot;&gt;Potřebné speciální nářadí, přístroje<i>...</i></tr>
</table>
<script type="text/javascript">
var timeout = setTimeout(function () {
	ajax('?server=localhost&username=root&db=felicia&script=kill', function () {
	}, 'token=245404:697438&kill=20');
}, 5000);
</script>
<script type='text/javascript'>clearTimeout(timeout);</script>
<p class='count'>
(2 řádky) <label><input type='checkbox' name='all' value='1' onclick="var checked = formChecked(this, /check/); selectCount(&#039;selected&#039;, this.checked ? &#039;2&#039; : checked); selectCount(&#039;selected2&#039;, this.checked || !checked ? &#039;2&#039; : checked);">celý výsledek</label>
<fieldset class="jsonly"><legend>Změnit</legend><div>
<input type="submit" value="Uložit" title="Ctrl+klikněte na políčko, které chcete změnit.">
</div></fieldset>
<fieldset><legend>Označené <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="Upravit">
<input type="submit" name="clone" value="Klonovat">
<input type="submit" name="delete" value="Smazat" onclick="return confirm('Opravdu?');">
</div></fieldset>
<fieldset><legend><a href='#fieldset-export' onclick="return !toggle('fieldset-export');">Export <span id='selected2'></span></a></legend><div id='fieldset-export' class='hidden'>
<select name='output'><option value="text" selected>otevřít<option value="file">uložit<option value="gz">gzip</select> <select name='format'><option value="sql" selected>SQL<option value="csv">CSV,<option value="csv;">CSV;<option value="tsv">TSV</select> <input type='submit' name='export' value='Export'>
</div></fieldset>
<script type='text/javascript'>tableCheck();</script>
<fieldset><legend><a href='#fieldset-import' onclick="return !toggle('fieldset-import');">Import</a></legend><div id='fieldset-import' class='hidden'>
<input type='file' name='csv_file'> <select name='separator'><option value="csv">CSV,<option value="csv;">CSV;<option value="tsv">TSV</select> <input type='submit' name='import' value='Import'></div></fieldset>
<p><input type='hidden' name='token' value='245404:697438'></p>
</form>
</div>

<form action='' method='post'>
<div id='lang'>Jazyk: <select name='lang' onchange="this.form.submit();"><option value="en">English<option value="ar">العربية<option value="bg">Български<option value="bn">বাংলা<option value="bs">Bosanski<option value="ca">Català<option value="cs" selected>Čeština<option value="da">Dansk<option value="de">Deutsch<option value="el">Ελληνικά<option value="es">Español<option value="et">Eesti<option value="fa">فارسی<option value="fi">Suomi<option value="fr">Français<option value="gl">Galego<option value="hu">Magyar<option value="id">Bahasa Indonesia<option value="it">Italiano<option value="ja">日本語<option value="ko">한국어<option value="lt">Lietuvių<option value="nl">Nederlands<option value="no">Norsk<option value="pl">Polski<option value="pt">Português<option value="pt-br">Português (Brazil)<option value="ro">Limba Română<option value="ru">Русский язык<option value="sk">Slovenčina<option value="sl">Slovenski<option value="sr">Српски<option value="ta">த‌மிழ்<option value="th">ภาษาไทย<option value="tr">Türkçe<option value="uk">Українська<option value="vi">Tiếng Việt<option value="zh">简体中文<option value="zh-tw">繁體中文</select> <input type='submit' value='Vybrat' class='hidden'>
<input type='hidden' name='token' value='10275:602849'>
</div>
</form>
<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Odhlásit" id="logout">
<input type="hidden" name="token" value="245404:697438">
</p>
</form>
<div id="menu">
<h1>
<a href='https://www.adminer.org/' target='_blank' id='h1'>Adminer</a> <span class="version">4.2.5</span>
<a href="https://www.adminer.org/#download" target="_blank" id="version"></a>
</h1>
<script type="text/javascript" src="?file=jush.js&amp;version=4.2.5"></script>
<script type="text/javascript">
var jushLinks = { sql: [ '?server=localhost&username=root&db=felicia&table=$&', /\b(manpages)\b/g ] };
jushLinks.bac = jushLinks.sql;
jushLinks.bra = jushLinks.sql;
jushLinks.sqlite_quo = jushLinks.sql;
jushLinks.mssql_bra = jushLinks.sql;
bodyLoad('5.7');
</script>
<form action="">
<p id="dbs">
<input type="hidden" name="server" value="localhost"><input type="hidden" name="username" value="root"><span title='databáze'>DB</span>: <select name='db' onmousedown='dbMouseDown(event, this);' onchange='dbChange(this);'><option value=""><option>information_schema<option selected>felicia<option>mysql<option>performance_schema<option>sys</select><input type='submit' value='Vybrat' class='hidden'>
</p></form>
<p class='links'><a href='?server=localhost&amp;username=root&amp;db=felicia&amp;sql='>SQL příkaz</a>
<a href='?server=localhost&amp;username=root&amp;db=felicia&amp;import='>Import</a>
<a href='?server=localhost&amp;username=root&amp;db=felicia&amp;dump=manpages' id='dump'>Export</a>
<a href="?server=localhost&amp;username=root&amp;db=felicia&amp;create=">Vytvořit tabulku</a>
<p id='tables' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>
<a href="?server=localhost&amp;username=root&amp;db=felicia&amp;select=manpages" class='active select'>vypsat</a> <a href="?server=localhost&amp;username=root&amp;db=felicia&amp;table=manpages" title='Zobrazit strukturu'>manpages</a><br>
</div>
<script type="text/javascript">setupSubmitHighlight(document);</script>
