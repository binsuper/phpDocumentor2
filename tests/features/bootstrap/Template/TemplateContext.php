<?php
/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Mike van Riel <mike.vanriel@naenius.com>
 * @copyright 2010-2018 Mike van Riel / Naenius (http://www.naenius.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
 *
 *
 */

namespace phpDocumentor\Behat\Contexts\Template;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use phpDocumentor\Behat\Contexts\EnvironmentContext;
use Symfony\Component\Process\Process;

final class TemplateContext implements Context
{
    /** @var EnvironmentContext */
    private $environmentContext;

    /**
     * @var Process
     */
    private $webserver;

    /** @BeforeScenario         */
    public function gatherContexts(BeforeScenarioScope $scope)
    {
        $environment = $scope->getEnvironment();

        $this->environmentContext = $environment->getContext('phpDocumentor\Behat\Contexts\EnvironmentContext');
    }

    /**
     * @Given I open documentation
     */
    public function beforeScenario()
    {
        $workingDir = $this->environmentContext->getWorkingDir();

        $this->webserver = new Process(
                sprintf('php -S localhost:8080 -t %s', escapeshellarg($workingDir))
        );

        $this->webserver->start(function () {
            echo "Server started";
        });
       // sleep(1);
    }

    /**
     * @AfterScenario
     */
    public function cleanup()
    {
        if ($this->webserver->isStarted()) {
            $this->webserver->stop();
        }
    }
}
