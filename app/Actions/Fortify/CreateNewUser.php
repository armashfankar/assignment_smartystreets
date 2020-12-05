<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\Event;
use App\Events\WelcomeMail;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array input
     * 
     * @return \App\Models\User
    */
    public function create(array $input)
    {
        // validate incoming data
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'phone' =>  ['required', "regex:/^\d{3}-\d{3}-\d{4}$/"],
            'street_address' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'zip' => ['required', "regex:/^\d{5}$/"]
        ])->validate();

        // fetch county name from US Street Address API 
        $county_name = $this->getCountyName($input['street_address'],$input['city'],$input['state']);
    
        // create user account 
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phone' => $input['phone'],
            'street_address' => $input['street_address'],
            'city' => $input['city'],
            'state' => $input['state'],
            'zip' => $input['zip'],
            'county_name' => $county_name
        ]);
        
        /* trigger event and dispatch welcome email to 
        the newly registered user */
        Event::dispatch(new WelcomeMail($user->id));

        return $user;
    }

    /**
     * Fetch county name using smartystreets US Street Address API.
     *
     * @param string street_address
     * @param string city
     * @param string state
     * 
     * @return string county_name
    */
    public function getCountyName($street_address,$city,$state)
    {
        // inititalize curl
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://us-street.api.smartystreets.com/street-address?auth-id=".env('SMARTYSTREETS_AUTH_ID')."&auth-token=".env("SMARTYSTREETS_AUTH_TOKEN")."&street=".urlencode($street_address)."&city=".urlencode($city)."&state=".urlencode($state)."&candidates=10",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $api_response = json_decode($response, true);
        $county_name = Null;
        
        // if verify address has response in array
        if(is_array($api_response) && count($api_response) > 0){
            $county_name = $api_response[0]['metadata']['county_name'];
        }

        return $county_name;
    }
}
