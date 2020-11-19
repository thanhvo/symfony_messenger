<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Enqueue\Exception;

use Symfony\Component\Messenger\Exception\ExceptionInterface;

class RequeueMessageException extends \LogicException implements ExceptionInterface
{
}
