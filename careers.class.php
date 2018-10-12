<?php
ob_start();
class careers{
	public function __construct ($conn){
		$this->conn = $conn;
	}
	
	function careers_data($id,$kkk=NULL){
		$sql = "SELECT * FROM careers WHERE id='".$id."'";		
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$rows = $stmt->fetch();
		$html = '';
		
		if($kkk==NULL):
			$todaysdate = date("Y-m-d");
			$ip = $_SERVER['REMOTE_ADDR'];
			
			$html .= 'You have received an enquiry from '.$rows['first_name'].'. The details of the enquiry is shown below: <br />';
			$html .='<strong>Enquiry Date:</strong> '.$todaysdate.'</font> <br />';
			$html .='<strong>IP Address:</strong>'.$ip.'<br />';			
			$html .='-----------------------------------------------------------------------------------<br /><br />';
		endif;
		
		$html .= '<h2>Personal Information</h2>';
		$html .= '<p>';
		$html .= '<strong>Name:</strong> '.$rows['first_name'].' '.$rows['middle_name'].' '.$rows['last_name'].'<br />';
		$html .= '<strong>Gender:</strong> '.$rows['gender'].' <br />';
		$html .= '<strong>Date of Birth(DOB):</strong> '.$rows['dob'].' <br />';
		$html .= '<strong>Permanent Address:</strong> '.$rows['p_address'].' <br />';
		$html .= '<strong>District:</strong> '.$rows['district'].' <br />';
		$html .= '<strong>Current Address:</strong> '.$rows['c_address'].' <br />';
		$html .= '<strong>Marital Status:</strong> '.$rows['marital_status'].' <br />';
		$html .= '<strong>Contact Number:</strong> '.$rows['contact_number'].' <br />';
		$html .= '<strong>Mobile Number:</strong> '.$rows['mobile_number'].' <br />';
		$html .= '<strong>Email:</strong> '.$rows['email'].' <br />';
		$html .= '<strong>Contact Person:</strong> '.$rows['contact_person'].' <br />';
		$html .= '<strong>Contact Person\'s Number:</strong> '.$rows['contact_person_num'].' <br />';
		$html .= '<strong>Country:</strong> '.$rows['country'].' <br />';
		$html .= '<strong>Nationality:</strong> '.$rows['nationality'].' <br />';
		$html .= '<strong>Citizenship No.:</strong> '.$rows['citizen_no'].' <br />';
		$html .= '</p>';
		
		$edu_sql = "SELECT * FROM careers_edu WHERE career_id='".$id."'";
		$edu_stmt = $this->conn->prepare($edu_sql);
		$edu_stmt->execute();
		
		$html .= '<br /><br /><h2>Education Details</h2>';
		while($edu_rows = $edu_stmt->fetch()):			
			$html .='<p>';
			$html .= '<strong>Academic Level: </strong>'.$edu_rows['academic_level'].'<br />';
			$html .= '<strong>Board/University: </strong>'.$edu_rows['univ'].'<br />';
			$html .= '<strong>School/College: </strong>'.$edu_rows['school'].'<br />';
			$html .= '<strong>Degree Title: </strong>'.$edu_rows['degree_title'].'<br />';
			$html .= '<strong>Division: </strong>'.$edu_rows['division'].'<br />';
			$html .= '<strong>Percentage/CGPA: </strong>'.$edu_rows['percentage'].'<br />';
			$html .= '<strong>Passed Year: </strong>'.$edu_rows['year'].'<br />';
			$html .= '<strong>Degree Status: </strong>'.$edu_rows['degree_status'].'<br />';
		endwhile;
		
		$xtra_sql = "SELECT * FROM careers_extra WHERE career_id='".$id."'";//echo $xtra_sql;
		$xtra_stmt = $this->conn->prepare($xtra_sql);
		$xtra_stmt->execute();
		$xtra_rows = $xtra_stmt->fetch();
		$html .= '<br /><br /><h2>Short Term Courses / Professional Trainings</h2>';
		$html .= '<p>'.$xtra_rows['train_name'].'</p>';
		
		$html .= '<br /><br /><h2>Skills and Competencies</h2>';
		$html .= '<p><strong>Language Skills: </strong> '.$xtra_rows['lang_skills'].'</p>';
		$html .= '<p><strong>IT Skills : </strong> '.$xtra_rows['it_skills'].'</p>';
		$html .= '<p><strong>Other Skills : </strong> '.$xtra_rows['other_skills'].'</p>';
		$html .='</p>';
		
		$exp_sql = "SELECT * FROM careers_exp WHERE career_id='".$id."'";
		$exp_stmt = $this->conn->prepare($exp_sql);
		$exp_stmt->execute();
		
		$html .= '<br /><br /><h2>Work Experience</h2>';
		while($exp_rows = $exp_stmt->fetch()):			
			$html .='<p>';
			$html .= '<strong>Organization: </strong>'.$exp_rows['organization'].'<br />';
			$html .= '<strong>Position: </strong>'.$exp_rows['position'].'<br />';
			$html .= '<strong>Department: </strong>'.$exp_rows['department'].'<br />';
			$html .= '<strong>From (Date): </strong>'.$exp_rows['exp_from'].'<br />';
			$html .= '<strong>To (Date): </strong>'.$exp_rows['exp_to'].'<br />';
			$html .='</p>';
		endwhile;
		
		$pref_sql = "SELECT * FROM careers_pref WHERE career_id='".$id."'";
		$pref_stmt = $this->conn->prepare($pref_sql);
		$pref_stmt->execute();
		$pref_rows = $pref_stmt->fetch();
				
		$html .= '<br /><br /><h2>Preferences</h2>';
		$html .= '<p>';
		$html .= '<strong>Applied Posts: </strong> '.$pref_rows['app_post'].'<br />';
		$html .= '<strong>Vacancy Code: </strong> '.$pref_rows['vacancy_code'].'<br />';
		$html .= '<p><strong>Expected Salary: </strong> '.$pref_rows['exp_salary'].'<br />';
		$html .= '<p><strong>Preferred Location: </strong> '.$pref_rows['pref_location'].'<br />';
		$html .= '<p><strong>Driving License: </strong> '.$pref_rows['dr_licensce'].'<br />';
		$html .='</p>';
		$html .='<p><strong>Cover Letter</strong><br />'.$pref_rows['cover_letter'].'</p>';
		
		$refe_sql = "SELECT * FROM careers_refe WHERE career_id='".$id."'";
		$refe_stmt = $this->conn->prepare($refe_sql);
		$refe_stmt->execute();
		
		$html .= '<br /><br /><h2>References</h2>';
		while($refe_rows = $refe_stmt->fetch()):			
			$html .='<p>';
			$html .= '<strong>Referee: </strong>'.$refe_rows['ref_post'].'<br />';
			$html .= '<strong>Post: </strong>'.$refe_rows['ref_post'].'<br />';
			$html .= '<strong>Organization: </strong>'.$refe_rows['ref_org'].'<br />';
			$html .= '<strong>Address: </strong>'.$refe_rows['ref_address'].'<br />';
			$html .= '<strong>Email: </strong>'.$refe_rows['ref_email'].'<br />';
			$html .= '<strong>Telephone: </strong>'.$refe_rows['ref_phone'].'<br />';
			$html .='</p>';
		endwhile;	
		
		if($kkk==NULL):
			return $html;			
		else:
			require_once("dompdf/dompdf_config.inc.php");
			$dompdf = new DOMPDF();
			$dompdf->load_html($html);
			$dompdf->render();
			$output = $dompdf->output();
			file_put_contents('uploads/career/'.$id.'.pdf', $output);
		endif;
		
	}
	
	function additional_files($id){
		$addd_sql = "SELECT files FROM careers_additional WHERE career_id='".$id."'";
		$pref_stmt = $this->conn->prepare($addd_sql);
		$pref_stmt->execute();
		while($rows=$pref_stmt->fetch()){
			$files[] = "uploads/career/".$rows['files'];
		}
		return implode(',',$files);
	}
}

?>