<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Tests for obsolete directives in email templates
 */
namespace Magento\Test\Legacy;

class EmailTemplateTest extends \PHPUnit_Framework_TestCase
{
    public function testObsoleteDirectives()
    {
        $invoker = new \Magento\Framework\App\Utility\AggregateInvoker($this);
        $invoker(
            /**
             * @param string $file
             */
            function ($file) {
                $this->assertNotRegExp(
                    '/\{\{htmlescape.*?\}\}/i',
                    file_get_contents($file),
                    'Directive {{htmlescape}} is obsolete. Use {{escapehtml}} instead.'
                );
            },
            \Magento\Framework\App\Utility\Files::init()->getEmailTemplates()
        );
    }
}
