<?php

namespace {

    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\Blog\Model\BlogPost;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\LiteralField;
    use SilverStripe\Forms\EmailField;
    use SilverStripe\Forms\TextareaField;
    use SilverStripe\Forms\FormAction;
    use SilverStripe\Forms\Form;
    use SilverStripe\Forms\RequiredFields;
    use SilverStripe\Control\Email\Email;
    use Silverstripe\SiteConfig\SiteConfig;

    class PageController extends ContentController
    {
        /**
         * An array of actions that can be accessed via a request. Each array element should be an action name, and the
         * permissions or conditions required to allow the user to access it.
         *
         * <code>
         * [
         *     'action', // anyone can access this action
         *     'action' => true, // same as above
         *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
         *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
         * ];
         * </code>
         *
         * @var array
         */
        private static $allowed_actions = [
            'getBlogs',
            'getHomePageButtons',
            'ContactForm'
        ];

        protected function init()
        {
            parent::init();
            // You can include any CSS or JS required by your project here.
            // See: https://docs.silverstripe.org/en/developer_guides/templates/requirements/
        }

        public function getBlogs()
        {
            $Blogs = BlogPost::get()->filter('ShowInMenus', 1);
            return $Blogs;
        }

        public function getHomePageButtons()
        {
            $Buttons = HomePageButton::get();
            return $Buttons;
        }

        public function Blog()
        {
            if( $this->ClassName == 'SilverStripe\Blog\Model\Blog' || 
                $this->ClassName == 'SilverStripe\Blog\Model\BlogPost' || 
                $this->ClassName == 'Page' || 
                $this->ClassName == 'PortfolioPage'){
                return true;
            }else{
                return false;
            }
        }

        public function ContactForm(){

            $fields = new FieldList( 
                new TextField('Name', 'Name:*'), 
                new EmailField('Email', 'Email:*'), 
                new TextareaField('Message', 'Message:*')
            ); 
            $actions = new FieldList( 
                new FormAction('submit', 'Submit') 
            );
            $validator = new RequiredFields('Email', 'Name', 'Message');
            return new Form($this, 'ContactForm', $fields, $actions, $validator); 

        }

        public function submit($data, $form) 
        { 
            $email = new Email(); 
            $config = SiteConfig::current_site_config(); 
            $email->setTo($config->Email); 
            $email->setFrom($data['Email']); 
            $email->setSubject("Message from {$data["Name"]}"); 

            $messageBody = " 
                <p><strong>Name:</strong> {$data['Name']}</p> 
                <p><strong>Message:</strong> {$data['Message']}</p> 
            "; 
            $email->setBody($messageBody); 
            $email->send(); 
            return [
                'Content' => 'Thank you for your feedback.',
                'ContactForm' => ''
            ];
        }
    }
}
