<?php
//
// ����������� �������� ������.
//
include_once __DIR__ . '/../m/model.php';

class C_Page extends C_Base
{
    //
    // ��� ������������ � C_BASE, ������� ������ ����������� �� �������� ������
    //

    public function action_index()
    {
        $this->title .= '::Главная';
        $text = text_get();
        //$today = date();
        $this->content = $this->Template(__DIR__ . '/../v/v_index.php', ['text' => $text]);
    }


    public function action_edit()
    {
        $this->title .= '::��������������';

        if ($this->isPost()) {
            text_set($_POST['text']);
            header('location: index.php');
            exit();
        }

        $text = text_get();
        $this->content = $this->Template('v/v_edit.php', array('text' => $text));
    }
}
