<?php


$headerManager->setTitle('Статьи - как результат научной деятельности, а также отчётность Ph.D.студента');
$headerManager->setMetaDesr('Павел Осипов, научные статьи');
$headerManager->setMetaKeyw('Павел Осипов, научные статьи');


SiteCore::showTopperLink();

?>

<div class='mainDiv'>
    <div class='mainTextDiv'>

        <h1 title="В них соответственно вложено больше всего труда">
            Нектороый мои научные публикации.
        </h1>


        <div style="font-size: small">
            <sup style="color: red">*</sup>
            Везде есть PDF`ки, частично также что-то уже есть в виде HTML страниц.
        </div>
        <br/>

        <?php
        SiteCore::showLinkElement(
            'Использование онтологий в системах обмена данными [2009]',
            '<p>
                В статье рассмотрены методы и технологии, используемые для эффективного извлечения знания  из больших массивов разнородных данных. Также рассмотрены методы структуризации сырых данных путём автоматической классификации с использованием онтологий.
                <br />     
                <a href="/articles/my_articles/2009/Pavel_Osipov_Ontoligies_2009_16_10_RU/Pavel_Osipov_Ontoligies_2009.16.10._RU.pdf"
                ><span style="font-size:small;"><img src="/engine/images/mime/application-pdf-sm.png" title="USAGE OF ONTOLOGIES IN SYSTEMS OF DATA EXCHANGE — скачать в PDF"/></span></a>                
               </p>',
            ''
        );

        $cite = [
            'text' => 'Osipov, Pavel, and Arkady Borisov. "Usage of Ontologies in Systems of Data Exchange." Scientific Journal of Riga Technical University. Computer Sciences 40.1 (2009): 108-116.',
            'href_text' => '',
            'url' => [],
            'isReturn' => true,
        ];

        SiteCore::showLinkElement(
            'USAGE OF ONTOLOGIES IN SYSTEMS OF DATA EXCHANGE [2009]',
            '<div class="left_100">' . SiteCore::showCite($cite) . '</div>' .
            '<p>
                This paper describes the methods and techniques used
to effectively extract knowledge from large volumes of
heterogeneous data. Also, methods to structure the raw data by the
automatic classification using ontology are discussed. In the first
part of the article the basic technologies to realize the Semantic
WEB are described. Much attention is paid to the ontology, as the
major concepts that structure information on a very high level.
The second part examines AVT-DTL algorithm proposed by Jun
Zhang which allows one to automatically create classifiers
according to the available raw, potentially incomplete data. The
considered algorithm uses a new concept of floating levels of
ontology; the results of the tests show that it outperforms the best
existing algorithms for creating classifiers.
                <br />     
                <a href="/articles/my_articles/2009/Pavel_Osipov_Ontoligies_2009_EN/[Applied Computer Systems] Usage of Ontologies in Systems of Data Exchange.pdf"
                ><span style="font-size:small;"><img src="/engine/images/mime/application-pdf-sm.png" title="USAGE OF ONTOLOGIES IN SYSTEMS OF DATA EXCHANGE — скачать в PDF"/></span></a>
                                
                                
                <a href="/my_articles/2009/Pavel_Osipov_Ontoligies_2009_EN/html/"
                ><span style="font-size:small;"><img src="/engine/images/mime/text-html-sm.png" title="USAGE OF ONTOLOGIES IN SYSTEMS OF DATA EXCHANGE — HTML версия"/></span></a>
               </p>',
            ''
        );


        SiteCore::showLinkElement(
            'Практика применения методов Web Data Mining',
            '<p>
                Современные темпы роста количества информации в Internet предъявляют высокие требования к эффективности алгоритмов её обработки.<br />
                В данной статье рассмотрены некоторые алгоритмы из области Web Data Mining, доказавшие свою эффективность во многих существующих приложениях.
                <br /><br />
                P.S. Первая часть этой статьи доступна в виде <a href="../semantic_web/sw_basis/">страницы</a>
                <br />
                <a href="/articles/my_articles/2009/Pavel_Osipov_Algoritmi 2009.10.16.RU/Pavel_Osipov_Algoritmi 2009.10.16.RU.pdf"
                ><span style="font-size:small;"><img src="/engine/images/mime/application-pdf-sm.png" title="Скачать в PDF"/></span></a>
               </p>
               ',
            ''
        );
        SiteCore::showLinkElement(
            'Не основанные на шаблонах методы определения аномальной деятельности',
            '<p>
                Рассмотрены различные подходы к задаче обнаружения аномального поведения в рамках систем обнаружения вторжений с использованием методов не использующих шаблоны. В основу каждого рассмотренного алгоритма положены различные модели, но все они показывают эффективные результаты в задачах оценки наличия противоправности в действиях авторизованного пользователя информационной системы.
                <br />
                <a href="/articles/my_articles/2010/Pavel_Osipov_Statistical_metnods_for_Anomaly_Detection.pdf/Pavel_Osipov_Statistical_metnods_for_Anomaly_Detection.pdf"
                ><span style="font-size:small;"><img src="/engine/images/mime/application-pdf-sm.png" title="Скачать в PDF"/></span></a>
               </p>
               ',
            ''
        );

        SiteCore::showTopLink();

        ?>

    </div>
</div>