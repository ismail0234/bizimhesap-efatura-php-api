<?php 

Class EFaturaCreate extends HttpRequest
{

	private $informations = array();

	private $invoiceUrl = 'https://bizimhesap.com/api/b2b/addinvoice';

	public function __construct($informations)
	{
		
		$this->informations = $informations;

	}

	/**
	 *
	 * @description EFatura oluşturmak için gerekli alanları kontrolü 
	 *
	 */
	public function check()
	{	

		if (!isset($this->informations['firmId']) || empty($this->informations['firmId'])) {
			return array("error" => true, "msg" => "Lütfen Firma ID alanını boş bırakmayın.");
		}

		if (!isset($this->informations['invoiceType']) || empty($this->informations['invoiceType'])) {
			return array("error" => true, "msg" => "Lütfen invoiceType alanını boş bırakmayın.");
		}

		if (!isset($this->informations['dates']['invoiceDate']) || empty($this->informations['dates']['invoiceDate'])) {
			return array("error" => true, "msg" => "Lütfen invoiceDate alanını boş bırakmayın.");
		}	

		if (!isset($this->informations['dates']['dueDate']) || empty($this->informations['dates']['dueDate'])) {
			return array("error" => true, "msg" => "Lütfen dueDate alanını boş bırakmayın.");
		}		

		if (!isset($this->informations['customer']['customerId']) || $this->informations['customer']['customerId'] <= 0) {
			return array("error" => true, "msg" => "Lütfen Müşteri ID alanını boş bırakmayın.");
		}			

		if (!isset($this->informations['customer']['title']) || empty($this->informations['customer']['title'])) {
			return array("error" => true, "msg" => "Lütfen Müşteri Adını boş bırakmayın.");
		}

		if (!isset($this->informations['customer']['address']) || empty($this->informations['customer']['address'])) {
			return array("error" => true, "msg" => "Lütfen Müşteri Adresini boş bırakmayın.");
		}

		if (!isset($this->informations['amounts']['currency']) || empty($this->informations['amounts']['currency'])) {
			return array("error" => true, "msg" => "Lütfen Para birimini boş bırakmayın.");
		}

		if (!isset($this->informations['amounts']['gross'])) {
			return array("error" => true, "msg" => "Lütfen Brüt alanını boş bırakmayın.");
		}

		if (!isset($this->informations['amounts']['discount'])) {
			return array("error" => true, "msg" => "Lütfen İndirim alanını boş bırakmayın.");
		}

		if (!isset($this->informations['amounts']['net'])) {
			return array("error" => true, "msg" => "Lütfen Net Tutar alanını boş bırakmayın.");
		}

		if (!isset($this->informations['amounts']['tax'])) {
			return array("error" => true, "msg" => "Lütfen KDV Tutarını boş bırakmayın.");
		}

		if (!isset($this->informations['amounts']['total'])) {
			return array("error" => true, "msg" => "Lütfen Toplam Tutarı boş bırakmayın.");
		}

		return array("error" => false);
	}

	/**
	 *
	 * @description Fatura oluşturma fonksiyonunu çalıştırma
	 *
	 */
	public function run()
	{

		$check = $this->check();
		if ($check['error']) {
			return $check;
		}

		return $this->sendRequest($this->invoiceUrl, array(
			'data' => $this->informations
		));

	}

}
