<?php
namespace App\Http\Helper;
use Illuminate\Support\Facades\Session;
use DB;
use ResizeImage;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;

Class Common {

 	private $key_slug   = 0;
 	private $table_tree = "";
 	private $table_tree_select = "";

 	function slug($table,$colum,$name,$where = null){
        $record = DB::table($table);
        if($where != null) $record->where($where);
 		$record = $record->select($colum)->get();
 		$slug   = $this->gen_slug($name);
 		$arg_slug = array();
 		if(count($record) > 0){
 			foreach ($record as $key => $value) {$arg_slug[] = $value->{$colum};}
	 		$key_slug = $this->check_slug($slug,$arg_slug,$this->key_slug,$slug);
	 		if($key_slug != 0){$slug = $slug."-".$key_slug;}
 		}
        $this->key_slug = 0;
 		return $slug;
 	}


 	function check_slug($slug,$arg,$key_slug,$default){
 		if (in_array($slug,$arg) == true){
 			$this->key_slug++;
 			$this->check_slug($default."-".$this->key_slug,$arg,$this->key_slug,$default);
 		}
 		return $this->key_slug;
 	}


 	function gen_slug($str){
		$a = array("à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă","ằ", "ắ", "ặ", "ẳ", "ẵ", "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề" , "ế", "ệ", "ể", "ễ", "ì", "í", "ị", "ỉ", "ĩ", "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ" , "ờ", "ớ", "ợ", "ở", "ỡ", "ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ", "ỳ", "ý", "ỵ", "ỷ", "ỹ", "đ", "À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă" , "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ", "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ", "Ì", "Í", "Ị", "Ỉ", "Ĩ", "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ" , "Ờ", "Ớ", "Ợ", "Ở", "Ỡ", "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ", "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ", "Đ", " ","ö","ü"); 
        $b = array("a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a" , "a", "a", "a", "a", "a", "a", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "i", "i", "i", "i", "i", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o " , "o", "o", "o", "o", "o", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "y", "y", "y", "y", "y", "d", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A " , "A", "A", "A", "A", "A", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "I", "I", "I", "I", "I", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O " , "O", "O", "O", "O", "O", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "Y", "Y", "Y", "Y", "Y", "D", "-","o","u");
		return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/','/[ -]+/','/^-|-$/'),array('','-',''),str_replace($a,$b,$str)));
    }


    function gen_name($str){
        $a = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','Ð','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','?','?','J','j','K','k','L','l','L','l','L','l','?','?','L','l','N','n','N','n','N','n','?','O','o','O','o','O','o','Œ','œ','R','r','R','r','R','r','S','s','S','s','S','s','Š','š','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Ÿ','Z','z','Z','z','Ž','ž','?','ƒ','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','?','?','?','?','?','?');
        $b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o');
        return strtolower(preg_replace(array('/[^a-zA-Z0-9 -.]/','/[ -]+/','/^-|-$/'),array('','-',''),str_replace($a,$b,$str)));
    }

    // <<--phuc vụ upload file -->>
    // $filedata sttClass data file truyền vào
    // $path đường dẫn lưu file
    // $resize (nếu là file ảnh )có muốn resize hay không default false 
    // $important có muốn resize theo width hay không default true
    function UploadCustom( $filedata , $path = null , $resize = false , $important = true ){
        $data["success"] = "error";
        $w_lg = $w_md = $w_sm = $h_lg = $h_md = $h_sm = 0;
        if($important == true){
            $w_lg = 1200;
            $w_md = 700;
            $w_sm = 300;
        }else{
            $h_lg = 1200;
            $h_md = 700;
            $h_sm = 300;
        }
        // đường dẫn ảnh vào folder upload + $path.
        $upload_path = base_path()."/public/uploads/".$path;
        // tạo tên ảnh
        $name = $this->gen_name($filedata->getClientOriginalName());
        $type = $filedata->extension();
        $name = str_replace(".".$type,"",$name)."_".uniqid();
        $name_image = $name;
        // full name file.
        $name = $name.".".$type;
        if ( !is_dir($upload_path) ){mkdir($upload_path, 0755, TRUE);}
        $check = $filedata->move($upload_path, $name);
        if($check){
            $data["success"] = "success";
            $data["path"]    = "/uploads/".$path."/".$name;
            $data["path_lg"] = "";
            $data["path_md"] = "";
            $data["path_sm"] = "";
            $image_upload    = $upload_path."/".$name;
            $lg_path = $md_path = $sm_path = $data["path"];
            // step resize.
            if($resize){
                list($origWidth, $origHeight) = getimagesize($image_upload);
                if($origWidth > $w_lg){
                    // tạo anh lg.
                    $check_resize = "/uploads/".$path."/lg/".$this->resize_image($image_upload,$upload_path."/lg","lg-".$name,$w_lg,$h_lg);
                    if($check_resize != false){$lg_path = $check_resize;}   
                }
                if($origWidth > $w_md){
                    // tạo anh md.
                    $check_resize = "/uploads/".$path."/md/".$this->resize_image($image_upload,$upload_path."/md","md-".$name,$w_md,$h_md);
                    if($check_resize != false){$md_path = $check_resize;}
                }
                if($origWidth > $w_sm){
                    // tạo anh sm.
                    $check_resize = "/uploads/".$path."/sm/".$this->resize_image($image_upload,$upload_path."/sm","sm-".$name,$w_sm,$h_sm);
                    if($check_resize != false){$sm_path = $check_resize;}
                }
            }
            $data["path_lg"] = $lg_path;
            $data["path_md"] = $md_path;
            $data["path_sm"] = $sm_path;
            $data["name"]    = $name_image;      
        }
        return $data;
    }


    function resize_image($sourceImage,$foder,$newName,$maxWidth = 0,$maxHeight = 0,$quality = 100){
        if ( !is_dir($foder) ){mkdir($foder, 0755, TRUE);}
        list($origWidth, $origHeight,$image_type) = getimagesize($sourceImage);
        $image = true ;
        switch ($image_type)
        {
            case 1: $image = imagecreatefromgif($sourceImage);  break;
            case 2: $image = imagecreatefromjpeg($sourceImage); break;
            case 3: $image = imagecreatefrompng($sourceImage);  break;
            default: return false; break;
        }
        $newWidth  = 0;
        $newHeight = 0;
        $scell     = 0;
        if($maxWidth > $maxHeight){
            $scell     = $maxWidth/$origWidth;
            $newWidth  = $maxWidth;
            $newHeight = $origHeight * $scell;
        }else{
            $scell     = $maxHeight/$origHeight;
            $newHeight = $maxHeight;
            $newWidth  = $origWidth * $scell;
        }
        $newImage  = imagecreatetruecolor($newWidth,$newHeight);
        if(($image_type == 1) OR ($image_type == 3))
        {
            imagealphablending($newImage, false);
            imagesavealpha($newImage,true);
            $transparent = imagecolorallocatealpha($newImage, 255, 255, 255, 127);
            imagefilledrectangle($newImage, 0, 0, $newWidth,$newHeight, $transparent);
        }
        $pathSave  = $foder."/".$newName;
        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
        switch ($image_type)
        {
            case 1: imagegif($newImage,$pathSave); break;
            case 2: imagejpeg($newImage,$pathSave,$quality);  break; // best quality
            case 3: imagepng($newImage,$pathSave); break; // no compression
            default: return false; break;
        }
        imagedestroy($image);
        imagedestroy($newImage);
        return $newName;
    }
	
	static function round_number($value, $round) {
		return round($value, $round);
		/*
		switch (true) {
			case $value <= 99:
				$value = round($value,0);
				break;
			case $value <= 999:
				$value = round($value,-1);
				break;
			case $value <= 9999:
				$value = round($value,-2);
				break;
			case $value <= 99999:
				$value = round($value,-3);
				break;
			case $value >= 100000:
				$value = round($value,-4);
				break;
		}
		
		return $value;
		*/
	}

    static function web_setting($lang_id = 1){
        $where = array(
            'd.language_id' => $lang_id,
        );
        $setting = DB::table('settings as s')
            ->join('setting_descriptions as d', 's.id', '=', 'd.setting_id')
            ->where($where)
            ->select('s.*','d.setting_description')
            ->first();
        if(isset($setting->id) && $setting->id != null){
            return json_decode(@$setting->setting_description,true);
        }
        return null;
    }


    function addButton($role_id,$module,$url){
        $MODULE = \App\Http\Models\Role_Module::_validateRULE($role_id,$module,'add');
        if($MODULE){
            return '<a href="'.$url.'" class="btn btn-secondary" data-toggle="modal" data-target="#modal-add"><i class="menu-icon mdi mdi-plus"></i> New</a>';
        }
        else{
            return '';
        }
    }


    function exportButton($role_id,$module,$url){
        $MODULE = \App\Http\Models\Role_Module::_validateRULE($role_id,$module,'view');
        if($MODULE){
            return '<button type="button" class="btn btn-secondary"><i class="menu-icon mdi mdi-file-excel"></i> Export</button>';
        }
        else{
            return '';
        }
    }


    function send_mail($to,$slug,$data){
        $record = DB::table('emailtemplate as tbl1')
            ->join('emailtemplate_values as tbl2', 'tbl1.id', '=', 'tbl2.emailtemplate_id')
            ->where(['lang_id' => session('_LANG_ID'),'key_id' => $slug,'status' => 1])
            ->select('tbl2.*')
            ->first();
        if($record != null){
            $body    = $record->content;
            $subject = $record->title;
            if(isset($data['replace']) && $data['replace'] != null && isset($data['replace_with']) && $data['replace_with'] != null){
                $replace = $data['replace'];
                $replace_with = $data['replace_with'];
                $body    = str_replace($replace, $replace_with,$body);
                $subject = str_replace($replace, $replace_with,$subject);
            }
            //$backup = \Mail::getSwiftMailer();

            try{
                //https://accounts.google.com/DisplayUnlockCaptcha
                // Setup your gmail mailer
                //$transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, 'tls');
                //$transport->setUsername($email_sender);
                //$transport->setPassword($email_pass);
                // Any other mailer configuration stuff needed...
                //$gmail = new Swift_Mailer($transport);

                // Set the mailer as gmail
                //\Mail::setSwiftMailer($gmail);

                Mail::send([], [], function($message) use ($data,$to,$subject,$body){
                    //$message->from(@$from_email, @$from_email_fullname);
                    if(isset($data['bcc']) && $data['bcc'] != null){
                       $message->bcc($data['bcc']);
                    }
                    $message->to($to)->subject($subject)->setBody($body,'text/html');
                });
                
            }catch(Exception $e){
                $response = $e->getMessage() ;
            }
            // Restore your original mailer
            //Mail::setSwiftMailer($backup);
        }
    }
}