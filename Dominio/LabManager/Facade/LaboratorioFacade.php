<?php
namespace LabManager\Facade;

use LabManager\Negocio\LaboratorioNegocio;
use LabManager\Facade\AbstractFacade;
/**
 * Description of LaboratorioFacade
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class LaboratorioFacade extends AbstractFacade {
    
    function __construct() {
        parent::__construct();
        $this->setNegocio(new LaboratorioNegocio());
    }
}
