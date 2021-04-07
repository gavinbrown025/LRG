<?php 

// Check if all feilds required are existing
function checkAllFields($data, $required) {
  $failedInputs = [];
  // Go through all needed fields and check if it exists
  foreach ($required as $item) {
    if (!array_key_exists($item, $data)) {
      array_push($failedInputs, $item);
    }
  }

  return $failedInputs;
}

// Gets an array of all required fields for type of request
function getRequiredFields($type) {
  switch ($type) {
    case 'Junior Mentorship':
      return [
        'preamble',
        'lastname',
        'firstname',
        'birthdate',
        'email',
        'cellphone',
        'address',
        'hockey',
        'division',
        'work',
        'reference',
        'freelance',
        'acknowledgment'
      ];
      break;
    case 'TheMemberForm':
      return [
        'lastname',
        'firstname',
        'birthdate',
        'email',
        'cellphone',
        'address',
        'message'
      ];
      break;
    default:
      return [
        'name',
        'email',
        'message'
      ];
      break;
  }
}

// creates email message based on template from type of contact request
function getEmailMessage($data) {
  $type = $data["subject"];

  switch ($type) {
    case 'juniorform':
      $juniorTemplate = "
      Contact Request,

      Request Type: %s
      
      Preamble Terms Accepted: %s
      Lastname: %s
      Firstname: %s
      Birthday: %s
      Email: %s
      Cellphone: %s
      Address: %s
      
      Are They Currently Playing Organized Hockey in Ontario?
      %s

      If Yes - Association and Division?
      %s

      Employed Currently?
      %s

      References
      %s

      Agree to not being an employee?
      %s

      Terms and Conditions accepted:
      %s
  
      ";
      return vsprintf($juniorTemplate, $data);

    case 'memberform':
      $memberTemplate = "
      Contact Request,

      Request Type: %s
      
      Lastname: %s
      Firstname: %s
      Birthday: %s
      Email: %s
      Cellphone: %s
      Address: %s
      
      HCOP Level? Years of Experience? Referee Association?:
      %s
  
      ";
      return vsprintf($memberTemplate, $data);
    default:
      $generalTemplate = "
        Contact Request,

        Request Type: %s
        
        Name:
        %s

        Email:
        %s

        Message: 
        %s
    
      ";
      return vsprintf($generalTemplate, $data);
      break;
    }

  
}