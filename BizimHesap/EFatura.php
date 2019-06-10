<?php 

include "HttpRequest.php";
include "EFaturaCreate.php";

Class EFatura
{

	protected $cloneInformations = array(
		'firmId'      => "",
		'invoiceNo'   => "",
		'invoiceType' => 3,
		'note'        => "",
		'dates'       => array(
			'invoiceDate'  => "",
			'dueDate'      => "",
			'deliveryDate' => "",
		),
		'customer'    => array(
			"customerId" => "",
			"title"      => "",
			"taxOffice"  => "",
			"taxNo"      => "",
			"email"      => "",
			"phone"      => "",
			"address"    => "",
		),
		'amounts'     => array(
			"currency" => "",
			"gross"    => "",
			"discount" => "",
			"net"      => "",
			"tax"      => "",
			"total"    => ""
		),
		'details'     => array()
	);

	protected $informations = array();

	/**
	 *
	 * @description EFatura ana bilgilerin ayarlandığı bölüm
	 * @note 
	 * @string Firma ID

	 */
	public function __construct($firmId)
	{
		
		$this->clearInformations();

		$this->informations["firmId"] = $firmId;

	}

	/**
	 *
	 * @description Fatura Numarası
	 * @note İsteğe Bağlı
	 * @string 
	 *
	 */
	public function setInvoiceNo($data)
	{

		$this->informations["invoiceNo"] = $data;

	}

	/**
	 *
	 * @description Fatura Türü
	 * @note İsteğe Bağlı Default olarak satış ayarlı
	 * @bool 
	 * 		true  => Alış
	 *		false => Satış	
	 */
	public function setInvoiceType($data)
	{

		$this->informations["invoiceType"] = $data === false ? 3 : 5; 

	}

	/**
	 *
	 * @description Fatura için açıklama
	 * @note İsteğe Bağlı
	 * @string 
	 *
	 */
	public function addNote($note)
	{

		$this->informations["note"] = $note;

	}

	/**
	 *
	 * @description Fatura tarihi
	 * @note Zorunlu
	 * @integer linux timestamp
	 *
	 */
	public function setInvoiceDate($date)
	{

		$this->informations["dates"]["invoiceDate"] = date('c', $date);

	}

	public function setDueDate($date)
	{

		$this->informations["dates"]["dueDate"] = date('c', $date);

	}

	/**
	 *
	 * @description Teslimat Tarihi
	 * @note İsteğe bağlı
	 * @integer linux timestamp
	 *
	 */
	public function setDeliveryDate($date)
	{

		$this->informations["dates"]["deliveryDate"] = date('c', $date);

	}

	/**
	 *
	 * @description Müşteri ID
	 * @note Zorunlu
	 * @integer
	 *
	 */	
	public function setCustomerId($data)
	{

		$this->informations["customer"]["customerId"] = $data;

	}
	
	/**
	 *
	 * @description Müşteri Tam Adı
	 * @note Zorunlu
	 * @string 
	 *
	 */
	public function setCustomerFullName($data)
	{

		$this->informations["customer"]["title"] = $data;

	}

	/**
	 *
	 * @description Müşteri Email Adresi
	 * @note İsteğe Bağlı
	 * @string 
	 *
	 */
	public function setCustomerEmail($data)
	{

		$this->informations["customer"]["email"] = $data;

	}

	/**
	 *
	 * @description Müşteri Telefon Numarası
	 * @note İsteğe Bağlı
	 * @string 
	 *
	 */
	public function setCustomerPhone($data)
	{

		$this->informations["customer"]["phone"] = $data;

	}

	/**
	 *
	 * @description Müşteri Adresi
	 * @note Zorunlu
	 * @string 
	 *
	 */
	public function setCustomerAddress($data)
	{

		$this->informations["customer"]["address"] = $data;

	}

	/**
	 *
	 * @description Müşteri Vergi Dairesi
	 * @note İsteğe Bağlı
	 * @string 
	 *
	 */
	public function setCustomerTaxOffice($data)
	{

		$this->informations["customer"]["taxOffice"] = $data;

	}

	/**
	 *
	 * @description Müşteri Vergi Numarası veya T.C Numarası
	 * @note İsteğe Bağlı
	 * @string 
	 *
	 */
	public function setCustomerTaxNo($data)
	{

		$this->informations["customer"]["taxNo"] = $data;

	}

	/**
	 *
	 * @description Ödeme Para Birimi
	 * @note Zorunlu
	 * @string 
	 *
	 */
	public function setAmountCurrency($data)
	{

		$this->informations["amounts"]["currency"] = $data;

	}

	/**
	 *
	 * @description Ödeme Brüt Tutarı
	 * @note  Zorunlu
	 * @double
	 *
	 */
	public function setAmountGross($data)
	{

		$this->informations["amounts"]["gross"] = (double)$data;

	}

	/**
	 *
	 * @description Ödeme İndirim Tutarı
	 * @note Zorunlu
	 * @double 
	 *
	 */
	public function setAmountDiscount($data)
	{

		$this->informations["amounts"]["discount"] = (double)$data;

	}

	/**
	 *
	 * @description Ödeme Net Tutarı
	 * @note Zorunlu
	 * @double 
	 *
	 */
	public function setAmountNet($data)
	{

		$this->informations["amounts"]["net"] = (double)$data;

	}

	/**
	 *
	 * @description Ödeme KDV Tutarı
	 * @note Zorunlu
	 * @double 
	 *
	 */
	public function setAmountTax($data)
	{

		$this->informations["amounts"]["tax"] = (double)$data;

	}

	/**
	 *
	 * @description Ödeme Toplam Son Tutar
	 * @note Zorunlu
	 * @double 
	 *
	 */
	public function setAmountTotal($data)
	{

		$this->informations["amounts"]["total"] = (double)$data;

	}

	/**
	 *
	 * @description Satın alınan ürün bilgileri
	 * @note Zorunlu
	 * @array 
	 *
	 */
	public function addProduct($data)
	{

		$producList = array();
		if (!isset($data[0])) {
			$productList[] = $data;
		}else{
			$productList = $data;
		}

		foreach ($productList as $product) {
			
			$cache = array(
				"productId"   => $product['Id'],
				"productName" => $product['name'],
				"note"        => isset($product['note']) ? $product['note'] : '',
				"barcode"     => isset($product['barcode']) ? $product['barcode'] : '',
				"taxRate"     => (double)$product['taxrate'],
				"quantity"    => intval($product['count']),
				"unitPrice"   => (double)$product['price'],
				"grossPrice"  => (double)$product['gross'],
				"discount"    => (double)$product['discount'],
				"net"         => (double)$product['net'],
				"tax"         => (double)$product['tax'],
				"total"       => (double)$product['total']
			);

			array_push($this->informations["details"], $cache);
		}

	}

	/**
	 *
	 * @description EFatura Oluşturma
	 * @note Fatura oluşturulduktan sonra bilgiler sıfırlanır
	 *
	 */
	public function sendInvoice()
	{

		$EFaturaCreate = new EFaturaCreate($this->informations);
		$this->clearInformations();
		return $EFaturaCreate->run();

	}

	/**
	 *
	 * @description Klonlanmış standart bilgileri ana bilgilere gönderme
	 *
	 */
	private function clearInformations()
	{

		$this->informations = $this->cloneInformations;

	}

}
