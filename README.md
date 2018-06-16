# EZSQL VERİTABANI SINIFI
EzSQL Wordpress gibi gelişmiş uygulamaların alt yapısını oluşturan PHP programlama dili ile yazılmış bir sınıftır(class).
Bu sınıfın basit anlamda işlevi veritabanına bağlanmak ve tablolardaki verileri yönetmek.
Mssql,Mysql,Oracle,Sybase,Postgresql,Sqlite veritabanlarında kullanılır. 
Wordpress tarafından kullanılmaktadır. 
# Neden EZSQL?
Yapımcısı Justin Vincent ise şöyle cevaplamış;

• PHP sistemlerinizde veritabanınızı hızlı ve kolay bir şekilde yönetmek. ( mySQL / Oracle8/9 / InterBase/FireBird / PostgreSQL / MS-SQL / SQLite / SQLite c++)

• Scriptinizin üstüne eklediğiniztek bir php dosyasından oluşur ve standart veritabanı fonksiyonlarını hızlı ve kolay birşekilde kullanmanızı sağlar.

• Sunucu ekstra yük bindirmemek için sorguları otomatik olarak önbelleğe alır ve kullanmanıza izin verir.

• Çok rahat bir şekilde sorgularınızı debug etme imkanı sunar.

• Çoğu ezSQL fonksiyonu Objects, Associative Arrays, veya Numerical Arrays olarak sonuç döndürür.

• Proje geliştirme sürenize katlı sağlar, kodlarınızı hızlandırır ve optimizasyon sağlar.

• Küçük bir sınıftır ve sisteminize yük bindirmez.

# KULLANIMI
1)	ezSQL sınıfının en son sürümünü buradan indirin

2)	Betiğinizin ana dizinine bir klasör oluşturun ve adını ezSQL yapın (Opsiyonel)

3)	İndirdiğiniz ezSQL klasörünün içindeki shared klasörüne girin ve ez_sql_core.php dosyasını 2. adımda oluşturduğunuz klasör içine atın.

4)	mySQL için ana dizinden mysql klasörüne girin ve içindeki ez_sql_mysql.php dosyasını 2.adımda oluşturduğunuz klasör içine atın.

5)	Bu iki dosyayı include ederek veritabanı bağlantınızı yapın (Aşağıdaki kodu inceleyin)


// ezSQL çekirdeğini dahil edin

include_once "ezSQL/ez_sql_core.php";

// mySQL istemcisi için dosyayı dahil edin

include_once "ezSQL/ez_sql_mysql.php";

// Veritabanı bağlantısını yapın

$db = new ezSQL_mysql('db_user','db_password','db_name','db_host');

# EZSQL FONKSİYONLARI
$db->get_results — birden fazla satırdan oluşan sonuç kümesi döndürür

$db->get_row — tek bir satır için sonuç kümesi getirir

$db->get_col — tek bir sutündaki değeri getirir

$db->get_var — tek bir satırdaki tek bir değeri getirir

$db->query — veritabanına sorgu gönderir (INSERT, UPDATE, DELETE vb işlemler için)

$db->debug — son sorguyu ve sonuç kümesini yazdırır

$db->vardump — sonucu ve yapısını yazdırır

$db->select — yeni bir veritabanı seçer

$db->get_col_info — sutünların bilgilerini getirir

$db->hide_errors — ezSQL hatalarını deaktif eder

$db->show_errors — ezSQL hatalarını aktif eder

$db->escape — Zararlı karakterleri temizler (addslashes gibi)

$db = new db — Yeni veritabanı nesnesi oluşturur.

# EZSQL DEĞİŞKENLERİ

$db->num_rows – Eğer varsa son sorgudaki dönen satır sayısını verir.

$db->insert_id –  INSERT sql sorgusu kullanıldığında oluşan AUTO_INCRIMENT değerini verir

$db->rows_affected – Son yapılan INSERT, UPDATE veya DELETE sql sorgularında etkilenen satır sayısını verir.

$db->num_queries – Scriptte çalıştırılan gerçek (önbellekte olmayan) sorgu sayısını verir.

$db->debug_all – Eğer true değer alırsa (Bknz: $db->debug_all = true;) Scriptteki TÜM sorguları ve TÜM sonuçları verir.

$db->cache_dir – Önbellekleme dosyalarının dizini.

$db->cache_queries – Sorgu sonuçlarını önbelleğe almayı sağlar (Bknz: mysql/disk_cache_example.php)

$db->cache_inserts – Girişleri önbelleğe alır (Bknz: mysql/disk_cache_example.php)

$db->use_disk_cache – Disk önbellek sistemini kullanmayı sağlar (Bknz: mysql/disk_cache_example.php)

$db->cache_timeout – Önbellek zaman aşım süresi (Bknz: mysql/disk_cache_example.php)

# $DB->QUERY

Veritabanına sorgu göndermeye yarar, genelde INSERT,DELETE,UPDATE gibi işlemler için kullanılır.

// Veritabanına yeni kayıt ekler

$db->query("INSERT  INTO uyeler (id,isim) VALUES (1,'PHP Dev')") ;

// Veritabanındaki kaydı günceller

$db->query("UPDATE uyeler SET isim= 'PHP Developer' WHERE id = 1") ;

# $DB->GET_VAR
// Ürünler tablosundaki toplam satır sayısını getirir

$adet = $db->get_var("SELECT COUNT(*) FROM tbl_urunler");


// 22 id'sine sahip ürünün fiyat bilgisini getirir

$fiyat = $db->get_var("SELECT fiyat FROM uyeler WHERE id=22");

# $DB->GET_ROW

//Üyenin adını ve mail adresini getir

$uye = $db->get_row("SELECT isim,email FROM tbl_uyeler WHERE id = 22") ;

// Gelen verileri yazdır

echo "$uye->isim isimli üyeye ait mail adresi: $uye->email";

# $DB->GET_RESULTS
```PHP
if ( $uyeler = $db->get_results("SELECT isim, mail FROM uyeler") )

{

	foreach ( $uyeler as $uye)
  
	{
      echo "$uye->isim- $uye->mail<br/>";
      
  }
  
}

else

{

	  echo "Üye bulunamadı.";
}
```































