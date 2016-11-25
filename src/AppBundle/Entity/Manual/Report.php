<?php

namespace AppBundle\Entity\Manual;

use AppBundle\Entity\Identifier;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="reports")
 */
class Report
{
    use Identifier;

    /**
     * @var string $email
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Toto pole musí být vyplněno")
     * @Assert\Email(message="Email musí být ve správném formátu: xxx@xxx.xxx")
     */
    protected $email;

    /**
     * @var string $message
     *
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Toto pole musí být vyplněno")
     */
    protected $message;

    /**
     * @var Manual $manual
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Manual\Manual", inversedBy="id")
     */
    protected $manual;

    /**
     * @var string $ip
     *
     * @ORM\Column(type="string", length=50)
     * @Assert\Ip()
     */
    protected $ip;

    /**
     * @var \DateTime $sent
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     * @Assert\DateTime()
     */
    protected $sent;

    /**
     * @var boolean $resolved
     *
     * @ORM\Column(type="boolean", options={"default": false})
     */
    protected $resolved = false;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getManual()
    {
        return $this->manual;
    }

    /**
     * @param mixed $manual
     */
    public function setManual($manual)
    {
        $this->manual = $manual;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return \DateTime
     */
    public function getSent()
    {
        return $this->sent;
    }

    /**
     * @param \DateTime $sent
     */
    public function setSent($sent)
    {
        $this->sent = $sent;
    }

    /**
     * @return boolean
     */
    public function isResolved()
    {
        return $this->resolved;
    }

    /**
     * @param boolean $resolved
     */
    public function setResolved($resolved)
    {
        $this->resolved = $resolved;
    }


}