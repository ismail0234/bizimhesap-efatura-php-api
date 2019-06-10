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
