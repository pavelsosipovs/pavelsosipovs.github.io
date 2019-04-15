<?php

$headerManager -> setTitle( 'Организация отношения один-ко-многим в Symfony2 с использованием ORM Doctrine' );
$headerManager -> setMetaDesr('Организация отношения один-ко-многим в Symfony2 с использованием ORM Doctrine');
$headerManager -> setMetaKeyw('отношение один-ко-многим, Symfony2, ORM, Doctrine');

SiteCore::showTopperLink( 'Назад в „Symfony2“', 'symfony2' );

?>

<div class='mainDiv'>

	<div class='mainTextDiv'>


		<h1 title="Такое отношение встречается везде, где имеется худо-бедно сложная база данных">
			Организация отношения один-ко-многим в Symfony2 с использованием ORM Doctrine
		</h1>
        <p>
Думаю в начале нужно пару слов сказать об отношении один-ко-многим. В общем случае, это когда у одной записи в основной таблиц может быть несколько подчинённых в другой таблице. В моём случае имеет место быть следующее отношение:
        <div class="left_100">
            <img src="<?=SERVER_URL_ROOT?>articles/symfony2/orm_er_specific_1/1_to_n_entity_relation.png"
                 alt="Отношение один-ко-многим" />
        </div>
        Т.е. у каждого пользователя есть описания на каждом из поддерживаемых системой языков.
        <br /><br />
</p>

<p>
В терминах Symfony2 / Doctrine, для каждой таблицы из базы данных создаётся своя сущность (а бывает, что и несколько разных сущностей). Класс Entity, для таблицы Customer он выглядит примерно так:
<br /><br />
    <?php
    ob_start();
    ?>
namespace QR1000\MainBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * QR1000\MainBundle\Entity\Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="QR1000\MainBundle\StoreBundle\Repository\CustomerRepository")
 */
class Customer
{
    /**
     * @var integer $id
     *
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
.
.
.
    /**
     * @ORM\OneToMany(targetEntity="CustomerInfo", mappedBy="customer", cascade={"all"}, orphanRemoval=true  )
     */
    protected $infoArray;

    public function __construct()
    {
        $this->infoArray = new ArrayCollection();
.
.
.
    }
.
.
.

    /**
     * Add infoArray
     *
     * @param QR1000\MainBundle\Entity\CustomerInfo $infoArray
     */
    public function addCustomerInfo(\QR1000\MainBundle\Entity\CustomerInfo $infoArray)
    {
        $this->infoArray[] = $infoArray;
    }

    /**
     * Get infoArray
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getInfoArray()
    {
        return $this->infoArray;
    }
}
<?=SiteCore::outHighlited(  ob_get_clean(), 'php') ?>
Как Вы возможно видите, тут требуемая связь уже описана, но детальнее об этом позже.

</p>
<p>
    Также опишем сущность для customer_info:
<br /><br />
    <?php
    ob_start();
    ?>
namespace QR1000\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QR1000\MainBundle\Entity\CustomerInfo
 *
 * @ORM\Table(name="customer_info")
 * @ORM\Entity(repositoryClass="QR1000\MainBundle\StoreBundle\Repository\CustomerInfoRepository")
 */
class CustomerInfo
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
.
.
.
    /**
     *
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="infoArray")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    protected $customer;
.
.
.

    /**
     * Set customer
     *
     * @param QR1000\MainBundle\Entity\Customer $customer
     */
    public function setCustomer(\QR1000\MainBundle\Entity\Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Get customer
     *
     * @return QR1000\MainBundle\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }
}
<?=SiteCore::outHighlited(  ob_get_clean(), 'php') ?>
Тут также уже всё описано.
</p><p>
Кстати, все геттеры/сеттеры не пишутся в ручную, а генерируются автоматически, с помощью одного из удобных консольных инструментов, а именно командой:

<code>sudo php app/console doctrine:generate:entities QR1000</code>
</p>

<p>
    Теперь непосредственно к тому, как тут всё работает.<br />
    Для сущности Customer мы добавляем свойство infoArray, которое будет содержать массив элементов CustomerInfo. В его аннотации описан тип связи, условие и источник данных:<br />
    <code>
    @ORM\OneToMany(targetEntity="CustomerInfo", mappedBy="customer", cascade={"all"}, orphanRemoval=true  )
    </code>
    Тут:<br />
    <b>targetEntity</b> — название класса содержащего n-элементов.<br />
    <b>mappedBy</b> — название класса содержащего 1-элемент, обратите внимание, название начинается с маленькой буквы..<br />
    <b>cascade</b> — тип действия при удалении родительского элемента. В данном случае будут автоматически удалены все дочерние.
    </p>
    <p>
    В конструкторе для Customer добавляем строку:<br />
    <?=SiteCore::outHighlited(  '$this->infoArray = new ArrayCollection();', 'php') ?>
    <br />
    для инициализации массива хранящего найденные описания.
</p>

<p>
    Для сущности CustomerInfo связь с родительской сущностью описывается уже двумя строчками в аннотации:
    <br />
    <code>@ORM\ManyToOne(targetEntity="Customer", inversedBy="infoArray")<br />
    &nbsp; @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
    </code>
    Тут:<br />
    <b>targetEntity</b> — название класса родительской сущности (уже с большой буквы).<br />
    <b>inversedBy</b> — название свойства родительского класса, в котором хранятся найденные экземпляры описаний.<br />
    <b>name</b> — имя поля описания, по которому находятся связанные объекты.<br />
    <b>referencedColumnName</b> — имя поля в родительской сущности, по которому находятся связанные объекты.<br />
</p>

<p>
    Вот собственно и всё, теперь, получив из ORM экземпляр сущности Customer:
    <br /><br />
    <?=SiteCore::outHighlited(  '$customer = $em -> getRepository( "QR1000MainBundle:Customer" )
                    -> findOneById( $customerID );', 'php') ?>
    <br /><br />

    и передав его в шаблон:
    <br /><br />
    <?=SiteCore::outHighlited(  '$this -> render( "QR1000MainBundle::customer.html.twig", array( "customer" => $customer ) );', 'php') ?>
    <br /><br />

    мы можем обращаться к его массиву infoArray с использованием такого синтаксиса:
    <br /><br />
    <?=SiteCore::outHighlited(  '{% for descr in customer.infoArray %}', 'php') ?>
    <br /><br /><br />

    А в РНР коде, это тоже свойство для Customer:<br />
    <?php
        ob_start();
    ?>
    $descriptions = $customer -> getInfoArray();
    foreach ( $descriptions as $descr ) {
        ...
    }
    <?=SiteCore::outHighlited( ob_get_clean(), 'php') ?>

</p>
<p>
Это конечно не полное руководство, но как обещано, описал только неочевидные моменты.<br />
Надеюсь кому-нибудь пригодится.
</p>

<br />
<br />
<h3><p>Успешных проектов!</p></h3>


    <div id='mainTextSubpost' class='mainTextSubpost'>




<?php
    SiteCore::showArticeDate( '2012.09.23' );
  SiteCore::showTopLink();
?>

    </div>
  </div>
</div>


