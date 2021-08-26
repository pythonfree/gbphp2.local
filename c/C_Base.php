<?php
//
// ������� ���������� �����.
//
abstract class C_Base extends C_Controller
{
    protected $title;        // ��������� ��������
    protected $content;        // ���������� ��������
    protected $keyWords;
    protected $showAuthForm;
    protected $showExitButton;
    protected $userAction;
    protected $buttonCaption;


    protected function before()
    {

        $this->title = 'Страница';
        $this->content = '';
        $this->keyWords = "...";
        $this->showAuthForm = true;
        $this->showExitButton = false;
        $this->userAction  = 'auth';
        $this->buttonCaption = 'Войти';

    }

    //
    // ��������� �������� ��������
    //
    public function render()
    {
        $vars = [
            'title' => $this->title,
            'content' => $this->content,
            'kw' => $this->keyWords,
            'showAuthForm' => $this->showAuthForm,
            'showExitButton' => $this->showExitButton,
            'userAction' => $this->userAction,
            'buttonCaption' => $this->buttonCaption
        ];
        $page = $this->Template(__DIR__ . '/../v/v_main.php', $vars);
        echo $page;
    }
}
