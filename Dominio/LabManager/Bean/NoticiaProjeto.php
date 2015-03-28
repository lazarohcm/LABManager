<?php
namespace LabManager\Bean;

/**
 * Description of NoticiaProjeto
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */

/**
 * @ORM\Table(name="NOTICIA_PROJETO")
 * @ORM\Entity()
 */
class NoticiaProjeto {
    private $id;
    private $noticia;
    private $projeto;
}
