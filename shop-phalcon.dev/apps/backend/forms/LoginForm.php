<?php
namespace Multiple\Backend\Forms;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
class LoginForm extends Form
{

    public function initialize($entity=null, $options=null)
    {
        // Name
        $name = new Text('username');
        $name->setLabel('Username');
        $name->setFilters('alphanum');
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Vui lòng điền lại tên đăng nhập'
            ))
        ));
        $this->add($name);
        // Password
        $password = new Password('password');
        $password->setLabel('Password');
        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'Vui lòng điền lại mật khẩu'
            ))
        ));
        $this->add($password);
    }
}