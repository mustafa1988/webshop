<?php
class Cart extends MY_Controller
{
	protected $models = array('product', 'order', 'order_row' );

	PRIVATE $product_id;
	PRIVATE $product_data;
	function __construct(){
		parent::__construct();

	    // KONTROLLERAR PRODUCT INFORMATION SOM KOMMER ANVÄNDAS I HELA CONTROLLEN
		$this->product_id = $this->input->post('in_product_id');
		if( isset($this->product_id) AND !ctype_digit( $this->product_id ) ){
			show_error('Ogiltigt ID');
		}

		//KONTROLLERAR OM PRODUKTEN FINNS IDATABASEN
		if (isset($this->product_id) AND $this->product_id) {
			$this->product_data = $this->product->get($this->product_id);

			if( !$this->product_data ){
				show_error('Ogiltigt ID');
			}
		}
	}

	//HÄR KONTROLLERAS SESSIONEN OCH SKICKAR TILL VIEW FILEN FÖR LOOPA DÄR OCH VISA KUNDVAGNEN
	function index(){
		if (isset($_SESSION['cart'])) {
			$this->data['cart'] = $_SESSION['cart'];
		}
	}

	//LÄGGER PRODUKTER TILL KUNDVAGNEN
	function add_to_cart(){

		//OM DET ÄR GILLTIG FÖRFRÅGA
		if( isset($_POST) AND $_POST ){

			if( !ctype_digit($this->input->post('in_qty')) ){
				redirect('products');
			}

			//MAN MÅSTE POSTA MINST 1 QTY
			if( $this->input->post('in_qty') < 1 ){
				redirect('products');
			}

			// DET MÅSTE FINNAS PRODUKTER SOM RÄCKER
			if( $this->input->post('in_qty') > $this->product_data->quantity ){
				redirect('products');
			}

			// BYGGER SESSIONEN
			$_SESSION['cart'][$this->product_id]['product_name'] 	= $this->product_data->name;
			$_SESSION['cart'][$this->product_id]['price'] 			= $this->product_data->price;
			$_SESSION['cart'][$this->product_id]['product_id'] 		= $this->product_id;
			$_SESSION['cart'][$this->product_id]['qty'] 			= $this->input->post('in_qty');
			$_SESSION['cart'][$this->product_id]['total'] 			= $this->input->post('in_qty') * $this->product_data->price;
			redirect('cart');
		} else {
			// Ogiltigt förfråga
			redirect('products');
		}

	}

	//SLUTFÖR BESTÄLLNINGEN
	public function add_order()
	{

		if( isset($_POST) AND $_POST ){

			//VALIDERAR
			$this->form_validation
					->set_rules('in_payment_firstname', 'Förnamn', 'required|trim')
					->set_rules('in_payment_lastname', 'Efternamn', 'required|trim')
					->set_rules('in_payment_address_1', 'Adress', 'required|trim')
					->set_rules('in_payment_postcode', 'Postnummer', 'required|trim')
					->set_rules('in_payment_city', 'Ort', 'required|trim');


			//OM SESSIONEN FINNS SÅ KONTROLLERAR MAN OM PRODUKTEN FINNS OCH OM DET FINNS PRODUKTER SOM RÄCKER
			if (isset($_SESSION['cart'])) {
				foreach ($_SESSION['cart'] as $cart) {
					$product = $this->product->get($cart['product_id']);
					if (!$product) {
						$this->data['message'] = 'Produkten finns inte';
						$this->session->set_flashdata('message', $this->data['message']);
						redirect('cart/index', 'refresh');
					}

					if ($cart['qty'] > $product->quantity) {
						$this->data['message'] = 'Produkten '.$product->name.' finns inte i lagret';
						$this->session->set_flashdata('message', $this->data['message']);
						redirect('cart/index', 'refresh');
					}
				}
			}

			if ( $this->form_validation->run() === TRUE )
			{
				//DATA SOM KOMMER SPARAS I ORDER TABELLEN
				$data['payment_firstname']     	= $this->input->post('in_payment_firstname');
				$data['payment_lastname']      	= $this->input->post('in_payment_lastname');
				$data['payment_address_1']     	= $this->input->post('in_payment_address_1');
				$data['payment_postcode'] 		= $this->input->post('in_payment_postcode');
				$data['payment_city'] 			= $this->input->post('in_payment_city');

				if (!$this->order->insert($data)) {
					$this->data['message'] 		= 'Något gick fel, kunde inte spara ordern';
					$this->session->set_flashdata('message', $this->data['message']);
					redirect('cart/index', 'refresh');
				}
				$order_id = $this->db->insert_id();

				//LOOPAR SESSIONEN FÖR ATT SPARA I ORDER_ROWS TABELLEN
				foreach ($_SESSION['cart']  as  $cart) {
					$order_rows 				= array();
					$order_rows['order_id'] 	= $order_id;
					$order_rows['product_id'] 	= $cart['product_id'];
					$order_rows['qty'] 			= $cart['qty'];
					$order_rows['price'] 		= $cart['price'];

					//HÄMTAR PRODUKTER
					$product = $this->product->get($cart['product_id']);
					$qty = $product->quantity - $cart['qty'];

					//UPPDATERA PRODUKTER MED DEN NYA quantity
					if ( !$this->product->update(array('quantity' => $qty), $cart['product_id']) ){
						$this->data['message'] 		= 'Något gick fel';
						$this->session->set_flashdata('message', $this->data['message']);
						redirect('cart/index', 'refresh');
					}

					//SPARAR I ORDER ROWS
					if (!$this->order_row->insert($order_rows)) {
						$this->data['message'] 		= 'Något gick fel';
						$this->session->set_flashdata('message', $this->data['message']);
						redirect('cart/index', 'refresh');
					}

				}
				unset($_SESSION['cart']);
				$this->data['message'] = 'Din order är nu sparad';
				$this->session->set_flashdata('message_success', $this->data['message']);
				redirect('cart/index', 'refresh');
			} else {
				//VALIDATION FAIL
				$error_msg      			= (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : ''));
				$this->session->set_flashdata('message', $error_msg);
				redirect('cart/index', 'refresh');
			}
		}

	}

	//MAN KAN RADERA EN RAD FRÅN KUNDVAGNEN
	public function delete_cart($product_id)
	{
		unset($_SESSION['cart'][$product_id]);
		redirect('cart');
	}
}
