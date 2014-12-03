<?php

$dominioDir = dirname(dirname(__FILE__));

return array(
    'InfraEstrutura\\' => array($dominioDir),
    'LabManager\\' => array($dominioDir . DIRECTORY_SEPARATOR . 'Dominio'),
    'Test\\' => array($dominioDir . DIRECTORY_SEPARATOR . 'test'),
    'REST\\' => array($dominioDir),
);
