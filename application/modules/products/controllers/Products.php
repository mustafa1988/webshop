<?php
class Products extends MY_Controller
{
	protected $models = array('product');

	PRIVATE $product_id;
	PRIVATE $product_data;
	function __construct()
	{
		parent::__construct();

		//KONTROLLERAR OCH HÄMTAR PRODUKTEN
		$this->product_id = $this->uri->segment(3);
		if( isset($this->product_id) AND !ctype_digit( $this->product_id ) ){
			show_error('Ogiltigt ID');
		}

		if (isset($this->product_id) AND $this->product_id) {
			$this->product_data = $this->product->get($this->product_id);

			if( !$this->product_data ){
				show_error('Ogiltigt ID');
			}
		} else {
			$this->product_data = $this->product->get_all();
		}
	}

	// VISA DATA I VIEW FILEN
	public  function index()
	{
		$this->data['product_data'] = $this->product_data;
	}

	//DENNA FUNKTIONEN SKAPAR OCH ÄNDRAR PRODUKT
	public  function create_update()
	{
		//OM DET FINNS SKCKAS DATA SOM FINNS SPARADE I DB FÖR PRODUKTEN TILL VIEW FILEN
		$this->data['product_id'] = $this->product_id;
		if ($this->product_id) {
			$this->data['product_data'] = $this->product_data;
		}

		if (isset($_POST) AND $_POST) {
			//VALIDERAR
			$this->form_validation
					->set_rules('in_name', 'Namn', 'required|trim')
					->set_rules('in_qty', 'Antal', 'required|trim|numeric')
					->set_rules('in_price', 'Pris', 'required|trim')
					->set_rules('in_weight', 'Vikt', 'trim')
					->set_rules('in_length', 'Längd', 'trim')
					->set_rules('in_width', 'Bredd', 'trim')
					->set_rules('in_height', 'Höjd', 'trim');

			if ( $this->form_validation->run() === TRUE )
			{
				//DATA SOM SPARAS TILL DB
				$data['name']               = $this->input->post('in_name');
				$data['quantity']          	= $this->input->post('in_qty');
				$data['price']              = $this->input->post('in_price');
				$data['weight'] 			= $this->input->post('in_weight');
				$data['length'] 			= $this->input->post('in_length');
				$data['width'] 				= $this->input->post('in_width');
				$data['height'] 			= $this->input->post('in_height');
				$data['image'] 				= 'https://www.redfeatherreleaf.com/wp-content/uploads/2019/08/test-product-not-for-sale-300x300.jpg';

				//OM PRODUKT ID FINNS SÅ GÖR DEN UPDATE
				if ($this->product_id) {
					if ( !$this->product->update($data, $this->product_id) )
					{
						$this->data['message'] 		= 'Något gick fel, kunde inte ändra produkten';
					}
				} else {
					// INSERT
					if (!$this->product->insert($data)) {
						$this->data['message'] 		= 'Något gick fel, kunde inte spara produkten';
					}
				}

				redirect('products');
			} else {
				//VALIDATION FAIL
				$error_msg      			= (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : ''));
				$this->data['message'] 		= $error_msg;
			}
		}
	}
}
