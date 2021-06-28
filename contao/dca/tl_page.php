<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\CoreBundle\DataContainer\PaletteNotFoundException;

$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'][] = 'auto_activate_registration';
$GLOBALS['TL_DCA']['tl_page']['subpalettes']['auto_activate_registration'] = 'auto_login_registration';

try {
    $paletteManipulator = PaletteManipulator::create()
        ->addLegend('registration_legend', 'layout_legend', PaletteManipulator::POSITION_BEFORE, true)
        ->addField(['auto_activate_registration', 'auto_login_activation'], 'registration_legend', PaletteManipulator::POSITION_APPEND)
        ->applyToPalette('root', 'tl_page')
        ->applyToPalette('rootfallback', 'tl_page')
    ;
} catch (PaletteNotFoundException $e) {}


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_page']['fields']['auto_activate_registration'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_page']['auto_activate_registration'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => ['submitOnChange' => true, 'tl_class' => 'w50 m12'],
    'sql'       => ['type' => 'string', 'length' => 1, 'notnull' => true, 'fixed' => true, 'default' => '']
];

$GLOBALS['TL_DCA']['tl_page']['fields']['auto_login_registration'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_page']['auto_login_registration'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => ['tl_class' => 'w50'],
    'sql'       => ['type' => 'string', 'length' => 1, 'notnull' => true, 'fixed' => true, 'default' => '']
];

$GLOBALS['TL_DCA']['tl_page']['fields']['auto_login_activation'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_page']['auto_login_activation'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => ['tl_class' => 'clr w50'],
    'sql'       => ['type' => 'string', 'length' => 1, 'notnull' => true, 'fixed' => true, 'default' => '']
];
