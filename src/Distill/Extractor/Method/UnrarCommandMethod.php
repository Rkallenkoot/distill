<?php

/*
 * This file is part of the Distill package.
 *
 * (c) Raul Fraile <raulfraile@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Distill\Extractor\Method;
use Distill\Format\FormatInterface;


/**
 * Extracts files from bzip2 archives.
 *
 * @author Raul Fraile <raulfraile@gmail.com>
 */
class UnrarCommandMethod extends AbstractMethod
{

    public function extract($file, $target, FormatInterface $format)
    {
        @mkdir($target);
        $command = 'unrar e '.escapeshellarg($file).' '.escapeshellarg($target);

        return $this->executeCommand($command);
    }

    public function isSupported()
    {
        return !$this->isWindows() && $this->existsCommand('unrar');
    }

}
