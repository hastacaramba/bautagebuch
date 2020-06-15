<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContactController extends Controller
{

    /**
     * Create a new contact instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function newContact(Request $request) {
        $contact = new Contact;

        $contact->firstname = $request->firstname;
        $contact->surname = $request->surname;
        $contact->company = $request->company;
        $contact->street = $request->street;
        $contact->housenumber = $request->housenumber;
        $contact->postcode = $request->postcode;
        $contact->city = $request->city;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->mobile = $request->mobile;
        $contact->fax = $request->fax;
        $contact->info = $request->info;

        $contact->save();
    }


    /**
     * Deletes a contact by id.
     *
     * @param $contactID
     * @return string
     */
    public function deleteContact($contactID) {
        $contact = Contact::where('id', '=', $contactID)->first();

        if ($contact != null) {
            $contact->delete();

            return "Contact successfully deleted.";
        }

        return "Contact was not found.";
    }


    /**
     * Update the contact with the given id.
     *
     * @param $contactID The id of the contact
     * @param  Request  $request
     * @return Response
     */
    public function updateContact(Request $request, $contactID) {
        $contact = Contact::where('id', '=', $contactID)->first();

        if ($contact != null) {
            $contact->firstname = $request->firstname;
            $contact->surname = $request->surname;
            $contact->company = $request->company;
            $contact->street = $request->street;
            $contact->housenumber = $request->housenumber;
            $contact->postcode = $request->postcode;
            $contact->city = $request->city;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->mobile = $request->mobile;
            $contact->fax = $request->fax;
            $contact->info = $request->info;

            $contact->save();
        }
    }


    /**
     * Returns all contacts in DB table contacts as json.
     *
     * @return mixed
     */
    public function contactsJson() {

        $contacts = Contact::all();

        return json_encode($contacts);
    }


    /**
     * Returns the project with the given id.
     *
     * @param $projectID
     * @return array|null
     */
    public function getContact($contactID) {
        $contact = Contact::where('id', '=', $contactID)->first();

        if ($contact == null) {
            return null;
        }

        $result = [
            'surname' => $contact->surname,
            'firstname' => $contact->firstame,
            'company' => $contact->company,
            'street' => $contact->street,
            'housenumber' => $contact->housenumber,
            'postcode' => $contact->postcode,
            'city' => $contact->city,
            'email' => $contact->email,
            'phone' => $contact->phone,
            'mobile' => $contact->mobile,
            'fax' => $contact->fax,
            'info' => $contact->info,
        ];

        /*
        return view('contact', [
            'surname' => $contact->surname,
            'firstname' => $contact->firstame,
            'company' => $contact->company,
            'street' => $contact->street,
            'housenumber' => $contact->housenumber,
            'postcode' => $contact->postcode,
            'city' => $contact->city,
            'email' => $contact->email,
            'phone' => $contact->phone,
            'mobile' => $contact->mobile,
            'fax' => $contact->fax,
            'info' => $contact->info,
        ]);
        */
    }


    /**
     * Get Contacts for select2.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getContactsSelect(Request $request) {

        $q = $request->get('q', null);

        $_type = $request->get('_type', null);

        //get contacts
        $contacts = Contact::all();

        $results = [];
        for ($i = 0; $i < sizeof($contacts); $i++) {
            $results[] =
                [
                    'id' => $contacts[$i]['id'],
                    'text' => $contacts[$i]['company'] . " - " . $contacts[$i]['surname'] . " " . $contacts[$i]['firstname']
                ];
        }

        $antwort = [
            'results' => $results
        ];

        $resultsGefiltert = [];
        if($q != null && $_type == 'query') {
            for ($i = 0; $i < sizeof($antwort['results']); $i++) {
                if (Str::contains($antwort['results'][$i]['text'], $q)) {
                    $resultsGefiltert[] = $antwort['results'][$i].strtolower();
                }
            }
            $antwort['results'] = $resultsGefiltert;
        }

        return response()->json($antwort,200);

    }

}
