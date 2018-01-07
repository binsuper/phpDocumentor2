<?php
/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 * @copyright 2010-2018 Mike van Riel / Naenius (http://www.naenius.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Descriptor\Type;

use phpDocumentor\Descriptor\Interfaces\TypeInterface;

class IntegerDescriptor implements TypeInterface
{
    /**
     * Returns a human-readable name for this type.
     *
     * @return string
     */
    public function getName()
    {
        return 'integer';
    }

    /**
     * Returns a human-readable name for this type.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
