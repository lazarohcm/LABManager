<?php
namespace LabManager\Bean;
use Doctrine\ORM\Mapping as ORM;
/**
 * Description of NoticiaLaboratorio
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */

/**
 * @ORM\Table(name="NOTICIA_LABORATORIO")
 * @ORM\Entity()
 */
class NoticiaLaboratorio {
    
    /**
     * @ORM\Column(type="bigint", unique=true, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var type 
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Laboratorio", inversedBy="noticia", cascade={"persist"}, fetch="EAGER")
     * @ORM\JoinColumn(name="laboratorio_id", referencedColumnName="id")
     */
    private $laboratorio_id;
    
    /**
     * @ORM\OneToOne(targetEntity="Noticia", inversedBy="noticiaLaboratorio", cascade={"persist"},fetch="EAGER")
     * @ORM\JoinColumn(name="noticia_id", referencedColumnName="id")
     */
    private $noticia_id;
    
    function __construct($id = NULL, $laboratorio_id = NULL, $noticia_id = NULL) {
        $this->id = $id;
        $this->laboratorio_id = $laboratorio_id;
        $this->noticia_id = $noticia_id;
    }
    
    function getId() {
        return $this->id;
    }

    function getLaboratorio() {
        return $this->laboratorio_id;
    }

    function getNoticia() {
        return $this->noticia_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLaboratorio($laboratorio_id) {
        $this->laboratorio_id = $laboratorio_id;
    }

    function setNoticia($noticia_id) {
        $this->noticia_id = $noticia_id;
    }



}
