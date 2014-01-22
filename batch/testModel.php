<?php
define('SF_ROOT_DIR',    realpath(dirname(__FILE__).'/..'));
define('SF_APP',         'depan');
define('SF_ENVIRONMENT', 'dev');
define('SF_DEBUG',       true);

//komentar

require_once(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');

sfContext::getInstance()->getDatabaseManager()->initialize();//

//echo "Buat data mhs baru ... "; 

//$jur=JurusanPeer::retrieveByPK(1);
//$mhs=new Mahasiswa();
//$mhs->setNama('Budi Wijaya');
//$mhs->setJurusan($jur);
//$mhs->save();
//echo "done\n";


$c=new Criteria();
$c->add(MataKuliahPeer::SKS,3);
$mk=MataKuliahPeer::doSelectOne($c);
if ($mk) {
    echo "Mata kuliah SKS 3 adalah : ".$mk->getNama();
} else {
    echo "Tidak ada MK dengan SKS 3";
}
echo "  done\n";

//tampilkan semua mahasiswa informatika
$c=new Criteria();
//$c->clear();
$c->add(MahasiswaPeer::JURUSAN_ID,1);
$murids = MahasiswaPeer::doSelect($c); //dapat array of object
echo "Mahasiswa IF adalah : ";
foreach($murids as $murid) {
    echo $murid->getNama().",";
}

echo "  done\n";




$c=new Criteria();
$c->add(MataKuliahPeer::SKS,3,Criteria::LESS_THAN );
$mk=MataKuliahPeer::doSelectOne($c);
if ($mk) {
    echo "Mata kuliah SKS 3 adalah : ".$mk->getNama();
} else {
    echo "Tidak ada MK dengan SKS 3";
}
echo "  done\n";