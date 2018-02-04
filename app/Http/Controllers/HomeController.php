<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactMessageRequest;

use App\Carousel;
use App\Message;
use App\ResponseBuilder;

use Mail;
use Setting;

class HomeController extends Controller
{
  public function getHome()
  {
    return view('home');
  }

  public function getCarousel() {
    $images = Carousel::select("image","title","description")->get();
    foreach ($images as &$image) {
      $image->image = "public/carousel/$image->image";
    }
    return $images;
  }
  public function sendContact(ContactMessageRequest $request) {
    $contact = new Message();
    $contact->name = $request->input("name"," ");
    $contact->email = $request->input("email"," ");
    $contact->message = $request->input("message"," ");
    $contact->save();
    $to_email = Setting::get('contact-email');
    if(strlen($to_email)) {
      Mail::send('mails.contactmessage', compact('contact'), function($message) use($to_email)  {
        $message->subject("[kccemsr.edu.in] New message received.");
        if(strpos(env('MAIL_USERNAME'), "@"))$message->from(env('MAIL_USERNAME'), 'kccemsr.edu.in');
        $message->to($to_email);
      });
    }
    return ResponseBuilder::send(true, "Your message was send successfully!", "");
  }
}
