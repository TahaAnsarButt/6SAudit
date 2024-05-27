<?php 

function json($data, $status=200)
{
    $CI =& get_instance();
    return $CI->output
		->set_content_type('application/json')
		->set_status_header($status)
		->set_output(json_encode($data));
}

function format($date, $format = "d/m/Y"){
	$date=date_create($date);
	echo date_format($date,$format);
}

function get_date_format($date, $format = "d/m/Y"){
	$date=date_create($date);
	return date_format($date,$format);
}


function check_login(){
	$CI =& get_instance();

	if(!$CI->session->has_userdata('user')){
		redirect('login');
	}
}

function check_hod(){
	$CI =& get_instance();

	if(!$CI->session->has_userdata('user')){
		redirect('login');
	}else{
		$hod = $CI->session->userdata("user")->IS_HOD;

		if(!$hod){
			redirect("apply");
		}
	}
}

function check_payrol(){
	$CI =& get_instance();

	if(!$CI->session->has_userdata('user')){
		redirect('login');
	}else{
		return $CI->session->userdata("user")->Payrol == 1;
	}
}

function check_hr(){
	$CI =& get_instance();

	if(!$CI->session->has_userdata('user')){
		redirect('login');
	}else{
		return $CI->session->userdata("user")->HRAdmin == 1;
	}
}

function check_it(){
	$CI =& get_instance();

	if(!$CI->session->has_userdata('user')){
		redirect('login');
	}else{
		return $CI->session->userdata("user")->ITAdmin == 1;
	}
}

function get_day_type_html($FullDay)
{
	if($FullDay){
		return "<span class='badge'>Full Day</span>";
	}
	else{
		return "<span class='badge text-danger'>Half Day</span>";
	}
}

function leave_head_status($leave)
{
	$html = "<span class='badge badge-";
	if($leave->Verified){
		$html .= "success'>Verified by PayRoll";
	}elseif($leave->ApprovedBy && !$leave->Verified){
		$html .= "warning'>Approved";
	}else{
		$html .= "secondary'>Pending";
	}
	 $html .= "</span>";
	 return $html;
}
function hr_rejection($leave)
{
	$html = "<span class='badge badge-";
	
		$html .= "danger'>Rejected  by HR";

	 $html .= "</span>";
	 return $html;
}
function payroll_infom($leave)
{
	$html = "<span class='badge badge-";
	
		$html .= "success'>Contact to HR ";

	 $html .= "</span>";
	 return $html;
}

function get_leave_type_html($leave)
{
	$html = "<span class='badge badge-";
	switch ($leave) {
		case 'Casual':
			$html .=  "secondary";
			break;
		case 'Sick':
			$html .=  "warning";
			break;
		case 'Annual':
			$html .=  "info";
			break;
		case 'Factory Duty':
			$html .=  "danger";
			break;
		case 'M1':
		case 'M2':
			$html .=  "success";
			break;
		case 'Special':
			$html .=  "primary";
			break;
		default:
			$html .=  "secondary";
			break;
	}

	$html .= "'>$leave</span>";

	return $html;
}

?>