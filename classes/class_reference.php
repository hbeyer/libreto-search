<?php

class reference {

    public $system;
    public $systemClean;
    public $nameSystem;
    public $id;
    public $url;
    public $link;

    function __construct($system, $id, $level = 'manifestation') {
        $this->id = $id;
        $this->system = $system;
        $this->systemClean = translateAnchor($system);
        $this->systemClean = strtolower(str_replace(' ', '', $this->systemClean));

        if ($level == 'manifestation')  {
            if (isset($this->bases[$this->systemClean])) {
                $this->nameSystem = $this->namessystems[$this->systemClean];
                $this->url = strtr($this->bases[$this->systemClean], array('{ID}' => $id));
                $this->link = '<a href="'.$this->url.'" title="Anzeige der Ausgabe in '.$this->namessystems[$this->systemClean].'" target="_blank">'.$this->namessystems[$this->systemClean].'</a>';
            }
        }
        elseif ($level == 'work')  {
            if (isset($this->basesworks[$this->systemClean])) {
                $this->nameSystem = $this->namessystems[$this->systemClean];
                $this->url = strtr($this->basesworks[$this->systemClean], array('{ID}' => $id));
                $this->link = '<a href="'.$this->url.'" title="Anzeige des Werks in '.$this->namessystems[$this->systemClean].'" target="_blank">'.$this->namessystems[$this->systemClean].'</a>';
            }
        }
    }

    //Bei den Indices werden Ä, Ö, Ü, ä, ö, ü und ß durch Umschrift (ae, oe, ue, ss) ersetzt, Leerzeichen entfernt und Groß- in Kleinbuchstaben konvertiert.

    private $bases = array(
	    'vd16' => 'http://gateway-bayern.de/VD16+{ID}', 
	    'vd17' => 'http://gso.gbv.de/DB=1.28/CMD?ACT=SRCHA&IKT=8002&TRM={ID}', 
	    'vd18' => 'https://gso.gbv.de/DB=1.65/CMD?ACT=SRCHA&IKT=8002&TRM=VD18+{ID}', 
	    'edit16' => 'http://edit16.iccu.sbn.it/scripts/iccu_ext.dll?fn=10&i={ID}',
	    'edit' => 'http://edit16.iccu.sbn.it/scripts/iccu_ext.dll?fn=10&i={ID}',
	    'estc' => 'http://estc.bl.uk/{ID}',
	    'ustc' => 'http://ustc.ac.uk/index.php/record/{ID}',
	    'swissbib' => 'https://www.swissbib.ch/Record/{ID}',
	    'gw' => 'http://gesamtkatalogderwiegendrucke.de/docs/GW{ID}.htm',
	    'istc' => 'http://data.cerl.org/istc/{ID}',
	    'rero' => 'http://data.rero.ch/01-{ID}/html?view=RERO_V1&lang=de',
	    'stcn' => 'http://picarta.pica.nl/DB=3.11/XMLPRS=Y/PPN?PPN={ID}',
	    'gbv' => 'http://gso.gbv.de/DB=2.1/PPNSET?PPN={ID}',
	    'ppn' => 'http://gso.gbv.de/DB=2.1/PPNSET?PPN={ID}',
	    'swb' => 'http://swb.bsz-bw.de/DB=2.1/PPNSET?PPN={ID}',
	    'parisbnf' => 'http://catalogue.bnf.fr/ark:/12148/cb{ID}/PUBLIC',
	    'loc' => 'https://lccn.loc.gov/{ID}',
	    'oenb' => 'http://data.onb.ac.at/rec/{ID}',
	    'inka' => 'http://www.inka.uni-tuebingen.de/?inka={ID}',
	    'bvb' => 'http://gateway-bayern.de/{ID}',
	    'bsb' => 'http://gateway-bayern.de/{ID}',
	    'hbz' => 'http://lobid.org/resource/{ID}',
	    'hebis' => 'http://orsprod.rz.uni-frankfurt.de/DB=2.1/PPNSET?PPN={ID}',
	    'londonbl' => 'http://explore.bl.uk/primo_library/libweb/action/display.do?doc={ID}',
	    'denhaagkb' => 'http://opc4.kb.nl/DB=1/PPNSET?PPN={ID}',
	    'kopenhagenkb' => 'http://rex.kb.dk/KGL:KGL:{ID}',
	    'copac' => 'http://copac.jisc.ac.uk/id/{ID}?style=html',
	    'sudoc' => 'http://www.sudoc.fr/{ID}',
	    'unicat' => 'http://www.unicat.be/uniCat?func=search&query=sysid:{ID}',
	    'sbn' => 'http://id.sbn.it/bid/{ID}',
	    'sbb' => 'http://stabikat.de/DB=1/PPNSET?PPN={ID}',
	    'dnb' => 'http://d-nb.info/{ID}',
	    'lbvoe' => 'http://lb1.dabis.org/PSI/redirect.psi&sessid=---&strsearch=IDU={ID}',
	    'ubantwerpen' => 'http://anet.be/record/opacuantwerpen/{ID}',
	    'ubgent' => 'http://lib.ugent.be/catalog/{ID}',
	    'josiah' => 'http://josiah.brown.edu/record={ID}',
	    'solo' => 'http://solo.bodleian.ox.ac.uk/OXVU1:oxfaleph{ID}',
	    'uul' => 'http://aleph.library.uu.nl/F?func=direct&doc_number={ID}',
	    'nebis' => 'http://opac.nebis.ch/F?func=direct&local_base=NEBIS&doc_number={ID}',
	    'buva' => 'http://permalink.opc.uva.nl/item/{ID}',
	    'manumed' => 'http://www.manuscripta-mediaevalia.de/dokumente/html/{ID}'
	    );

    private $basesworks = array(
	    'dnb' => 'http://d-nb.info/gnd/{ID}',
	    'gnd' => 'http://d-nb.info/gnd/{ID}',
	    'wikipedia' => 'https://de.wikipedia.org/wiki/{ID}'
    );

    private $namessystems = array(
	    'vd16' => 'Verzeichnis der im deutschen Sprachbereich erschienenen Drucke des 16. Jahrhunderts (VD 16)', 
	    'vd17' => 'Verzeichnis der im deutschen Sprachraum erschienenen Drucke des 17. Jahrhunderts (VD 17)', 
	    'vd18' => 'Verzeichnis Deutscher Drucke des 18. Jahrhunderts (VD 18)', 
	    'edit16' => 'EDIT16 Censimento nazionale delle edizioni italiane del XVI secolo',
	    'edit' => 'EDIT16 Censimento nazionale delle edizioni italiane del XVI secolo',
	    'estc' => 'English Short Title Catalogue',
	    'ustc' => 'Universal Short Title Catalogue (USTC)',
	    'swissbib' => 'Swissbib',
	    'gw' => 'Gesamtkatalog der Wiegendrucke',
	    'istc' => 'Incunabula Short Title Catalogue (ISTC)',
	    'rero' => 'réro - Westschweizer Bibliotheksverbund',
	    'stcn' => 'Short Title Catalogue Netherlands',
	    'gbv' => 'Gemeinsamer Bibliotheksverbund (GBV)',
	    'ppn' => 'Gemeinsamer Bibliotheksverbund (GBV)',
	    'swb' => 'Online-Katalog des Südwestdeutschen Bibliotheksverbundes (SWB)',
	    'parisbnf' => 'Bibliothèque nationale de France (BnF)',
	    'loc' => 'Library of Congress (LoC)',
	    'oenb' => 'Österreichische Nationalbibliothek (ÖNK)',
	    'inka' => 'Inkunabelkatalog INKA',
	    'bvb' => 'Bibliotheksverbund Bayern (BVB)',
	    'bsb' => 'Bibliotheksverbund Bayern (BVB)',
	    'hbz' => 'Hochschulbibliothekszentrum NRW (HBZ)',
	    'hebis' => 'Hessisches BibliotheksInformationsSystem (HeBIS)',
	    'londonbl' => 'British Library',
	    'denhaagkb' => 'Koninklijke Bibliotheek | Nationale bibliotheek van Nederland',
	    'kopenhagenkb' => 'Det Kongelige Bibliotek - København',
	    'copac' => 'Copac (Verbundkatalog Großbritannien)',
	    'sudoc' => 'Catalogue du Système Universitaire de Documentation (Sudoc)',
	    'unicat' => 'Union Catalogue of Belgian Libraries (UniCat)',
	    'sbn' => 'Catalogo del Servizio Bibliotecario Nazionale (OPAC SBN)',
	    'sbb' => 'Staatsbibliothek zu Berlin – Preußischer Kulturbesitz (StaBiKat)',
	    'dnb' => 'Deutsche Nationalbibliothek (DNB)',
	    'gnd' => 'Gemeinsame Normdatei (GND)',
	    'lbvoe' => 'Landesbibliothekenverbund Österreich / Südtirol',
	    'ubantwerpen' => 'Universiteit Antwerpen – Bibliotheek',
	    'ubgent' => 'Universiteitsbibliotheek Gent',
	    'josiah' => 'Classic Josiah Brown University Library Catalogue',
	    'solo' => 'Search Oxford Libraries Online',
	    'uul' => 'Universiteit Utrecht – Universiteitsbibliotheek',
	    'nebis' => 'Netzwerk von Bibliotheken und Informationsstellen in der Schweiz (NEBIS)',
	    'buva' => 'Bibliotheek van de Universiteit van Amsterdam – Catalogus',
	    'manumed' => 'Manuscripta Mediaevalia',
        'dnb' => 'Gemeinsame Normdatei (GND)',
        'wikipedia' => 'Wikipedia'
	    );

    private $patternsystems = array(
	    'vd16' => '~VD[ ]?16 ([A-Z][A-Z]? [0-9]{1,5})~', 
	    'vd17' => '~VD[ ]?17 ([0-9]{1,3}:[0-9]{1,7}[A-Z])~', 
	    'vd18' => '~VD ?18 ([0-9]{7,9})~',
	    'edit16' => '~EDIT ?[16]{0,2} [A-Z]{4} ?([0-9]{1,10})~',
	    'edit' => '~EDIT ?[A-Z]{4} ?([0-9]{1,10})~',
	    'estc' => '~ESTC ([A-Z][0-9]{4,8})~',
	    'ustc' => '~USTC ([0-9]{4,8})~',
	    'swissbib' => '~SWISSBIB ?([0-9]{6,10})~',
	    'gw' => '~GW[ ]?([^ ]+)~',
	    'istc' => '~GW[ ]?([^ ]+)~',
	    'rero' => '~RERO ([A-Z][0-9]{8-10})~',
	    'stcn' => '~STCN[ ]?([0-9]{8}[0-9X])~',
	    'gbv' => '~GBV ([0-9]{9})~',
	    'ppn' => '~PPN ([0-9]{9})~',
	    'swb' => '~SWB ([0-9]{9})~',
	    'parisbnf' => '~FRBNF ?([a-z]{1,2}[0-9]{7,10}[a-z])~',
	    'loc' => '~LoC ([0-9]{6,10})~',
	    'oenb' => '~ÖNB ?([A-Za-z]{2,3}[0-9]{5,10})~',
	    'inka' => '~INKA ?([0-9]{8})~',
	    'bvb' => '~BVB (BV[0-9]{9})~',
	    'hbz' => '~HBZ ([HT]T[0-9]{9})~',
	    'hebis' => '~HeBIS ([0-9]{7,10})~',
	    'londonbl' => '~BL (BLL[0-9]{11})~',
	    'denhaagkb' => '~Haag KB ([0-9]{9})~',
	    'kopenhagenkb' => '~Kopenhagen KB ([A-Z]{2,5}[0-9]{7,12})~',
	    'copac' => '~COPAC ([0-9]{1,8})~',
	    'sudoc' => '~SUDOC ([0-9]{8,10})~',
	    'unicat' => '~U[nN][iI]C[aA][tT] ([0-9]{7,9})~',
	    'sbn' => '~SBN ([A-Z0-9]{8,12})~',
	    'sbb' => '~SBB ([0-9]{9})~',
	    'dnb' => '~DNB ([0-9X-]{9,10})~',
	    'lbvoe' => '~LBVÖ ([A-Z0-9-]+)~',
	    'ubantwerpen' => '~Antwerpen ([a-z]:[a-z]{3}:[0-9]{7-9})~',
	    'ubgent' => '~Gent ([a-z]{3}[0-9]{2}:[0-9]{5,20})~',
	    'josiah' => '~JOSIAH ([a-z][0-9]{6,8})~',
	    'solo' => '~SOLO ([0-9]{8,10})~',
	    'uul' => '~UUL ([0-9]{8,10})~',
	    'nebis' => '~NEBIS ([0-9]{7,9})~',
	    'buva' => '~BUvA ([0-9]+)~',
	    'manumed' => '~ManuMed obj[0-9]{6,10},?T?~'
	    );

}

?>
