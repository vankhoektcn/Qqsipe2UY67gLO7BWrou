<?php

namespace App;
use App\Config;

class Common
{
	public static function stripUnicode($str){
		$unicode = array(
			'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
			'd'=>'đ',
			'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
			'i'=>'í|ì|ỉ|ĩ|ị',
			'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
			'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
			'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
			'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
			'D'=>'Đ',
			'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
			'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
		);
		
	   foreach($unicode as $nonUnicode=>$uni){
			$str = preg_replace("/($uni)/i", $nonUnicode, $str);
	   }
		return $str;
	}

	public static function createKeyURL($string){
		$string = Common::stripUnicode($string);
		
		$string = str_replace("/", "-", $string);
		$string = str_replace(" ", "-", $string); // Replaces all spaces with hyphens.
		$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
		$string = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
		return strtolower($string);
	}

	public function sendEmail($template, $data = [], $to, $toName, $subject, $cc = null, $bcc = null, $replyTo = null)
	{
		$result = false;
		try {
			$config = new Config;
			$messageHeader = [
				'from'	=> $config->getValueByKey('address_sender_mail'),
				'fromName'	=> $config->getValueByKey('display_name_send_mail'),
				'to'	=> $to,
				'toName'	=> $toName,
				'cc'	=> $cc,
				'bcc'	=> $bcc,
				'replyTo'	=> $replyTo,
				'subject'	=> $subject
			];

			\Mail::send($template, $data, function ($message) use ($messageHeader) {
				$message->from($messageHeader['from'], $messageHeader['fromName']);
				$message->to($messageHeader['to'], $messageHeader['toName']);
				if (!is_null($messageHeader['cc']))
					$message->cc($messageHeader['cc']);
				if (!is_null($messageHeader['bcc']))
					$message->bcc($messageHeader['bcc']);
				if (!is_null($messageHeader['replyTo']))
					$message->replyTo($messageHeader['replyTo']);
				$message->subject($messageHeader['subject']);
			});

			$result = true;
		} catch (Exception $e) {
			$result = [
				'success' => false,
				'message' => $e->getMessage()
			];
		}
		return \Response::json($result);
	}
}
