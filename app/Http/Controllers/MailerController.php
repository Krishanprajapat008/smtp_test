<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\smtpRecord;
use Illuminate\Support\Facades\DB;
use Hash;

class MailerController extends Controller
{
    public function email()
    {
        return view("email");
    }

    public function composeEmail(Request $request)
    {
        //SMTP information validation

        $validation = $request->validate([
                'site_name' => 'required',
                'smtp_driver' => 'required',
                'smtp_host' => 'required',
                'smtp_port' => 'required|integer',
                'username' => 'required',
                'smtp_password' => 'required',
                'from_name' => 'required',
                'smtpEncryption' => 'required',
                'from_email' => 'required'
        ]);

        $mailrecord = new smtpRecord();

        $mailrecord-> Site_Name = $request->site_name;
        $mailrecord-> SMTP_Driver = $request->smtp_driver;
        $mailrecord-> SMTP_Host = $request->smtp_host;
        $mailrecord-> SMTP_Port = $request->smtp_port;
        $mailrecord-> Username = $request->username;
        $mailrecord-> SMTP_Password = $request->smtp_password;
        $mailrecord-> From_Name = $request->from_name;
        $mailrecord-> SMTP_Encryption = $request->smtpEncryption;
        $mailrecord-> From_Email = $request->from_email;

        $mailrecord->save();
        return back()->with('Success','SMTP Information Updated Successfully');
    }

    public function sendmail(Request $request)
    {
        //Email Validation 
        
        $validation = $request->validate([
            'email' => 'required',
            'subject' => 'required',
            'content' => 'required',
    ]);
        $email = $request->email;
        $subject = $request->subject;
        $content = $request->content;

        require base_path('vendor/autoload.php');
        $mail = new PHPMailer(true);

        //Fatch records from database
        $smtp_mail = smtpRecord::orderBy('id', 'DESC')->first();



        //Email Server Setting

        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = $smtp_mail->SMTP_Host;
        $mail->SMTPAuth = true;
        $mail->Username = $smtp_mail->From_Email;
        $mail->Password = $smtp_mail->SMTP_Password;
        $mail->SMTPSecure = $smtp_mail->SMTP_Encryption;
        $mail->Port = $smtp_mail->SMTP_Port;

        $mail->setFrom($smtp_mail->From_Email);
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $content;

        if(!$mail->send()){
            return back()->with("failed","Email not sent.")->withErrors($mail->ErrorInfo);
        }else{
            return back()->with("success","Email has been sent.");
        }

    }

}
