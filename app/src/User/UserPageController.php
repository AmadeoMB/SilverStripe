<?php

use SilverStripe\Security\Security;
use SilverStripe\Control\Director;
use SilverStripe\Control\HTTP;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Dev\Debug;
use SilverStripe\Dev\Backtrace;



/**
 * Description
 * 
 * @package silverstripe
 * @subpackage mysite
 */
class UserPageController extends PageController
{

    private static $allowed_actions = [
        'Detail',
        'Edit',
        'ProsesEdit',
        'Delete',
        'CreateUser',
        'ProsesCreateUser',
    ];

    public function index()
    {
        $link = "localhost/silverstripe/user";
        $from = "amadeo.9b33@gmail.com";
        $to = "noobiedoobiegaming@gmail.com";
        $subject = "halo";

        $email = SilverStripe\Control\Email\Email::create()
            ->setData([
                'Member' => Security::getCurrentUser(),
                'Link'=> $link,
            ])
            ->setFrom($from)
            ->setTo($to)
            ->setSubject($subject);

        if ($email->send()) {
            var_dump($email);
            die();
        } else {
            // there may have been 1 or more failures
            Debug::show($email);
            die();
        }

        $user = UserObject::get()->filter('Deleted',NULL);
        return ['User' => $user];
    }

    private static $url_handler = [
        'detail/$ID'=>'Detail',
        'edit/$ID'=>'Edit',
        'delete/$ID'=>'Delete'
    ];

    public function CreateUser()
    {
        return ['User' => UserObject::get()];
    }

    public function ProsesCreateUser(HTTPRequest $request)
    {
        $Name = $request->postVar('Name');
        $Address = $request->postVar('Address');
        $Date_Birth = $request->postVar('Date_Birth');
        $Gender = $request->postVar('Gender');

        UserObject::create([
            'Name'=>$Name,
            'Address'=>$Address,
            'Date_Birth'=>$Date_Birth,
            'Gender'=>$Gender
        ])->write();

        return $this->redirect('user/');
    }

    public function Detail()
    {
        $param = $this->getRequest()->param('ID');
        $user = UserObject::get()->filter([
            'ID'=> $param
        ]);
        return ['User' => $user];
    }

    public function Edit()
    {
        $param = $this->getRequest()->param('ID');
        $user = UserObject::get()->filter([
            'ID'=> $param
        ]);

        return ['User' => $user];
    }

    public function ProsesEdit(HTTPRequest $request)
    {
        $ID = $request->postVar('ID');
        $Name = $request->postVar('Name');
        $Address = $request->postVar('Address');
        $Date_Birth = $request->postVar('Date_Birth');
        $Gender = $request->postVar('Gender');

        $user = UserObject::get()->byID($ID);
        $user->Name = $Name;
        $user->Address = $Address;
        $user->Date_Birth = $Date_Birth;
        $user->Gender = $Gender;
        $user->write();
        
        return $this->redirect('user/detail/'.$ID);
    }

    public function Delete()
    {
        $param = $this->getRequest()->param('ID');
        $user = UserObject::get()->byID($param);
        $user->Deleted = date('Y-m-d');
        $user->write();
        
        return $this->redirect('user/');
    }
}