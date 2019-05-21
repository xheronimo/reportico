<?php

namespace Reportico\Widgets;

/*

 * Core
 *
 * Widget representing the Reportico instance
 * Serves up core Reportico css and js files
 *
 * @link http://www.reportico.co.uk/
 * @copyright 2010-2014 Peter Deed
 * @author Peter Deed <info@reportico.org>
 * @package Reportico
 * @version $Id: reportico.php,v 1.68 2014/05/17 15:12:31 peter Exp $
 */

class Bootstrap3 extends Widget
{
    // Define asset manager

    public function __construct($engine)
    {
        parent::__construct($engine);
        $this->manager = $engine->manager;
    }

    public function getConfig() {

        $this->engine->css_framework = "bootstrap3";

        if ( $this->engine->bootstrap_preloaded ) {
            return
            [
                'name' => 'framework',
                'autoload' => false,
                'order' => 100,
                'files' => [
                    'events' => [
                        'runtime' => [
"
reportico_css_framework = 'bootstrap3';
reportico_bootstrap_styles = '3';
"
                        ]
                    ]],
                'require' => [
                    'jquery',
                    'bootstrap'
                ]
            ];
        }

        return
            [
                'name' => 'framework',
                'autoload' => false,
                'order' => 100,
                'files' => [
                    'css' => [
                        "{$this->engine->url_path_to_assets}/node_modules/bootstrap/css/bootstrap.min.css"
                    ],
                    'js' => [
                        "{$this->engine->url_path_to_assets}/node_modules/bootstrap/js/bootstrap.min.js"
                    ],
                    'events' => [
                        'runtime' => [
"
reportico_css_framework = 'bootstrap3';
reportico_bootstrap_styles = '3';
"
                        ]
                    ]],
                'require' => [
                    'jquery',
                    'bootstrap'
                ]
            ];
    }

}
// -----------------------------------------------------------------------------
