<?php

class Pay_payoreo{
	
	public $dates = array(); //用于保存外部传进去的参数
	public $orderid = ""; //订单号
	public $money   = "";//订单价格
	public $title   = "";
	public $wxgid   = "";
	public $domain  = "";
	

	public function index()
	{
		$appid_array     = explode("-",$this->dates['su_pl_content_1']);
		$appsecret_array = explode("-",$this->dates['su_pl_content_2']);
		$rand_count = array_rand($appid_array,1);
		$appid      = $appid_array[$rand_count];
		$appsecret  = $appsecret_array[$rand_count];
		
		$return_url   = "http://".$this->domain."/group.php/index/successok/id/".$this->wxgid.".html";
		$notify_url   = "http://".$this->domain."/group.php/index/notify/orderid/".$this->orderid."/id/".$this->wxgid.".html";

        $array = [
            'pid'          => $appid,
            'type'         => "wxpay",
            'out_trade_no' => $this->orderid,//商户订单号
            'notify_url'   => $notify_url,
            'return_url'   => $return_url,
            'name'         => $this->title,
            'money'        => $this->money,
        ];
        
        require_once("EpayCore.class.php");
        
        $epay = new EpayCore($appid,$appsecret);
        $html_text = $epay->getPayLink($array);
        return ['status'=>1,'msg'=>$html_text];
        //echo $html_text;
       /* ksort($array);

        $url = $this->ToUrlParams($array);
        $sign = md5($url.$appsecret);
        $array['sign'] = $sign;

        $pay_url = $this->curl_post_ssl("https://pay.zzvvx.cn//submit.php",$array);
        //print_r($pay_url);
        //exit;
        $pay_url = trim($pay_url);
        $pay_url_array = explode("\n",$pay_url);
        
        $pay_url_array[0] = str_ireplace( "<script>window.location.href='", "",$pay_url_array[0]);
        $pay_url_array[0] = str_ireplace( ";</script>", "",$pay_url_array[0]);
        $pay_url_array[0] = str_ireplace( "'", "",$pay_url_array[0]);
        
        $pay_array = explode("./pay/",$pay_url_array[0]);
		return ['status'=>1,'msg'=>"https://pay.zzvvx.cn//pay/".$pay_array[1]];*/
		
	}
	
	
	public function ToUrlParams($data){
		$buff = "";
		foreach ($data as $k => $v)
		{
			if($k != "sign" && $v != "" && !is_array($v)){
				$buff .= $k . "=" . $v . "&";
			}
		}
		$buff = trim($buff, "&");
		return $buff;
	}
	
	
	protected function curl_post_ssl($url, $xmldata, $second=30,$aHeader=array()){
		$ch = curl_init();
		$curlVersion = curl_version();
		//$ua = "WXPaySDK/".self::$VERSION." (".PHP_OS.") PHP/".PHP_VERSION." CURL/".$curlVersion['version']." ".$config->GetMerchantId();

		//设置超时
		curl_setopt($ch, CURLOPT_TIMEOUT, $second);
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,TRUE);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,2);//严格校验
		//curl_setopt($ch,CURLOPT_USERAGENT, $ua); 
		//设置header
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		//要求结果为字符串且输出到屏幕上
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		//post提交方式
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xmldata);
		//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		//运行curl
		$data = curl_exec($ch);
		//返回结果
		if($data){
			curl_close($ch);
			return $data;
		} else { 
			$error = curl_errno($ch);
			curl_close($ch);
			return ("curl出错，错误码:$error");
		}
	}
	
}