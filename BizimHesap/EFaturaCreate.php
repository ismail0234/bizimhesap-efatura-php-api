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
			throw new Exception("Lütfen Firma ID alanını boş bırakmayın.");
		}

		if (!isset($this->informations['invoiceType']) || empty($this->informations['invoiceType'])) {
			throw new Exception("Lütfen invoiceType alanını boş bırakmayın.");
		}

		if (!isset($this->informations['dates']['invoiceDate']) || empty($this->informations['dates']['invoiceDate'])) {
			throw new Exception("Lütfen invoiceDate alanını boş bırakmayın.");
		}	

		if (!isset($this->informations['dates']['deliveryDate']) || empty($this->informations['dates']['deliveryDate'])) {
			throw new Exception("Lütfen deliveryDate alanını boş bırakmayın.");
		}		

		if (!isset($this->informations['customer']['customerId']) || $this->informations['customer']['customerId'] <= 0) {
			throw new Exception("Lütfen Müşteri ID alanını boş bırakmayın.");
		}			

		if (!isset($this->informations['customer']['title']) || empty($this->informations['customer']['title'])) {
			throw new Exception("Lütfen Müşteri Adını boş bırakmayın.");
		}

		if (!isset($this->informations['customer']['address']) || empty($this->informations['customer']['address'])) {
			throw new Exception("Lütfen Müşteri Adresini boş bırakmayın.");
		}

		if (!isset($this->informations['amounts']['currency']) || empty($this->informations['amounts']['currency'])) {
			throw new Exception("Lütfen Para birimini boş bırakmayın.");
		}

		if (!isset($this->informations['amounts']['gross'])) {
			throw new Exception("Lütfen Brüt alanını boş bırakmayın.");
		}

		if (!isset($this->informations['amounts']['discount'])) {
			throw new Exception("Lütfen İndirim alanını boş bırakmayın.");
		}

		if (!isset($this->informations['amounts']['net'])) {
			throw new Exception("Lütfen Net Tutar alanını boş bırakmayın.");
		}

		if (!isset($this->informations['amounts']['tax'])) {
			throw new Exception("Lütfen KDV Tutarını boş bırakmayın.");
		}

		if (!isset($this->informations['amounts']['total'])) {
			throw new Exception("Lütfen Toplam Tutarı boş bırakmayın.");
		}

	}

	/**
	 *
	 * @description Fatura oluşturma fonksiyonunu çalıştırma
	 *
	 */
	public function run()
	{

		$this->check();

		return $this->sendRequest($this->invoiceUrl, array(
			'data' => $this->informations
		));

	}

}
