<?php

$headerManager->setTitle('Использование python для конвертирования изображений в base64 и использования в CSS Data URI схеме');
$headerManager->setMetaDesr('Использование python для конвертирования изображений в base64 и использования в CSS Data URI схеме');
$headerManager->setMetaKeyw('python, css, Data URI схема');

SiteCore::showTopperLink('Назад в „Автоматизация рутинных операций“', 'pc_goodies');
//SiteCore::includeHighslide();

?>


<div class='mainDiv'>

    <div class='mainTextDiv'>


        <h1 title="Под Ubuntu">

            Используем python для конвертирования изображений в base64 для CSS Data URI схемы
        </h1>


        <div id='mainTextSubpost' class='mainTextSubpost'>
            <p>

                Увлёкшись языком программирования <a href='http://ru.wikipedia.org/wiki/Python'>Python</a> я конечно
                сразу захотел его использовать для автоматизации некоторых мелких задачек.
                Один из таких скриптов уже некоторое время облегчает мне жизнь, а значит грех не поделится наработкой.
                Итак задача: для всех .png изображений в текущей директории генерировать их представление в <a
                        href='http://ru.wikipedia.org/wiki/Base64'>base64</a> в формате пригодном для использования в <a
                        href='http://ru.wikipedia.org/wiki/Css'>CSS</a> файле в виде <a
                        href='http://en.wikipedia.org/wiki/Data_URI_scheme'> Data URI схемы</a>.</p>

            <?php
            SiteCore::showCite(array('text' => '<div style=\'font-size:1.2em;\'>Хорошее обсуждение этого подхода <a href=\'http://habrahabr.ru/blogs/client_side_optimization/116538/\'>есть на хабре</a></div>'));
            ?><br/><br/><br/>

            <p>
                Всё дело происходит под Ubuntu, но и под Windows (если уже установлен интерпретатор python) разницы быть
                не должно я думаю.
            </p>

            <p>
                Полный код скрипта:<br/><br/>

<code>
<?php
ob_start();
?>
#!/usr/bin/env python
#Converts all images in current directory, what matches filter into his base64 strings
#If outToOneFile True, when all output will come to one file out.txt
#otherwise, for each image will be created file with name as image + '.txt'

import base64
import os, fnmatch
import re

filter = "*.png"
outToOneFile = True
#outToOneFile = False

def convert_to_base64( img_file_name ):
return base64.encodestring(open(img_file_name,"rb").read())

def save_to_file( file_name, content, png_file ):
f = open( file_name, 'a' )
# Remove from string all new line symbols
content = re.sub("\n","",content)

f.write( '\n\n\n'+png_file+'\n\nbackground-image:url(data:image/png;base64,'+content+');' )
f.close()


def locate(pattern, root=os.curdir):
'''Locate all files matching supplied filename pattern in and below
supplied root directory.'''
for path, dirs, files in os.walk(os.path.abspath(root)):
for filename in fnmatch.filter(files, pattern):
yield os.path.join(path, filename)


for png_file in locate(filter):
# Save into one file all results
if( outToOneFile ):
save_to_file('out.txt',convert_to_base64(png_file), png_file)
else:
# Save into output file with name as source image file and appned to end .txt
save_to_file(png_file+'.txt',convert_to_base64(png_file), png_file)

<?= SiteCore::outHighlited(ob_get_clean(), 'python') ?></code>
            </p>

            <p>
                Либо можно <a href="<?= SERVER_URL ?>/articles/pc_goodies/python_base64/img_to_base64_string.py.zip"/>взять
                в архиве</a>.
                <br/><br/>
            </p>

            <p>
                Как использовать. <br/>В зависимости от переменной outToOneFile будет происходить либо сохранение всех
                результатов в один файл 'out.txt' (действие по умолчанию, так — как мне так удобнее), либо, если
                outToOneFile = False, тогда для каждого png файла будет создан текстовый файл с его именем.

                Задаём скрипту атрибут Executable, кидаем в директорию с ним целевые png изображения и запускаем файл.
                Всё. Создаётся файл 'out.txt' содержащий base64 представление для каждого png файла.

                К примеру, российский флаг будет выглядеть следующим образом:
                <br/><br/>
                <code>
                    /home/pavel/Desktop/py/base64/rus.png
                    - </code>название png файла, чтобы удобнее ориентироваться если конвертировать сразу много.<code>
                    <br/><br/>
                    background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAADAUExURbe3t6ZYY+Li4oQUIixBvff39wYsg0JVxMzMzPT09JgZJz1RwvLy8iU6ujlNwR0zuOzs7Orq6ufn5+jo6DZKwOTk5MkmNDBEvbojMd3d3dnZ2QUsfik+vDRJvwc1pEZYxcYpNL6+voISHw8yq5hATVJkyU1exyA2uUhaxwcvkMsqN//9/kBTyY8XJbOzs/z8+vb29PX08A0sgf7+/v39/fz8/Pr6+vj4+PDu7+Xn5BMxr8fHxxowtwk0pcooNVpkbsQMuoIAAABAdFJOU////////////////////////////////////////////////////////////////////////////////////wDCe7FEAAAA8UlEQVR42mSQfVeCMBSHFySGGzJLQnmp0BJzESUbUG7x/b9Vd0w6cnr+ubvPuWfb/aHO8J7dnDJ0bkzNgjsK3FroT0bWonU1pF2sIyOjgJJJUwONS6i17mVA3aYWgnNR1hNCe3mipCl5peFCWwTyq/0oOWMVqyrGRP3ZWh06qnCO97uXnt3+DacPDnJ873o5x9NHYIpxGiZ5jF6lzL0wTJcAmCSX0tFSbpUmSTwflPRj5MhvNbAFJZWK4aF/HFE3+xlzP4N/2gc4XFpbr1mMJ22T0uiCYsizeDLi0M8NIW+KlZarYnORfNc928DVufkVYACKk0fGL5gFVAAAAABJRU5ErkJggg==);
                </code>
                <br/><br/>

            <p>
                Вот и всё!<br/>
                Успешной, приятной и эффективной работы!

                <?php
                SiteCore::showArticeDate('2011.08.13');
                SiteCore::showTopLink();
                ?>
            </p>

        </div>


        <br/><br/><br/><br/>
    </div>
</div>