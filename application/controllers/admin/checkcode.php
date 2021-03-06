<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 验证码
 * User: Durban
 * Date: 14-9-24
 * Time: 上午10:43
 */
class Checkcode extends CI_Controller{
    var $_height = 60;
    var $_width = 150;
    var $_code = array();
    var $_fontcolor = array();
    var $_im = null;

    public function __construct(){
        parent::__construct();

        $this->_height = 60;
        $this->_width = 150;
        $this->_code = $this->gdCode(6, 1);
        $this->savecode();
    }

    public function index(){
        $this->display();
    }

    /**
     * @param $num
     * @param $type
     * @return array
     */
    private function gdCode($num, $type){
        $numeral = '23456789';
        $string = 'ABCEFGHMNPRSTUVWXY';
        //1:num 2:str 4:both
        $randstr = $type & 1 ? $numeral : ($type & 2 ? $string : $numeral . $string);
        $randlen = strlen($randstr) - 1;
        mt_srand();
        $returnstr = array();
        while ($num--) {
            $returnstr[] = strtolower($randstr[rand(0, $randlen)]);
        }
        return $returnstr;
    }

    private function gdBackGround() {
        static $bgdata = array();
        $this->_im = imagecreatetruecolor($this->_width, $this->_height);
        if (empty($bgdata) && function_exists('imagecopymerge') && function_exists('imagecreatefromjpeg')) {
            $bgroot = './static/images/checkcode/';
            $handle = @opendir($bgroot);
            if ($handle) {
                while (($file = readdir($handle)) !== FALSE) {
                    if (preg_match('~^[a-z0-9]+?\.jpg$~i', $file)) {// && isImg($bgroot.$file))
                        $bgdata[] = $file;
                    }
                }
                closedir($handle);
            }
        }
        if ($bgdata) {
            $bgim = imagecreatefromjpeg($bgroot . $bgdata[rand(0, count($bgdata) - 1)]);
            imagecopymerge($this->_im, $bgim, 0, 0, rand(0, 200 - $this->_width), rand(0, 80 - $this->_height), $this->_width, $this->_height, 100);
            imagedestroy($bgim);
        } else {
            $i = 0;
            $colordata = $stepdata = array();
            while ($i < 3) {
                $colordata[$i] = rand(200, 255);
                $stepdata[$i] = (rand(100, 200) - $colordata[$i]) / $this->_width;
                $i++;
            }
            for ($i = 0; $i < $this->_width; $i++) {
                imageline($this->_im, $i, 0, $i, $this->_height, imagecolorallocate($this->_im, $colordata[0], $colordata[1], $colordata[2]));
                $colordata[0] += $stepdata[0];
                $colordata[1] += $stepdata[1];
                $colordata[2] += $stepdata[2];
            }
            $colordata[0] -= 50;
            $colordata[1] -= 50;
            $colordata[2] -= 50;
            $this->_fontcolor = $colordata;
        }
    }

    private function getColor() {
        if ($this->_fontcolor) {
            $color = imagecolorallocate($this->_im, $this->_fontcolor[0], $this->_fontcolor[1], $this->_fontcolor[2]);
        } else {
            static $color = null;
            if (!isset($color)) {
                $c = imagecolorsforindex($this->_im, imagecolorat($this->_im, 1, 1));
                $color = imagecolorallocate($this->_im, 255 - $c['red'], 255 - $c['green'], 255 - $c['blue']);
            }
        }
        return $color;
    }

    private function ttfText() {
        static $ttfdata = array();
        if (!function_exists('imagettftext'))
            return '';

        $ttfroot = './static/images/font/';

        if (empty($ttfdata)) {
            $handle = @opendir($ttfroot);
            if ($handle) {
                while (($file = readdir($handle)) !== FALSE) {
                    if (preg_match('~^[a-z0-9]+?\.ttf$~i', $file)) {
                        $ttfdata[] = $file;
                    }
                }
                closedir($handle);
            }
        }

        $width = floor($this->_width / count($this->_code));
        $size = $this->_height / 2;

        foreach ($this->_code as $k => $v) {
            $angle = rand(-30, 30);
            $color = $this->getColor();
            $fontfile = $ttfroot . $ttfdata[rand(0, count($ttfdata) - 1)];
            $box = $this->_imagettfbbox($size, $angle, $fontfile, $v);

            $offset = $k * $width;
            if (($offset + $box[0] / 2) < $offset + $width - $box[0]) {
                $x = rand($offset + $box[0] / 2, $offset + $width - $box[0]);
            } else {
                $x = rand($offset + $width - $box[0], $offset + $box[0] / 2);
            }
            if ($box[1] < $this->_height - $box[1] / 2) {
                $y = rand($box[1], $this->_height - $box[1] / 2);
            } else {
                $y = rand($this->_height - $box[1] / 2, $box[1]);
            }
            imagettftext($this->_im, $size, $angle, $x, $y, $color, $fontfile, $v);
        }
    }

    private function _imagettfbbox($size, $angle, $fontfile, $text) {
        $im = imagecreatetruecolor(1, 1);
        $box = imagettftext($im, $size, $angle, 0, 0, 0, $fontfile, $text);

        $x = abs(max($box[2], $box[4])) + abs(min($box[0], $box[6]));
        $y = abs(max($box[7], $box[5])) + abs(min($box[1], $box[3]));

        imagedestroy($im);

        return array($x, $y);
    }

    private function disturb() {
        $count = count($this->_code);
        for ($i = 0; $i < $count; $i++) {
            $color = imagecolorallocate($this->_im, rand(0, 255), rand(0, 255), rand(0, 255));
            $x = rand(0, $this->_width);
            $y = rand(0, $this->_height);
            rand(0, 1) ? imagearc($this->_im, $x, $y, rand(0, $this->_width), rand(0, $this->_height), rand(0, 360), rand(0, 360), $color) : imageline($this->_im, $x, $y, rand(0, $this->_width), rand(0, $this->_height), $color);
        }
    }

    private function getBMP($ckcode, $num) {
        $color = array(
            0 => chr(0) . chr(0) . chr(0),
            1 => chr(255) . chr(255) . chr(255),
        );
        $numbers = array(
            0 => '1110000111110111101111011110111101001011110100101111010010111101001011110111101111011110111110000111',
            1 => '1111011111110001111111110111111111011111111101111111110111111111011111111101111111110111111100000111',
            2 => '1110000111110111101111011110111111111011111111011111111011111111011111111011111111011110111100000011',
            3 => '1110000111110111101111011110111111110111111100111111111101111111111011110111101111011110111110000111',
            4 => '1111101111111110111111110011111110101111110110111111011011111100000011111110111111111011111111000011',
            5 => '1100000011110111111111011111111101000111110011101111111110111111111011110111101111011110111110000111',
            6 => '1111000111111011101111011111111101111111110100011111001110111101111011110111101111011110111110000111',
            7 => '1100000011110111011111011101111111101111111110111111110111111111011111111101111111110111111111011111',
            8 => '1110000111110111101111011110111101111011111000011111101101111101111011110111101111011110111110000111',
            9 => '1110001111110111011111011110111101111011110111001111100010111111111011111111101111011101111110001111'
        );
        $code = '';
        $code .= chr(66) . chr(77) . chr(230) . chr(4) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(54) . chr(0) . chr(0) . chr(0) . chr(40) . chr(0) . chr(0) . chr(0) . chr(40) . chr(0) . chr(0) . chr(0) . chr(10) . chr(0) . chr(0) . chr(0) . chr(1) . chr(0);
        $code .= chr(24) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(176) . chr(4) . chr(0) . chr(0) . chr(18) . chr(11) . chr(0) . chr(0) . chr(18) . chr(11) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0);

        for ($i = 9; $i >= 0; $i--) {
            for ($j = 0; $j < $num; $j++) {
                for ($k = 1; $k <= 10; $k++) {
                    if (rand(0, 7) < 1) {
                        $code .= $color[rand(0, 1)];
                    } else {
                        $code .= $color[substr($numbers[$ckcode[$j]], $i * 10 + $k, 1)];
                    }
                }
            }
        }
        return $code;
    }

    private function display() {
        $gdfunctions = array('imagecreatetruecolor', 'imagecolorallocate', 'imagestring', 'imagepng', 'imagesetpixel', 'imagefilledrectangle', 'imagerectangle');
        $unablegd = false;
        foreach ($gdfunctions as $v) {
            if (!function_exists($v)) {
                $unablegd = FALSE;
                break;
            }
        }
        if ($unablegd) {
            header('ContentType: image/bmp');
            echo $this->getBMP(implode('', $this->_code), count($this->_code));
        } else {
            header('ContentType: image/png');
            $this->gdBackGround();
            $this->ttfText();
            $this->disturb();
            imagepng($this->_im);
            imagedestroy($this->_im);
        }
    }

    private function savecode() {
        $timestamp = time();
        $this->session->set_userdata('lk_ckcode',$timestamp . "\t" . md5(implode('', $this->_code) . $timestamp));
    }
}