<?php 
add_action( 'wp_ajax_request_message', 'request_message_callback' );
add_action( 'wp_ajax_nopriv_request_message', 'request_message_callback' );

function request_message_callback () {
	//Получение email-адрес указанного на странице контактов
    	$contacts = get_option('contacts'); // это массив
    	$from_email = $contacts['email'];
    if(!isset($from_email) && empty ($from_email)) {
        wp_send_json(['status' => false, 'message' => __('The e-mail address for the mail is not specified','svkupe-domain')]);
    }
	if(!check_ajax_referer('mail_ajax_nonce','nonce', false)){
			wp_send_json(['status' => false, 'message' => __('Error. Try again later..','svkupe-domain')]);
		}
		
	//Формируем корректные данные для почтовых сообщений
	$id_form = (isset($_POST['id_form']) && !empty($_POST['id_form'])) ? $_POST['id_form'] : '';
	if(isset($_POST) && !empty($_POST)) {
		$data = changes_data_for_send_email(delete_meta_data($_POST), $id_form);
	}

	//Заголовок сообщения
	$title = 'Запрос с сайта';

	if(isset($data['Email']) && !empty($data['Email'])) {
		$headers = array(
	        	'From: Me Myself <me@example.net>',
	        	'content-type: text/html',
	        	'reply-to:'.$data['Email'],
            );
	}else {
		$headers = array(
	        	'From: Me Myself <me@example.net>',
	        	'content-type: text/html',
            );
	}
    
    		 $body = "<!DOCTYPE html>"; // создаем тело письма
             $body .= "<html><head>"; // структуру я минимизирую, шаблонов в сети много, либо создайте свой
             $body .= "<meta charset='UTF-8' />";
             $body .= "<title>".$title."</title>";
             $body .= "</head><body>";
             $body .= "<table><tr><td>";
             $body .= "<table style='width:600px; border-spacing: 10px; border: 1px solid silver; padding: 10px; font-size:20px;'><tr><td>";
             $body .= "<tr style='height: 150px;'><td valign='top' style='padding:0' bgcolor='#ffffff'>
                <a href='#'>
                        <img src='http://p29820n8.beget.tech/loft/img/email-header-loft.jpg' alt='' border='0' style='display: block; border-radius: 4px;' />
                </a>
                </td></tr>";
             $body .= "<tr><td ><h3 style='text-align:center; border-bottom: 1px solid silver; color:#d61c22;'>".$title."</h3></td></tr>";
             
             $i =0;
             foreach ($data as $key=>$value) {
                 $body .= "<tr><td><strong>".++$i.")</strong> ".$key ." -> " .nl2br($value)."</td></tr>";
             }

             $body .= "<tr><td></td></tr>";
             $body .= "<tr style='cellpadding: 10px;'><td style='text-align:center; border-top: 1px solid silver;'><em>All rights reserved | Copyright &copy; Atlas&Comp ".date("d-m-Y")."</em></td></tr>";
             $body .= "</table></td></tr></table>";
             $body .= "</body></html>";

	

	if(wp_mail($from_email, $title,  $body, $headers)){
			wp_send_json(['status' => true, 'message' => __('The message is sent. Please Wait','svkupe-domain')]);
	}else {
			wp_send_json(['status' => true, 'message' => __('Error','svkupe-domain')]);
	};
}

function delete_meta_data (array $arr) {
					unset($arr['nonce']);
					unset($arr['action']);
					unset($arr['id_form']);
				return $arr;
}

function changes_data_for_send_email (array $arr, $id_form) {
	//Получить данные для формирования правильного вывода для почтовых сообщений
		if(is_file(DIR_THEMES."/includes/parse-data-for-mail.json")) {
				if($config = file_get_contents(DIR_THEMES."/includes/parse-data-for-mail.json")) {
				$option = json_decode($config, true);
				foreach ($option as $value) {
					if ($id_form === $value['id']) {
						foreach ($value['fields'] as $key => $value) {
							$result[$value] = $arr[$key];
						}
					}
				}
				if(isset($result) && !empty($result)) {
						return $result;
				}else 
					{
						return $arr;
					}		
			}else {
				return $arr;
			};
		}else {
				return $arr;

		}
}