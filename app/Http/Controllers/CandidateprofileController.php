<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EducationalDetail;
use App\Models\ExperienceDetails;
use App\Models\PersonalDetails;
use App\Models\LoginData;
use Illuminate\Support\Facades\Session;
class CandidateprofileController extends Controller 
{
    public function editProfile()
    {
      
    
        return view('edit_profile'); 
    }

    public function editsubmit(Request $request)
{
   
    
    $validated = $request->all();
    
    $certificates = [];
    if ($request->hasFile('certificate')) {
        foreach ($request->file('certificate') as $certificateFile) {
            $path = $certificateFile->store('certificates', 'public');
            $certificates[] = $path; 
        }
    }

   
    $experienceCertificates = [];
    if ($request->hasFile('experience_certificate')) {
        foreach ($request->file('experience_certificate') as $experienceFile) {
            $path = $experienceFile->store('experience_certificates', 'public');
            $experienceCertificates[] = $path; 
        }
    }
   


    
  
    $uid = Session::get('uid');




        $personalDetails = PersonalDetails::updateOrCreate(
        ['uid' => $uid],
        [
        
            'type_of_duty' => $request->input('type_of_duty'),
            'additional_contact_no' => $request->input('additional_contact_no'),
          
            'permanent_address' => $request->input('permanent_address'),
            'permanent_state' => $request->input('permanent_state'),
            'permanent_district' => $request->input('permanent_district'),
            'permanent_city' => $request->input('permanent_city'),
            'permanent_pincode' => $request->input('permanent_pincode'),
            'current_address' => $request->input('current_address'),
            'current_state' => $request->input('current_state'),
            'current_district' => $request->input('current_district'),
            'current_city' => $request->input('current_city'),
            'current_pincode' => $request->input('current_pincode'),
            'employee_id' => $request->input('employee_id'),
        ]
    );

    $courses = $request->input('course');
    $specializations = $request->input('specialization', []);
    $registrationNumbers = $request->input('Registration_number');
    $colleges = $request->input('college');
    $passoutYears = $request->input('Passout_year');

  
    $filteredSpecializations = array_filter($specializations);

   
    $specializationToSave = !empty($filteredSpecializations) ? json_encode($filteredSpecializations) : null;
   
    EducationalDetail::updateOrCreate(
        ['uid' => $uid],
        [
            'course' => json_encode($courses),
            'specialization' => json_encode($filteredSpecializations), 
            'registration_number' => json_encode($registrationNumbers),
            'college' => json_encode($colleges),
            'passout_year' => json_encode($passoutYears),
            'certificate' => json_encode($certificates),
        ]
    );

   
    ExperienceDetails::updateOrCreate(
        ['uid' => $uid],
        [
            'organization' => json_encode($request->input('organization')),
            'duration' => json_encode($request->input('duration')),
            'duration_type' => json_encode($request->input('duration_type')),
            'description' => json_encode($request->input('description')),
            'experience_certificate' => json_encode($experienceCertificates),
        ]
    );

    return redirect()->route('candidate.dashboard')->with('message', 'Profile updated successfully!');
}

}