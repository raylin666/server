<?php
// +----------------------------------------------------------------------
// | Created by linshan. 版权所有 @
// +----------------------------------------------------------------------
// | Copyright (c) 2020 All rights reserved.
// +----------------------------------------------------------------------
// | Technology changes the world . Accumulation makes people grow .
// +----------------------------------------------------------------------
// | Author: kaka梦很美 <1099013371@qq.com>
// +----------------------------------------------------------------------

namespace Raylin666\Server\Bootstrap\Callback;

use Psr\EventDispatcher\EventDispatcherInterface;
use Raylin666\Server\Bootstrap\Event\OnWorkerStart;
use Swoole\Server;

/**
 * Class WorkerStartCallback
 * @package Raylin666\Server\Bootstrap\Callback
 */
class WorkerStartCallback
{
    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * WorkerStartCallback constructor.
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->eventDispatcher = $dispatcher;
    }

    /**
     * @param Server $server
     * @param int    $workerId
     */
    public function onWorkerStart(Server $server, int $workerId)
    {
        $this->eventDispatcher->dispatch(
            new OnWorkerStart($server, $workerId)
        );
    }
}