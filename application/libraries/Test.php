<?php
class Test{
    public function av()
    {
        $ci = &get_instance();
        $ci->load->helper('array');
        echo "this is a libary";
    }
}