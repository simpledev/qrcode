<?php

class qrcode{

	const API_URL = 'https://chart.googleapis.com/chart?';

	private $data;

	public function save($size, $filename){

		$ch = curl_init();

		$options = array(
			CURLOPT_URL => self::API_URL,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => 'chs='.$size.'x'.$size.'&cht=qr&chl='.urlencode($this->data),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER => false,
			CURLOPT_TIMEOUT => 30
		);

		curl_setopt_array($ch, $options);
		$img = curl_exec($ch);
		curl_close($ch);

		if($img){
			$filename .= '.png';
			file_put_contents($filename, $img);
		}

	}

}

?>
