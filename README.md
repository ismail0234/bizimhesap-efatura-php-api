# Bizimhesap PHP Api
bizimhesap.com Php ile yazılmış efatura oluşturmak için basit bir api

```php

require "BizimHesap/EFatura.php";

/* Firma ID numaranız - Zorunlu */
$efatura = new EFatura("485E114528794BE590B5F72403398765");


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
