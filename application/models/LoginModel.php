<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
	public function login($username, $password)
	{
		$WebHRMS = $this->load->database('WebHRMS', TRUE);
		$query1 = $WebHRMS->query("SELECT  *
      FROM           dbo.View_GiftBallLogin
      WHERE        (username = '$username') AND (giftBallPassword = '$password')");

		if ($query1->num_rows() > 0) {
            $result = $query1->result_array();
			
			$this->session->set_flashdata('info', 'Welcome to 6S Audit System');
			redirect('Main');
		} else {
			$this->session->set_flashdata(
				'danger',
				'Your CardNo  OR Password is In Correct.'
			);
			redirect('loginController');
		}
	}
}
