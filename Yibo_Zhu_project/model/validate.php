<?php
class Validate {
    private $name;
    private $userid;
    private $gender;
    private $email ;
    private $password;
    private $c_password;
    
    private $first_name;
    private $last_name;


    //array to store error message
    private $fields = array();


    public function __construct($name,$userid,$gender,$email,$password, $c_password) {
        $this->name = $name;
        $this->userid = $userid;
        $this->gender = $gender;
        $this->email = $email;
        $this->password = $password;
        $this->c_password=$c_password;
    }
    
        // Validate a generic text field
    public function checkName() {
        $min = 1;
        $max = 25;
        $message = "";
        
        if(empty($this->name))
        {
            $message = $message."Name can't be empty. ";
        }
        else
        {
            $pieces = explode(" ", $this->name);
            if(count($pieces) < 2)
            {
                $message =$message. "Please enter first name and last name, using space to separate. ";
            }
            else if (count($pieces) > 2) 
            {
                $message =$message. "Please only enter first name and last name, using space to separate. ";
            }
            else
            {
                $first_name = $pieces[0];
                $last_name = $pieces[1];
                
                // Check field and set or clear error message
                if (empty($first_name)) {
                    $message =$message. 'First name is required. ';
                } else if (strlen($first_name) < $min) {
                    $message =$message. 'First name is too short. ';
                } else if(strlen($first_name) > $max) {
                    $message =$message. 'First name is too long. ';
                }

                if (empty($last_name)) {
                    $message =$message. 'Last name is required. ';
                } else if (strlen($last_name) < $min) {
                    $message =$message. 'Last name is too short. ';
                } else if(strlen($last_name) > $max) {
                    $message =$message. 'Last name is too long. ';
                }
            }
        }
        $this->fields["name"] = $message;
        if(empty($this->fields["name"]))
        {
            $this->first_name = $first_name;
            $this->last_name = $last_name;
        }
    }
    
    public function checkUserid()
    {
        $message = "";
        if (preg_match('/[\'^£$%&*()}.{@#~?><>,|=_+¬-]/', $this->userid))
        {
            $message = $message."User ID can't have special character. ";
        }
        $this->fields["userid"] = $message;
    }
    
    public function checkGender()
    {
        $message = "";
        $this->gender = strtoupper($this->gender);
        if($this->gender != 'F' && $this->gender != 'M')
        {
            $message = $message."Please only enter F for female, M for male. "; 
        }
        $this->fields["gender"] = $message;
    }
    
    public function checkEmail()
    {
        $message = "";
        // Split email address on @ sign and check parts
        $parts = explode('@', $this->email);
        if (count($parts) < 2) {
            $message = $message.'At sign required. ';
        }
        if (count($parts) > 2) {
            $message = $message.'Only one at sign allowed.';
        }
        $local = $parts[0];
        $domain = $parts[1];

        // Check lengths of local and domain parts
        if (strlen($local) > 24) {
            $message = $message.'Username part too long.';
        }
        if (strlen($domain) > 25) {
            $message = $message.'Domain name part too long.';
        }
        
        $this->fields["email"] = $message;
    }

    public function checkPassword()
    {
        $message = "";
        if($this->c_password != $this->password)
        {
            $message = $message."Two passwords don't match, please enter again! ";
        }
        $this->fields["password"] = $message;
    }
    
    public function getFields()
    {
        return $this->fields;
    }
    
    public function getFirstName()
    {
        return $this->first_name;
    }
    
    public function getLastName()
    {
        return $this->last_name;
    }
}
?>