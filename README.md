# Bizimhesap Efatura PHP Api
bizimhesap.com Efatura Php ile yazılmış efatura oluşturmak için basit bir api

```php

require "BizimHesap/EFatura.php";

$efatura = new EFatura();

/**
 *
 * @description Firma ID numaranız
 * @note Zorunlu
 * @string 
 *
 */
$efatura->setFirmId( "485E114528794BE590B5F72403398765" ); 


```

### Fatura Genel Bilgileri

```php

/**
 *
 * @description Fatura Numarası
 * @note İsteğe Bağlı
 * @string 
 *
 */
$efatura->setInvoiceNo('FATURA-NO');

/**
 *
 * @description Fatura için açıklama
 * @note İsteğe Bağlı
 * @string 
 *
 */
 $efatura->addNote('NOT Alanı');


```

### Fatura Tarih Bilgileri

```php

/**
 *
 * @description Fatura tarihi
 * @note Zorunlu
 * @integer linux timestamp
 *
 */
$efatura->setInvoiceDate(time());

/* Zorunlu */
$efatura->setDueDate(time());

/**
 *
 * @description Teslimat Tarihi
 * @note İsteğe bağlı
 * @integer linux timestamp
 *
 */
$efatura->setDeliveryDate(time());


```

### Müşteri Bilgileri

```php

/**
 *
 * @description Müşteri ID
 * @note Zorunlu
 * @integer
 *
 */	
$efatura->setCustomerId(10001);

/**
 *
 * @description Müşteri Tam Adı
 * @note Zorunlu
 * @string 
 *
 */
$efatura->setCustomerFullName("İsmail Satilmiş");

/**
 *
 * @description Müşteri Email Adresi
 * @note İsteğe Bağlı
 * @string 
 *
 */
$efatura->setCustomerEmail("ismaiil_0234@hotmail.com");

/**
 *
 * @description Müşteri Telefon Numarası
 * @note İsteğe Bağlı
 * @string 
 *
 */
$efatura->setCustomerPhone("05320000001");
 
/**
 *
 * @description Müşteri Adresi
 * @note Zorunlu
 * @string 
 *
 */ 
$efatura->setCustomerAddress("Örnek Mah. Deneme sok No1/2 İstanbul");

/**
 *
 * @description Müşteri Vergi Dairesi
 * @note İsteğe Bağlı
 * @string 
 *
 */
$efatura->setCustomerTaxOffice("Vergi Dairesi");

/**
 *
 * @description Müşteri Vergi Numarası veya T.C Numarası
 * @note İsteğe Bağlı
 * @string 
 *
 */
$efatura->setCustomerTaxNo("Vergi No veya TC No");


```

### Fatura Ödeme Bilgileri

```php

/**
 *
 * @description Ödeme Para Birimi
 * @note Zorunlu
 * @string 
 *
 */
$efatura->setAmountCurrency('TL');

/**
 *
 * @description Ödeme Brüt Tutarı
 * @note  Zorunlu
 * @double
 *
 */
$efatura->setAmountGross(2400.00); 

/**
 *
 * @description Ödeme İndirim Tutarı
 * @note Zorunlu
 * @double 
 *
 */
$efatura->setAmountDiscount(0.00);

/**
 *
 * @description Ödeme Net Tutarı
 * @note Zorunlu
 * @double 
 *
 */
$efatura->setAmountNet(2400.00);

/**
 *
 * @description Ödeme KDV Tutarı
 * @note Zorunlu
 * @double 
 *
 */
$efatura->setAmountTax(432.00);

/**
 *
 * @description Ödeme Toplam Son Tutar
 * @note Zorunlu
 * @double 
 *
 */
$efatura->setAmountTotal(2832.00);


```

### Ürün Ekleme

```php

$product = array(
  // Ürünün ID Numarası
  "Id"       => 13372,
  // Ürünün Adı
  "name"     => "deneme ürünü",
  // Ürün ile ilgili Notlar
  "note"     => "36 beden",
  // Ürün Barkod Numarası
  "barcode"  => "8690123456789",
  // Ürün KDV Oranı
  "taxrate"  => 18.00,
  // Ürün satın alınan adet
  "count"    => 2,
  // Ürün fiyatı (KDVsiz)
  "price"    => 1200.00,
  // Ürün Brüt Fiyatı
  "gross"    => 2400.00,
  // Ürün İndirim Tutarı
  "discount" => 0.00,
  // Ürün Net Tutar
  "net"      => 2400.00,
  // Ürün KDV Tutarı
  "tax"      => 432.00,
  // Ürün Toplam Tutar
  "total"    => 2400.00
);

$efatura->addProduct($product);

```

### Sonuç

```php

require "BizimHesap/EFatura.php";

$efatura = new EFatura("");

/**
 *
 * Firma ID numaranız
 *
 */
$efatura->seFirmId("485E114528794BE590B5F72403398765");

/**
 *
 * Fatura Numarası
 *
 */
$efatura->setInvoiceNo('FATURA-NO');

/**
 *
 * Fatura İçin Not Alanı
 *
 */
$efatura->addNote('NOT Alanı');

/**
 *
 * Fatura Tarih Bilgileri
 *
 */
$efatura->setInvoiceDate(time());
$efatura->setDueDate(time());
$efatura->setDeliveryDate(time());

/**
 *
 * Müşteri Bilgileri
 *
 */
$efatura->setCustomerId(10001);
$efatura->setCustomerFullName("İsmail Satilmiş");
$efatura->setCustomerEmail("ismaiil_0234@hotmail.com");
$efatura->setCustomerPhone("05320000001");
$efatura->setCustomerAddress("Örnek Mah. Deneme sok No1/2 İstanbul");
$efatura->setCustomerTaxOffice("Vergi Dairesi");
$efatura->setCustomerTaxNo("Vergi No veya TC No");

/**
 *
 * Ödeme Tutar Bilgileri
 *
 */
$efatura->setAmountCurrency('TL');
$efatura->setAmountGross(2400.00); 
$efatura->setAmountDiscount(0.00);
$efatura->setAmountNet(2400.00);
$efatura->setAmountTax(432.00);
$efatura->setAmountTotal(2832.00);

/**
 *
 * Fatura için Ürün Bilgileri
 *
 */
$efatura->addProduct(array(
	"Id"       => 13372,
	"name"     => "deneme ürünü",
	"note"     => "36 beden",
	"barcode"  => "8690123456789",
	"taxrate"  => 18.00,
	"count"    => 2,
	"price"    => 1200.00,
	"gross"    => 2400.00,
	"discount" => 0.00,
	"net"      => 2400.00,
	"tax"      => 432.00,
	"total"    => 2400.00
));

/**
 *
 * EFatura Oluşturma
 *
 */

try {
	
	$response = $efatura->sendInvoice();
	if ($response['error']) {
		echo 'Başarısız: ' . $response['error'];
	}else{

		echo 'Başarılı';
		echo "<pre>";
		print_r( $response );
		echo "</pre>";
		exit;

	}

} catch (Exception $e) {
	
	echo "Başarısız:<br><br>";
	echo $e->getMessage();

}

```
