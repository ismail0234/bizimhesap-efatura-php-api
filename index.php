<?php

include "BizimHesap/EFatura.php";

$efatura = new EFatura();

/**
 *
 * @description Firma ID numaranız
 * @note Zorunlu
 * @string 
 *
 */
$efatura->setFirmId( "485E114528794BE590B5F72403398765" ); 

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
	"total"    => 2832.00
));

/**
 *
 * EFatura Oluşturma
 *
 */


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

?>
