<?php

/**
 * Manager class to store/set all possible settings inside <head> tag
 */
class HeaderManager
{

    var $propsArr = array(
        'title' => "Павел Осипов :: Персональный сайт и блог",
        'description' => "Персональный сайт и блог Осипова Павла, Рига / Юрмала, Латвия.  Программирование, любые интересные мне вопросы. Программирование на PHP. Мои разработки и заметки. Размышление о музыке. Попытки фото-творчества. Научная деятельность. Ph.D.Student учёба в RTU и TSI. Мои увлечения. Ролики обслуживание и трассы для покатушек в Риге и Юрмале. Книги, фильмы, манга, гаджеты и прочее",
        'keywords' => "Осипов Павел, Рига, Юрмала, Ph.D.Student, Data Mining, Semantic WEB, Программирование, PHP, Музыка для программирования, Ролики, Покатушки"
    );

    public function setTitle($title)
    {
        $this->propsArr['title'] = $title;
    }

    public function setMetaDesr($title)
    {
        $this->propsArr['description'] = $title;
    }

    public function setMetaKeyw($title)
    {
        $this->propsArr['keywords'] = $title;
    }

    public function setProp($keyName, $val)
    {
        $this->propsArr[$keyName] = $val;
    }

    public function get($keyName)
    {
        return $this->propsArr[$keyName];
    }

}